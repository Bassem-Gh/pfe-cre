
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

     <div class="row">
            <div class="col-12">
     <div class="card">
            <div class="card-body">
            
            <p id="msg" class="alert alert-success "></p> 
            <input type="hidden" value="{{csrf_token()}}" id="token"/>

            {!! csrf_field() !!}
  
          <script src="{{asset('js/main.js')}}" type="text/javascript"></script>
      
       
               <div class="container">
        
          <table    align="center"  dir="ltr"width="70%" >
       
       <tbody>
         
       
        <tr width="100%" > 
         
         <td>
         <select id="mat" onchange='myFunction4()'>
                <option value="0" selected="true">Sélectionnez etablissement</option>
                @foreach($data as $row)
               
                <option value='{{ $row->id}}' > {{ $row->libetab }} </option>
                
                   @endforeach
               </select>
               @csrf
         </td>
       <td  bgcolor="#bcfbb5" dir="ltr" width="100%" align="center" >
       <label width="100%" >المؤسسة التربوية</label>
       </td>
         </tr> 
         </tbody>
         </table>
         
         
       
         
         <div class="panel-body">
         
          <div class="table-responsive">
          
          
           <table id="sample_data"      dir="rtl"    style=" table-layout:auto;">
            <thead>
                         <tr>
                                         
                                     
                                         <td>
                                         
                                         <span lang="ar-tn"><b><font face="Tahoma" size="2" >المؤسسة التربوية</span></font></b></td>
                                         
                                         <td>
                                         <span lang="ar-tn"><b><font face="Tahoma" size="2" >المادة</span></font></b></td>
                                         
                                         <td>
                                         
                                         
                                         <span lang="ar-tn"><b><font face="Tahoma" size="2" >مجموع الساعات</span></font></b></td>
                                         <td>
                                         
                                         <span lang="ar-tn"><b><font face="Tahoma" size="2" >المطالبون ب18</span></font></b></td>
                                         <td>
                                         
                                         <span lang="ar-tn"><b><font face="Tahoma" size="2" >المطالبون ب16</span></font></b></td>
                                         <td>
                                         
                                         <span lang="ar-tn"><b><font face="Tahoma" size="2" >المطالبون ب15</span></font></b></td>
                                         <td>
                                         
                                         <span lang="ar-tn"><b><font face="Tahoma" size="2" >المطالبون ب12</span></font></b></td>
                                         <td>
                                         
                                         <span lang="ar-tn"><b><font face="Tahoma" size="2" >يعملون نصف وقت</span></font></b></td>
                                         <td>
                                         
                                         <span lang="ar-tn"><b><font face="Tahoma" size="2" >مجموع المباشرين</span></font></b></td>
                                         <td>
                                         
                                         <span lang="ar-tn"><b><font face="Tahoma" size="2" >المعدل بالتخفيض</span></font></b></td>
                                         <td>
                                         
                                         <span lang="ar-tn"><b><font face="Tahoma" size="2" >المعدل بدون تخفيض</span></font></b></td>
                                                                                                                                             
                                         
                                         <td>
                                         
                                         <span lang="ar-tn"><b><font face="Tahoma" size="2" >الحاجيات الإضافية</span></font></b></td>
                                         
                                         <td><span lang="ar-tn"><b><font face="Tahoma" size="2" >المعدل النهائي</span></font></b></td>
                                         
                                                 <td>									
                                         <span lang="ar-tn" ></span></td>	
                                       
                                                 
                                     
                                        
                                     </tr>
                                     
                                     
                                     
                             </thead>			
                                 
                                     
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
          </div>

@endsection
@section('script')

    <!-- Required datatable js -->
    <script src="{{ URL::asset('/libs/datatables/datatables.min.js')}}"></script>
    <script src="{{ URL::asset('/libs/jszip/jszip.min.js')}}"></script>
    <script src="{{ URL::asset('/libs/pdfmake/pdfmake.min.js')}}"></script>
    <script src="{{ URL::asset('/libs/bootstrap-editable/bootstrap-editable.min.js')}}"></script>
    
    <!-- Datatable init js -->
    <script src="{{ URL::asset('/js/pages/datatables.init.js')}}"></script>
    <script src="{{ URL::asset('/js/pages/table-editable.int.js')}}"></script>
@endsection
