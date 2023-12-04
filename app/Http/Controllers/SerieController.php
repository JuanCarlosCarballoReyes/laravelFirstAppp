<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;

class SerieController extends Controller
{
    public function index()
    {
       $serie = Serie::all();
       
      return view('serie.index', ['series' => $serie]);
    }

    public function create()
    {
        
        return view('serie.create');
    }

    public function store(Request $request)
    {
        //1º generar el objeto para guardar
        
        $serie = new Serie($request->all());

        try{
            //2º intentar guardar el objeto
             $result = $serie->save();
             //3º si se guarda volver algun sitio : index , create
             
             
             $checked = session('afterInsert', 'show serie');
            $target='serie';
        
        if($checked != 'show serie'){
            $target = $target.'/create';
           
        }
             return redirect($target)->with(['message'=> 'The serie has been saved']);//no hace falta poner url('serie/create') ya que lo hace redirect
        }catch(\Exception $e){
             //4º Si no lo he guardado volver para tras con los datoas rellenos
            return back() -> withInput()->withErrors(['message'=> 'The serie has not been saved']);//volvemos para atras con los datos que me llegan 
        } 
    }
    public function show (Serie $serie)
    {
       
         return view('serie.show', ['serie' => $serie]);
    }

    public function edit(Serie $serie)
    {
      return view('serie.edit', ['serie' => $serie]);
    }

    public function update(Request $request, Serie $serie)
    {
        try {
             // opcion 1
             $result = $serie -> update ($request -> all());
             // opcion 2
             // $serie -> fill($request -> all());
             // $result = $serie -> save();
             return redirect ('serie') -> with (['message' => 'The serie has been updated']);
        } catch (\Exception $e){
            // dd($e);
            return back() -> withInput() -> withErrors(['message' => 'The serie has not been saved.']);
        }
    }

    public function destroy(Serie $serie) {
        try {
            $serie->delete();
            return redirect('serie')->with(['message' => 'The serie has been deleted.']);
        } catch(\Exception $e) {
            return back()->withErrors(['message' => 'The serie has not been deleted.']);
        }
    }
}
