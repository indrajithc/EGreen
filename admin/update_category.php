<?php
include_once('../header.php');
$db = new Database();
$message = '';

if (isset($_POST['update'])) {
	$category_name = $_POST['category_name'];
	$description = $_POST['description'];

	$stmnt  = 'select * from category where category_name=:category_name and category_id <> :id';
	$params = array(
		':category_name' => $category_name,
		':id'	=>	$_GET['id']
	);

	if ($db->display($stmnt, $params)) {
		$message = '<div class="alert alert-danger">Category name already exist</div>';
	} else {
		$stmnt  = 'update category set category_name = :category_name, description = :description where category_id = :category_id';
		$params = array(
			':category_name' => $category_name,
			':description' => $description,
			':category_id'	=>	$_GET['id']
		);
		$istrue = $db->execute_query($stmnt, $params);
		if ($istrue) {
			$message = '<div class="alert alert-success">' . $category_name .' Updated!</div>';
		}
	}
}

if( isset( $_GET['id'] ) ) :
	$stmnt  = 'select * from category where category_id = :id';
	$params = array(
		':id'	=>	$_GET['id']
	);
	$category = $db->display($stmnt, $params);
	if( $category ): $category = $category[0];

		?>
	

	<center>
		
		<div  >
			<h2>Update Category</h2>
		</div>	
		<div >
			<div   style="width: 400px; background: #B6B6B6; padding: 20px; text-align: center;  " >
				<h3 >
				</h3>
				<form  data-parsley-validate method="post">
					<div >
						<div >
							<div >
								<label >Category Name</label>
								<div >
									<input type="text" required=""  name="category_name" placeholder="Category Name" value="<?php echo $category['category_name']; ?>">
								</div>
							</div>
						</div>
						<div >
							<div >
								<label >Description</label>
								<div >
									<textarea type="text" rows="5" required=""  name="description" placeholder="Description"><?php echo $category['description']; ?></textarea>
								</div>
							</div>
						</div>
						<div >
							<div >
								<label ></label>
								<div >
									<button class="btn btn-success" name="update">Update</button>
								</div>
							</div>
						</div>
					</div>             
					<?php
					if ($message) {
						echo $message;
					}
					?>
				</form>
			</div>
		</div>

		
	</center>
		<?php
		else: echo 'Sorry invalid category';endif;
		else: echo 'Not selected any category';endif;
		include_once('../footer.php');
		?>