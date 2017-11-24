<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.html">Baiza Admin</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="leftAccordion">
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Front">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseFront" data-parent="#leftAccordion">
                    <i class="fa fa-fw fa-eye"></i>
                    <span class="nav-link-text">Front</span>
                </a>
                <ul class="sidenav-second-level collapse" id="collapseFront">
                    <li>
                        <a href="/dashboard/banner">Banner</a>
                    </li>
                    <li>
                        <a href="#">Promo</a>
                    </li>
                    <li>
                        <a href="#">FaQ</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Product">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseProduct" data-parent="#leftAccordion">
                    <i class="fa fa-fw fa-archive"></i>
                    <span class="nav-link-text">Product</span>
                </a>
                <ul class="sidenav-second-level collapse" id="collapseProduct">
                    <li>
                        <a href="#">Ingredients</a>
                    </li>
                    <li>
                        <a href="#">Ready to Eat</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Selling">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseSelling" data-parent="#leftAccordion">
                    <i class="fa fa-fw fa-dollar"></i>
                    <span class="nav-link-text">Selling</span>
                </a>
                <ul class="sidenav-second-level collapse" id="collapseSelling">
                    <li>
                        <a href="#">Order</a>
                    </li>
                    <li>
                        <a href="#">Transaction</a>
                    </li>
                    <li>
                        <a href="#">Second Level Item</a>
                    </li>
                </ul>
            </li>
        </ul>
        <ul class="navbar-nav sidenav-toggler">
            <li class="nav-item">
                <a class="nav-link text-center" id="sidenavToggler"><i class="fa fa-fw fa-angle-left"></i></a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-fw fa-sign-out"></i>Logout</a>
            </li>
        </ul>
    </div>
</nav>
<!-- Logout Modal-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
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
                <a class="btn btn-primary" href="login.html">Logout</a>
            </div>
        </div>
    </div>
</div>