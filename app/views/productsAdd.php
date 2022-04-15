<?php $this->layout('master', ['title' => $title]); ?>
<?php if(!logadoOma()): redirect('/superadmin/login'); endif; ?>
<?php $produtos = $produto; ?>

<!-- Toastr -->
<link rel="stylesheet" href="../assets/plugins/toastr/toastr.min.css">

<!-- Main content -->
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header border-0">
            <h3 class="card-title">Produtos</h3>
            <div class="card-tools">

              

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



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


<script>
  $(function () {
    // Summernote
    $('#summernote').summernote()

    // CodeMirror
    CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
      mode: "htmlmixed",
      theme: "monokai"
    });
  })
</script>