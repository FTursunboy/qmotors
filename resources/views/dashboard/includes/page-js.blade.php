<!-- ================== BEGIN BASE JS ================== -->
<script src="{{ asset('/dash/assets/js/app.min.js') }}"></script>
<script src="{{ asset('/dash/assets/js/theme/default.min.js') }}"></script>
<script src="{{ asset('/dash/assets/plugins/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/dash/assets/plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('/dash/assets/plugins/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('/dash/assets/plugins/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}">
</script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<!-- ================== END BASE JS ================== -->

<script>
  $(document).ready(function() {
    $('.select2').select2();
});
</script>

@stack('scripts')