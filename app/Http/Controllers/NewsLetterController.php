<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewsLetter;

class NewsLetterController extends Controller
{
    public function store(Request $request){
        $arr = [];
        $data = $request->formData;
        parse_str($data,$arr);

        // $existingData = NewsLetter::get();

    //    if($arr['email'] )

        try{
            NewsLetter::create([
                "name" => $arr['name'],
                "email" => $arr['email'],
                "contact" => $arr['contact']
            ]);
    
            return response([
                "message" => "Subscribed Successfully",
                "status" => "200"
            ]);
        }catch(\Throwable $th){
            return response([
                "message_err" => $th->getMessage(),
                "status" => $th->getCode()
            ]);
        }
    }
}
