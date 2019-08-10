<?php
include_once('../header.php');
$db= new Database();
$message="";
if (isset($_POST['add'])) {
	$category_name=$_POST['category_name'];
	$description=$_POST['description'];

	$stmnt  = 'select * from category where category_name=:category_name';
	$params = array(
		':category_name' => $category_name
	);
	if( !$db->display($stmnt, $params) ) {
		$stmnt='insert into category(category_name,description)values(:category_name,:description)';
		$params=array(
			':category_name'=>$category_name,
			':description'=>$description            
		);
		if($db ->execute_query($stmnt,$params)){
			$message='<div class="alert alert-success">'. $category_name .' Category Added!</div>';
		}
	} else {
		$message='<div class="alert alert-danger">Category name already exist</div>';
	}
}
?>


<center>
	<div >
		<h2>Add Category</h2>
	</div>

	<div   style="width: 400px; background: #B6B6B6; padding: 20px; text-align: center;  ">
		<div >
			<h3 >
				Elements
			</h3>

			<form  data-parsley-validate method="post">
				
				<label >Category</label>

				<input type="text" placeholder="Category name" required="" name="category_name" >

				<br/>
				<br/>
				<label  >Description</label>

				<textarea required="" rows="5" placeholder="Description"  name="description"></textarea>  

				<br/>
				<br/>
				<label ></label>

				<button type="submit"  value="add" name="add">ADD</button>

				<br/>
				<br/>
				<?php if ($message) echo $message;  ?>
			</form>
		</div>
	</div>
</center>
<?php include_once( '../footer.php' ); ?>

