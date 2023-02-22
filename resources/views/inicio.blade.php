<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Alumnos Colegio</title>
</head>

<body>
    <h1 class="text-center"> Alumnos</h1>
    @if (session('Agregado'))
        <div>{{ session('Agregado') }}</div>
    @endif
    @if (session('No agregado'))
        <div>{{ session('No agregado') }}</div>
    @endif
    @if (session('Editado'))
        <div>{{ session('Editado') }}</div>
    @endif
    @if (session('No editado'))
        <div>{{ session('No editado') }}</div>
    @endif
    @if (session('Eliminado'))
        <div>{{ session('Eliminado') }}</div>
    @endif
    @if (session('No eliminado'))
        <div>{{ session('No eliminado') }}</div>
    @endif
    <div class="p-5 table-responsive">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAgregar">Agregar Alumno</button>
        <div class="modal fade" id="modalAgregar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar alumno</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('alumnos.create') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Nombres</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="newNombre">

                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Apellidos</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="newApellido">

                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Fecha Nacimiento</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="newFechaNaci">

                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Sexo</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="newSexo">

                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Agregar</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nombres</th>
                    <th scope="col">Apellidos</th>
                    <th scope="col">Fecha nacimiento</th>
                    <th scope="col">Sexo</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Notas</th>
                    <th scope="col">Matricular en cursos Alumnos nuevos</th>
                    <th scope="col">Eliminar</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($alumnos as $row)
                    <tr>
                        <th scope="row" name="">{{ $row->ALU_id }}</th>
                        <td>{{ $row->ALU_nombres }}</td>
                        <td>{{ $row->ALU_apellidos }}</td>
                        <td>{{ $row->ALU_fechNaci }}</td>
                        <td>{{ $row->ALU_sexo }}</td>

                        <td>
                            <a href="" data-bs-toggle="modal"
                                data-bs-target="#modalEditar{{ $row->ALU_id }}"><i class="bi bi-pencil"></i></a>
                        </td>

                        <td>
                            <a href="{{ route('notas.index', $row->ALU_id) }}"><i class="bi bi-book"></i></a>
                        </td>
                        <td>
                            <a href="{{ route('alumnos.createCourse', $row->ALU_id)}}"><i class="bi bi-book"></i></a>
                        </td>
                        <td>
                            <a href="{{ route('alumnos.delete', $row->ALU_id) }}"><i class="bi bi-trash"></i></a>
                        </td>

                        <!-- Modal Modificar-->
                        <div class="modal fade" id="modalEditar{{ $row->ALU_id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Editar datos del alumno</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('alumnos.update') }}" method="post">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1"
                                                    class="form-label">Identificacion</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                    name="newId" value="{{ $row->ALU_id }}">

                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Nombres</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                    name="newNombre" value="{{ $row->ALU_nombres }}">

                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Apellidos</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                    name="newApellido" value="{{ $row->ALU_apellidos }}">

                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Fecha
                                                    Nacimiento</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                    name="newFechaNaci" value="{{ $row->ALU_fechNaci }}">

                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Sexo</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                    name="newSexo" value="{{ $row->ALU_sexo }}">

                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cerrar</button>
                                        <button type="submit" class="btn btn-primary">Modificar</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                @endforeach
                        


                </tr>

            </tbody>
        </table>
    </div>







    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>
