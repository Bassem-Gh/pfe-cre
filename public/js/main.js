


function myFunction3() {
    
        
         var ccod = $('#sect').val();
        
    
   
         $.ajax({
                type: "Get",
             
                url: '/lycees/getNiveau',
                data: { 'ccod':ccod },   
                dataType:'json', 
                 success:function(data)
                   {
                   
                      $('#niv').empty();
                      $('#niv').append('<option value="0" disabled selected>selectioner niveau</option>');
                   
                      $.each(data, function(idx,elem){
                    $('#niv').append('<option value='+elem.codeniv+'>'+elem.libniv+'</option>');
                 
                   });
                                   
                    } , 
                   error:function() {
                       alert('error');
                   }
                });
           
 }
   
   /////////////////
   
function myFunction1() {
          
       var idetab = $('#etab').val();
           $.ajax({
                    type: "Get",
                    url: '/lycees/gettable',
                    data: { 'idetab':idetab },   
                    dataType:'json', 
               success:function(data)
                 {
          
                  $('#tab').empty();
                    $.each(data, function(idx,elem){
                 
                  $('#tab').append('<tr><td>'+elem.libetab+'</td><td>'+elem.libniv+'</td><td>'+elem.nbclasse+'</td></tr>');
                    
                      
                 });
                                 
                  } , 
                 error:function() {
                     alert('error');
                 }
              });
         
             
     
 
 }



 
function insertl() {
  
  
  $("#msg").hide();
 
    $("#msg").show();

    var token = $("#token").val();
    var nbc = $('#nbc').val();
    var etab = $('#etab').val();
    var niv = $('#niv').val();
   
   
   
    $.ajax({
      type: "post",
      data: "nbc=" + nbc + "&etab=" + etab + "&niv=" + niv + "&_token=" + token ,
      url:'/lycees/insertclasse',
      success:function(data){
       $("#msg").html("classe has been inserted");
        $("#msg").fadeOut(2000);
       
        $('#etab_table').DataTable().ajax.reload();
      } , 
          error:function(data) {
                             alert('error'); 
                             
                              console.log(data);
                           }
    });

}










 //////////////////////// partie saisie classe college ajax ////////////////
   
 

 
function myFunction1c() {
  


//var id = document.getElementById('sect');
    
     var idetab = $('#etab').val();
 
     $.ajax({
            type: "Get",
         
            url: '/colleges/gettablec',
            data: { 'idetab':idetab },   
            dataType:'json', 
             success:function(data)
               {
                alert('success');
                $('#tab').empty();
                $('#niv').empty();
                $('#niv').append('<option value="0" disabled selected>selectioner niveau</option>');
                  $.each(data, function(idx,elem){
               
                $('#tab').append('<tr><td>'+elem.libetab+'</td><td>'+elem.libniv+'</td><td>'+elem.nbclasse+'</td></tr>');
                $('#niv').append('<option value='+elem.codeniv+'>'+elem.libniv+'</option>');
                    
               });
                               
                } , 
               error:function() {
                   alert('error');
               }
            });
       
           
   

}






 //////////////////////// partie saisie classe pilote lycee ajax //////////////////////////////////////////
   
 
function myFunction1p() {
  


    
     var idetab = $('#etab').val();
    alert(idetab);


     $.ajax({
            type: "Get",
         
            url: '/pilotes/gettablep',
            data: { 'idetab':idetab },   
            dataType:'json', 
             success:function(data)
               {
                alert('success');
                $('#tab').empty();
                $('#niv').empty();
                $('#niv').append('<option value="0" disabled selected>selectioner niveau</option>');
                  $.each(data, function(idx,elem){
               
                $('#tab').append('<tr><td>'+elem.libetab+'</td><td>'+elem.libniv+'</td><td>'+elem.nbclasse+'</td></tr>');
                $('#niv').append('<option value='+elem.codeniv+'>'+elem.libniv+'</option>');
                    
               });
                               
                } , 
               error:function() {
                   alert('error');
               }
            });
       
           
   

}




 //////////////////////// partie saisie classe pilote ajax ////////////////////////////////////////////

 function myFunction1pl() {
  


  //var id = document.getElementById('sect');
      
       var idetab = $('#etab').val();
      alert(idetab);
  
  
       $.ajax({
              type: "Get",
           
              url: '/pilotes/gettablep',
              data: { 'idetab':idetab },   
              dataType:'json', 
               success:function(data)
                 {
                  alert('success');
                  $('#tab').empty();
                  $('#niv').empty();
                  $('#niv').append('<option value="0" disabled selected>selectioner niveau</option>');
                    $.each(data, function(idx,elem){
                 
                  $('#tab').append('<tr><td>'+elem.libetab+'</td><td>'+elem.libniv+'</td><td>'+elem.nbclasse+'</td></tr>');
                  $('#niv').append('<option value='+elem.codeniv+'>'+elem.libniv+'</option>');
                      
                 });
                                 
                  } , 
                 error:function() {
                     alert('error');
                 }
              });
          
  }
  
        /////////////////besoin par etab ///////////////
  



        function myFunction4() {
    

 
          var idop = document.getElementById("mat");
              
                 var ccod = $('#mat').val();
                 alert(ccod);
               
         
                $.ajax({
                      type: "Get",
                      url: '/lycees/Get_data',
                      data: { 'ccod':ccod },   
                      dataType:'json', 
                       success:function(response)
                         {
                            
                             $('#tab').empty();
                      
                                     var x=0;
                                       var table = $("#tab");
                                      $.each(response['reql'], function( idx,elem2)
                                      {
                                           
                                         
                                                $.ajax({
                                                 type: "Get",
                                                 url: '/lycees/Get_data2',
                                                 data: { 'codemat':elem2.codemat,
                                             'ccod':ccod },   
                                                 dataType:'json', 
                                                  success:function(data2)
                                                    {
                                                    
                                                     $.each(data2, function( idx3,elem3) {
                                                      var codemat=elem3.codemat;
                                                      var idetab=elem3.id;
                                                     

                                                         $toth=(elem3.nb12*12) + (elem3.nb15*15) + (elem3.nb16*16) +(elem3.nb05 *0.5); 
                                                         $totp=elem3.nb12+elem3.nb15+elem3.nb16+elem3.nb18+elem3.nb05;
                                                        $c=Math.trunc(elem3.tot);
                                                         //alert($totp);
                                                      // alert(elem3.tot);
                                                          ///////////totsd////////////////
                                                         if($totp>0){
                                                             $totsd=Math.trunc(elem3.tot)/$totp;
                                                         }
                                                          else {$totsd=0;}
                                                         ////////////////////////md////////////////
                                                                 if(elem3.nb18>0){                                                 
                                                                     $md=(Math.trunc(elem3.tot)-$toth)/elem3.nb18;
                                                                 }
                                                                     else {$md=$totsd;}
                                                                     ////////////////////////////ad//////////////
                                                                     if($totsd.toFixed(2)>18)
                                                                     {
                                                                         $ad=(parseInt(elem3.tot)/18-$totp).toFixed(2);
                                                                        
                                                                         $v=parseFloat($ad%1);
                                                                       
                                                                         $n=parseInt($ad);
                                                                        
                                                                         if($v<0.5)
                                                                         { $x=parseFloat($n)+parseFloat(0.5);   }

                                                                         else if($v>0.5)
                                                                          { $x=parseFloat($n)+parseFloat(1); }

                                                                         else { $x=0.5 ; }
                                                                         
                                                                        }
                                                                    else{$x=0; }  
                                                                     ///////////////////////////////mf/////////////
                                                                     if($x+$totp>0){
                                                                       $g=parseFloat($x)+parseInt($totp);
                                                                    
                                                                         $mf=(parseInt(elem3.tot)/$g).toFixed(2);
                                                                         /////num vergule ////
                                                                       
                                                                     }
                                                                         else{$mf=0;}
         
                                                                        // elem3.nb18
                                                        
                                                         table.append("<tr><td>"+elem3.id+"</td><td>"+elem3.libmat+"</td><td>"+Math.trunc(elem3.tot)+"</td><td>"+elem3.nb18+"</td><td>"+elem3.nb16+"</td><td>"+elem3.nb15+"</td><td>"+elem3.nb12+"</td><td>"+elem3.nb05+"</td><td>"+(elem3.nb12 + elem3.nb15+elem3.nb16+elem3.nb18+elem3.nb05)+"</td><td>"+$md.toFixed(2)+"</td><td>"+$totsd.toFixed(2)+"</td><td>"+$x+"</td><td>"+$mf+"</td></tr>");
                                                  
                                                         ////////////////insert in table post etab //////////
                                                            var xx=parseFloat($x);
                                                          // alert(xx);
                                                      $("#msg").hide();
                                                    
                                                        $("#msg").show();
                                                        
                                                        var token = $("#token").val();
                                                  $.ajax({
                                                     
                                                    type: "post",
                                                    data: "nbrposte=" + xx + "&codemat=" + codemat + "&idetab=" + idetab + "&_token=" + token ,
                                                    url:'/c-enseignant/insertpost',
                                                   
                                                    success:function(data){
                                                      $("#msg").html("classe has been inserted");
                                                      $("#msg").fadeOut(2000);
                                                     
                                                      $('#etab_table').DataTable().ajax.reload();
                                                    } , 
                                                       error:function(data) {
                                                                           alert('error'); 
                                                                           
                                                                            console.log(data);
                                                                         }
                                                  });
                                                   ////////////////////////
                                                        });
                                                     
         
                                                    }
                                                 });
                       
                                     
         
         
                                    });
                                    
                                         
                          } , 
                         error:function(response) {
                             alert('error');
                             console.log(response);
                         }
                      });
                 
                     
             
         
         }
         
         
         
         



