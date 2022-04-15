<?php 
use app\classes\Cart;
use app\classes\CartProducts;

$cartProducts = new CartProducts();
$products =$cartProducts->products(new Cart);



$uri = $_SERVER['REQUEST_URI']; 

$barras = explode('/', $uri)

?>

<?php  // if(!logado()): redirect('/login'); endif; ?>


<?php if ($barras[1] == "dashboard"): ?>



  <?php 

  $pdo = connect();
  $usuario = adminOma()->id;

  $stmt = $pdo->prepare("SELECT * FROM franqueados WHERE id = $usuario");
  $stmt->execute();

  while ($respostas = $stmt->fetch(PDO::FETCH_ASSOC)):
    extract($respostas);
  endwhile;

  ?>

  <body class="hold-transition sidebar-mini">
    <div class="wrapper">
      <!-- Navbar -->
      <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Home</a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a class="nav-link" href="/logout/admin">Logout</a>
          </li>
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
              <span class="badge badge-danger navbar-badge">1</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <!-- Message Start -->
                <div class="media">
                  <img src="../assets/dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                  <div class="media-body">
                    <h3 class="dropdown-item-title">
                      Nora Silvester
                      <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                    </h3>
                    <p class="text-sm">Sobre os Filtros</p>
                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i>Há 4 Horas</p>
                  </div>
                </div>
                <!-- Message End -->
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item dropdown-footer">Ver Todas Menssagens</a>
            </div>
          </li>
          <!-- Notifications Dropdown Menu -->
          <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
              <i class="far fa-bell"></i>
              <span class="badge badge-warning navbar-badge">15</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <span class="dropdown-item dropdown-header">15 Notificações</span>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <i class="fas fa-envelope mr-2"></i> 4 Novas mensagens
                <span class="float-right text-muted text-sm">3 mins</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <i class="fas fa-users mr-2"></i> 8 Solicitações de Amigos
                <span class="float-right text-muted text-sm">12 hours</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <i class="fas fa-file mr-2"></i> 3 Novas Respostas
                <span class="float-right text-muted text-sm">2 days</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item dropdown-footer">Ver Todas Notificações</a>
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
        <a href="index3.html" class="brand-link">
          <img src="../assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">Admin</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
              <img src="../assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
              <a href="#" class="d-block"><a href="#" class="d-block"><?php echo $nome_franq." ".$sobrenome_franq; ?></a></a>        
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
           <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v3</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Geral
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/dashboard/produtos" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Produtos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/forms/advanced.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Artigos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/forms/editors.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Videos</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Usuarios
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/tables/simple.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Franqueados</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/tables/data.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Usuarios</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/tables/jsgrid.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Admins</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">EXAMPLES</li>
          <li class="nav-item">
            <a href="pages/calendar.html" class="nav-link">
              <i class="nav-icon fas fa-calendar-alt"></i>
              <p>
                Calendar
                <span class="badge badge-info right">2</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/gallery.html" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Gallery
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/kanban.html" class="nav-link">
              <i class="nav-icon fas fa-columns"></i>
              <p>
                Kanban Board
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                Mailbox
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/mailbox/mailbox.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inbox</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/mailbox/compose.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Compose</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/mailbox/read-mail.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Read</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Pages
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/examples/invoice.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Invoice</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/profile.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Profile</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/e-commerce.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>E-commerce</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/projects.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Projects</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/project-add.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Project Add</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/project-edit.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Project Edit</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/project-detail.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Project Detail</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/contacts.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Contacts</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/faq.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>FAQ</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/contact-us.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Contact us</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                Extras
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Login & Register v1
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="pages/examples/login.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Login v1</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="pages/examples/register.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Register v1</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="pages/examples/forgot-password.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Forgot Password v1</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="pages/examples/recover-password.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Recover Password v1</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Login & Register v2
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="pages/examples/login-v2.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Login v2</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="pages/examples/register-v2.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Register v2</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="pages/examples/forgot-password-v2.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Forgot Password v2</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="pages/examples/recover-password-v2.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Recover Password v2</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="pages/examples/lockscreen.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lockscreen</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/legacy-user-menu.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Legacy User Menu</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/language-menu.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Language Menu</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/404.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Error 404</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/500.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Error 500</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/pace.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pace</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/blank.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Blank Page</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="starter.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Starter Page</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-search"></i>
              <p>
                Search
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/search/simple.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Simple Search</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/search/enhanced.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Enhanced</p>
                </a>
              </li>
            </ul>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <?php $page = explode('/', $uri); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard <?php echo ucfirst($page[2]) ?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/dashboard/administration">Home</a></li>


              <li class="breadcrumb-item active"><?php echo ucfirst($page[2]) ?></li>


              <!-- /.content-header -->


            <?php else: ?>

              <?php if ($barras[1] == "superadmin"): else: ?>

                <header class="header header-8">
                  <div class="header-top">
                    <div class="container">
                      <div class="header-left">




                        <div class="header-dropdown">

                          <div class="header-menu">

                          </div><!-- End .header-menu -->
                        </div><!-- End .header-dropdown -->
                      </div><!-- End .header-left -->

                      <div class="header-right">
                        <ul class="top-menu">
                          <li>
                            <a href="#">Links</a>
                            <ul>

                              <li>   <a href="https://api.whatsapp.com/send?phone=5585996467499&amp;text=Olá, eu gostaria de saber mais sobre a água alcalina ionizada 😀."><i class="icon-whatsapp"></i> 85 99646-7499</a></li>

                              <li><a href="tel:8532471366"><i class="icon-phone"></i>Tel: (85) 3247-1366</a></li>

                              <li><a href="#"><i class="icon-heart-o"></i>Lista de Desejos <span>(0)</span></a></li>

                              <li><a href="#">Sobre</a></li>

                              <li><a href="#">Contato</a></li>

                              <li><a href="/superadmin/login"><i class="icon-user"></i>Login</a></li>
                            </ul>
                          </li>
                        </ul><!-- End .top-menu -->
                      </div><!-- End .header-right -->
                    </div><!-- End .container -->
                  </div><!-- End .header-top -->

                  <div class="header-middle sticky-header">
                    <div class="container">
                      <div class="header-left">
                        <button class="mobile-menu-toggler">
                          <span class="sr-only">Toggle mobile menu</span>
                          <i class="icon-bars"></i>
                        </button>

                        <a href="/" class="logo">
                          <img src="../assets/molla/images/logo.gif" alt="Molla Logo" width="140" height="50">
                        </a>
                      </div><!-- End .header-left -->

                      <div class="header-right">
                        <nav class="main-nav">
                          <ul class="menu sf-arrows">
                            <li class="megamenu-container active">
                              <a href="/" class="sf-with-ul">Home</a>
                            </li>

                            <li>
                              <a href="/produtos" class="sf-with-ul">Produtos</a>

                              <div class="megamenu megamenu-sm">
                                <div class="row no-gutters">
                                  <div class="col-md-6">
                                    <div class="menu-col">
                                      <div class="menu-title">Nossos Produtos</div><!-- End .menu-title -->
                                      <ul>
                                        <li><a href="product.html"></a></li>
                                        <li><a href="product-centered.html">Acqua Big Filter Carbon </a></li>
                                        <li><a href="product-extended.html"><span>Acqua Futury Alcalinity<span class="tip tip-new">New</span></span></a></li>
                                        <li><a href="product-gallery.html">Acqua New Ozone</a></li>
                                        <li><a href="product-sticky.html">Sticky Info</a></li>
                                        <li><a href="product-sidebar.html">Acqua Prime Ozone<span class="tip tip-new">New</span></a></li>
                                        <li><a href="product-fullwidth.html"> Kit Quântico Ortomolecular</a></li>
                                        <li><a href="product-masonry.html"> Jarra Alcalina</a></li>
                                      </ul>
                                    </div><!-- End .menu-col -->
                                  </div><!-- End .col-md-6 -->

                                  <div class="col-md-6">
                                    <div class="banner banner-overlay">
                                      <a href="category.html">
                                        <img src="../assets/molla/images/home/kit-quantico2.png" alt="Banner">


                                      </a>
                                    </div><!-- End .banner -->
                                  </div><!-- End .col-md-6 -->
                                </div><!-- End .row -->
                              </div><!-- End .megamenu megamenu-sm -->
                            </li>
                            <li>
                              <a href="#" class="sf-with-ul">Videos</a>

                              <ul>
                                <li>
                                  <a href="about.html" class="sf-with-ul">Série Saúde Quâtica</a>

                                  <ul>
                                    <li><a href="/videos">1º Video</a></li>
                                    <li><a href="/videos">2º Video</a></li>
                                    <li><a href="/videos">3º Video</a></li>
                                    <li><a href="/videos">4º Video</a></li>
                                  </ul>
                                </li>
                                <li>
                                  <li><a href="login.html">Água Alcalina</a></li>
                                  <li><a href="faq.html">Importancia do PH+</a></li>
                                </ul>
                              </li>



                              <li>
                                <a href="blog.html" class="sf-with-ul">Artigos</a>

                                <ul>
                                  <li><a href="blog.html">Equilibrar o pH</a></li>
                                  <li><a href="blog-listing.html">A eterna juventude</a></li>
                                  <li><a href="blog-listing.html">7 motivos para beber Água</a></li>
                                  <li><a href="blog-listing.html">motivos para beber Água</a></li>
                                  <li><a href="blog-listing.html">Água Magnesiana</a></li>


                                </ul>
                              </li>





                              <li>
                                <a href="elements-list.html" class="sf-with-ul">Empresa</a>
                              </li>
                              <li>
                                <a href="blog.html" class="sf-with-ul">App</a>

                                <ul>
                                  <li><a href="blog.html">App Store</a></li>
                                  <li><a href="blog-listing.html">Play Store</a></li>


                                </ul>
                              </li>
                            </ul><!-- End .menu -->
                          </nav><!-- End .main-nav -->

                          <div class="header-search">
                            <a href="#" class="search-toggle" role="button"><i class="icon-search"></i></a>
                            <form action="#" method="get">
                              <div class="header-search-wrapper">
                                <label for="q" class="sr-only">Search</label>
                                <input type="search" class="form-control" name="q" id="q" placeholder="Buscar..." required>
                              </div><!-- End .header-search-wrapper -->
                            </form>
                          </div><!-- End .header-search -->

                          <div class="dropdown cart-dropdown">
                         <?php if(count($products['products']) <= 0): ?>
                            <a href="/carrinho" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                              <i class="icon-shopping-cart"></i>
                              <span class="cart-count">0</span>
                            </a>
                          <?php endif; ?>

                            <?php if(count($products['products']) > 0): ?>
                              <a href="/carrinho" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                              <i class="icon-shopping-cart"></i>
                              <span class="cart-count"><?php echo count($products['products']); ?></span>
                            </a>



                            <div class="dropdown-menu dropdown-menu-right">
                              <div class="dropdown-cart-products">

                              <?php foreach ($products['products'] as $product): ?>
                              <div class="product">
                                  <div class="product-cart-details">
                                    <h4 class="product-title">
                                      <a href="/produtos"><?php echo $product['product']; ?></a>
                                    </h4>

                                    <span class="cart-product-info">
                                      <span class="cart-product-qty"><?php echo $product['qtd']; ?> x </span>
                                      R$ <?php echo $product['price']; ?>
                                    </span>
                                    <br>
                                    <span>Subtotal R$ <?php echo number_format($product['subtotal'], 2, ',', '.'); ?></span>
                                  </div><!-- End .product-cart-details -->

                                  <figure class="product-image-container">
                                    <a href="/produtos" class="product-image">
                                      <img src="../assets/molla/images/carrinho/<?php echo $product['img']; ?>" alt="product">
                                    </a>
                                  </figure>
                                  <a href="/remove/<?php echo $product['id'] ?>" class="btn-remove" title="Remove Product"><i class="icon-close"></i></a>
                                </div><!-- End .product -->
                              <?php endforeach; ?>

                             
<?php endif; ?>


                            </div><!-- End .cart-product -->
                         <?php if(count($products['products']) <= 0): ?>

<?php else: ?>
                          
                            <div class="dropdown-cart-total">
                              <span>Total</span>

                              <span class="cart-total-price">R$ <?php echo number_format($products['total'], 2, ',', '.'); ?></span>
                            </div><!-- End .dropdown-cart-total -->

                            <div class="dropdown-cart-action">
                              <a href="/carrinho" class="btn btn-primary">Seu Pedido</a>
                              <a href="/pay" class="btn btn-outline-primary-2"><span>Pagameto</span><i class="icon-long-arrow-right"></i></a>
                            </div><!-- End .dropdown-cart-total -->
<?php endif; ?>

                          </div><!-- End .dropdown-menu -->

                        </div><!-- End .cart-dropdown -->
                      </div><!-- End .header-right -->
                    </div><!-- End .container -->
                  </div><!-- End .header-middle -->
                </header><!-- End .header -->


              <?php endif; ?>
            <?php endif; ?>

