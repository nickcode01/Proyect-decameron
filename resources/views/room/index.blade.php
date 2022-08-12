@extends('theme.base')


@section('content')

    <div class="container text-center">
        <h1>Listado de Tipo Habitacion</h1>
        <a href="{{ route('room.create', ['id'=>1]) }}" class="btn btn-primary">Crear Clientes</a>

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
                <th scope="col">Hotel</th>

                {{-- <th scope="col">room</th> --}}

                <th scope="col">Acciones</th>
              </tr>
            </thead>
            <tbody>
                @forelse ($rooms as $row)


              <tr>
                <th scope="row">{{$row->id}}</th>
                <td>{{$row->name}}</td>
                <td>{{$row->hotels->name}}</td>

                {{-- <td>{{$row->id}}</td> --}}
                <td>
                    <a href="{{ route('room.edit', $row ) }}" class="btn btn-warning" target="_blank" rel="noopener noreferrer">Editar</a> -
                    <form action="{{ route('room.destroy', $row) }}" method="POST" class="d-inline" >
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Estas seguro de eliminar este Tipo de habitaciòn')" >Eliminar</button>

                    </form></td>
              </tr>

              @empty
              <tr>
                <td colspan='3'>No hay registros</td>
              </tr>

                @endforelse
            </tbody>
          </table>
          {{ $rooms->links()}}

    </div>

@endsection

