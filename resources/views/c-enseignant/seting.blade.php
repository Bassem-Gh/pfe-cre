@extends('layouts.master-layouts')

@section('title') Compte Enseignant @endsection
@section('css')

<!-- DataTables -->
<link href="{{ URL::asset('/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />

@endsection
@section('content')
<br><br>



<div class="row">
 <div class="col-md-12 ">
  <br />
  <div class="col-xs-12 col-sm-12 col-md-12 text-center">
  <h3> تعديل المعلومات الشخصية</h3>
  </div>
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
                                <form method="post" action="">
   @csrf
   @method('PATCH')
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>رقم الضمان الاجتماعي :</strong>
                                @foreach ($data as $row)
                                <input type="text" id="unique_id" name="unique_id" class="form-control" value="{{ $row->sec_s }}" >
                                @endforeach
                            </div>
                      </div>  

                      <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>  الاسم باللاتينية:</strong>
                                @foreach ($data as $row)
                                <input type="text" id="nom_fr" name="nom_fr" class="form-control" value=" {{ $row->nom_fr }}" >
                                @endforeach
                            </div>
                      </div>  

                      <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>اللقب  باللاتينية:</strong>
                                @foreach ($data as $row)
                                <input type="text" id="prenom_fr" name="prenom_fr" class="form-control" value=" {{ $row->prenom_fr }}" >
                                @endforeach
                            </div>
                      </div>  

                      <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>البريد الالكتروني :</strong>
                               
                                <input type="text" id="email" name="email" class="form-control" value=" {{ Auth::user()->email }}" >
                            </div>
                      </div>  


                      <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>عدد الأطفال :</strong>
                                @foreach ($data as $row)
                                <input type="text" id="nbr_enf" name="nbr_enf" class="form-control" value="  {{ $row->nbr_enf }}" >
                                @endforeach
                            </div>
                      </div>  
                      
                      <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>تاريخ الميلاد:</strong>
                                @foreach ($data as $row)
                                <input type="text" id="date_n" name="date_n" class="form-control" value="  {{ $row->date_n }}" >
                                @endforeach
                            </div>
                      </div>  

                      <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>مكان الميلاد:</strong>
                                @foreach ($data as $row)
                                <input type="text" id="lieu_n" name="lieu_n" class="form-control" value=" {{ $row->lieu_n }}" >
                                @endforeach
                            </div>
                      </div>  

                      <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>الاسم  :</strong>
                                @foreach ($data as $row)
                                <input type="text" id="nom" name="nom" class="form-control" value="{{ $row->nom }}" >
                                @endforeach
                            </div>
                      </div>  

                      <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>اللقب  :</strong>
                                @foreach ($data as $row)
                                <input type="text" id="prenom" name="prenom" class="form-control" value="{{ $row->prenom }}" >
                                @endforeach
                            </div>
                      </div>  
                            
                            
                      <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>رقم الهاتف :</strong>
                                @foreach ($data as $row)
                                <input type="text" id="telephone" name="telephone" class="form-control" value=" {{ $row->telephone }}" >
                                @endforeach
                            </div>
                      </div>  
                              

                      <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>الحالة الاجتماعية :</strong>
                                @foreach ($data as $row)
                                <input type="text" id="situation_f" name="situation_f" class="form-control" value=" {{ $row->situation_f }}" >
                                @endforeach
                            </div>
                      </div>  

                      <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>الجنس :</strong>
                                @foreach ($data as $row)
                                <input type="text" id="sexe" name="sexe" class="form-control" value=" {{ $row->sexe }}" >
                                @endforeach
                            </div>
                      </div> 
                        
                      <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>العنوان :</strong>
                                @foreach ($data as $row)
                                <input type="text" id="sexe" name="sexe" class="form-control" value="{{ $row->adresse }}" >
                                @endforeach
                            </div>
                      </div> 
                              



                      <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <input type="submit" class="btn btn-primary" value="تعديل" />
                             </div>     

                        </div>

                        </div>

                        </div>
                        </div>
            
</div>

</div>


@endsection
@section('script')

<!-- Required datatable js -->
<script src="{{ URL::asset('/libs/datatables/datatables.min.js')}}"></script>
<script src="{{ URL::asset('/libs/bootstrap-editable/bootstrap-editable.min.js')}}"></script>

<script src="{{ URL::asset('/js/pages/table-editable.int.js')}}"></script>
@endsection