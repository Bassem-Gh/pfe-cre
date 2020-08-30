@extends('layouts.master')

@section('title') Gestion des besoins @endsection
@section('css')

<!-- DataTables -->
<link href="{{ URL::asset('/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />

<link href="{{URL::asset('libs/select2/select2.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{URL::asset('libs/bootstrap-datepicker/bootstrap-datepicker.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('libs/bootstrap-colorpicker/bootstrap-colorpicker.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('libs/bootstrap-touchspin/bootstrap-touchspin.min.css')}}" rel="stylesheet" />





@endsection
@section('content')

    @component('common-components.breadcrumb')
         @slot('title') Gestion des besoins  @endslot
         @slot('li_1') Pages  @endslot
     @endcomponent
     
 
     <meta name="csrf-token" content="{{ csrf_token() }}">                                  
<script src="{{asset('js/main.js')}}" type="text/javascript"></script>

<div class="row">
  <div class="col-12">
      <div class="card">
          <div class="card-body">
            <div class="col-xs-12 col-sm-12 col-md-12 text-center"> <h2> إدارة الأقسام </h2></div>
            <br><br><br>
	
	

              <form name="insertion"  methode="POST" >
                
                <!----------- jdida ------>
                <p id="msg" class="alert alert-success "></p> 
                <input type="hidden" value="{{csrf_token()}}" id="token"/>
                {!! csrf_field() !!}
                <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group row">
                  <label for="example-text-input" class="col-md-2 col-form-label">المؤسسة التربوية</label>
                      <div class="col-md-10">
                          <select id='etab' name="etab"  onchange='myFunction1()'class="form-control select2">
                              <option>--الرجاءالتحديد--</option>
                              @foreach($data1 as $row1)
                              <option value="{{ $row1->id}}" > {{ $row1->libetab }} </option>
                              @endforeach
                              </>
                          </select>
                      </div>
                  </div>
              </div>

            </div>
          </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
              <div class="card">
                  <div class="card-body">        
                    <h4 class="card-title">تعديل الفصول  </h4>

                
              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group row">
                <label for="example-text-input" class="col-md-2 col-form-label">الشعبة</label>
                    <div class="col-md-10">
                        <select id='sect' name="sect"   onchange='myFunction3()'class="form-control select2">
                            <option>--الرجاءالتحديد--</option>
                              @foreach($data2 as $row2)
                                <option value=" {{ $row2->codesection}} ">  {{ $row2->libsection }} </option>
                              @endforeach
                            </>
                        </select>
                    </div>
                </div>
            </div>


            <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group row">
              <label for="example-text-input" class="col-md-2 col-form-label">المستوى التعليمي</label>
                  <div class="col-md-10">
                      <select  id='niv'  name="niv" class="form-control select2">
                          <option>--الرجاءالتحديد--</option>
                            
                          </>
                      </select>
                  </div>
              </div>
          </div>
     


        <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="form-group row">
              <label for="example-text-input" class="col-md-2 col-form-label">عدد الفصول </label>
              <div class="col-md-10"> 
              <div class="form-group">
                <input  id="nbc" type="number"  name="nbc"   data-toggle="touchspin" type="text">
            </div>
            </div>
          </div>
      </div>
        {{--  
        <div class="col-md-2">
          <div class="mt-2 mt-md-0 mx-auto">
            <button  id="insert"  class="btn btn-primary" onclick="insertl()">ok</button>
          </div>
      </div>     
  --}}
  <input type="button" id="insert" value="ok" onclick="insertl()"> ok</b></input>

      

</form>

  
   <div class="table-responsive">
   
   
    <table id="simple_data"     align="center"  dir="rtl" class="table table-bordered table-striped">
     <thead>
          
                  <tr>
                  <td>
                                  
                                  <span >المؤسسة التربوية</span></td>
                                  
                                  <td>
                                  
                                  
                                  <span >المستوى الدراسي</span></td>
                                  
                                  <td>
                                  
                                  <span >عدد الفصول</span></td>
                                									
                                  <td><span >	المادة</span></td>
                                 <td> <span >	عدد الساعات</span></td>
                                  <td><span >	عدد الساعات الجملي</span></td>
                                 
                              </tr>
   
                              
                      </thead>
  <tbody id="tab">  
  </tbody>
  </table>
  
   </div>
  

 </div>
  </div>
  </div>
</div>
</div>




  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
    <!--  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>  -->
 <!--
  <script  type="text/javascript" language="javascript" >

 $(document).ready(function(){ 
  $('#sect').on('change',function(){


var id=$('#sect').val();

  alert(id);
  $('#niv').empty();
  $('#niv').append('<option value="0" disabled selected>Processing.....</option>');
  

  // AJAX request 
  
  $.ajax({
    url: 'getNiveau',
    type: 'Post',
    dataType: 'json',

    success: function(response){
     var response=JSON.parse(response);
   console.log(response);

     $('#niv').empty();
     $('#niv').append('<option value="0" disabled selected>selectioner niveau</option>');
  
  response.foreach(element =>{
   $('#niv').append('<option value="${element['codeniv']}" >${element['libniv']}</option>');

  });
    }
 });

});
});
  </script> -->
@endsection
@section('script')


<!-- Required datatable js -->
<script src="{{ URL::asset('/libs/datatables/datatables.min.js')}}"></script>
<script src="{{ URL::asset('/libs/bootstrap-editable/bootstrap-editable.min.js')}}"></script> 
<script src="{{ URL::asset('/js/pages/table-editable.int.js')}}"></script>


<script src="{{URL::asset('/libs/select2/select2.min.js')}}"></script>
<script src="{{URL::asset('/libs/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
<script src="{{URL::asset('/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.js')}}"></script>
<script src="{{URL::asset('/libs/bootstrap-touchspin/bootstrap-touchspin.min.js')}}"></script>
<script src="{{URL::asset('/libs/bootstrap-maxlength/bootstrap-maxlength.min.js')}}"></script>

<!-- form advanced init -->
<script src="{{URL::asset('/js/pages/form-advanced.init.js')}}"></script>

@endsection