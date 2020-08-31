@extends('layouts.master')

@section('title') Tableau de bord @endsection
@section('css')

<!-- DataTables -->
<link href="{{ URL::asset('/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
<!-- Sweet Alert-->
<link href="{{ URL::asset('/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />
    
@endsection
@section('content')

    @component('common-components.breadcrumb')
         @slot('title')  tableau de bord   @endslot
         @slot('li_1') statistiques @endslot
     @endcomponent
     
    
     
     

     <div class="row">

<div class="col-12">

<input type="hidden" value="{{csrf_token()}}" id="token"/>
                        {!! csrf_field() !!}

<div class="card">
        <div class="card-body">
        
<!--         <table id="datatable"     class="table table-bordered table-hover" cellspacing="0">
 -->
            <table id="datatable" name="datatable"    class="table table-bordered table-hover" cellspacing="0" >
                
                <thead>
                    <tr>
                        <th> المعرف الوحيد</th>
                        <th>الإسم </th>
                        <th>اللقب</th>
                       <th> الرتبة الحالية</th>
                       <th>  المادة المطلوبة   </th>
                       <th> المؤسسة التربوية التي يعمل بها المدرس  </th>
                       <th>  الوثائق المطلوبة </th>
                       <th><i class="dripicons-toggles"></i></th>
                    </tr>
                </thead>
               
                <tbody>
            @foreach($data as $row)
                                <tr>
                        <td>{{  $row->id}}    </td>
                        <td> {{  $row->prenom}} </td>
                        <td> {{  $row->nom}} </td>
                        <td>{{  $row->gradeact}}  </td>
                        <td>{{$row->matiere}} </td>
                        <td> {{  $row->etabact}} </td>
                       <td><a href="{{ route('path',$row->id) }}"> <button>Download PDF</button> </a></td>
                        <td> <!-- ['id' => $row->id, 'path' => $row->copybid] -->
           
            
            <a class="btn btn-primary" href="{{ route('enseignants.etatmv',$row->id) }}" >مقبول  <i class="bx bx-edit-alt" ></i> </a>
            <a class="btn btn-danger waves-effect waves-light sa-params" href="{{ route('enseignants.annulermv',$row->id) }}" >مرفوض  <i class="bx bx-edit-alt" ></i> </a>
            @csrf
            @method('DELETE')
            <button  type="button" class="btn btn-danger waves-effect remove-user sa-params"  onclick="deletemvv({{ $row->id }},this)" data-url= "/enseignants/deletemv/" data-id="{{ $row->prenom }}" ><i class="far fa-trash-alt"></i></button>
          <!--   <button type="submit"   class="btn btn-danger waves-effect waves-light sa-params">حذف </button> -->

          

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

<!-- Required datatable js -->
<!-- Sweet Alerts js -->
<script src="{{ URL::asset('/libs/sweetalert2/sweetalert2.min.js')}}"></script>

<!-- Required datatable js -->
<script src="{{ URL::asset('/libs/datatables/datatables.min.js')}}"></script>
    <script src="{{ URL::asset('/libs/jszip/jszip.min.js')}}"></script>
    <!-- Datatable init js -->
    <script src="{{ URL::asset('/js/pages/datatables.init.js')}}"></script>

<script src="{{asset('js/main.js')}}" type="text/javascript"></script>
@endsection