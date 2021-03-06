<?php

namespace AmeyemQuiz\Http\Controllers;

use AmeyemQuiz\Http\Requests;
use AmeyemQuiz\Question;
use AmeyemQuiz\Result;
use AmeyemQuiz\Test;
use AmeyemQuiz\User;
use AmeyemQuiz\Topic;
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
        
        // $current_user=$user['name'];
        // $topics=Topic::all();
        
            
        //     $subjects = array();

        //     foreach ($topics as $topic) {
                
        //         array_push ($subjects, $topic['subject']);
        //     }
        //     $subjects= array_unique($subjects);
        // // $subjects=$topics['subject'];
        // $questions = Question::count();
        // $users = User::whereNull('role_id')->count();
        // $quizzes = Test::count();
        // $average = Test::avg('result');
        return view('home');
        // return view('home', compact('questions', 'users', 'quizzes', 'average','topics','subjects'));
    }
}


