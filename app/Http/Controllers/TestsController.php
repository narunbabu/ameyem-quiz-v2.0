<?php

namespace AmeyemQuiz\Http\Controllers;

use DB;
use Auth;
use AmeyemQuiz\Test;
use AmeyemQuiz\TestAnswer;
use AmeyemQuiz\Topic;
use AmeyemQuiz\Question;
use AmeyemQuiz\QuestionsOption;
use Illuminate\Http\Request;
use AmeyemQuiz\Http\Requests\StoreTestRequest;
use Share;
class TestsController extends Controller
{
    /**
     * Display a new test.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        // $topics = Topic::inRandomOrder()->limit(10)->get();fdsa  
        $id = $request->input('id');

        $topic=Topic::find($id);
        $questions = Question::where('topic_id', $id)->inRandomOrder()->limit(10)->get();
        foreach ($questions as &$question) {
            $question->options = QuestionsOption::where('question_id', $question->id)->inRandomOrder()->get();
        }
        $t_id=$id;
      
        
        return view('tests.create', compact('questions','topic'));

    }


    /**
     * Store a newly solved Test in storage with results.
     *
     * @param  \AmeyemQuiz\Http\Requests\StoreResultsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $result = 0;
        $topic_id=$request->input('topic_id');
        $test = Test::create([
            'user_id' => Auth::id(),
            'topic_id'=> $topic_id,
            'result'  => $result,
        ]);

        foreach ($request->input('questions', []) as $key => $question) {
            $status = 0;

            if ($request->input('answers.'.$question) != null
                && QuestionsOption::find($request->input('answers.'.$question))->correct
            ) {
                $status = 1;
                $result++;
            }
            TestAnswer::create([
                'user_id'     => Auth::id(),
                'test_id'     => $test->id,
                'question_id' => $question,
                'option_id'   => $request->input('answers.'.$question),
                'correct'     => $status,
            ]);
        }

        $test->update(['result' => $result]);

        $test2 = Test::find($test->id);
        $mydate = date_format($test2->created_at, 'd-M-Y H:i');
        $fileuid=uniqid();
        $urls=Share::load('http://www.skills.ameyem.com/quiz/u/'.$fileuid.'.html', 'I took a quiz to test my capabilities. AmeyemQuiz is awesome!!! Wanna test your capabilities too!!!? Register at skills.ameyem.com and follow @myameyem',
        url('http://www.skills.ameyem.com/quiz/quickadmin/serverside/images/'.$fileuid.'.png'))->services('facebook', 'gplus', 'twitter');
        
        // $urls=Share::load('http://localhost:8000/quiz', 'Wonna test your capabilities too!!!?',
        // url('http://localhost:8000/quiz/quickadmin/images/logo.png'))->services('facebook', 'gplus', 'twitter');
        // return redirect()->route('results.show', [$test->id]);
        // return redirect()->route('results.summary', [$test->id]);

        
        
        return view('results.summary', compact('test2','mydate','urls','fileuid'));
    }
}
