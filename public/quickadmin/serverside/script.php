<?php
	// requires php5
	define('UPLOAD_DIR', 'http://skills.ameyem.com/quiz/quickadmin/serverside/images/');
	$img = $_POST['imgBase64'];
	$img = str_replace('data:image/png;base64,', '', $img);
	$img = str_replace(' ', '+', $img);
	$data = base64_decode($img);
	$fileuid=$_POST['fileuid'];
	$file = UPLOAD_DIR . $fileuid . '.png';
	$success = file_put_contents($file, $data);
	print $success ? $file : 'Unable to save the file.';

	//define('HTML_DIR', '../../u/');
	define('HTML_DIR', 'http://skills.ameyem.com/quiz/u/');
	$htmlFile = HTML_DIR . $fileuid . '.html';; // or .php   
	$fh = fopen($htmlFile, 'w'); // or die("error");  
	$stringData = '
	<html>
	<head>
		<meta property="og:title" content="AmeyemQuiz - how well do you know your subject? Test yourself" />
		<meta property="og:image" content="http://skills.ameyem.com/quiz/quickadmin/serverside/'.$file.'" />
		<meta property="og:description" content="Ameyem Quiz. Powered by skills.ameyem.com" />
		<meta property="og:url" content="http://skills.ameyem.com/quiz/u/'.$fileuid.'.html" />
	</head>
	<body>
	<img src="../quickadmin/serverside/'.$file.'">
	<a href="http://skills.ameyem.com/quiz">Take me to quiz</a>
	  <h1>Hello your File</h1>
	  </body>
 	 </html>
  '; 
	fwrite($fh, $stringData);
	fclose($fh);
	// $mydstr=json_encode($fileuid);
	return $fileuid;
?>