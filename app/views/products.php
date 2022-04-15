<?php $this->layout('master', ['title' => $title]); ?>
<?php if(!logadoOma()): redirect('/superadmin/login'); endif; ?>
<?php $produtos = $produto; ?>

<?php 

$pdo = connect();
$usuario = adminOma()->id;

?>

<!-- Toastr -->
<link rel="stylesheet" href="../assets/plugins/toastr/toastr.min.css">

<!-- Main content -->
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <!-- /.card -->

        <div class="card">
          <div class="card-header border-0">
            <h3 class="card-title">Produtos</h3>
            <div class="card-tools">
              <a href="#" class="btn btn-tool btn-sm">
                <i class="fas fa-download"></i>
              </a>
              <a href="#" class="btn btn-tool btn-sm">
                <i class="fas fa-bars"></i>
              </a>
            </div>
          </div>
          <div class="card-body table-responsive p-0">
            <table class="table table-striped table-valign-middle">
              <thead>
                <tr>
                  <th>Produto</th>
                  <th>Recentes</th>  
                  <th>Preço</th>
                  <th>Vendas</th>
                  <th>Mais</th>
                </tr>
              </thead>
              <tbody>

                <script>

                  function SomenteNumero(e) {
                    var tecla = (window.event) ? event.keyCode : e.which;
                    if ((tecla > 47 && tecla < 58)) return true;
                    else {
                      if (tecla == 8 || tecla == 0 || tecla == 46 || tecla == 13) return true;
                      else return false;
                    }
                  }

                  var input = document.getElementById('NR_PESO');
                  var oldVal = '';
                  input.addEventListener('keyup', function () {
                    var parts = this.value.split('.');
                    if (parts && parts[1] && parts[1].length > 3) this.value = oldVal;
                    oldVal = this.value;
                  });

                </script>

                <?php 


                foreach ($produtos as $produto): 

                  read('images', 'id, grupo, img');
                  where('grupo', $produto->id);
                  order( 'grupo');
                  $img = execute();

                  foreach ($img as $image):
                    ?>

                    <tr>
                      <td>
                        <img src="https://oficialmundoalcalino.com.br/img_pro/produtos/miniaturas-pro/<?php echo $image->img; ?>" alt="Product 1" class="img-circle img-size-32 mr-2">
                        <?php echo $produto->nome_linha_pro; ?>
                        <td>
                          <?php if($produto->novo == 1): ?>
                            <span class="badge bg-danger">Novo</span>
                          <?php endif; ?>
                        </td>
                      </td>

                      <td> <a href="#" class="text-muted" data-toggle="modal" data-target="#modal-default<?php echo $produto->id; ?>"><?php echo "R$ ".$produto->valor_linha_pro ?></a></td>

                      <td>
                        <small class="text-success mr-1">
                          <i class="fas fa-arrow-up"></i>
                          0%
                        </small>
                        0 Vendido(s)
                      </td>
                      <td>
                       <a href="#" class="text-muted" data-toggle="modal" data-target="#modal-lg<?php echo $produto->id; ?>10">
                        <i class="fas fa-search"></i>
                      </a>
                    </td>
                  </tr>




                  <div class="modal fade" id="modal-default<?php echo $produto->id; ?>">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title"><?php echo $produto->nome_linha_pro; ?></h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <p>
                          </p>
                        </div>
                        <div class="modal-footer justify-content-between">

                          <form action="/produtoPrecoUpdate" method="post">

                            <input  type="number" min="1" step="any" class="form-control" name="preco" required="required"  runat="server" maxlength="11" ID="NR_PESO" onkeypress='return SomenteNumero(event)' placeholder="<?php echo "R$ ".$produto->valor_linha_pro ?>">

                            <input type="hidden" name="id" value="<?php echo $produto->id; ?>">
                            <input type="hidden" name="produto" value="<?php echo $produto->nome_linha_pro; ?>">

                            <button type="submit" class="btn btn-primary">Atualizar Preço</button>

                          </form>



                        </div>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>
                  <!-- /.modal -->

                  <div class="modal fade" id="modal-lg<?php echo $produto->id; ?>10">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">

                        <div class="modal-footer justify-content-between">

                          <div class="card card-primary">
                            <div class="card-header">
                              <h3 class="card-title" > <?php echo $produto->nome_linha_pro; ?></h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->

                            <form enctype="multipart/form-data" method="POST" action="upload.php">
                              <div class="card-body">


                                <div class="form-group">
                                  <label for="exampleInputFile" _msthash="4114799" _msttexthash="321841">Imagens</label>
                                  <div class="input-group">
                                    <div class="custom-file">
                                      <input type="file" class="custom-file-input" name="arquivo[]" multiple="multiple" />
                                      <label class="custom-file-label" for="exampleInputFile" _msthash="5353036" _msttexthash="264134">Escolha Imagens</label>
                                    </div>


                                  </div>
                                </div>

                                <div class="form-group">
                                  <label for="exampleInputEmail1">Nome do Produto</label>
                                  <input type="text" class="form-control" name="nome_linha_pro" value="<?php echo $produto->nome_linha_pro; ?>">
                                </div>

                                <div class="form-group">
                                  <label for="exampleInputEmail1">Gtin</label>
                                  <input type="text" disabled="disabled" class="form-control" name="gtin" value="<?php echo $produto->gtin; ?>">
                                </div> 

                                <div class="form-group">
                                  <label for="exampleInputEmail1">google_id</label>
                                  <input type="text" disabled="disabled" class="form-control" name="google_id" value="<?php echo $produto->google_id; ?>">
                                </div>    



                                <div class="form-group">
                                  <div class="custom-control custom-switch">
                                    <input type="checkbox" <?php if($produto->novo == 1): ?> checked="checked" <?php endif; ?> name="novo" value="1" class="custom-control-input" id="customSwitch<?php echo $produto->id; ?>">
                                    <label class="custom-control-label" for="customSwitch<?php echo $produto->id; ?>">Pruduto Novo</label>
                                  </div>

                                  <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                    <input type="checkbox" <?php if($produto->status_linhaPro == 1): ?> checked="checked" <?php endif; ?> name="status_linhaPro" value="1" class="custom-control-input" id="customSwitch<?php echo $produto->id; ?>0">
                                    <label class="custom-control-label" for="customSwitch<?php echo $produto->id; ?>0"><?php if($produto->status_linhaPro == 1): ?> Ativado Exibido Na Loja <?php else: ?>Desativado Não Exibido Na Loja <?php endif; ?></label>
                                  </div>
                                </div>


                                <div class="form-group">
                                  <label for="exampleInputEmail1">Peso</label>
                                  <input type="number" min="1" step="any" class="form-control" name="peso" value="<?php echo $produto->peso; ?>">
                                </div>

                                <label for="exampleInputEmail1">Breve Descrição</label>
                                <textarea name="descricao_prev_linhaPro" id="summernote<?php echo $produto->id; ?>">
                                 <?php echo $produto->descricao_prev_linhaPro; ?>
                               </textarea>


                                <label for="exampleInputEmail1">Descrição Completa</label>
                                <textarea name="descricao_linhaPro" id="summernote<?php echo $produto->id; ?>0">
                                 <?php echo $produto->descricao_linhaPro; ?>
                               </textarea>


                               <input type="hidden" value="<?php echo $usuario; ?>" name="">
                               <input type="hidden" value="<?php echo date('Y/m/d H:i:s'); ?>" name="data_linhaPro">






                               <button type="submit" class="btn btn-primary btn-lg">Editar</button>
                             </div>
                             <!-- /.card-body -->



                           </form>
                         </div>



                       </div>
                     </div>
                     <!-- /.modal-content -->
                   </div>
                   <!-- /.modal-dialog -->
                 </div>
                 <!-- /.modal -->

                 <script>
                  $(function () {
    // Summernote
    $('#summernote<?php echo $produto->id; ?>').summernote()
    $('#summernote<?php echo $produto->id; ?>0').summernote()

    // CodeMirror
    CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
      mode: "htmlmixed",
      theme: "monokai"
    });
  })
</script>

<?php endforeach; ?>
<?php endforeach; ?>

</tbody>
</table>
</div>
</div>
<!-- /.card -->





</div>
<!-- /.col-md-6 -->

</div>
<!-- /.col-md-6 -->
</div>
<!-- /.row -->
</div>
<!-- /.container-fluid -->


<!-- Toastr -->
<script src="../assets/plugins/toastr/toastr.min.js"></script>


<?php 


$info = getFlashProduto('message');

if($info): ?>

  <script>
    Command: toastr["success"]("<?php echo $info; ?>")

    toastr.options = {
      "closeButton": false,
      "debug": false,
      "newestOnTop": false,
      "progressBar": true,
      "positionClass": "toast-top-center",
      "preventDuplicates": false,
      "onclick": null,
      "showDuration": "300",
      "hideDuration": "1000",
      "timeOut": "7000",
      "extendedTimeOut": "1000",
      "showEasing": "swing",
      "hideEasing": "linear",
      "showMethod": "fadeIn",
      "hideMethod": "fadeOut"
    }
  </script>
<?php endif; ?>


