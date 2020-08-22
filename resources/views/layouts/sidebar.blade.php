<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div class="h-100">

        <div class="user-wid text-center py-4">
            <div class="user-img">
                <img src="/images/users/avatar.png" alt="" class="avatar-md mx-auto rounded-circle">
            </div>

            <div class="mt-3">

                <a href="#" class="text-dark font-weight-medium font-size-16">{{ Auth::user()->name }}</a>
                <p class="text-body mt-1 mb-0 font-size-13">administrateur</p>

            </div>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="mdi mdi-airplay"></i><span class="badge badge-pill badge-info float-right"></span>
                    <span>tableau de bord</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">

                        <li><a href=" {{ route ('index') }}">Stats</a></li>

                        
                    </ul>
                </li>

                <li>
                
                    @if (session('error'))
                                        <div class="alert alert-danger" role="alert" >
                                        {{ session('error') }}
                                        </div>
                                    @endif

                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-school
                        "></i>
                        <span >établissements<span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('colleges.index') }}">Colléges</a></li>
                        <li><a href="{{ route('lycees.index') }}">  Lycée</a></li>
                        <li><a href="{{ route('piloteslycee.index') }}">Colléges techniques </a></li>
                        <li><a href="{{ route('pilotes.index') }}">Etablissement pilote</a></li>
                    </ul>
                </li>

                <li>
            
                    <a href=" {{ route('Besoin_mat_par_etab') }}" class=" waves-effect">
                        <i class="mdi mdi-calendar-text"></i>
                        <span>Gestion des besoins</span>
                    </a>
                </li>
                <li> 
                 
                
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="mdi mdi-calendar-check"></i>
                    <span > E   nseignants<span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('enseignants.index') }}">Liste des enseignants </a></li>

                </ul>
                </li>
              

               
  
               

              
             

             
           
                
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->