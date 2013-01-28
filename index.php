<!DOCTYPE html>
<html lang="es">
<head>
	<title>Palette Controller</title>
	<meta charset="utf-8" />
	
	<link rel="stylesheet" href="css/main.css" type="text/css" />

	<!--[if IE]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	
	<!--[if lte IE 7]>
		<link rel="stylesheet" type="text/css" media="all" href="css/ie.css"/>
		<script src="js/IE8.js" type="text/javascript"></script><![endif]-->
		
	<!--[if lt IE 7]>
		<link rel="stylesheet" type="text/css" media="all" href="css/ie6.css"/><![endif]-->

</head>

<body id="index" class="home">
	
	<header id="banner" class="body">
		<h1><a href="">Palette Controller</a></h1>
		<nav><ul>
			<li class="active"><a href="http://jchernus.com/palette">home</a></li>
			<li><a href="http://jchernus.com/palette/technical">technical</a></li>
			<li><a href="http://jchernus.com/palette/team">team</a></li>
			<li><a href="http://jchernus.com/palette/contact">contact</a></li>
		</ul></nav>
	</header><!-- /#banner -->
	
	<aside id="featured" class="body"><article>
		<figure>
			<img src="images/200px.png" alt="Smashing Magazine" />
		</figure>
		<hgroup>
			<h2>Palette at the Ontario Engineering Competition!</h2>
		</hgroup>
		<p>The University of Waterloo chose Palette to represent the university at the Ontario Engineering Competition for Innovatie Design. Read more about the competition <a href="http://www.oec2013.ca/competitions.html" target="_blank">here</a>, and we'll make sure to keep you updated on our results!</p>
	</article></aside><!-- /#featured -->
	
	<section id="content" class="body">
		
			<!-- The Latest Text Post -->
			<?php
				echo "";
				ini_set('allow_url_fopen ','ON');
				
				$feed ='http://palette-controller.tumblr.com/api/read?type=regular';
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, $feed);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				// get the result of http query
				$output = curl_exec($ch);
				curl_close($ch);
				$xml = simplexml_load_file($output);

				//$request_url = "http://palette-controller.tumblr.com/api/read?type=regular"; //get xml file
				//$xml = simplexml_load_file($request_url); //load it
				$title = $xml->posts->post->{'regular-title'}; //load post title into $title
				$post = $xml->posts->post->{'regular-body'}; //load post body into $post
				$link = $xml->posts->post['url']; //load url of blog post into $link
				$small_post = substr($post,0,350); //shorten post body to 350 characters
				echo // spit that baby out with some stylish html
					'<div class="panel" style="width:220px;margin:0 auto;text-align:left;">
						<h1 class="med georgia bold italic black">'.$title.'</h1>'
						. '<br />' 
						. '<span>'.$small_post.'</span>' . '...' 
						. '<br /></br><div style="text-align:right;"><a class="bold italic blu georgia" href="'.$link.'">Read More...</a></div>
					</div>
					<img style="position:relative;top:-6px;" src="pic/shadow.png" alt="" />
				'; 
			?>
		
	</section><!-- /#content -->
	
	<footer id="contentinfo" class="body">
		<address id="about" class="vcard body">
			<span class="primary">
				<strong><a href="#" class="fn url">FYDP</a></strong>
				<span class="role">SYDE & TRON 13</span>
			</span><!-- /.primary -->
		
			<img src="images/avatar.gif" alt="Smashing Magazine Logo" class="photo" />
		
			<span class="bio">Some random info goes here.</span>
		
		</address><!-- /#about -->
		
		<p>2005-2009 <a href="http://smashingmagazine.com">Smashing Magazine</a>.</p>
	</footer><!-- /#contentinfo -->

</body>
</html>
