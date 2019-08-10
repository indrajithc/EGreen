<?php 
session_start();
include_once( 'includes/connection.php' );
include_once( 'includes/functions.php' );
auth_login();
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>



    <link rel="stylesheet" type="text/css" href="<?php echo PATH; ?>/assets/bootstrap-datepicker/bootstrap-datepicker.min-v2.2.0.css">
    <!-- JS Core -->
    <script type="text/javascript" src="<?php echo PATH; ?>/assets/js-core.js"></script>
    <script type="text/javascript" src="<?php echo PATH; ?>/assets/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>

</head>
<body>

    <ul>
        <li> <a href="index.php"> home</a></li>
        <li> <b>  category</b>
            <ul>
                <li> <a href="add_category.php"> add category</a></li>
                <li> <a href="view_category.php"> view category</a></li>
                <li> <a href="edit_category.php"> edit category</a></li>
            </ul>
        </li>
        
        <li> <b>  area</b>
            <ul>
                <li> <a href="add_area.php"> add area</a></li>
                <li> <a href="view_area.php"> view area</a></li>
                <li> <a href="edit_area.php"> edit area</a></li>
            </ul>
        </li>
        <li> <b>  seed</b>
            <ul>
                <li> <a href="add_seed.php"> add seed</a></li>
                <li> <a href="view_seed.php"> view seed</a></li>
                <li> <a href="edit_seed.php"> edit seed</a></li>
            </ul>
        </li>
        <li> <b>  agent</b>
            <ul>
                <li> <a href="agent_reg.php"> add agent</a></li>
                <li> <a href="view_agent.php"> view agent</a></li>
                <li> <a href="edit_agent.php"> edit agent</a></li>
            </ul>
        </li>



    </ul>