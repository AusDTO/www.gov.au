<?php
$base_url = "/";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $page; ?> - www.gov.au</title>
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css"> -->
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css"> -->
  <link href="/css/style.min.css" rel="stylesheet">
  <!-- // <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> -->
  <link rel="icon" sizes="16x16 32x32 48x48 64x64" href="/favicon.ico">
  <!--[if IE]>
    <link rel="shortcut icon" href="/favicon.ico">
  <![endif]-->
  <link rel="apple-touch-icon-precomposed" href="/favicons/favicon-152.png">
  <meta name="msapplication-TileColor" content="#563d7c">
  <meta name="msapplication-TileImage" content="/favicons/favicon-ms-144.png">
  <link rel="apple-touch-icon-precomposed" sizes="152x152" href="/favicons/favicon-152.png">
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/favicons/favicon-144.png">
  <link rel="apple-touch-icon-precomposed" sizes="120x120" href="/favicons/favicon-120.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/favicons/favicon-114.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/favicons/favicon-72.png">
  <link rel="apple-touch-icon-precomposed" href="/favicons/favicon-57.png">
  <?php // HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries
        // left using CDN as they're optional files, so no point minifying etc in with the rest..
  ?>
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <link href="/css/ie8.css" rel="stylesheet">
  <![endif]-->
  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
    ga('create', 'UA-38781689-1', 'auto');
    ga('send', 'pageview');
    ga('set', 'anonymizeIp', true);
  </script>
</head>

<body>
  <nav class="navbar navbar-default" role="navigation">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?php echo $base_url; ?>">www.<span>gov.au</span></a>
      </div>
      <div id="main-navbar-collapse" class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
          <li><a href="<?php echo $base_url; ?>#ausgov">Australian Government</a></li>
          <li><a href="<?php echo $base_url; ?>#state">State Government</a></li>
          <li><a href="<?php echo $base_url; ?>#local">Local Government</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="about">About</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="jumbotron bgColour">
    <div class="container">
      <h1 class="accessible">www.gov.au</h1>
      <p>A listing of websites for governments in Australia</p>
    </div>
  </div>

  <div class="container">
