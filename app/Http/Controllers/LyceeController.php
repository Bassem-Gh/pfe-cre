<?php

namespace App\Http\Controllers;
use App\Etab;
use App\Niveau;
use App\Classe;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LyceeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $data = DB::table('etab')
       ->join('typeetab', 'typeetab.codetype', '=', 'etab.typeetab')
       ->join('delegation', 'delegation.code', '=', 'etab.delegation')
       
       ->select('etab.codeetab as id','etab.libetab' )
       ->where('etab.typeetab','=','10')
       ->get();


       
     return view('lycees.index', compact('data'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function saisie(Request $request)
    {
        $idd=$request->get('nameetab');

        
        $data1 = DB::table('etab')
       ->join('typeetab', 'typeetab.codetype', '=', 'etab.typeetab')
       ->join('delegation', 'delegation.code', '=', 'etab.delegation')
       
       ->select('etab.codeetab as id','etab.libetab' )
       ->where('etab.typeetab','=','10')
       ->get();

      

   //dd($idd);

       ////////////take theh name of the section//////
       $data2 = DB::table('section')
       
       ->where('section.codesection', '>=','1')


       ->select('section.codesection','section.libsection' )
       ->get();


       
    return view('lycees.saisieclasse', compact('data1','data2'));
    }


    public function getTable(Request $request){
        if(Request()->ajax()) {
            $id = $request->all();
        }
        $gg=$id['idetab'];
       // dd($gg);
    	// Fetch Users by Departmentid
        $data = DB::table('classe')->distinct()
        ->join('niveau', 'niveau.codeniv', '=', 'classe.codeniv')
        ->join('matiere', 'matiere.codniv', '=', 'niveau.codeniv')
        ->join('etab', 'etab.codeetab', '=', 'classe.codetab')
        ->where('etab.codeetab', '=', $gg)
        ->select('niveau.libniv','etab.libetab','classe.nbclasse' )
        ->get();

 return response ($data);
      //  echo json_encode($data);
       //exit;
    }

    public function getNiveau(Request $request){
        if(Request()->ajax()) {
            $id = $request->all();
        }
        $gg=$id['ccod'];
       // dd($gg);
    	// Fetch Users by Departmentid
        $data = DB::table('niveau')
        ->where('niveau.sect', '=',$gg)
        ->select('niveau.codeniv','niveau.libniv' )
        ->get();
 return response ($data);
      //  echo json_encode($data);
       //exit;
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lycees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $lycee =new Etab([
            'codeetab'=>$request->get('codeetab'),
           'libetab'=>$request->get('nameetab'),
           'dre'=>$request->get('dre'),
           'categorie'=>$request->get('categorie'),
           'typeetab'=>$request->get('typeetab'),
           'delegation'=>$request->get('delegation'),
           
       ]);
       $lycee->save();
      //dd($produit);
        return redirect()->route('lycees.index')
        ->with('success','etablissement created successfully.');
    }

    public function insertclasse(Request $request)
    { /*
        $success_output = '';

        if(Request()->ajax()) {
            $id = $request->all();
        }
       $nbc=$id['nbc'];
       $etab=$id['etab'];
       $niv=$id['niv'];
        dd($id);
        $data =new Classe([
           'nbclasse'=>$nbc,  
           'codetab'=>$etab,
           'codeniv'=>$niv,

        ]);
      $data->save();
      $success_output = '<div class="alert alert-success">Data Inserted</div>';
      
      $output = array(
        'success'   =>  $success_output
    );
    
    echo json_encode($output);
    //return response ()->json ( $data );
    //return Response::json($data); */


    $nbc = $request->nbc;
    $etab = $request->etab;
    $niv = $request->niv;
    /*$add_product = DB::table('classe')
    ->where('codetab',$etab,'codeniv',$niv)
    ->update(
        [ 'nbclasse'=>$nbc ]
      );*/
    $add_product = DB::table("classe")->where( 'codetab', $etab) 
    ->Orwhere('codeniv',$niv)
    ->update([
        'nbclasse'=>$nbc,  
      
        ]);

    if($add_product){
      echo "done";
    }else{
      echo "Error";
    }

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    public function show($id)
    {
        $data = DB::table('classe')
        ->join('niveau', 'niveau.codeniv', '=', 'classe.codeniv')
        ->join('matiere', 'matiere.codniv', '=', 'niveau.codeniv')
        ->join('etab', 'etab.codeetab', '=', 'classe.codetab')
        ->where('etab.codeetab', '=', $id)
        ->select('matiere.libmat','matiere.nbh','niveau.codeniv','etab.codeetab as cdtab','etab.libetab','niveau.libniv','classe.nbclasse' )
        ->get();

        //$x='matiere.nbh'*'classe.nbclasse' ;

       /*
        $data2 = DB::table('matiere')
        ->join('niveau', 'niveau.codeniv', '=', 'matiere.codniv') 
        ->select('matiere.libmat','matiere.nbh') 
        //->where('matiere.codniv','classe.codeniv')
        ->get();*/
      
       //dd($data);
        
      return view('lycees.show', compact('data'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
        $data = DB::table('etab')
       ->join('typeetab', 'typeetab.codetype', '=', 'etab.typeetab')
       ->join('delegation', 'delegation.code', '=', 'etab.delegation')
       ->select('etab.codeetab as id','etab.libetab' )
       ->where('etab.codeetab', '=', $id)
       ->get();
       $produit = Etab::findOrFail($id);
       //dd($produit);
       return view('lycees.edit', compact('data'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $lycee = Etab::findOrFail($id);
        //$produit2 = ProductLang;

       
        $lycee->libetab = $request->get('nameetab');
       

        //$produit->id_supplier = $request->get('namep');
       
       

        
              
              $lycee->save();
        return redirect()->route('lycees.index')->with('success', 'Data Updated');    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Etab $lycee)
    {
        $lycee->delete();
        return redirect()->route('lycees.index')
        ->with('success','etablissement deleted successfully');
    }
}
