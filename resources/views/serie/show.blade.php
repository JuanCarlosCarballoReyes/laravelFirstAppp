@extends('app.base')

@section('title', 'Argo Movie')

@section('content')
<div class="table-responsive small">
    <table class="table table-striped table-sm">
        <tbody>
            <tr>
                <td>#</td>
                <td>{{ $serie->id }}</td>
            </tr>
            
            <tr>
                <td>Title</td>
                <td>{{ $serie->title }}</td>
            </tr>

            <tr>
                <td>Year</td>
                <td>{{ $serie->year }}</td>
            </tr>
            
            <tr>
                <td>Seasons</td>
                <td>{{ $serie->seasons }}</td>
            </tr>
            
            <tr>
                <td>Duracion</td>
                <td>{{ $serie->duracion }}</td>
            </tr>
            
            <tr>
                <td>Protagonista</td>
                <td>{{ $serie->protagonista }}</td>
            </tr>
            
            <tr>
                <td>Genero</td>
                <td>{{ $serie->genero }}</td>
            </tr>
        </tbody>
    </table>
    
    <a href="{{ url('serie/' . $serie->id . '/edit')}}" class="btn btn-primary">Edit</a> 
    <a data-url="{{ url('serie/' . $serie->id) }}" class="btn-secondary btn hrefDelete" href="">Delete</a>
    <a href="{{ url('serie/') }}" class="btn btn-primary">Back</a>
     
     <form id = "formDelete" action = "{{ url ('serie/ . $serie->id') }}"  method = "post"> 
    @csrf
    @method('delete')
    </form>
    
                        
    <script>
    const ahrefs = document.querySelectorAll(".hrefDelete");
    const formDelete = document.getElementById("formDelete")
    ahrefs.forEach(function(ahref){
        ahref.onclick = (event) => {
            event.preventDefault();
            if (confirm('Seguro?')) {
                let url = event.target.dataset.url;
                formDelete.action = url;
                formDelete.submit();
            }
        }
    });
    </script>           

</div>
@endsection