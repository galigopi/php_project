<h1>
    <?php echo $title; ?>
</h1>

<?php foreach ($posts as $post) : ?>
    <h3><?php echo $post['title'] ?></h3>
    <div class='row'>
        <div class="col-md-3">
            <img src="<?php echo site_url(); ?>assets/images/posts/<?php echo $post['post_image']; ?>" width="100%">
        </div>
        <div class="col-md-9">
            <small class='post-date'>Posted on: <?php echo $post['created_at'] ?>
                <strong>
                    <?php echo $post['name']; ?>
                </strong></small>

            <p>
                <?php echo word_limiter($post['body'], 60); ?>
            </p>
            <p>
                <a class="btn btn-secondary" style="background:#f4f4f4;" href="<?php echo site_url('/posts/' . $post['slug']); ?>">Read more</a>
            </p>
        </div>
    </div>
<?php endforeach; ?>
<div class='pagination-links'>
    <?php echo $this->pagination->create_links(); ?>
</div>