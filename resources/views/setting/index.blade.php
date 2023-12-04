@extends('app.base')

@section('title','Argo Create Movie')

@section('content')

<form action="{{ url('setting') }}" method="post">
    
    @method('put')    
    @csrf
    
    <div>
        Behaviour after inserting new serie
    </div>
    
    <input class="form-check-input" type="radio" id="showserie" name="afterInsert" 
        value="show serie" @if(session('afterInsert', 'show serie') == 'show serie') checked @endif/>
    <label class="form-check-label" for="showMovie">
        Show all serie list
    </label>
    <br>
    <input class="form-check-input" type="radio" id="createMovie" name="afterInsert" 
        value="show create form" @if(session('afterInsert', 'show serie') == 'show create form') checked @endif/>
    <label class="form-check-label" for="createMovie">
        Show create serie form
    </label>
    
    <br><br>

    <label for="editMovie">Behaviour after inserting new serie</label>
    <select name="editMovie" id="editMovie" class="form-select" aria-label="Default select example">
        <option selected hidden>Select</option>
        <option value="EditMovie">Show all serie list</option>
        <option value="showMovie">Show create serie form</option>
    </select>
    <br>
    <button type="submit" class="btn btn-primary">Save setting</button>
    
</form>

@endSection