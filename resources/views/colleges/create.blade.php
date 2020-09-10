
@extends('layouts.master')

@section('title') Gestion des besoins @endsection

@section('content')

    @component('common-components.breadcrumb')
         @slot('title') College  @endslot
         @slot('li_1') ajouter un collège  @endslot
     @endcomponent
     
    
     
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
        <div class="col-xs-12 col-sm-12 col-md-12 text-center"> <h2>إضافة مؤسسة</h2></div>
        </div>
       
    </div>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>خطأ!</strong> يرجى تعمير كل الخانات <br><br>
      <!--   <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul> -->
    </div>
@endif

@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif

<div class="card">
<div class="card-body">
<form action="{{ route('colleges.store') }}" method="POST">
    @csrf
  
    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group row">
                <label for="example-text-input" class="col-md-2 col-form-label">اسم المؤسسة </label>
                <div class="col-md-10">
                <input type="text" name="nameetab" class="form-control" placeholder="اسم المؤسسة">
            </div>
            </div>
        </div>

        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group row">
            <label for="example-text-input" class="col-md-2 col-form-label">فئة</label>
                <div class="col-md-10">
                    <select name="categorie" class="form-control select2">
                        <option value="">--الرجاءالتحديد--</option>
                            <option value="أ">أ </option>
                            <option value="ب">ب</option>
                            <option value="ج">ج</option>
                        </>
                    </select>
                </div>
            </div>
        </div>
        
      {{--    <label for="example-text-input" class="col-md-2 col-form-label"></label>  --}}


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group row">
            
                    <label for="example-text-input" class="col-md-2 col-form-label">نوع المؤسسة</label> 
               
                    <div class="col-md-10">
                    <select name="typeetab" class="form-control select2">
                        <option value="">--الرجاءالتحديد--</option>
                            <option value="10">معهد</option>
                            <option value="20">مدرسة إعدادية </option>
                            <option value="30">مدرسة إعدادية تقنية</option>
                            <option value="40">مدرسة إعدادية نموذجية</option>
                            <option value="50">معهد نموذجي</option>
                       
                    </select>
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group row">
            
                    <label for="example-text-input" class="col-md-2 col-form-label">المعتمدية</label> 
               
                    <div class="col-md-10">
                    <select name="delegation" class="form-control select2">
                        <option value="">--الرجاءالتحديد--</option>
                            <option value="911">نابل</option>
                            <option value="912">دار شعبان الفهري </option>
                            <option value="913">قربة</option>
                            <option value="914">بني خلاد</option>
                            <option value="915">الميدة</option>
                            <option value="916">منزل تميم</option>
                            <option value="917">قليبية</option>
                            <option value="918">حمام الغزاز</option>
                            <option value="919">الهوارية</option>
                            <option value="920">منزل بوزلفة</option>
                            <option value="921">سليمان</option>
                            <option value="922">تاكلسة</option>
                            <option value="923">قرمبالية</option>
                            <option value="924">بوعرقوب</option>
                            <option value="925">بني خيار</option>
                            <option value="926">الحمامات</option>
                    </select>
                </div>
            </div>
        </div>
    

       {{--   <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>dre etab</strong>
                <input type="text" name="dre" class="form-control" placeholder="dre">
            </div>
        </div>  --}}

      
        

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group row">
                    <label for="example-text-input" class="col-md-2 col-form-label">رمز المؤسسة </label>
                    <div class="col-md-10">
                    <input type="number" name="codeetab" class="form-control" placeholder="رمز المؤسسة">
                </div>
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