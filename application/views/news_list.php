<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<?php include("header.php"); ?>

<body>
    <div class="wrapper">
        <!-- Sidebar Holder -->
        <?php include("menu.php") ?>
        <!-- Page Content Holder -->
        <div id="content">

            <nav class="navbar navbar-default">
                <div class="col-xs-12 mp">

                    <div class="col-xs-3">
                        <button type="button" id="sidebarCollapse" class="btn btn-default navbar-btn">
                            <i class="glyphicon glyphicon-align-left"></i>
                            <!-- <span>Toggle Sidebar</span>--->
                        </button>
                    </div>

                    <div class="pull-right col-xs-9">

                        <ul class="list-inline nav navbar-nav navbar-right pull-right">
                            <!--<li class="hidden-xs"><a href="#" class="add-project" data-toggle="modal" data-target="#add_project">Add Project</a></li>--->
                            <li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i></a></li>

                            <li>
                                <a href="#" class="icon-info">
                                    <i class="fa fa-bell" aria-hidden="true"></i>
                                    <span class="label label-primary">3</span>
                                </a>
                            </li>
                            <li class="dropdown">

                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                                    style="padding: 5px 5px; display: -webkit-inline-box; "><img
                                        src="<?php echo base_url().'assets/images/avatar.png'?>" width="40" height="40"
                                        class=" img-circle" alt="user">
                                    <b class="caret"></b></a>
                                <ul class="dropdown-menu list-unstyled">
                                    <li>
                                        <div class="navbar-content">
                                            <span><?php echo $this->session->userdata('username'); ?></span>
                                            <!--<p class="text-muted small">
                                                        me@jskrishna.com
                                                    </p>-->
                                            <div class="divider">
                                            </div>
                                            <p><i class="fa fa-sign-out" aria-hidden="true"></i><a
                                                    href="<?php echo base_url('home/logout') ?>">Logout</a></p>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div id="sub-content">

                <div class="row">
                    <div class="col-sm-12">
                        <div class="setbox setbox-info">
                            <div class="setbox-header with-border">
                                <h3 class="setbox-title">Product List</h3>
                            </div>
                            <!-- /.setbox-header -->
                            <div class="setbox-body">
                            <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered nowrap" style="width:100%">                                    <thead>
                                        <th width="1%">SNo</th>
                                        <th width="10%">product Name</th>
                                        <th width="15%">Description</th>
                                        <th width="10%">Price</th>
                                        <th width="10%">Category</th>
                                        <th width="15%">Image</th>
                                        <th width="3%">Edit</th>
                                        <th width="3%">Delete</th>
                                    </thead>
                                    <tbody>
                                        <?php 
            $i=1;
            if($get_product !=''){
            foreach ($get_product as $product) { ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $product->pname; ?></td>
                                            <td><p style="word-wrap: break-word;overflow-wrap: break-word;white-space: normal;"><?php echo $product->description; ?></p></td>
                                            <td><?php echo $product->price; ?></td>
                                            <td><?php echo $product->cname; ?></td>
                                            <td> <img src="<?php echo base_url("upload/profile/").$product->pimage; ?>"
                                                    width="150" height="150"></td>
                                            <td><a role="button" class="btn btn-warning"
                                                    href="<?php echo base_url('product/articleedit/').$product->id  ?>">Edit</a>
                                            </td>
                                            <td><a role="button" class="btn btn-danger delete-btn"
                                                    data-id="<?php echo $product->id; ?>">Delete</a></td>
                                        </tr>
                                        <?php
            $i++;
             } }else {?>
                                        <tr>
                                            <td colspan="7"> </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <h3 align="center"></h3>
                    <div class="col-sm-12">
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!---footer scripts--------->
    <script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-3.3.1.js'?>?v=1.0" ></script>
    <script type="text/javascript" src="<?php echo base_url().'assets/bootstrap/js/bootstrap.min.js'?>?v=1.0"></script>
    <script type="text/javascript" src="<?php echo base_url().'assets/js/dataTable/jquery.dataTables.min.js'?>?v=1.0">
    </script>
    <script type="text/javascript" src="<?php echo base_url().'assets/js/dataTable/dataTables.bootstrap.min.js'?>?v=1.0">
    </script>
    <script type="text/javascript" src="<?php echo base_url().'assets/js/dataTable/dataTables.fixedHeader.min.js'?>?v=1.0">
    </script>
    <script type="text/javascript" src="<?php echo base_url().'assets/js/dataTable/dataTables.responsive.min.js'?>?v=1.0">
    </script>
    <script type="text/javascript" src="<?php echo base_url().'assets/js/dataTable/responsive.bootstrap.min.js'?>?v=1.0">
    </script>
    <script type="text/javascript">
    $(document).ready(function() {
        var table = $('#example').DataTable({
            responsive: true
           
        });

        new $.fn.dataTable.FixedHeader(table);
    });
    $(document).ready(function() {
        var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>';
        var csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';

        $(document).on('click', '.delete-btn', function() {
            var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>';
            var csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';
            var id = $(this).data('id');
            if (confirm('Are you sure you want to delete this product?')) {
                var postData = {};
                postData[csrfName] = csrfHash;
                postData['id'] = id;
                $.ajax({
                    url: '<?= base_url("Product/delete") ?>',
                    method: 'POST',
                    data: postData,
                    success: function(response) {
                        const result = JSON.parse(response);
                        if (result.status === 'success') {
                            setTimeout(function() {
                                location.reload()
                            }, 500);
                        } else {
                            alert('Failed to delete product.');
                        }
                    }
                });
            }
        });

    });
    </script>

</body>

</html>