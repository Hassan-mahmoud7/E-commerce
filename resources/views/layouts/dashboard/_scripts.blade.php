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
 

  <!-- BEGIN PAGE VENDOR JS-->
  <script src="{{ asset('assets/dashboard/') }}/vendors/js/forms/icheck/icheck.min.js" type="text/javascript"></script>
  <script src="{{ asset('assets/dashboard/') }}/vendors/js/forms/toggle/bootstrap-checkbox.min.js"
  type="text/javascript"></script>
  <script src="{{ asset('assets/dashboard/') }}/vendors/js/forms/toggle/switchery.min.js" type="text/javascript"></script>
  <!-- BEGIN PAGE LEVEL JS-->

   {{-- js file input --}}
   <script src="{{ asset('vendor/file-input/js/fileinput.min.js') }}" type="text/javascript"></script>
   <script src="{{ asset('vendor/file-input/themes/fa5/theme.min.js') }}" type="text/javascript"></script>
   <script src="{{ asset('vendor/file-input/themes/fa5/theme.js') }}" type="text/javascript"></script>
   @if (config('app.locale') == 'ar')
   <script src="{{ asset('vendor/file-input/js/locales/LANG.js') }}" type="text/javascript"></script>
   <script src="{{ asset('vendor/file-input/js/locales/ar.js') }}" type="text/javascript"></script>
   @endif
   {{-- end js file input --}}
   
  {{-- js DataTable bootstrap --}}
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.min.js"></script>
    {{-- end js DataTable bootstrap --}}
    {{-- js DataTable buttons --}}
    <script src="https://cdn.datatables.net/buttons/3.2.0/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.0/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.0/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.0/js/buttons.html5.min.js"></script>
    {{-- excel datatable --}}
    <script src="{{ asset('assets/dashboard/vendors/js/datatables/excel/jszip.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/dashboard/vendors/js/datatables/excel/jszip.min.js') }}" type="text/javascript"></script>
    {{-- end excel datatable --}}
    {{-- pdf datatable --}}
    <script src="{{ asset('assets/dashboard/vendors/js/datatables/pdf/pdfmake.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/dashboard/vendors/js/datatables/pdf/vfs_fonts.js') }}" type="text/javascript"></script>
    {{-- end pdf datatable --}}
    {{-- end js DataTable buttons --}}
    {{-- DataTable responsive && fixedHeader && fixedColumns --}}
    <script src="https://cdn.datatables.net/responsive/3.0.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/fixedheader/4.0.1/js/dataTables.fixedHeader.min.js"></script>
    <script src="https://cdn.datatables.net/fixedheader/4.0.1/js/fixedHeader.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/fixedcolumns/5.0.4/js/dataTables.fixedColumns.min.js"></script>
    <script src="https://cdn.datatables.net/fixedcolumns/5.0.4/js/fixedColumns.bootstrap5.min.js"></script>
    {{-- end DataTable responsive && fixedHeader && fixedColumns --}}
    {{-- js DataTable colReorder && rowReorder && select --}}
    <script src="https://cdn.datatables.net/colreorder/2.0.4/js/dataTables.colReorder.min.js"></script>
    <script src="https://cdn.datatables.net/colreorder/2.0.4/js/colReorder.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/rowreorder/1.5.0/js/dataTables.rowReorder.min.js"></script>
    <script src="https://cdn.datatables.net/rowreorder/1.5.0/js/rowReorder.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/select/2.1.0/js/dataTables.select.min.js"></script>
    <script src="https://cdn.datatables.net/select/2.1.0/js/select.bootstrap5.min.js"></script>
    {{-- end js DataTable colReorder && rowReorder && select --}}
    {{-- js DataTable scroller --}}
    <script src="https://cdn.datatables.net/scroller/2.4.3/js/dataTables.scroller.min.js"></script>
    <script src="https://cdn.datatables.net/scroller/2.4.3/js/scroller.bootstrap5.min.js"></script>
    {{-- end js DataTable scroller --}}
    
   
    
  <!-- END PAGE LEVEL JS-->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    // translations
    var title = "{{ __('dashboard.delete_msg') }}";
    var text = "{{ __('dashboard.alert_delete_text') }}";
    var btnDelete = "{{ __('dashboard.delete_text') }}";
    var btnCancel = "{{ __('dashboard.cancel_text') }}";
    var Delete = "{{ __('dashboard.delete') }}";
    var Delete_success = "{{ __('dashboard.delete_success') }}";
    var cancelled = "{{ __('dashboard.canceled') }}";
    var cancel_success = "{{ __('dashboard.cancel_msg') }}";

    $(document).on('click', '.delete_confirm', function(e) {
       e.preventDefault();
       form = $(this).closest('form');
       const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: "btn btn-success",
            cancelButton: "btn btn-danger"
        },
        buttonsStyling: true
        });
        swalWithBootstrapButtons.fire({
        title: title,
        text: text,
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: btnDelete,
        cancelButtonText: btnCancel,
        reverseButtons: true
        }).then((result) => {
        if (result.isConfirmed) {
            form.submit();
            swalWithBootstrapButtons.fire({
            title: Delete,
            text: Delete_success,
            icon: "success"
            });
        } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
        ) {
            swalWithBootstrapButtons.fire({
            title: cancelled,
            text: cancel_success,
            icon: "error"
            });
        }
        });
    });
  </script>

  @stack('js')
