<?php
session_start();
require_once '../config/Database.php';
require_once '../config/Crud.php';

$obj = new Crud;

// jika tidak punya sesi
if (!isset($_SESSION['login'])) {

  // pindahkan ke halaman login
  header("Location: ../login.php");
}

$id_user = $_SESSION['id'];
// ambil data user
$data_user = $obj->get('users', ["id = $id_user"]);
$data_user = $data_user->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="assets/" data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>Tambah Produk | Dashboard - UAS Pemrograman Web</title>

  <meta name="description" content="" />

  <!-- Favicon -->
  <link rel="shortcut icon" href="../favicon.png" />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

  <!-- Icons. Uncomment required icon fonts -->
  <link rel="stylesheet" href="assets/vendor/fonts/boxicons.css" />

  <!-- Core CSS -->
  <link rel="stylesheet" href="assets/vendor/css/core.css" class="template-customizer-core-css" />
  <link rel="stylesheet" href="assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="assets/css/demo.css" />

  <!-- Vendors CSS -->
  <link rel="stylesheet" href="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

  <!-- Page CSS -->

  <!-- Helpers -->
  <script src="assets/vendor/js/helpers.js"></script>
  <script src="assets/js/config.js"></script>
</head>

<body>
  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <!-- Menu -->

      <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
        <div class="app-brand demo">
          <a href="index.php" class="app-brand-link">
            <span class="app-brand-text demo menu-text fw-bolder ms-2">MDev Sofa</span>
          </a>

          <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
          </a>
        </div>

        <div class="menu-inner-shadow"></div>

        <ul class="menu-inner py-1">
          <!-- Dashboard -->
          <li class="menu-item active">
            <a href="index.php" class="menu-link">
              <i class="menu-icon tf-icons bx bx-home-circle"></i>
              <div data-i18n="Analytics">Dashboard</div>
            </a>
          </li>

          <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Halaman</span>
          </li>
          <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-dock-top"></i>
              <div data-i18n="Account Settings">Setting Akun</div>
            </a>
            <ul class="menu-sub">
              <li class="menu-item">
                <a href="account.php" class="menu-link">
                  <div data-i18n="Account">Akun</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="#" class="menu-link">
                  <div data-i18n="Notifications">Notifikasi</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="#" class="menu-link">
                  <div data-i18n="Connections">Koneksi</div>
                </a>
              </li>
            </ul>
          </li>
          <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-lock-open-alt"></i>
              <div data-i18n="Authentications">Autentikasi</div>
            </a>
            <ul class="menu-sub">
              <li class="menu-item">
                <a href="#" class="menu-link" target="_blank">
                  <div data-i18n="Basic">Aktivasi 2FA</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="change_pw.php" class="menu-link">
                  <div data-i18n="Basic">Ubah Password</div>
                </a>
              </li>
            </ul>
          </li>
          <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-cube-alt"></i>
              <div data-i18n="Misc">Manipulasi Data</div>
            </a>
            <ul class="menu-sub">
              <li class="menu-item">
                <a href="tambah_product.php" class="menu-link">
                  <div data-i18n="Error">Tambah Data Produk</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="#" class="menu-link">
                  <div data-i18n="Under Maintenance">Produk Tersedia</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="#" class="menu-link">
                  <div data-i18n="Under Maintenance">Produk Kosong</div>
                </a>
              </li>
            </ul>
          </li>
          <!-- Components -->
          <li class="menu-header small text-uppercase"><span class="menu-header-text">Tentang Aplikasi</span></li>
          <!-- Cards -->
          <li class="menu-item">
            <a href="report.php" class="menu-link">
              <i class="menu-icon tf-icons bx bx-collection"></i>
              <div data-i18n="Basic">Report Bug</div>
            </a>
          </li>
        </ul>
      </aside>
      <!-- / Menu -->

      <!-- Layout container -->
      <div class="layout-page">
        <!-- Navbar -->

        <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
          <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
            <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
              <i class="bx bx-menu bx-sm"></i>
            </a>
          </div>

          <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
            <!-- Search -->
            <div class="navbar-nav align-items-center">
              <div class="nav-item d-flex align-items-center">
                <i class="bx bx-search fs-4 lh-0"></i>
                <input type="text" class="form-control border-0 shadow-none" placeholder="Search..." aria-label="Search..." />
              </div>
            </div>
            <!-- /Search -->

            <ul class="navbar-nav flex-row align-items-center ms-auto">
              <!-- User -->
              <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                  <div class="avatar avatar-online">
                    <img src="uploads/<?= $data_user['image']; ?>" alt class="w-px-40 h-auto rounded-circle" />
                  </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li>
                    <a class="dropdown-item" href="#">
                      <div class="d-flex">
                        <div class="flex-shrink-0 me-3">
                          <div class="avatar avatar-online">
                            <img src="uploads/<?= $data_user['image']; ?>" alt class="w-px-40 h-auto rounded-circle" />
                          </div>
                        </div>
                        <div class="flex-grow-1">
                          <span class="fw-semibold d-block"><?= $data_user['username']; ?></span>
                          <small class="text-muted">Admin</small>
                        </div>
                      </div>
                    </a>
                  </li>
                  <li>
                    <div class="dropdown-divider"></div>
                  </li>
                  <li>
                    <a class="dropdown-item" href="account.php">
                      <i class="bx bx-user me-2"></i>
                      <span class="align-middle">My Profile</span>
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="#">
                      <i class="bx bx-cog me-2"></i>
                      <span class="align-middle">Settings</span>
                    </a>
                  </li>
                  <li>
                    <div class="dropdown-divider"></div>
                  </li>
                  <li>
                    <a class="dropdown-item" href="logout.php">
                      <i class="bx bx-power-off me-2"></i>
                      <span class="align-middle">Log Out</span>
                    </a>
                  </li>
                </ul>
              </li>
              <!--/ User -->
            </ul>
          </div>
        </nav>

        <!-- / Navbar -->

        <!-- Content wrapper -->
        <div class="content-wrapper">
          <!-- Content -->

          <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Manipulasi Data /</span> Tambah Produk</h4>

            <div class="row">
              <!-- Form controls -->
              <div class="col-md-6">
                <div class="card mb-4">
                  <form action="../config/HandleForm.php" method="post" enctype="multipart/form-data">
                    <h5 class="card-header">Form Data</h5>
                    <div class="card-body">
                      <div class="mb-3">
                        <label for="nama_product" class="form-label">Nama Produk</label>
                        <input type="text" class="form-control" id="nama_product" name="nama_product" placeholder="masukan nama produk..." />
                      </div>
                      <div class="mb-3">
                        <label for="harga_product" class="form-label">Harga Produk</label>
                        <input type="text" class="form-control" id="harga_product" name="harga_product" placeholder="masukan harga produk..." />
                      </div>
                      <div class="mb-3">
                        <label for="ketersediaan" class="form-label">Ketersediaan</label>
                        <select class="form-select" id="ketersediaan" name="ketersediaan" aria-label="Default select example">
                          <option selected>Pilih</option>
                          <option value="Tersedia">Tersedia</option>
                          <option value="Kosong">Kosong</option>
                        </select>
                      </div>
                      <div class="mb-3">
                        <label for="formFile" class="form-label">Gambar Produk</label>
                        <input class="form-control" type="file" id="formFile" name="gambar_product" />
                      </div>
                      <button type="submit" name="tambah_product" class="btn btn-primary mt-2">Tambah Produk</button>
                    </div>
                  </form>
                </div>
              </div>
              <div class="col-md-6">
              </div>
            </div>
          </div>
          <!-- / Content -->

          <!-- Footer -->
          <footer class="content-footer footer bg-footer-theme">
            <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
              <div class="mb-2 mb-md-0">
                @Copyright by 21552011178_MISBAH_TIFRM21_UASWEB1
              </div>
              <div>
                <a href="#" class="footer-link me-4" target="_blank">License</a>
                <a href="#" target="_blank" class="footer-link me-4">More Themes</a>

                <a href="#" target="_blank" class="footer-link me-4">Documentation</a>

                <a href="#" target="_blank" class="footer-link me-4">Support</a>
              </div>
            </div>
          </footer>
          <!-- / Footer -->

          <div class="content-backdrop fade"></div>
        </div>
        <!-- Content wrapper -->
      </div>
      <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
  </div>
  <!-- / Layout wrapper -->

  <!-- Core JS -->
  <!-- build:js assets/vendor/js/core.js -->
  <script src="assets/vendor/libs/jquery/jquery.js"></script>
  <script src="assets/vendor/libs/popper/popper.js"></script>
  <script src="assets/vendor/js/bootstrap.js"></script>
  <script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

  <script src="assets/vendor/js/menu.js"></script>
  <!-- endbuild -->

  <!-- Vendors JS -->

  <!-- Main JS -->
  <script src="assets/js/main.js"></script>

  <!-- Page JS -->
  <script src="assets/js/pages-account-settings-account.js"></script>

  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>