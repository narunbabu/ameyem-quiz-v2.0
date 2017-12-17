
<?php
    $topics=AmeyemQuiz\Topic::all();
        
            
    $subjects = array();

    foreach ($topics as $topic) {
        
        array_push ($subjects, $topic['subject']);
    }
    $subjects= array_unique($subjects);

?>

<h2>Take a new quiz on...</h2>
            <div class="card-group">
            @if (count($topics) > 0)
                <form>
                    @foreach ($subjects as $subject)     
                    {{--  <div class="form-group">  --}}
                        <div class="form-group col-lg-4 col-md-6 text-center">           
                            {{--  <div class="jumbotron">  --}}
                            <div class="card card-inverse" style="background-color: #cdf; border-color: #333;height:300px">
                                <div class="card-header">
                                    AmeyemQuiz
                                </div>
                                <div class="card-block">
                                    <h3 class="card-title"><strong>{{ $subject}}</strong></h3>
                                

                                            <div class="list-group list-group-flush">
                                                @foreach ($topics as $topic)
                                                
                                                    @if ($topic->subject==$subject)
                                                        {{--  <div class="list-group-item list-group-item-action list-group-item-primary">  --}}
                                                        <a href="{{ route('tests.index',['id'=>$topic->id]) }}" 
                                                        class="list-group-item list-group-item-action list-group-item-primary">
                                                        {{ $topic->title}}</a>
                                                        {{--  </div>  --}}
                                                    @endif
                                                
                                                @endforeach  
                                            </div>


                                </div>

                            </div>{{-- Card div end--}}
                        </div>
                    @endforeach
                </form>
            @endif
        </div>
