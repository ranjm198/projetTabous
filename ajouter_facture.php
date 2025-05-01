<?php include 'config.php';
session_start();
if (!isset($_SESSION['superadmin'])) {
    header("Location: login.php");
    exit;
} ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Tabous Confection </title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
    <link
      rel="icon"
      href="assets/img/tabou.png"
      type="image/x-icon"
    />
  
    <!-- Fonts and icons -->
    <script src="assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
      WebFont.load({
        google: { families: ["Public Sans:300,400,500,600,700"] },
        custom: {
          families: [
            "Font Awesome 5 Solid",
            "Font Awesome 5 Regular",
            "Font Awesome 5 Brands",
            "simple-line-icons",
          ],
          urls: ["assets/css/fonts.min.css"],
        },
        active: function () {
          sessionStorage.fonts = true;
        },
      });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/plugins.min.css" />
    <link rel="stylesheet" href="assets/css/kaiadmin.min.css" />
  </head>
  <body>
    <div class="wrapper">
      <!-- Sidebar -->
    <!-- Sidebar -->
    <div class="sidebar" data-background-color="dark">
        <div class="sidebar-logo">
          <!-- Logo Header -->
          <div class="logo-header" data-background-color="dark">
          <a href="index.html" class="logo" style="color:white">
Espace Administrateur            </a>
            <div class="nav-toggle">
              <button class="btn btn-toggle toggle-sidebar">
                <i class="gg-menu-right"></i>
              </button>
              <button class="btn btn-toggle sidenav-toggler">
                <i class="gg-menu-left"></i>
              </button>
            </div>
            <button class="topbar-toggler more">
              <i class="gg-more-vertical-alt"></i>
            </button>
          </div>
          <!-- End Logo Header -->
        </div>
        <div class="sidebar-wrapper scrollbar scrollbar-inner">
          <div class="sidebar-content">
          <ul class="nav nav-secondary">
              <li class="nav-item ">
                <a
                  href="index.php"
                >
                  <i class="fas fa-home"></i>
                  <p>Dashboard Admin</p>
                </a>
               
              <li class="nav-item active">
                <a href="ajouter_facture.php">
                  <i class="fas fa-pen-square"></i>
                  <p>Ajouter Facture</p>
                </a>
               
              </li>
              <li class="nav-item ">
                <a  href="liste_factures.php">
                  <i class="fas fa-table"></i>
                  <p>Liste des factures</p>
                </a>
              
              </li>
            
            </ul>
          </div>
        </div>
      </div>
      <!-- End Sidebar -->

      <div class="main-panel">
        <div class="main-header">
          <div class="main-header-logo">
            <!-- Logo Header -->
            <div class="logo-header" data-background-color="dark">
              <a href="../index.html" class="logo">
                <img
                  src="assets/img/kaiadmin/logo_light.svg"
                  alt="navbar brand"
                  class="navbar-brand"
                  height="20"
                />
              </a>
              <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                  <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                  <i class="gg-menu-left"></i>
                </button>
              </div>
              <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
              </button>
            </div>
            <!-- End Logo Header -->
          </div>
          <!-- Navbar Header -->
          <nav
          class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom"
        >
          <div class="container-fluid">
        

            <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
            
              <li class="nav-item topbar-user dropdown hidden-caret">
                <a
                  class="dropdown-toggle profile-pic"
                  data-bs-toggle="dropdown"
                  href="#"
                  aria-expanded="false"
                >
                  <div class="avatar-sm">
                    <img
                    src="assets/img/tabou.png"
                      alt="..."
                      class="avatar-img rounded-circle"
                    />
                  </div>
                  <span class="profile-username">
                    <span class="op-7">Hi,</span>
                    <span class="fw-bold">Tabous Confection</span>
                  </span>
                </a>
                <ul class="dropdown-menu dropdown-user animated fadeIn">
                  <div class="dropdown-user-scroll scrollbar-outer">
                    <li>
                      <div class="user-box">
                        <div class="avatar-lg">
                          <img
                            src="assets/img/tabou.png"
                            alt="image profile"
                            class="avatar-img rounded"
                          />
                        </div>
                        <div class="u-text">
                          <h4>Tabous Confection</h4>
                          <p class="text-muted">admin@tabous.tn</p>
                          <a
                          href="logout.php"
                          class="btn btn-xs btn-secondary btn-sm"
                            >Logout</a
                          >
                        </div>
                      </div>
                    </li>
                   
                  </div>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
          <!-- End Navbar -->
        </div>
        <div class="container">
          <div class="page-inner">
          <div class="page-header">
              <h3 class="fw-bold mb-3">Gestion des factures</h3>
              <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                  <a href="#">
                    <i class="icon-home"></i>
                  </a>
                </li>
                <li class="separator">
                  <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                  <a href="#">Facture</a>
                </li>
                <li class="separator">
                  <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                  <a href="#">Ajouter facture</a>
                </li>
              </ul>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title">Ajouter facture</h4>
                  </div>
                  <div class="card-body">
            <form action="enregistrer_facture.php" method="post">
              <div class="mb-3">
                <label for="client" class="form-label">Nom du client</label>
                <input type="text" class="form-control" name="client" required />
              </div>
              <div class="mb-3">
                <label for="date_facture" class="form-label">Date de la facture</label>
                <input type="date" class="form-control" name="date_facture" required />
              </div>

              <table class="table table-bordered" id="lignes">
                <thead>
                  <tr>
                    <th>Désignation</th>
                    <th>Quantité</th>
                    <th>Prix unitaire</th>
                    <th>Montant</th>
                    <th>
                      <button type="button" class="btn btn-primary" onclick="ajouterLigne()">+</button>
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><input type="text" name="designation[]" class="form-control" required /></td>
                    <td><input type="number" name="quantite[]" class="form-control" required /></td>
                    <td><input type="number" step="0.01" name="prix_unitaire[]" class="form-control" required /></td>
                    <td><input type="number" step="0.01" name="montant[]" class="form-control" readonly /></td>
                    <td><button type="button" class="btn btn-danger" onclick="supprimerLigne(this)">-</button></td>
                  </tr>
                </tbody>
              </table>

              
    <div class="mb-3">
      <label class="form-label">Montant HT</label>
      <input type="number" step="0.01" class="form-control" name="total" id="total" readonly />
    </div>
    <div class="mb-3">
      <label class="form-label">FODeC (1%)</label>
      <input type="number" step="0.01" class="form-control" id="fodec" name="fodec" readonly />
    </div>
    <div class="mb-3">
      <label class="form-label">TVA (19%)</label>
      <input type="number" step="0.01" class="form-control" id="tva" name="tva" readonly />
    </div>
    <div class="mb-3">
      <label class="form-label">Timbre</label>
      <input type="number" step="0.01" class="form-control" id="timbre" name="timbre" value="1.000" readonly />
    </div>
    <div class="mb-3">
      <label class="form-label">Total TTC</label>
      <input type="number" step="0.01" class="form-control" id="total_ttc" name="total_ttc" readonly />
    </div>

              <button type="submit" class="btn btn-primary"
              >Enregistrer</button>
            </form>
    </div>
    </div>
    </div>
    </div>

          </div>
        </div>

      
    </div>

 <!--   Core JS Files   -->
 <script src="assets/js/core/jquery-3.7.1.min.js"></script>
    <script src="assets/js/core/popper.min.js"></script>
    <script src="assets/js/core/bootstrap.min.js"></script>

    <!-- jQuery Scrollbar -->
    <script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

    <!-- Chart JS -->
    <script src="assets/js/plugin/chart.js/chart.min.js"></script>

    <!-- jQuery Sparkline -->
    <script src="assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

    <!-- Chart Circle -->
    <script src="assets/js/plugin/chart-circle/circles.min.js"></script>

    <!-- Datatables -->
    <script src="assets/js/plugin/datatables/datatables.min.js"></script>

    <!-- Bootstrap Notify -->
    <script src="assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

    <!-- jQuery Vector Maps -->
    <script src="assets/js/plugin/jsvectormap/jsvectormap.min.js"></script>
    <script src="assets/js/plugin/jsvectormap/world.js"></script>

    <!-- Google Maps Plugin -->
    <script src="assets/js/plugin/gmaps/gmaps.js"></script>

    <!-- Sweet Alert -->
    <script src="assets/js/plugin/sweetalert/sweetalert.min.js"></script>

    <!-- Kaiadmin JS -->
    <script src="assets/js/kaiadmin.min.js"></script>

    <!-- Kaiadmin DEMO methods, don't include it in your project! -->
    <script src="assets/js/setting-demo2.js"></script>
    <!-- Custom Script for Invoice Form -->
   
  <script>
    function ajouterLigne() {
      const ligne = document.querySelector("#lignes tbody tr").cloneNode(true);
      ligne.querySelectorAll("input").forEach(input => input.value = "");
      document.querySelector("#lignes tbody").appendChild(ligne);
    }

    function supprimerLigne(btn) {
      const lignes = document.querySelectorAll("#lignes tbody tr");
      if (lignes.length > 1) {
        btn.closest("tr").remove();
        calculerTotal();
      }
    }

    document.addEventListener("input", function (e) {
      if (e.target.name.includes("quantite") || e.target.name.includes("prix_unitaire")) {
        const row = e.target.closest("tr");
        const quantite = parseFloat(row.querySelector('input[name="quantite[]"]').value) || 0;
        const prix = parseFloat(row.querySelector('input[name="prix_unitaire[]"]').value) || 0;
        const montant = quantite * prix;
        row.querySelector('input[name="montant[]"]').value = montant.toFixed(3);
        calculerTotal();
      }
    });

    function calculerTotal() {
      let total = 0;
      document.querySelectorAll('input[name="montant[]"]').forEach(input => {
        total += parseFloat(input.value) || 0;
      });

      const fodec = total * 0.01;
      const tva = total * 0.19;
      const timbre = 1.000;
      const total_ttc = total + fodec + tva + timbre;

      document.getElementById("total").value = total.toFixed(3);
      document.getElementById("fodec").value = fodec.toFixed(3);
      document.getElementById("tva").value = tva.toFixed(3);
      document.getElementById("timbre").value = timbre.toFixed(3);
      document.getElementById("total_ttc").value = total_ttc.toFixed(3);
    }
  </script>
  </body>
</html>
