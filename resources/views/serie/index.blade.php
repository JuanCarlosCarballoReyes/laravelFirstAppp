@extends('app.base')

@section('title', 'Argo Create Serie') 

@section('content')

<div class="table-responsive small">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Year</th> 
                <th scope="col">Seasons</th>
                <th scope="col">Duracion</th>
                <th scope="col">Protagonista</th>
                <th scope="col">Genero</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
           
            @foreach($series as $serie)
                <tr>
                    <td>{{ $serie->id }}</td>
                    <td>{{ $serie->title }}</td>
                    <td>{{ $serie->year }}</td>
                    <td>{{ $serie->seasons }}</td>
                    <td>{{ $serie->duracion }}</td>
                    <td>{{ $serie->protagonista }}</td>
                    <td>{{ $serie->genero }}</td>
                    <td>
                        <a href="{{ url('serie/' . $serie->id) }}" class="btn btn-primary">View</a>
                        <a href="{{ url('serie/' . $serie->id . '/edit')}}" class="btn btn-primary">Edit</a> 
                        <a data-url="{{ url('serie/' . $serie->id) }}" class="btn-secondary btn hrefDelete" href="">Delete</a>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a class="btn-primary btn" href="{{ url('serie/create') }}" >Link to create</a>
    <form id = "formDelete" action = "{{ url ('serie/ . $serie->id') }}"  method = "post"> 
    @csrf
    @method('delete')
    </form>
</div>

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

@endsection