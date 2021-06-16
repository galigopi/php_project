<?= $title; ?>

<?php foreach ($categories as $category) : ?>
    <li>
        <a href="<?php echo site_url('/categories/posts/' . $category['id']); ?>">
            <?php echo $category['name']; ?>
        </a>
        <?php if ($this->session->userdata('user_id') == $category['user_id']) : ?>
            <form style="display: inline;" action="categories/delete/<?php echo $category['id']; ?>" method="POST">
                <input type="submit" class='btn-link text-danger' value="X">
            </form>

        <?php endif; ?>
    </li>

<?php endforeach; ?>