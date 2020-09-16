

@extends('layouts.master-layouts')

@section('title') Gestion des besoins @endsection

@section('content')


     @section('css')
   <link href="{{URL::asset('/libs/dropzone/dropzone.min.css')}}" rel="stylesheet" type="text/css" />
  
@endsection

    
<br><br>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
            <h1 class="text-center">مطلب نقلة في الحالات الإنسانية    </h1>
            <br>
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>خطأ!</strong> يرجى تعمير كل الخانات.<br><br>
      
    </div>
@endif
@if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif 
                {!! csrf_field() !!}
                <form id="form-horizontal2" class="form-horizontal form-wizard-wrapper" action="{{ url('/insert_mouvement') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <h3>المعلومات الشخصية</h3>
                    <fieldset>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="txtFirstNameBilling" class="col-lg-3 col-form-label"> المعرف الوحيد</label>
                                    <div class="col-lg-9">
                                    <input type="number" id="unique_id" name="unique_id" value="{{ Auth::user()->unique_id }}" class="form-control" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="txtLastNameBilling" class="col-lg-3 col-form-label">   الإسم</label>
                                    <div class="col-lg-9">
                                    <input type="text" name="prenom" class="form-control" placeholder="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="txtCompanyBilling" class="col-lg-3 col-form-label"> اللقب</label>
                                    <div class="col-lg-9">
                                    <input type="text" name="nom" class="form-control" placeholder=""  onchange='getetab_user()'>
                                    </div>
                                </div>
                            </div>
                         
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="txtAddress1Billing" class="col-lg-3 col-form-label"> تاريخ  الولادة  </label>
                                    <div class="col-lg-9">
                                    <input type="date" name="date_ns" class="form-control" placeholder="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                        <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="txtCityBilling" class="col-lg-3 col-form-label">مكانها</label>
                                    <div class="col-lg-9">
                                    <input type="text" name="lieu" class="form-control" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="txtFaxBilling" class="col-lg-3 col-form-label"> الولاية</label>
                                    <div class="col-lg-9">
                                    <input type="text" name="gouvernorat" class="form-control" placeholder="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                       
                          <div class="col-md-6">
                         <div class="form-group row"> 
                                    <label for="txtCityBilling" class="col-lg-3 col-form-label"> الهاتف</label>
                                    <div class="col-lg-9">
                                          <input type="text" name="tel" class="form-control" placeholder="">
                                  </div>   
                                </div> 
                            </div>
                        
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="txtFaxBilling" class="col-lg-3 col-form-label"> مقر الإقامة خلال السنة الدراسية--- المدينة أو القرية </label>
                                    <div class="col-lg-9">
                                    <input type="text" name="residencey" class="form-control" placeholder="">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="txtCityBilling" class="col-lg-3 col-form-label"> الحالة المدنية </label>
                                    <div class="col-lg-9">
                                        <select id='etatm' name='etatm' >
                                                <option value="0" selected="true"> اختر الحالة   </option>
                                            
                                                <option value="أعزب"> أعزب </option>
                                                <option value="متزوج"> متزوج </option>
                                                <option value="مطلق"> مطلق </option>
                                                <option value="أرمل"> أرمل </option>
                                                
                                            </select>
                                    </div>
                                    
                                </div>
                            </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="txtFaxBilling" class="col-lg-3 col-form-label">عدد الأطفال في الكفالة   </label>
                                        <div class="col-lg-9">
                                            @foreach($data4 as $row4)
                                            <input type="number" id="nbrenfant" name="nbrenfant" class="form-control" value="{{ $row4->nbr_enf}}" readonly>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                        </div>
                     

                        <div class="row">
                            
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="txtCityBilling" class="col-lg-3 col-form-label">هل هناك من يملك إعاقة من الأطفال ؟ </label>
                                    <div class="col-lg-9">
                                            نعم<input type="radio" name="obstructionenf" value="نعم">
                                            لا<input type="radio" name="obstructionenf" value="لا">
                                     </div>
                                 </div>
                            </div>
                           

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="txtFaxBilling" class="col-lg-3 col-form-label">هل هناك من يملك إعاقة من الأبوين ؟  </label>
                                        <div class="col-lg-9">
                                        نعم<input type="radio" name="obstructionp" value="نعم">
                                    
                                       لا<input type="radio" name="obstructionp" value="لا">
                                        </div>
                                    </div>
                                </div>
                        </div>

                        <div class="row">
                         <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="txtFaxBilling" class="col-lg-3 col-form-label"> مادة التدريس  </label>
                                        <div class="col-lg-9">
                                            <select id='matiere' name='matiere' >
                                                @foreach($data4 as $row4)
                                                <option value=" {{ $row4->codemat }} ">  {{ $row4->libmat }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                        </div>

                    </fieldset>
                    <h3>معلومات القرين</h3>
                    <fieldset>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="txtFirstNameShipping" class="col-lg-3 col-form-label">اسم القرين و لقبه </label>
                                    <div class="col-lg-9">
                                    <input type="text" name="nomp_f" class="form-control" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="txtLastNameShipping" class="col-lg-3 col-form-label">مهنته</label>
                                    <div class="col-lg-9">
                                    <input type="text" name="professionf" class="form-control" placeholder="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="txtCompanyShipping" class="col-lg-3 col-form-label">(مقر عمله (المدينة أو القرية  </label>
                                    <div class="col-lg-9">
                                    <input type="text" name="residencetf" class="form-control" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="txtEmailAddressShipping" class="col-lg-3 col-form-label">تاريخ مباشرته للعمل بالمكان المذكور </label>
                                    <div class="col-lg-9">
                                    <input type="date" name="datetf" class="form-control" placeholder="">
                                    </div>
                                </div>
                            </div>
                        </div>

                      
                    </fieldset>
                    <h3>المعلومات الإدارية</h3>
                    <fieldset>
                    <div class="row">

<div class="col-md-6">
        <div class="form-group row">
            <label for="txtEmailAddressBilling" class="col-lg-3 col-form-label">المراكز المطلوبة داخل المندوبية الجهوية للتربية</label>
            <div class="col-lg-9">
              
            <select id='etab_post_dis' name='etab_post_dis'>
         </select>
            </div>
            
        </div>
    </div>

<div class="col-md-6">
        <div class="form-group row">
            <label for="txtStateProvinceBilling" class="col-lg-3 col-form-label"> تاريخ الإنتداب للتدريس بالمدارس الإعدادية و المعاهد </label>
            <div class="col-lg-9">
            <input type="date" id="daterecrutement" name="daterecrutement" class="form-control" placeholder="">
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group row">
            <label for="ddlCreditCardType" class="col-lg-3 col-form-label">  تاريخ  الترسيم </label>
            <div class="col-lg-9">
            <input type="date" id="datedemarcation" name="datedemarcation" class="form-control" placeholder="">
            </div>
        </div>
        
    </div>
    
    <div class="col-md-6">
        <div class="form-group row">
            <label for="txtAddress2Billing" class="col-lg-3 col-form-label"> الصفة</label>
            <div class="col-lg-9">
            مترسم<input type="radio" name="etats" value="مترسم">
            متربص/1 س<input type="radio" name="etats" value="متربص/1 س">
            متربص/2 س<input type="radio" name="etats" value="متربص/2 س">
            متربص/3 س<input type="radio" name="etats" value="متربص/3 س">
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group row">
            <label for="txtCreditCardNumber" class="col-lg-3 col-form-label">المؤسسة التربوية التي يعمل بها المدرس  </label>
            <div class="col-lg-9">
           
                    <select id="etabact" name="etabact">
                    <option value="0" selected="true"> المؤسسة التربوية التي يعمل بها المدرس </option>
                    @foreach($data as $row)
                
                    <option value='{{ $row->libetab }} ' > {{ $row->libetab }} </option>
                    
                    @endforeach
                </select>

            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group row">
            <label for="txtCardVerificationNumber" class="col-lg-3 col-form-label">تاريخ المباشرة بالمؤسسة التربوية الحالية  </label>
            <div class="col-lg-9">
            <input type="date" id="datedebut" name="datedebut" class="form-control" placeholder="">
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group row">
            <label for="txtExpirationDate" class="col-lg-3 col-form-label">الرتبة الحالية</label>
            <div class="col-lg-9">
           
            <select id='gradeact' name='gradeact' >
            <option value="0" selected="true"> اختر الرتبة   </option>
            @foreach($data3 as $row3)
            <option value=" {{ $row3->libgrade }}  ">  {{ $row3->libgrade }} </option>
            @endforeach
        </select>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group row">
            <label for="txtExpirationDate" class="col-lg-3 col-form-label">آخر عدد بيداغوجي   </label>
            <div class="col-lg-9">
         
            <input type="number"  min="0" max="20" step="any"  id="notebid" name="notebid" class="form-control" placeholder="">
            </div>
        </div>
    </div>

</div>
<div class="row">
<div class="col-md-6">
        <div class="form-group row">
            <label for="txtExpirationDate" class="col-lg-3 col-form-label">تاريخ الحصول عليه  </label>
            <div class="col-lg-9">
            <input type="date" name="datenotebid" class="form-control" placeholder="">
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group row">
            <label for="txtExpirationDate" class="col-lg-3 col-form-label"> ملخص للحالة الإنسانية  </label>
            <div class="col-lg-9">
            <textarea cols="50" rows="10" name="decription" value=""></textarea>
            </div>
        </div>
    </div>


</div>
                    </fieldset>
                    <h3>الوثائق المطلوبة</h3>
                    <fieldset>
                         <table class="table table-striped" border="0"> 
                        <tr><td>
                        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong>نسخة من آخر تقرير بيداغوجي </strong></td><td>
            <input type="file" id="copybid" name="copybid" placeholder="">
            </div>
        </div></td></tr>
<tr><td>
<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong>نسخة من عقد زواج </strong></td><td><input type="file" id="copymariage" name="copymariage" placeholder="">
            </div>
        </div></td></tr>


<tr><td>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong> مظامين ولادة الأطفال في الكفالة  </strong></td>
<td>    <input type="file" id="mathmoun" name="mathmoun" placeholder="">
            </div>
        </div></td></tr>


        <tr><td>  <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong>تصريح  على الشرف  بالبناء ممضى من قبل المدرس (بالنسبة الى الذين ليس لهم أطفال) </strong></td>
        <td>
            <input type="file" id="tasrih" name="tasrih" placeholder="">
            </div>
        </div></td></tr>

        <tr><td>  <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong> شهادة عمل القرين أو نسخة من بطاقة  الانخراط في الصندوق الوطني</strong></td>
        <td>
       <input type="file" id="copysec" name="copysec" placeholder="">
      </div>
  </div>
</td></tr>

        <tr><td>  <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong> شهادة اقامة المترشح خلال السنة الدراسية</strong></td>
        <td> <input type="file" id="copyikama" name="copyikama" >
            </div>
        </div></td></tr>

       
</table>  



                    </fieldset>
                    
                </form>

            </div>
        </div>
    </div>
</div>
<!-- end row -->

@endsection

@section('script')

<!-- form wizard -->
<script src="{{URL::asset('/libs/jquery-steps/jquery-steps.min.js')}}"></script>
<!-- form wizard init -->
<script src="{{URL::asset('/js/pages/form-wizard.init.js')}}"></script>

<!-- Required datatable js -->
<script src="{{ URL::asset('/libs/datatables/datatables.min.js')}}"></script>
<script src="{{ URL::asset('/libs/bootstrap-editable/bootstrap-editable.min.js')}}"></script> 
<script src="{{asset('js/main.js')}}" type="text/javascript"></script>
<script src="{{ URL::asset('/js/pages/table-editable.int.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script src="http://qovex-v-rtl.laravel.themesbrand.com/libs/dropzone/dropzone.min.js"></script>
<script src="{{URL::asset('/libs/dropzone/dropzone.min.js')}}"></script>



@endsection