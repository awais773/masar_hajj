<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Guide;
use App\Models\CompanyUser;
class Group extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function company() {

        return $this->belongsTo(User::class,'company_id','id');
    }
    
    public function users() {

        return $this->hasMany(CompanyUser::class,'company_id','company_id');
    }
    public function guide() {

        return $this->belongsTo(Guide::class);
    }
     
}
