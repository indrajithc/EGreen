<?php 
include_once('../header.php');
$db = new Database();
$message = '';

if( isset( $_POST['delete'] ) ) {
  $sql = 'update seeds set deleted = true where seed_id = "' . $_POST['seed_id'] . '"';
  if( $db->execute_query($sql) ) $message = 'Deleted!';
}

$sql = 'select * from seeds as seed inner join category as cat where seed.category_id = cat.category_id and seed.deleted = false';
$seeds = $db->display($sql);
?>
<center>



  <div >
    <h2>View Seeds</h2>
  </div>  
  <div    style="width: 80%; background: #B6B6B6; padding: 20px; text-align: center;  " >
    <div >
      <h3  >
      </h3>
      <table cellpadding="0" cellspacing="0" border="1"   style="width: 100%;" >
        <thead>
          <tr>
            <th>Seed Name</th>
            <th>Category</th>
            <th>Description</th>
            <th>Time Period</th> 
          </tr>
        </thead>
        <tbody>
          <?php foreach ($seeds as $seed): ?>
            <tr>
              <td><?php echo $seed['name']; ?></td>
              <td><?php echo $seed['category_name']; ?></td>
              <td><?php echo $seed[5]; ?></td>
              <td><?php echo $seed['time_period']; ?></td>

            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
      <?php if( $message ) echo $message; ?>
    </div>
  </div>



</center>


<?php include_once('../footer.php'); ?>