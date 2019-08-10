<?php 
include_once('../header.php' );
include_once('../includes/class.fileuploader.php');

$db= new Database();

$message="";

$sql = 'select * from category';
$category = $db->display($sql);

if (isset($_POST['register'])) {

	$category_name= $_POST['category'];
	$name= $_POST['name'];
	$time_period= $_POST['time_period'];
	$stock=$_POST['stock'];
	$unit=$_POST['unit'];
	$hybrid=$_POST['hybrid'];
	$price=$_POST['price'];   
	$description = $_POST['description'];


	$stmnt ='select * from seeds where name=:name';
	$params = array(
		':name' => $name,
	);

	if ($db -> display( $stmnt, $params)){
		$message='<div class="alert alert-danger">Seed name already exist!</div>';
	}else{


		$stmnt ='insert into seeds(category_id,name,time_period,stock,unit,hybrid,price,description) values (:category_id,:name,:time_period,:stock,:unit,:hybrid,:price,:description)';	
		$params=array(
			':category_id'=>$category_name,
			':name'=> $name,
			':time_period' => $time_period,
			':stock'=>$stock,
			':unit'=>$unit,
			':hybrid'=>$hybrid,
			':price'=>$price,
			':description' => $description
		);
		if( $db->execute_query( $stmnt,$params ) ) {
			$message = '<div class="alert alert-success">Seed ' . $name . ' Added!</div>';
			

		}
	}
}



?>
<center>
	<div  >
		<h2>Add Seed</h2>
	</div>


	<div    style="width: 80%; background: #B6B6B6; padding: 20px; text-align: center;  " >
		<div  >


			<form data-parsley-validate method="post" enctype="multipart/form-data">
				<div  >
					<div >
						<div >
							<label >Category</label>

							
							<select   name="category">
								<?php 
								foreach ($category as $value) {
									echo '<option value="' . $value['category_id'] . '">' . $value['category_name'] . '</option>'; 
								}
								?>
							</select>
						</div>

					</div>

					<div >
						<div >
							<label >Name</label>
							
							<input type="text" required  id="" name="name" placeholder="Name">
						</div>
					</div>

					<div >
						<div >
							<label >Timeperiod</label>
							
							<select name="time_period" >

								<option>2 weeks</option>
								<option>3 weeks</option>
								<option>1 month</option>
								<option>2 months</option>
								<option>3 months</option>
								<option>6 months</option>
								<option>1 year</option>
								<option>2 years</option>

							</select>  
						</div>
					</div>

					<div >
						<div >
							<label >Stock</label>
							
							<input type="number" min="1" required=""  name="stock" placeholder="Stock">
						</div>
					</div>

					<div >
						<div >
							<label >Unit</label>


							<input type="number" name="unit" min="1" required   id="unit" placeholder="Unit">  
						</div>
					</div>	     

					<div >
						<div >
							<label >Hybrid</label>
							<div class="col-sm-1">
								<input id="radio-1" type="radio"  name="hybrid" checked="true" value="Y">
								<label for="radio-1">Yes</label>
							</div>
							<div class="col-sm-1">
								<input id="radio-2" type="radio"  name="hybrid" value="N">
								<label for="radio-2">No</label>
							</div>
						</div>


						<div >
							<div >
								<label >price</label>

								<input type="number" min="1" required="" minlength="6" maxlength="6"  name="price" placeholder="price">
							</div>
						</div>

						<div >
							<div >
								<label >Description</label>

								<textarea name="description"  required ></textarea> 
							</div>
						</div>
					</div>

					<div >
						<div >
							<label ></label>
							
							<button  value="register" name="register">Add Seed</button>
						</div>
					</div>
				</div>

			</div>
			<?php if(isset($message)) echo $message;?>
		</form>
	</div>
</div>
</center>

<?php 
include_once( '../footer.php' ); ?> 