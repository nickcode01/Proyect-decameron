@extends('theme.base')


@section('content')

    <div class="container text-center">


        @if (isset($hotel))
            <h1>Editar Hotel</h1>
        @else
            <h1>Crear Hotel</h1>
        @endif





        {{-- <a href="{{ route('hotel.create', ['id'=>1]) }}" class="btn btn-primary">Crear hoteles</a> --}}
        @if (isset($hotel))
            <form action="{{ route('hotel.update',$hotel)  }}" method="post">
                @method('PUT')
        @else
            <form action="{{ route('hotel.store')  }}" method="post">
        @endif



            @csrf
            <div class="form-row">
              <div class="col-md-12 mb-3">
                <label for="name">Nombre Hotel</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Nombre" value="{{ old('name') ?? @$hotel->name }}" >
                @error('name')
                <p class="form-text text-danger">{{ $message }}</p>
                @enderror

              </div>

              <div class="col-md-12 mb-3">
                <label for="nit">Nit</label>
                <input type="text" class="form-control" id="nit" name="nit" placeholder="Nit del hotel " value="{{ old('nit') ?? @$hotel->nit }}" >
                @error('nit')
                <p class="form-text text-danger">{{ $message }}</p>
                @enderror
              </div>
              <div class="col-md-12 mb-3">
                <label for="city">Ciudad</label>
                <input type="text" class="form-control" id="city" name="city" placeholder="Ciudad del hotel " value="{{ old('city') ?? @$hotel->city }}" >
                @error('city')
                <p class="form-text text-danger">{{ $message }}</p>
                @enderror
              </div>
              <div class="col-md-12 mb-3">
                <label for="num_room">Numero de Habitaciones</label>
                <input type="number" class="form-control" id="num_room" name="num_room" placeholder="Numero de habitaciones " value="{{ old('num_room') ?? @$hotel->num_room }}" >
                @error('num_room')
                <p class="form-text text-danger">{{ $message }}</p>
                @enderror
              </div>
              <div class="col-md-12 mb-3">
                <label for="address">address</label>
                <input type="text" class="form-control" id="address" name="address" placeholder="address del hotel " value="{{ old('address') ?? @$hotel->address }}" >
                @error('address')
                <p class="form-text text-danger">{{ $message }}</p>
                @enderror
              </div>


            </div>

            @if (isset($hotel))
            <button class="btn btn-primary" type="submit">Editar hotel</button>
        @else
        <button class="btn btn-primary" type="submit">Guardar hotel</button>
        @endif

          </form>

    </div>

@endsection

