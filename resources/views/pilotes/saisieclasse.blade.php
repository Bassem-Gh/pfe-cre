@extends('layouts.master')

@section('title') Gestion des besoins @endsection
@section('css')

<!-- DataTables -->
<link href="{{ URL::asset('/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />

@endsection
@section('content')

    @component('common-components.breadcrumb')
         @slot('title') Gestion des besoins  @endslot
         @slot('li_1') Pages  @endslot
     @endcomponent
     
 
     @yield('cont')
    

     <div class="col-12">
                                  
<script src="{{asset('js/main.js')}}" type="text/javascript"></script>

                               <div class="card">
                                       <div class="card-body">
  
	
	
  <div style="background-color:EEEDEC">





</div>
<div> </br></div>

<div class="container">
  
   <table    align="center"  dir="ltr">
<form name="insertion" width="100%" method="post" >
<!----------- jdida ------>
<p id="msg" class="alert alert-success "></p> 
<input type="hidden" value="{{csrf_token()}}" id="token"/>

{!! csrf_field() !!}

<tbody>
  

 <tr width="100%" > 
  
  <td>
  <select id='etab' name="etab" onchange='myFunction1p()' >
  <option value="" selected="true">Sélectionnez l'etablissement</option>
  @foreach($data1 as $row1)
  <option value=" {{ $row1->id}} ">  {{ $row1->libetab }} </option>
  @endforeach
 </select>
  </td>
<td  bgcolor="#bcfbb5" dir="ltr" width="100%" align="center" >
<label width="100%" >المؤسسة التربوية</label>
</td>
  </tr> 
  

  <tr width="100%" > 
  
  <td>
  <select id='niv'  name="niv">
  
 </select>
  </td>
<td  bgcolor="#bcfbb5" dir="ltr" width="100%" align="center" >
  <label width="100%" >المستوى التعليمي</label>
  </td>
  </tr> 



<tr width="100%" > 
  <td>
  <input id="nbc" type="number" name="nbc" ></input>
  </td>
<td  bgcolor="#bcfbb5" dir="ltr" width="100%" align="center" >
  <label width="100%" >عدد الفصول</label>
  </td>
  </tr> 

<tr width="100%" > 
  <td><b><input type="submit" id="insert" value="ok" onclick="insertl()"> </b></input></td>
  <!--td><button type="" id="insert"><b>ok</b></button></td-->
  </tr> 

</form>

</tbody>
</table>
  
<!--/div-->
  
  

  <div class="panel-body" style="background-color:EEEDEC">
  
   <div class="table-responsive">
   
   
    <table id="sample_data"     align="center"  dir="rtl" class="table table-bordered table-striped">
     <thead>
          
                  <tr>
                               
                                  <td>
                                  
                                  <span lang="ar-tn">المؤسسة التربوية</span></td>
                                  
                                  <td>
                                  
                                  
                                  <span lang="ar-tn">المستوى الدراسي</span></td>
                                  
                                  <td>
                                  
                                  <span lang="ar-tn">عدد الفصول</span></td>
                                  <td>									
                                  <span lang="ar-tn" ></span></td>
                                 
                              </tr>
   
                              
                      </thead>
  <tbody id="tab">  
  </tbody>
  </table>
  
   </div>
  
  <!--/div>
  </div-->
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
    type: 'Get',
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
@endsection