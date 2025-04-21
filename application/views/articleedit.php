<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<?php include("header.php") ?>

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
                                    style="    padding: 5px 5px; display: -webkit-inline-box; "><img
                                        src="<?php echo base_url().'assets/images/avatar.png'?>" width="40" height="40"
                                        class=" img-circle" alt="user">
                                    <b class="caret"></b></a>
                                <ul class="dropdown-menu list-unstyled">
                                    <li>
                                        <div class="navbar-content">
                                            <span><?php echo $this->session->userdata('usernme') ?></span>
                                            <!-- <p class="text-muted small">
                                                        me@jskrishna.com
                                                    </p>-->
                                            <div class="divider">
                                            </div>
                                            <p><a href="<?php echo base_url('home/logoutuser') ?>"><i
                                                        class="fa fa-sign-out" aria-hidden="true"></i> Logout</p></a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div id="sub-content">
                <!-- <div class="row">
          <ol class="breadcrumb">
  <li><a href="#">Home</a></li>
  <li><a href="#">Articles</a></li>
  <li class="active">Add New Article</li>
</ol>
</div>--->

                <div class="row">
                    <!--- <h3 align="center">Add News </h3>--->
                    <div class="col-md-12">
                        <!-- Horizontal Form -->
                        <div class="setbox setbox-info">
                            <div class="setbox-header with-border">
                                <h3 class="setbox-title">Edit Product</h3>
                            </div>
                            <!-- /.setbox-header -->
                            <!-- form start -->
                            <form class="form-horizontal" id="productaction" method="POST"
                                enctype="multipart/form-data">
                                <div class="setbox-body">
                                    <?php 
foreach ($get_product as $value) {
?>
                                    <!-- /.setbox-body -->
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Product Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="pname" class="form-control"
                                                value="<?php echo $value->pname;  ?>" placeholder="Product Name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Description</label>
                                        <div class="col-sm-10">
                                            <textarea name="description" class="form-control"
                                                rows="3"><?php echo $value->description;  ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Price</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="price" class="form-control"
                                                value="<?php echo $value->price;  ?>" placeholder="price">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Category</label>
                                        <div class="col-sm-10">
                                            <select name="category" class="form-control" id="sel1">
                                                <option value="">Select</option>
                                                <?php foreach ($get_category as $i)
                    		{
                    	?>
                                                <option value="<?php echo $i->cid; ?>"
                                                    <?php echo ($value->category == $i->cid)?"Selected":"" ?>>
                                                    <?php echo $i->cname ; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Upolad Image(s)</label>
                                        <div class="col-sm-10">
                                            <input type="file" name="pimage" id="inputImage" class="form-control"
                                                multiple />
                                            <input type="hidden" name="pid" value="<?php echo $value->id ?>">
                                            <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>"
                                                value="<?= $this->security->get_csrf_hash(); ?>" />
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <input name="inputprofile" id="inputprofile" type="hidden"
                                        value="<?php echo $value->pimage; ?>">
                                    <img src="<?php echo base_url("upload/profile/"). $value->pimage; ?>"
                                        id="croppedPreview" class="img-thumbnail"
                                        style="margin-top: 20px; width:200px; height:200px" />
                                </div>
                        </div>


                        <div class="setbox-footer">
                            <button type="reset" class="btn btn-default">Reset</button>
                            <button type="submit" class="btn btn-primary pull-right">Submit</button>
                        </div>
                        <!-- /.setbox-footer -->

                        <?php } ?>
                        </form>
                    </div>
                    <!-- /.setbox -->

                </div>

            </div>

        </div>


    </div>
    <!---</div>-->

    <!---wrapper---->
    </div>
    <div id="cropperModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Crop Image</h4>
                </div>

                <div class="modal-body text-center">
                    <img id="modalImage" style="max-width: 100%;" />
                </div>

                <div class="modal-footer">
                    <button type="button" id="cropBtn" class="btn btn-success">Crop & Save</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>

            </div>
        </div>
    </div>




    <!---footer scripts--------->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.js">
    </script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/mode/xml/xml.min.js">
    </script>
    <script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-3.3.1.js'?>"></script>
    <script type="text/javascript" src="<?php echo base_url().'assets/bootstrap/js/bootstrap.min.js'?>"></script>
    <script type="text/javascript" src="<?php echo base_url().'assets/js/custom.js'?>"></script>
    <script type="text/javascript" src="<?php echo base_url() . 'assets/formvalidation/formValidation.min.js'?>">
    </script>
    <script type="text/javascript" src="<?php echo base_url() . 'assets/formvalidation/bootstrap.min.js'?>"></script>


    <script type="text/javascript">
    $(document).ready(function() {

        var productname = {
                row: ".col-sm-10",
                validators: {
                    notEmpty: {
                        message: "Enter the product name"
                    }
                }
            },
            description = {
                row: ".col-sm-10",
                validators: {
                    notEmpty: {
                        message: "Enter the description"
                    }
                }
            },
            price = {
                row: ".col-sm-10",
                validators: {
                    notEmpty: {
                        message: "Enter the price"
                    }
                }
            },
            category = {
                row: ".col-sm-10",
                validators: {
                    notEmpty: {
                        message: "Enter category"
                    }
                }
            },
            pimage = {
                row: ".col-sm-10",
                validators: {
                    notEmpty: {
                        message: "Upload image"
                    }
                }
            }

        $('#productaction')
            .formValidation({
                framework: 'bootstrap',
                icon: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    'pname': productname,
                    'description': description,
                    'price': price,
                    'category': category

                }
            })

            .on('success.form.fv', function(e) {
                // Prevent form submission
                e.preventDefault();

                $.ajax({
                    url: "<?php echo base_url('product/create_product') ?>",
                    method: "POST",
                    data: new FormData(this),
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        if (data.response == "success") {
                            window.location.href = "<?php echo base_url('product/index') ?>";
                        } else {
                            window.location.href = "<?php echo base_url('product/addnew') ?>";
                        }
                    }
                });
            });
    });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.js"></script>
    <script>
    var cropper;

    $('#inputImage').on('change', function(e) {
        var file = e.target.files[0];
        if (file && file.type.match('image.*')) {
            var reader = new FileReader();
            reader.onload = function(evt) {
                $('#modalImage').attr('src', evt.target.result);
                $('#cropperModal').modal('show');
            };
            reader.readAsDataURL(file);
        }
    });

    $('#cropperModal').on('shown.bs.modal', function() {
        cropper = new Cropper(document.getElementById('modalImage'), {
            aspectRatio: 1,
            autoCropArea: 1,
            viewMode: 1,
        });
    }).on('hidden.bs.modal', function() {
        if (cropper) {
            cropper.destroy();
            cropper = null;
        }
    });

    $('#cropBtn').on('click', function() {
        if (cropper) {
            var csrfName = '<?= $this->security->get_csrf_token_name(); ?>';
            var csrfHash = '<?= $this->security->get_csrf_hash(); ?>';
            const cropData = cropper.getData(); // {x, y, width, height}
            const file = $('#inputImage')[0].files[0];
            const formData = new FormData();

            formData.append('pimage', file);
            formData.append('x', cropData.x);
            formData.append('y', cropData.y);
            formData.append('width', cropData.width);
            formData.append('height', cropData.height);
            formData.append(csrfName, csrfHash);

            $.ajax({
                url: '<?= base_url("Product/crop") ?>',
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    console.log('Crop success:', response);
                    const result = JSON.parse(response);
                    if (result.status === 'success') {
                        $("#inputprofile").val(result.file)
                        $('#croppedPreview').attr('src', '<?= base_url("upload/profile/") ?>' +
                            result.file).show();
                        $('input[name="<?= $this->security->get_csrf_token_name(); ?>"]').val(result
                            .csrfToken);
                    }
                    $('#cropperModal').modal('hide');

                },

                error: function(xhr) {
                    console.error('Server error:', xhr);
                }
            });
        }
    });
    </script>

</body>

</html>