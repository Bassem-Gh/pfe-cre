
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
                        <option>--الرجاءالتحديد--</option>
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
            <div class="form-group">
                <select name='s'>
                    <label for="example-text-input" class="col-md-2 col-form-label"></label> 
                </select>
                <label for="example-text-input" class="col-md-2 col-form-label">نوع المدرسة</label>
                <input type="text" name="typeetab" class="form-control" placeholder="typeetab">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>delegation etab</strong>
                <input type="text" name="delegation" class="form-control" placeholder="delegation">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>dre etab</strong>
                <input type="text" name="dre" class="form-control" placeholder="dre">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>code etab</strong>
                <input type="text" name="codeetab" class="form-control" placeholder="codeetab">
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