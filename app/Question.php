<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'questions';

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
    protected $fillable = ['question_text', 'question_type', 'survey_id'];

    public function survey()
    {
        return $this->belongsTo('App\Survey');
    }

    public function answer()
    {
        return $this->hasMany('App\Answer');
    }
}
