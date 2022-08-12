@extends('theme.base')


@section('content')

    <div class="container text-center">
        <h1>Listado de Acomodaciones</h1>
        <a href="{{ route('accommodation.create', ['id'=>1]) }}" class="btn btn-primary">Crear Clientes</a>

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
                <th scope="col">Tipo Habitacion</th>

                {{-- <th scope="col">accommodation</th> --}}

                <th scope="col">Acciones</th>
              </tr>
            </thead>
            <tbody>
                @forelse ($accommodations as $row)


              <tr>
                <th scope="row">{{$row->id}}</th>
                <td>{{$row->name}}</td>
                <td>{{$row->room_id}}</td>

                {{-- <td>{{$row->id}}</td> --}}
                <td>
                    <a href="{{ route('accommodation.edit', $row ) }}" class="btn btn-warning" target="_blank" rel="noopener noreferrer">Editar</a> -
                    <form action="{{ route('accommodation.destroy', $row) }}" method="POST" class="d-inline" >
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
          {{ $accommodations->links()}}

    </div>

@endsection

