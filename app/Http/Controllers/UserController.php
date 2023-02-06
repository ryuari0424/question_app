<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\User;
use Inertia\Inertia;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        $user = Auth::user();
        $questions = Question::with(['tags', 'user', 'answers'])->latest()->get();
        return Inertia::render('Question/Index', ['user' => $user, 'questions' => $questions]);
    }

    public function myPage(){
        $user = Auth::user();
        $questions = Question::with(['user', 'tags', 'answers'])->where('user_id', $user->id)->get();


        return Inertia::render('User/MyPage', ['questions' => $questions]);

    }


}
