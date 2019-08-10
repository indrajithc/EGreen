<?php 
include_once('../header.php');
$db = new Database();
$message = '';

$sql = 'select * from category';
$area = $db->display($sql);
?>

<center>
    <div  >
        <h2>Edit Category</h2>
    </div>  



    <div    style="width: 80%; background: #B6B6B6; padding: 20px; text-align: center;  " >
        <div >
            <h3  >
            </h3>
            <table cellpadding="0" cellspacing="0" border="1"   style="width: 100%;" >



               
                <thead>
                 <tr>
                  <th>Category Name</th>
                  <th>Description</th>
                  <th>Edit</th>
              </tr>
          </thead>
          <tbody>
            <?php foreach ($area as $value): ?>
             <tr>
              <td><?php echo $value['category_name']; ?></td>
              <td><?php echo $value['description']; ?></td>
              <td><a class="btn btn-primary" href="update_category.php?id=<?php echo $value['category_id'];?>">Edit</a></td>
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