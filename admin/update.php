<?php
include "header.php"; 
include "sidebar.php";
?> 
<?php if (isset($_GET['id'])) {
          $id = $_GET['id'];
          $id1 = $_GET['id1']; }  ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php if($id1 == 1) echo "Product"; elseif ($id1 == 2) echo "Protype"; elseif ($id1 == 3) echo "Manufacture"; elseif ($id1 == 4) echo "User"; ?> Edit</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"><?php if($id1 == 1) echo "Product"; elseif ($id1 == 2) echo "Protype"; elseif ($id1 == 3) echo "Manufacture"; elseif ($id1 == 4) echo "User"; ?> Edit</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <form action="ud_value.php?id1=<?php echo $id1 ?>&id=<?php echo $id ?>" method="post" enctype="multipart/form-data">
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
            <?php
                $product = new Product();
                $products = $product->getAllProducts();
                $protype = new Protype();
                $protypes = $protype->getAllProtypes();
                $manu = new Manufacture();
                $manus = $manu->getAllManufacture();
                $user = new User();
                $users = $user->getAllUsers();
                    if ($id1 == 1) {
                      foreach($products as $values){ 
                        if ($values['id'] == $id) { ?>
                            <div class="card-body">
                              <div class="form-group">
                                <label for="inputName"> ID</label>
                                <input name="id" type="text" id="inputName" class="form-control" value="<?php echo $values['id'] ?>" disabled>
                              </div>
                              <div class="form-group">
                                <label for="inputName">Name</label>
                                <input name="name" type="text" id="inputName" class="form-control" value="<?php echo $values['name'] ?>" require>
                              </div>
                              <div class="form-group">
                                <label for="inputName">Price</label>
                                <input name="price" type="text" id="inputName" class="form-control" value="<?php echo $values['price'] ?>" require>
                              </div>
                              
                              <div class="form-group">
                                <label for="inputName">Image</label>
                                <input name="image" type="file" id="inputName" class="form-control" value ="<?php echo $values['image'] ?>">
                              </div>
                              <div class="form-group">
                                <label for="inputDescription">Description</label>
                                <textarea name="description" id="inputDescription" class="form-control" rows="4" require><?php echo $values['description'] ?></textarea>
                              </div>
                              <div class="form-group">
                                <label for="inputStatus">Manufacture</label>
                                <select name="manu_id" id="inputStatus" class="form-control custom-select">
                                  <option selected disabled>Select one</option>
                                  <?php
                                  $manufacture = new Manufacture();
                                  $getAllManus = $manufacture->getAllManufacture();
                                  foreach($getAllManus as $value):
                                  ?>
                                  <?php
                                    if ($values['manu_id'] == $value['manu_id']) { ?>
                                      <option value="<?php echo $value['manu_id'] ?>" selected="selected"><?php echo $value['manu_name'] ?></option>
                                   <?php } else { ?>
                                      <option value="<?php echo $value['manu_id'] ?>"><?php echo $value['manu_name'] ?></option>
                                    <?php  }
                                  ?>
                                <?php endforeach; ?>
                                </select>
                              </div>
                              <div class="form-group">
                                <label for="inputStatus">Protype</label>
                                <select name="type_id" id="inputStatus" class="form-control custom-select">
                                  <option selected disabled>Select one</option>
                                  <?php
                                  $protype = new Protype();
                                  $getAllProtypes = $protype->getAllProtypes();
                                  foreach($getAllProtypes as $value):
                                  ?>
                                  <?php
                                    if ($values['type_id'] == $value['type_id']) { ?>
                                      <option value="<?php echo $value['type_id'] ?>" selected="selected"><?php echo $value['type_name'] ?></option>
                                   <?php } else { ?>
                                      <option value="<?php echo $value['type_id'] ?>"><?php echo $value['type_name'] ?></option>
                                    <?php  }
                                  ?>
                                  <?php endforeach; ?>
                                </select>
                              </div>
                              <div class="form-group">
                                <label for="inputName">Selled</label>
                                <input name="selled" type="text" id="inputName" class="form-control" value="<?php echo $values['selled'] ?>">
                              </div>
                              <div class="form-group">
                                <label for="inputClientCompany">Feature</label>
                                <input name="feature" type="checkbox" id="inputClientCompany" class="form-control">
                              </div>
                          </div>
                      <?php  } } 
                    }elseif($id1 == 2){ 
                        foreach($protypes as $value){ 
                            if ($value['type_id'] == $id) { ?>
                                <div class="card-body">
                                    <div class="form-group">
                                        <input name="type_id" type="hidden" id="inputName" class="form-control" value="<?php echo $value['type_id'] ?>"disabled> 
                                    </div>
                                    <div class="form-group">
                                        <label for="inputClientCompany">Protype Name</label>
                                        <input name="type_name" type="text" id="inputClientCompany" class="form-control" value="<?php echo $value['type_name'] ?>">
                                    </div>
                                </div>
                        <?php  } } 
                    }elseif($id1 == 3){
                      foreach($manus as $value){ 
                        if ($value['manu_id'] == $id) { ?>
                            <div class="card-body">
                                <div class="form-group">
                                    <input name="manu_id" type="hidden" id="inputName" class="form-control" value="<?php echo $value['manu_id'] ?>"disabled>
                                </div>
                                <div class="form-group">
                                    <label for="inputClientCompany">Manufacture Name</label>
                                    <input name="manu_name" type="text" id="inputClientCompany" class="form-control" value="<?php echo $value['manu_name'] ?>">
                                </div>
                            </div>
                        <?php  } } 
                    }else{
                      foreach($users as $value){ 
                        if ($value['user_id'] == $id) { ?>
                            <div class="card-body">
                                <div class="form-group">
                                    <input name="user_id" type="hidden" id="inputName" class="form-control" value="<?php echo $value['user_id'] ?>"disabled>
                                </div>
                                <div class="form-group">
                                    <label for="inputClientCompany">User Name</label>
                                    <input name="username" type="text" id="inputClientCompany" class="form-control" value="<?php echo $value['username'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="inputClientCompany">Password</label>
                                    <input name="password" type="text" id="inputClientCompany" class="form-control">
                                </div>
                                <div class="form-group">
                                    <input name="role_id" type="hidden" id="inputClientCompany" class="form-control" value="<?php echo $value['role_id'] ?>">
                                </div>
                                <div class="form-group">
                                  <label for="inputClientCompany">Email</label>
                                  <input name="email" type="text" id="inputClientCompany" class="form-control"  value="<?php echo $value['email'] ?>">
                                </div>
                                <div class="form-group">
                                  <label for="inputClientCompany">Phone</label>
                                  <input name="phone" type="text" id="inputClientCompany" class="form-control"  value="<?php echo $value['phone'] ?>">
                                </div>
                                <div class="form-group">
                                  <label for="inputClientCompany">Address</label>
                                  <input name="address" type="text" id="inputClientCompany" class="form-control"  value="<?php echo $value['address'] ?>">
                                </div>
                            </div>
                        <?php  } } 
                    }?>
            <!-- /.card-body -->
                    <div class="row">
                        <div class="col-12">
                        <a href="products.php?id=2" class="btn btn-secondary">Cancel</a>
                        <input type="submit" value="Update" class="btn btn-success float-right">
                        </div>
                    </div>
          </div>
          <!-- /.card --> 
    </form>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php include "footer.php"; ?>
