<?php

namespace App\Http\Controllers;
use App\Etab ;
use App\Niveau;
use App\Classe;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PiloteController extends Controller
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
       ->where('etab.typeetab','=','40')
       ->Orwhere('etab.typeetab','=','50')
       
       ->get();


       
     return view('pilotes.index', compact('data'));
    }

    
    public function getTablep(Request $request){
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
        ->select('niveau.libniv','niveau.codeniv','etab.libetab','classe.nbclasse' )
        ->get();

 return response ($data);
      //  echo json_encode($data);
       //exit;
    }
    
    public function saisiep(Request $request)
    {
        $idd=$request->get('nameetab');

        
        $data1 = DB::table('etab')
       ->join('typeetab', 'typeetab.codetype', '=', 'etab.typeetab')
       ->join('delegation', 'delegation.code', '=', 'etab.delegation')
       
       ->select('etab.codeetab as id','etab.libetab' )
       ->where('etab.typeetab','=','40')
       ->Orwhere('etab.typeetab','=','50')
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
        return view('pilotes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pilote =new Etab([
            'codeetab'=>$request->get('codeetab'),
           'libetab'=>$request->get('nameetab'),
           'dre'=>$request->get('dre'),
           'categorie'=>$request->get('categorie'),
           'typeetab'=>$request->get('typeetab'),
           'delegation'=>$request->get('delegation'),
           
           
       ]);
       $pilote->save();
      //dd($produit);
      

      
     
        
           
        return redirect()->route('pilotes.index')
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

        
      return view('pilotes.show', compact('data'));
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
       return view('pilotes.edit', compact('data'));
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
        $pilote = Etab::findOrFail($id);
        //$produit2 = ProductLang;

       
        $pilote->libetab = $request->get('nameetab');
       

        //$produit->id_supplier = $request->get('namep');
       
       

        
              
              $pilote->save();
        return redirect()->route('pilotes.index')->with('success', 'Data Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Etab $pilote)
    {
        $pilote->delete();
        return redirect()->route('pilotes.index')
        ->with('success','etablissement deleted successfully');
    }
}
