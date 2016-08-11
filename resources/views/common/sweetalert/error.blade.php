<script type="text/javascript">
@if ($errors->any())
  swal("Oops...", '{{ $errors->first() }}', "error");
@endif
</script>