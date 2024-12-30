<head>
  <meta charset="utf-8">
  <title><?php echo $config->title; ?></title>
  
  <?php
    if($config->template == 'bootstrap'){
  
  ?>
  <!-- Loading Bootstrap -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <!-- Bootstrap JS -->
  <!-- bundle版本已包含Popper等其他JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
  <?php
  }else{
    
  ?>
  <head>
  <meta charset="utf-8">
  <title>My Default Page</title>
  <!-- 引用 Flat UI (遵從Flat UI提供之Template.html) -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Loading Bootstrap -->
  <link href="dist/css/vendor/bootstrap.min.css" rel="stylesheet">
  <!-- Loading Flat UI Pro -->
  <link href="dist/css/flat-ui.css" rel="stylesheet">
  <!-- 考慮效能，可將上一行換成下一行的版本 -->
  <!--
    <link href="dist/css/flat-ui.min.css" rel="stylesheet">
    -->
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <!-- Bootstrap 4 requires Popper.js -->
  <script src="https://unpkg.com/popper.js@1.14.1/dist/umd/popper.min.js" crossorigin="anonymous"></script>
  <script src="http://vjs.zencdn.net/6.6.3/video.js"></script>
  <!-- Flat UI JS -->
  <script src="dist/scripts/flat-ui.js"></script>
  <?php
  }
    
  ?>
</head>