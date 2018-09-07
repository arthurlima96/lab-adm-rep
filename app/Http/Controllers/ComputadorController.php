<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Computador;
use App\Laboratorio;
use App\Http\Requests\ComputadorFormRequest;

class ComputadorController extends Controller
{

  private $computador;



      public function __construct(Computador $comp)
      {
        $this->computador = $comp;
      }

    public function index()
    {
      $title = "Listagem dos Computadores";
      $comps = $this->computador->paginate(5); // select * from computadores

      return view('indexComp', compact('comps','title')); //chama a view que vai listar
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $title = "Cadastro de Computadores";
      $labs = Laboratorio::all();


      return view('create-update-comp',compact('title','labs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ComputadorFormRequest $request)
    {
      $dataform = $request->all();

      $dataform['ativo'] = (!isset($dataform['ativo'])) ? 0 : 1;

       //dd($dataform);
      $insert = Computador::create($dataform);

      if ($insert) {
        return redirect()->route('computadores.index');
      } else {
        return redirect()->back();
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
      $comp = $this->computador->find($id);
      $title = "Visualizar Computador";

      return view('showComp',compact('comp', 'title'));
    }


    public function edit($id)
    {
      $comp = $this->computador->find($id);
      $title = "Atualizar Computador: {$comp->nome}";
      $labs = Laboratorio::all();
      return view('create-update-comp',compact('title','comp','labs'));
    }


    public function update(ComputadorFormRequest $request, $id)
    {
      $dataform = $request->all();
      $comp = $this->computador->find($id);

      $update = $comp->update($dataform);

      if($update)
      {
        return redirect()->route('computadores.index');
      }else{
        return redirect()->route('computadores.edit',$id)->with(['errors'=>'Falha ao Editar!']);
      }
    }


    public function destroy($id)
    {
      $comp = $this->computador->find($id);
      $delete = $comp->delete();

        if ($delete) {
          return redirect()->route('computadores.index');
        }else{
          return redirect()->route('computadores.show',$id)->with(['errors'=>'Falha ao deletar']);
        }
    }
}
