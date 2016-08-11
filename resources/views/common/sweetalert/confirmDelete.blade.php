<script type="text/javascript">
$('.delete-link').on('click', function(e){
  var form = $(this).closest('form');
  console.log(form);
    e.preventDefault();
swal({   title: "Are you sure?",   text: "Your will not be able to recover this imaginary file!",   type: "warning",   showCancelButton: true,   confirmButtonColor: "#DD6B55",   confirmButtonText: "Yes, delete it!" }, function(){   form.submit(); });

});
</script>