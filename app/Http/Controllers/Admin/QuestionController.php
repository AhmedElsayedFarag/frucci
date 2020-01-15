<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuestionRequest;
use App\Question;
use App\QuestionTranslation;


class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::all();
        return view('admin.questions.index', compact('questions'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.questions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuestionRequest $request)
    {
        $question = new Question();
        $question->save();
        $available_locales = \Localization::getLocales();
        foreach ($available_locales as $locale => $value){
            $question->translateOrNew($locale)->question = $request['question_'.$locale];
            $question->translateOrNew($locale)->answer = $request['answer_'.$locale];
        }//end for each
        $question->save();
        return redirect(route('questions.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question = Question::findOrFail($id);
//        dd($question->getTranslationsArray());
//        $questionAr = QuestionTranslation::where('question_id', $question->id)->where('locale', 'ar')->first()->question;
//        $questionEn = QuestionTranslation::where('question_id', $question->id)->where('locale', 'en')->first()->question;
//        $answerAr = QuestionTranslation::where('question_id', $question->id)->where('locale', 'ar')->first()->answer;
//        $answerEn = QuestionTranslation::where('question_id', $question->id)->where('locale', 'en')->first()->answer;
        return view('admin.questions.edit', compact('question'));
//        return view('admin.questions.edit', compact('question', 'questionAr', 'questionEn', 'answerAr', 'answerEn'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(QuestionRequest $request, $id)
    {
        $question = Question::findOrFail($id);
        $question->deleteTranslations();
        $available_locales = \Localization::getLocales();
        foreach ($available_locales as $locale => $value){
            $question->translateOrNew($locale)->question = $request['question_'.$locale];
            $question->translateOrNew($locale)->answer = $request['answer_'.$locale];
        }//end for each
        $question->save();
        return redirect(route('questions.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Question::destroy($id);
        return response()->json(['success' => 'true']);
    }
}
