<!doctype HTML>
<html lang="en">
<meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0'/>
<title> Mu Philippines - The best MU Online Server in the Philippines </title>
<meta content="Dedicated MU Online Server in the Philippines that is online since 2011. Play with stable and shutdown free MU Server!" name="description">
    <meta content="With over hundreds of veteran players from the old school MU Online Wigle Server" name="keywords">
<head> 
<link rel="icon" type="image/ico" href="{{ URL::to('/') }}/img/favicon.ico">
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<link rel="stylesheet" href="//oss.maxcdn.com/jquery.bootstrapvalidator/0.5.2/css/bootstrapValidator.min.css">
<link rel="stylesheet" href="{{ URL::to('/') }}/css/style.css">

<script src="//oss.maxcdn.com/jquery/1.11.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//oss.maxcdn.com/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js"></script>
<script src="{{ URL::to('/') }}/js/scripts.js"></script>

</head>

<body>
<div id="main-header">
<div class="container" id="navigation-img">
	<img src="{{ URL::to('/') }}/img/main-banner.jpg">
</div>
<div class="container" id="navigation-border">
	<ul class="navigation">
		<a href="#home" class="home-link" title="Home Page"><li>HOME</li></a>
		<a href="#register" class="register-link" title="Register with us"><li>REGISTER</li></a>
		<a href="#download" class="download-link" title="Download Client"><li>DOWNLOADS</li></a>
		<a href="#rankings" class="rankings-link" title="Player Rankings"><li>RANKINGS</li></a>
		<a href="#forums" title="Community"><li>FORUMS</li></a>
		@if($login == 1)
		<li>
		<a href="#account" title="Account" class="account-in dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
			MY ACCOUNT <span class="caret"></span>
		</a>
			<ul class="dropdown-menu" role="menu" id="userpanel">
				<li><a href="javascript:void:(0)">{{$userinfo->username}}</a></li>
				<li class="divider"></li>
				<li><a href="javascript:void:(0)" class="change-password">Change Password</a></li>
				<li><a href="#">Character Management</a></li>
				<li class="divider"></li>
				<li><a href="/logout">Logout</a></li>
			</ul>
		</li>
		@else
		<a href="#account" class="account-link" title="Account"><li>ACCOUNT</li></a>
		@endif
	</ul>
</div>

</div>