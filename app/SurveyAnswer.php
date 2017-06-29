<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SurveyAnswer extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'survey_answers';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['question_id', 'answer_id', 'user_id', 'response'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function question()
    {
        return $this->hasMany('App\Question');
    }

    public function answer()
    {
        return $this->hasMany('App\Answer');
    }
    
}
