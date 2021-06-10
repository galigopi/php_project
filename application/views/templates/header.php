<html>

<head>
  <title>ciblog</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/style.css">
  <script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
</head>

<body>
  <ul class="nav">
    <li class="nav-item">
      <a class="nav-link active" href="<?php echo base_url() ?>">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url() ?>posts">Posts</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url() ?>categories">Categories</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url() ?>about">about</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url() ?>posts/create" tabindex="-1">Create post</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url() ?>categories/create" tabindex="-1">Create Cat</a>
    </li>
  </ul>