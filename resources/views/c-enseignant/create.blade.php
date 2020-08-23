
@extends('layouts.master')

@section('title') Gestion des besoins @endsection

@section('content')

    @component('common-components.breadcrumb')
         @slot('title') Gestion des besoins  @endslot
         @slot('li_1') Pages  @endslot
     @endcomponent
     
    
     

   
<div class="row">
<script src="{{asset('js/main.js')}}" type="text/javascript"></script>
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
        <div class="col-xs-12 col-sm-12 col-md-12 text-center"> <h2> مطلب نقلة في نطاق تقريب الأزواج</h2></div>
        </div>
       
    </div>
</div>

   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{!! csrf_field() !!}

<div class="card">
<div class="card-body">
<form action="{{ route('colleges.store') }}" method="POST">
    @csrf
  
    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>   الإسم</strong>
                <input type="text" name="name" class="form-control" placeholder="">
            </div>
        </div> 
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>   اللقب</strong>
                <input type="text" name="prenom" class="form-control" placeholder="">
            </div>
        </div>

        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>الرتبة الحالية </strong>
                <input type="rang" name="categorie" class="form-control" placeholder="">
            </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong> تاريخ بناء الزواج  </strong>
                <input type="date_mariage" name="typeetab" class="form-control" placeholder="">
            </div>
        </div>
<br><br><br><br>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong> المؤسسة التربوية التي يعمل بها المدرس  </strong>

                <select id="etab_act">
                <option value="0" selected="true"> المؤسسة التربوية التي يعمل بها المدرس </option>
                @foreach($data as $row)
               
                <option value='{{ $row->id}}' > {{ $row->libetab }} </option>
                
                   @endforeach
               </select>
                
            </div>
        </div>
<br><br>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>(مقر الإقامة خلال السنة الدراسية (المدينة أو القرية  </strong>
                <input type="text" name="lieu_habit" class="form-control" placeholder="">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>اسم القرين و لقبه </strong>
                <input type="text" name="nom_prenomf" class="form-control" placeholder="">
            </div>
        </div>


        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>  مهنته  </strong>
                <input type="text" name="profession" class="form-control" placeholder="">
            </div>
        </div>

       
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong>(مقر عمله (المدينة أو القرية  </strong>
                <input type="text" name="lieu_trav" class="form-control" placeholder="">
            </div>
        </div>


       
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong>تاريخ مباشرته للعمل بالمكان المذكور  </strong>
                <input type="date" name="date_trav" class="form-control" placeholder="">
            </div>
        </div>

       
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong> تاريخ الإنتداب للتدريس بالمدارس الإعدادية و المعاهد  </strong>
                <input type="date" name="date_depart" class="form-control" placeholder="">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong> مدة الإنقطاعات  </strong>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            سنوات
            <input type="text" name="annee" class="form-control" placeholder="">
            أشهر
            <input type="text" name="mois" class="form-control" placeholder="">
            ايام
            <input type="text" name="jour" class="form-control" placeholder="">

            </div>
        </div>
      


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong>آخر عدد بيداغوجي  </strong>
            <input type="text" name="note_pid" class="form-control" placeholder="">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong>تاريخ الحصول عليه   </strong>
            <input type="date" name="date" class="form-control" placeholder="">
            </div>
        </div>

        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong>عدد الأطفال في الكفالة   </strong>
            <input type="text" name="nbr_enfant" class="form-control" placeholder="">
            </div>
        </div>

          
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong>تاريخ المباشرة بالمؤسسة التربوية الحالية   </strong>
            <input type="date" name="codeetab" class="form-control" placeholder="">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong>المادة المطلوبة   </strong>
            <select id='matiere' name='matiere' onchange='getetab_user()'>
                <option value="0" selected="true"> اختر المادة   </option>
                @foreach($data2 as $row2)
                <option value=" {{ $row2->codemat}} ">  {{ $row2->libmat }} </option>
                @endforeach
               </select>
            </div>
        </div>

   
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong>المراكز المطلوبة داخل المندوبية الجهوية للتربية  </strong>
            <select id='postedisp' name='postedisp'>
               
               
               </select>
            </div>
        </div>


        
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">إضافة</button>
        </div>
    </div>
   
</form>
</div>
    </div>
@endsection
@section('script')

<!-- Required datatable js -->
<script src="{{ URL::asset('/libs/datatables/datatables.min.js')}}"></script>
<script src="{{ URL::asset('/libs/bootstrap-editable/bootstrap-editable.min.js')}}"></script> 

<script src="{{ URL::asset('/js/pages/table-editable.int.js')}}"></script>
@endsection