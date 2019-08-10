<?php
include_once('../header.php');
$db = new Database();
$message = '';
if (isset($_POST['add_area'])) {

	$area_name = $_POST['area_name'];
	$description = $_POST['description'];
	$pin = $_POST['pin'];

	$stmnt  = 'select * from area where area_name=:area_name';
	$params = array(
		':area_name' => $area_name
	);

	if ($db->display($stmnt, $params)) {
		$message = '<div class="alert alert-danger">Area name already exist</div>';
	} else {

		$stmnt1 ='select * from area where pin=:pin';
		$params1 = array(
			':pin' => $pin,
		);

		if ($db -> display( $stmnt1, $params1)){
			$message='<div class="alert alert-danger">PIN MUST BE UNIQUE!</div>';
		}else{

			$stmnt  = 'insert into area (area_name,description,pin) values (:area_name,:description,:pin)';
			$params = array(
				':area_name' => $area_name,
				':description' => $description,
				':pin' => $pin
			);
			$istrue = $db->execute_query($stmnt, $params);
			if ($istrue) {
				$message = '<div class="alert alert-success">Area ' . $area_name .' added!</div>';
			} else {
				$message = $istrue;
			}
		}
	}
}
?>
<center>
	


	<div    style="width: 80%; background: #B6B6B6; padding: 20px; text-align: center;  " >
		
		<div >

			<form   data-parsley-validate method="post">
				<div >
					<div >
						<div >
							<label >Area Name</label>

							<input type="text" required=""  name="area_name" placeholder="Area Name">

						</div>
					</div>
					<div >
						<div >
							<label >Description</label>

							<textarea type="text" rows="5" required=""  name="description" placeholder="Description"></textarea>

						</div>
					</div>
					<div >
						<div >
							<label >Pin Code</label>

							<input type="text" required=""  data-parsley-pattern="^[1-9][0-9]{5}$"  minlength="6" maxlength="6"  name="pin" placeholder="Pin Code">

						</div>
					</div>
					<div >
						<div >
							<label ></label>
							<div >
								<button  name="add_area">Add Area</button>
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
include_once('../footer.php');
?>