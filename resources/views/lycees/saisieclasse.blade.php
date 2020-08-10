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
     
     @component('common-components.menu2')
     @endcomponent
     @yield('cont')
     <div class="col-12">
                               
                               <div class="card">
                                       <div class="card-body">
  
	
	
  <div style="background-color:EEEDEC">





</div>
<div> </br></div>

<div class="container">
  
   <table    align="center"  dir="ltr">
<form name="insertion" width="100%" method="post" action="insert.php">
<tbody>
  

 <tr width="100%" > 
  
  <td>
  <select id='etab' onchange="getnivc(this.value);gettable(this.value);" name="etab" >
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
  
  <tr width="100%">
  <td>
  <select id='sect' name="section" onchange="getnivs(this.value);"  > 
  <option value="" selected="true">Sélectionnez la section</option>
  @foreach($data2 as $row2)
  <option value=" {{ $row2->codesection}} ">  {{ $row2->libsection }} </option>
  @endforeach
</select>
 </td>
     <td  bgcolor="#bcfbb5" dir="ltr" width="100%" align="center"><label width="100%" >الشعبة</label></td>
</tr>

<tr width="100%" > 
  
  <td>
  <select id='niv' onchange="getnivc(this.value);" name="niv">
  <option value="" selected="true">Sélectionnez le niveau</option>
  @foreach($data as $row)
  <option value=" {{ $row->codeniv}} ">  {{ $row->libniv }} </option>
  @endforeach
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
  <td><b><input type="submit" id="insert" value="ok"> </b></input></td>
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
                               
                                  <!--td>
                                      <span lang="ar-tn">رمزالمؤسسة</span></td-->
                                  <td>
                                  
                                  <span lang="ar-tn">المؤسسة التربوية</span></td>
                                  
                                  <td>
                                  
                                  
                                  <span lang="ar-tn">المستوى الدراسي</span></td>
                                  <!--td>
                                  <span lang="ar-tn">الشعبة</span></td>
                                  <!--td>
                                  <span lang="ar-tn">المادة</span></td-->
                                  
                                  <td>
                                  
                                  <span lang="ar-tn">عدد الفصول</span></td>
                                  <td>									
                                  <span lang="ar-tn" ></span></td>
                                  <!--td>
                                  
                                  <span lang="ar-tn">عدد الساعات</span></td-->
                                  
                                  
                                  
                                              
                                
                                          
                              
                                 
                              </tr>
                              
                              
                              
                      </thead>
  <tbody>  
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
@endsection
@section('script')

<!-- Required datatable js -->
<script src="{{ URL::asset('/libs/datatables/datatables.min.js')}}"></script>
<script src="{{ URL::asset('/libs/bootstrap-editable/bootstrap-editable.min.js')}}"></script>

<script src="{{ URL::asset('/js/pages/table-editable.int.js')}}"></script>
@endsection