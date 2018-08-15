<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    @include('partials.head_admin')
    <!-- end of global css -->
    @yield('header_styles')
</head>

<body id="page-top">
    <!-- navbar -->
    @include('partials.header_admin')
    <div id="wrapper">
    <ul class="sidebar navbar-nav" id="leftAccordion">
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Selling">
                <a class="nav-link" data-toggle="collapse" data-target="#collapseSelling" aria-expanded="true" aria-controls="collapseSelling">
                    <i class="fa fa-fw fa-dollar"></i>
                    <span class="nav-link-text">Transaction</span>
                </a>
                <ul class="sidenav-second-level collapse" id="collapseSelling" data-parent="#leftAccordion">
                    <li>
                        <a href="/dashboard/confirmation">Confirmation</a>
                    </li>
                    <li>
                        <a href="/dashboard/order_pending">Waiting Payment</a>
                    </li>
                    <li>
                        <a href="/dashboard/order_in">New Order</a>
                    </li>
                    <li>
                        <a href="/dashboard/order_progress">On Progress</a>
                    </li>
                    <li>
                        <a href="/dashboard/order_success">Success Order</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Product">
                <a class="nav-link" data-toggle="collapse" data-target="#collapseProduct" aria-expanded="true" aria-controls="collapseProduct">
                        <i class="fa fa-fw fa-archive"></i>
                        <span class="nav-link-text"> Add Product</span>
                    </a>
                <ul class="sidenav-second-level collapse" id="collapseProduct" data-parent="#leftAccordion">
                    <li>
                        <a href="/dashboard/make_sushi">Make Sushi</a>
                    </li>
                    <li>
                        <a href="/dashboard/ready_to_eat">Ready to Eat</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Front">
                <a class="nav-link" data-toggle="collapse" data-target="#collapseFront" aria-expanded="true" aria-controls="collapseFront">
                        <i class="fa fa-fw fa-eye"></i>
                        <span class="nav-link-text">Content Management</span>
                    </a>
                <ul class="sidenav-second-level collapse" id="collapseFront" data-parent="#leftAccordion">
                    <li>
                        <a href="/dashboard/banner">Banner</a>
                    </li>
                    <li>
                        <a href="/dashboard/promo">Promo</a>
                    </li>
                    <li>
                        <a href="/dashboard/faq">FaQ</a>
                    </li>
                </ul>
            </li>
        </ul>
        
    <div id="content-wrapper" class="pl-3 pr-3">
        <!-- content -->
        @yield('content')
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
    </div>
    </div> 
    <!-- Bootstrap core JavaScript-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script src="https://github.com/BlackrockDigital/startbootstrap-sb-admin/blob/master/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="https://github.com/BlackrockDigital/startbootstrap-sb-admin/blob/master/js/sb-admin.min.js"></script>
    <script src="https://github.com/BlackrockDigital/startbootstrap-sb-admin/blob/master/js/demo/datatables-demo.js"></script>

        @yield('footer_scripts')
</body>

</html>
