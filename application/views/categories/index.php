<?= $title; ?>

<?php foreach ($categories as $category) : ?>
    <li>
        <a href="<?php echo site_url('/categories/posts/' . $category['id']); ?>">
            <?php echo $category['name']; ?>
        </a>
    </li>

<?php endforeach; ?>