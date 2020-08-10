
<head>

	<meta charset="UTF-8">
	
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/menucss.css')}}">
  
<!--===============================================================================================-->
</head>


<div class="dropdown">
<nav class="  navbar-fixed-top  relative   btn-rounded">

        
            

  <ul>
    
   <li class="deroulant  "><a href="#">Lycée &ensp;</a>
  
      <ul class="sous">
         
	   <li><a href="{{ route('lycees.index') }}">Liste des lycées</a></li>
        <li><a href="{{ url('saisie_classe_lycee') }}">Saisie des classes</a></li>
		<li><a href="msection.php">Les sections</a></li>
			 
		 <li><a href="b_etab_mat.php">Besoins par matiere</a></li>
         <li><a href="b_lycee.php">Besoins par etablissement</a></li>
		 
      </ul>
    
   
	
	 <li class="deroulant"><a href="#">Collèges &ensp;</a>
      <ul class="sous">
       
        <li><a href="{{ route('colleges.index') }}">Liste des collèges </a></li>
		 <li><a href="">Saisie des classes</a></li>
		 <li><a href="">les besoins</a></li>
        
      </ul>
    </li>
	
	<li class="deroulant"><a href="#">Collèges techniques&ensp;</a>
      <ul class="sous">
       <li><a href="{{ route('piloteslycee.index') }}">Liste des collèges techniques </a></li>
		 <li><a href="">Saisie des classes</a></li>
		  <li><a href="">les besoins</a>
		  
		  
		  
		  </li>
        
        
      </ul>
    </li>
	<li class="deroulant"><a href="#">Etablissement pilote&ensp;</a>
      <ul class="sous">
       <li><a href="{{ route('pilotes.index') }}">Liste Etablissement pilote </a></li>
		 <li><a href="">Saisie des classes</a></li>
        
        
      </ul>
  </ul>
  </nav>
  </div>  
  






