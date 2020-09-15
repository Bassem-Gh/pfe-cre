
@extends('layouts.master-layouts')

@section('title') Gestion des besoins @endsection

@section('content')


     @section('css')
   <link href="{{URL::asset('/libs/dropzone/dropzone.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

    
     

   
<div class="row">

<input type="hidden" value="{{csrf_token()}}" id="token"/>
                        {!! csrf_field() !!}

    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
        <br><br><br>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center"> <h2> مطلب نقلة في نطاق تقريب الأزواج</h2></div>
        </div>
       
    </div>
</div>

   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>خطأ!</strong> يرجى تعمير كل الخانات.<br><br>
      
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
               
                <input type="number" id="unique_id" name="unique_id" value="{{ Auth::user()->unique_id }}" class="form-control" readonly>
        
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
              
                <select id='gradeact' name='gradeact' class="form-control select2" >
                                    @foreach($data4 as $row4)
                                    <option value=" {{ $row4->libgrade }} ">  {{ $row4->libgrade }} </option>
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

                <select id="etabact" name="etabact" class="form-control select2">
                <option value="0" selected="true">-- المؤسسة التربوية التي يعمل بها المدرس -- </option>
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
            @foreach($data4 as $row4)
            <input type="number" id="nbrenfant" name="nbrenfant" class="form-control" value="{{ $row4->nbr_enf}}" readonly>
            @endforeach
            </div>
        </div>

          
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong>تاريخ المباشرة بالمؤسسة التربوية الحالية   </strong>
            <input type="date" id="datedebut" name="datedebut" class="form-control" placeholder=""  onchange='getetab_user()'>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong>المادة المطلوبة   </strong>
            
         
            <select id='matiere' name='matiere' class="form-control select2" >
               @foreach($data4 as $row4)
               <option value=" {{ $row4->codemat }} ">  {{ $row4->libmat }} </option>
              @endforeach
              </select>
               
            </div>
        </div>

   
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong>المراكز المطلوبة داخل المندوبية الجهوية للتربية  </strong>
            <select id='etab_post_dis' name='etab_post_dis' class="form-control select2">
               
               
               </select>
            </div>
        </div>
<!------- -------->

<div class="col-xs-12 col-sm-12 col-md-12">
       <br><br>
       <strong> الوثائق المطلوبة </strong>
<br><br>
            </div>

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

      
            <input type="file" id="copyikama" name="copyikama" >
           

            </div>
        </div>

    </div>
   
</form>
                  
              


        <br><br>
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
<script src="http://qovex-v-rtl.laravel.themesbrand.com/libs/dropzone/dropzone.min.js"></script>
<script src="{{URL::asset('/libs/dropzone/dropzone.min.js')}}"></script>

@endsection