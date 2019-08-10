<?php
include_once('../header.php');
$db = new Database();
$message ='';

if (isset($_POST['update'])) {

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $gender=$_POST['gender'];
    $address = $_POST['address'];
    $qualification=$_POST['qualification'];
    $mobile=$_POST['mobile'];
    $stmnt='update agent set fname = :fname,lname=:lname,area_id=:area_id,gender=:gender,address=:address,qualification=:qualification,mobile=:mobile where agent_id = ' . $_GET['agent_id'];
    $params=array(
        ':fname'  => $fname,
        ':lname'  => $lname,
        ':gender'     =>$gender,
        ':address'    =>$address,
        ':qualification'=>$qualification,
        ':mobile'      =>$mobile,
        ':area_id'  =>  $_POST['area']
    );
    if( $db->execute_query($stmnt,$params) ) {
      $message = '<div class="alert alert-success">Agent updated!</div>';
  }
}
$sql = 'select * from area';
$area = $db->display($sql);

if( isset( $_GET['agent_id'] ) ) {
    $sql = 'select * from agent where agent_id = ' . $_GET['agent_id'];
    $agent = $db->display($sql);
    if( $agent ) {
        $agent = $agent[0];

        ?>
        <center>
            

            <div  >
                <h2>Agent Updation</h2>
            </div>


            <div    style="width: 80%; background: #B6B6B6; padding: 20px; text-align: center;  " >
              <div  >
               
                <form   data-parsley-validate method="post" enctype="multipart/form-data">
                  <div >
                    
                    <label >First Name</label>
                    
                    <input type="text" value="<?php echo  $agent['fname'] ?>" data-parsley-pattern="^[a-zA-Z]+$" required="" class="form-control" name="fname">
                    
                </div>
                <div >
                    
                    <label >Last Name</label>
                    
                    <input type="text" value="<?php echo  $agent['lname'] ?>" data-parsley-pattern="^[a-zA-Z]+$" required="" class="form-control" name="lname">
                    
                </div>
                <div >
                    
                    <label >Agent Area</label>
                    
                    <select name="area" class="form-control">
                        <?php foreach ($area as $value) : ?>
                          <option value="<?php echo $value['area_id']; ?>"<?php if( $agent['area_id'] == $value['area_id'] ) echo ' selected'; ?>><?php echo $value['area_name']; ?></option>
                      <?php endforeach; ?>
                  </select>
                  
              </div>
              <div >
                
                <label >Gender</label>
                <div class="col-sm-2">
                    <input id="radio-1" type="radio" <?php if( $agent['gender'] == 'Male' ) echo ' checked'; ?>  name="gender" checked="true" value="Male">
                    <label for="radio-1">Male</label>
                </div>
                <div class="col-sm-2">
                    <input id="radio-2" type="radio" <?php if( $agent['gender'] == 'Female' ) echo ' checked'; ?>  name="gender" value="Female">
                    <label for="radio-2">Female</label>
                    
                </div>
                <div >
                    
                    <label >Qualification</label>
                    
                    <select name="qualification" class="form-control">
                      <option <?php if( $agent['qualification'] == 'SSLC') echo 'selected'; ?>>SSLC</option>
                      <option <?php if( $agent['qualification'] == 'Plus Two') echo 'selected'; ?>>Plus Two</option>
                      <option <?php if( $agent['qualification'] == 'Graduate') echo 'selected'; ?>>Graduate</option>
                      <option <?php if( $agent['qualification'] == 'Post Graduate') echo 'selected'; ?>>Post Graduate</option>
                  </select>
                  
              </div>
              <div >
                
                <label >Address</label>
                
                <textarea name="address" required="" class="form-control"><?php echo $agent['address']; ?></textarea>
                
            </div>
            <div >
                
                <label >Mobile</label>
                
                <input type="text" data-parsley-pattern="^[789]\d{9}$" required="" class="form-control" name="mobile" value="<?php echo $agent['mobile']; ?>">
                
            </div>
            <div >
                
                <label ></label>
                
                <button type="submit" name="update" class="btn btn-primary">Register</button>
                
                <?php if(isset($message)) echo $message; ?>
            </div>
        </form>
    </div>
</div>

</center>
<script type="text/javascript">
  $('#date-of-birth-picker').datepicker({
    format: 'yyyy/mm/dd',
    startDate:'-45y',
    endDate:'-18y',
    autoclose: true,
});
</script>
<?php 
} else {echo '<div class="alert alert-info">No Agent found!</div>';}
}else {echo '<div class="alert alert-danger">No Agent to edit!</div>';} ?>
<?php include_once( '../footer.php' ); ?>