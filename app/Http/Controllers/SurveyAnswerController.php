<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Question;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Survey;
use App\SurveyAnswer;
use Illuminate\Http\Request;
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
        
        $requestData = $request->all();
        
        SurveyAnswer::create($requestData);

        Session::flash('flash_message', 'SurveyAnswer added!');

        return redirect('survey-answer');
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

    public function takesurvey($id)
    {

        $user = Auth::user();

        //podaci za anketu
        $survey = Survey::findOrFail($id);
        //lista pitanja za anketu
        $questions = Survey::find($id)->questions;
        //lista ponudjenih odgovora na pitanje
        $answers = Question::find($id)->answers;
        return view('admin/survey/take',compact('survey','answers','questions'));

    }


        /* $userrole = DB::table('users')
             ->leftJoin('role_user', 'role_user.user_id', '=', 'users.id')
             ->leftJoin('roles', 'roles.id', '=', 'role_user.role_id')
             ->where('users.id', '=', $user);*/


        /*$survey = DB::table('surveys')
            ->join('questions', 'surveys.id', '=', 'questions.survey_id')
            ->select('questions.*')
            ->get()*/


        /*$answer = DB::table('answers')
            ->leftJoin('questions', 'questions.id', '=', 'answers.question_id')
            ->union($survey)
            ->get();*/


/*        return view('admin/survey/take', ['survey' => $survey[0]]);*/



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
