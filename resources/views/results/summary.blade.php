@extends('layouts.app')

@section('content')
<h3 class="page-title">@lang('quickadmin.results.title')</h3>
<h1>Welcome to summary</h1>
<?php $topic=AmeyemQuiz\Topic::find($test2->topic_id); ?>

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
                <h1>Weldone <strong>{{ $test2->user->name or 'Guest' }}!!</strong> and <br><strong> congratulations!!! </strong>on completing your quiz.</h1>
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
<h3> <strong>Would you like to share this with your friends!!!!? Great!!! It's a click away...</strong></h3>
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
<div>
<?php 
echo  'php_'.$abc;
$myid= "hi";
$turl=$urls['twitter'];
$furl=$urls['facebook'];

?>
<h1>{{$fileuid}}</h1>
<a href=  "{{$turl}}"
    target="_blank">
    Share on twitter
</a>
<a href=  "{{$furl}}"
    target="_blank">
    Share on Facebook
</a>
<p>{{$urls['twitter']}}</p>
<p>{{$urls['facebook']}}</p>
<p>{{$urls['gplus']}}</p>
</div>
@stop
