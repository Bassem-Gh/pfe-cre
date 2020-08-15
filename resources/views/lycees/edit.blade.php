

@extends('layouts.master')

@section('title') Gestion des besoins @endsection


@section('content')

    @component('common-components.breadcrumb')
         @slot('title') Gestion des besoins  @endslot
         @slot('li_1') Pages  @endslot
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
  <div class="card">
<div class="card-body">
  @foreach($data as $college)
  <form method="post" action="{{ route('lycees.update', $college->id) }}">
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
</div>
</div>


@stop