<?php include 'includes/header.php' ?>
<?php
  //Create DB Object
  $db = new Database();

	if(isset($_POST['submit'])) {
		//Assign Vars
		$title    = mysqli_real_escape_string($db->link, $_POST['title']);
		$body     = mysqli_real_escape_string($db->link, $_POST['body']);
		$category = mysqli_real_escape_string($db->link, $_POST['category']);
		$author   = mysqli_real_escape_string($db->link, $_POST['author']);
		$tags     = mysqli_real_escape_string($db->link, $_POST['tags']);
		
		//Simple Validation
		if ($title == '' || $body == '' || $category == '' || $author == '') {
			//Set Error
			$error = 'Please fill out all required fields';	
		} else {
			$query = "INSERT INTO posts(title, body, category, author, tags) VALUES('$title', '$body', $category, '$author', '$tags') "; 
			$insert_row = $db->select($query); 
		}
	}
?>
<?php
  //Create Query
  $query = "SELECT * FROM categories";

  //Run Query 
  $categories = $db->select($query);
?>
<form method="post" action="add_post.php">
  <div class="form-group">
    <label>Post Title</label>
    <input name="title" type="text" class="form-control" placeholder="Enter Title">
  </div>
  <div class="form-group">
    <label>Post Body</label>
    <textarea name="body" class="form-control" placeholder="Enter Post"></textarea>
  </div>
  <div class="form-group">
    <label>Category</label>
    <select name="category" type="text" class="form-control">
    <?php while($row = $categories->fetch_assoc()): ?>
        <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
    <?php endwhile ?>
    </select>
  </div>
   <div class="form-group">
    <label>Author</label>
    <input name="author" type="text" class="form-control" placeholder="Enter Author">
  </div>
  <div class="form-group">
    <label>Tags</label>
    <input name="tags" type="text" class="form-control" placeholder="Enter Tags"></textarea>
  </div>
  <div class="form-group">
  	<input name="submit" type="submit" class="btn btn-success" value="Submit">
  	<a href="index.php" class="btn btn-default">Cancel</a>
  </div>
</form>

<?php include 'includes/footer.php' ?>