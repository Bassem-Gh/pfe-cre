@extends('layouts.master')

@section('title') Gestion des besoins @endsection
@section('css')

    <!-- DataTables -->
    <link href="{{ URL::asset('/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />

@endsection

@section('content')

    @component('common-components.breadcrumb')
         @slot('title') المؤسسات  @endslot
         @slot('li_1')إدارة الاحتياجات @endslot
     @endcomponent
     
    
{{--       @yield('cont')
  --}}
 
  <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
              <div class="col-xs-12 col-sm-12 col-md-12 text-center"> <h2>حساب حاجيات كل مادة للمدرسين حسب المؤسسة</h2></div>
            <br><br><br>
            <input type="hidden" value="{{csrf_token()}}" id="token"/>

            {!! csrf_field() !!}
            <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group row">
              <label for="example-text-input" class="col-md-2 col-form-label">المؤسسة التربوية</label>
                  <div class="col-md-10">
                      <select id="mat" class="form-control  select3">
                          <option>--الرجاءالتحديد--</option>
                          @foreach($data as $row)
                          <option value='{{ $row->id}}' > {{ $row->libetab }} </option>
                          @endforeach
                          </>
                      </select>
                  </div>
              </div>
          </div>
         
                  
           
         
       
      {{--     
        <div class="panel-body">

        <div class="table-responsive">  --}}
         
          
          <table id="datatable-buttons" class="table-sm table-striped table-responsive table-bordered dtr-colum dt-respnsive "   >

            <thead>
              <tr >                                   
                <th >
                
                <span lang="ar-tn"><b><font face="Tahoma" size="1" >المؤسسة<br> التربوية</span></b></th>
                
                <th >
                <span lang="ar-tn"><b><font face="Tahoma" size="1" >المادة</span></b></th>
                
                <th >
                
                
                <span lang="ar-tn"><b><font face="Tahoma" size="1" >مجموع<br> الساعات</span></b></th>
                <th >
                
                <span lang="ar-tn"><b><font face="Tahoma" size="1" >المطالبون<br> ب18</span></b></th>
                <th >
                
                <span lang="ar-tn"><b><font face="Tahoma" size="1" >المطالبون <br> ب16</span></b></th>
                <th >
                
                <span lang="ar-tn"><b><font face="Tahoma" size="1" >المطالبون<br> ب15</span></b></th>
                <th >
                
                <span lang="ar-tn"><b><font face="Tahoma" size="1" >المطالبون<br> ب12</span></b></th>
                <th >
                
                <span lang="ar-tn"><b><font face="Tahoma" size="1" >يعملون<br> نصف وقت</span></b></th>
                <th >
                
                <span lang="ar-tn"><b><font face="Tahoma" size="1" >مجموع <br>المباشرين</span></b></th>
                <th >
                
                <span lang="ar-tn"><b><font face="Tahoma" size="1" >المعدل<br> بالتخفيض</span></b></th>
                <th >
                
                <span lang="ar-tn"><b><font face="Tahoma" size="1" >المعدل<br> بدون تخفيض</span></b></th>
                                                                                                                    
                
                <th >
                
                <span lang="ar-tn"><b><font face="Tahoma" size="1" >الحاجيات <br>الإضافية</span></b></th>
                
                <th ><span lang="ar-tn"><b><font face="Tahoma" size="1" >المعدل <br>النهائي</span></b></th>
                
                            
                                     
                                     
            </thead>			
                                 
                                     
            <tbody id="tab">  

            </tbody>
         </table>
         
         
    </div>

  </div>
  <!-- end col -->
</div>
<!-- end row -->        

@endsection
@section('script')
    <script src="/js/main.js"></script>
    <!-- Required datatable js -->
    <script src="{{ URL::asset('/libs/datatables/datatables.min.js')}}"></script>
    <script src="{{ URL::asset('/libs/jszip/jszip.min.js')}}"></script>
    <script src="{{ URL::asset('/libs/pdfmake/pdfmake.min.js')}}"></script>

    <!-- Datatable init js -->
    <script src="{{ URL::asset('/js/pages/datatables.init.js')}}"></script>

@endsection