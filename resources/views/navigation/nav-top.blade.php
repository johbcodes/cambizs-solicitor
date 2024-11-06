 <!-- HEADER -->
 <header id="pageTop" class="header">

     <div class="nav-wrapper">
         <div class="container-fluid header-bg">
             <div class="row">
                 <div class="col-lg-4 col-sm-4 col-xs-6 header-left empty">empty
                 </div>
                 <div class="col-lg-8 col-sm-8 col-xs-6 header-right empty">empty
                 </div>
             </div>
         </div>

         <!-- NAVBAR -->
         <nav id="menuBar" class="navbar navbar-default lightHeader" role="navigation">
             <div class="container">
                 <!-- Brand and toggle get grouped for better mobile display -->
                 <div class="navbar-header">
                     <button type="button" class="navbar-toggle" data-toggle="collapse"
                         data-target=".navbar-ex1-collapse">
                         <span class="sr-only">Toggle navigation</span>
                         <span class="icon-bar"></span>
                         <span class="icon-bar"></span>
                         <span class="icon-bar"></span>
                     </button>
                     <a class="navbar-brand" href="/"><img src="{{ asset('user/img/cambiz.jpg') }}"
                             alt="logo"></a>
                 </div>
                 <div class="topList hidden-xs">
                     <ul class="list-inline">
                         <li><i class="fa fa-calendar" aria-hidden="true"></i>Monday To Satarday - 9AM To 6PM</li>
                         <li><i class="fa fa-phone" aria-hidden="true"></i> +1 234 567 8900</li>
                     </ul>
                 </div>

                 <!-- Collect the nav links, forms, and other content for toggling -->
                 <div class="collapse navbar-collapse navbar-ex1-collapse">
                     <ul class="nav navbar-nav navbar-right">
                         <li class="active">
                             <a href="/">Home</a>
                         </li>

                         {{-- Practice Areas --}}
                         <li class=" dropdown singleDrop">
                             <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                 aria-haspopup="true" aria-expanded="false">Practice Areas</a>
                             <ul class="dropdown-menu dropdown-menu-right">

                                 @foreach ($practiceAreas->take(3) as $data)
                                     <li><a
                                             href="{{ route('areas.detail', $data->name) }}">{{ ucwords($data->name) }}</a>
                                     </li>
                                 @endforeach
                                 <li><a href="{{ route('areas') }}">View more ...</a></li>
                             </ul>
                         </li>

                         {{-- Solicitors --}}
                         <li class="">
                             <a href="{{ route('solicitors') }}">Solicitors</a>
                         </li>

                         {{-- Published Cases --}}
                         <li class="">
                             <a href="#">Published Cases</a>
                         </li>

                         {{-- Login --}}
                         @guest

                             <li class="">
                                 <a href="/login">Login</a>
                             </li>

                         @endguest
                         @auth
                             <li class="">
                                 <a href="/dashboard">Dashboard</a>
                             </li>

                         @endauth
                     </ul>
                 </div>

                 {{-- <div class="searchBox">
            <a href="#"><i class="fa fa-search"></i></a>
            <ul class="dropdown-menu dropdown-menu-right">
              <li>
                <form class="navbar-form">
                  <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  <div class="form-group"> <input type="text" class="form-control" placeholder="Search">
                  </div>
                </form>
              </li>
            </ul>
          </div> --}}

                 {{-- <div class="searchBox">
            <a href="#"><i class="fa fa-search"></i></a>
            <ul class="dropdown-menu dropdown-menu-right">
                <li>
                    <form class="navbar-form" action="/search" method="GET">
                        <div class="form-group">
                            <input type="text" class="form-control" name="title" placeholder="Title">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="location" placeholder="Location">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="specialty" placeholder="Specialty">
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control" name="fee" placeholder="Fee">
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control" name="rating" placeholder="Rating">
                        </div>
                        <div class="form-group"> <input type="text" class="form-control" placeholder="Search">
                    </form>
                </li>
            </ul>
        </div> --}}



             </div>
         </nav>
     </div>
 </header>
