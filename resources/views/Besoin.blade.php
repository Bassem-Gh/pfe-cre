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
  <!--
     <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

              <h4 class="card-title">Datatable Editable</h4>

                <div class="table-responsive">
                    <table class="table table-editable table-nowrap">
                        <thead>
                            <tr>
                            <th>id</th>
                             <th>المؤسسة التربوية</th>
                                                <th>رمزالمؤسسة</th>
                                                <th>Action</th>
                            </tr>
                        </thead>
                        <tr>
                            <td>1</td>
                            <td data-original-value="1"><a href="#" data-type="text" data-pk="1" class="editable" data-url="" data-title="Edit Quantity">1</a></td>
                            <td data-original-value="1"><a href="#" data-type="text" data-pk="1" class="editable" data-url="" data-title="Edit Quantity">1</a></td>
                            <td data-original-value="1.99"><a href="#" data-type="text" data-pk="1" class="editable" data-url="" data-title="Edit Quantity">1.99</a></td>
                        </tr>
                      
                    </table>
                </div>

            </div>
        </div>
    </div>
   
</div>
!-->

@endsection
@section('script')

<!-- Required datatable js -->
<script src="{{ URL::asset('/libs/datatables/datatables.min.js')}}"></script>
<script src="{{ URL::asset('/libs/bootstrap-editable/bootstrap-editable.min.js')}}"></script>

<script src="{{ URL::asset('/js/pages/table-editable.int.js')}}"></script>
@endsection