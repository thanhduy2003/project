<?php
include "header.php";
include "sidebar.php";
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Product Add</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Product Add</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <form action="add.php" method="post" enctype="multipart/form-data">
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
            <div class="card-body">
            <div class="form-group">
                <input name="id" type="hidden" id="inputId" class="form-control">
              </div>
              <div class="form-group">
                <label for="inputName">Name</label>
                <input name="name" type="text" id="inputName" class="form-control">
              </div>
              <div class="form-group">
                <label for="inputPrice">Price</label>
                <input name="price" type="text" id="inputPrice" class="form-control">
              </div>
              <div class="form-group">
                <label for="inputImage">Image</label>
                <input name="image" type="file" id="inputImage" class="form-control">
              </div>
              <div class="form-group">
                <label for="inputDescription">Description</label>
                <textarea name="description" id="inputDescription" class="form-control" rows="4"></textarea>
              </div>
              <div class="form-group">
                <label for="inputManufacture">Manufacture</label>
                <select name="manu_id" id="inputStatus" class="form-control custom-select">
                  <option selected disabled>Select one</option>
                  <?php
                  $getAllManus = $manufacture->getAllManufacture();
                  foreach($getAllManus as $value):
                  ?>
                  <option value="<?php echo $value['manu_id'] ?>"><?php echo $value['manu_name'] ?></option>
                 <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group">
                <label for="inputProtype">Category</label>
                <select name="type_id" id="inputProtype" class="form-control custom-select">
                  <option selected disabled>Select one</option>
                  <?php
                  $getAllProtypes = $protype->getAllProtypes();
                  foreach($getAllProtypes as $value):
                  ?>
                  <option value="<?php echo $value['type_id'] ?>"><?php echo $value['type_name'] ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group">
                <label for="inputSold">Sold</label>
                <input name="sold" type="text" id="inputSold" class="form-control">
              </div>
              <div class="form-group">
                <label for="inputInstock">In Stock</label>
                <input name="instock" type="text" id="inputInstock" class="form-control">
              </div>
              <div class="form-group">
                <label for="inputFeature">Feature</label>
                <input name="feature" type="checkbox" id="inputFeature" class="form-control">
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <a href="#" class="btn btn-secondary">Cancel</a>
          <input type="submit" value="Create new Product" class="btn btn-success float-right">
        </div>
      </div>
    </section>
    </form>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include "footer.php"; ?>
