<h2>
    <?php echo $post[0]['title'] ?>
</h2>
<small class='post-date'>Posted on: <?php echo $post[0]['created_at'] ?></small>
<img src="<?php echo site_url(); ?>assets/images/posts/<?php echo $post[0]['post_image']; ?>" style="height: 400px;width: 400px;">

<div class='post-body'>
    <?php echo $post[0]['body'] ?>
</div>

<hr>
<a class="btn btn-defalut pull-left" href="<?php echo base_url(); ?>posts/edit/<?php echo $post[0]['slug']; ?>" >Edit</a>

<?php echo form_open('posts/delete/' . $post[0]['id']); ?>
<input type="submit" value="Delete" class="btn btn-danger">
</form>
