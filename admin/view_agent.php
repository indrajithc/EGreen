<?php 
include_once('../header.php');
$db = new Database();
$message = '';

$sql = 'select * from agent as agent inner join area as area where agent.area_id = area.area_id';
$agents = $db->display($sql);

if( isset( $_GET['area'] ) ) {
    if ($_GET['area'] != 'all') {
        $sql = 'select * from agent as agent inner join area as area where agent.area_id = area.area_id  and area.area_id = ' . $_GET['area'];
        $agents = $db->display($sql);
    }
}
$sql = 'select * from area';
$areas = $db->display($sql);
?>

<center>
    

    <div id="page-title">
        <h2>Edit Seed</h2>
    </div>  
    <div    style="width: 80%; background: #B6B6B6; padding: 20px; text-align: center;  " >

        <div  >

            <form method="get" action="">
                <div >
                    <div >
                        <div >
                            <label  >Filter with</label>
                            <div  > 
                                <select name="area" onchange="this.form.submit();" class="form-control">
                                    <option value="all">No filter</option>
                                    <?php foreach ($areas as $area): ?>
                                        <option value="<?php echo $area['area_id']; ?>" <?php  if( isset( $_GET['area'] ) ) if( $area['area_id'] == $_GET['area'] ) echo 'selected'; ?>><?php echo $area['area_name']; ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <table cellpadding="0" cellspacing="0" border="1"   style="width: 100%;" > 
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Area</th>
                        <th>Gender</th>
                        <th>DOB</th>
                        <th>Address</th>
                        <th>Qualification</th>
                        <th>Contact</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($agents as $agent): ?>
                        <tr>
                            <td><?php echo ucfirst($agent['fname'] . $agent['lname']); ?></td>
                            <td><?php echo $agent['area_name']; ?></td>
                            <td><?php echo $agent['gender']; ?></td>
                            <td><?php echo $agent['dob']; ?></td>
                            <td><?php echo $agent['address']; ?></td>
                            <td><?php echo $agent['qualification']; ?></td>
                            <td><?php echo $agent['mobile']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php if( $message ) echo $message; ?>
        </div>
    </div>



</center>
<script type="text/javascript">
    $(document).ready(function() {
        $('#datatable-example').dataTable();
    });
</script>

<?php include_once('../footer.php'); ?>