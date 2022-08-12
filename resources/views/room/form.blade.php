@extends('theme.base')


@section('content')

    <div class="container text-center">


        @if (isset($room))
            <h1>Editar Tipo habitacion</h1>
        @else
            <h1>Crear Tipo habitacion</h1>
        @endif





        {{-- <a href="{{ route('room.create', ['id'=>1]) }}" class="btn btn-primary">Crear roomes</a> --}}
        @if (isset($room))
            <form action="{{ route('room.update',$room)  }}" method="post">
                @method('PUT')
        @else
            <form action="{{ route('room.store')  }}" method="post">
        @endif



            @csrf
            <div class="form-row">
              <div class="col-md-12 mb-3">
                <label for="name">Nombre Tipo</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Nombre" value="{{ old('name') ?? @$room->name }}" >
                @error('name')
                <p class="form-text text-danger">{{ $message }}</p>
                @enderror

              </div>

              <div class="col-md-12 mb-3">
                <label for="nit">Hotel select</label>
                <input type="text" class="form-control" id="nit" name="nit" placeholder="Nit del room " value="{{ old('nit') ?? @$room->nit }}" >
                @error('nit')
                <p class="form-text text-danger">{{ $message }}</p>
                @enderror
              </div>



            </div>

            @if (isset($room))
            <button class="btn btn-primary" type="submit">Editar room</button>
        @else
        <button class="btn btn-primary" type="submit">Guardar room</button>
        @endif

          </form>

    </div>

@endsection

