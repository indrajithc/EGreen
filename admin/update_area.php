<?php
include_once('../header.php');
$db = new Database();
$message = '';

if (isset($_POST['update'])) {
	$area_name = $_POST['area_name'];
	$description = $_POST['description'];
	$pin = $_POST['pin'];

	$stmnt  = 'select * from area where area_name=:area_name and area_id <> :id';
	$params = array(
		':area_name' => $area_name,
		':id'	=>	$_GET['id']
	);

	if ($db->display($stmnt, $params)) {
		$message = '<div class="alert alert-danger">Area name already exist</div>';
	} else {
		$stmnt  = 'update area set area_name = :area_name, description = :description, pin=:pin where area_id = :area_id';
		$params = array(
			':area_name' => $area_name,
			':description' => $description,
			':pin' => $pin,
			':area_id'	=>	$_GET['id']
		);
		$istrue = $db->execute_query($stmnt, $params);
		if ($istrue) {
			$message = '<div class="alert alert-success">Area ' . $area_name .' Updated!</div>';
		}
	}
}

if( isset( $_GET['id'] ) ) :
	$stmnt  = 'select * from area where area_id = :id';
	$params = array(
		':id'	=>	$_GET['id']
	);
	$area = $db->display($stmnt, $params);
	if( $area ): $area = $area[0];

		?>
		<center>
			

			<div  >
				<h2>Add Area</h2>
			</div>	
			
			<div    style="width: 80%; background: #B6B6B6; padding: 20px; text-align: center;  " >
				
				<div > 
					<form   data-parsley-validate method="post">
						<div >
							<div >
								<div >
									<label >Area Name</label>
									
									<input type="text" required="" class="form-control" name="area_name" placeholder="Area Name" value="<?php echo $area['area_name']; ?>">
									
								</div>
							</div>
							<div >
								<div >
									<label >Description</label>
									
									<textarea type="text" rows="5" required="" class="form-control" name="description" placeholder="Description"><?php echo $area['description']; ?></textarea>
									
								</div>
							</div>
							<div >
								<div >
									<label >Pin Code</label>
									
									<input type="text" required=""  data-parsley-pattern="^[1-9][0-9]{5}$"  minlength="6" maxlength="6" value="<?php echo $area['pin']; ?>" class="form-control" name="pin" placeholder="Pin Code">
									
								</div>
							</div>
							<div >
								<div >
									<label ></label>
									
									<button class="btn btn-success" name="update">Update</button>
									
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
		else: echo 'Sorry invalid area';endif;
		else: echo 'Not selected any area';endif;
		include_once('../footer.php');
		?>