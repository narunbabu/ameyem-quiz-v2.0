
<?php
    $topics=AmeyemQuiz\Topic::all();
        
            
    $subjects = array();

    foreach ($topics as $topic) {
        
        array_push ($subjects, $topic['subject']);
    }
    $subjects= array_unique($subjects);

?>
<h2>Take a new quiz on...</h2>
    @if (count($topics) > 0)
        <form>
            @foreach ($subjects as $subject) 
            <!-- Single button -->
            <div class="btn-group">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ $subject}} <span class="caret"></span>
            </button>
            <ul class="dropdown-menu">
            @foreach ($topics as $topic)
                                                
                @if ($topic->subject==$subject)
                
                <li><a href="{{ route('tests.index',['id'=>$topic->id]) }}" 
                    class="list-group-item ">
                {{ $topic->title}}</a></li>
                @endif
                                                
            @endforeach  
            </ul>
            </div>
            @endforeach
        </form>
    @endif

