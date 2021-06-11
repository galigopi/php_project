<h1><?= $title; ?></h1>

<?php echo validation_errors(); ?>

<?php echo form_open('users/register'); ?>
<div class="form-group">
    <label>Name</label>
    <input type="text" name="name" class="form-control" placeholder="Name">
</div>
<div class="form-group">
    <label>Email</label>
    <input type="email" name="email" class="form-control" placeholder="Email">
</div>
<div class="form-group">
    <label>Username</label>
    <input type="text" name="username" class="form-control" placeholder="User Name">
</div>
<div class="form-group">
    <label>Password</label>
    <input type="password" name="password" class="form-control" placeholder="Password">
</div>
<div class="form-group">
    <label>Confirm Password</label>
    <input type="password" name="password2" class="form-control" placeholder="Confirm Password">
</div>
<div class="form-group">
    <label>ZipCode</label>
    <input type="text" name="zipcode" class="form-control" placeholder="Zip Code">
</div>
<button class="btn btn-primary" type="submit">Register</button>


<?php echo form_close(); ?>