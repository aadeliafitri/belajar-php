<?php 
include 'koneksi.php'; 

include 'helpers.php';

date_default_timezone_set('Asia/Jakarta');
$hari = getDayName(date("Y-m-d"));
$tanggal = date("d");
$bulan = getMonthName(date("Y-m-d H:i:s"));
$tahun = date("Y");
$waktu =  date("H:i:s");

if((isset($_GET['aksi']))&&(isset($_GET['data']))){
	if($_GET['aksi']=='hapus'){
		$productID= $_GET['data'];
		//hapus data profil
		$deleteProduct = "delete from `products` where `id` = '$productID'";
		mysqli_query($con,$deleteProduct);
	}
}

if (isset($_GET['aksi']) && isset($_POST['search'])) {
  if ($_GET['aksi']=='cari') {
  $_SESSION['search'] = $_POST['search'];
  $search = $_SESSION['search'];
  }
}
if (isset($_SESSION['search'])) {
  $search = $_SESSION['search'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Products</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item mt-2"><?php echo "<small>$hari, $tanggal $bulan $tahun $waktu</small>"?></li>
      <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="dashboard.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> -->
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="../dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="../dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="../dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
      <img src="../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <!-- <li class="nav-header"></li> -->
               <li class="nav-item">
                 <a href="product.php" class="nav-link active">
                   <!-- <i class="nav-icon far fa-calendar-alt"></i> -->
                   <i class="nav-icon fas fa-cheese"></i>
                   <p>
                     Products
                   </p>
                 </a>
               </li>
               <li class="nav-item">
                 <a href="logout.php" class="nav-link">
                   <!-- <i class="nav-icon far fa-calendar-alt"></i> -->
                   <i class="nav-icon fas fa-sign-out-alt"></i>
                   <p>
                     Logout
                   </p>
                 </a>
               </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Products</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Products</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header d-flex col-sm-12 justify-content-between">
                <div class="col-10">
                  <form action="product.php?aksi=cari" method="post">
                    <div class="input-group col-sm-4 mr-3">
                      <input type="text" name="search" id="search" class="form-control" placeholder="Search">
                      <div class="input-group-append">
                          <button class="btn btn-primary" type="submit">
                            <i class="fas fa-search fa-sm"></i>
                          </button>
                      </div>
                    </div>
                  </form>
                </div> 
                <!-- <h3 class="card-title col align-self-center">List Products</h3> -->
                <div class="col-sm-2">
                    <a href="addproduct.php" class="btn btn-primary"><i class="nav-icon fas fa-plus mr-2"></i> Add Product</a>
                </div>
              </div>
              <div class="card-body">
                <div class="col-12 justify-content-center">
                <?php if(!empty($_GET['notif'])){?>
                  <?php if($_GET['notif']=="tambahberhasil"){?>
                      <div class="alert alert-success bg-success text-white" role="alert">
                      Data Berhasil Ditambahkan</div>
                  <?php } else if($_GET['notif']=="editberhasil"){?>
                      <div class="alert alert-success bg-success text-white" role="alert">
                      Data Berhasil Diubah</div>
                  <?php } else if($_GET['notif']=="hapusberhasil"){?>
                      <div class="alert alert-success bg-success text-white" role="alert">
                      Data Berhasil Dihapus</div>
                  <?php }?>
                <?php }?>
                </div>
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Product Name</th>
                      <th>Category</th>
                      <th>Price</th>
                      <th>Image</th>
                      <th style="width: 200px;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $batas = 2;
                    if(!isset($_GET['page'])){
                        $posisi = 0;
                        $page = 1;
                    }else{
                        $page = $_GET['page'];
                        $posisi = ($page-1) * $batas;
                    } 
                    // $readProduct = "SELECT `p`.`id`, `p`.`product_name`, `p`.`price`, `p`.`image`,
                    //         `c`.`category_name` FROM `products` `p` INNER JOIN `product_categories` `c` ON `p`.`category_id` = `c`.`id` ";
                    $readProduct = "SELECT * FROM view_products";
                    if (isset($search) && !empty($search)) {
                      $readProduct .= " WHERE `view_products`.`product_name` LIKE '%$search%' || `view_products`.`category_name` LIKE '%$search%' ";
                    }
                    $readProduct .= " ORDER BY `view_products`.`category_name`, `view_products`.`product_name` LIMIT $posisi, $batas";
                    $queryReadProduct = mysqli_query($con, $readProduct);
                    $no = $posisi+1;
                    while($dataProduct= mysqli_fetch_row($queryReadProduct)){
                        $productID = $dataProduct[0];
                        $productName = $dataProduct[1];
                        $price = $dataProduct[2];
                        $image = $dataProduct[3];
                        $category = $dataProduct[4];
                    ?>
                    <tr>
                        <td><?php echo $no?></td>
                        <td><?php echo $productName?></td>
                        <td><?php echo $category?></td>
                        <td><?php echo $price?></td>
                        <td>
                            <div class="text-center">
                                <img src="../assets/file/<?php echo $image?>" class="img-thumbnail" style="max-width: 150px;" alt="">
                            </div>
                        </td>
                        <td>
                            <a href="editproduct.php?data=<?php echo $productID;?>" class="btn btn-info"><i class="nav-icon fas fa-edit mr-2"></i>Edit</a>
                            <a href="javascript:if(confirm('Anda yakin ingin menghapus data <?php echo $productName; ?>?')) window.location.href = 'product.php?aksi=hapus&data=<?php echo $productID;?>&notif=hapusberhasil'" class="btn btn-danger"><i class="nav-icon fas fa-trash-alt mr-2"></i>Delete</a>
                        </td>
                    </tr>
                    <?php $no++; }?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->

              <?php
                $countData = "SELECT `p`.`id`, `p`.`product_name`, `p`.`price`, `p`.`image`,
                `c`.`category_name` FROM `products` `p` INNER JOIN `product_categories` `c` ON `p`.`category_id` = `c`.`id` ";
                if (isset($search) && !empty($search)) {
                  $countData .= " WHERE `p`.`product_name` LIKE '%$search%' || `c`.`category_name` LIKE '%$search%' ";
                }
                $countData .= "ORDER BY `c`.`category_name`, `p`.`product_name`";
                $queryCountData = mysqli_query($con, $countData);
                $amountData = mysqli_num_rows($queryCountData);
                $amountPage = ceil($amountData/$batas);
              ?>
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  <?php
                    if ($amountPage == 0) {
                      //nothing page
                    }elseif ($amountPage == 1) {
                      echo "<li class='page-item'><a class='page-link'>1</a></li>";
                    }else {
                      $prev = $page-1;
                      $next = $page+1;
                      if ($page!=1) {
                        echo "<li class='page-item'><a class='page-link' href='product.php?page=1'>First</a></li>";
                        echo "<li class='page-item'><a class='page-link' href='product.php?page=$prev'>&laquo;</a></li>";
                      }
                      for ($i=1; $i <= $amountPage; $i++) { 
                        if ($i > $page - 5 and $i < $page + 5) {
                          if ($i != $page) {
                            echo "<li class='page-item'><a class='page-link' href='product.php?page=$i'>$i</a></li>";
                          } else {
                            echo "<li class='page-item'><a class='page-link'>$i</a></li>";
                          }
                        } 
                      }
                      if ($page!=$amountPage) {
                        echo "<li class='page-item'><a class='page-link' href='product.php?page=$next'>&raquo;</a></li>";
                        echo "<li class='page-item'><a class='page-link' href='product.php?page=$amountPage'>Last</a></li>";
                      }
                    }
                  ?>
                </ul>
              </div>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
</body>
</html>
