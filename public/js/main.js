


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
                  //$('#niv').empty();
                  //$('#sect').empty();
                 // $('#sect').append('<option value="0" disabled selected>selectioner section</option>');

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
      
       var nbc = $('#nbc').val();
       var etab = $('#etab').val();
       var niv = $('#niv').val();
      alert(etab);
      alert(niv);
      alert(nbc);
     /* $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },*/
 
        $.ajax({
              type: "POST",
              url: '/insertclasse',
              data: { 'nbc':nbc,
              'etab':etab,
              'niv':niv ,
             "_token": "{{ csrf_token() }}"
      },  
              dataType:'json', 
               success:function(data)
                 {
                  alert('classe insert successfully');
                 
                                 
                  } , 
                 error:function() {
                     alert('error');
                     console.error();
                     
                 }
                });
 }



 //////////////////////// partie saisie classe college ajax ////////////////
   
 

 
function myFunction1c() {
  


//var id = document.getElementById('sect');
    
     var idetab = $('#etab').val();
    alert(idetab);


     $.ajax({
            type: "Get",
         
            url: 'gettablec',
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

////////////insert classe
 
function myFunction2c() {
  


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


 //////////////////////// partie saisie classe pilote lycee ajax ////////////////
   
 
function myFunction1p() {
  


//var id = document.getElementById('sect');
    
     var idetab = $('#etab').val();
    alert(idetab);


     $.ajax({
            type: "Get",
         
            url: 'gettablep',
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

////////////insert classe
 
function myFunction2p() {
  


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

 //////////////////////// partie saisie classe pilote ajax ////////////////

 function myFunction1pl() {
  


  //var id = document.getElementById('sect');
      
       var idetab = $('#etab').val();
      alert(idetab);
  
  
       $.ajax({
              type: "Get",
           
              url: 'gettablep',
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
  
  ////////////insert classe
   
  function myFunction2pl() {
    
  
  
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
  