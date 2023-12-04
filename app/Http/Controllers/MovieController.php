<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $movies = Movie::all();
       
   return view('movie.index', ['movies' => $movies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('movie.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
        public function store(Request $request)
    {
        //1º generar el objeto para guardar

        $movie = new Movie($request->all());
        
         
        try{
            //2º intentar guardar el objeto
             $result = $movie->save();
             //3º si se guarda volver algun sitio : index , create
             
             
             $checked = session('afterInsert', 'show movies');
            $target='movie';
        
        if($checked != 'show movies'){
            $target = $target.'/create';
           
        }
             return redirect($target)->with(['message'=> 'The movie has been seaved']);//no hace falta poner url('movie/create') ya que lo hace redirect
        }catch(\Exception $e){
             //4º Si no lo he guardado volver para tras con los datoas rellenos
            return back() -> withInput()->withErrors(['message'=> 'The movie has not been seaved']);//volvemos para atras con los datos que me llegan 
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {
       
         return view('movie.show', ['movie' => $movie]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
      return view('movie.edit', ['movie' => $movie]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $movie)
    {
           try {
        // Actualizar los campos con los nuevos datos del formulario
        $movie->fill($request->all());
        
        // Intentar guardar los cambios
        $result = $movie->save();
        return redirect('movie')->with(['message'=> 'the movie has been update']);
        // Si se guardó correctamente, redirigir a alguna vista, por ejemplo, la lista de películas
    
    } catch (\Exception $e) {
        // En caso de error al guardar, regresar a la página anterior con los datos para corregir
        return back()->withInput();
    }
    }
   

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */

  public function destroy(Movie $movie)
    {
        try {
            $movie->delete();
            return redirect('movie')->with(['message' => 'The movie has been deleted.']);
        } catch(\Exception $e) {
            return back()->withErrors(['message' => 'The movie has not been deleted.']);
        }
    }
}