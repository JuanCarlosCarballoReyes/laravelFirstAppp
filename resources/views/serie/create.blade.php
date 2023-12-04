@extends('app.base')

@section('title','Argo Create Movie')

@section('content')

<h2>Crear Serie</h2>


<form action="{{ url('serie') }}" method="post">

    <!-- Solución de error por CSRF -->
    <!--<input type="hidden" name="_method" value="post">-->
    <!--<input type="hidden" name="_token" value="{{ csrf_token() }}">-->
    @csrf

    <!-- Inputs del formulario -->

    <div class="mb-3">

        <label for="title" class="form-label">Serie title</label>

        <input type="text" class="form-control" id="title" name="title" maxlength="60" required value="{{old('title')}}">

    </div>

    <div class="mb-3">

        <label for="year" class="form-label">Serie year</label>

        <input type="integer" class="form-control" id="year" name="year" step="1" min="1" max="9999" required value="{{old('year')}}">

    </div>

    <div class="mb-3">

        <label for="seasons" class="form-label">Serie seasons</label>

        <input type="text" class="form-control" id="seasons" name="seasons" maxlength="50" value="{{old('seasons')}}">

    </div>

    <div class="mb-3">

        <label for="duracion" class="form-label">Serie duracion</label>

        <input type="text" class="form-control" id="duracion" name="duracion" maxlength="20" required value="{{old('duracion')}}">

    </div>
    
    <div class="mb-3">

        <label for="protagonista" class="form-label">Serie protagonista</label>

        <input type="text" class="form-control" id="protagonista" name="protagonista" maxlength="50" required value="{{old('protagonista')}}">

    </div>
    
    <div class="mb-3">

        <label for="genero" class="form-label">Serie genero</label>

        <input type="text" class="form-control" id="genero" name="genero" maxlength="50" required value="{{old('genero')}}">

    </div>
    
    <button type="submit" class="btn btn-success">Submit</button>

</form>

@endSection