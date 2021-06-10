<h1><b><?= $title; ?></b></h1>

<br>
<?php echo validation_errors(); ?>
<?php echo form_open('posts/update'); ?>
<input type='hidden' name='id' value="<?php echo $post[0]['id']; ?>">
<div class="form-group">
    <label>Title</label>
    <input type="text" class="form-control" name="title" placeholder="Add Title" value="<?php echo $post[0]['title']; ?>">
</div>
<div class="form-group">
    <label>Slug</label>
    <input type="text" class="form-control" name="slug" placeholder="Add Slug" value="<?php echo $post[0]['slug']; ?>">
</div>
<div class="form-group">
    <label>Body</label>
    <textarea id="editor1" class="form-control" name="body" placeholder="Add Body">
    <?php echo $post[0]['body']; ?></textarea>
</div>
<div class="form-group">
    <label>Category</label>
    <select name="category_id" class="form-control">
        <?php foreach($categories as $category) : ?>
            <option value="<?php echo $category['id']; ?>">
                <?php echo $category['name']; ?>
            </option>
        <?php endforeach; ?>
    </select>
</div>
<div class="form-group">
    <label>Upload Imahe</label>
    <input type="file" class="form-control" name="userfile">
</div>
<button type="submit" class="btn btn-primary">Submit</button>
</form>