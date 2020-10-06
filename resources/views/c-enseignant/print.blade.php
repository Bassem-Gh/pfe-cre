@extends('layouts.master-layouts')

@section('title')  @endsection

@section('content')

     @component('common-components.breadcrumb')
         @slot('title')  @endslot
         @slot('li_1')  @endslot
     @endcomponent


                    <div class="row">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>خطأ!</strong> يرجى تعمير كل الخانات.<br><br>
                          
                        </div>
                    @endif
                    @if(session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                   
               
                    
                        <div class="col-lg-12">
                            <div class="card"> 
                                <div class="card-body">
                                    <h1 style='text-align: center'>    وزارة التربية والتعليم</h1>

                                    <div class=".col-6 .col-md-4">
                                        <h4 class="float-right font-size-20">مطلب نقلة في نطاق تقريب الأزواج
                                        </h4>
                                        <div class="mb-4">
                                            <img src="/images/logo.png" alt="logo" height="30" />
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        
                                        <div class="col-6 text-right">
                                            <br><br>
                                            <table border="0">
                                                <tr>
                                                    <td><strong>المعرف الوحيد :</strong></td>
                                                    <td>{{ Auth::user()->unique_id }}</td>
                                                </tr>
                                                
                                                <tr> 
                                                    <td><strong> الإسم واللقب : </strong></td>
                                                    <td>{{ $prenom ?? ''}} {{ $nom ?? ''}}</td>
                                                </tr>

                                                <tr> 
                                                    <td><strong>  مقر الإقامة: </strong></td>
                                                    <td>{{ $residencey ?? ''}} </td>
                                                </tr>
                                                
                                                  <tr>
                                                    <td><strong>المادة : </strong></td>
                                                    <td>{{ $matiere ?? ''}}</td>
                                                </tr>     
                                                
                                                <tr>
                                                    <td><strong>الرتبة الحالية : </strong></td>
                                                    <td>{{ $gradeact ?? ''}}</td>
                                                </tr> 
                                                <tr>
                                                    <td><strong>تاريخ بناء الزواج : </strong></td>
                                                    <td>{{ $date_mr ?? ''}}</td>
                                                </tr>   
                                                <tr>
                                                    <td><strong>عدد الأطفال في الكفالة : </strong></td>
                                                    <td>{{ $nbrenfant ?? ''}}</td>
                                                </tr>   
                                                </table>
                                               
                                        </div>
                                        <div class="col-6 text-right">
                                            <br><br><br>
                                            <table border="0">
                                                <tr>
                                                    <td><strong>اسم القرين و لقبه :</strong></td>
                                                    <td> {{ $nomp_f ?? ''}} </td>
                                                </tr>
                                                
                                                <tr> 
                                                    <td><strong> مهنته : </strong></td>
                                                    <td>{{ $professionf ?? ''}}</td>
                                                </tr>
                                                
                                                <tr>
                                                    <td><strong>مقر عمله المدينة أو القرية : </strong></td>
                                                    <td>{{ $residencetf ?? ''}}</td>
                                                </tr>    
                                                <tr>
                                                    <td><strong>تاريخ مباشرته للعمل بالمكان المذكور : </strong></td>
                                                    <td>{{ $datetf ?? ''}}</td>
                                                </tr>    
                                                </table>
                                               
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 mt-3">
                                            
                                            
                                                <strong>تاريخ الإنتداب للتدريس بالمدارس الإعدادية و المعاهد : </strong>
                                                {{ $daterecrutement ?? ''}} <br>
                                            
                                        </div>
                                        <br><br><br><br>
                                    </div>
                                    <div class="py-2 mt-3">
                                        <h3 class="font-size-15 font-weight-bold">  معلومات حول النقلة</h3>
                                    </div>
                                    <div class="table-responsive">
                                        
                                        <table class="table table-nowrap">
                                            <thead>
                                                <tr>
                                                    <th style="">المؤسسة التربوية التي يعمل بها المدرس</th>
                                                    <th> تاريخ المباشرة بالمؤسسة التربوية الحالية</th>
                                                    <th>مدة الإنقطاعات</th>
                                                    <th class="text-right">آخر عدد بيداغوجي</th>
                                                    <th>تاريخ الحصول عليه </th>
                                                    <th> المركز المطلوب </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>{{$etabact ?? ''}}</td>
                                                    <td>{{$datedebut  ?? ''}}</td>
                                                    <td class="text-right">سنة:{{ $year ?? ''}} | شهر:{{ $month ?? ''}} | يوم:{{ $day ?? ''}} </td>
                                                    <td>{{$notebid  ?? ''}}</td>
                                                    <td>{{$datenotebid  ?? ''}}</td>
                                                    <td>{{$etab_post_dis  ?? ''}}</td>
                                                </tr>

                                               <tr><td></td></tr>
                                                <tr>
                                                    <td colspan="5" class="border-0 text-right">
                                                        <strong>مجموع النقاط</strong></td>
                                                    <td class="border-0 text-right">
                                                        <h4 class="m-0">{{$score  ?? ''}}</h4></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="d-print-none">
                                        <div class="float-right">
                                            <a href="javascript:window.print()" class="btn btn-success waves-effect waves-light"><i class="fa fa-print"></i></a>
                                            <a href="/home" class="btn btn-primary w-md waves-effect waves-light">الملف الشخصي</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                    @endsection