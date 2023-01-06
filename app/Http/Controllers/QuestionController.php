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

    public function deleteQuestion(Request $request, User $user)
    {
    }
}
