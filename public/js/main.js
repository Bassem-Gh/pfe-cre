


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
        
       var nbc = $('#nbc').val();
       var etab = $('#etab').val();
       var niv = $('#niv').val();
      alert(etab);
      alert(niv);
      alert(nbc);
     
      $('#form_output').html('');
      var url = $(this).attr("data-link");
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
        
      
        $.ajax({
              type: "POST",
              url: '/insertclasse',
              
              data: { 'nbc':nbc,
              'etab':etab,
              'niv':niv ,
             //'_token' :  $('input[name="_token"]').val(),
        },
              contentType: false,
              processData: false,                        
              dataType:'json', 
                  success:function(data)
                    {
                            $('#form_output').html(data.success);
                          $('#etab_table').DataTable().ajax.reload();
                          
                      } , 
                      error:function(data) {
                                          alert('error'); 
                                          var errors = data.responseJSON;
                                          console.log(errors);
                                        }
                });
 }



 //////////////////////// partie saisie classe colle  e ajax ////////////////
   
 

 
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
  





  function test() {
  
  
    $("#msg").hide();
    //alert("working");

      $("#msg").show();

      var nbc = $('#nbc').val();
      var etab = $('#etab').val();
      var niv = $('#niv').val();
     
      var token = $("#token").val();
      alert(nbc);
      alert(etab);
      alert(niv);
      $.ajax({
        type: "post",
        data: "nbc=" + nbc + "&etab=" + etab + "&niv=" + niv + "&_token=" + token ,
        url:'/insertclasse',
        success:function(data){
          $("#msg").html("classe has been inserted");
          $("#msg").fadeOut(2000);
        } , 
            error:function(data) {
                               alert('error'); 
                               
                                console.log(data);
                             }
      });
  
  }