<?php
include_once('../header.php');
$db = new Database();
$message ='';
if (isset($_POST['register'])) {

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $password=md5($_POST['password']);
    $gender=$_POST['gender'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];
    $qualification=$_POST['qualification'];
    $mobile=$_POST['mobile'];

    $stmnt1 ='select * from agent where mobile=:mobile';
    $params1 = array(
       ':mobile' => $mobile,
   );

    if ($db -> display( $stmnt1, $params1)){
        $message='<p  >mobile number exist!</p>';
    } else {




        $stmnt='insert into agent(fname,lname,area_id,password,gender,dob,address,qualification,mobile) values(:fname,:lname,:area_id,:password,:gender,:dob,:address,:qualification,:mobile)';
        $params=array(
            ':fname'  => $fname,
            ':lname'  => $lname,
            ':password'   =>$password,
            ':gender'     =>$gender,
            ':dob'     =>$dob,
            ':address'    =>$address,
            ':qualification'=>$qualification,
            ':mobile'      =>$mobile,
            ':area_id'  =>  $_POST['area']
        );
        if( $db->execute_query($stmnt,$params) ) {
            $message = ' <p> Agent Registered - Agent ID: ' . $db->lastInsertId() . ' </p>';
        }
    }
    unset($_REQUEST);
    //} else {
//        $message = '<div class="alert alert-danger">Mobile Number already exists</div>';
  //  }
    //} 
}

$sql = 'select * from area';
$area = $db->display($sql);

?>


<link rel="stylesheet" type="text/css" href="<?php echo PATH; ?>/assets/styles.css">
<center>


    <style type="text/css">
    .parsley-errors-list li{
        list-style: none;
        color: red;
    }
</style>

<div  >
    <h2>Agent Registration</h2>
</div>

<div    style="width: 80%; background: #B6B6B6; padding: 20px; text-align: center;  " >
    <div  >
        <h3  >

        </h3>
        <form   data-parsley-validate method="post" enctype="multipart/form-data">
            <div >

                <label >First Name</label>

                <input type="text" data-parsley-pattern="^[a-zA-Z]+$" required=""  name="fname">

            </div>
            <div >

                <label >Last Name</label>

                <input type="text" data-parsley-pattern="^[a-zA-Z]+$" required=""  name="lname">

            </div>
            <div >

                <label >Agent Area</label>

                <select name="area" >
                    <?php foreach ($area as $value) : ?>
                        <option value="<?php echo $value['area_id']; ?>"><?php echo $value['area_name']; ?></option>
                    <?php endforeach; ?>
                </select>

            </div>
            <div >

                <label >Gender</label> 
                <input id="radio-1" type="radio"  name="gender" checked="true" value="Male">
                <label for="radio-1">Male</label>

                <input id="radio-2" type="radio"  name="gender" value="Female">
                <label for="radio-2">Female</label>

            </div>
            <div >

                <label >Date of Birth</label>

                <input type="text" required="" data-parsley-pattern="^\d{4}[\-\/\s]?((((0[13578])|(1[02]))[\-\/\s]?(([0-2][0-9])|(3[01])))|(((0[469])|(11))[\-\/\s]?(([0-2][0-9])|(30)))|(02[\-\/\s]?[0-2][0-9]))$" id="date-of-birth-picker"  name="dob">

            </div>
            <div >

                <label >Qualification</label>

                <select name="qualification" >
                  <option>SSLC</option>
                  <option>Plus Two</option>
                  <option>Graduate</option>
                  <option>Post Graduate</option>
              </select>

          </div>
          <div >

            <label >Address</label>

            <textarea name="address" required="" ></textarea>

        </div>
        <div >

            <label class"password" minlength="8" data-parsley-equalto="#password" id="re-password"  required="" placeholder="Re password *">

            </div>
            <div ><label>Password</label>

                <input type="password" name="password" minlength="8" id="password" required="" placeholder="Password *" >

            </div>
            <div >

                <label >Re password</label>

                <input type="password" name="password"minlength="8" data-parsley-equalto="#password" id="re-password"  required="" placeholder="Re password *">

            </div>

            <div>


                <label >Mobile</label>

                <input type="text" data-parsley-pattern="^[789]\d{9}$" required=""  name="mobile">

            </div>
            <div >

                <label ></label>

                <button type="submit" name="register" c >Register</button>


            </div>
        </form>
        <?php if(isset($message)) echo $message; ?>
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
<?php include_once( '../footer.php' ); ?>