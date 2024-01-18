<meta charset="utf-8" />
<title>Ваш автосервис | @yield('title')</title>
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
<meta content="" name="description" />
<meta content="" name="author" />

<!-- ================== BEGIN BASE CSS STYLE ================== -->

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
<link href="{{ asset('/dash/assets/css/default/app.min.css') }}" rel="stylesheet" />
<link href="{{ asset('/dash/assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}"
  rel="stylesheet" />
<link href="{{ asset('/dash/assets/plugins/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}"
  rel="stylesheet" />

<!-- ================== END BASE CSS STYLE ================== -->

<style>
  .rounded__circle {
    width: 50px;
    height: 50px;
    object-fit: cover;
    border-radius: 50%
  }
</style>

@stack('css')
