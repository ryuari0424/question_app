<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    public function createQuestion(User $user)
    {
        return Inertia::render('Question/Create');
    }

    public function storeQuestion(Request $request)
    {
        $request->validate([
            'title' => ['required', 'min:4'],
            'content' => ['required', 'min:4'],
        ]);

        $question = Question::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => Auth::user()->id,
                    ]);

        return redirect()->route('user.index')->with('message', '質問の投稿が完了しました。');
    }

    public function editQuestion(Question $question) {
        return Inertia::render('Question/Edit',["question"=>$question]);

    }

    public function updateQuestion(Request $request, Question $question) {
        $request->validate([
            'title' => ['required', 'min:4'],
            'content' => ['required', 'min:4'],
        ]);

        $question->update($request->all());

        return redirect()->route('user.index')->with("message", "質問を修正しました。" );
    }

    public function destroyQuestion(Request $request, Question $question)
    {
        if(Auth::user()->id != $question->user_id){
            return back();
        }else{
            $question->delete();
            return redirect()->route('user.index')->with('message', '質問が削除されました。');
        }

    }
}
