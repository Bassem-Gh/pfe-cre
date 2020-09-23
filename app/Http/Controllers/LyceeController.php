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
    public function indexbetab()
    {   
        $data = DB::table('etab')
       ->join('typeetab', 'typeetab.codetype', '=', 'etab.typeetab')
       ->join('delegation', 'delegation.code', '=', 'etab.delegation')
       
       ->select('etab.codeetab as id','etab.libetab' )
       //->where('etab.typeetab','=','20')
       ->get();
     
     return view('lycees.b_mat_par_etab', compact('data'));
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
       //->where('etab.typeetab','=','10')
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
        ->select('niveau.libniv','niveau.codeniv','etab.libetab','classe.nbclasse' ,'matiere.libmat','matiere.nbh')
        ->distinct()
        ->get( );

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
    { 

    $nbc = $request->nbc;
    $etab = $request->etab;
    $niv = $request->niv;

    $fetch = DB::table('classe')
    ->where('codetab',$etab)->where('codeniv',$niv)
    ->select('nbclasse')->get();

    foreach($fetch  as $raw)
    {
        $n=$raw->nbclasse;
    }
 
    $add_product = DB::table("classe")->where( 'codetab', $etab) 
    ->where('codeniv',$niv)
    ->update([
        'nbclasse'=>$nbc+$n,  
      
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

    public function gettableb(Request $request)
    {
     
       $reql = DB::table('classe') 
      
        ->join('matiere', 'matiere.codniv', '=', 'classe.codeniv')
        ->join('etab', 'etab.codeetab', '=', 'classe.codetab')
       
       ->select( 'matiere.libmat','matiere.codemat')
       ->distinct()
     
      ->where('etab.codeetab','=',$request->get('ccod')) 
       ->get();

    
                $data = DB::table('classe') 
                ->join('niveau', 'niveau.codeniv', '=', 'classe.codeniv')
                ->join('matiere', 'matiere.codniv', '=', 'classe.codeniv')
                ->join('etab', 'etab.codeetab', '=', 'classe.codetab')
                ->join('typeetab', 'typeetab.codetype', '=', 'etab.typeetab')
                ->join('delegation', 'delegation.code', '=', 'etab.delegation')
                ->join("effectif",function($join){
                    $join->on("effectif.codeetab","=","etab.codeetab")
                        ->on("effectif.codemat","=","matiere.codemat");
                })
                ->where('etab.codeetab','=',$request->get('ccod')) 
               ->select('effectif.nb12','effectif.nb15','effectif.nb16','effectif.nb18','effectif.nb05','matiere.libmat','matiere.codemat','matiere.nbh','etab.codeetab as id','etab.libetab','classe.nbclasse')
               ->distinct()
         
               ->get();
            
              
      

     
$response= [
    'reql' => $reql,
    'data' => $data
];

    
       return    response()->json($response);
    }
    public function gettableb2(Request $request)
    {
        
        $data2 = DB::table('classe') 
        ->join('niveau', 'niveau.codeniv', '=', 'classe.codeniv')
        ->join('matiere', 'matiere.codniv', '=', 'classe.codeniv')
        ->join('etab', 'etab.codeetab', '=', 'classe.codetab')
        ->join('typeetab', 'typeetab.codetype', '=', 'etab.typeetab')
        ->join('delegation', 'delegation.code', '=', 'etab.delegation')
        ->join("effectif",function($join){
            $join->on("effectif.codeetab","=","etab.codeetab")
                ->on("effectif.codemat","=","matiere.codemat");
        })
        ->where('matiere.codemat','=',$request->get('codemat')) 
        ->where('etab.codeetab','=',$request->get('ccod')) 
       ->select(DB::raw("SUM(matiere.nbh*classe.nbclasse)as tot"),'effectif.nb12','effectif.nb15','effectif.nb16','effectif.nb18','effectif.nb05','matiere.libmat','matiere.codemat','matiere.nbh','etab.codeetab as id','etab.libetab','classe.nbclasse')
       
       ->distinct()

     
     
       ->get();
       return    response()->json($data2);

    }
    /////////////
    
    public function gettableb3(Request $request)
    {
     
       $reql = DB::table('classe') 
      
        ->join('matiere', 'matiere.codniv', '=', 'classe.codeniv')
        ->join('etab', 'etab.codeetab', '=', 'classe.codetab')
       
       ->select( 'etab.libetab','etab.codeetab')
       ->distinct()
     
      ->where('matiere.codemat','=',$request->get('ccod')) 
       ->get();

    
                $data = DB::table('classe') 
                ->join('niveau', 'niveau.codeniv', '=', 'classe.codeniv')
                ->join('matiere', 'matiere.codniv', '=', 'classe.codeniv')
                ->join('etab', 'etab.codeetab', '=', 'classe.codetab')
                ->join('typeetab', 'typeetab.codetype', '=', 'etab.typeetab')
                ->join('delegation', 'delegation.code', '=', 'etab.delegation')
                ->join("effectif",function($join){
                    $join->on("effectif.codeetab","=","etab.codeetab")
                        ->on("effectif.codemat","=","matiere.codemat");
                })
                ->where('matiere.codemat','=',$request->get('ccod')) 
               ->select('effectif.nb12','effectif.nb15','effectif.nb16','effectif.nb18','effectif.nb05','matiere.libmat','matiere.codemat','matiere.nbh','etab.codeetab as id','etab.libetab','classe.nbclasse')
               ->distinct()
         
               ->get();
            
              
      

     
$response= [
    'reql' => $reql,
    'data' => $data
];

    
       return    response()->json($response);
    }

    public function gettableb4(Request $request)
    {
        
        $data2 = DB::table('classe') 
        ->join('niveau', 'niveau.codeniv', '=', 'classe.codeniv')
        ->join('matiere', 'matiere.codniv', '=', 'classe.codeniv')
        ->join('etab', 'etab.codeetab', '=', 'classe.codetab')
        ->join('typeetab', 'typeetab.codetype', '=', 'etab.typeetab')
        ->join('delegation', 'delegation.code', '=', 'etab.delegation')
        ->join("effectif",function($join){
            $join->on("effectif.codeetab","=","etab.codeetab")
                ->on("effectif.codemat","=","matiere.codemat");
        })
        ->where('matiere.codemat','=',$request->get('ccod')) 
        ->where('etab.codeetab','=',$request->get('codeetab')) 
       ->select(DB::raw("SUM(matiere.nbh*classe.nbclasse)as tot"),'effectif.nb12','effectif.nb15','effectif.nb16','effectif.nb18','effectif.nb05','matiere.libmat','matiere.codemat','matiere.nbh','etab.codeetab as id','etab.libetab','classe.nbclasse')
       
       ->distinct()

     
     
       ->get();
       return    response()->json($data2);

    }
    ////////
    public function getmat(){
        $data = DB::table('matiere') 
        ->select( 'matiere.libmat','matiere.codemat')
        ->distinct()
    
        ->get();
        return view('lycees.b_mat_par_mat', compact('data'));

    }

}
