<div class="left-side sticky-left-side">
    <!--logo and iconic logo start-->
    <div class="logo">
        <a href="index.php"><img src="assets/images/logo-.png" alt=""></a>
    </div>

    <div class="logo-icon text-center">
        <a href="index.php"><img src="assets/images/logo_icon.png" alt=""></a>
    </div>
    <!--logo and iconic logo end-->
    <div class="left-side-inner">
        <!-- visible to small devices only -->
        <!--sidebar nav start-->
        <?php
        if ($_SESSION['level'] == 'Admin') {
            ?>

            <ul class="nav nav-pills nav-stacked custom-nav">
                <li><a href="?hal=dashboard"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
                <li class="menu-list"><a href="#"><i class="fa fa-th-list"></i> <span>Master</span></a>
                    <ul class="sub-menu-list">
                        <li><a href="?hal=master/category/list"> Kategori</a></li>
                        <li><a href="?hal=master/product/list"> Product</a></li>
                        <li><a href="?hal=master/member/list"> Member</a></li>
                        <li><a href="?hal=master/user/list">Admin</a></li>
                    </ul>
                </li>
                <li><a href="?hal=pos"><i class="fa fa-money"></i> <span>Point of Sale</span></a></li>
                <li><a href="?hal=master/transaksi/list"><i class="fa fa-credit-card"></i> <span>Transaksi</span></a>
                </li>
                <li><a href="?hal=master/operasional/list"><i class="fa fa-cogs"></i> <span>Oprerasional</span></a></li>
                <li><a href="?hal=master/laporan/list"><i class="fa fa-book"></i> <span>Laporan Penjualan</span></a>
                </li>
                <li><a href="?hal=master/laporan_all/list"><i class="fa fa-book"></i> <span>Laporan All</span></a></li>
                <li><a href="logout.php"><i class="fa fa-sign-in"></i> <span>Logout</span></a></li>
            </ul>
            <?php
        } elseif ($_SESSION['level'] == 'Kasir') {
            ?>
            <ul class="nav nav-pills nav-stacked custom-nav">
                <li><a href="?hal=dashboard"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>

                <li><a href="?hal=pos"><i class="fa fa-money"></i> <span>Point of Sale</span></a></li>
                <li><a href="?hal=master/transaksi/list"><i class="fa fa-credit-card"></i> <span>Transaksi</span></a>
                </li>

                <li><a href="logout.php"><i class="fa fa-sign-in"></i> <span>Logout</span></a></li>
            </ul>
            <?php
        }
        ?>
        <!--sidebar nav end-->
    </div>
</div>