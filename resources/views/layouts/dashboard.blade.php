<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    @include('partials.head_admin')
    <!-- end of global css -->
    @yield('header_styles')
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
    <!-- navbar -->
    @include('partials.header_admin')
    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- content -->
            @yield('content')
        </div>
        <!-- /.container-fluid-->
        <!-- /.content-wrapper-->
        <!-- footer -->
        @include('partials.footer_admin')
        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top"><i class="fa fa-angle-up"></i></a>
        <!-- Logout Modal-->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}</form>


                    </div>
                </div>
            </div>
        </div>
        <div id="center_modal" class="modal fade animated position_modal" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"></h4>
                    </div>
                    <div class="modal-body">
                        <p>You are about to delete this record</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-effect-ripple btn-danger" data-dismiss="modal">Cancel
                        </button>
                        <button type="button" id="dodol" onclick='delete_a();' class="btn btn-effect-ripple btn-primary">
                            Submit
                        </button>

                    </div>
                </div>
            </div>
        </div>
        <!-- Bootstrap core JavaScript-->
        <script src="https://blackrockdigital.github.io/startbootstrap-sb-admin/vendor/jquery/jquery.min.js"></script>
        <script src="https://blackrockdigital.github.io/startbootstrap-sb-admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- Core plugin JavaScript-->
        <script src="https://blackrockdigital.github.io/startbootstrap-sb-admin/vendor/jquery-easing/jquery.easing.min.js"></script>
        <!-- Page level plugin JavaScript-->
        <script src="https://blackrockdigital.github.io/startbootstrap-sb-admin/vendor/datatables/jquery.dataTables.js"></script>
        <script src="https://blackrockdigital.github.io/startbootstrap-sb-admin/vendor/datatables/dataTables.bootstrap4.js"></script>
        <!-- Custom scripts for all pages-->
        <script src="https://blackrockdigital.github.io/startbootstrap-sb-admin/js/sb-admin.min.js"></script>
        <!-- Custom scripts for this page-->
        <script src="https://blackrockdigital.github.io/startbootstrap-sb-admin/js/sb-admin-datatables.min.js"></script>
        <!-- piexif.min.js is only needed for restoring exif data in resized images and when you wish to resize images before upload. This must be loaded before fileinput.min.js -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/js/plugins/piexif.min.js" type="text/javascript"></script>
        <!-- sortable.min.js is only needed if you wish to sort / rearrange files in initial preview. This must be loaded before fileinput.min.js -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/js/plugins/sortable.min.js" type="text/javascript"></script>
        <!-- purify.min.js is only needed if you wish to purify HTML content in your preview for HTML files. This must be loaded before fileinput.min.js -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/js/plugins/purify.min.js" type="text/javascript"></script>
        <!-- popper.min.js below is needed if you use bootstrap 4.x. You can also use the bootstrap js 3.3.x versions without popper.min.js. -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
        <!-- bootstrap.min.js below is needed if you wish to zoom and preview file content in a detail modal dialog. bootstrap 4.x is supported. You can also use the bootstrap js 3.3.x versions. -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- the main fileinput plugin file -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/js/fileinput.min.js"></script>
        <!-- optionally uncomment line below for loading your theme assets for a theme like Font Awesome (`fa`) -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/themes/fa/theme.min.js"></script>
        <!-- summernote -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.min.js"></script>
        <!-- validator -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/js/bootstrapValidator.min.js"></script>
        @yield('footer_scripts')
    </div>
</body>

</html>
