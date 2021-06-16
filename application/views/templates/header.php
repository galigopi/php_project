<html>

<head>
  <title>ciblog</title>
  <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/style.css">
  <script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@3.4.1/flatly/bootstrap.min.css" integrity="undefined" crossorigin="anonymous">
</head>

<body>
  <nav class="navbar navbar-inverse">
    <div class="container">
      <div class="navbar-header">
        <a href="<?php echo base_url() ?>">Ciblog</a>
      </div>
      <div id="navbar">
        <ul class="nav navbar-nav">
          <li>
            <a href="<?php echo base_url() ?>">Home</a>
          </li>
          <li>
            <a href="<?php echo base_url() ?>posts">Posts</a>
          </li>
          <li>
            <a href="<?php echo base_url() ?>categories">Categories</a>
          </li>
          <li>
            <a href="<?php echo base_url() ?>about">about</a>
          </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">

          <?php if (!$this->session->userdata('logged_in')) : ?>

            <li>
              <a href="<?php echo base_url() ?>users/register">Register</a>
            </li>
            <li>
              <a href="<?php echo base_url() ?>users/login">Login</a>
            </li>
          <?php endif; ?>
          <?php if ($this->session->userdata('logged_in')) : ?>
            <li>
              <a href="<?php echo base_url() ?>posts/create" tabindex="-1">Create post</a>
            </li>
            <li>
              <a href="<?php echo base_url() ?>categories/create" tabindex="-1">Create Cat</a>
            </li>
            <li>
              <a href="<?php echo base_url() ?>users/logout">Logout</a>
            </li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </nav>

  <div class='container'>

    <?php if($this->session->flashdata('user_registered')) : ?>
      <?php echo '<p class="alert alert-success">' . $this->session->flashdata('user_registered') . '</p>'; ?>
    <?php endif; ?>

    <?php if ($this->session->flashdata('post_created')) : ?>
      <?php echo '<p class="alert alert-success">' . $this->session->flashdata('post_created') . '</p>'; ?>
    <?php endif; ?>

    <?php if ($this->session->flashdata('post_updated')) : ?>
      <?php echo '<p class="alert alert-success">' . $this->session->flashdata('post_updated') . '</p>'; ?>
    <?php endif; ?>

    <?php if ($this->session->flashdata('category_created')) : ?>
      <?php echo '<p class="alert alert-success">' . $this->session->flashdata('category_created') . '</p>'; ?>
    <?php endif; ?>

    <?php if ($this->session->flashdata('post_deleted')) : ?>
      <?php echo '<p class="alert alert-success">' . $this->session->flashdata('post_deleted') . '</p>'; ?>
    <?php endif; ?>

    <?php if($this->session->flashdata('user_loggedin')) : ?>
      <?php echo '<p class="alert alert-success">' . $this->session->flashdata('user_loggedin') . '</p>'; ?>
    <?php endif; ?>

    <?php if ($this->session->flashdata('user_failed')) : ?>
      <?php echo '<p class="alert alert-danger">' . $this->session->flashdata('user_failed') . '</p>'; ?>
    <?php endif; ?>

    <?php if ($this->session->flashdata('user_loggedout')) : ?>
      <?php echo '<p class="alert alert-success">' . $this->session->flashdata('user_loggedout') . '</p>'; ?>
    <?php endif; ?>

    <?php if ($this->session->flashdata('category_deleted')) : ?>
      <?php echo '<p class="alert alert-success">' . $this->session->flashdata('category_deleted') . '</p>'; ?>
    <?php endif; ?>