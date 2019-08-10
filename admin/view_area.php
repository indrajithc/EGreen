<?php 
include_once('../header.php');
$db = new Database();
$message = '';

$sql = 'select * from area';
$area = $db->display($sql);
?>

<center>
    
    <div id="page-title">
        <h2>View Area</h2>
    </div>  
    <div    style="width: 80%; background: #B6B6B6; padding: 20px; text-align: center;  " >
        <div >
            <h3  >
            </h3>
            <table cellpadding="0" cellspacing="0" border="1"   style="width: 100%;" >
                <thead>
                   <tr>
                      <th>Area Name</th>
                      <th>Area Description</th>
                      <th>Pin Number</th>
                  </tr>
              </thead>
              <tbody>
                <?php foreach ($area as $value): ?>
                   <tr>
                      <td><?php echo $value['area_name']; ?></td>
                      <td><?php echo $value['description']; ?></td>
                      <td><?php echo $value['pin']; ?></td>
                  </tr>
              <?php endforeach; ?>
          </tbody>
      </table>
  </div>
</div>


</center>

<script type="text/javascript">
	$(document).ready(function() {
        $('#datatable-example').dataTable();
    });
</script>

<?php include_once('../footer.php'); ?>