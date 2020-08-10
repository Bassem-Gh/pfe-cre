@extends('layouts.app')

 
@section('content')
<div class="col-xs-12 col-sm-12 col-md-12 text-center">
            
            
            
       
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-borderless">
        <tr>
        <th width="280px">Action</th>
        <th> عدد الساعات الجملي</th>
        <th> عدد الساعات </th>
        <th>عدد الفصول<th> 
        <th>المادة<th> 
        <th>المستوى التعليمي<th> 
          <th>المؤسسة التربوية</th>
          <th>رمزالمؤسسة</th>
        
           
        </tr>
        @foreach($data as $row)
        <tr>
        <td>
                <form action="{{ route('college.destroy',$row->id) }}" method="POST">
   
                    
    
                    <a class="btn btn-primary" href="{{ route('colleges.edit',$row->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
            <td> {{ $row->libetab }}</td>
            <td> {{ $row->id }</td>
            <td> {{ $row->libetab }}</td>
            <td> {{ $row->libetab }}</td>
            <td> {{ $row->libetab }}</td>
            <td> {{ $row->libetab }}</td>
            <td> {{ $row->libetab }}</td>
          
        </tr>
       
        @endforeach
        
    </table>
  
   
      
@endsection