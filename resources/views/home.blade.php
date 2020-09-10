@extends('layouts.master-layouts')

@section('title') Compte Enseignant @endsection
@section('css')

<!-- DataTables -->
<link href="{{ URL::asset('/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />

@endsection
@section('content')
<br><br>
<div class="row">
<div class="col-md-9">
<h3 class="box-title">المعلومات الشخصية</h3>
<div class="card">
<div class="card-body">
                <div class="box box-primary">
                    <div class="box-header with-border">

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>

                    <div class="box-body" style="font-size: larger">

                        <div class="row">

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>رقم الضمان الاجتماعي :</strong>
                                @foreach ($data as $row)
                                <input type="text" id="unique_id" name="unique_id" class="form-control" value="{{ $row->sec_s }}" readonly>
                                @endforeach
                            </div>
                      </div>  

                      <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>  الاسم باللاتينية:</strong>
                                @foreach ($data as $row)
                                <input type="text" id="nom_fr" name="nom_fr" class="form-control" value=" {{ $row->nom_fr }}" readonly>
                                @endforeach
                            </div>
                      </div>  

                      <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>اللقب  باللاتينية:</strong>
                                @foreach ($data as $row)
                                <input type="text" id="prenom_fr" name="prenom_fr" class="form-control" value=" {{ $row->prenom_fr }}" readonly>
                                @endforeach
                            </div>
                      </div>  

                      <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>البريد الالكتروني :</strong>
                               
                                <input type="text" id="email" name="email" class="form-control" value=" {{ Auth::user()->email }}" readonly>
                            </div>
                      </div>  


                      <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>عدد الأطفال :</strong>
                                @foreach ($data as $row)
                                <input type="text" id="nbr_enf" name="nbr_enf" class="form-control" value="  {{ $row->nbr_enf }}" readonly>
                                @endforeach
                            </div>
                      </div>  
                      
                      <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>تاريخ الميلاد:</strong>
                                @foreach ($data as $row)
                                <input type="text" id="date_n" name="date_n" class="form-control" value="  {{ $row->date_n }}" readonly>
                                @endforeach
                            </div>
                      </div>  

                      <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>مكان الميلاد:</strong>
                                @foreach ($data as $row)
                                <input type="text" id="lieu_n" name="lieu_n" class="form-control" value=" {{ $row->lieu_n }}" readonly>
                                @endforeach
                            </div>
                      </div>  

                      <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>الاسم  :</strong>
                                @foreach ($data as $row)
                                <input type="text" id="nom" name="nom" class="form-control" value="{{ $row->nom }}" readonly>
                                @endforeach
                            </div>
                      </div>  

                      <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>اللقب  :</strong>
                                @foreach ($data as $row)
                                <input type="text" id="prenom" name="prenom" class="form-control" value="{{ $row->prenom }}" readonly>
                                @endforeach
                            </div>
                      </div>  
                            
                            
                      <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>رقم الهاتف :</strong>
                                @foreach ($data as $row)
                                <input type="text" id="telephone" name="telephone" class="form-control" value=" {{ $row->telephone }}" readonly>
                                @endforeach
                            </div>
                      </div>  
                              

                      <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>الحالة الاجتماعية :</strong>
                                @foreach ($data as $row)
                                <input type="text" id="situation_f" name="situation_f" class="form-control" value=" {{ $row->situation_f }}" readonly>
                                @endforeach
                            </div>
                      </div>  

                      <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>الجنس :</strong>
                                @foreach ($data as $row)
                                <input type="text" id="sexe" name="sexe" class="form-control" value=" {{ $row->sexe }}" readonly>
                                @endforeach
                            </div>
                      </div> 
                        
                      <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>العنوان :</strong>
                                @foreach ($data as $row)
                                <input type="text" id="sexe" name="sexe" class="form-control" value="{{ $row->adresse }}" readonly>
                                @endforeach
                            </div>
                      </div> 
                              



                           

                        </div>

                        </div>

                        </div>
                        </div>
            </div>
</div>


 <!-- Profile Image -->
 <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">الصورة الشخصية</h3>

                    </div>
                    <div class="box-body box-profile">
                        <img class="avatar-lg mx-auto img-thumbnail rounded-circle" src="/images/users/avatar.png"  alt="User profile picture">
                        <div class="online-circle"><i class="fas fa-circle text-success"></i></div>
                     @foreach ($data as $row)
                        <h3 class="profile-username text-center"> {{ $row->nom }} {{ $row->prenom }} </h3>
                    @endforeach
                            
                  
                           <!-- <div class="">
                                                <img src="/images/users/avatar-2.jpg" alt="" class="avatar-lg mx-auto img-thumbnail rounded-circle">
                                                <div class="online-circle"><i class="fas fa-circle text-success"></i></div>
                                            </div>-->
                  


                    </div>


                </div>

@endsection
@section('script')

<!-- Required datatable js -->
<script src="{{ URL::asset('/libs/datatables/datatables.min.js')}}"></script>
<script src="{{ URL::asset('/libs/bootstrap-editable/bootstrap-editable.min.js')}}"></script>

<script src="{{ URL::asset('/js/pages/table-editable.int.js')}}"></script>
@endsection