<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'answers';

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
    protected $fillable = ['answer', 'question_id'];

    public function questions()
	{
		return $this->belongsTo('App\Question');
	}

	/*public function surveys()
    {
        return $this->belongsTo('App\Survey');
    }*/
}
