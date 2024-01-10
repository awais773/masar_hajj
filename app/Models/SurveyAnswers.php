<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyAnswers extends Model
{
    use HasFactory;

    protected $table = 'survey_answers';
    public $timestamps = false;

    public function Survey() {

        return $this->belongsTo('Survey', 'survey_id');
    }
}
