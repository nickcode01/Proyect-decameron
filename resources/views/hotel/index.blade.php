@extends('theme.base')


@section('content')

    <div class="container text-center">
        <h1>Listado de Hoteles</h1>
        <a href="{{ route('hotel.create', ['id'=>1]) }}" class="btn btn-primary">Crear Hotel</a>

        @if (Session::has('mensaje'))

        <div class="alert alert-info my-5">
            {{Session::get('mensaje')}}
        </div>


        @endif

        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Nit</th>
                <th scope="col">Direccion</th>
                {{-- <th scope="col">room</th> --}}

                <th scope="col">Acciones</th>
              </tr>
            </thead>
            <tbody>
                @forelse ($hotels as $row)


              <tr>
                <th scope="row">{{$row->id}}</th>
                <td>{{$row->name}}</td>
                <td>{{$row->nit}}</td>
                <td>{{$row->address}}</td>
                {{-- <td>{{$row->id}}</td> --}}
                <td>
                    <a href="{{ route('hotel.edit', $row ) }}" class="btn btn-warning" target="_blank" rel="noopener noreferrer">Editar</a> -
                    <form action="{{ route('hotel.destroy', $row) }}" method="POST" class="d-inline" >
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Estas seguro de eliminar este Hotel')" >Eliminar</button>

                    </form></td>
              </tr>

              @empty
              <tr>
                <td colspan='3'>No hay registros</td>
              </tr>

                @endforelse
            </tbody>
          </table>
          {{ $hotels->links()}}

    </div>

@endsection

