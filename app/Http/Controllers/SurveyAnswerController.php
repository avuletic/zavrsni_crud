<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Http\Requests;
use App\Question;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Survey;
use App\SurveyAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Session;
use DB;

class SurveyAnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $surveyanswer = SurveyAnswer::where('question_id', 'LIKE', "%$keyword%")
				->orWhere('answer_id', 'LIKE', "%$keyword%")
				->orWhere('user_id', 'LIKE', "%$keyword%")
				->orWhere('response', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $surveyanswer = SurveyAnswer::paginate($perPage);
        }

        return view('survey-answer.index', compact('surveyanswer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('survey-answer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        //TODO napravi storeanje odgovora

        $arr = $request->except('_token');


        foreach ($arr as $key => $value) {

            $newAnswer = new SurveyAnswer();
            if (array_key_exists('response', $value)) {
                $newValue = ($value['response']);

                $newAnswer->response = $newValue;
                $newAnswer->question_id = $key;
                $newAnswer->user_id = Auth::id();

                $newAnswer->save();

                $answerArray[] = $newAnswer;
            }
            else {
                $newValue = ($value['answer_id']);

                $newAnswer->answer_id = $newValue;
                $newAnswer->question_id = $key;
                $newAnswer->user_id = Auth::id();

                $newAnswer->save();

                $answerArray[] = $newAnswer;
            }
        };

        return redirect('admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $surveyanswer = SurveyAnswer::findOrFail($id);

        return view('survey-answer.show', compact('surveyanswer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $surveyanswer = SurveyAnswer::findOrFail($id);

        return view('survey-answer.edit', compact('surveyanswer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        
        $requestData = $request->all();
        
        $surveyanswer = SurveyAnswer::findOrFail($id);
        $surveyanswer->update($requestData);

        Session::flash('flash_message', 'SurveyAnswer updated!');

        return redirect('survey-answer');
    }

    public function loadSurvey($id)
    {




        //podaci za anketu
        $survey = Survey::findOrFail($id);
        //lista pitanja za anketu
        //$questions = Survey::find($id)->questions;
        //lista odgovora na pitanja
        //$answers = $survey->answers;
        /*$questions = DB::table('questions')
                    ->leftJoin('answers','questions.id', '=', 'answers.question_id')
                    ->where('questions.survey_id', '=', $survey->id)
                    ->get();*/
        /*$questions = Survey::find($id)->with('questions','answers')->get();
        $questions = Survey::findOrFail($id)->with('questions','answers')->get();

        $answers = DB::table('questions')
            ->rightJoin('answers','answers.question_id', '=', 'question_id')
            ->whereIn('survey_id',[$id])
            ->get();
        dd($answers);*/

        return view('admin/survey/take',compact('survey'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        SurveyAnswer::destroy($id);

        Session::flash('flash_message', 'SurveyAnswer deleted!');

        return redirect('survey-answer');
    }
}
