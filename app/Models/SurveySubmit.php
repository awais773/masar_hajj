<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class SurveySubmit extends Model
{
    use HasFactory;
    protected $table = 'survey_submit';
    public $timestamps = false;
    public function Survey() {

        return $this->belongsTo('Survey', 'survey_id');
    }
     public function User() {

        return $this->belongsTo('User', 'user_id');
    }
}
