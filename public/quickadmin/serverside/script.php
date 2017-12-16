<?php
	// requires php5
	define('UPLOAD_DIR', './images/');
	$img = $_POST['imgBase64'];
	$img = str_replace('data:image/png;base64,', '', $img);
	$img = str_replace(' ', '+', $img);
	$data = base64_decode($img);
	$fileuid=$_POST['fileuid'];
	$file = UPLOAD_DIR . $fileuid . '.png';
	$success = file_put_contents($file, $data);
	print $success ? $file : 'Unable to save the file.';

	//define('HTML_DIR', '../../u/');
	define('HTML_DIR', '../../u/');
	$htmlFile = HTML_DIR . $fileuid . '.html';; // or .php   
	$fh = fopen($htmlFile, 'w'); // or die("error");  /u/'.$fileuid.'.html
	$stringData = '
	<html>
	<head>
		<meta name="twitter:card" content="summary" />
		<meta name="twitter:site" content="@myameyem" />
		<meta name="twitter:creator" content="@myameyem" />
		<meta name="twitter:url" content="http://skills.ameyem.com/quiz">
		<meta name="twitter:title" content="AmeyemQuiz - How well do you know your subject? Test yourself">
		<meta name="twitter:description" content="Ameyem Quiz. Powered by skills.ameyem.com/quiz This is a way to test & improve your skills time to time and keep the records in an intelligent manner">
		<meta name="twitter:image" content="http://skills.ameyem.com/quiz/quickadmin/serverside/images/'.$fileuid.'.png">

		<meta property="og:title" content="AmeyemQuiz - How well do you know your subject? Test yourself" />
		<meta property="og:image" content="http://skills.ameyem.com/quiz/quickadmin/serverside/images/'.$fileuid.'.png" />
		<meta property="og:description" content="Ameyem Quiz. Powered by skills.ameyem.com/quiz This is a way to test & improve your skills time to time and keep the records in an intelligent manner" />
		<meta property="og:url" content="http://skills.ameyem.com/quiz/u/'.$fileuid.'.html" />
		<meta http-equiv="refresh" content="0; url=http://skills.ameyem.com/quiz" />
	</head>
	<body>
	<img src="../quickadmin/serverside/'.$file.'">
	  </body>
 	 </html>
  '; 
	fwrite($fh, $stringData);
	fclose($fh);
	// $mydstr=json_encode($fileuid);
	return $fileuid;
?>
