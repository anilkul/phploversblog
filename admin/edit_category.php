<?php include 'includes/header.php' ?>
<?php
  //Create DB Object
  $db = new Database();
  $id = $_GET['id'];

  //Create Query
  $query = "SELECT * FROM categories WHERE id = $id";

  //Run Query 
  $category = $db->select($query)->fetch_assoc();

?>
<form method="post" action="add_category.php">
  <div class="form-group">
    <label>Category Name</label>
    <input name="name" type="text" class="form-control" placeholder="Enter Category" value="<?php echo $category['name'] ?>">
  </div>

  <div class="form-group">
  	<input name="Submit" type="submit" class="btn btn-success" value="Submit">
  	<input name="Submit" type="submit" class="btn btn-danger" value="Delete">  	
  	<a href="index.php" class="btn btn-default">Cancel</a>
  </div>
</form>

<?php include 'includes/footer.php' ?>