
@extends('layouts.master')

@section('title') Gestion des besoins @endsection
@section('css')
<link href="{{ URL::asset('/css/bootstrap.min.css')}}" id="bootstrap-light" rel="stylesheet" type="text/css" />
        <link href="{{ URL::asset('/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ URL::asset('/css/app-rtl.min.css')}}" id="app-rtl" rel="stylesheet" type="text/css" />
<link href="{{ asset('css/app.css') }}" rel="stylesheet">

@endsection
@section('script')
<script src="{{ asset('js/app.min.js') }}" defer></script>
<script src="{{ URL::asset('/js/app.min.js')}}"></script>

@endsection

@section('content')

    @component('common-components.breadcrumb')
         @slot('title') Gestion des besoins  @endslot
         @slot('li_1') Pages  @endslot
     @endcomponent
     
     @component('common-components.menu2')
     @endcomponent

<div class="row">
 <div class="col-md-12">
  <br />
  <h3>Edit Record</h3>
  <br />
  @if(count($errors) > 0)

  <div class="alert alert-danger">
         <ul>
         @foreach($errors->all() as $error)
          <li>{{$error}}</li>
         @endforeach
         </ul>
  @endif

  @foreach($data as $college)
  <form method="post" action="{{ route('colleges.update', $college->id) }}">
   @csrf
   @method('PATCH')

   <div class="form-group">
  
    <strong>Id etablissement:</strong>
       {{$college->id}}
   </div>


  
   <div class="form-group">
              
   <input type="text" name="nameetab" class="form-control" value="{{$college->libetab}}" placeholder="name product" />  
   
   </div>

    @endforeach
   <div class="form-group">
    <input type="submit" class="btn btn-primary" value="تعديل" />
   </div>
  </form>
 </div>
</div>

@endsection