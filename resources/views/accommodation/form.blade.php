@extends('theme.base')


@section('content')

    <div class="container text-center">


        @if (isset($accommodation))
            <h1>Editar Acomodacion</h1>
        @else
            <h1>Crear Acomodacion</h1>
        @endif





        {{-- <a href="{{ route('accommodation.create', ['id'=>1]) }}" class="btn btn-primary">Crear accommodationes</a> --}}
        @if (isset($accommodation))
            <form action="{{ route('accommodation.update',$accommodation)  }}" method="post">
                @method('PUT')
        @else
            <form action="{{ route('accommodation.store')  }}" method="post">
        @endif



            @csrf
            <div class="form-row">
              <div class="col-md-12 mb-3">
                <label for="name">Nombre Acomodacion</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Nombre" value="{{ old('name') ?? @$accommodation->name }}" >
                @error('name')
                <p class="form-text text-danger">{{ $message }}</p>
                @enderror

              </div>

              <div class="col-md-12 mb-3">
                <label for="nit">Tipo select</label>
                <input type="text" class="form-control" id="nit" name="nit" placeholder="Nit del accommodation " value="{{ old('nit') ?? @$accommodation->nit }}" >
                @error('nit')
                <p class="form-text text-danger">{{ $message }}</p>
                @enderror
              </div>



            </div>

            @if (isset($accommodation))
            <button class="btn btn-primary" type="submit">Editar Acomodacion</button>
        @else
        <button class="btn btn-primary" type="submit">Guardar Acomodacion</button>
        @endif

          </form>

    </div>

@endsection

