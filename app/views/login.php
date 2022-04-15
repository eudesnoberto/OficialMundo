<?php $this->layout('master', ['title' => $title]); ?>
<?php if(!logger()) : ?>

<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="/superadmin/login" class="h1"><b>Oficial</b><br>Mundo Alcalino</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Login</p>

      <?php echo getFlash('message'); ?>
      <form action="/login" method="POST">
        <?php echo getCsrf(); ?>
        <div class="input-group mb-3">
          <input type="email" class="form-control" minlength="5" maxlength="50" required name="email_franq" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
        <input type="password" class="form-control" maxlength="30" required name="senha_franq" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Me Lembre
              </label>
            </div>
          </div>
        </div>

              <div class="social-auth-links text-center mt-2 mb-3">
      <button type="submit" class="btn btn-primary btn-block">Entrar</button>
      </div>

      </form>


      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="/superadmin/recover">Esqueci Minha Senha</a>
      </p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<?php else: redirect('/dashboard/administration'); ?>



<?php endif; ?>