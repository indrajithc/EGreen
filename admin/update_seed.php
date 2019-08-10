<?php 
include_once('../header.php' );
include_once('../includes/class.fileuploader.php');

$db= new Database();

$message="";

if (isset($_POST['update'])) {

  $category= $_POST['category'];
  $name= $_POST['name'];
  $time_period= $_POST['time_period'];
  $stock=$_POST['stock'];
  $unit=$_POST['unit'];
  $hybrid=$_POST['hybrid'];
  $price=$_POST['price'];   
  $description = $_POST['description'];


  $stmnt ='select * from seeds where name=:name and seed_id <> :seed_id';
  $params = array(
   ':name' => $name,
   ':seed_id' => $_GET['id']
 );

  if ($db -> display( $stmnt, $params)){
    $message='<div class="alert alert-danger">Seed name already exist!</div>';
  }else{
   $stmnt ='update seeds set category_id = :category_id ,name = :name,time_period = :time_period,stock = :stock, unit = :unit, hybrid = :hybrid, price = :price,description = :description where seed_id = :seed_id'; 
   $params=array(
    ':category_id'=>$category,
    ':name'=> $name,
    ':time_period' => $time_period,
    ':stock'=>$stock,
    ':unit'=>$unit,
    ':hybrid'=>$hybrid,
    ':price'=>$price,
    ':description' => $description,
    ':seed_id' => $_GET['id']
  );
   if( $db->execute_query( $stmnt,$params ) ) {
    $message = '<div class="alert alert-success">Seed ' . $name . ' Updated!</div>';


  }
}
}

$sql = 'select * from category';
$category = $db->display($sql);

$sql = 'select * from seeds as seed inner join category as cat where seed.category_id = cat.category_id and seed_id = ' . $_GET['id'];
$seed = $db->display($sql);

if( $seed ) {
  $seed = $seed[0];

  ?>
  


  <center>
    
    <div >
      <h2>Add Seed</h2>
    </div>

    <div    style="width: 80%; background: #B6B6B6; padding: 20px; text-align: center;  " >
      <div  >
        <h3  >
          Elements
        </h3>

        <form   data-parsley-validate method="post" enctype="multipart/form-data">
          <div >
            <div >

              <label class="col-sm-3 control-label">Category</label>


              <select  class="form-control" name="category">
                <?php 
                foreach ($category as $value) { ?>
                <option value="<?php echo $value['category_id']; ?>" <?php if( $seed['category_id'] == $value['category_id'] ) echo ' selected'; ?>> <?php echo $value['category_name'] ?></option>; 
                <?php }
                ?>
              </select>

            </div>

            <div >

              <label class="col-sm-3 control-label">Name</label>

              <input type="text" required class="form-control" id="" name="name" placeholder="Name" value="<?php echo $seed['name']; ?>">

            </div>

            <div >

              <label class="col-sm-3 control-label">Timeperiod</label>

              <select id="time_period" name="time_period" class="form-control" value="">

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

            <div >

              <label class="col-sm-3 control-label">Stock</label>

              <input type="number" min="1" required="" class="form-control" name="stock" placeholder="Stock" value="<?php echo $seed['stock']; ?>">

            </div>

            <div >

              <label class="col-sm-3 control-label">Unit</label>


              <input type="number" name="unit" min="1" required class="form-control"  id="unit" placeholder="Unit" value="<?php echo $seed['unit']; ?>">  

            </div>       

            <div >

              <label class="col-sm-3 control-label">Hybrid</label>
              <div class="col-sm-1">
                <input id="radio-1" type="radio"  name="hybrid" checked="true" value="Y" <?php if( $seed['hybrid'] == 'Y' ) echo ' checked'; ?>>
                <label for="radio-1">Yes</label>
              </div>
              <div class="col-sm-1">
                <input id="radio-2" type="radio" <?php if( $seed['hybrid'] == 'N' ) echo ' checked'; ?>  name="hybrid" value="N">
                <label for="radio-2">No</label>

              </div>

              <div >

                <label class="col-sm-3 control-label">price</label>

                <input type="number" min="1" required="" minlength="6" maxlength="6" class="form-control" name="price"  value="<?php echo $seed['price']; ?>" placeholder="price">

              </div>

              <div >

                <label class="col-sm-3 control-label">Description</label>

                <textarea name="description" required class="form-control"><?php echo $seed[5]; ?></textarea> 

              </div>



              <div >

                <label class="col-sm-3 control-label"></label>

                <button class="btn btn-primary" type="submit" name="update">Update Seed</button>

              </div>

            </div>
            <?php if(isset($message)) echo $message;?>
          </form>
        </div>
      </div>



    </center>
    <?php }
    include_once( '../footer.php' ); ?> 