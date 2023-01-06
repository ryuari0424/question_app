<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        $user = Auth::user();
        $questions = Question::with('user')->latest()->get();
        return Inertia::render('Question/Index', ['user' => $user, 'questions' => $questions]);
    }


}
