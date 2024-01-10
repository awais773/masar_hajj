<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyUser extends Model
{
    use HasFactory;
    
    public function group() {

        return $this->hasOne(Group::class,'company_id','company_id');
    }
}
