<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnswerController extends Controller
{
    public function createAnswer(Question $question)
    {
        $question = Question::with('user')->find($question->id);
        return Inertia::render('Answer/Create', ['question' => $question]);
    }

    public function showAnswer(Question $question)
    {
        return Inertia::render('Question/Show', ['question' => $question]);
    }


    public function storeAnswer(Request $request, Question $question)
    {
        $request->validate([
            'answering1' => 'required|min:4|max:100',
            'answering2' => 'required_without:answering1|min:4|max:100',
            'answering3' => 'required_without:answering1|min:4|max:100',
        ]);

        $answer = Answer::create([
            'answering1' => $request->answering1,
            'answering2' => $request->answering2,
            'answering3' => $request->answering3,
            'user_id' => Auth::user()->id,
            'question_id' => $question->id
        ]);

        return redirect()->route('user.index')->with('message', '質問に対する回答が投稿されました。');
    }
}
