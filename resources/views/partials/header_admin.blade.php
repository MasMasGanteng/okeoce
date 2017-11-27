<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="/dashboard">Baiza Admin</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <!-- Left Menu -->
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="leftAccordion">            
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Product">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseProduct" data-parent="#leftAccordion">
                        <i class="fa fa-fw fa-archive"></i>
                        <span class="nav-link-text">Product</span>
                    </a>
                <ul class="sidenav-second-level collapse" id="collapseProduct">
                    <li>
                        <a href="/dashboard/make_sushi">Make Sushi</a>
                    </li>
                    <li>
                        <a href="/dashboard/ready_to_eat">Ready to Eat</a>
                    </li>
                </ul>
            </li>
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
                        <a href="/dashboard/promo">Promo</a>
                    </li>
                    <li>
                        <a href="/dashboard/faq">FaQ</a>
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
                        <a href="/dashboard/order">Order</a>
                    </li>
                    <li>
                        <a href="/dashboard/transaction">Transaction</a>
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
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Hai, Admin
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a href="#" class="dropdown-item" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-fw fa-sign-out"></i> &nbsp;Logout</a>
                </div>
            </li>
        </ul>
    </div>
</nav>