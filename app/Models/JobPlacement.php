<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Course\Entities\Course;

class JobPlacement extends Model
{
    use HasFactory;
    protected $table = "job_placement";
    protected $fillable = [
        "job_name" , "course_id"
    ];
    public function Course(){
        return $this->belongsTo(Course::class,"course_id","id");
    }
}
