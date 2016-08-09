<script src="//cdn.bootcss.com/summernote/0.8.1/summernote.min.js"></script>
<script src="//cdn.bootcss.com/summernote/0.8.1/lang/summernote-zh-CN.min.js"></script>
<script type="text/javascript">
$.ajaxSetup({
    headers: { 'X-CSRF-Token' : '{!! csrf_token() !!}' }
});
  $('#summernote').summernote({
    minHeight: 300,
    lang: 'zh-CN',
    callbacks: {
    onImageUpload: function(files) {
      data = new FormData();
      data.append("image", files[0]);
        $.ajax({
            data: data,
            type: "POST",
            url: "/backend/article/uploadImage",
            cache: false,
            contentType: false,
            processData: false,
            success: function(src) {
                $('#summernote').summernote("insertImage", src);
            }
          });
    }
  }
  });
</script>