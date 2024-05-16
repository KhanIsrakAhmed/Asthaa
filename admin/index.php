

<?php
include('../config/db_connect.php'); ?>

<?php  include"includes/header.php"; ?>

<div id="wrapper">

<?php  include"includes/nav.php"; ?>


<div id="page-wrapper">

    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                            Welcome to admin
                            
                            
                            <small> <?php 

                            if(isset($_SESSION['first_name'])) {

                            echo $_SESSION['first_name'];

                            }
                   ?></small>
                  </h1>
            </div>
        </div>


               
                
        <div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                      
                      <?php 

                        $query = "SELECT * FROM policy";
                        $select_all_policy = mysqli_query($conn,$query);
                        $policy_count = mysqli_num_rows($select_all_policy);

                      echo  "<div class='huge'>{$policy_count}</div>"

                        ?>


                        <div>Policy</div>
                    </div>
                </div>
            </div>
            <a href="posts.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-comments fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">

                                      <?php 

                                    $query = "SELECT * FROM company";
                                    $select_all_company = mysqli_query($conn,$query);
                                    $company_count = mysqli_num_rows( $select_all_company);

                                  echo  "<div class='huge'>{$company_count}</div>"

                                    ?>

           
                                      <div>Company</div>
                                    </div>
                                </div>
                            </div>
                            <a href="comments.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-user fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">

                                       <?php 

                                        $query = "SELECT * FROM customer";
                                        $select_all_customers = mysqli_query($conn,$query);
                                        $customer_count = mysqli_num_rows($select_all_customers);

                                      echo  "<div class='huge'>{$customer_count}</div>"

                                        ?>

                                       
                                        <div> Users</div>
                                    </div>
                                </div>
                            </div>
                            <a href="users.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-list fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">

                                     <?php 

                                    $query = "SELECT * FROM sells";
                                    $select_all_sells = mysqli_query($conn,$query);
                                    $sell_count = mysqli_num_rows($select_all_sells);

                                  echo  "<div class='huge'>{$sell_count}</div>"

                                    ?>

                                   <div>Total sells</div>
                                    </div>
                                </div>
                            </div>
                            <a href="categories.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            

    </div>
</div>
</div>


        <?php include"includes/footer.php"; ?>    


