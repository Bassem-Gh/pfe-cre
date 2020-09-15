@extends('layouts.master')

@section('title') Tableau de bord @endsection
@section('css')

<!-- DataTables -->
<link href="{{ URL::asset('/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />

@endsection
@section('content')

    @component('common-components.breadcrumb')
         @slot('title')  tableau de bord   @endslot
         @slot('li_1') statistiques @endslot
     @endcomponent
     
    
     

   
     <div class="row">
             <div class="col-xl-3">
                            
    
     
                    @component('common-components.dashboard-widget')
                    
                        @slot('title') New Enseignants  @endslot
                        @slot('iconClass') mdi mdi-account-multiple-outline  @endslot
                        
                        @slot('price') {{ $data }}  @endslot
                        @slot('percentage') 0.16%   @endslot
                        @slot('pClass') progress-bar bg-success   @endslot
                        @slot('pValue') 62   @endslot
                        
                    @endcomponent
 
               </div>
               <div class="col-xl-5">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-4"> احصائيات الأساتذة حسب الجنس</h4>

                                    <div class="row align-items-center">
                                        <div class="">
                                            <div id="donut-chart" class="apex-charts"></div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="py-3">
                                                            <p class="mb-1 text-truncate"><i class="mdi mdi-circle text-primary mr-1"></i> الذكور</p>
                                                            <h5>$ 8,8</h5>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="py-3">
                                                            <p class="mb-1 text-truncate"><i class="mdi mdi-circle text-success mr-1"></i>الإناث</p>
                                                            <h5>$ 2,284</h5>
                                                        </div>
                                                    </div>
                                                   
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
     </div> 
                    <!-- end row -->  
                    
     <div class="row">
                       
                        </div>
   

@endsection
@section('script')

<!-- Required datatable js -->
<script src="{{ URL::asset('/libs/datatables/datatables.min.js')}}"></script>
<script src="{{ URL::asset('/libs/bootstrap-editable/bootstrap-editable.min.js')}}"></script>

<script src="{{ URL::asset('/js/pages/table-editable.int.js')}}"></script>

  <!-- plugin js -->
  <script src="{{ URL::asset('libs/apexcharts/apexcharts.min.js')}}"></script>
        

        
        <!-- Calendar init -->
        <script src="{{ URL::asset('js/pages/dashboard.init.js')}}"></script>
@endsection