

<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
<head>

  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, user-scalable=no">
  <meta name="format-detection" content="telephone=no">

  <title><?php wp_title( '' ); ?><?php if ( wp_title( '', false ) ) { echo ' :'; } ?> <?php bloginfo( 'name' ); ?></title>

  <link href="<?php echo get_template_directory_uri(); ?>/favicon.ico" rel="shortcut icon">

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

  <link href="http://www.google-analytics.com/" rel="dns-prefetch"><!-- dns prefetch -->

  <!--[if lt IE 9]>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/selectivizr/1.0.2/selectivizr-min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
  <!-- css + javascript -->

  <?php wp_head(); ?>


</head>

<body data-gr-c-s-loaded="true" style="">
  <div class="main-wrapper">
    <div id="header">
      <div class="container-fluid">
        <a class="logo">
          <img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="" class="hide-on-mobile">
          <img src="<?php echo get_template_directory_uri(); ?>/img/logo-mobile.png" alt="" class="show-on-mobile"> </a>
        <div class="search"><i class="fa fa-search search-icon"></i>
          <form>
            <div class="f-item">
              <input type="text" name="query" class="query" placeholder="Введите страну / область / район / город"> <i class="fa fa-search loupe-icon"></i> <i class="fa fa-refresh fa-spin preloader-icon"></i> <i class="fa fa-times hide-results-icon"></i></div>
            <div class="search-results">
              <ul></ul>
            </div>
          </form>
        </div>
        <div class="navbar-header">
          <a class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span></span> </a>
        </div>
        <div class="collapse navbar-collapse">
          <?php wpeHeadNav(); ?>
        </div>
      </div>
    </div>
    <div id="content">
      <div class="container-fluid">
