<script type="text/javascript">
@if (Session::has('sweet_alert.alert'))
     swal({!! Session::get('sweet_alert.alert') !!});
@endif
</script>