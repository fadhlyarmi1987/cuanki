<style>
  .nav-pills {
    --bs-nav-pills-link-active-bg: #FE0303;
}
</style>

<div class="Container-lg">
    <div class="row">
        <div class="col-lg-3">
        <nav class="navbar navbar-expand-lg bg-light rounded border mt-2">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel" style="width: 250px;">
      <div class="offcanvas-header">
      <img src="Assets/logo_cuanki.png" alt="" style="width: 100px; height: auto; margin-left:40px">
      </div>
      <div class="offcanvas-body">
    <ul class="navbar-nav nav-pills flex-column justify-content-end flex-grow-1">
        <?php if($hasil['level']==0 || $hasil['level']==1 || $hasil['level']==2 || $hasil['level']==3){?>
        <li class="nav-item">
            <a class="nav-link ps-2 <?php echo (isset ($_GET['x'])&& $_GET['x']=='home') ? 'active link-light':'link-dark' ; ?>" aria-current="page" href="home"><i class="bi bi-house-door-fill"></i> Dashboard</a>
        </li>
        <li class="nav-item">
            <a class="nav-link ps-2 <?php echo (isset ($_GET['x'])&& $_GET['x']=='order') ? 'active link-light':'link-dark' ; ?>" href="order"><i class="bi bi-cart-fill"></i> Order</a>
        </li>
        <li class="nav-item">
            <a class="nav-link ps-2 <?php echo (isset ($_GET['x'])&& $_GET['x']=='menu') ? 'active link-light':'link-dark' ; ?>" href="menu"><i class="bi bi-cart-fill"></i> Daftar Menu</a>
        </li>
        <?php } ?>
        <?php if($hasil['level']==1 || $hasil['level']==2 || $hasil['level']==3){?>
        <li class="nav-item">
            <a class="nav-link ps-2 <?php echo (isset ($_GET['x'])&& $_GET['x']=='customer') ? 'active link-light':'link-dark' ; ?>" href="customer"><i class="bi bi-person-fill"></i> Customer</a>
        </li>
        <?php } ?>
        <?php if($hasil['level']==3){?>
        <li class="nav-item">
            <a class="nav-link ps-2 <?php echo (isset ($_GET['x'])&& $_GET['x']=='user') ? 'active link-light':'link-dark' ; ?>" href="user"><i class="bi bi-card-list"></i> User</a>
        </li>
        <li class="nav-item">
            <a class="nav-link ps-2 <?php echo (isset ($_GET['x'])&& $_GET['x']=='report') ? 'active link-light':'link-dark' ; ?>" href="report"><i class="bi bi-graph-up"></i> Report</a>
        </li>
        <?php } ?>
    </ul>
</div>

    </div>
  </div>
</nav>
</div>