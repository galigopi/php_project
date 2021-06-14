<h2>
    <?php echo $post[0]['title'] ?>
</h2>
<small class='post-date'>Posted on: <?php echo $post[0]['created_at'] ?></small>
<img src="<?php echo site_url(); ?>assets/images/posts/<?php echo $post[0]['post_image']; ?>" style="height: 400px;width: 400px;">

<div class='post-body'>
    <?php echo $post[0]['body'] ?>
</div>

<hr>

<?php if ($this->session->userdata('logged_in')) : ?>
    <a class="btn btn-defalut pull-left" href="<?php echo base_url(); ?>posts/edit/<?php echo $post[0]['slug']; ?>">Edit</a>

    <?php echo form_open('posts/delete/' . $post[0]['id']); ?>
    <input type="submit" value="Delete" class="btn btn-danger">
    </form>

<?php endif; ?>

<h3>Comments</h3>
<?php if ($comments) : ?>
    <?php foreach ($comments as $comment) : ?>
        <p><?php echo $comment['body'] ?> by <strong> [<?php echo $comment['name'] ?>]</strong></p>
    <?php endforeach; ?>
<?php else : ?>
    <p>No comments</p>
<?php endif; ?>
<hr>
<h2>Add Comment</h2>

<?php echo validation_errors(); ?>

<?php echo form_open('comments/create/' . $post[0]['id']); ?>

<div class="form-group">
    <label>Name</label>
    <input type="text" name="name" class="form-control">
</div>

<div class="form-group">
    <label>Email</label>
    <input type="email" name="email" class="form-control">
</div>

<div class="form-group">
    <label>Body</label>
    <textarea type="text" name="body" class="form-control"></textarea>
</div>
<input type="hidden" name="slug" value="<?php echo $post['0']['slug']; ?>">

<button type="submit" class="btn btn-primary">Submit</button>
</form>