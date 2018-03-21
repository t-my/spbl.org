<?php
require('./wp-blog-header.php');
?>
<!doctype html>
<html class="no-js" lang="en">
    <head>
        <!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-116130912-1"></script>
	<script>
  		window.dataLayer = window.dataLayer || [];
  		function gtag(){dataLayer.push(arguments);}
  		gtag('js', new Date());
		gtag('config', 'UA-116130912-1');
	</script>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>spbl.org</title>
        <meta name="description" content="spbl.org">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <!-- Optional theme -->
        <link rel="stylesheet" href="styles/bootstrap.min.css">
        <link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css" >
        <link href="http://fonts.googleapis.com/css?family=Averia+Sans+Libre" rel="stylesheet" type="text/css" >
        <link rel="stylesheet" href="styles/main.css">
        <link rel="shortcut icon" href="images/favicon.ico" />
        <!--[if lt IE 9]>
            <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
            <script>window.html5 || document.write('<script src="js/vendor/html5shiv.js"><\/script>')</script>
        <![endif]-->
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <nav class="navbar navbar-default navbar-fixed-top">
          <div class="container">
            <div class="navbar-header">
              <a href="/"><img id="logo" alt="spbl.org logo" src="images/logo-web.jpg"/></a>
            </div>
            <div id="navbar" class="">
              <ul class="nav navbar-nav">
                <li class="active"><a href="/">Etusivu</a></li>
                <li><a href="/lajiesittely">Lajista</a></li>
                <li><a href="/tiedotteet">Tiedotteet</a></li>
                <li><a href="/julkaisut">Julkaisut</a></li>
                <li><a href="/tapahtumat">Tapahtumat</a></li>
                <li><a href="/joukkueet">Joukkueet</a></li>
                <li><a href="/yhteys">Yhteys</a></li>
                <li><a href="/lisenssi">Lisenssi</a></li>
              </ul>
            </div>
          </div>
        </nav>
        <div id="hero">
          <a href="about.html"><img id="identity" class="center-block" src="images/logo-zoomable.jpg" /></a>
          <div class="col-md-8 col-md-offset-2">
          <h3>Suomen Paintball-liitto on maanlaajuinen kattoj&#228;rjest&#246;, joka vastaa maamme paintball-toiminnasta ja sen kehitt&#228;misest&#228; sek&#228;   harrastustoimintana ett&#228; kilpaurheiluna.</h3>
          </div>
        </div>
        <div class="container">
          <hr/>
          <div class="row">
            <div class="col-md-6">
              <div class="splash">
                <h3>&#10082; Uusimmat tiedotteet</h3>
                  <ul class="simple-list">
                  <?php
                  $args = array('post_type' => 'tiedotteet');
                  $recent_posts = wp_get_recent_posts($args);
                  foreach( $recent_posts as $recent ){
                    $date = new DateTime($recent["post_date"]);
                    echo '<li><a href=/tiedotteet/?tiedote=' . $recent["ID"] . '>' . $date->format('m/Y ') . $recent["post_title"].'</a> </li> ';
                  } ?>
                  </ul>
                <span class="continuum-bg"><h4>&nbsp;</h4></span>
                <a class="continuum" href="/tiedotteet"><h4>Kaikki tiedotteet <span class="follow">&#10163;</span></h4></a>
              </div>
            </div>
            <div class="col-md-6">
              <div class="splash">
                <h3>&#10082; Tulevat tapahtumat</h3>
                <?php
                $args = array('post_type' => 'tapahtumat');
                $recent_posts = wp_get_recent_posts($args);
                foreach( $recent_posts as $recent ){
		  $event_date = DateTime::createFromFormat('Y-m-d', get_post_meta($recent["ID"], 'event_date', true));
                  echo '<li><a href=/tapahtumat/?tapahtuma=' . $recent["ID"] . '>' . $recent["post_title"] . ' ' . $event_date->format('j.n.Y') . '</a> </li>';
                } ?>
                <span class="continuum-bg"><h4>&nbsp;</h4></span>
                <a class="continuum" href="/tapahtumat"><h4>Arkisto <span class="follow">&#10163;</span></h4></a>
              </div>
            </div>
          </div>
          <div class="container row">
          <h2>Miss&#228; voin kokeilla paintballia?</h2>

          <p>Suomessa toimii useita paintballiin erikoistuneita yrityksi&#228;, jotka vuokraavat varusteita. L&#246;yd&#228;t useita vuokraamoja <a href="http://www.paintball.fi/vuokraamot">paintball.fi</a> palvelun kautta. Kilpailutoimintaan p&#228;&#228;set parhaiten mukaan ottamalla yhteyden Suomen Paintball liiton alla toimiviin joukkuesiin. <a href="/joukkueet">Joukkueet</a> -sivuilta l&#246;yd&#228;t yhteystiedot paikalliseen joukkueeseesi.</p>

          <h2>Yhdistys</h2>

          <p>Suomen Paintball-liitto on perustettu vuonna 1998. Se perustettiin jatkamaan kotimaisen paintball-sarjatoiminnan 1994 aloittanutta Suomen Paintball Liigan toimintaa. Liittoon kuuluu noin kolmekymment&#228; seuraa ja lisenssipelaajia on vuosittain noin kolmesataa, m&#228;&#228;r&#228;n kasvaessa hitaasti kausi kaudelta sarjojen laajentuessa. Paintballia harrastaa Suomessa arviolta noin kymmenen tuhatta henkil&#246;&#228;.</p>
          <p>Suomen Paintball-liitto on maanlaajuinen kattoj&#228;rjest&#246;, joka vastaa maamme paintball-toiminnasta ja sen kehitt&#228;misest&#228; sek&#228; harrastustoimintana ett&#228; kilpaurheiluna. Kotimainen SM-liiga on yksi maailman pisimp&#228;&#228;n s&#228;&#228;nn&#246;llisesti ja yht&#228;jaksoisesti toiminut kilpasarja. Paintball-j&#228;rjest&#246;toiminta kest&#228;&#228; my&#246;s hyvin kansainv&#228;lisen vertailun, sill&#228; vastaavat liitot eiv&#228;t ole saaneet kunnollista jalansijaa muissa maissa Tanskaa lukuunottamatta.</p>
          <p>Suomen Paintball-liiton tavoitteena on kasvattaa j&#228;senm&#228;&#228;r&#228;&#228; ja aktivoida harrastajia mukaan liiton toimintaan tukemalla paikallisten j&#228;senseurojen toimintaa. T&#228;m&#228; antaa perusteet hakea my&#246;hemmin lajille virallista asemaa muiden Suomen urheilulajien joukkoon.</p>
          </div>
        </div>

        <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
        <!-- <script src="scripts/main.js"></script> -->

	<?php include('footer.php');?>
</html>
