
@extends('layouts.master')

@section('title') Gestion des besoins @endsection

@section('content')

    @component('common-components.breadcrumb')
         @slot('title') Gestion des besoins  @endslot
         @slot('li_1') Pages  @endslot
     @endcomponent
     
    
     

   
<div class="row">

<input type="hidden" value="{{csrf_token()}}" id="token"/>
                        {!! csrf_field() !!}

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
<form id="f" action="{{ route('c-enseignant.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
  
    <div class="row">

    <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong> المعرف الوحيد</strong>
                <input type="text" id="unique_id" name="unique_id" class="form-control" placeholder="">
            </div>
        </div>  

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>   الإسم</strong>
                <input type="text" name="prenom" class="form-control" placeholder="">
            </div>
        </div> 

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>   اللقب</strong>
                <input type="text" name="nom" class="form-control" placeholder="">
            </div>
        </div>

        <br><br><br><br>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
           
                <strong>الرتبة الحالية </strong>
             
                <select id='gradeact' name='gradeact' >
                <option value="0" selected="true"> اختر الرتبة   </option>
                @foreach($data3 as $row3)
                <option value=" {{ $row3->libgrade }}  ">  {{ $row3->libgrade }} </option>
                @endforeach
               </select>
            </div>
        </div>

        <br><br>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong> تاريخ بناء الزواج  </strong>
                <input type="date" name="date_mr" class="form-control" placeholder="">
            </div>
        </div>
<br><br><br><br>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong> المؤسسة التربوية التي يعمل بها المدرس  </strong>

                <select id="etabact" name="etabact">
                <option value="0" selected="true"> المؤسسة التربوية التي يعمل بها المدرس </option>
                @foreach($data as $row)
               
                <option value='{{ $row->libetab }} ' > {{ $row->libetab }} </option>
                
                   @endforeach
               </select>
                
            </div>
        </div>
<br><br>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>مقر الإقامة خلال السنة الدراسية--- المدينة أو القرية  </strong>
                <input type="text" name="residencey" class="form-control" placeholder="">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>اسم القرين و لقبه </strong>
                <input type="text" name="nomp_f" class="form-control" placeholder="">
            </div>
        </div>


        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>  مهنته  </strong>
                <input type="text" name="professionf" class="form-control" placeholder="">
            </div>
        </div>

       
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong>(مقر عمله (المدينة أو القرية  </strong>
                <input type="text" name="residencetf" class="form-control" placeholder="">
            </div>
        </div>


       
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong>تاريخ مباشرته للعمل بالمكان المذكور  </strong>
                <input type="date" name="datetf" class="form-control" placeholder="">
            </div>
        </div>

       
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong> تاريخ الإنتداب للتدريس بالمدارس الإعدادية و المعاهد  </strong>
                <input type="date" id="daterecrutement" name="daterecrutement" class="form-control" placeholder="">
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
            <input type="number" name="year" class="form-control" placeholder="">
            أشهر
            <input type="number" name="month" class="form-control" placeholder="">
            ايام
            <input type="number" name="day" class="form-control" placeholder="">

            </div>
        </div>
      


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong>آخر عدد بيداغوجي  </strong>
            <input type="number"  min="0" max="20" step="any"  id="notebid" name="notebid" class="form-control" placeholder="">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong>تاريخ الحصول عليه   </strong>
            <input type="date" name="datenotebid" class="form-control" placeholder="">
            </div>
        </div>

        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong>عدد الأطفال في الكفالة   </strong>
            <input type="text" id="nbrenfant" name="nbrenfant" class="form-control" placeholder="">
            </div>
        </div>

          
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong>تاريخ المباشرة بالمؤسسة التربوية الحالية   </strong>
            <input type="date" id="datedebut" name="datedebut" class="form-control" placeholder="">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong>المادة المطلوبة   </strong>
            
            <select id='matiere' name='matiere' onchange='getetab_user()'>
                <option value="0" selected="true"> اختر المادة   </option>
                @foreach($data2 as $row2)
                <option value=" {{ $row2->codemat }} ">  {{ $row2->libmat }} </option>
                @endforeach
               </select>
            </div>
        </div>

   
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong>المراكز المطلوبة داخل المندوبية الجهوية للتربية  </strong>
            <select id='etab_post_dis' name='etab_post_dis'>
               
               
               </select>
            </div>
        </div>
<!------- -------->

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong>نسخة من آخر تقرير بيداغوجي </strong>
            <input type="file" id="copybid" name="copybid" placeholder="">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong>نسخة من عقد زواج </strong>
            <input type="file" id="copymariage" name="copymariage" placeholder="">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong> مظامين ولادة الأطفال في الكفالة  </strong>
            <input type="file" id="mathmoun" name="mathmoun" placeholder="">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong>تصريح  على الشرف  بالبناء ممضى من قبل المدرس (بالنسبة الى الذين ليس لهم أطفال) </strong>
            <input type="file" id="tasrih" name="tasrih" placeholder="">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong> شهادة عمل القرين أو نسخة من بطاقة  الانخراط في الصندوق الوطني</strong>
            <input type="file" id="copysec" name="copysec" placeholder="">
            </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong> شهادة اقامة المترشح خلال السنة الدراسية</strong>
            <input type="file" id="copyikama" name="copyikama" placeholder="">
            </div>
        </div>

    </div>
   
</form>

        
<div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button onclick="testm()" class="btn btn-primary">إضافة</button>  
        </div>

</div>
    </div>
@endsection
@section('script')

<!-- Required datatable js -->
<script src="{{ URL::asset('/libs/datatables/datatables.min.js')}}"></script>
<script src="{{ URL::asset('/libs/bootstrap-editable/bootstrap-editable.min.js')}}"></script> 
<script src="{{asset('js/main.js')}}" type="text/javascript"></script>
<script src="{{ URL::asset('/js/pages/table-editable.int.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
@endsection