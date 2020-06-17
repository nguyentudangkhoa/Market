<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
@if(Auth::check())
@if(Auth::user()->email == $user->email)
<!DOCTYPE html>
<html lang="en">
<head>
<title>Consultancy Profile Widget Flat Responsive Widget Template :: w3layouts</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Consultancy Profile Widget Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
        function hideURLbar(){ window.scrollTo(0,1); }; </script>
<base href="{{asset('')}}">
<!-- js -->
<script src="source/js/jquery-2.1.4.min.js" type="text/javascript"></script>
<script type="text/javascript" src="source/js/sliding.form.js"></script>
<!-- //js -->
<link href="source/css/style3.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="source/css/font-awesome3.min.css" />
<link rel="stylesheet" href="source/css/smoothbox3.css" type='text/css' media="all" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link href="//fonts.googleapis.com/css?family=Pathway+Gothic+One" rel="stylesheet">
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
</head>
<body>
    <div>
        <h1>
            <a class="HomepPage" href="{{route('index')}}">
                <img src="source/images/logo2.png" alt=" ">
            </a>
        </h1>
    </div>
	<div class="main">
		<h1>Consultancy Profile Widget</h1>
		<div id="navigation" style="display:none;" class="w3_agile">
			<ul>
				<li class="selected">
					<a href="#"><i class="fa fa-home" aria-hidden="true"></i><span>Home</span></a>
				</li>
				<li>
					<a href="#"><i class="fa fa-folder" aria-hidden="true"></i><span>Work</span></a>
				</li>
				<li>
					<a href="#"><i class="fa fa-envelope" aria-hidden="true"></i><span>Contact</span></a>
				</li>
			</ul>
		</div>
		<div id="wrapper"  class="w3ls_wrapper w3layouts_wrapper">
			<div id="steps" style="margin:0 auto;" class="agileits w3_steps">
            <form action="{{route('updateProfile',$user->id)}}" method="get" class="w3_form w3l_form_fancy">
					<fieldset class="step agileinfo w3ls_fancy_step">
						<legend>Profile</legend>
						<div class="abt-agile">
							<div class="abt-agile-left">
                                <img src="source/images/profile/{{$user->images_prof}}" class="img-profile" alt="">
							</div>
							<div class="abt-agile-right">
								<h3>{{$user->full_name}}</h3>
								<h5>Guest</h5>
								<ul class="address">
									<li>
										<ul class="address-text">
											<li><b>PHONE </b></li>
											<li>: {{$user->phone}}</li>
										</ul>
									</li>
									<li>
										<ul class="address-text">
											<li><b>ADDRESS </b></li>
											<li>: {{$user->address}}.</li>
										</ul>
									</li>
									<li>
										<ul class="address-text">
											<li><b>E-MAIL </b></li>
                                            <li><a href="mailto:example@mail.com">: {{$user->email}}</a></li>
                                            <li><input type="submit" value="Update" class="btn btn-danger"/></li>
                                            <li>
                                                <a href="{{ route('History') }}" class="Buyed"> >> Buy History</a>
                                            </li>
										</ul>
                                    </li>

								</ul>
							</div>
								<div class="clear"></div>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
		<div class="agileits_copyright">
			<p>© 2017 Consultancy Profile Widget. All rights reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
		</div>
	</div>
	<script type="text/javascript" src="source/js/smoothbox.jquery2.js"></script>
</body>
</html>
@else
<div class="address_form_agile">
    <h4>Page do not exist</h4>
</div>
@endif
@else
<div class="address_form_agile">
    <h4>Page do not exist</h4>
</div>
@endif
