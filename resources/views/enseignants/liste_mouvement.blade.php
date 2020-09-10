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
                       <th> المؤسسة التربوية التي يعمل بها المدرس </th>
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
                       <td> 
                            <table boeder="0"> <tr><td>
                                    <a href="{{ route('path',$row->id) }}">
    
                                  <button type="button" class="btn btn-light waves-effect">
                        <i class="fas fa-file-download fa-lg"></i>   نسخة من آخر تقرير بيداغوجي
                    </button></a>
                                    </td></tr>

                                    <tr><td> <a href="{{ route('copyikama',$row->id) }}">  <button type="button" class="btn btn-light waves-effect">
                        <i class="fas fa-file-download fa-lg"></i> نسخة من شهادة الإقامة 
  </button> </a></td></tr>

                                    <tr><td> <a href="{{ route('pathm',$row->id) }}">
                                     <button type="button" class="btn btn-light waves-effect">
                        <i class="fas fa-file-download fa-lg"></i> نسخة من عقد الزواج</button>
                                      </a></td></tr>

                                    <tr><td> <a href="{{ route('mathmoun',$row->id) }}"> 
                                  
                                    <button type="button" class="btn btn-light waves-effect">
                        <i class="fas fa-file-download fa-lg"></i> مضامين</button> 
                                    </a></td></tr>

                                    <tr><td> <a href="{{ route('tasrih',$row->id) }}"> 
                                    <button type="button" class="btn btn-light waves-effect">
                        <i class="fas fa-file-download fa-lg"></i> تصريح على الشرف بالبناء</button> 
                                    </a></td></tr>

                                    <tr><td> <a href="{{ route('copysec',$row->id) }}"> 
                        
                                    <button type="button" class="btn btn-light waves-effect">
                        <i class="fas fa-file-download fa-lg"></i> شهادة عمل القرين أو نسخة من بطاقة الانخراط في الصندوق الوطني</button>
                                     </a></td></tr>
                            </table>
                       </td>
                        <td> 
           
            
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
                
                 
                <tbody>
            @foreach($data2 as $row2)
                                <tr>
                        <td>{{  $row2->id}}    </td>
                        <td> {{  $row2->prenom}} </td>
                        <td> {{  $row2->nom}} </td>
                        <td>{{  $row2->gradeact}}  </td>
                        <td>{{$row2->matiere}} </td>
                        <td> {{  $row2->etabact}} </td>
                       <td> 
                            <table boeder="0"> <tr><td>
                                    <a href="{{ route('path2',$row2->id) }}">
    
                                  <button type="button" class="btn btn-light waves-effect">
                        <i class="fas fa-file-download fa-lg"></i>   نسخة من آخر تقرير بيداغوجي
                    </button></a>
                                    </td></tr>

                                    <tr><td> <a href="{{ route('copyikama2',$row2->id) }}">  <button type="button" class="btn btn-light waves-effect">
                        <i class="fas fa-file-download fa-lg"></i> نسخة من شهادة الإقامة 
  </button> </a></td></tr>

                                    <tr><td> <a href="{{ route('pathm2',$row2->id) }}">
                                     <button type="button" class="btn btn-light waves-effect">
                        <i class="fas fa-file-download fa-lg"></i> نسخة من عقد الزواج</button>
                                      </a></td></tr>

                                    <tr><td> <a href="{{ route('mathmoun2',$row2->id) }}"> 
                                  
                                    <button type="button" class="btn btn-light waves-effect">
                        <i class="fas fa-file-download fa-lg"></i> مضامين</button> 
                                    </a></td></tr>

                                    <tr><td> <a href="{{ route('tasrih2',$row2->id) }}"> 
                                    <button type="button" class="btn btn-light waves-effect">
                        <i class="fas fa-file-download fa-lg"></i> تصريح على الشرف بالبناء</button> 
                                    </a></td></tr>

                                    <tr><td> <a href="{{ route('copysec2',$row2->id) }}"> 
                        
                                    <button type="button" class="btn btn-light waves-effect">
                        <i class="fas fa-file-download fa-lg"></i> شهادة عمل القرين أو نسخة من بطاقة الانخراط في الصندوق الوطني</button>
                                     </a></td></tr>
                            </table>
                       </td>
                        <td> 
           
            
            <a class="btn btn-primary" href="{{ route('enseignants.etatmv2',$row2->id) }}" >مقبول  <i class="bx bx-edit-alt" ></i> </a>
            <a class="btn btn-danger waves-effect waves-light sa-params" href="{{ route('enseignants.annulermv2',$row2->id) }}" >مرفوض  <i class="bx bx-edit-alt" ></i> </a>
            @csrf
            @method('DELETE')
            <button  type="button" class="btn btn-danger waves-effect remove-user sa-params"  onclick="deletemvv({{ $row2->id }},this)" data-url= "/enseignants/deletemv2/" data-id="{{ $row2->prenom }}" ><i class="far fa-trash-alt"></i></button>
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