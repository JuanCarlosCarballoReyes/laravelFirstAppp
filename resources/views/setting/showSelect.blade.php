@extends('app.base')

@section('title', 'section')

@section('content')

<!---- crear 3 selects --->
<select name = "pais" id = "pais" class = "form-select">
    <option hidden select value = "$nbsp">Selecciona el pais:</option>
    @foreach ($paises as $value => $label)
    <option value="{{ $value }}" {{ $country == $value ? 'selected' : ''}} >{{ $label }} ></option>
    @endforeach
</select>
<br>

<select name = "provincias" id = "provincias" class = "form-select">
    <option disable select value = "$nbsp">Selecciona la provincia:</option>
    @foreach ($provincias as $value => $label)
    <option value="{{ $value }}" {{ $country == $value ? 'selected' : ''}} >{{ $label }} ></option>
    @endforeach
</select>
<br>

<select name = "country" id = "country" class = "form-select">
    @foreach ($countries as country)
    <option value="{{ $$country -> code }}" > {{ $country->name }} </option>
    @endforeach
</select>
<br>


@endsection