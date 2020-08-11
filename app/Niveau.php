<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Niveau extends Model
{
    protected $primaryKey = 'codeniv';
    protected $table="niveau";
    protected $fillable = [
        'codeniv','libniv','sect','created_at','updated_at'
    ];
}
/*
$('#sect').on(change(function(){


    var id = $(this).val();
      alert(id);
      $('#niv').empty();
      $('#niv').append('<option value="0" disabled selected>Processing.....</option>');
      
   
      // AJAX request 
      $.ajax({
        url: 'getNiveau/'+id,
        type: 'Get',
        dataType: 'json',
   
        success: function(response){
         var response=JSON.parse(response);
       console.log(response);
   
         $('#niv').empty();
         $('#niv').append('<option value="0" disabled selected>selectioner niveau</option>');
      
      response.foreach(element =>{
       $('#niv').append('<option value="${element['codeniv']}" >${element['libniv']}</option>');
   
      });
        }
     });
   });
   
   }); */