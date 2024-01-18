<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerLocation extends Model
{
    use HasFactory;

    protected  $guarded = [];
    public $timestamps = false;

    
    public function group() {

        return $this->hasOne(Group::class,'company_id','company_id');
    }
}
