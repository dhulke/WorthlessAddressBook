<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<meta name="description"
	content="Just a worthless Address Book to prove I'm actually not lying about knowing PHP, JS and CSS">
<meta name="author" content="Danilo Souza Morães">
<link rel="icon" href="../../favicon.ico">

<title>Navbar Template for Bootstrap</title>

<!-- Bootstrap core CSS -->
<link rel="stylesheet"
	href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
	integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
	crossorigin="anonymous">

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<link href="<?php $this->css('/ie10-viewport-bug-workaround.css') ?>"
	rel="stylesheet">

<!-- Custom styles for this template -->
<link href="<?php $this->css('/main.css') ?>" rel="stylesheet">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <link rel="stylesheet"
	href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">

<script
	src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script
	src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
	integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
	crossorigin="anonymous"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="<?= $this->js('/ie10-viewport-bug-workaround.js') ?>"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script
	src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script
	src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
	<script
	src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
	<script
	src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.min.js"></script>
	
	<script>var url = '<?= $this->url()?>';</script>
</head>

<body>

	<div class="container">

		<!-- Static navbar -->
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed"
						data-toggle="collapse" data-target="#navbar" aria-expanded="false"
						aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span> <span
							class="icon-bar"></span> <span class="icon-bar"></span> <span
							class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#">Worthless Address Book</a>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
						<li
							class="<?= isset($data['controller']) && $data['controller'] === 'Index' ? 'active' : ''?>"><a
							href="<?php $this->url('/Index') ?>">Home</a></li>
						<li
							class="<?= isset($data['controller']) && $data['controller'] === 'Contact' ? 'active' : ''?>"><a
							href="<?php $this->url('/Contact') ?>">Contacts</a></li>
						<li
							class="<?= isset($data['controller']) && $data['controller'] === 'User' ? 'active' : ''?>"><a
							href="<?php $this->url('/User') ?>">Users</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
            	<?php if(\Framework\Auth::check()):?>
              <li><a href="<?php $this->url('/Auth/logout') ?>">Logout</a></li>
              <?php else:?>
              <li><a href="<?php $this->url('/User/create') ?>">Signup</a></li>
						<li><a href="<?php $this->url('/Auth/login') ?>">Login</a></li>
				<?php endif;?>
            </ul>
				</div>
				<!--/.nav-collapse -->
			</div>
			<!--/.container-fluid -->
		</nav>
		<?php if($message = \Framework\Flash::get(\Framework\Flash::ERROR)):?>
		<div class="alert alert-danger" role="alert"><?= $message ?></div>
		<?php endif;?>