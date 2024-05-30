<header class="bmd-layout-header ">
     <div class="navbar navbar-light bg-faded animate__animated animate__fadeInDown">
         <button class="navbar-toggler animate__animated animate__wobble animate__delay-2s" type="button"
             data-toggle="drawer" data-target="#dw-s1">
             <span class="navbar-toggler-icon"></span>
             <!-- <i class="material-Animation">menu</i> -->
         </button>
         <ul class="nav navbar-nav ">
          
         
         
            <li class="nav-item">
                <div class="dropdown">
                    <button class="btn dropdown-toggle m-0" type="button" id="dropdownMenu4"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ auth()->user()->name }}
                    </button>
                    <div aria-labelledby="dropdownMenu4"
                        class="dropdown-menu dropdown-menu-right"
                        aria-labelledby="dropdownMenu2">
                        <a class="dropdown-item" href="{{ route('profile.edit') }}">
                            <i class="far fa-user fa-sm c-main mr-2"></i>Profile
                        </a>
                        <button onclick="dark()" class="dropdown-item" type="button">
                            <i class="fas fa-moon fa-sm c-main mr-2"></i>Dark Mode
                        </button>
                     
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item">
                                <i class="fas fa-sign-out-alt c-main fa-sm mr-2"></i>Sign Out
                            </button>
                        </form>
                    </div>
                </div>
            </li>
            
 
 
 
 
         </ul>
     </div>
 </header>