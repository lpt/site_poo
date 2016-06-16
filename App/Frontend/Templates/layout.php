<!DOCTYPE html>
<html>
  <head>
    <title>
      <?= isset($title) ? $title : 'Bienvenur sur le site des  Echecs dans la Loire' ?>
    </title>
     
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">-->
	<link rel="stylesheet" href="/css/bootstrap.css">
	<link rel="stylesheet" href="/css/loire.css">
	<!--<link rel="stylesheet" href="/css/Envision.css" type="text/css" />-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
     
	</head>
 
    
 
  <body>
    <div class="container">
		<div id="bloc" class="row">
			<div class="col-lg-12">
				<header>
					<div class="jumbotron">
						<div class="row">
							<div class="col-sm-2 hidden-xs"><p><img src="/images/logo_loirechecs4.jpg" alt="logo" id="logo"/></p></div>
							<div class="col-sm-10 text-center"><h1> Comité Loire Echecs </h1></div> 
						</div>
					</div>
				</header>
 
				<nav class="navbar navbar-default">
					<div class="container">
						<div >
							<ul class="nav navbar-nav">
							<li class="active"><a href="/"><span class="glyphicon glyphicon-home"></span></a></li>
							<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="/">Comité Loire Echecs <span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="/comite-loire-echecs/presentation">Présentation</a></li>
									<li><a href="/comite-loire-echecs/organigramme">Organigramme</a></li>
									<li><a href="/comite-loire-echecs/clubs">Les clubs</a></li>
									<li><a href="/comite-loire-echecs/tarif-des-licences">Tarif des licences</a></li>
									<li><a href="/comite-loire-echecs/documents">Documents</a></li>
								</ul>
							</li>
							<li><a href="/agenda">Calendrier 2015-2016</a></li>
							<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="">Compétitions adultes<span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="/competitions/adultes/top-loire">Top Loire</a></li>
									<li><a href="/competitions/adultes/open-de-la-loire">Open</a></li>
									<li><a href="/competitions/adultes/coupe-de-la-loire">Coupe de la Loire</a></li>
									<li><a href="/competitions/adultes/coupe-loubatiere">Coupe JC Loubatière</a></li>
								</ul>
							<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="/jeunes">Compétitions jeunes<span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="/competitions/jeunes/championnat-scolaire">Championnats scolaires</a></li>
									<li><a href="/competitions/jeunes/championnat-de-la-loire">Championnats de la Loire</a></li>
									<li><a href="/competitions/jeunes/circuit-loire">Circuit Loire</a></li>
									<li><a href="/competitions/jeunes/trophe-jeunes">Trophé Jeunes</a></li>
									<li><a href="/competitions/jeunes/finale-circuit-loire">Finale Circuit Loire</a></li>
								</ul>
							<li><a href="/formation">Formation</a></li>
							<li><a href="/base-des-parties">Base des parties</a></li>
							<li><a href="/elo">Elo</a></li>
							<li><a href="#">Ancien site</a></li>
							
					
					<?php if ($user->isAuthenticated()) { ?>
					
							<li><a href="/admin/">Admin News</a></li>
							<li><a href="/admin/agenda/">Admin Calendrier</a>
							<li><a href="/admin/news-insert.html">Ajouter une news</a></li>
							<li><a href="/admin/agenda-insert.html">Ajouter une date</a></li>
					
					<?php } ?>
							</ul>
						</div>
					</div>
				</nav>

          <?php if ($user->hasFlash()) echo '<div><p style="text-align: center;">', $user->getFlash(), '</p></div>'; ?>
		  
			
     
 
          <?= $content ?>
		  
		  
		  
        
		
		</div>
 
				<footer>
					<div class="row">
						<div class="col-lg-4 col-lg-offset-4">
							<div class="btn-group ">
								<a href="/vues/organigramme.php" class="btn btn_link" ><span class="glyphicon glyphicon-envelope" ></span> Contacts</a>
								<a type="button" class="btn btn-link" href="/vues/liens.php"><span class="glyphicon glyphicon-book" ></span> Liens</a>
								<a type="button" class="btn btn-link" href="/vues/infos.php"><span class="glyphicon glyphicon-info-sign" ></span> Infos</a>
							</div>
						</div>
					</div>
				</footer>
	</div>
  </body>
</html>

