<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<?php include("header.php"); ?>

<body>
    <div class="wrapper">
        <!-- Sidebar Holder -->
        <!-- Page Content Holder -->
        <div id="content">

            <nav class="navbar navbar-default" style="background:#e9ce12; color:#ffffff">
                <div class="info-box" style="background:#e9ce12; color:#ffffff;padding-top: 15px;">
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-8">
                        <h2>WELCOME! GOLD JEWELLERY</h2>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </nav>
            <div id="sub-content">
                <!--1st panel--->
                <div class="row">
                    <div class="col-xs-12">

                        <!-- /.info-box -->
                    </div>
                </div>
                <div class="row">
                    <div class="card-group">

                        <?php 
        if(isset($product_details) && !empty($product_details))
        foreach($product_details as $product)
        { ?>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="card custom-light-border text-center">
                                <img src="<?php echo base_url("upload/profile/") . $product->pimage; ?>"
                                    class="img-fluid mx-auto d-block" style=" width:100%;height:250px;" alt="...">
                                <div class="card-body">
                                    <h3 class="card-title"><?php echo ucfirst($product->pname); ?></h3>
                                    <p class="card-text">
                                        <?php echo $this->User_model->limit_characters($product->description, 80); ?>
                                    </p>
                                    <h4 class="text-muted">Rs.<?php echo $product->price; ?></h4>
                                </div>
                            </div>
                        </div>

                        <?php
        }else {
        ?>
                        <!-- /.col -->
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box">
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <?php
        }
        ?>
                    </div> <!-- /.col -->
                </div>
                <!---//1st panel--->
            </div>

            <!---wrapper---->
        </div>

        <!---footer scripts--------->
        <script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-3.3.1.js'?>"></script>
        <script type="text/javascript" src="<?php echo base_url().'assets/bootstrap/js/bootstrap.min.js'?>"></script>
        <script type="text/javascript" src="<?php echo base_url().'assets/js/custom.js'?>"></script>

</body>

</html>