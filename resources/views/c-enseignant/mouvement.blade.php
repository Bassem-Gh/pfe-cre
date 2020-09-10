
@extends('layouts.master-layouts')

@section('title') Gestion des besoins @endsection

@section('content')

  
     
    
     

   
<div class="row">

<input type="hidden" value="{{csrf_token()}}" id="token"/>
                        {!! csrf_field() !!}

    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
        <br><br><br>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center"> <h2> مطلب نقلة  </h2></div>
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
<form id="f" action="{{ url('/insert_mouvement') }}" method="POST" enctype="multipart/form-data">
    @csrf
  
    <div class="row">
<table boder="0">
<tr><td><br>
<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong> مادة التدريس   </strong>
            
           <!--  <select id='matiere' name='matiere' onchange='getetab_user()'>
                <option value="0" selected="true"> اختر المادة   </option>
                @foreach($data2 as $row2)
                <option value=" {{ $row2->codemat }} ">  {{ $row2->libmat }} </option>
                @endforeach
               </select> -->

           
               <select id='matiere' name='matiere' >
               @foreach($data4 as $row4)
               <option value=" {{ $row4->codemat }} ">  {{ $row4->libmat }} </option>
              @endforeach
              </select>
            </div>
        </div>
   
 </td>
 <td><br>
    <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong> المعرف الوحيد</strong>
                <input type="text" id="unique_id" name="unique_id" class="form-control" value="{{ Auth::user()->unique_id }}" readonly>
            </div>
        </div>  
</td></tr>
<tr><td><br>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>   الإسم</strong>
                <input onclick="testm2()" type="text" name="prenom" class="form-control" placeholder="">
            </div>
        </div> 
</td>
<td><br>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>   اللقب</strong>
                <input type="text" name="nom" class="form-control" placeholder="" onchange='getetab_user()'>
            </div>
        </div>
</td></tr><br>
       
      <tr><td>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong> تاريخ  الولادة  </strong>
                <input type="date" name="date_ns" class="form-control" placeholder="">
            </div>
        </div>
</td><td><br>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>   مكانها</strong>
                <input type="text" name="lieu" class="form-control" placeholder="">
            </div>
        </div>
        </td>
      <td>
      <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>   الولاية</strong>
                <input type="text" name="gouvernorat" class="form-control" placeholder="">
            </div>
        </div>
        </td>
        <td><br>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>   الهاتف</strong>
                <input type="text" name="tel" class="form-control" placeholder="">
            </div>
        </div>
        </td></tr>

<tr><td><br>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>مقر الإقامة خلال السنة الدراسية--- المدينة أو القرية  </strong>
                <input type="text" name="residencey" class="form-control" placeholder="">
            </div>
        </div>
        </td></tr>
<!---->
<tr><td><br>
<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
           
                <strong>الحالة المدنية  </strong>
             
                <select id='etatm' name='etatm' >
                <option value="0" selected="true"> اختر الحالة   </option>
              
                <option value="أعزب"> أعزب </option>
                <option value="متزوج"> متزوج </option>
                <option value="مطلق"> مطلق </option>
                <option value="أرمل"> أرمل </option>
                
               </select>
            </div>
        </div>

</td></tr>
<tr><td><br>


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>اسم القرين و لقبه </strong>
                <input type="text" name="nomp_f" class="form-control" placeholder="">
            </div>
        </div>
</td>
<td><br>
        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>  مهنته  </strong>
                <input type="text" name="professionf" class="form-control" placeholder="">
            </div>
        </div>

</td>
<td><br>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong>(مقر عمله (المدينة أو القرية  </strong>
                <input type="text" name="residencetf" class="form-control" placeholder="">
            </div>
        </div>
</td></tr>
<tr><td><br>
           
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong>المراكز المطلوبة داخل المندوبية الجهوية للتربية  </strong>
            <select id='etab_post_dis' name='etab_post_dis'>
               
               
               </select>
            </div>
        </div>
        </td>
        </tr>
        <tr><td>
        <br><br>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong>عدد الأطفال في الكفالة   </strong>
            @foreach($data4 as $row4)
            <input type="number" id="nbrenfant" name="nbrenfant" class="form-control" value="{{ $row4->nbr_enf}}" readonly>
            @endforeach
            </div>
        </div>
        </td><td>
        <div class="col-xs-12 col-sm-12 col-md-12">
           
          
            <strong>هل هناك من يملك إعاقة من الأطفال ؟</strong>
            <td ><br>نعم<input type="radio" name="obstructionenf" value="نعم"></td>
            <td ><br>لا<input type="radio" name="obstructionenf" value="لا"></td>
            
        </div>
        </td></tr>
        <tr><td> 
        <strong>هل هناك من يملك إعاقة من الأبوين ؟</strong>
            <td ><br>نعم<input type="radio" name="obstructionp" value="نعم"></td>
            <td ><br>لا<input type="radio" name="obstructionp" value="لا"></td>
        </td></tr>
</table>
<!-- 
       
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong>تاريخ مباشرته للعمل بالمكان المذكور  </strong>
                <input type="date" name="datetf" class="form-control" placeholder="">
            </div>
        </div> -->

       <table boder="0">
       <tr><td><br>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong> تاريخ الإنتداب للتدريس بالمدارس الإعدادية و المعاهد  </strong>
                <input type="date" id="daterecrutement" name="daterecrutement" class="form-control" placeholder="">
            </div>
        </div>
        </td>
        <td><br>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong> تاريخ  الترسيم  </strong>
                <input type="date" id="datedemarcation" name="datedemarcation" class="form-control" placeholder="">
            </div>
        </div>
        </td>
        </tr>

      <tr>
      <td><br>الصفة</td><td width=5%>مترسم<input type="radio" name="etats" value="مترسم"></td> 
      <td width=25%><br>مترسم/1 س<input type="radio" name="etats" value="متربص/1 س"></td>
      <td width=25%><br>مترسم/2 س<input type="radio" name="etats" value="متربص/2 س"></td>
      <td width=40%><br>مترسم/3 س<input type="radio" name="etats" value="متربص/3 س"></td>
      </tr>

        <tr>
        <td>
        <br>

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
          
        </td>
      <td>
      <br>
      <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong>تاريخ المباشرة بالمؤسسة التربوية الحالية   </strong>
            <input type="date" id="datedebut" name="datedebut" class="form-control" placeholder="">
            </div>
        </div>
      </td></tr>
<tr><td>
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
</td>
<td>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong>آخر عدد بيداغوجي  </strong>
            <input type="number"  min="0" max="20" step="any"  id="notebid" name="notebid" class="form-control" placeholder="">
            </div>
        </div>
</td><td>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong>تاريخ الحصول عليه   </strong>
            <input type="date" name="datenotebid" class="form-control" placeholder="">
            </div>
        </div>
</td></tr>

</table>
<br><br>

<strong> ملخص للحالة الإنسانية  </strong>
<textarea cols="120" rows="10" name="decription" value=""></textarea>


       <div class="col-xs-12 col-sm-12 col-md-12">
       <br><br><br><br>
       <strong> الوثائق المطلوبة </strong>
<br><br>
            </div>

<table border="0">
<tr>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong>نسخة من آخر تقرير بيداغوجي </strong>
            <input type="file" id="copybid" name="copybid" placeholder="">
            </div>
        </div>
        <br>
</tr><tr>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong>نسخة من عقد زواج </strong>
            <input type="file" id="copymariage" name="copymariage" placeholder="">
            </div>
        </div><br>
</tr><tr>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong> مظامين ولادة الأطفال في الكفالة  </strong>
            <input type="file" id="mathmoun" name="mathmoun" placeholder="">
            </div>
        </div><br>
</tr><tr>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong>تصريح  على الشرف  بالبناء ممضى من قبل المدرس (بالنسبة الى الذين ليس لهم أطفال) </strong>
            <input type="file" id="tasrih" name="tasrih" placeholder="">
            </div>
        </div><br>
</tr><tr>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong> شهادة عمل القرين أو نسخة من بطاقة  الانخراط في الصندوق الوطني</strong>
            <input type="file" id="copysec" name="copysec" placeholder="">
            </div>
        </div><br>
</tr><tr>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong> شهادة اقامة المترشح خلال السنة الدراسية</strong>
            <input type="file" id="copyikama" name="copyikama" placeholder="">
            </div>
        </div> 
</tr></table>
   
</form>

        
<div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button  class="btn btn-primary">إضافة</button>  
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