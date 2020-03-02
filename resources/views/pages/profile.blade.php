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
        function hideURLbar(){ window.scrollTo(0,1); } </script>
<base href="{{asset('')}}">
<!-- js -->
<script src="source/js/jquery-2.1.4.min.js" type="text/javascript"></script>
<script type="text/javascript" src="source/js/sliding.form.js"></script>
<!-- //js -->
<link href="source/css/style3.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="source/css/font-awesome3.min.css" />
<link rel="stylesheet" href="source/css/smoothbox3.css" type='text/css' media="all" />
<link href="//fonts.googleapis.com/css?family=Pathway+Gothic+One" rel="stylesheet">
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
</head>
<body>
    <div>
        <h1>
            <a class="HomepPage" href="{{route('trangchu')}}">
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
		<div id="wrapper" class="w3ls_wrapper w3layouts_wrapper">
			<div id="steps" style="margin:0 auto;" class="agileits w3_steps">
				<form id="formElem" name="formElem" action="#" method="post" class="w3_form w3l_form_fancy">
					<fieldset class="step agileinfo w3ls_fancy_step">
						<legend>Profile</legend>
						<div class="abt-agile">
							<div class="abt-agile-left">
							</div>
							<div class="abt-agile-right">
								<h3>{{$user->full_name}}</h3>
								<h5>Guest</h5>
								<ul class="address">
									<li>
										<ul class="address-text">
											<li><b>D.O.B </b></li>
											<li>: not done yet</li>
										</ul>
									</li>
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
                                            <li><form action="" method="get" style="margin-top:10px">
                                                <input type="submit" value="Update" class="btn btn-danger"/>
                                            </form></li>
										</ul>
									</li>

								</ul>
							</div>
								<div class="clear"></div>
						</div>
					</fieldset>
					<fieldset class="step wthree">
						<legend>Work</legend>
						<div class="work-w3agile">
							<div class="work-w3agile-top">
								<div class="agileits_w3layouts_work_grid1 w3layouts_work_grid1 hover14 column">
									<div class="w3_agile_work_effect">
										<ul>
											<li>
												<a href="source/images/c1.jpg" class="sb" title="Quis Nostrud Exercitation Ullamco Laboris Quis Autem Vel Eum Iure Reprehenderit">
													<figure>
														<img src="source/images/c1.jpg" alt=" " class="img-responsive" />
													</figure>
												</a>
											</li>
											<li>
												<a href="source/images/c2.jpg" class="sb" title="Quis Nostrud Exercitation Ullamco Laboris Quis Autem Vel Eum Iure Reprehenderit">
													<figure>
														<img src="source/images/c2.jpg" alt=" " class="img-responsive" />
													</figure>
												</a>
											</li>
											<li>
												<a href="source/images/c3.jpg" class="sb" title="Quis Nostrud Exercitation Ullamco Laboris Quis Autem Vel Eum Iure Reprehenderit">
													<figure>
														<img src="source/images/c3.jpg" alt=" " class="img-responsive" />
													</figure>
												</a>
											</li>
											<li>
												<a href="source/images/c4.jpg" class="sb" title="Quis Nostrud Exercitation Ullamco Laboris Quis Autem Vel Eum Iure Reprehenderit">
													<figure>
														<img src="source/images/c4.jpg" alt=" " class="img-responsive" />
													</figure>
												</a>
											</li>
											<li>
												<a href="source/images/c5.jpg" class="sb" title="Quis Nostrud Exercitation Ullamco Laboris Quis Autem Vel Eum Iure Reprehenderit">
													<figure>
														<img src="source/images/c5.jpg" alt=" " class="img-responsive" />
													</figure>
												</a>
											</li>
											<li>
												<a href="source/images/c6.jpg" class="sb" title="Quis Nostrud Exercitation Ullamco Laboris Quis Autem Vel Eum Iure Reprehenderit">
													<figure>
														<img src="source/images/c6.jpg" alt=" " class="img-responsive" />
													</figure>
												</a>
											</li>
												<div class="clear"></div>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</fieldset>
					<fieldset class="step w3_agileits">
						<legend>Contact</legend>
							<div class="agilecontactw3ls-grid">
								<div class="agile-con-left">
									<form action="#" method="post">
										<input type="text" name="First Name" placeholder="FIRST NAME" required="">
										<input type="email" name="Email" placeholder="EMAIL" required="">
										<textarea name="Message" placeholder="MESSAGE" required=""></textarea>
										<div class="send-button">
											<input type="submit" value="SEND">
										</div>
									</form>
								</div>
								<div class="agile-con-right">
									<h6>Address :-</h6>
									<p><span><i class="fa fa-map-marker" aria-hidden="true"></i></span>22 Russell Street, Victoria ,Melbourne AUSTRALIA </p>
									<p><span><i class="fa fa-envelope" aria-hidden="true"></i></span><a href="#">E: info [at] domain.com</a> </p>
									<p><span><i class="fa fa-mobile" aria-hidden="true"></i></span>P: +254 2564584 / +542 8245658 </p>
									<p><span><i class="fa fa-globe" aria-hidden="true"></i></span><a href="#">W: www.w3layouts.com</a></p>
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
