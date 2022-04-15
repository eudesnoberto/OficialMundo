<?php $this->layout('master', ['title' => $title]) ?>
<?php if(!logger()) : ?>

<body class="hold-transition login-page">
<div class="login-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="/superadmin/login" class="h1"><b>Oficial</b><br>Mundo Alcalino</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Recuperar Senha</p>
      <?php echo getFlash('message'); ?>
      <form action="/recoverPostAdim" method="post">
      	<?php echo getCsrf(); ?>

        <div class="input-group mb-3">
          <input type="email" class="form-control" name="email_franq" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Recuperar Senha</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <p class="mt-3 mb-1">
        <a href="/superadmin/login">Login</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>

<?php else: redirect('/'); ?>
<?php endif; ?>
