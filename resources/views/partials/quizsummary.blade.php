<?php
    $questions = AmeyemQuiz\Question::count();
    $users = AmeyemQuiz\User::whereNull('role_id')->count();
    $quizzes = AmeyemQuiz\Test::count();
    $average = AmeyemQuiz\Test::avg('result');
?>
        
        <div class="panel panel-default">
        
            <div class="panel-heading"><b>Here is a quick summary about AmeyemQuiz.</b><?php echo "  Now: " . date("h:i:sa"); ?></div>
                
                
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3 text-center">
                            <h1>{{ $questions }}</h1>
                            questions in our database
                        </div>
                        <div class="col-md-3 text-center">
                            <h1>{{ $users }}</h1>
                            users registered
                        </div>
                        <div class="col-md-3 text-center">
                            <h1>{{ $quizzes }}</h1>
                            quizzes taken
                        </div>
                        <div class="col-md-3 text-center">
                            <h1>{{ number_format($average, 2) }} / 10</h1>
                            average score
                        </div>
                    </div>
                </div>
            </div>
        </div>