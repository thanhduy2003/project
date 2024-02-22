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
                    <h1>
                        <?php if ($id == 1)
              echo "Product";
            elseif ($id == 2)
              echo "Protype";
            elseif ($id == 3)
              echo "Manufacture";
            elseif ($id == 4)
              echo "User";
            elseif ($id == 5)
              echo "Bill"
            ?>
                    </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">
                            <?php if ($id == 3)
                echo "Manufacture";
              elseif ($id == 2)
                echo "Protype";
              elseif ($id == 4)
                echo "User";
              elseif ($id == 4)
                echo "Bill";
              ?>
                        </li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <a class="btn btn-success btn-sm px-3 mx-3" href="models-add.php?id=<?php echo $id ?>">
                    <h3 class="card-title">
                        <?php if ($id <= 4)
              echo "Add"; ?>
                    </h3>
                </a>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped projects">

                    <?php if ($id == 2) { ?>
                    <thead>
                        <tr>
                            <th style="width: 10%">
                                ID
                            </th>
                            <th style="width: 70%">
                                Category Name
                            </th>
                            <th style="width: 20%">
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
              $protype = new Protype();
              $protypes = $protype->getAllProtypes();
              foreach ($protypes as $value) {
              ?>
                        <tr>
                            <td>
                                <?php echo $value['type_id'] ?>
                            </td>
                            <td>
                                <a>
                                    <?php echo $value['type_name'] ?>
                                </a>
                            </td>
                            <td class="project-actions text-right">
                                <a class="btn btn-info btn-sm"
                                    href="update.php?id1=2&id=<?php echo $value['type_id'] ?>">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Edit
                                </a>
                                <a class="btn btn-danger btn-sm"
                                    href="delete.php?id1=2&id=<?php echo $value['type_id'] ?>">
                                    <i class="fas fa-trash">
                                    </i>
                                    Delete
                                </a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                    <?php } elseif ($id == 3) { ?>
                    <thead>
                        <tr>
                            <th style="width: 10%">
                                ID
                            </th>
                            <th style="width: 70%">
                                Manufactures Name
                            </th>
                            <th style="width: 20%">
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
              $manu = new Manufacture();
              $manus = $manu->getAllManufacture();
              foreach ($manus as $value) { ?>
                        <tr>
                            <td>
                                <?php echo $value['manu_id'] ?>
                            </td>
                            <td>
                                <a>
                                    <?php echo $value['manu_name'] ?>
                                </a>
                            </td>
                            <td class="project-actions text-right">
                                <a class="btn btn-info btn-sm"
                                    href="update.php?id1=3&id=<?php echo $value['manu_id'] ?>">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Edit
                                </a>
                                <a class="btn btn-danger btn-sm"
                                    href="delete.php?id1=3&id=<?php echo $value['manu_id'] ?>">
                                    <i class="fas fa-trash">
                                    </i>
                                    Delete
                                </a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                    <?php } elseif ($id == 4) { ?>
                    <thead>
                        <tr>
                            <th style="width: 1%">
                                ID
                            </th>
                            <th style="width: 20%">
                                User Name
                            </th>
                            <th style="width: 15%">
                                Password
                            </th>
                            <th style="width: 8%">
                                Role ID
                            </th>
                            <th style="width: 20%">
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
              $user = new User();
              $users = $user->getAllUsers();
              foreach ($users as $value) { ?>
                        <tr>
                            <td>
                                <?php echo $value['user_id'] ?>
                            </td>
                            <td>
                                <a>
                                    <?php echo $value['username'] ?>
                                </a>
                            </td>
                            <td class="project_progress">
                                <?php echo substr($value['password'], 0, 100) . "..." ?>
                            </td>
                            <td>
                                <a>
                                    <?php echo $value['role_id'] ?>
                                </a>
                            </td>
                            <td class="project-actions text-right">
                                <a class="btn btn-info btn-sm"
                                    href="update.php?id1=4&id=<?php echo $value['user_id'] ?>">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Edit
                                </a>
                                <a class="btn btn-danger btn-sm"
                                    href="delete.php?id1=4&id=<?php echo $value['user_id'] ?>">
                                    <i class="fas fa-trash">
                                    </i>
                                    Delete
                                </a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                    <?php } elseif ($id == 5) { ?>
                    <thead>
                        <tr>
                            <th style="width: 5%">
                                Order ID
                            </th>
                            <th style="width: 5%">
                                User ID
                            </th>
                            <th style="width: 40%">
                                Products
                            </th>
                            <th style="width: 5%">
                                Amount
                            </th>
                            <th style="width: 15%">
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
              $products = new Product();
              $orders = $products->getAllOrder();
              foreach ($orders as $order) { ?>
                        <tr>
                            <td>
                                <?php echo $order['order_id'] ?>
                            </td>
                            <td>
                                <?php echo $order['user_id'] ?>
                            </td>
                            <td class="project_progress">

                                <?php
                    $user_products = $products->getProductsByOrderId($order['order_id']);
                    foreach ($user_products as $user_product) : ?>
                                <img style="height:50px;margin:0 20px"
                                    src='../img/<?php echo $user_product["image"]; ?>'>
                                <?php echo $user_product['name']; ?>
                                <br>
                                <?php endforeach; ?>
                            </td>
                            <td>
                                <?php foreach ($user_products as $user_product) { ?>
                                <div class="qty-label">
                                    <?php echo $user_product['amount']; ?>

                                </div><br>
                                <?php } ?>
                            </td>
                            <td class="project-actions text-right">
                                <?php
                    if ($order['order_status'] == 0) :
                    ?>
                                <a class="btn btn-info btn-sm"
                                    href="updatebill.php?order_id=<?php echo $order['order_id']; ?>">
                                    <i class="fa-solid fa-badge-check"></i>
                                    Success
                                </a>
                                <?php endif; ?>
                                <a class="btn btn-danger btn-sm"
                                    href="delbill.php?order_id=<?php echo $order['order_id']; ?>">
                                    <i class="fas fa-trash">
                                    </i>
                                    Delete
                                </a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                    <?php } ?>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>

<!-- /.content-wrapper -->