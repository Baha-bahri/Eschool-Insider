<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Admin Dashboard </title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">
    <script src="https://kit.fontawesome.com/90913221dc.js" crossorigin="anonymous"></script>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link href="./main.css" rel="stylesheet">
<link href="css1.css" rel="stylesheet">
</head>
<body>
<div id='wrapper' style="margin-left: 30%;">
  		<div class='cool_btn1 green'>
		  <a href="index.php?add_course" style="text-decoration: none;"> <?php echo total_course(); ?>
				<h1>Courses</h1></a>
				
			</div>
			<div class='cool_btn1 teal'>
            <a href="index.php?lesson" style="text-decoration: none;"><h1 class='top'><?php echo total_lesson(); ?>
				<h1>Lessons</h1></a>
			</div>
			<div class='cool_btn1 blue'>
			<a href="index.php?learner" style="text-decoration: none;">  <h1 class='top'><?php echo total_learner(); ?>
				<h1>Learners</h1> </a>
			</div>
			<div class='cool_btn1 orange'>
			<a href="index.php?teacher" style="text-decoration: none;"><h1 class='top'>	 <?php echo total_teacher(); ?>
				<h1>Teachers</h1></a>
			</div>
            <div class='cool_btn1 pink'>
			<a href="index.php?terms" style="text-decoration: none;">	<h1>Terms</h1></a>
				
			</div>
			<div class='cool_btn1 gold'>
            
			<a href="index.php?contact" style="text-decoration: none;"><h1>Contact</h1>
			</div></a>
			<div class='cool_btn1 purple'>
			<a href="index.php?faqs" style="text-decoration: none;"><h1>F&Qs</h1>
			</div></a>
			<div class='cool_btn1 red'>
			<a href="index.php?about" style="text-decoration: none;"><h1>About Us</h1></a>
			</div>
		</div>
		
    </div>	
</body>
</html>
