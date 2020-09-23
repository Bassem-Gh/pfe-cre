//const { data } = require("jquery");



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

      var table = $('#simple_data').DataTable();
      var idetab = $('#etab').val();
           $.ajax({
                    type: "Get",
                    url: '/lycees/gettable',
                    data: { 'idetab':idetab },   
                    dataType:'json', 
               success:function(data)
                 {
                  $('#tab').empty();
                  $('#niv').empty();
                  $('#niv').append('<option value="0" disabled selected>selectioner niveau</option>');
                  
                    $.each(data, function(idx,elem){
                 
                      table.row.add([ elem.libetab, elem.libniv ,elem.nbclasse, elem.libmat ,elem.nbh,(elem.nbh*elem.nbclasse)]);
                      table.draw();
                     // $('#niv').append('<option value='+elem.codeniv+'>'+elem.libniv+'</option>');

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
       $("#msg").html("تم تعديل عدد الأقسام بنجاح");
        $("#msg").fadeOut(2000);
       
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
     var i=0;
     $.ajax({
            type: "Get",
         
            url: '/colleges/gettablec',
            data: { 'idetab':idetab },   
            dataType:'json', 
             success:function(response)
               {
                alert('success');
                $('#tab').empty();
                $('#niv').empty();
                $('#niv').append('<option value="0" disabled selected>selectioner niveau</option>');
                  $.each(response['data'], function(idx,elem){
               
                $('#tab').append('<tr><td>'+elem.libetab+'</td><td>'+elem.libniv+'</td><td>'+elem.nbclasse+'</td><td>'+elem.libmat+'</td><td>'+elem.nbh+'</td><td>'+(elem.nbh*elem.nbclasse)+'</td></tr>');
              /*  i+=1;
                if(i<=3)*/
             //    { $('#niv').append('<option value='+elem.codeniv+'>'+elem.libniv+'</option>'); }
                  
               });
                    
               
               $.each(response['data2'], function(idx2,elem2){ 
               
                $('#niv').append('<option value='+elem2.codeniv+'>'+elem2.libniv+'</option>'); 
                
             });

                } , 
               error:function() {
                 console.log(response);
                   alert('error');
               }
            });
       
           
   

}






 //////////////////////// partie saisie classe pilote lycee ajax //////////////////////////////////////////
   
 
function myFunction1p() {
  
  var idetab = $('#etab').val();
     var i=0;
     $.ajax({
            type: "Get",
         
            url: '/pilotes/gettableP',
            data: { 'idetab':idetab },   
            dataType:'json', 
             success:function(data)
               {
                alert('success');
                $('#tab').empty();
                $('#niv').empty();
                $('#niv').append('<option value="0" disabled selected>selectioner niveau</option>');
                  $.each(response['data'], function(idx,elem){ 
               
                $('#tab').append('<tr><td>'+elem.libetab+'</td><td>'+elem.libniv+'</td><td>'+elem.nbclasse+'</td><td>'+elem.libmat+'</td><td>'+elem.nbh+'</td><td>'+(elem.nbh*elem.nbclasse)+'</td></tr>');
               /*  i+=1;
                if(i<=3) */
              //    $('#niv').append('<option value='+elem.codeniv+'>'+elem.libniv+'</option>'); 
                  
               });
               ////////////////

                 $.each(response['data2'], function(idx2,elem2){ 
               
                  $('#niv').append('<option value='+elem2.codeniv+'>'+elem2.libniv+'</option>'); 
                  
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
     // alert(idetab);
  
  
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
  



        //function myFunction4() {
          $('#mat').on('change', function(){

 
          var idop = document.getElementById("mat");
              
                 var ccod = $('#mat').val();
                // alert(ccod);

         
                $.ajax({
                      type: "Get",
                      url: '/lycees/Get_data',
                      data: { 'ccod':ccod },   
                      dataType:'json', 
                       success:function(response)
                         {
                            
                             $('#datatable-buttons').DataTable().clear();
                            
                       
                                     var x=0;
                                       var table = $("#datatable-buttons").DataTable();
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
                                                        
                                                         table.row.add([ elem3.id, elem3.libmat , Math.trunc(elem3.tot) , elem3.nb18 , elem3.nb16 ,elem3.nb15,elem3.nb12,elem3.nb05,(elem3.nb12 + elem3.nb15+elem3.nb16+elem3.nb18+elem3.nb05) ,$md.toFixed(2),$totsd.toFixed(2) , $x , $mf]);
                                                         table.draw();

                                                          ////////////////insert in table post etab //////////
                                                            var xx=parseFloat($x);
                                                           //alert(xx);
                                                      $("#msg").hide();
                                                    
                                                        $("#msg").show();
                                                        
                                                        var token = $("#token").val();
                                                       // alert(token);
                                                  $.ajax({
                                                     
                                                    type: "POST",
                                                    data: "nbrposte=" + xx + "&codemat=" + codemat + "&idetab=" + idetab + "&_token=" + token ,
                                                    url:'/c-enseignant/insertpost',
                                                   
                                                    success:function(data){
                                                   
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
                 
                     
             
         
         });

        
         
         
         /////////////////////////////////////////////////////////////////delete row in table
         function deleteRow(id,el) {
         
          var token = $("#token").val(); 
          var table = $('#datatable').DataTable(); // replace with your table id
          var url =$(el).attr("data-url")
          var a=$(el).closest("tr").find("td:first-child").text();

          
           Swal.fire({
             title:'هل تريد الإستمرار في حذف:',
             text: a,
             type: 'warning',
             showCancelButton: true,
             confirmButtonText: 'نعم ',
             cancelButtonText: 'لا!',
             confirmButtonClass: 'btn btn-success mt-2',
             cancelButtonClass: 'btn btn-danger ml-2 mt-2',
             buttonsStyling: false
           }).then(function (result) {
             if (result.value) {
              $.ajax({ 
                url:url+id, 
                type: "DELETE", 
                data : {'_method':'DELETE','_token':token ,'id': id },
                success:function (response) {
               //   alert( table.row($(el).parents("tr")));
                table.row($(el).parents("tr")).remove().draw();
                  
                 // $("#success").html(response.message)
                  Swal.fire({
                    title: 'تم الحذف',
                    text: '',
                    type: 'success'
                  });
                },
                    
                error : function() {
                 // console.log(data);
                  Swal.fire({
                    title: 'ooops?',
                    text: response,
                   type: 'error',
                    timer:'1500'
                  })
                  
                }
              });
             
             } else if ( // Read more about handling dismissals
             result.dismiss === Swal.DismissReason.cancel) {
               Swal.fire({
                 title: 'تم الإلغاء',
                 text: '',
                 type: 'error'
               });
             }
           });
        
          }

////////////////////////////////////////////////////////////////////////////edit modal
////////////////////////////////

  function editRow(id,el) {
         
    var token = $("#token").val(); 
    var table = $('#datatable').DataTable(); // replace with your table id
    var url =$(el).attr("data-url");
    var nomEtab =$(el).attr("data-name");
    var a=$(el).closest("tr").find("td:first-child").text();
    //var table = $('#datatable').DataTable({});
    //alert(id);
    Swal.fire({
      input: 'text',
      inputValue: a,
      title: 'تعديل إسم المؤسسة ',
      showCancelButton: true,
      confirmButtonText: 'Submit',
      showLoaderOnConfirm: true,
      confirmButtonColor: "#3b5de7",
      cancelButtonColor: "#f46a6a",
      preConfirm: function (text) {
          return new Promise(function (resolve, reject) {
              setTimeout(function () {
                  if (text === a) {
                      reject('nothing changed')
                      Swal.fire({
                        title: 'ooops?',
                        text: "nothing changed",
                       type: 'error',
                        timer:'2500'
                      })
                  } else {
                      resolve()
                  }
              }, 2000)
          })
      },
      allowOutsideClick: false
  }).then(function (input) {
    if (input.value){
       $.ajax({ 
        url:url+id, 
        type: "POST", 
        data : {'_token':token ,'id': id , 'nomEtab':input.value },
        success:function (response) {
        
          $(el).closest("tr").find("td:first-child").html(input.value);
         
          console.log(response);
        },  
        error : function(error) {
          console.log(error);
          /*Swal.fire({
            title: 'ooops?',
            text: "response",
           type: 'error',
            timer:'2500'
          })*/
          
        }
      });
      Swal.fire({
          type: 'success',
          title: 'تم تعديل !',
          html: a +'->' + input.value
      })
    }else if ( // Read more about handling dismissals
      input.dismiss === Swal.DismissReason.cancel) {
       /* Swal.fire({
          title: 'تم الإلغاء',
          text: '',
          type: 'error'
        });*/
    
  };
  });


  }

         
         ///////////////////////compte enseignant afficher les etab disp a partir de matiere choisi par enseignant///////////





         function getetab_user() {
    
          //var texte = JQuery(#matiere option:selected).text(); 
          var ccod = $('#matiere').val();
   //alert(ccod);
     
    
          $.ajax({
                 type: "Get",
              
                 url: '/getetab',
                 data: { 'ccod':ccod },   
                 dataType:'json', 
                  success:function(data)
                    {
               // console.log(data);
                      if (!$.trim(data)){
                      $('#etab_post_dis').empty();
                      $('#etab_post_dis').append('<option value="0" disabled selected>لا يوجد مؤسسة متاحة الآن</option>');
                    }
                    else {
                       $('#etab_post_dis').empty();
                       $('#etab_post_dis').append('<option value="0" disabled selected>اختر مؤسسة </option>');
                    
                       $.each(data, function(idx,elem){
                        var x=Math.round(elem.nbrpost);
                        //alert(x);
                     $('#etab_post_dis').append('<option value='+elem.idetab+'>'+elem.libetab +'  |   '+'   المراكز المتاحة:   '+ x +'</option>');
                  $('#mat').append('<option value='+elem.idetab+'>');
                    });
                                    
                     }} , 
                    error:function(data) {
                      alert('error');
                      // console.log(data);
                    }
                 });
            
  }
/////////////////test register ///////////////
function testregister(){
  var id =$('#unique_id').val();

$.ajax({
  type: "Get",

  url: '/registerE',
  data: { 'id':id },   
  dataType:'json', 
  success:function(data)
    {
      if (!$.trim(data)){
        alert('المعرف الوحيد خاطئ');
      }
else

    $('#f').submit();
  }
  
  });


  }
  /////////////////test unique id mouvement ///////////////////
  function testm2() {
    var id =$('#unique_id').val();
    $.ajax({
      type: "Get",

      url: '/test',
      data: { 'id':id },   
      dataType:'json', 
      success:function(data)
        {
          if (!$.trim(data)){
            alert('المعرف الوحيد خاطئ');
          }
   /* else

        $('#f').submit();*/
        }
      });
   }
/////////////////////////////////////
  function testm() { 
    //var etat =$('#etat').val();
    var id =$('#unique_id').val();
    var token = $("#token").val();
    var nbr =$('#nbrenfant').val(); 
    var datedebut =$('#datedebut').val();
    var daterecrutement =$('#daterecrutement').val();
    var notebid =$('#notebid').val();
   // alert(id);
$dt=0;
    $nbrr=0;

    let date = moment().format('D MMM, YYYY');

  //////////difference between date debut and c///////////
        var date1 = new Date(datedebut);
        var date2 = new Date(date);
        var timeDiff = Math.abs(date2.getTime() - date1.getTime());
        var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24)); 
  
/////////////difference between daterecrutement and c///////////
var date11 = new Date(daterecrutement);
var date22 = new Date(date);
var timeDiff = Math.abs(date22.getTime() - date11.getTime());
var diffDays2 = Math.ceil(timeDiff / (1000 * 3600 * 24)); 
var annee1=diffDays/360;
var annee2=diffDays2/360;

        //////////nbr enfant///////////
        if(nbr<=4)
        {
          for (i = 0; i < nbr ; i++) {
          $nbrr+=2;
        
          }
        }
        if(nbr>4 )
        {
          for (i = 0; i < 4 ; i++) {
          $nbrr+=2;
        
          }
        }
        
////////////////

        if(annee1<=2)
        {
          for (i = 0; i < annee1 ; i++) {
            $dt+=0.5;
          }
        }

        if( (annee1<=4) && (annee1>2) )
        {
          var x=annee1-2;
          for (i = 0; i < x ; i++) {
            $dt+=1;
          }
          $dt+=1;
        }

        if(annee1>5)
        {
          var y=annee1-4;
          for (i = 0; i < y ; i++) {
            $dt+=2;
          }
          $dt+=3;
        }

        $score=parseFloat($nbrr) + parseFloat(annee2) + parseFloat(notebid) + parseFloat($dt);
   alert($score);
            $.ajax({
              type: "Get",

              url: '/test',
              data: { 'id':id },   
              dataType:'json', 
              success:function(data)
                {
                  if (!$.trim(data)){
                    alert('المعرف الوحيد خاطئ');
                  }
            else

              //  $('#form-horizontal').submit();
/////////////////////////////////////

                  $.ajax({
                                                                      
                    type: "POST",
                    data: "uniqueid=" + id +"&score="+ $score + "&_token=" + token ,
                    url:'/c-enseignant/insertscore',
                  
                    success:function(data){
                    
                     // $('#s').append('<option value="0" disabled selected>selectioner niveau</option>');
                     
            // $ss=$score.toFixed(2);
             //alert($score);
           /*  if ( parseFloat($score)=NaN)

                 $('#s').val('0'); 

             else  */

                     $('#s').val( $score );
                    
                    } , 
                      error:function(data) {
                                          alert('error'); 
                                          
                                            console.log(data);
                                        }
                  }); 
//////////////////////////
                      
                  } , 
                error:function(data) {
                  console.log(data);
                   
               alert('error');
                }
              });
             
              //alert($score);
              //////////////////remplire table scoremv//////////////
            
              /////////////////////

  }
  //////////////////////delete demande de mouvement //////////////////////
  function deletemvv(id,el) {
         
    var token = $("#token").val(); 
    var table = $('#datatable').DataTable(); // replace with your table id
    var url =$(el).attr("data-url")
    
     Swal.fire({
       title:'هل تريد الإستمرار في حذف:',
       text: $(el).attr("data-id") ,
       type: 'warning',
       showCancelButton: true,
       confirmButtonText: 'نعم ',
       cancelButtonText: 'لا!',
       confirmButtonClass: 'btn btn-success mt-2',
       cancelButtonClass: 'btn btn-danger ml-2 mt-2',
       buttonsStyling: false
     }).then(function (result) {
       if (result.value) {
        $.ajax({ 
          url:url+id, 
          type: "DELETE", 
          data : {'_method':'DELETE','_token':token ,'id': id },
          success:function (response) {

            table.row($(el).parents("tr")).remove().draw();
         // alert(table.row($(el).parents("tr")).text());

           // $("#success").html(response.message)
            Swal.fire({
              title: 'تم الحذف',
              text: '',
              type: 'success'
            });
          },
              
          error : function(response) {
            console.log(response);
            Swal.fire({
              title: 'لا يمكنك الحذف لأن الملف في طور الدراسة',
              text: response,
             type: 'error',
              timer:'3500'
            })
            
          }
        });
       
       } else if ( // Read more about handling dismissals
       result.dismiss === Swal.DismissReason.cancel) {
         Swal.fire({
           title: 'تم الإلغاء',
           text: '',
           type: 'error'
         });
       }
     });
  
    }


  //////////////////////////////
