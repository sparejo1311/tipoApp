@extends('app.base')

@section('content')
<div>
    @if ($errors->any())
        <div class="alert alert-danger">
            The Type has not been saved, please correct the errors.
        </div>
        @error('update')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    @endif
    <form action="{{ url('tipo/' . $tipo->id) }}" method="post">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="nombre">Type name</label>
            <input value="{{ old('nombre', $tipo->nombre) }}" required type="text" minlength="2" maxlength="100" class="form-control" id="nombre" name="nombre" placeholder="Type name">
            @error('nombre')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="descripcion">Type description</label>
            <input value="{{ old('descripcion', $tipo->descripcion) }}" required type="text" min="2" class="form-control" id="descripcion" name="descripcion" placeholder="Type price">
            @error('descripcion')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">edit</button>
        &nbsp;
        <a href="{{ url('tipo') }}" class="btn btn-primary">back</a>
    </form>
</div>
@endsection