<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div class="h-100">

        <div class="user-wid text-center py-4">
            <div class="user-img">
                <img src="/images/users/avatar.png" alt="" class="avatar-md mx-auto rounded-circle">
            </div>

            <div class="mt-3">

                <a href="#" class="text-dark font-weight-medium font-size-16">{{ Auth::user()->name }}</a>
                <p class="text-body mt-1 mb-0 font-size-13">المدير</p>

            </div>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">القائمة</li>

                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="mdi mdi-airplay"></i><span class="badge badge-pill badge-info float-right"></span>
                    <span>لوحة القيادة</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">

                        <li><a href=" {{ route ('index') }}">الإحصائيات</a></li>

                        
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
                        <span >المؤسسات<span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('colleges.index') }}">المدرسة الإعدادية</a></li>
                        <li><a href="{{ route('lycees.index') }}">  معهد</a></li>
                        <li><a href="{{ route('piloteslycee.index') }}">المدرسة الإعدادية التقنية </a></li>
                        <li><a href="{{ route('pilotes.index') }}">المؤسسات النموذجية</a></li>
                       
                            <li><a href="{{ route('create_college') }}">إضافة مؤسسة </a></li>
                    </ul>
                </li>

                
                <li><a href="{{ url('/lycees/saisie_classe_lycee') }}"><i class="far fa-users-class"></i>
                إدارة الأقسام</a></li>
              
                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="mdi mdi-calendar-text"></i><span class="badge badge-pill badge-info float-right"></span>
                    <span>حساب الحاجيات </span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">

                        <li><a href="  {{ route('Besoin_mat_par_etab') }}">حسب المؤسسة </a></li>
                    </ul>
                    <ul class="sub-menu" aria-expanded="false">

                        <li><a href="  {{ route('Besoin_mat_par_mat') }}">حسب المادة </a></li>
                    </ul>
               
            
                 
                
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="mdi mdi-calendar-check"></i>
                    <span > الأساتذة<span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('enseignants.index') }}">قائمة الأساتذة </a></li>
                
  
                    <li><a href="{{ route('enseignants.liste_mouvement') }}">قائمة طلبات النقلة</a></li>
                </ul>
                </li>
              

               
  
               

              
             

             
           
                
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->