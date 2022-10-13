<div class="nav-header position-fixed">
    <div class="brand-logo">
        <a href="{{ route('dashboard') }}">
           <!--  <b class="logo-abbr"><img src="images/logo.png" alt=""> </b> -->

           <b class="logo-abbr"><h4 style="color:white;" >MCL</h4> </b>
            <!-- <span class="logo-compact"><img src="./images/logo-compact.png" alt=""></span> -->
            <span class="logo-compact"><h4 style="color:white;"> Mirpur Club Ltd. </h4></span>
            <span class="brand-title position-fixed">
                <!-- <img src="images/logo-text.png" alt=""> -->
                <h3 style="color:white;" >Mirpur Club Ltd</h3>
            </span>
        </a>
    </div>
</div>
<!--**********************************
    Nav header end
***********************************-->

<!--**********************************
    Header start
***********************************-->
<div class="header position-fixed">    
    <div class="header-content clearfix">
        
        <div class="nav-control">
            <div class="hamburger">
                <span class="toggle-icon"><i class="icon-menu"></i></span>
            </div>
        </div>
        <div class="header-left">
            <div class="input-group icons">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-transparent border-0 pr-2 pr-sm-3" id="basic-addon1"><i class="mdi mdi-magnify"></i></span>
                </div>
                <input type="search" class="form-control" placeholder="Search Dashboard" aria-label="Search Dashboard">
                <div class="drop-down   d-md-none">
                    <form action="#">
                        <input type="text" class="form-control" placeholder="Search">
                    </form>
                </div>
            </div>
        </div>
        <div class="header-right">
            <ul class="clearfix">
                <li class="icons dropdown d-none d-md-flex">
                    <a href="javascript:void(0)" class="log-user"  data-toggle="dropdown">
                        <span>English</span>  <i class="fa fa-angle-down f-s-14" aria-hidden="true"></i>
                    </a>
                    <div class="drop-down dropdown-language animated fadeIn  dropdown-menu">
                        <div class="dropdown-content-body">
                            <ul>
                                <li><a href="javascript:void()">English</a></li>
                                <li><a href="javascript:void()">Bangla</a></li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>