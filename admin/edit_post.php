<?php include 'includes/header.php' ?>
<?php
  //Create DB Object
  $db = new Database();
  $id = $_GET['id'];

  //Create Query
  $query = "SELECT * FROM posts WHERE id = $id";

  //Run Query 
  $post = $db->select($query)->fetch_assoc();


  //Create Query
  $query = "SELECT * FROM categories";

  //Run Query 
  $categories = $db->select($query);
?>

<form method="post" action="add_post.php">
  <div class="form-group">
    <label>Post Title</label>
    <input name="title" type="text" class="form-control" placeholder="Enter Title" value="<?php echo $post['title'] ?>">
  </div>
  <div class="form-group">
    <label>Post Body</label>
    <textarea name="body" class="form-control" placeholder="Enter Post"><?php echo $post['body'] ?></textarea>
  </div>
  <div class="form-group">
    <label>Category</label>
    <select name="title" type="text" class="form-control">
    <?php while($row = $categories->fetch_assoc()): ?>
      <?php if ($row['id'] == $post['category']) {
        $selected = 'selected' ;
      } else {
        $selected = '';
      }
      ?>
        <option <?php echo $selected ?>><?php echo $row['name'] ?></option>
    <?php endwhile ?>
    </select>
  </div>
  <div class="form-group">
    <label>Author</label>
    <input name="author" type="text" class="form-control" placeholder="Enter Author" value="<?php echo $post['author'] ?>">
  </div>
  <div class="form-group">
    <label>Tags</label>
    <input name="tags" type="text" class="form-control" placeholder="Enter Tags" value="<?php echo $post['tags'] ?>">
  </div>
  <div class="form-group">
  	<input name="Submit" type="submit" class="btn btn-success" value="Submit">
    <input name="Submit" type="submit" class="btn btn-danger" value="Delete"> 
  	<a href="index.php" class="btn btn-default">Cancel</a>
  </div>
</form>

<?php include 'includes/footer.php' ?>