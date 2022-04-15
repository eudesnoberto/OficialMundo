<?php $this->layout('master', ['title' => $title]); ?>
<?php if(!logadoOma()): redirect('/superadmin/login'); endif; ?>


  
  <div class="card-body">
    <textarea id="summernote">
      Place <em>some</em> <u>text</u> <strong>here</strong>
    </textarea>
  </div>




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



