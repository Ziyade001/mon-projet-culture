<!doctype html>
<html lang="en">
  <!--begin::Head-->
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Culture | Dashboard</title>
    <!--begin::Accessibility Meta Tags-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes" />
    <meta name="color-scheme" content="light dark" />
    <meta name="theme-color" content="#007bff" media="(prefers-color-scheme: light)" />
    <meta name="theme-color" content="#4113e9ff" media="(prefers-color-scheme: dark)" />
    <!--end::Accessibility Meta Tags-->
    <!--begin::Primary Meta Tags-->
    <meta name="title" content="AdminLTE v4 | Dashboard" />
    <meta name="author" content="ColorlibHQ" />
    <meta
      name="description"
      content="AdminLTE is a Free Bootstrap 5 Admin Dashboard, 30 example pages using Vanilla JS. Fully accessible with WCAG 2.1 AA compliance."
    />
    <meta
      name="keywords"
      content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, colorlibhq, colorlibhq dashboard, colorlibhq admin dashboard, accessible admin panel, WCAG compliant"
    />
    <!--end::Primary Meta Tags-->
    <!--begin::Accessibility Features-->
    <!-- Skip links will be dynamically added by accessibility.js -->
    <meta name="supported-color-schemes" content="light dark" />
    <link rel="preload" href="{{ URL::asset('css/adminLte.css') }}" as="style" />
    <!--end::Accessibility Features-->
    <!--begin::Fonts-->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
      integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q="
      crossorigin="anonymous"
      media="print"
      onload="this.media='all'"
    />
    <!--end::Fonts-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/styles/overlayscrollbars.min.css"
      crossorigin="anonymous"
    />
    <!--end::Third Party Plugin(OverlayScrollbars)-->
    <!--begin::Third Party Plugin(Bootstrap Icons)-->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"
      crossorigin="anonymous"
    />
    <!--end::Third Party Plugin(Bootstrap Icons)-->
    <!--begin::Required Plugin(AdminLTE)-->
    <link rel="stylesheet" href="{{ URL::asset('css/adminLte.css') }}" />
    <!--end::Required Plugin(AdminLTE)-->
    <!-- apexcharts -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.css"
      integrity="sha256-4MX+61mt9NVvvuPjUWdUdyfZfxSB1/Rf9WtqRHgG5S0="
      crossorigin="anonymous"
    />
    <!-- jsvectormap -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/css/jsvectormap.min.css"
      integrity="sha256-+uGLJmmTKOqBr+2E6KDYs/NRsHxSkONXFHUL0fy2O/4="
      crossorigin="anonymous"
    />

    
  </head>
  <!--end::Head-->
  <!--begin::Body-->
  <body class="layout-fixed sidebar-expand-lg sidebar-open bg-body-tertiary">
    <!--begin::App Wrapper-->
    <div class="app-wrapper">
      <!--begin::Header-->
      <nav class="app-header navbar navbar-expand bg-body">
        <!--begin::Container-->
        <div class="container-fluid">
          <!--begin::Start Navbar Links-->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                <i class="bi bi-list fs-4"></i>
              </a>
            </li>
            
          </ul>
          <!--end::Start Navbar Links-->
          
          <!--begin::End Navbar Links-->
          <ul class="navbar-nav ms-auto">
    
    <!-- User Menu -->
    <li class="nav-item dropdown user-menu">
        <a href="#" class="nav-link d-flex align-items-center" data-bs-toggle="dropdown">
    
    <img
        src="{{ Auth::user()->photo 
                ? asset('storage/photos/' . Auth::user()->photo) 
                : asset('img/user2-160x160.jpg') }}"
        class="user-image rounded-circle shadow-sm me-2"
        alt="Avatar utilisateur"
        style="width: 32px; height: 32px; object-fit: cover;"
    />

    <span class="d-none d-md-inline fw-semibold">
        {{ Auth::user()->prenom }} {{ Auth::user()->nom }}
    </span>

</a>


        <ul class="dropdown-menu dropdown-menu-end shadow-lg border-0 rounded-3 mt-2">

            <!-- Header -->
            <li class="text-center bg-primary text-white p-4 rounded-top">
                <img
                    src="{{ asset('img/user2-160x160.jpg') }}"
                    class="rounded-circle shadow mb-2"
                    alt="User"
                    style="width: 70px; height: 70px; object-fit: cover;"
                />
                <h6 class="fw-bold mb-0">{{ Auth::user()->nom }}</h6>
                <small class="opacity-75">Membre depuis le {{ Auth::user()->created_at->format('d/m/Y') }}</small>
            </li>

            <!-- Body -->
            <li class="px-3 py-2">
                <div class="row text-center g-2">
                    <div class="col-4">
                        <a href="{{ route('profile.edit') }}" class="text-decoration-none text-dark small fw-semibold">
                            <i class="bi bi-person-lines-fill me-1"></i>Profil
                        </a>
                    </div>
                    <div class="col-4">
                        <a href="#" class="text-decoration-none text-dark small fw-semibold">
                            <i class="bi bi-gear-fill me-1"></i>Réglages
                        </a>
                    </div>
                    <div class="col-4">
                        <a href="#" class="text-decoration-none text-dark small fw-semibold">
                            <i class="bi bi-question-circle-fill me-1"></i>Aide
                        </a>
                    </div>
                </div>
            </li>

            <!-- Footer -->
            <li class="d-flex justify-content-between align-items-center px-3 py-2 bg-light rounded-bottom">
                <a href="{{ route('profile.edit') }}" class="btn btn-sm btn-primary px-3">
                    <i class="bi bi-person-fill me-1"></i>Profil
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-danger px-3">
                        <i class="bi bi-box-arrow-right me-1"></i>Déconnexion
                    </button>
                </form>
            </li>

        </ul>
    </li>

</ul>

          <!--end::End Navbar Links-->
        </div>
        <!--end::Container-->
      </nav>
      <!--end::Header-->
      <!--begin::Sidebar-->
      <aside class="app-sidebar shadow">
        <div class="sidebar-brand">
          <a href="{{ route('dashboard') }}" class="brand-link">
            <img
              src="{{ URL::asset('img/AdminLTELogo1.png') }}"
              alt="Culture"
              class="brand-image opacity-75 shadow"
            />
            <span class="brand-text fw-light">CULTURE</span>
          </a>
        </div>

        <div class="sidebar-wrapper">
          <nav class="mt-2">
            <ul class="nav sidebar-menu flex-column"
              data-lte-toggle="treeview"
              role="navigation"
              aria-label="Main navigation"
              data-accordion="false"
              id="navigation"
            >
              
              <!-- Dashboard -->
              <li class="nav-item mt-3">
                <a href="{{ route('dashboard') }}" class="nav-link">
                  <i class="nav-icon bi bi-speedometer2"></i>
                  <p><strong>Tableau de Bord</strong></p>
                </a>
              </li>

              <!-- Gestion du Contenu -->
              <li class="nav-item menu-open mt-3">
                <a href="#" class="nav-link">
                  <i class="nav-icon bi bi-collection"></i>
                  <p>
                    <strong>Gestion du Contenu</strong>
                    <i class="nav-arrow bi bi-chevron-right"></i>
                  </p>
                </a>
                
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ route('contenus.index') }}" class="nav-link">
                      <i class="nav-icon bi bi-file-text"></i>
                      <p>Contenus</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('medias.index') }}" class="nav-link">
                      <i class="nav-icon bi bi-images"></i>
                      <p>Médias</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('commentaires.index') }}" class="nav-link">
                      <i class="nav-icon bi bi-chat-dots"></i>
                      <p>Commentaires</p>
                    </a>
                  </li>
                </ul>
              </li>

              <!-- Catalogue Culturel -->
              <li class="nav-item mt-3">
                <a href="#" class="nav-link">
                  <i class="nav-icon bi bi-globe"></i>
                  <p>
                    <strong>Catalogue Culturel</strong>
                    <i class="nav-arrow bi bi-chevron-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ route('langues.index') }}" class="nav-link">
                      <i class="nav-icon bi bi-translate"></i>
                      <p>Langues</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('regions.index') }}" class="nav-link">
                      <i class="nav-icon bi bi-geo-alt"></i>
                      <p>Régions</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('type_contenus.index') }}" class="nav-link">
                      <i class="nav-icon bi bi-tags"></i>
                      <p>Types de Contenus</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('type_medias.index') }}" class="nav-link">
                      <i class="nav-icon bi bi-collection-play"></i>
                      <p>Types de Médias</p>
                    </a>
                  </li>
                </ul>
              </li>

              <!-- Administration -->
              <li class="nav-item mt-3">
                <a href="#" class="nav-link">
                  <i class="nav-icon bi bi-shield-check"></i>
                  <p>
                    <strong>Administration</strong>
                    <i class="nav-arrow bi bi-chevron-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ route('utilisateurs.index') }}" class="nav-link">
                      <i class="nav-icon bi bi-people"></i>
                      <p>Utilisateurs</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('roles.index') }}" class="nav-link">
                      <i class="nav-icon bi bi-person-badge"></i>
                      <p>Rôles</p>
                    </a>
                  </li>
                </ul>
              </li>

            </ul>
          </nav>
        </div>
      </aside>
      <!--end::Sidebar-->
      <!--begin::App Main-->
      <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            @yield('title')
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        
        <!--end::App Content Header-->
        <!--begin::App Content-->

        @yield('content')
        
        <!--end::App Content-->
      </main>
      <!--end::App Main-->
      
    </div>
    <!--end::App Wrapper-->
    <!--begin::Script-->
    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <script
      src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/browser/overlayscrollbars.browser.es6.min.js"
      crossorigin="anonymous"
    ></script>
    <!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Required Plugin(popperjs for Bootstrap 5)-->
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
      crossorigin="anonymous"
    ></script>
    <!--end::Required Plugin(popperjs for Bootstrap 5)--><!--begin::Required Plugin(Bootstrap 5)-->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js"
      crossorigin="anonymous"
    ></script>
    <!--end::Required Plugin(Bootstrap 5)--><!--begin::Required Plugin(AdminLTE)-->
    <script src="{{ URL::asset('js/adminLte.js') }}"></script>
    <!--end::Required Plugin(AdminLTE)--><!--begin::OverlayScrollbars Configure-->
    <script>
      const SELECTOR_SIDEBAR_WRAPPER = '.sidebar-wrapper';
      const Default = {
        scrollbarTheme: 'os-theme-light',
        scrollbarAutoHide: 'leave',
        scrollbarClickScroll: true,
      };
      document.addEventListener('DOMContentLoaded', function () {
        const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);
        if (sidebarWrapper && OverlayScrollbarsGlobal?.OverlayScrollbars !== undefined) {
          OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
            scrollbars: {
              theme: Default.scrollbarTheme,
              autoHide: Default.scrollbarAutoHide,
              clickScroll: Default.scrollbarClickScroll,
            },
          });
        }
      });
    </script>
    <!--end::OverlayScrollbars Configure-->
    <!-- OPTIONAL SCRIPTS -->
    <!-- sortablejs -->
    <script
      src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"
      crossorigin="anonymous"
    ></script>
    <!-- sortablejs -->
    <script>
      new Sortable(document.querySelector('.connectedSortable'), {
        group: 'shared',
        handle: '.card-header',
      });

      const cardHeaders = document.querySelectorAll('.connectedSortable .card-header');
      cardHeaders.forEach((cardHeader) => {
        cardHeader.style.cursor = 'move';
      });
    </script>
    <!-- apexcharts -->
    <script
      src="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.min.js"
      integrity="sha256-+vh8GkaU7C9/wbSLIcwq82tQ2wTf44aOHA8HlBMwRI8="
      crossorigin="anonymous"
    ></script>
    <!-- ChartJS -->
    <script>
      // NOTICE!! DO NOT USE ANY OF THIS JAVASCRIPT
      // IT'S ALL JUST JUNK FOR DEMO
      // ++++++++++++++++++++++++++++++++++++++++++

      const sales_chart_options = {
        series: [
          {
            name: 'Digital Goods',
            data: [28, 48, 40, 19, 86, 27, 90],
          },
          {
            name: 'Electronics',
            data: [65, 59, 80, 81, 56, 55, 40],
          },
        ],
        chart: {
          height: 300,
          type: 'area',
          toolbar: {
            show: false,
          },
        },
        legend: {
          show: false,
        },
        colors: ['#0d6efd', '#20c997'],
        dataLabels: {
          enabled: false,
        },
        stroke: {
          curve: 'smooth',
        },
        xaxis: {
          type: 'datetime',
          categories: [
            '2023-01-01',
            '2023-02-01',
            '2023-03-01',
            '2023-04-01',
            '2023-05-01',
            '2023-06-01',
            '2023-07-01',
          ],
        },
        tooltip: {
          x: {
            format: 'MMMM yyyy',
          },
        },
      };

      const sales_chart = new ApexCharts(
        document.querySelector('#revenue-chart'),
        sales_chart_options,
      );
      sales_chart.render();
    </script>
    <!-- jsvectormap -->
    <script
      src="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/js/jsvectormap.min.js"
      integrity="sha256-/t1nN2956BT869E6H4V1dnt0X5pAQHPytli+1nTZm2Y="
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/maps/world.js"
      integrity="sha256-XPpPaZlU8S/HWf7FZLAncLg2SAkP8ScUTII89x9D3lY="
      crossorigin="anonymous"
    ></script>
    <!-- jsvectormap -->
    <script>
      // World map by jsVectorMap
      new jsVectorMap({
        selector: '#world-map',
        map: 'world',
      });

      // Sparkline charts
      const option_sparkline1 = {
        series: [
          {
            data: [1000, 1200, 920, 927, 931, 1027, 819, 930, 1021],
          },
        ],
        chart: {
          type: 'area',
          height: 50,
          sparkline: {
            enabled: true,
          },
        },
        stroke: {
          curve: 'straight',
        },
        fill: {
          opacity: 0.3,
        },
        yaxis: {
          min: 0,
        },
        colors: ['#DCE6EC'],
      };

      const sparkline1 = new ApexCharts(document.querySelector('#sparkline-1'), option_sparkline1);
      sparkline1.render();

      const option_sparkline2 = {
        series: [
          {
            data: [515, 519, 520, 522, 652, 810, 370, 627, 319, 630, 921],
          },
        ],
        chart: {
          type: 'area',
          height: 50,
          sparkline: {
            enabled: true,
          },
        },
        stroke: {
          curve: 'straight',
        },
        fill: {
          opacity: 0.3,
        },
        yaxis: {
          min: 0,
        },
        colors: ['#DCE6EC'],
      };

      const sparkline2 = new ApexCharts(document.querySelector('#sparkline-2'), option_sparkline2);
      sparkline2.render();

      const option_sparkline3 = {
        series: [
          {
            data: [15, 19, 20, 22, 33, 27, 31, 27, 19, 30, 21],
          },
        ],
        chart: {
          type: 'area',
          height: 50,
          sparkline: {
            enabled: true,
          },
        },
        stroke: {
          curve: 'straight',
        },
        fill: {
          opacity: 0.3,
        },
        yaxis: {
          min: 0,
        },
        colors: ['#DCE6EC'],
      };

      const sparkline3 = new ApexCharts(document.querySelector('#sparkline-3'), option_sparkline3);
      sparkline3.render();
    </script>
    <!--end::Script-->
  </body>
  <!--end::Body-->
</html>
