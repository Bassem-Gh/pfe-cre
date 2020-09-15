@extends('layouts.master')

@section('title') Gestion des besoins @endsection
@section('css')

<!-- DataTables -->
<link href="{{ URL::asset('/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />

@endsection
@section('content')

    @component('common-components.breadcrumb')
         @slot('title') الأساتذة  @endslot
         @slot('li_1') قائمة الأساتذة   @endslot
     @endcomponent
     
    
     @yield('cont')
     <div class="card">
          <div class="card-body">
     <section class="content-header">
     <h1>
     <a class="btn btn-success" href="{{ route('create_enseignant') }}"> إضافة أستاذ جديد</a>
     </h1>
   
   </section>

   <!-- Main content -->
   <section class="content">
   
     <div class="row">
       <div class="col-xs-12 ">
         <div class="box box-primary">
         <div class="box-header with-border">
              <h3 class="box-title">قائمة الأساتذة</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
           <!-- /.box-header -->
           <div class="box-body">
              
             <table id="data" class="table table-bordered table-hover" cellspacing="0">
               <thead>
               <tr>
                 <th>المعرف الوحيد</th>
                 <th>الاسم</th>
                 <th>اللقب</th>
                 <th> المادة التي يدرسها الأستاذ</th>
                 <th>رقم الهاتف</th>
                 <th>الجنس</th>
                   <th>الرتبة</th>

                   <th>التحكم</th>


                   </tr>
               </thead>
               @foreach($data as $row)
             <tr>
             <td>{{$row->unique_id}}</td>
             <td>{{$row->nom}}</td>
             <td>{{$row->prenom}}</td>
             <td>{{$row->libmat}}</td>
             <td>{{$row->telephone}}</td>
             <td>{{$row->sexe}}</td>
             <td>{{$row->libgrade}}</td>
             <td> <form action="{{ route('enseignants.destroy',$row->id) }}" method="POST">
   
              <a class="btn btn-primary" href=" {{ route('editenseignant',$row->id) }}">تعديل</a>

              @csrf
              @method('DELETE')

            <button type="submit" class="btn btn-danger">حذف</button>
          </form></td>
              </tr>
              @endforeach
             </table>
           </div>

           <!-- /.box-body -->
         </div>
         <!-- /.box -->

       </div>
       <!-- /.col -->
     </div>
     <!-- /.row -->
   </section>

   </div>
       <!-- /.col -->
     </div>

@endsection
@section('script')

<!-- Required datatable js -->
<script src="{{ URL::asset('/libs/datatables/datatables.min.js')}}"></script>
<script src="{{ URL::asset('/libs/bootstrap-editable/bootstrap-editable.min.js')}}"></script>

<script src="{{ URL::asset('/js/pages/table-editable.int.js')}}"></script>
@endsection
