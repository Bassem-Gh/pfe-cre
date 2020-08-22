
@extends('layouts.master')

@section('title') Gestion des besoins @endsection

@section('content')

    @component('common-components.breadcrumb')
         @slot('title') Gestion des besoins  @endslot
         @slot('li_1') Pages  @endslot
     @endcomponent
     
    
     

   
<div class="row">
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


<div class="card">
<div class="card-body">
<form action="{{ route('colleges.store') }}" method="POST">
    @csrf
  
    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>   الإسم</strong>
                <input type="text" name="nameetab" class="form-control" placeholder="">
            </div>
        </div> 
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>   اللقب</strong>
                <input type="text" name="nameetab" class="form-control" placeholder="">
            </div>
        </div>

        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>الرتبة الحالية </strong>
                <input type="text" name="categorie" class="form-control" placeholder="">
            </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong> تاريخ بناء الزواج  </strong>
                <input type="date" name="typeetab" class="form-control" placeholder="">
            </div>
        </div>
<br><br><br><br>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong> المؤسسة التربوية التي يعمل بها المدرس  </strong>

                <select id="mat">
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
                <input type="text" name="dre" class="form-control" placeholder="">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>اسم القرين و لقبه </strong>
                <input type="text" name="codeetab" class="form-control" placeholder="">
            </div>
        </div>


        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>  مهنته  </strong>
                <input type="text" name="codeetab" class="form-control" placeholder="">
            </div>
        </div>

       
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong>(مقر عمله (المدينة أو القرية  </strong>
                <input type="text" name="codeetab" class="form-control" placeholder="">
            </div>
        </div>


       
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong>تاريخ مباشرته للعمل بالمكان المذكور  </strong>
                <input type="date" name="codeetab" class="form-control" placeholder="">
            </div>
        </div>

       
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong> تاريخ الإنتداب للتدريس بالمدارس الإعدادية و المعاهد  </strong>
                <input type="date" name="codeetab" class="form-control" placeholder="">
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
            <input type="text" name="codeetab" class="form-control" placeholder="">
            أشهر
            <input type="text" name="codeetab" class="form-control" placeholder="">
            ايام
            <input type="text" name="codeetab" class="form-control" placeholder="">

            </div>
        </div>
      

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong>تاريخ الحصول عليه   </strong>
            <input type="date" name="codeetab" class="form-control" placeholder="">
            </div>
        </div>

        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong>عدد الأطفال في الكفالة   </strong>
            <input type="text" name="codeetab" class="form-control" placeholder="">
            </div>
        </div>

          
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong>تاريخ المباشرة بالمؤسسة التربوية   </strong>
            <input type="date" name="codeetab" class="form-control" placeholder="">
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