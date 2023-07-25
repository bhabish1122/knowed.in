<?php

namespace Modules\Course\Http\Controllers;

use App\Interfaces\LanguageInterface;
use App\Models\JobPlacement;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Course\Http\Requests\CourseRequest;
use Modules\Course\Interfaces\CourseCategoryInterface;
use Modules\Course\Interfaces\CourseInterface;

class CourseController extends Controller
{
    // constructor injection
    protected $course;
    protected $courseCategory;
    protected $language;

    public function __construct(
        CourseInterface $courseInterface,
        CourseCategoryInterface $courseCategoryInterface,
        LanguageInterface $languageInterface
    ) {
        $this->course = $courseInterface;
        $this->courseCategory = $courseCategoryInterface;
        $this->language = $languageInterface;
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        try {
            $data['tableHeader'] = $this->course->tableHeader(); // table header
            $data['params'] = $this->course->params($request); // table header
            $data['courses'] = $this->course->model()->search($request)->paginate($request->show ?? 10); // data
            $data['categories'] = $this->courseCategory->model()->active()->where('parent_id', null)->get(); // data
            $data['title'] = ___('course.Courses'); // title
            return view('course::index', compact('data')); // view
        } catch (\Throwable $th) {
            return redirect()->back()->with('danger', ___('alert.something_went_wrong_please_try_again'));
        }
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        try {
            $data['categories'] = $this->courseCategory->model()->active()->where('parent_id', null)->get(); // data
            $data['languages'] = $this->language->all(); // data
            $data['title'] = ___('course.Create Course'); // title
            return view('course::create', compact('data')); // view
        } catch (\Throwable $th) {
            return redirect()->back()->with('danger', ___('alert.something_went_wrong_please_try_again'));
        }
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(CourseRequest $request)
    {
        try {
            $result = $this->course->store($request);
            if ($result->original['result']) {
                return redirect()->route('course.index')->with('success', $result->original['message']);
            } else {
                return redirect()->route('course.index')->with('danger', $result->original['message']);
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('danger', ___('alert.something_went_wrong_please_try_again'));
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('course::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        try {
            $data['categories'] = $this->courseCategory->model()->active()->where('parent_id', null)->get(); // data
            $data['course'] = $this->course->model()->find($id); // data
            $data['title'] = ___('course.Edit Course'); // title
            $data['languages'] = $this->language->all(); // data
            return view('course::edit', compact('data')); // view
        } catch (\Throwable $th) {
            return redirect()->back()->with('danger', ___('alert.something_went_wrong_please_try_again'));
        }
    }
    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function addContent($id)
    {
        try {
            $data['categories'] = $this->courseCategory->model()->active()->where('parent_id', null)->get(); // data
            $data['course'] = $this->course->model()->find($id); // data
            $data['title'] = ___('course.Edit Course'); // title
            $data['languages'] = $this->language->all(); // data
            return view('course::addContent', compact('data')); // view
        } catch (\Throwable $th) {
            return redirect()->back()->with('danger', ___('alert.something_went_wrong_please_try_again'));
        }
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(CourseRequest $request, $id)
    {
        try {
            $result = $this->course->update($request, $id);
            if ($result->original['result']) {
                return redirect()->route('course.index')->with('success', $result->original['message']);
            } else {
                return redirect()->route('course.index')->with('danger', $result->original['message']);
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('danger', ___('alert.something_went_wrong_please_try_again'));
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        try {
            $result = $this->course->destroy($id);
            if ($result->original['result']) {
                return redirect()->route('course.index')->with('success', $result->original['message']);
            } else {
                return redirect()->route('course.index')->with('danger', $result->original['message']);
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('danger', ___('alert.something_went_wrong_please_try_again'));
        }

    }


    // Job Placements
    public function jobindex($id){
        $jobs = JobPlacement::where("course_id",$id)->get();
        return view("course::jobplacement")->with([
            "course_id" => $id ,
            "jobs" => $jobs
        ]);
    }

    public function jobStore(Request $request){
        $request->validate([
            "job_name" => "required",
            "course_id" => "required"
        ]);
        try{
            JobPlacement::create([
                "job_name" => $request->job_name,
                "course_id" => $request->course_id
            ]);
            return redirect()->back()->with([
                "success" => "Job Created Successfully"
            ]);
        }catch(\Throwable $th){
            return $th->getMessage();
        }
    }
    public function jobedit(Request $request,$id){
        if($request->ajax()){
            $job = JobPlacement::where("id",$id)->first();
            return response([
                "job" => $job
            ]);
        }
    }

    public function jobupdate(Request $request){
        $request->validate([
            "job_name" => "required",
            "course_id" => "required",
            "job_id" => 'required'
        ]);
        try{
            JobPlacement::where("id",$request->job_id)->update([
                "job_name" => $request->job_name,
            ]);
            return back()->with("success","Update Successful");
        }catch(\Throwable $th){
            return $th->getMessage();   
        }
    }

    public function jobdelete(Request $request){
        try{
           JobPlacement::find($request->id)->delete();
            return back()->with("success","Delete Successful");
        }catch(\Throwable $th){
            return "message_err".$th->getMessage();
        }  
    }
}
