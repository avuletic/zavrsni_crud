<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Question;
use Illuminate\Http\Request;
use Session;

class QuestionController extends Controller
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
            $question = Question::where('question_text', 'LIKE', "%$keyword%")
				->orWhere('question_type', 'LIKE', "%$keyword%")
				->orWhere('survey_id', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $question = Question::paginate($perPage);
        }

        return view('admin.question.index', compact('question'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.question.create');
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
			'question_text' => 'required'
		]);
        $requestData = $request->all();
        
        Question::create($requestData);

        Session::flash('flash_message', 'Question added!');

        return redirect('admin/question');
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
        $question = Question::findOrFail($id);

        return view('admin.question.show', compact('question'));
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
        $question = Question::findOrFail($id);

        return view('admin.question.edit', compact('question'));
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
			'question_text' => 'required'
		]);
        $requestData = $request->all();
        
        $question = Question::findOrFail($id);
        $question->update($requestData);

        Session::flash('flash_message', 'Question updated!');

        return redirect('admin/question');
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
        Question::destroy($id);

        Session::flash('flash_message', 'Question deleted!');

        return redirect('admin/question');
    }
}
