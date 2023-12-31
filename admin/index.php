<?php
require '../config/koneksi.php';
require '../config/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include '../admin/templates/head.php'; ?>
</head>
<body>
    <!-- Begin page -->
    <div id="wrapper">
        <!-- Topbar Start -->
        <?php include '../admin/templates/header.php'; ?>
        <!-- end Topbar -->

        <!-- ========== Left Sidebar Start ========== -->
        <?php include '../admin/templates/sidebar.php'; ?>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">
                <div class="container-fluid">
                    <div class="row page-title align-items-center">
                        <div class="col-sm-4 col-xl-6">
                            <h4 class="mb-1 mt-0">Dashboard</h4>
                        </div>
                        <div class="col-sm-8 col-xl-6">
                            <form class="form-inline float-sm-right mt-3 mt-sm-0">
                                <div class="form-group mb-sm-0 mr-2">
                                    <input type="text" class="form-control" id="dash-daterange"
                                        style="min-width: 190px" />
                                </div>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="uil uil-file-alt mr-1"></i>Download
                                        <i class="icon"><span data-feather="chevron-down"></span></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="#" class="dropdown-item notify-item">
                                            <i data-feather="mail" class="icon-dual icon-xs mr-2"></i>
                                            <span>Email</span>
                                        </a>
                                        <a href="#" class="dropdown-item notify-item">
                                            <i data-feather="printer" class="icon-dual icon-xs mr-2"></i>
                                            <span>Print</span>
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a href="#" class="dropdown-item notify-item">
                                            <i data-feather="file" class="icon-dual icon-xs mr-2"></i>
                                            <span>Re-Generate</span>
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- content -->
                    <div class="row">
                        <div class="col-md-6 col-xl-3">
                            <div class="card">
                                <div class="card-body p-0">
                                    <div class="media p-3">
                                        <div class="media-body">
                                            <span class="text-muted text-uppercase font-size-12 font-weight-bold">Today
                                                Revenue</span>
                                            <h2 class="mb-0">$2189</h2>
                                        </div>
                                        <div class="align-self-center">
                                            <div id="today-revenue-chart" class="apex-charts"></div>
                                            <span class="text-success font-weight-bold font-size-13"><i
                                                    class="uil uil-arrow-up"></i> 10.21%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-xl-3">
                            <div class="card">
                                <div class="card-body p-0">
                                    <div class="media p-3">
                                        <div class="media-body">
                                            <span
                                                class="text-muted text-uppercase font-size-12 font-weight-bold">Product
                                                Sold</span>
                                            <h2 class="mb-0">1065</h2>
                                        </div>
                                        <div class="align-self-center">
                                            <div id="today-product-sold-chart" class="apex-charts"></div>
                                            <span class="text-danger font-weight-bold font-size-13"><i
                                                    class="uil uil-arrow-down"></i> 5.05%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-xl-3">
                            <div class="card">
                                <div class="card-body p-0">
                                    <div class="media p-3">
                                        <div class="media-body">
                                            <span class="text-muted text-uppercase font-size-12 font-weight-bold">New
                                                Customers</span>
                                            <h2 class="mb-0">11</h2>
                                        </div>
                                        <div class="align-self-center">
                                            <div id="today-new-customer-chart" class="apex-charts"></div>
                                            <span class="text-success font-weight-bold font-size-13"><i
                                                    class="uil uil-arrow-up"></i> 25.16%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-xl-3">
                            <div class="card">
                                <div class="card-body p-0">
                                    <div class="media p-3">
                                        <div class="media-body">
                                            <span class="text-muted text-uppercase font-size-12 font-weight-bold">New
                                                Visitors</span>
                                            <h2 class="mb-0">750</h2>
                                        </div>
                                        <div class="align-self-center">
                                            <div id="today-new-visitors-chart" class="apex-charts"></div>
                                            <span class="text-danger font-weight-bold font-size-13"><i
                                                    class="uil uil-arrow-down"></i> 5.05%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

        <!-- Footer Start -->
        <?php include '../admin/templates/footer.php'; ?>
        <!-- end Footer -->

        <!-- -- Script -- -->
        <?php include '../admin/templates/script.php'; ?>
        <!-- -- End Script -- -->
    </div>
</body>
</html>
