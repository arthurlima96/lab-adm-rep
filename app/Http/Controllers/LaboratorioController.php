<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Laboratorio;
use App\Http\Requests\LaboratorioFormRequest;
class LaboratorioController extends Controller
{
   private $laboratorio;


   public function __construct(Laboratorio $lab)
   {
     $this->laboratorio = $lab;
   }

    public function index()
    {
      $title = "Listagem dos Laboratórios";
      $labs = $this->laboratorio->paginate(5); // select * from laboratorios
      return view('indexLab', compact('labs','title')); //chama a view que vai listar
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $title = "Cadastro de Laboratórios";
      return view('create-update-lab',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LaboratorioFormRequest $request)
    {
      //pega tudo no formulario
      $dataform = $request->all();

      $insert = $this->laboratorio->create($dataform);

      if ($insert) {
        return redirect()->route('laboratorios.index');
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
      $lab = $this->laboratorio->find($id);
      $title = "Visualizar Laboratório";

      return view('showLab',compact('lab', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $lab = $this->laboratorio->find($id);
      $title = "Atualizar Laboratório: {$lab->nome}";

    return view('create-update-lab',compact('title','lab'));
    }


    public function update(LaboratorioFormRequest $request, $id)
    {
      $dataform = $request->all();
      $lab = $this->laboratorio->find($id);

      $update = $lab->update($dataform);

      if($update)
      {
        return redirect()->route('laboratorios.index');
      }else{
        return redirect()->route('laboratorios.edit',$id)->with(['errors'=>'Falha ao Editar!']);
      }
    }


  
    public function destroy($id)
    {
      $lab = $this->laboratorio->find($id);
      $delete = $lab->delete();

        if ($delete) {
          return redirect()->route('laboratorios.index');
        }else{
          return redirect()->route('laboratorios.show',$id)->with(['errors'=>'Falha ao deletar']);
        }
    }
}
