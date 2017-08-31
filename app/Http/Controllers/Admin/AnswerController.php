<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Answer;
use App\Question;
use Illuminate\Http\Request;
use Session;

class AnswerController extends Controller
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
            $answer = Answer::where('answer', 'LIKE', "%$keyword%")
				->orWhere('question_id', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $answer = Answer::paginate($perPage);
        }

        return view('admin.answer.index', compact('answer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $questions = Question::where('question_type', '=', 'radio')->pluck('question_text', 'id')->toArray();

        return view('admin.answer.create', compact('questions', $questions));
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
        $this->validate($request, [
			'answer' => 'required'
		]);
        /*$requestData = $request->all();
        
        Answer::create($requestData);*/
        $answer = new \App\Answer();
        $answer->question_id = $request->request->get('question_id');
        $answer->answer = $request->request->get('answer');
        $answer->save();

        Session::flash('flash_message', 'Answer added!');

        return redirect('admin/answer');
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
        $answer = Answer::findOrFail($id);

        return view('admin.answer.show', compact('answer'));
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
        $answer = Answer::findOrFail($id);

        return view('admin.answer.edit', compact('answer'));
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
        $this->validate($request, [
			'answer' => 'required'
		]);
        $requestData = $request->all();
        
        $answer = Answer::findOrFail($id);
        $answer->update($requestData);

        Session::flash('flash_message', 'Answer updated!');

        return redirect('admin/answer');
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
        Answer::destroy($id);

        Session::flash('flash_message', 'Answer deleted!');

        return redirect('admin/answer');
    }
}
