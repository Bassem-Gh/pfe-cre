


function myFunction3() {
    

 
    //var id = document.getElementById('sect');
        
         var ccod = $('#sect').val();
        alert(ccod);
    
   
         $.ajax({
                type: "Get",
             
                url: 'getNiveau',
                data: { 'ccod':ccod },   
                dataType:'json', 
                 success:function(data)
                   {
                    alert('success');
                       /* var response=JSON.parse(response);
                    console.log(response);*/
                 
                      $('#niv').empty();
                      $('#niv').append('<option value="0" disabled selected>selectioner niveau</option>');
                   
                      $.each(data, function(idx,elem){
                     //$('#niv').append('<option value="1">ezrez</option>');
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
    

 
  //var id = document.getElementById('sect');
      
       var idetab = $('#etab').val();
      alert(idetab);
  
 
       $.ajax({
              type: "Get",
           
              url: 'gettable',
              data: { 'idetab':idetab },   
              dataType:'json', 
               success:function(data)
                 {
                  alert('success');
                  $('#tab').empty();
                     /* var response=JSON.parse(response);
                  console.log(response);*/
               
    
         
                    $.each(data, function(idx,elem){
                 
                  $('#tab').append('<tr><td>'+elem.libetab+'</td><td>'+elem.libniv+'</td><td>'+elem.nbclasse+'</td></tr>');
                    
                      
                 });
                                 
                  } , 
                 error:function() {
                     alert('error');
                 }
              });
         
             
     
 
 }

 ////////////insert classe
   
function myFunction2() {
    

 
  //var id = document.getElementById('sect');
      
       var idetab = $('#nbc').val();
      alert(idetab);
  
 
       $.ajax({
              type: "post",
           
              url: 'insertclasse',
              data: { 'idetab':idetab },   
              dataType:'json', 
               success:function(data)
                 {
                  alert('success','classe insert successfully');
                 
                                 
                  } , 
                 error:function() {
                     alert('error');
                 }
              });
         
             
     
 
 }
   
   
   