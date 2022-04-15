<?php $this->layout('master', ['title' => $title]) ?>





	<section class="w3l-contacts-12" id="contact">

		<div class="container py-5">

			<div class="contacts12-main py-md-3">

				<div class="header-section text-center">

					<h3 class="mb-md-5 mb-4">Recuperar Senha</h3>

				</div>

				<?php echo getFlash('message'); if (!$_SESSION['link']): return redirect('/superadmin/login'); endif; ?>  <br>

				 <a href="https://www.<?php echo $_SESSION['link'] ?? null; ?>" target="_blank" >

<button type="button" class="btn btn-block bg-gradient-info btn-lg" _msthash="5592717" _msttexthash="203541">acesse seu email agora www.<?php echo $_SESSION['link'] ?? null; ?> </button> </a>

			</div>

		</div>

	</section>



