<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $responsavel = Auth::user()->id;
        $empresas = DB::table('empresas')
            ->join('empresas_usuarios', 'empresas_usuarios.id_empresa', '=', 'empresas.id')
            ->where('empresas_usuarios.id_usuario', '=', $responsavel)
            ->select('empresas.*')
            ->orderBy('empresas.id', 'ASC')
        ->paginate(10);

        return view('empresas.index')->with('empresas', $empresas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('empresas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();

        
        //TODO testar pegar ID com Auth::id();
        $id_criador = Auth::user()->id;

        $request->request->add(["cnpj_mascara" => $this->Mask("##.###.###/####-##", $request->cnpj)]);
       /*  $request->request->add(["id_responsavel" => $responsavel->id]); */
        

        $empresa = Empresa::create($request->all());


        DB::table('empresas_usuarios')->insert([
            [
             'id_usuario' => $id_criador,
             'id_empresa' => $empresa->id,
             'ck_tipo_cadastro' => "E",
             'created_at' => Carbon::now(),
            ]
        ]);


        DB::commit();


        return redirect('/empresas');
    }

    function Mask($mask,$str){

        $str = str_replace(" ","",$str);
    
        for($i=0;$i<strlen($str);$i++){
            $mask[strpos($mask,"#")] = $str[$i];
        }
    
        return $mask;
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function show(Empresa $empresa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function edit(Empresa $empresa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empresa $empresa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empresa $empresa)
    {
        //
    }
}
