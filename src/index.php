<?php
require('./wp-blog-header.php');
?>
<!doctype html>
<html class="no-js" lang="en">
    <head>
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
          <h3>Suomen Paintball-liitto on maanlaajuinen kattojärjestö, joka vastaa maamme paintball-toiminnasta ja sen kehittämisestä sekä   harrastustoimintana että kilpaurheiluna.</h3>
          </div>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <h5>Seuraava tapahtuma kalenterissa: <a href="#">SM-kilpailut (23.08.2015)</a></h5>
            </div>
            <div class="col-md-6">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Etsi tekstejä tai sisältöä sivustolta...">
                <span class="input-group-btn">
                  <button class="btn btn-default" type="button">Hae!</button>
                </span>
              </div>
            </div>
          </div>
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
                  echo '<li><a href="' . get_permalink($recent["ID"]) . '">' . $recent["post_title"].'</a> </li> ';
                } ?>
                <span class="continuum-bg"><h4>&nbsp;</h4></span>
                <a class="continuum" href="/tapahtumat"><h4>Arkisto <span class="follow">&#10163;</span></h4></a>
              </div>
            </div>
          </div>
          <div class="container row">
          <h2>Missä voin kokeilla paintballia?</h2>

          <p>Suomessa toimii useita paintballiin erikoistuneita yrityksiä, jotka vuokraavat varusteita. Löydät useita vuokraamoja <a href="http://www.paintball.fi/vuokraamot">paintball.fi</a> palvelun kautta. Kilpailutoimintaan pääset parhaiten mukaan ottamalla yhteyden Suomen Paintball liiton alla toimiviin joukkuesiin. <a href="/joukkueet">Joukkueet</a> -sivuilta löydät yhteystiedot paikalliseen joukkueeseesi.</p>

          <h2>Yhdistys</h2>

          <p>Suomen Paintball-liitto on perustettu vuonna 1998. Se perustettiin jatkamaan kotimaisen paintball-sarjatoiminnan 1994 aloittanutta Suomen Paintball Liigan toimintaa. Liittoon kuuluu noin kolmekymmentä seuraa ja lisenssipelaajia on vuosittain noin kolmesataa, määrän kasvaessa hitaasti kausi kaudelta sarjojen laajentuessa. Paintballia harrastaa Suomessa arviolta noin kymmenen tuhatta henkilöä.</p>
          <p>Suomen Paintball-liitto on maanlaajuinen kattojärjestö, joka vastaa maamme paintball-toiminnasta ja sen kehittämisestä sekä harrastustoimintana että kilpaurheiluna. Kotimainen SM-liiga on yksi maailman pisimpään säännöllisesti ja yhtäjaksoisesti toiminut kilpasarja. Paintball-järjestötoiminta kestää myös hyvin kansainvälisen vertailun, sillä vastaavat liitot eivät ole saaneet kunnollista jalansijaa muissa maissa Tanskaa lukuunottamatta.</p>
          <p>Suomen Paintball-liiton tavoitteena on kasvattaa jäsenmäärää ja aktivoida harrastajia mukaan liiton toimintaan tukemalla paikallisten jäsenseurojen toimintaa. Tämä antaa perusteet hakea myöhemmin lajille virallista asemaa muiden Suomen urheilulajien joukkoon.</p>
          </div>

        <footer>
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <a href="/"><img id="logo" alt="spbl.org logo" src="/images/logo-web.jpg"/></a>
                <ul class="simple-list">
                  <li class="active"><a href="/">Etusivu</a></li>
                  <li><a href="/lajiesittely">Lajista</a></li>
                  <li><a href="/tiedotteet">Tiedotteet</a></li>
                  <li><a href="/julkaisut">Julkaisut</a></li>
                  <li><a href="/tapahtumat">Tapahtumat</a></li>
                  <li><a href="/joukkueet">Joukkueet</a></li>
                  <li><a href="/yhteys">Yhteys</a></li>
                </ul>
              </div>
            </div>
            <div class="row">
              <div class="col-md-2 right">
                spbl.org &copy; 2016
              </div>
            </div>
          </div>
        </footer>
        <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"><script>
        <!-- <script src="scripts/main.js"></script> -->
    </body>
</html>
