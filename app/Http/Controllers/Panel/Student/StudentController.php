<?php

namespace App\Http\Controllers\Panel\Student;

use App\Http\Controllers\Controller;
use App\Models\KYCModel;
use App\Models\User;
use App\Models\VideoProfileModel;
use App\Traits\ApiReturnFormatTrait;
use App\Traits\CommonHelperTrait;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Course\Interfaces\BookmarkInterface;
use Modules\Order\Interfaces\EnrollInterface;
use Modules\Order\Interfaces\NoteInterface;
use Modules\Order\Repositories\EnrollRepository;
use Modules\Student\Interfaces\StudentInterface;
use Throwable;

class StudentController extends Controller
{
    use ApiReturnFormatTrait, CommonHelperTrait;

    protected $user;
    protected $student;
    protected $enrollRepository;
    protected $noteRepository;
    protected $bookmarkRepository;
    protected $template = 'panel.student';

    public function __construct(
        User $user,
        StudentInterface $student,
        EnrollInterface $enrollRepository,
        BookmarkInterface $bookmarkRepository,
        NoteInterface $noteRepository
    ) {
        $this->user = $user;
        $this->student = $student;
        $this->enrollRepository = $enrollRepository;
        $this->noteRepository = $noteRepository;
        $this->bookmarkRepository = $bookmarkRepository;
    }

    public function dashboard()
    {
        try {

            $data['student'] = $this->student->model()->where('user_id', Auth::id())->first();
            $data['title'] = ___('student.Student Dashboard'); // title
            return view($this->template . '.student_dashboard', compact('data'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('danger', ___('alert.something_went_wrong_please_try_again'));
        }
    }

    public function profile()
    {
        try {
            $data['title'] = ___('student.My Profile'); // title
            $data['student'] = $this->student->model()->where('user_id', Auth::id())->first();
            return view($this->template . '.student_profile', compact('data'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('danger', ___('alert.something_went_wrong_please_try_again'));
        }
    }

    public function courses(Request $request)
    {
        try {
            $data['title'] = ___('student.Student Courses'); // title
            $data['enrolls'] = $this->enrollRepository->model()->where('user_id', Auth::id())->with('course:id,title,course_duration,course_category_id,slug,thumbnail')
                ->search($request)
                ->latest()
                ->paginate(10);
            return view($this->template . '.my_courses', compact('data'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('danger', ___('alert.something_went_wrong_please_try_again'));
        }
    }

    public function tabLoad(Request $request)
    {
        try {
            if (@$request->tab && $request->enrollId) {
                $data['enroll'] = $this->enrollRepository->model()->find(decryptFunction($request->enrollId));
                if (!$data['enroll']) {
                    return $this->responseWithError(___('alert.something_went_wrong_please_try_again'), [], 400); // return error response
                }
                if ($request->tab == 'Notes') {
                    $view = view($this->template . '.course.tab.notes', compact('data'))->render();
                    return $this->responseWithSuccess(___('alert.Data found'), $view);
                } elseif ($request->tab == 'Announcement') {
                    $announcement = $this->enrollRepository->model()->announcements($data['enroll']);
                    return $this->responseWithSuccess(___('alert.Data found'), @$announcement);
                } elseif ($request->tab == 'Assignment') {
                    $view = view($this->template . '.course.tab.assignment', compact('data'))->render();
                    return $this->responseWithSuccess(___('alert.Data found'), $view);
                } elseif ($request->tab == 'Review') {
                    $view = view($this->template . '.course.tab.reviews', compact('data'))->render();
                    return $this->responseWithSuccess(___('alert.Data found'), $view);
                } else {
                    return $this->responseWithError(___('alert.something_went_wrong_please_try_again'), [], 400); // return error response
                }
            } else {
                return $this->responseWithError(___('alert.something_went_wrong_please_try_again'), [], 400); // return error response
            }
        } catch (\Throwable $th) {
            return $this->responseWithError(___('alert.something_went_wrong_please_try_again'), [], 400); // return error response
        }
    }

    public function courseLearn($slug, $lesson_id)
    {
        try {
            $lesson_id = decryptFunction($lesson_id);
            $data['title'] = ___('student.Student Course Learn'); // title
            $data['enroll'] = $this->enrollRepository->model()->where('user_id', Auth::id())->whereHas('course', function ($q) use ($slug) {
                $q->where('slug', $slug);
            })->with('course:id,title,slug,course_duration,created_by,requirements,outcomes,description', 'lessons')->first();
            $data['lesson'] = $data['enroll']->lessons->find($lesson_id);
            if (!$data['enroll'] || !$data['lesson']) {
                return redirect()->back()->with('danger', ___('alert.Lesson not found'));
            }
            $this->enrollRepository->visited($data['enroll']);
            $data['lesson_id'] = $lesson_id;
            return view($this->template . '.course.course_details', compact('data'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('danger', ___('alert.something_went_wrong_please_try_again'));
        }
    }

    public function courseEnrollProgress(Request $request)
    {
        try {
            $result = $this->enrollRepository->update($request);
            if ($result->original['result']) {
                return $this->responseWithSuccess(___('alert.Lesson_successfully_updated'));
            } else {
                return $this->responseWithError($result->original['message'], [], 400); // return error response
            }
        } catch (\Throwable $th) {
            return $this->responseWithError(___('alert.something_went_wrong_please_try_again'), [], 400); // return error response
        }
    }

    // course activities
    public function courseActivities(Request $request)
    {
        try {
            $data['enrolls'] = $this->enrollRepository->model()->where('user_id', Auth::id())->with('course:id,title,course_duration,point,course_category_id,slug')
                ->search($request)
                ->latest()
                ->paginate(10);
            $data['title'] = ___('student.Course Activities'); // title
            return view($this->template . '.course_activities', compact('data'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('danger', ___('alert.something_went_wrong_please_try_again'));
        }
    }
    // course activities

    public function leaderBoard()
    {
        try {
            $data['title'] = ___('student.Leader Board'); // title
            $data['students'] = $this->student->model()->orderBy('points', 'DESC')->paginate(10);
            return view($this->template . '.leader_board', compact('data'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('danger', ___('alert.something_went_wrong_please_try_again'));
        }
    }

    public function logout()
    {
        try {
            auth()->logout();

            return redirect()->route('home')->with('success', ___('alert.Student Log out successfully!!'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('danger', ___('alert.something_went_wrong_please_try_again'));
        }
    }

    public function kyc(){
        $data["title"] = "Student KYC";
        $mykyc = KYCModel::where("user_id",Auth::user()->id)->first();
        return view($this->template.".kyc.index",compact("data","mykyc"));
    }

    public function kycstore(Request $request){
        $request->validate([
            "aadhar_number" => "required|unique:kyc",
            "aadhar_front" => 'required|mimes:jpg,pdf,jpeg,png,raw',
            "aadhar_back" => 'required|mimes:jpg,pdf,jpeg,png,raw',
            "pan_number" => "required|unique:kyc",
            "pan_front" => 'required|mimes:jpg,pdf,jpeg,png,raw',
            "pan_back" => 'required|mimes:jpg,pdf,jpeg,png,raw',
            "driving_license_number" => "required|unique:kyc",
            "driving_license_front" => 'required|mimes:jpg,pdf,jpeg,png,raw',
            "driving_license_back" => 'required|mimes:jpg,pdf,jpeg,png,raw',
        ]);
        $user_id = Auth::user()->id;
        try{
            DB::beginTransaction();

            $aadhar_front = "IMG-".date('YmdHis').rand(0,9999).".".$request->file('aadhar_front')->getClientOriginalExtension();
            $aadhar_back = "IMG-".date('YmdHis').rand(0,9999).".".$request->file('aadhar_back')->getClientOriginalExtension();
            $pan_front = "IMG-".date('YmdHis').rand(0,9999).".".$request->file('pan_front')->getClientOriginalExtension();
            $pan_back = "IMG-".date('YmdHis').rand(0,9999).".".$request->file('pan_back')->getClientOriginalExtension();
            $driving_license_front = "IMG-".date('YmdHis').rand(0,9999).".".$request->file('driving_license_front')->getClientOriginalExtension();
            $driving_license_back = "IMG-".date('YmdHis').rand(0,9999).".".$request->file('driving_license_back')->getClientOriginalExtension();

            $existingKycs = KYCModel::where("user_id",$user_id)->first();
            if($existingKycs){
                $path = storage_path("app\public\uploads\kyc");
                $existingAadharFront = join(DIRECTORY_SEPARATOR, [$path, $existingKycs->aadhar_front]);
                $existingAadharBack = join(DIRECTORY_SEPARATOR, [$path, $existingKycs->aadhar_back]);
                $existingPanFront = join(DIRECTORY_SEPARATOR, [$path, $existingKycs->pan_front]);
                $existingPanBack = join(DIRECTORY_SEPARATOR, [$path, $existingKycs->pan_back]);
                $existingDrivingFront = join(DIRECTORY_SEPARATOR, [$path, $existingKycs->driving_license_front]);
                $existingDrivingBack = join(DIRECTORY_SEPARATOR, [$path, $existingKycs->driving_license_back]);
                $this->checkFileExists($existingAadharFront);
                $this->checkFileExists($existingAadharBack);
                $this->checkFileExists($existingPanFront);
                $this->checkFileExists($existingPanBack);
                $this->checkFileExists($existingDrivingFront);
                $this->checkFileExists($existingDrivingBack);
            }

            KYCModel::updateOrCreate([
                "user_id" => $user_id,
            ],[
                "user_id" => $user_id,
                "aadhar_number" => $request->aadhar_number,
                "aadhar_front" => $aadhar_front,
                "aadhar_back" => $aadhar_back,
                "pan_number" => $request->pan_number,
                "pan_front" => $pan_front,
                "pan_back" => $pan_back,
                "driving_license_number"=> $request->driving_license_number,
                "driving_license_front" => $driving_license_front,
                "driving_license_back" => $driving_license_back
            ]);

            $request->file('aadhar_front')->storeAs('public/uploads/kyc',$aadhar_front);
            $request->file('aadhar_back')->storeAs('public/uploads/kyc',$aadhar_back);
            $request->file('pan_front')->storeAs('public/uploads/kyc',$pan_front);
            $request->file('pan_back')->storeAs('public/uploads/kyc',$pan_back);
            $request->file('driving_license_front')->storeAs('public/uploads/kyc',$driving_license_front);
            $request->file('driving_license_back')->storeAs('public/uploads/kyc',$driving_license_back);
            DB::commit();
            return back()->with("success","KYC creation success");

        }catch(Throwable $th){
            DB::rollBack();
            return $th->getMessage();
        }
    }

    function checkFileExists($path){
        if(file_exists($path)){ 
            unlink($path);
            return true;
        }
        else{
            DB::rollBack();
            return throw new \Exception("Something went wrong for {$path}. Reverting all changes ");
        }
    }

    public function videoprofile(){
        $data["title"] = "Video Profile";
        $data['user_id'] = Auth::user()->id;
        $data['videos'] = VideoProfileModel::where("user_id", $data['user_id'])
                                            ->orderBy('id', 'desc') 
                                            ->limit(20)
                                            ->get();
        return view($this->template.".videoprofile.index",compact("data"));
    }
    public function videostore(Request $request)
    {
        $request->validate([
            'video' => 'required|mimes:mp4,mov,avi,wmv|max:50000', // Max size in kilobytes (50MB)
        ]);
    
        try{
            $outputFileName = "VID-" . date("ymdHis") . rand(0, 99999) . ".mp4";
            $inputFilePath = $request->file('video')->storeAs('public/uploads/video_profile/',$outputFileName); // Save the video to a temporary location        
            $create = VideoProfileModel::create([
                "video" => $outputFileName,
                "remarks" => $request->remarks,
                "user_id" => Auth::user()->id
            ]);

            return back()->with("success","Video Upload Successful");

        }catch(Throwable $e){
            return $e->getMessage();
        }
        
    }
}
