@extends('layouts.master-layouts')

@section('title') Tableau de bord @endsection
@section('css')

<!-- DataTables -->
<link href="{{ URL::asset('/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />

@endsection
@section('content')
<div> <br><br><br>      </div> 
<div class="row">
    <div class="col-md-12 col-xl-3">
            <div class="card">
                                <div class="card-body">
                                    <div class="profile-widgets py-3">

                                        <div class="text-center">
                                            <div class="">
                                                <img src="/images/users/avatar.png" alt="" class="avatar-lg mx-auto img-thumbnail rounded-circle">
                                                <div class="online-circle"><i class="fas fa-circle text-success"></i></div>
                                            </div>

                                            <div class="mt-3 ">
                                                <a href="#" class="text-dark font-weight-medium font-size-16">
                                                @foreach ($data as $row)
                                                        <h3 class="profile-username text-center"> {{ $row->nom }} {{ $row->prenom }} </h3>
                                                 @endforeach
                                                 </a>
                                                

                                               
                                            </div>

                                            

                                           <!--  <div class="mt-4">

                                                <ui class="list-inline social-source-list">
                                                    <li class="list-inline-item">
                                                        <div class="avatar-xs">
                                                            <span class="avatar-title rounded-circle">
                                                                    <i class="mdi mdi-facebook"></i>
                                                                </span>
                                                        </div>
                                                    </li>

                                                    <li class="list-inline-item">
                                                        <div class="avatar-xs">
                                                            <span class="avatar-title rounded-circle bg-info">
                                                                    <i class="mdi mdi-twitter"></i>
                                                                </span>
                                                        </div>
                                                    </li>

                                                    <li class="list-inline-item">
                                                        <div class="avatar-xs">
                                                            <span class="avatar-title rounded-circle bg-danger">
                                                                <i class="mdi mdi-google-plus"></i>
                                                            </span>
                                                        </div>
                                                    </li>

                                                    <li class="list-inline-item">
                                                        <div class="avatar-xs">
                                                            <span class="avatar-title rounded-circle bg-pink">
                                                                <i class="mdi mdi-instagram"></i>
                                                            </span>
                                                        </div>
                                                    </li>
                                                </ui>

                                            </div> -->
                                        </div>

                                    </div>
                                </div>
                            </div>
                   </div>



                   <!-- <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-4">Projects</h4>
         -->
                          <!--  <div class="row"> -->
<div class="col-md-9">

<div class="card">
<div class="card-body">
<div class="row">
                        <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="txtEmailAddressBilling" class="col-lg-3 col-form-label">رقم الضمان الاجتماعي </label>
                                    <div class="col-lg-9">
                                    @foreach ($data as $row)
                                        <input type="text" id="unique_id" name="unique_id" class="form-control" value="{{ $row->sec_s }}" readonly>
                                        @endforeach

                                    </div>
                                    
                                </div>
                            </div>
                        <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="txtStateProvinceBilling" class="col-lg-3 col-form-label"> الاسم باللاتينية</label>
                                    <div class="col-lg-9">
                                    @foreach ($data as $row)
                                <input type="text" id="nom_fr" name="nom_fr" class="form-control" value=" {{ $row->nom_fr }}" readonly>
                                @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="ddlCreditCardType" class="col-lg-3 col-form-label"> اللقب  باللاتينية </label>
                                    <div class="col-lg-9">
                                         <div class="form-group">
                                         @foreach ($data as $row)
                                <input type="text" id="prenom_fr" name="prenom_fr" class="form-control" value=" {{ $row->prenom_fr }}" readonly>
                                @endforeach
                                            </div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="txtAddress2Billing" class="col-lg-3 col-form-label">البريد الالكتروني </label>
                                    <div class="col-lg-9">
                                    <input type="text" id="email" name="email" class="form-control" value=" {{ Auth::user()->email }}" readonly>
                                      
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="txtCreditCardNumber" class="col-lg-3 col-form-label">عدد الأطفال  </label>
                                    <div class="col-lg-9">
                                    @foreach ($data as $row)
                                <input type="text" id="nbr_enf" name="nbr_enf" class="form-control" value="  {{ $row->nbr_enf }}" readonly>
                                @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="txtCardVerificationNumber" class="col-lg-3 col-form-label">تاريخ الميلاد </label>
                                    <div class="col-lg-9">
                                    @foreach ($data as $row)
                                <input type="text" id="date_n" name="date_n" class="form-control" value="  {{ $row->date_n }}" readonly>
                                @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="txtExpirationDate" class="col-lg-3 col-form-label">مكان الميلاد </label>
                                    <div class="col-lg-9">
                                    @foreach ($data as $row)
                                <input type="text" id="lieu_n" name="lieu_n" class="form-control" value=" {{ $row->lieu_n }}" readonly>
                                @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="txtExpirationDate" class="col-lg-3 col-form-label">الاسم  </label>
                                    <div class="col-lg-9">
                                 
                                    @foreach ($data as $row)
                                <input type="text" id="nom" name="nom" class="form-control" value="{{ $row->nom }}" readonly>
                                @endforeach
                                    </div>
                                </div>
                            </div>

                        </div>
                   <div class="row">
                        <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="txtExpirationDate" class="col-lg-3 col-form-label">اللقب</label>
                                    <div class="col-lg-9">
                                 
                                    @foreach ($data as $row)
                                <input type="text" id="prenom" name="prenom" class="form-control" value="{{ $row->prenom }}" readonly>
                                @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="txtExpirationDate" class="col-lg-3 col-form-label">رقم الهاتف </label>
                                    <div class="col-lg-9">
                                 
                                    @foreach ($data as $row)
                                <input type="text" id="telephone" name="telephone" class="form-control" value=" {{ $row->telephone }}" readonly>
                                @endforeach
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                        <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="txtExpirationDate" class="col-lg-3 col-form-label">الحالة الاجتماعية</label>
                                    <div class="col-lg-9">
                                    @foreach ($data as $row)
                                <input type="text" id="situation_f" name="situation_f" class="form-control" value=" {{ $row->situation_f }}" readonly>
                                @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="txtExpirationDate" class="col-lg-3 col-form-label">الجنس</label>
                                    <div class="col-lg-9">
                                    @foreach ($data as $row)
                                <input type="text" id="sexe" name="sexe" class="form-control" value=" {{ $row->sexe }}" readonly>
                                @endforeach
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row"> 
                        <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="txtExpirationDate" class="col-lg-3 col-form-label">العنوان</label>
                                    <div class="col-lg-9">
                                    @foreach ($data as $row)
                                <input type="text" id="sexe" name="sexe" class="form-control" value="{{ $row->adresse }}" readonly>
                                @endforeach
                                    </div>
                                </div>
                            </div>
                        
                        </div>
<!-- -------------------------- 

<h4 class="card-title mb-4">المعلومات الشخصية</h4>
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

                     
            </div>-->
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