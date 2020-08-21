
@extends('layouts.master')

@section('title') établissements @endsection
@section('css')

    <!-- DataTables -->
    <link href="{{ URL::asset('/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />

@endsection

@section('content')

    @component('common-components.breadcrumb')
         @slot('title') établissements  @endslot
         @slot('li_1') College  @endslot
         
     @endcomponent
 
    
     
     

                    <div class="row">
                        <div class="col-12">
                        <table   class="col-xs-12 col-sm-12 col-md-12 text-center"  border="0">
                                <tr><td>
                                    <button   type="button" class="btn btn-outline-primary  waves-effect waves-light" href="{{ route('create_college') }}" >
                                         <i class="mdi mdi-domain-plus "></i><br>إضافة مؤسسة جديدة</button>
                              </td><td>  
                             
                                    <button    class="btn btn-outline-primary   waves-effect waves-light" href=" {{ url('saisie_classe_college') }}">
                                        <i class="mdi mdi-google-classroom"></i><br> إضافة قسم </button>
                            </td></tr>
                                </table>
                                <br>
                        <div class="card">
                                <div class="card-body">
                                
                                   

                                    <table id="datatable"     class="table table-bordered dt-responsive  nowrap dataTable no-footer dtr-inline collapsed" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        
                                        <thead>
                                            <tr>
                                                <th>المؤسسة التربوية</th>
                                                <th>رمزالمؤسسة</th>
                                                <th><i class="dripicons-toggles"></i></th>
                                               
                                            </tr>
                                        </thead>
                                       
                                        <tbody>
                                        @foreach($data ?? '' as $row)
                                        <tr>
        <td>  {{ $row->libetab }} </td>
            <td> <a  href="{{ route('colleges.show',$row->id) }}">{{ $row->id }}</a></td>
            <td>  <form action="{{ route('colleges.destroy',$row->id) }}" method="POST">
   
                    
    
   <a class="btn btn-primary" href="{{ route('editcollege',$row->id) }}" >تعديل</a>

   @csrf
   @method('DELETE')

   <button type="submit" class="btn btn-danger">حذف</button>
</form></td>
           
          
        </tr>
                   @endforeach                       
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->


    @endsection
    @section('script')


    <!-- Required datatable js -->
    <script src="{{ URL::asset('/libs/datatables/datatables.min.js')}}"></script>
    <script src="{{ URL::asset('/libs/jszip/jszip.min.js')}}"></script>
    <script src="{{ URL::asset('/libs/pdfmake/pdfmake.min.js')}}"></script>

    <!-- Datatable init js -->
    <script src="{{ URL::asset('/js/pages/datatables.init.js')}}"></script>

@endsection
