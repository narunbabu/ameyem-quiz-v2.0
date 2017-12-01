<?php

namespace AmeyemQuiz\Http\Controllers;

use AmeyemQuiz\Http\Requests;
use AmeyemQuiz\Question;
use AmeyemQuiz\Result;
use AmeyemQuiz\Test;
use AmeyemQuiz\User;
use Illuminate\Http\Request;



// use Illuminate\Routing\Controller;
use Illuminate\Contracts\Auth\Authenticatable;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Authenticatable $user)
    {
        $questions = Question::count();
        $users = User::whereNull('role_id')->count();
        $current_user=$user['name'];
        $quizzes = Test::count();
        $average = Test::avg('result');
        return view('home', compact('questions', 'users', 'quizzes', 'average','current_user'));
    }
}


