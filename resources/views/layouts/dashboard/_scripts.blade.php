 <!-- BEGIN VENDOR JS-->
 <script src="{{ asset('assets/dashboard/vendors/js/vendors.min.js') }}" type="text/javascript"></script>
 <!-- BEGIN VENDOR JS-->
 <!-- BEGIN PAGE VENDOR JS-->
 <script src="{{ asset('assets/dashboard/vendors/js/charts/chartist.min.js') }}" type="text/javascript"></script>
 <script src="{{ asset('assets/dashboard/vendors/js/charts/chartist-plugin-tooltip.min.js') }}"
 type="text/javascript"></script>
 <script src="{{ asset('assets/dashboard/vendors/js/charts/raphael-min.js') }}" type="text/javascript"></script>
 <script src="{{ asset('assets/dashboard/vendors/js/charts/morris.min.js') }}" type="text/javascript"></script>
 <script src="{{ asset('assets/dashboard/vendors/js/timeline/horizontal-timeline.js') }}" type="text/javascript"></script>
 <!-- END PAGE VENDOR JS-->
 <!-- BEGIN MODERN JS-->
 <script src="{{ asset('assets/dashboard/js/core/app-menu.js') }}" type="text/javascript"></script>
 <script src="{{ asset('assets/dashboard/js/core/app.js') }}" type="text/javascript"></script>
 <script src="{{ asset('assets/dashboard/js/scripts/customizer.js') }}" type="text/javascript"></script>
 <!-- END MODERN JS-->
 <!-- BEGIN PAGE LEVEL JS-->
 <script src="{{ asset('assets/dashboard/js/scripts/pages/dashboard-ecommerce.js') }}" type="text/javascript"></script>
 <!-- END PAGE LEVEL JS-->
 <script src="{{ asset('assets/dashboard/vendors/js/tables/datatable/datatables.min.js') }}" type="text/javascript"></script>
 <script src="{{ asset('assets/dashboard/js/scripts/tables/datatables/datatable-basic.js') }}" type="text/javascript"></script>

  <!-- BEGIN PAGE VENDOR JS-->
  <script src="{{ asset('assets/dashboard/') }}/vendors/js/forms/icheck/icheck.min.js" type="text/javascript"></script>
  <script src="{{ asset('assets/dashboard/') }}/vendors/js/forms/toggle/bootstrap-checkbox.min.js"
  type="text/javascript"></script>
  <script src="{{ asset('assets/dashboard/') }}/vendors/js/forms/toggle/switchery.min.js" type="text/javascript"></script>
  <!-- BEGIN PAGE LEVEL JS-->
  <script src="{{ asset('assets/dashboard/') }}/js/scripts/tables/components/table-components.js" type="text/javascript"></script>
  <!-- END PAGE LEVEL JS-->
  @stack('js')
