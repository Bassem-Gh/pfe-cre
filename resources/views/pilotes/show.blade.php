@extends('layouts.master')

@section('title') Gestion des besoins @endsection

@section('content')

    @component('common-components.breadcrumb')
         @slot('title') Gestion des besoins  @endslot
         @slot('li_1') Pages  @endslot
     @endcomponent
     
  
     


<div class="row">
                        <div class="col-12">
                               
                        <div class="card">
                                <div class="card-body">

                                   

                                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                           
                                              
                                               
                                             
                                            <th>المؤسسة التربوية</th>  
                                                <th>المستوى الدراسي </th>
                                            
                                                <th>المادة </th>
                                                <th>عدد الفصول </th>
                                                <th>عدد الساعات  </th>
                                                <th>عدد الساعات الجملي </th> 
                                                <th width="280px">Action</th>
                                               
                                            </tr>
                                        </thead>
                                       
                                        <tbody>
                                        @foreach($data as $row)
        
        <tr>

        <td>
        {{ $row->libetab }} 
            </td>
            <td>{{ $row->libniv }} </td>
            <td> {{ $row->libmat }}</td>
            <td>{{ $row->nbclasse }} </td>
             <td>{{ $row->nbh }}</td>
            <td>{{ $row->nbh * $row->nbclasse }} </td>
            <td> <form action="" method="POST">
   
                    
    
   <a class="btn btn-primary" href="">Edit</a>

   @csrf
   @method('DELETE')

   <button type="submit" class="btn btn-danger">Delete</button>
    </form></td>
          
        </tr>
       @endforeach                   
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
@endsection


