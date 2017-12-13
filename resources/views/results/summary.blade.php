@extends('layouts.app')

@section('content')
<div class="col-md-10">
<h3 class="page-title">@lang('quickadmin.results.title')</h3>
<h1>Welcome to summary</h1>
<?php $topic=AmeyemQuiz\Topic::find($test2->topic_id); ?>
<?php 
$turl=$urls['twitter'];
$furl=$urls['facebook'];
$gurl=$urls['gplus'];
?>

 <div class="card card-inverse col-md-8" id="widget" style="background-color: #cdf; border-color: #333;height:400px;width:700px">
            <div class="card-header">
                AmeyemQuiz
            </div>
            <div class="card-title">
                <div class="row">
                    <div class='col-xs-6'>

                    <img src="{{ asset('/quickadmin/images/logo.png') }}" height="100" width="240">
                    </div>
                    
                    <div class='col-xs-6'>
                    <h1><strong> {{$topic->title}} <small>({{$topic->subject}}) </small> </strong> </h1>

                    </div>
                </div

            </div>
            
            <div class="card-block">
                <div class="row">
                    <div class='col-xs-7'>
                    <h1>Weldone <strong>{{ $test2->user->name or 'My Guest!!' }}!!</strong> and <br><strong> congratulations!!! </strong>on completing your quiz.</h1>
                    <h3><strong>Date:</strong> {{  $mydate or '' }}
                    </div>

                    <div class='col-xs-5'>

                    {{--  <img src="{{ asset($impath " height="200" width="200">  --}}
                    <img src="{{ asset('/quickadmin/images/marks'.$test2->result .'.png') }}" height="200" width="200">
                    {{--  <img src="{{ $impath}}" height="200" width="200">  --}}
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <strong>www.skills.ameyem.com/quiz</strong></h3>
            </div>
 </div>
</div>
 
    <div class="col-md-4"  >
            
            <h3> <strong>Share and see detailed question answers...</strong></h3>
            <hr>
            <div>
                
                {{--  {{$turl}}  --}}
                <a target="_blank" href=  "{{$turl}}" onclick="return hola();"> <i class="fa fa-twitter-square fa_custom fa-4x" style="font-size:48px;color:#0084b4"></i></a>
                <a target="_blank" href=  "{{$furl}}" onclick="return hola();"> <i class="fa fa-facebook-square fa_custom fa-4x" style="font-size:48px;color:#3b5998"></i></a>
                <a target="_blank" href="{{$gurl}}" onclick="return hola();"><i class="fa fa-google-plus-square fa_custom fa-4x" style="font-size:48px;color:#d34836"></i></a>
                
                <div id="cont1" class="list-group" style="display:none">
                <a href="{{ route('results.show', [$test2->id])}}" class="list-group-item">Detailed Result</a>
                </div>
                <h1 hidden>{{$fileuid}}</h1>
            </div>
    </div>
        {{--  route('results.show', [$test2->id]);  --}}



 <script type="text/javascript" src="{{ url('quickadmin/js') }}/html2canvas.js"></script>
 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
 {{--  <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>  --}}

<script>
var savefid='';
var fileuid = "<?php echo $fileuid; ?>";
    html2canvas($("#widget"), {
        onrendered: function(canvas) {
             var dataURL = canvas.toDataURL();
                               // console.log(dataURL)
                                $.ajax({
                                    type: "POST",
                                    url: "{{ url('quickadmin/serverside') }}/script.php",
                                    data: { 
                                       imgBase64: dataURL,fileuid:fileuid
                                    }
                                  }).done(function(o) {
                                    console.log(o); 
                                    savefid=o;
                                   // window.location.href = "myphpfile.php?name=" + javascriptVariable; 
                                   // <?php $abc = "<script>document.write(savefid)</script>";?>   
                                    // If you want the file to be visible in the browser  , fileuid: fileuid
                                    // - please modify the callback in javascript. All you
                                    // need is to return the url to the file, you just saved 
                                    // and than put the image in your browser.
                                  });

                    }
                });
</script>

<script>

            function hola() {
                 var x = document.getElementById("cont1");
                x.style.display = "block";
                    //document.getElementById("cont1").style.visibility="block";
                    console.log("entered")

            }
</script>




@stop
 