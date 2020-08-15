
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
<form action="{{ route('piloteslycee.store') }}" method="POST">
    @csrf
  
    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong> : اسم المؤسسة</strong>
                <input type="text" name="nameetab" class="form-control" placeholder="nom">
            </div>
        </div>

        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>categorie :</strong>
                <input type="text" name="categorie" class="form-control" placeholder="categorie">
            </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>type etab</strong>
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