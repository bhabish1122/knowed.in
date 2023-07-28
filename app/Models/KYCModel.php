<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class KYCModel extends Model
{
    use HasFactory;
    protected $table = 'kyc';
    protected $fillable = [
       "user_id","aadhar_number","aadhar_front","aadhar_back", "pan_number","pan_front","pan_back", "driving_license_number","driving_license_front","driving_license_back"
    ];
    public function user(){
        return $this->belongsTo(User::class,"user_id","id");
    }
}
