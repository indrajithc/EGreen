<?php 
	// Authenticate user login
	function auth_login() {
		if( ! isset( $_SESSION['userid'] ) ) {
        	header('Location: ' . PATH . '/admin/login.php');
	        exit();
	    } 
	    $flag = true;
	    if( $_SESSION['type'] == 'admin' && dirname($_SERVER['SCRIPT_NAME']) != DIRECTORY . '/admin' ) {
	        $flag = false;
	    }
	    if( $_SESSION['type'] == 'customer' && dirname($_SERVER['SCRIPT_NAME']) != DIRECTORY .'/customer') {
	        $flag = false;
	    }
	    if( $_SESSION['type'] == 'agent' && dirname($_SERVER['SCRIPT_NAME']) != DIRECTORY .'/agent') {
	        $flag = false;
	    }
	    if( !$flag ) {

    
	        echo 'You have no permission to view this page';
	        exit();
	    }
	}

	// get logged user type
	function user_type() {
		return $_SESSION['type'];
	}
?>