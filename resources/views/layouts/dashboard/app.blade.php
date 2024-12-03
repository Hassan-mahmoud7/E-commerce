<!DOCTYPE html>
@include('layouts.dashboard._header')
<body class="vertical-layout vertical-menu-modern 2-columns   menu-expanded fixed-navbar"
data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
  @include('layouts.dashboard._navbar')
  <!-- ////////////////////////////////////////////////////////////////////////////-->
 @include('layouts.dashboard._sidebar')
  @yield('content')
  <!-- ////////////////////////////////////////////////////////////////////////////-->
 @include('layouts.dashboard._footer')
 @include('layouts.dashboard._scripts')
</body>
</html>
