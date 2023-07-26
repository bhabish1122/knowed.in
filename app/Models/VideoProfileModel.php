<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoProfileModel extends Model
{
    use HasFactory;
    protected $table = "student_video_profile";
    protected $fillable = [
        "user_id" , "video" , "remarks" ,'created_at' , "updated_at"
    ];
    public function user(){
        return $this->belongsTo(User::class,"user_id","id");
    }
}
