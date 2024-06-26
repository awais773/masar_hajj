<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Survey extends Model
{
    use HasFactory;
    public $timestamps = false;
    use SoftDeletes;
    public function company() {

        return $this->hasOne(User::class,'id','company_id');
    }
}
