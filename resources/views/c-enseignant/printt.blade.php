@extends('layouts.master-layouts')

@section('title')  @endsection

@section('content')

    @component('common-components.breadcrumb')
         @slot('title')  @endslot
         @slot('li_1')   @endslot
     @endcomponent
     
   
     
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
        <div class="col-xs-12 col-sm-12 col-md-12 text-center"> <h2> مطالب النقل </h2></div>
        </div>
       
    </div>
</div>
   
<div class="card">
<div class="card-body">
    

    <div class="row">

        <table id="datatable" class="table table-bordered dt-responsive table-striped  nowrap  no-footer dtr-inline collapsed" style="border-collapse: collapse; border-spacing: 0; width: 100%;">                    
            <thead>
                <tr>
                    <th>طبيعة النقلة </th>
                    <th>التاريخ </th>
                    <th>الحالة  </th>
                    <th><i class="dripicons-toggles"></i></th>
                </tr>
            </thead>         
            <tbody id="tbody">

           <tr><td>1</td>
           <td>2</td>
           <td></td>
            <td> 

<button class="btn btn-primary" onclick="editRow({{ $errors->id }},this)" data-url= "/colleges/update/" data-name="{{ $errors->libetab }}" > <i class="bx bx-edit-alt" ></i></button>
</td></tr>

                     
    </tbody>
        </table>
    </div>
</div>
</div>

@endsection