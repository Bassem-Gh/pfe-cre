<?php

namespace App\Http\Controllers;
use App\Etab ;
use App\Niveau;
use App\Classe;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class CollegeController extends Controller
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
       ->where('etab.typeetab','=','20')
       ->get();


       
     return view('colleges.index', compact('data'));
    }
    

    public function getTablec(Request $request){
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

        
        $data2 = DB::table('classe')
        ->join('niveau', 'niveau.codeniv', '=', 'classe.codeniv')
       // ->join('matiere', 'matiere.codniv', '=', 'niveau.codeniv')
        ->join('etab', 'etab.codeetab', '=', 'classe.codetab')
        ->where('etab.codeetab', '=', $gg)
        ->select('niveau.libniv','niveau.codeniv')
       
        ->get( );

        $response= [
            'data' => $data,
             'data2' => $data2
         ];

  return response($response);
      //  echo json_encode($data);
       //exit;
    }
    
    public function insertclassec(Request $request)
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

    public function saisiec(Request $request)
    {
        $idd=$request->get('nameetab');

        
        $data1 = DB::table('etab')
       ->join('typeetab', 'typeetab.codetype', '=', 'etab.typeetab')
       ->join('delegation', 'delegation.code', '=', 'etab.delegation')
       
       ->select('etab.codeetab as id','etab.libetab' )
       ->where('etab.typeetab','=','20')
       ->get();


    return view('colleges.saisieclasse', compact('data1'));
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('colleges.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
     /* $this->validate($request, [
       // 'name' => ['required', 'string', 'max:255'],
        'codeetab' => ['required'],
        'libetab' => ['required'],
       // 'dre' => ['required'],
        'categorie' => ['required'],
        'typeetab' => ['required'],
        'delegation' => ['required'],
       // 'email' => ['required', 'string', 'email', 'max:255', 'unique:etab'],
        //'password' => ['required', 'string', 'min:8', 'confirmed'],
    ]);*/

        $college =new Etab([
            'codeetab'=>$request->get('codeetab'),
           'libetab'=>$request->get('nameetab'),
          'dre'=>'91',
           'categorie'=>$request->get('categorie'),
           'typeetab'=>$request->get('typeetab'),
           'delegation'=>$request->get('delegation'),
           
           
       ]);
       $college->save();
      //dd($produit);
      

      
     
        
           
        return redirect()->route('colleges.index')
        ->with('success','etablissement created successfully.');
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
        return view('colleges.show', compact('data'));
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
       return view('colleges.edit', compact('data'));
       

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
       /*  $college = Etab::findOrFail($id);
        //$produit2 = ProductLang;

       
        $college->libetab = $request->get('nomEtab');
       

        //$produit->id_supplier = $request->get('namep');
              
              $college->save(); */
              $update_etab = Etab::findOrFail($id);
            //  $id= $request->id;
              $lib=$request->nomEtab; 
            $update_etab = DB::table("Etab")->where( 'codeetab', $id) 
            ->update([
                'libetab'=>$lib,  
                ]);
       // return redirect()->route('colleges.index')->with('success', 'Data Updated');  
       return response()->json([
        'data' => 'Data deleted successfully!'
      ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $etablissement = Etab::find($id);
      $etablissement->delete();
      return response()->json([
        'message' => 'Data deleted successfully!'
      ]);
     /* if($etablissement){
        echo "done";
      }else{
        echo "Error";
      }*/
}
}
