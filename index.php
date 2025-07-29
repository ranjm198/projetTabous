<?php
session_start();
if (!isset($_SESSION['superadmin'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Tabous Confection</title>
    <meta
      content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
      name="viewport"
    />
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.css" rel="stylesheet">

    <link
      rel="icon"
      href="assets/img/tabou.png"
      type="image/x-icon"
    />
  <style>
  #calendar {
    max-width: 100%;
    margin: 20px auto;
  }
  /* FullCalendar personnalisé */
  /* Boutons month, week, day */
.fc .fc-button-group .fc-button {
  background-color: #808080ff !important;
  color: #ffffff !important;
  border: none !important;
  font-size: 15px;
  font-weight: 500;
 border-radius: 30px !important;
   margin-right: 6px;
   width: 80px;
  transition: background-color 0.3s ease;
}
/* Bouton "Aujourd'hui" */
.fc-today-button {
   background-color: #4e44c6 !important;
  color: #ffffff !important;
  border: none !important;
  font-size: 15px;
  font-weight: 500;
 border-radius: 30px !important;
   margin-right: 6px;
   width: 80px;
  transition: background-color 0.3s ease;
}
/* Boutons "flèche gauche" et "flèche droite" */
.fc .fc-prev-button,
.fc .fc-next-button {
  background-color: #6c63ff !important;
  color: #fff !important;
  border: none !important;
  border-radius: 30px !important; /* bouton rond */
  width: 50px !important;
  height: 35px !important;
  padding: 0 !important;
  display: flex !important;
  align-items: center;
  justify-content: center;
  font-size: 14px !important; /* taille de la flèche */
  transition: background-color 0.3s ease;
}

/* Hover */
.fc .fc-prev-button:hover,
.fc .fc-next-button:hover {
  background-color: #574fd6 !important;
}

.fc .fc-button.fc-today-button:hover {
  background-color: #574fd6 !important; /* Violet plus foncé au hover */
}
.fc .fc-button-group .fc-button:hover {
  background-color: #3a3a3aff !important;
}

.fc .fc-button-group .fc-button.fc-button-active {
  background-color: #4e44c6 !important;
  box-shadow: inset 0 0 0 2px #ffffff33 !important;
}

.fc {
  background-color: #ffffff;
  border-radius: 8px;
  padding: 20px;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
  font-family: 'Segoe UI', sans-serif;
}

/* Couleurs des jours de la semaine */
.fc-day-header {
  background-color: #f1f3f5;
  color: #344767;
  font-weight: 600;
}

/* Jour actuel */
.fc-day-today {
  background-color: #e3f2fd !important;
  border: 1px solid #2196f3 !important;
}

/* Événements */
.fc-event {
 background-color: #6c63ff !important;
   border: none;
  padding: 2px 6px;
  border-radius: 4px;
  font-size: 13px;
  color: #fff;
}

/* Boutons de la barre de navigation */
.fc-toolbar .fc-button {
  background-color: #6c63ff;
  border: none;
  color: white;
  font-size: 13px;
  padding: 6px 12px;
  border-radius: 4px;
  transition: background 0.3s ease;
}

.fc-toolbar .fc-button:hover {
  background-color: #574fd6;
}

.fc-toolbar .fc-button.fc-button-active {
  background-color: #4e44c6;
}

/* Titre du mois */
.fc-toolbar-title {
  color: #3c4858;
  font-size: 20px;
  font-weight: bold;
}

</style>


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

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="assets/css/demo.css" />
  </head>
  <body>
    <div class="wrapper">
      <!-- Sidebar -->
      <div class="sidebar" data-background-color="dark">
        <div class="sidebar-logo">
          <!-- Logo Header -->
          <div class="logo-header" data-background-color="dark">
            
            <a href="index.html" class="logo" style="color:white">
Espace Administrateur             </a>
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
              <li class="nav-item active">
                <a
                  href="index.php"
                >
                  <i class="fas fa-home"></i>
                  <p>Dashboard Admin</p>
                </a>
               
              <li class="nav-item">
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
              <a href="index.html" class="logo">
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

            <div
              class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4"
            >
              <div>
              <h3 class="fw-bold mb-3">Dashboard Tabous Confection</h3>
              <h6 class="op-7 mb-2">Bienvenue sur votre tableau de bord de gestion de factures</h6>
              </div>
              <div class="ms-md-auto py-2 py-md-0">
                <a href="#" class="btn btn-label-secondary btn-round me-2">Gestion des factures</a>
                <a href="#"   class="btn btn-secondary  btn-round">Ajout facture</a>
              </div>
            </div>
            <div class="row">


          </div>
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Calendrier des événements</h4>
      </div>
      <div class="card-body">
        <div id="calendar"></div>
      </div>
    </div>
  </div>
</div>

           
         
          </div>
        </div>


      </div>

      <!-- Custom template | don't include it in your project! -->
      <div class="custom-template">
        <div class="title">Settings</div>
        <div class="custom-content">
          <div class="switcher">
            <div class="switch-block">
              <h4>Logo Header</h4>
              <div class="btnSwitch">
                <button
                  type="button"
                  class="selected changeLogoHeaderColor"
                  data-color="dark"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="blue"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="purple"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="light-blue"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="green"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="orange"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="red"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="white"
                ></button>
                <br />
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="dark2"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="blue2"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="purple2"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="light-blue2"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="green2"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="orange2"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="red2"
                ></button>
              </div>
            </div>
            <div class="switch-block">
              <h4>Navbar Header</h4>
              <div class="btnSwitch">
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="dark"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="blue"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="purple"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="light-blue"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="green"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="orange"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="red"
                ></button>
                <button
                  type="button"
                  class="selected changeTopBarColor"
                  data-color="white"
                ></button>
                <br />
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="dark2"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="blue2"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="purple2"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="light-blue2"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="green2"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="orange2"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="red2"
                ></button>
              </div>
            </div>
            <div class="switch-block">
              <h4>Sidebar</h4>
              <div class="btnSwitch">
                <button
                  type="button"
                  class="changeSideBarColor"
                  data-color="white"
                ></button>
                <button
                  type="button"
                  class="selected changeSideBarColor"
                  data-color="dark"
                ></button>
                <button
                  type="button"
                  class="changeSideBarColor"
                  data-color="dark2"
                ></button>
              </div>
            </div>
          </div>
        </div>
        <div class="custom-toggle">
          <i class="icon-settings"></i>
        </div>
      </div>
      <!-- End Custom template -->
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

    <!-- jQuery Vector Maps -->
    <script src="assets/js/plugin/jsvectormap/jsvectormap.min.js"></script>
    <script src="assets/js/plugin/jsvectormap/world.js"></script>

    <!-- Sweet Alert -->
    <script src="assets/js/plugin/sweetalert/sweetalert.min.js"></script>

    <!-- Kaiadmin JS -->
    <script src="assets/js/kaiadmin.min.js"></script>

    <!-- Kaiadmin DEMO methods, don't include it in your project! -->
    <script src="assets/js/setting-demo.js"></script>
    <script src="assets/js/demo.js"></script>
    <script>
      $("#lineChart").sparkline([102, 109, 120, 99, 110, 105, 115], {
        type: "line",
        height: "70",
        width: "100%",
        lineWidth: "2",
        lineColor: "#177dff",
        fillColor: "rgba(23, 125, 255, 0.14)",
      });

      $("#lineChart2").sparkline([99, 125, 122, 105, 110, 124, 115], {
        type: "line",
        height: "70",
        width: "100%",
        lineWidth: "2",
        lineColor: "#f3545d",
        fillColor: "rgba(243, 84, 93, .14)",
      });

      $("#lineChart3").sparkline([105, 103, 123, 100, 95, 105, 115], {
        type: "line",
        height: "70",
        width: "100%",
        lineWidth: "2",
        lineColor: "#ffa534",
        fillColor: "rgba(255, 165, 52, .14)",
      });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const calendarEl = document.getElementById('calendar');
    const calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: 'dayGridMonth',
      locale: 'fr',
      selectable: true,
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay'
      },
      events: 'events.php', // GET events

      dateClick: function (info) {
        const title = prompt("Titre de l'événement :");
        if (title) {
          fetch('events.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: new URLSearchParams({
              title: title,
              start: info.dateStr
            })
          })
          .then(res => res.json())
          .then(data => {
            if (data.status === 'success') {
              calendar.addEvent({
                title: title,
                start: info.dateStr,
                allDay: true
              });
              alert("Événement ajouté !");
            } else {
              alert("Erreur d'enregistrement !");
            }
          });
        }
      }
    });

    calendar.render();
  });
</script>

  </body>
</html>
