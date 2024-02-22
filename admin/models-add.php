<?php
include "header.php";
include "sidebar.php";
?>
<?php
if (isset($_GET['id']))
  $id = $_GET['id'];
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?php if ($id == 2)
                echo "Protype";
              elseif ($id == 3)
                echo "Manufacture";
              elseif ($id == 4)
                echo "User"; ?>
                        Add</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active"><?php if ($id == 2)
                                                  echo "Protype";
                                                elseif ($id == 3)
                                                  echo "Manufacture";
                                                elseif ($id == 4)
                                                  echo "User"; ?> Add</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->

    <form action="addmodels.php?id=<?php echo $id ?>" method="post" enctype="multipart/form-data">
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">General</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <?php if ($id == 2) { ?>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputName">Name New Protype</label>
                                <input name="name" type="text" id="inputName" class="form-control" require>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <?php } elseif ($id == 3) { ?>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputName">Name New Manufacture</label>
                                <input name="name" type="text" id="inputName" class="form-control" require>
                            </div>
                        </div>
                        <?php } else { ?>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputClientCompany">User Name</label>
                                <input name="username" type="text" id="inputClientCompany" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputClientCompany">Password</label>
                                <input name="password" type="text" id="inputClientCompany" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputClientCompany">Role ID</label>
                                <input name="role_id" type="text" id="inputClientCompany" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputClientCompany">Email</label>
                                <input name="email" type="text" id="inputClientCompany" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputClientCompany">Phone</label>
                                <input name="phone" type="text" id="inputClientCompany" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputClientCompany">Address</label>
                                <input name="address" type="text" id="inputClientCompany" class="form-control">
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <a href="#" class="btn btn-secondary">Cancel</a>
                    <input type="submit" value="Create" class="btn btn-success float-right">
                </div>
            </div>
        </section>
    </form>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->