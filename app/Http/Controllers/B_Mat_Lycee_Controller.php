<?php

namespace App\Http\Controllers;
use App\Etab ;
use App\Niveau;
use App\Classe;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class B_Mat_Lycee_Controller extends Controller
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
       //->where('etab.typeetab','=','20')
       ->get();
     
        

       
     return view('b_mat_lycee.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function gettable(Request $request)
    {
        //$id=$request->get('data');
        //dd($id[ccod]);
        if(Request()->ajax()) {
            $id = $request->all();
        }
        $gg=$id['ccod'];
        //print($id['ccod']);
        //echo("<script>console.log('PHP: " . $id['ccod'] . "');</script>");

       // dd(json_encode($data));
       /* $data = DB::table('etab')
       ->join('typeetab', 'typeetab.codetype', '=', 'etab.typeetab')
       ->join('delegation', 'delegation.code', '=', 'etab.delegation')
       ->join("effectif",function($join){
        $join->on("effectif.codeetab","=","etab.codeetab")
            ->on("effectif.codemat","=","matiere.codemat");
    })
       ->select('effectif.nb12','effectif.nb15','effectif.nb16','effectif.nb18','effectif.nb05','etab.codeetab as id','etab.libetab' )
       ->where('etab.typeetab','=','10')
      ->where('etab.codeetab','=',$gg) 
       ->get();*/

       ///////////
       
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
        ->where('etab.typeetab','=','10')
        ->where('etab.codeetab','=',$gg) 
        ->where('matiere.codemat','=','101') 

        ->select('effectif.nb12','effectif.nb15','effectif.nb16','effectif.nb18','effectif.nb05','matiere.libmat','matiere.nbh','niveau.codeniv','etab.codeetab as id','etab.libetab','niveau.libniv','classe.nbclasse' )
        ->groupBy('etab.codeetab')
        //->sum('matiere.nbh' * *classe.nbclasse');
        //->selectRaw("avg('matiere.nbh') as toth")
        //->groupBy('effectif.nb12','effectif.nb15','effectif.nb16','effectif.nb18','effectif.nb05','matiere.libmat','matiere.nbh','niveau.codeniv','etab.codeetab','etab.libetab','niveau.libniv','classe.nbclasse')
        // ->select(DB::raw('sum(matiere.nbh', '+', 'classe.nbclasse) as toth'))
       // ->selectRaw('sum(effectif.nb12+effectif.nb15+effectif.nb16+effectif.nb18+effectif.nb05) as toth')
        ->sum('matiere.nbh');
       //->get();

     
    
 
return dd($data);



    }

   

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = DB::table('etab')
        ->join('typeetab', 'typeetab.codetype', '=', 'etab.typeetab')
        ->join('delegation', 'delegation.code', '=', 'etab.delegation')
        
        ->select('etab.codeetab as id','etab.libetab' )
        //->where('etab.typeetab','=','20')
        ->get();
        return view('b_mat_lycee.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
