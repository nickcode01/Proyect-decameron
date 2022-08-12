@extends('theme.base')


@section('content')

    <div class="container text-center">
        <h1>Listado de Habitacion</h1>
        <a href="{{ route('troom.create', ['id'=>1]) }}" class="btn btn-primary">Crear Habitacion</a>

        @if (Session::has('mensaje'))

        <div class="alert alert-info my-5">
            {{Session::get('mensaje')}}
        </div>


        @endif

        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                {{-- <th scope="col">Hotel</th> --}}
                <th scope="col">habitacion</th>
                <th scope="col">acomodacion</th>
                <th scope="col">numero habitaciones</th>
                {{-- <th scope="col">room</th> --}}

                <th scope="col">Acciones</th>
              </tr>
            </thead>
            <tbody>
                @forelse ($trooms as $row)


              <tr>
                <th scope="row">{{$row->id}}</th>
                {{-- <td>{{$row->hotels->id}}</td> --}}
                <td>{{$row->room_id}}</td>
                <td>{{$row->accommodation_id}}</td>
                <td>{{$row->num_room}}</td>
                <td>
                    <a href="{{ route('troom.edit', $row ) }}" class="btn btn-warning" target="_blank" rel="noopener noreferrer">Editar</a> -
                    <form action="{{ route('troom.destroy', $row) }}" method="POST" class="d-inline" >
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Estas seguro de eliminar este troom')" >Eliminar</button>

                    </form></td>
              </tr>

              @empty
              <tr>
                <td colspan='3'>No hay registros</td>
              </tr>

                @endforelse
            </tbody>
          </table>
          {{ $trooms->links()}}

    </div>

@endsection

