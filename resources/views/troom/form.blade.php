@extends('theme.base')


@section('content')

    <div class="container text-center">


        @if (isset($troom))
            <h1>Editar troom</h1>
        @else
            <h1>Crear troom</h1>
        @endif





        {{-- <a href="{{ route('troom.create', ['id'=>1]) }}" class="btn btn-primary">Crear troomes</a> --}}
        @if (isset($troom))
            <form action="{{ route('troom.update',$troom)  }}" method="post">
                @method('PUT')
        @else
            <form action="{{ route('troom.store')  }}" method="post">
        @endif



            @csrf
            <div class="form-row">
              <div class="col-md-12 mb-3">
                <label for="name">Nombre troom</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Nombre" value="{{ old('name') ?? @$troom->name }}" >
                @error('name')
                <p class="form-text text-danger">{{ $message }}</p>
                @enderror

              </div>

              <div class="col-md-12 mb-3">
                <label for="nit">Nit</label>
                <input type="text" class="form-control" id="nit" name="nit" placeholder="Nit del troom " value="{{ old('nit') ?? @$troom->nit }}" >
                @error('nit')
                <p class="form-text text-danger">{{ $message }}</p>
                @enderror
              </div>
              <div class="col-md-12 mb-3">
                <label for="city">Ciudad</label>
                <input type="text" class="form-control" id="city" name="city" placeholder="Ciudad del troom " value="{{ old('city') ?? @$troom->city }}" >
                @error('city')
                <p class="form-text text-danger">{{ $message }}</p>
                @enderror
              </div>
              <div class="col-md-12 mb-3">
                <label for="num_room">Numero de Habitaciones</label>
                <input type="number" class="form-control" id="num_room" name="num_room" placeholder="Numero de habitaciones " value="{{ old('num_room') ?? @$troom->num_room }}" >
                @error('num_room')
                <p class="form-text text-danger">{{ $message }}</p>
                @enderror
              </div>
              <div class="col-md-12 mb-3">
                <label for="address">address</label>
                <input type="text" class="form-control" id="address" name="address" placeholder="address del troom " value="{{ old('address') ?? @$troom->address }}" >
                @error('address')
                <p class="form-text text-danger">{{ $message }}</p>
                @enderror
              </div>


            </div>

            @if (isset($troom))
            <button class="btn btn-primary" type="submit">Editar troom</button>
        @else
        <button class="btn btn-primary" type="submit">Guardar troom</button>
        @endif

          </form>

    </div>

@endsection

