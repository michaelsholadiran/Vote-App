<!-- External JavaScripts -->
<script src="{{asset('assets/js')}}/jquery.min.js"></script>
<script nomodule defer src="{{asset('assets/js')}}/custom_build/custom_app.bundle.js"></script>
<script type="module" defer src="{{asset('assets/js')}}/src/index.js"></script>
<script src="{{asset('assets/vendors')}}/bootstrap/js/popper.min.js"></script>
<script src="{{asset('assets/vendors')}}/datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="{{asset('assets/vendors')}}/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<script src="{{asset('assets/vendors')}}/select2/dist/js/select2.min.js"></script>
<script src="{{asset('assets/vendors')}}/bootstrap/js/bootstrap.min.js"></script>
<script src="{{asset('assets/vendors')}}/imagesloaded/imagesloaded.js"></script>
<script src="{{asset('assets/vendors')}}/scroll/jquery.overlayScrollbars.min.js"></script>
<script src="{{asset('assets/js')}}/functions.js"></script>
<script src="{{asset('assets/js')}}/plugins.js"></script>
<script src="{{asset('assets/js')}}/admin.js"></script>

{{-- <script src='{{asset('assets/vendors')}}/switcher/switcher.js'></script> --}}
<script src='{{asset('assets/vendors')}}/bootstrap-notify/bootstrap-notify.js'></script>
<script src="{{asset('assets/js')}}/notifications.js"></script>
<!-- datatable -->
<script src="{{asset('assets/vendors')}}/jquery-datatable/datatablescripts.bundle.js"></script>
<script src="{{asset('assets/vendors')}}/chart/chart.min.js"></script>
<script src="{{asset('assets/vendors')}}/jquery-datatable/buttons/dataTables.buttons.min.js"></script>
<script src="{{asset('assets/vendors')}}/jquery-datatable/buttons/buttons.bootstrap4.min.js"></script>
<script src="{{asset('assets/vendors')}}/jquery-datatable/buttons/buttons.colVis.min.js"></script>
<script src="{{asset('assets/vendors')}}/jquery-datatable/buttons/buttons.flash.min.js"></script>
<script src="{{asset('assets/vendors')}}/jquery-datatable/buttons/buttons.html5.min.js"></script>
<script src="{{asset('assets/vendors')}}/jquery-datatable/buttons/buttons.print.min.js"></script>
<script src="{{asset('assets/vendors')}}/Flot/jquery.flot.js"></script>
<script src="{{asset('assets/vendors')}}/Flot/jquery.flot.resize.js"></script>
<script src="{{asset('assets/vendors')}}/Flot/jquery.flot.pie.js"></script>
<script src="{{asset('assets/vendors')}}/Flot/jquery.flot.categories.js"></script>
<script src="{{asset('assets/js')}}/adminlte.min.js"></script>
{{-- custom/plugins/index --}}
{{-- <script type="module" src="{{asset('assets/js/custom/plugin/index.js')}}"></script> --}}
@yield('script')
</body>
</html>
