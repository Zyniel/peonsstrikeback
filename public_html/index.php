<?php 
require_once 'php/MovieLibrary.php';
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/library.css">
        <script src="js/vendor/modernizr-2.6.1.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
        <p>Hello world! This is HTML5 Boilerplate.</p>
        <div class="wrap">
            
            <?php
                $lib = new MovieLibrary("", "", "");
                $lib->add_filter("name", "lol");
                $lib->add_filter("year", "2013");
                $lib->add_filter("year", "2013");
                $lib->show_filters();
                // Try to connect to database
                $pdo = null;
                try{
                        $pdo = new PDO('sqlite:'.dirname(__FILE__).'/db/MyVideos60.db');
                        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
                        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // ERRMODE_WARNING | ERRMODE_EXCEPTION | ERRMODE_SILENT
                } catch(Exception $e) {
                        echo "Impossible d'accéder à la base de données SQLite : ".$e->getMessage();
                        die();
                }
                try {
                    $stmt = $pdo->prepare('SELECT f.idFile, f.strFilename, m.c00, m.c01 , m.c02 , m.c03 , m.c04 , m.c05 , m.c06 , m.c07 , m.c08 , m.c09 , m.c10 , m.c11 , m.c12 , m.c13 , m.c14 , m.c15 , m.c16 , m.c17 , m.c18 , m.c19 /*, m.c20*/ , m.c21 /*, m.c22*/ /*, m.c23*/ FROM files f JOIN path p ON (f.idPath = p.idPath) JOIN movie m ON (m.idFile = f.idFile) WHERE 1=1 AND p.idPath = 2');
                    $stmt->execute();

                    while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
                          print('<div class="box"><div class="boxInner"><img src="' . "img/films/".preg_replace('/\.[^.]*$/', '', htmlentities($row->strFilename)).'.png' . '"><div class="titleBox">'. htmlentities($row->c00) . "</div></div></div>");
                    }
                } catch (Exception $e) {
                        echo "Impossible d'effectuer la requête SQL : ".$e->getMessage();
                        die();     
                }
            ?>
            </ul>
        </div>
        
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.8.0.min.js"><\/script>')</script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>
