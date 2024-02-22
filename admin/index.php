<?php
include "header.php";
include "sidebar.php";
$keyword = isset($_GET["keyword"]) && !empty($_GET["keyword"]) ? $keyword = $_GET["keyword"] : "";
$page = isset($_GET["page"]) ? $_GET["page"] : 1;
$itemPerPage = isset($_GET["iPP"]) ? $_GET["iPP"] : 5;
// $category = isset($_GET["category"]) ? $_GET["category"] : "AllProducts";
// if ($category == "AllProducts") {
// 	$products = $product->getStoreProducts($page, $itemPerPage);
// 	$totalProduct = $product->getAllProducts();
// } else {
// 	$products = $product->getProductByProtypes($_GET["category"]);
// 	$totalProduct = $product->getProductByProtypes($_GET["category"]);
// }
$totalProduct = $product->totalSearch($keyword);
$products = $product->search($keyword, $page, $itemPerPage);
if ($page = 1) {
  $prevPage = 1;
} else {
  $prevPage = $page - 1;
}
$nextPage = $page + 1;
$countProduct = 0;
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
    <!-- SEARCH BAR -->
 <div class="col-md-6">
                        <div class="header-search">
                            <form action="index.php" method="get">
                                <input class="input" name="keyword" placeholder="Search here">
                                <button type="submit" class="search-btn">Search</button>
                            </form>
                        </div>
                    </div>
                    <!-- /SEARCH BAR -->  
    <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Products</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Products</li>
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
        <h3 class="card-title">Products </h3>
        <a class="btn btn-success btn-sm px-3 mx-3" href="product-add.php">
          <i class="fas fa-plus">
          </i>
          Add
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
          <thead>
            <tr>
              <th style="width: 6%">
                Image
              </th>
              <th style="width: 20%">
                Name
              </th>
              <th style="width: 8%">
                Price
              </th>
              <th style="width: 30%">
                Description
              </th>
              <th style="width: 8%" class="text-center">
                Manufacture
              </th>
              <th style="width: 8%" class="text-center">
                Category
              </th>
              <th style="width: 20%">
                Action
              </th>
            </tr>
          </thead>
          <tbody>
            <?php
            $getAllProducts = $product->getAllProducts();
            foreach ($products as $value) :
              $countProduct++;
            ?>
              <tr>
                <td><img style="width:100px" src="../img/<?php echo $value['image'] ?>" alt=""></td>
                <td><?php echo $value['name'] ?></td>
                <td><?php echo number_format($value['price']) ?> VND</td>
                <td><?php
                $des = trim($value['description']);
                if(strlen($des) >= 100) {
                  $des = mb_substr($des, 0, mb_strpos($des, ' ', 100));
              }
                 echo $des ?> ...
                 
                 </td>
                <td><?php echo $value['manu_name'] ?></td>
                <td><?php echo $value['type_name'] ?></td>
                <td class="project-actions text-right">
                  <a class="btn btn-info btn-sm" href="product-edit.php?id=<?php echo $value['id'] ?>">
                    <i class="fas fa-pencil-alt">
                    </i>
                    Edit
                  </a>
                  <a class="btn btn-danger btn-sm" href="del.php?id=<?php echo $value['id'] ?>">
                    <i class="fas fa-trash">
                    </i>
                    Delete
                  </a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
    <div class="store-filter clearfix">
      <span class="store-qty">Showing <?php echo $countProduct; ?> Products</span>
      <ul class="store-pagination">
        <li><a href="<?php echo "?page=$prevPage&keyword=$keyword" ?>"><i class="fa fa-angle-left"></i></a></li>
        <?php
        if (isset($_GET["page"])) {
          $page = $_GET["page"];
        } else {
          $page = 1;
        }
        for ($i = 1; $i <= ceil(count($totalProduct) / $itemPerPage); $i++) {
          if ($i == $page) {
            echo "<li class=\"active\">$i</li>";
          } else {
            echo "<li><a href=\"?page=$i&keyword=$keyword\">$i</a></li>";
          }
        }
        ?>
        <li><a href="<?php echo "?page=$nextPage&keyword=$keyword" ?>"><i class="fa fa-angle-right"></i></a></li>
      </ul>
    </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include "footer.php"; ?>