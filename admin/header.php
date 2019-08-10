<?php 
session_start();
include_once( 'includes/connection.php' );
include_once( 'includes/functions.php' );
auth_login();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <title>E-FARMING</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="stylesheet" type="text/css" href="<?php echo PATH; ?>/assets/styles.css">
    <link rel="stylesheet" type="text/css" href="<?php echo PATH; ?>/assets/bootstrap-datepicker/bootstrap-datepicker.min-v2.2.0.css">
    <!-- JS Core -->
    <script type="text/javascript" src="<?php echo PATH; ?>/assets/js-core.js"></script>
    <script type="text/javascript" src="<?php echo PATH; ?>/assets/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo PATH; ?>/assets/file_upload/jquery.fileuploader.css">
    <script type="text/javascript" src="<?php echo PATH; ?>/assets/file_upload/jquery.fileuploader.js"></script>

    <script type="text/javascript" src="<?php echo PATH; ?>/assets/widgets/datatable/datatable.js"></script>
    <script type="text/javascript" src="<?php echo PATH; ?>/assets/widgets/datatable/datatable-bootstrap.js"></script>
    <script type="text/javascript" src="<?php echo PATH; ?>/assets/widgets/datatable/datatable-tabletools.js"></script>
    <script type="text/javascript" src="<?php echo PATH; ?>/assets/main.js"></script>
    <style type="text/css">
    
    #page-title {
        top: 0;
        right: 0;
        left: 0;
        background-color: #4a90e2!important;
        overflow: hidden;
        margin-left: -30px;
        margin-top: -20px;
        padding: 30px;
        margin-bottom: 40px;
        color: #fff;
        margin-right: -30px;
    }
    #page-title h2 {
        font-weight: 500;
        font-size: 2.5rem;
        color: #fff;
    }
</style>
</head>

<body class=" fixed-sidebar">
    <div id="sb-site">
        <div class="page-wrapper">
            
            <!-- Sidebar -->
            <div id="page-sidebar" class="bg-black font-inverse">
                <div class="scroll-sidebar">
                    <ul id="sidebar-menu">
                        <?php if( user_type() == 'admin' ): ?>
                          
                          
                         <li>
                            <a href="change_password.php" title="Change Password">
                                <i class="glyph-icon icon-linecons-tv"></i>
                                <span>Change Password</span>
                            </a>
                        </li>
                        <li class="header"><span>AREA</span></li>
                        <li>
                            <a href="#" title="Ara">
                                <i class="glyph-icon icon-linecons-location"></i>
                                <span>Area</span>
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li>
                                        <a href="add_area.php" title="Buttons"><span>Add Area</span></a>
                                    </li>
                                    <li>
                                        <a href="edit_area.php" title="Buttons"><span>Edit Area</span></a>
                                    </li>
                                    <li>
                                        <a href="view_area.php" title="Buttons"><span>View  Area</span></a>
                                    </li>
                                </ul>
                            </div>
                        </li> 
                        <li class="header"><span>CATEGORY</span></li>     
                        <li>
                            <a href="#" title="Categories">
                                <i class="glyph-icon icon-linecons-params"></i>
                                <span>Seed Category</span>
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li>
                                        <a href="add_category.php" title="Buttons"><span>Add Category</span></a>
                                    </li>
                                    <li>
                                        <a href="edit_category.php" title="Buttons"><span>Edit Category</span></a>
                                    </li>
                                    <li>
                                        <a href="view_category.php" title="Buttons"><span>View  Categories</span></a>
                                    </li>
                                </ul>
                            </div>
                        </li> 
                        <li class="header"><span>Orders</span></li>
                        <li>
                            <a href="#" title="Ara">
                                <i class="glyph-icon icon-linecons-user"></i>
                                <span>Customers</span>
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li>
                                        <a href="register_customer.php" title="Buttons"><span>Customer Registration</span></a>
                                    </li>
                                    <li>
                                        <a href="view_customer.php" title="Buttons"><span>View Customers</span></a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="header"><span>Seeds</span></li>  
                        <li>
                            <a href="#" title="Seeds">
                                <i class="glyph-icon icon-linecons-fire"></i>
                                <span>Seeds</span>
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li>
                                        <a href="add_seed.php" title="Buttons"><span>Add Seeds</span></a>
                                    </li>
                                    <li>
                                        <a href="edit_seed.php" title="Buttons"><span>Edit Seeds</span></a>
                                    </li>
                                    <li>
                                        <a href="view_seed.php" title="Buttons"><span>View  Seeds</span></a>
                                    </li>
                                    <li>
                                        <a href="update_stock.php" title="Buttons"><span>Update Stock</span></a>
                                    </li>
                                    <li>
                                        <a href="damaged_stock.php" title="Buttons"><span>Update Damaged Stock</span></a>
                                    </li>
                                </ul>
                            </div>
                        </li>   
                        <li class="header"><span>Agent</span></li>  
                        <li>
                            <a href="#" title="Seeds">
                                <i class="glyph-icon icon-linecons-user"></i>
                                <span>Agent</span>
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li>
                                        <a href="agent_reg.php" title="Buttons"><span>Register Agent</span></a>
                                    </li>
                                    <li>
                                        <a href="view_agent.php" title="Buttons"><span>View Agents</span></a>
                                    </li>
                                    <li>
                                        <a href="edit_agent.php" title="Buttons"><span>Edit Agent</span></a>
                                    </li>
                                </ul>
                            </div>
                        </li>  
                        <li class="header"><span>Complaint</span></li>
                        <li>
                            <a href="#" title="Ara">
                                <i class="glyph-icon icon-linecons-user"></i>
                                <span>Complaints</span>
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li>
                                        <a href="complaints.php" title="Buttons"><span>Reply</span></a>
                                    </li>
                                    <li>
                                        <a href="replyed_c.php" title="Buttons"><span>View Replyed complaints</span></a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    <?php endif; ?>  
                    <?php if( user_type() == 'agent' ): ?>    
                       
                       <li class="header"><span>PROFILE</span></li>
                       <li>
                        <?php 
                        $db = new Database();

                        $qry = "select * from agent where agent_id = ".$_SESSION['userid'];
                        $exe = $db->display( $qry );
                        $fname = $exe[0]['fname'];
                        $lname = $exe[0]['lname'];
                        $nameee = $fname.' '.$lname;
                        ?>
                        <a href="#" title="Ara">
                            <i> Welcome </i>
                            <span><?php echo $nameee; ?></span>
                        </a>
                        <div class="sidebar-submenu">
                            <ul>
                                <li>
                                    <a href="view_profile.php" title="Buttons"><span>View Profile</span></a>
                                </li>
                                <li>
                                    <a href="edit_profile.php" title="Buttons"><span>Edit Profile</span></a>
                                </li>
                                <li>
                                    <a href="change_password.php" title="Buttons"><span>Change Password</span></a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    
                    
                    <li class="header"><span>Customers</span></li>
                    <li>
                        <a href="#" title="Ara">
                            <i class="glyph-icon icon-linecons-user"></i>
                            <span>Customers</span>
                        </a>
                        <div class="sidebar-submenu">
                            <ul>
                                <li>
                                    <a href="register_customer.php" title="Buttons"><span>Customer Registration</span></a>
                                </li>
                                <li>
                                    <a href="view_customer.php" title="Buttons"><span>View Customers</span></a>
                                </li>
                            </ul>
                        </div>
                    </li> 
                    <li class="header"><span>Seed Order</span></li>
                    <li>
                        <a href="#" title="Ara">
                            <i class="glyph-icon icon-linecons-paper-plane"></i>
                            <span>Order</span>
                        </a>
                        <div class="sidebar-submenu">
                            <ul>
                                <li>
                                    <a href="order.php" title="Buttons"><span>Order seeds</span></a>
                                </li>
                                <li>
                                    <a href="prev_orders.php" title="Buttons"><span>Previous Orders</span></a>
                                </li>
                                <li>
                                    <a href="cod.php" title="Buttons"><span>Update Order Status</span></a>
                                </li>
                            </ul>
                        </div>
                    </li> 
                     <!---   <li class="header"><span>Profile</span></li>
                        <li>
                            <a href="#" title="Ara">
                                <i class="glyph-icon icon-linecons-user"></i>
                                <span>Profile</span>
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li>
                                        <a href="view_profile.php" title="Buttons"><span>View Profile</span></a>
                                    </li>
                                    <li>
                                        <a href="edit_profile.php" title="Buttons"><span>Edit Profile</span></a>
                                    </li>
                                    <li>
                                        <a href="change_password.php" title="Buttons"><span>Change Password</span></a>
                                    </li>
                                </ul>
                            </div>
                        </li> -->
                        <li class="header"><span>Complaint</span></li>
                        <li>
                            <a href="#" title="Ara">
                                <i class="glyph-icon icon-linecons-user"></i>
                                <span>Complaint</span>
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li>
                                        <a href="complaint_book.php" title="Buttons"><span>Register Complaint</span></a>
                                    </li>
                                    <li>
                                        <a href="view_complaint.php" title="Buttons"><span>View Reply</span></a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    <?php endif; ?>   
                    <?php if( user_type() == 'customer' ): ?>
                      
                        <li class="header"><span>PROFILE</span></li>
                        <li>
                            <?php 
                            $db = new Database();

                            $qry = "select * from customer where cust_id = ".$_SESSION['userid'];
                            $exe = $db->display( $qry );
                            $fname = $exe[0]['fname'];
                            $lname = $exe[0]['lname'];
                            $nameee = $fname.' '.$lname;
                            ?>
                            <a href="#" title="Ara">
                                <i> Welcome </i>
                                <span><?php echo $nameee; ?></span>
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li>
                                        <a href="view_profile.php" title="Buttons"><span>View Profile</span></a>
                                    </li>
                                    <li>
                                        <a href="edit_profile.php" title="Buttons"><span>Edit Profile</span></a>
                                    </li>
                                    <li>
                                        <a href="change_password.php" title="Buttons"><span>Change Password</span></a>
                                    </li>
                                </ul>
                            </div>
                        </li>





                        
                        <li class="header"><span>ORDERS</span></li>
                        
                        <li>
                            <a href="#" title="Ara">
                                <i class="glyph-icon icon-linecons-paper-plane"></i>
                                <span>Order</span>
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li>
                                        <a href="order.php" title="Buttons"><span>Order seeds</span></a>
                                    </li>
                                    <li>
                                        <a href="prev_orders.php" title="Buttons"><span>Previous Orders</span></a>
                                    </li>
                                </ul>
                            </div>
                        </li>      
                        <li class="header"><span>Complaint</span></li>
                        <li>
                            <a href="#" title="Ara">
                                <i class="glyph-icon icon-linecons-user"></i>
                                <span>Complaint</span>
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li>
                                        <a href="complaint_book.php" title="Buttons"><span>Register Complaint</span></a>
                                    </li>
                                    <li>
                                        <a href="view_complaint.php" title="Buttons"><span>View Reply</span></a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    <?php endif; ?> 
                    <li>
                        <a href="../logout.php" title="Ara">
                            <span> <i class="glyph-icon icon-arrow-circle-o-right"></i> Logout</span>
                        </a>
                    </li>  
                </ul>
            </div>
        </div>
        <!-- main page -->
        <div class="page-content-wrapper">
            <div id="page-content">
                <div class="container">