<script type="text/javascript">
$('.delete-link').on('click', function(e){
  var form = $(this).closest('form');
    e.preventDefault();
    swal({
    title: "Are you sure?",
    text: "You will not be able to recover this imaginary file!",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#DD6B55",
    confirmButtonText: "确定",
    closeOnConfirm: false
},
function() {
    form.submmit();
});

});
</script>