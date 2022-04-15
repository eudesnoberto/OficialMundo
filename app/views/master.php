<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">


<title> <?php echo $this->e($title); ?> </title>
<?php $uri = $_SERVER['REQUEST_URI']; $barras = explode('/', $uri)?>

<?php if ($uri == "/" || $barras[1] == 'produtos' || $barras[1] == 'carrinho' || $barras[1] == 'pay'): ?>

    <meta name="keywords" content="Água Alcalina">
    <meta name="description" content="Água Alcalina">
    <meta name="author" content="Eudes Alves">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="../assets/molla/images/icons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../assets/molla/images/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/molla/images/icons/favicon-16x16.png">
    <link rel="manifest" href="../assets/molla/images/icons/site.html">
    <link rel="mask-icon" href="../assets/molla/images/icons/safari-pinned-tab.svg" color="#666666">

    <!-- <icon> -->
    <link rel="shortcut icon" href="https://www.oficialmundoalcalino.com.br/icon/icon.ico">
    <link rel="icon" type="image/png" href="https://www.oficialmundoalcalino.com.br/icon/icon.ico" />

    <meta name="apple-mobile-web-app-title" content="Molla">
    <meta name="application-name" content="Molla">
    <meta name="msapplication-TileColor" content="#cc9966">
    <meta name="msapplication-config" content="../assets/molla/images/icons/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
    <!-- Plugins CSS File -->

    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="../assets/molla/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/molla/css/plugins/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="../assets/molla/css/plugins/magnific-popup/magnific-popup.css">
    <link rel="stylesheet" href="../assets/molla/css/plugins/jquery.countdown.css">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="../assets/molla/css/style.css">
    <link rel="stylesheet" href="../assets/molla/css/skins/skin-demo-10.css">
    <link rel="stylesheet" href="../assets/molla/css/demos/demo-10.css">
    
  <?php else: ?>

    <!-- <icon> -->
    <link rel="shortcut icon" href="https://www.oficialmundoalcalino.com.br/icon/icon.ico">
    <link rel="icon" type="image/png" href="https://www.oficialmundoalcalino.com.br/icon/icon.ico" />

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">

  <!-- include libraries(jQuery, bootstrap) -->
<script type="text/javascript" src="//code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" />
<script type="text/javascript" src="cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>


<!-- include summernote css/js-->
  <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../assets/plugins/summernote/summernote-bs4.min.css">
  <!-- CodeMirror -->
  <link rel="stylesheet" href="../assets/plugins/codemirror/codemirror.css">
  <link rel="stylesheet" href="../assets/plugins/codemirror/theme/monokai.css">
  <!-- SimpleMDE -->
  <link rel="stylesheet" href="../assets/plugins/simplemde/simplemde.min.css">
  

  <?php endif; ?>
</head>
<body>
  
      <div id="header">
        <?=$this->insert('partials/header')?>
      </div>
      <div class="conteiner">
        <?=$this->section('content')?>
        <?=$this->insert('partials/barra')?>

        

        <?php if ($barras[1] == 'dashboard' || $barras[1] == 'superadmin'): ?>
        <?php else: ?>
        <?=$this->insert('partials/footer'); ?>
        <?php endif; ?>

      </div>
      <script src="../app.js"></script> 
      <?=$this->section('scripts')?>

<?php 

$barra = explode('/', $uri);

if($_SERVER['REQUEST_URI'] == '/superadmin/login' || $_SERVER['REQUEST_URI'] == '/superadmin/recover' || $barra[1] == 'superAdminNewRecovered' || $_SERVER['REQUEST_URI'] == '/' || $barra[1] == 'carrinho' || $barra[1]== 'pay'): ?>

<?php else: ?>

  <footer class="main-footer">
    <strong>Copyright &copy; 2010-<?php echo date('Y'); ?> Oficial Mundo Alcalino</strong>
    Todos os Direitos Reservador.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0
    </div>
  </footer>

<?php endif; ?>
 

<?php if ($uri == "/"): ?>
      <!-- Plugins JS File -->
    <script src="../assets/molla/js/jquery.min.js"></script>
    <script src="../assets/molla/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/molla/js/jquery.hoverIntent.min.js"></script>
    <script src="../assets/molla/js/jquery.waypoints.min.js"></script>
    <script src="../assets/molla/js/superfish.min.js"></script>
    <script src="../assets/molla/js/owl.carousel.min.js"></script>
    <script src="../assets/molla/js/bootstrap-input-spinner.js"></script>
    <script src="../assets/molla/js/jquery.elevateZoom.min.js"></script>
    <script src="../assets/molla/js/bootstrap-input-spinner.js"></script>
    <script src="../assets/molla/js/jquery.magnific-popup.min.js"></script>
    <!-- Main JS File -->
    <script src="../assets/molla/js/main.js"></script>
<?php else: ?>
  <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

<!-- jQuery -->
<script src="../assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../assets/dist/js/adminlte.min.js"></script>
<!-- Summernote -->
<script src="../assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- CodeMirror -->
<script src="../assets/plugins/codemirror/codemirror.js"></script>
<script src="../assets/plugins/codemirror/mode/css/css.js"></script>
<script src="../assets/plugins/codemirror/mode/xml/xml.js"></script>
<script src="../assets/plugins/codemirror/mode/htmlmixed/htmlmixed.js"></script>
<!-- Page specific script -->


<!-- OPTIONAL SCRIPTS -->
<script src="../assets/plugins/chart.js/Chart.min.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../assets/dist/js/pages/dashboard3.js"></script>



<?php endif; ?>
</body>
</html>
<?php die(); ?>
