<?php $this->layout('master', ['title' => $title]) ?>

<?php echo getFlash('message'); ?>

<section class="w3l-contacts-12" id="contact">
	<div class="container py-5">
		<div class="contacts12-main py-md-3">
		<div class="header-section text-center">
				<h3 class="mb-md-5 mb-4">Pergunte Aqui</h3>
		</div>
			<form action="/question/answer" method="post">
				<div class="main-input">
					<?php echo getCsrf(); ?>
					<select class="form-select" id="categorias"  aria-label="Default select example">
						<option value="">Escolha um curso</option>
					</select>
					<select class="form-select"  id="subcategorias">
						<option value="">Escolha um curso</option>
					</select>
					<?php echo getFlash('users_answer'); ?>
			</form>

		</div>

	</div>

</section>