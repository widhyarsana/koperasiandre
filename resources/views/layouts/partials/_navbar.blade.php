<!-- Main navbar -->
<div class="navbar navbar-expand-md navbar-dark navbar-static shadow-0">
     <div class="navbar-brand wmin-200">
          <a href="index.html" class="d-inline-block">
               <img src="/global_assets/images/logo_light.png" alt="">
          </a>
     </div>

     <div class="d-md-none">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
               <i class="icon-tree5"></i>
          </button>
          <button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
               <i class="icon-paragraph-justify3"></i>
          </button>
     </div>

     <div class="collapse navbar-collapse" id="navbar-mobile">
          <ul class="navbar-nav">
               <li class="nav-item">
                    <a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
                         <i class="icon-paragraph-justify3"></i>
                    </a>
               </li>
          </ul>
          <ul class="navbar-nav ml-md-auto">

               <li class="nav-item dropdown dropdown-user">
                    <a href="#" class="navbar-nav-link d-flex align-items-center dropdown-toggle"
                         data-toggle="dropdown">

                         <span>{{ ucfirst(auth()->user()->name) }}</span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right">

                         <a class="navbar-nav-link" id="logout-button">
                              <i class="icon-switch2"></i>
                              <span class=" ml-2">Logout</span>
                              <form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
                                   @csrf
                              </form>
                         </a>
                    </div>
               </li>
          </ul>
     </div>
</div>
<!-- /main navbar -->