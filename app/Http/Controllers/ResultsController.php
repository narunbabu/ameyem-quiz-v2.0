<?php

namespace AmeyemQuiz\Http\Controllers;

use Auth;
use AmeyemQuiz\Test;
use AmeyemQuiz\TestAnswer;
use Illuminate\Http\Request;
use AmeyemQuiz\Http\Requests\StoreResultsRequest;
use AmeyemQuiz\Http\Requests\UpdateResultsRequest;

class ResultsController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->except('index', 'show','summary');
    }

    /**
     * Display a listing of Result.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results = Test::all()->load('user');

        if (!Auth::user()->isAdmin()) {
            $results = $results->where('user_id', '=', Auth::id());
        }

        return view('results.index', compact('results'));
    }

    /**
     * Display Result.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function summary($id)
    {
        $test = Test::find($id)->load('user');

        if ($test) {
            $results = TestAnswer::where('test_id', $id)
                ->with('question')
                ->with('question.options')
                ->get()
            ;
        }

        // return view('results.show', compact('test', 'results'));
        return 'good';
        //view('results.summary', compact('test', 'results'));
    }

    public function show($id)
    {
        $test = Test::find($id)->load('user');

        if ($test) {
            $results = TestAnswer::where('test_id', $id)
                ->with('question')
                ->with('question.options')
                ->get()
            ;
        }

        return view('results.show', compact('test', 'results'));
        // return view('results.summary', compact('test', 'results'));
    }
}
