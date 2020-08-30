
@extends('layouts.master')

@section('title') établissements @endsection
@section('css')
    <!-- Sweet Alert-->
    <link href="{{ URL::asset('/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- DataTables -->
    <link href="{{ URL::asset('/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')

    @component('common-components.breadcrumb')
         @slot('title') établissements  @endslot
         @slot('li_1') College  @endslot
         
     @endcomponent
 
    

    
                    <div class="row">
                        <input type="hidden" value="{{csrf_token()}}" id="token"/>
                        {!! csrf_field() !!}

                        
                          <div class="col-12">
                        <table   class="col-xs-12 col-sm-12 col-md-12 text-center"  border="0">
                                <tr><td>
                                    <a  class="btn btn-outline-primary  waves-effect waves-light" href="{{ route('create_lycee') }}" >
                                         <i class="mdi mdi-domain-plus "></i><br>إضافة مؤسسة جديدة</a>
                              </td><td>  

                             
                            </td></tr>
                                </table>
                                <br>
                        <div class="card">
                                <div class="card-body">
                                    <table id="datatable" class="table table-bordered dt-responsive table-striped  nowrap  no-footer dtr-inline collapsed" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        
                                        <thead>
                                            <tr>
                                                <th>المؤسسة التربوية</th>
                                                <th>رمزالمؤسسة </th>
                                                <th><i class="dripicons-toggles"></i></th>
                                               
                                            </tr>
                                        </thead>
                                       
                                        <tbody id="tbody">
                                        @foreach($data ?? '' as $row)
                                        <tr>

        <td class="nomcell" >  {{ $row->libetab }}  </td>
            <td> {{ $row->id }}</td>

            <td> 
 
            </div>
        </div>
    </div>
                <button class="btn btn-primary" onclick="editRow({{ $row->id }},this)" data-url= "/colleges/update/" data-name="{{ $row->libetab }}" > <i class="bx bx-edit-alt" ></i></button>
                       
                    @method('DELETE')
                   @csrf
                    


                <button  type="button" class="btn btn-danger waves-effect remove-user sa-params"  onclick="deleteRow({{ $row->id }},this)" data-url= "/colleges/deletecollege/" data-id="{{ $row->libetab }}" ><i class="far fa-trash-alt"></i></button>
              



            
        </td>


        

    
          
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


    <script src="/js/main.js"></script>
    <!-- Required datatable js -->
    <script src="{{ URL::asset('/libs/datatables/datatables.min.js')}}"></script>
    <script src="{{ URL::asset('/libs/jszip/jszip.min.js')}}"></script>
    <!-- Datatable init js -->
    <script src="{{ URL::asset('/js/pages/datatables.init.js')}}"></script>
    <!-- Sweet Alerts js -->
    <script src="{{ URL::asset('/libs/sweetalert2/sweetalert2.min.js')}}"></script>        
@endsection
