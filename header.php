<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- <title>Blog Template for Bootstrap</title> -->

  <!-- Bootstrap core CSS -->
  <!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> -->

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  <?php wp_head(); ?>
</head>

<body>

  <div class="blog-masthead">
    <div class="container">
      <nav class="blog-nav">
        <a class="blog-nav-item active" href="#">Home</a>
        <?php wp_list_pages(array('title_li' => '')); ?>
        <a class="blog-nav-item" href="#">New features</a>
        <a class="blog-nav-item" href="#">Press</a>
        <a class="blog-nav-item" href="#">New hires</a>
        <a class="blog-nav-item" href="#">About</a>
      </nav>
    </div>
  </div>

  <div class="container">

    <div class="blog-header">
      <h1 class="blog-title"><a href="<?php echo site_url(); ?>"> <?php echo get_bloginfo('name'); ?></a></h1>
      <p class="lead blog-description"><?php echo get_bloginfo('description'); ?></p>
    </div>