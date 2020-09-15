@extends('layouts.master')

@section('title') Tableau de bord @endsection
@section('css')

<!-- DataTables -->
<link href="{{ URL::asset('/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />

@endsection
@section('content')

    @component('common-components.breadcrumb')
         @slot('title') لوحة القيادة   @endslot
         @slot('li_1') الإحصائيات @endslot
     @endcomponent
     
    
     

   
     <div class="row">
             <div class="col-xl-3">
                            
    
     
                    @component('common-components.dashboard-widget')
                    
                        @slot('title') مجموع الأساتذة   @endslot
                        @slot('iconClass') mdi mdi-account-multiple-outline  @endslot
                        
                        @slot('price') {{ $data2 }}  @endslot
                        @slot('percentage')    @endslot
                        @slot('pClass')   @endslot
                        @slot('pValue')    @endslot
                        
                    @endcomponent
 
               </div>

               <div class="col-xl-3">
                            
    
     
                    @component('common-components.dashboard-widget')
                    
                        @slot('title') مجموع الأساتذة المسجلين   @endslot
                        @slot('iconClass') mdi mdi-account-multiple-outline  @endslot
                        
                        @slot('price') {{ $data }} @endslot
                        @slot('percentage')    @endslot
                        @slot('pClass')    @endslot
                        @slot('pValue')   @endslot
                        
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
                                                          
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="py-3">
                                                            <p class="mb-1 text-truncate"><i class="mdi mdi-circle danger mr-1"></i>الإناث</p>
                                                            
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