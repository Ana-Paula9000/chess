<?php
session_start();
include 'config.php';

if(isset($_SESSION['PLAYER'])){
	$user = mysql_query("SELECT * FROM usuarios WHERE id='".$_SESSION['PLAYER']."'");
	$USER = mysql_fetch_array($user);
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<!-- META -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta name="description" content="">
	<meta name="author" content="">
	
	<title>Xadrez Online - Chess Master</title>
	
	<!-- FAVICON -->
	<link rel="shortcut icon" href="img/favicon.ico">
	
	<!-- CORE CSS -->
	<link href="/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'> 
    
	<!-- PLUGINS -->
	<link href="/plugins/animate/animate.min.css" rel="stylesheet">
	<link href="/plugins/owl-carousel/owl.carousel.css" rel="stylesheet">

	<!-- THEME CSS -->
	<link href="/css/theme.min.css" rel="stylesheet">
	<link href="/css/custom.css" rel="stylesheet">
</head>

<body class="fixed-header no-padding-right">
	<header>
		<div class="" style="padding-left:15px; padding-right:15px;">
			<span class="bar hide"></span>
			<a href="index.html" class="logo"><img src="/img/logo.png" alt=""></a>
			<nav>
				<div class="nav-control">
					<ul>
						<li class=""><a href="/">Home</a></li>
						<li class="dropdown mega-dropdown">
							<a href="#">Jogar</a>
							<ul class="dropdown-menu mega-dropdown-menu category">
								<li class="col-md-3">
									<a href="/Xadrez-Online">
										<img src="/img/game/menu-1.jpg" alt="">
										<div class="caption">
											<span class="label label-warning">Online</span>
											<h3>Xadrez Online - Ao Vivo</h3>
										</div>
									</a>
								</li>
								<li class="col-md-3">
									<a href="/Desenvolvimento">
										<img src="/img/game/menu-2.jpg" alt="">
										<div class="caption">
											<span class="label label-primary">Torneio</span>
											<h3>Torneios de Xadrez Online</h3>
										</div>
									</a>
								</li>
								<li class="col-md-3">
									<a href="/Desenvolvimento">
										<img src="/img/game/menu-3.jpg" alt="">
										<div class="caption">
											<span class="label label-success">Correspondência</span>
											<h3>Xadrez por Correspondência - Turno</h3>
										</div>
									</a>
								</li>
								<li class="col-md-3">
									<a href="games-single.html">
										<img src="/img/game/menu-4.jpg" alt="">
										<div class="caption">
											<span class="label label-danger">Assistir</span>
											<h3>Assistir Jogos de Xadrez Online</h3>
										</div>
									</a>
								</li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle">Treino</a>
							<ul class="dropdown-menu default">
								<li class="dropdown-submenu">
									<a href="blog-large.html"><i class="fa fa-align-justify"></i> Blog Large</a>
									<ul class="dropdown-menu">
										<li><a href="blog-large.html">Archive</a></li>
										<li><a href="blog-large-sidebar.html">Sidebar</a></li>
										<li><a href="blog-large-post.html">Single Post</a></li>
									</ul>
								</li>
								<li class="dropdown-submenu">
									<a href="blog-medium.html"><i class="fa fa-list-ul"></i> Blog Medium</a>
									<ul class="dropdown-menu">
										<li><a href="blog-medium.html">Archive</a></li>
										<li><a href="blog-medium-sidebar.html">Sidebar</a></li>
										<li><a href="blog-medium-post.html">Single Post</a></li>
									</ul>
								</li>
								<li class="dropdown-submenu">
									<a href="blog-post.html"><i class="fa fa-file-o"></i> Single Post</a>
									<ul class="dropdown-menu">
										<li><a href="blog-post.html">Blog Image Post</a></li>
										<li><a href="blog-post-slideshow.html">Blog Slideshow Post</a></li>
										<li><a href="blog-post-video.html">Blog Video Post</a></li>
										<li><a href="blog-post-music.html">Blog Music Post</a></li>
										<li><a href="blog-post-disqus.html">Blog Disqus Post</a></li>
									</ul>
								</li>
								<li class="divider"></li>
								<li><a href="blog-masonry.html"><i class="fa fa-th-large"></i>Blog Masonry</a></li>
								<li><a href="blog-thumbnail.html"><i class="fa fa-clone"></i>Blog Thumbnail</a></li>
								<li><a href="blog-timeline.html"><i class="fa fa-clock-o"></i>Blog Timeline</a></li>
							</ul>
						</li>
						<li class="dropdown mega-dropdown mega-dropdown-sm">
							<a href="#">Pages</a>
							<ul class="dropdown-menu mega-dropdown-menu row">
								<li class="col-md-6">
									<ul>
										<li class="dropdown-header">Default Examples</li>
										<li><a href="games.html">Games</a></li>
										<li><a href="games-single.html">Game Post</a></li>
										<li><a href="reviews.html">Reviews</a></li>
										<li><a href="reviews-single.html">Review Post</a></li>
										<li><a href="videos.html">Videos</a></li>
										<li><a href="videos-single.html">Videos Post</a></li>
										<li><a href="contact.html">Contact</a></li>
									</ul>
								</li>
								<li class="col-md-6">
									<ul>
										<li class="dropdown-header">Initial Examples</li>
										<li><a href="login.html">Login</a></li>
										<li><a href="register.html">Register</a></li>
										<li><a href="profile.html">Profile Page</a></li>
										<li><a href="forum.html">Forums</a></li>
										<li><a href="fullwidth.html">Full Width</a></li>
										<li><a href="blank-page.html">Blank Page</a></li>
										<li><a href="404.html">404 Error</a></li>
									</ul>
								</li>
							</ul>
						</li>
						<li class="dropdown mega-dropdown">
							<a href="#">Elements</a>
							<ul class="dropdown-menu mega-dropdown-menu row" style="background-image: url(img/content/menu.png);">
								<li class="col-md-3">
									<ul>
										<li class="dropdown-header">Typography</li>
										<li><a href="elements-typography.html"><i class="fa fa-text-height"></i> General Typography</a></li>
										<li><a href="elements-blockquote.html"><i class="fa fa-quote-left"></i> Blockquote</a></li>
										<li><a href="elements-helpers.html"><i class="fa fa-square-o"></i> Helper Classes</a></li>
										<li><a href="elements-testimonials.html"><i class="fa fa-bullhorn"></i> Testimonials</a></li>
										<li><a href="elements-grids.html"><i class="fa fa-th-large"></i> Grid Layouts</a></li>
										<li><a href="elements-alerts.html"><i class="fa fa-bell-o"></i> Alert & Messages</a></li>
										<li><a href="elements-labels.html"><i class="fa fa-bookmark-o"></i> Labels & Badges</a></li>
										<li><a href="elements-media.html"><i class="fa fa-image"></i> Audio, Videos & Images</a></li>
										<li><a href="elements-pagers.html"><i class="fa fa-ellipsis-h"></i> Pagination & Pagers</a></li>
									</ul>
								</li>
								<li class="col-md-3">
									<ul>
										<li class="dropdown-header">Button & Icons</li>
										<li><a href="elements-buttons.html"><i class="fa fa-flash"></i> General Buttons</a></li>
										<li><a href="elements-social-buttons.html"><i class="fa fa-thumbs-o-up"></i> Social Buttons</a></li>
										<li><a href="elements-glyphicons.html"><i class="fa fa-chevron-circle-right"></i> Glyphicons</a></li>
										<li><a href="elements-fontawesome.html"><i class="fa fa-chevron-circle-right"></i> FontAwesome</a></li>
										<li><a href="elements-ionicons.html"><i class="fa fa-chevron-circle-right"></i> IonIcons</a></li>
										<li class="dropdown-header">Components</li>
										<li><a href="elements-media-objects.html"><i class="fa fa-align-justify"></i> Media Objects</a></li>
										<li><a href="elements-page-headers.html"><i class="fa fa-align-justify"></i> Page headers</a></li>
										<li><a href="elements-wells.html"><i class="fa fa-align-justify"></i> Wells</a></li>
									</ul>
								</li>
								<li class="col-md-3">
									<ul>
										<li class="dropdown-header">Default Elements</li>
										<li><a href="elements-widgets.html"><i class="fa fa-th"></i> Widgets</a></li>
										<li><a href="elements-sections.html"><i class="fa fa-th"></i> Sections</a></li>
										<li><a href="elements-thumbnails.html"><i class="fa fa-file-o"></i> Thumbnails</a></li> 
										<li><a href="elements-cards.html"><i class="fa fa-sticky-note-o"></i> Cards</a></li>   
										<li><a href="elements-tabs.html"><i class="fa fa-external-link"></i> Accordion & Tabs</a></li>
										<li><a href="elements-timeline.html"><i class="fa fa-th-large"></i> Timeline</a></li>
										<li><a href="elements-tables.html"><i class="fa fa-th"></i> Tables</a></li>
										<li><a href="elements-progress.html"><i class="fa fa-arrows-h"></i> Progress Bars</a></li>
										<li><a href="elements-panels.html"><i class="fa fa-th"></i> Panels</a></li>
									</ul>
								</li>
								<li class="col-md-3">
									<ul>
										<li class="dropdown-header">Forms & Info</li>
										<li><a href="elements-forms.html"><i class="fa fa-align-justify"></i> Form Elements</a></li>
										<li><a href="elements-form-layouts.html"><i class="fa fa-align-justify"></i> Form Layouts</a></li>		
										<li><a href="elements-modals.html"><i class="fa fa-external-link"></i> Modals</a></li>			 	
										<li><a href="elements-carousel.html"><i class="fa fa-arrows"></i> Carousel Examples</a></li>		
										<li><a href="elements-charts.html"><i class="fa fa-bar-chart-o"></i> Charts & Countdowns</a></li>		
										<li><a href="elements-google-maps.html"><i class="fa fa-map-marker"></i> Google Maps</a></li>		                                             
									</ul>
								</li>
							</ul>
						</li>
						<li><a href="videos.html">Videos</a></li>
						<li><a href="gallery.html">Gallery</a></li>
						<li><a href="contact.html">Contact</a></li>
					</ul>
				</div>
			</nav>
			<div class="nav-right">
				<?php
				if(isset($_SESSION['PLAYER'])){?>
					<div class="nav-profile dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php if($USER['foto'] == ''){echo'<img src="/img/users.png" alt="">'; }?> <span><?php echo $USER['nome']; ?></span></a>
					<ul class="dropdown-menu">
						<li><a href="#"><i class="fa fa-user"></i> Perfil</a></li>
						<li><a href="#"><i class="fa fa-heart"></i> Seguidores</a></li>
						<li><a href="#"><i class="fa fa-gamepad"></i> Jogos</a></li>
						<li><a href="#"><i class="fa fa-gear"></i> Configurações</a></li>
						<li class="divider"></li>
						<li><a href="sair.php"><i class="fa fa-power-off"></i> Sair</a></li>
					</ul>
					</div>
					<?php
				}else{
					?>
					<a href="#signin" data-toggle="modal"><span>Login / Registro</span></a>
					<?php
				}
				?>
				
				<?php
				if(isset($_SESSION['PLAYER'])){ ?>
				<div class="nav-dropdown dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <span class="label label-danger">3</span></a>
					<ul class="dropdown-menu">
						<li class="dropdown-header"><i class="fa fa-bell"></i> You have 5 new games</li>
						<li><a href="#">Alien Isolation</a></li>
						<li><a href="#">Witcher 3 <span class="label label-success">XBOX</span></a></li>
						<li><a href="#">Last of Us</a></li>
						<li><a href="#">Uncharted 4 <span class="label label-primary">PS4</span></a></li>
						<li><a href="#">GTA 5 <span class="label label-warning">PC</span></a></li>
						<li class="dropdown-footer"><a href="#">View all games</a></li>
					</ul>
				</div>
				<?php
				}
				?>
				<a href="#" data-toggle="modal-search"><i class="fa fa-search"></i></a>
			</div>
		</div>
	</header>
	<!-- /header -->
	
	<div class="modal-search">
		<div class="container">
			<input type="text" class="form-control" placeholder="Digite o que deseja pesquisar...">
			<i class="fa fa-times close"></i>
		</div>
	</div><!-- /.modal-search -->
		<!-- wrapper --> 
	<div id="wrapper">	
	