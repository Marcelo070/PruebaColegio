<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Notas</title>
</head>

<body>
    <h1 class="text-center"> Notas </h1>
    
    <div class="p-5 table-responsive">
        <a href="{{ route('alumnos.index')}}"><button class="btn btn-primary" href="{{ route('alumnos.index')}}">Regresar</button></a>
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th scope="col">Curso</th>
                    <th scope="col">Nota PC1</th>
                    <th scope="col">Nota PC2</th>
                    <th scope="col">Nota PC3</th>
                    <th scope="col">Nota Parcial</th>
                    <th scope="col">Nota Final</th>
                    <th scope="col">Promedio final</th>
                    <th scope="col">Editar</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($notas as $row)
                    <tr>
                        <td>{{ $row->CUR_nombre }}</td>
                        <td>{{ $row->NOT_pc1 }}</td>
                        <td>{{ $row->NOT_pc2 }}</td>
                        <td>{{ $row->NOT_pc3 }}</td>
                        <td>{{ $row->NOT_parcial }}</td>
                        <td>{{ $row->NOT_final }}</td>
                        <td>
                                {{ 
                                    ($row->NOT_pc1+ $row->NOT_pc2+$row->NOT_pc3+$row->NOT_parcial+($row->NOT_final)*2)/5
                                }}
                        </td>

                        <td>
                            <a href="" data-bs-toggle="modal"
                                data-bs-target="#modalEditar{{ $row->CUR_nombre }}"><i class="bi bi-pencil"></i></a>
                        </td>
                        <!-- Modal Modificar-->
                        <div class="modal fade" id="modalEditar{{ $row->CUR_nombre }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Editar notas</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('notas.update') }}" method="post">
                                            @csrf
                                            <div style="display:none">
                                                <input type="text" name="ALU_id" value="{{ $row->ALU_id }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1"
                                                    class="form-label">PC 1</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                    name="newPC1" value="{{ $row->NOT_pc1 }}">

                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1"
                                                    class="form-label">PC 2</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                    name="newPC2" value="{{ $row->NOT_pc2 }}">

                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1"
                                                    class="form-label">PC 3</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                    name="newPC3" value="{{ $row->NOT_pc3 }}">

                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1"
                                                    class="form-label">Practica parcial</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                    name="newParcial" value="{{ $row->NOT_parcial }}">

                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1"
                                                    class="form-label">Practica final</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                    name="newFinal" value="{{ $row->NOT_final }}">

                                            </div>
                                            <div class="mb-3" style="display:none">
                                             @php
                                            
                                            if(($row->CUR_nombre)=="Matematicas"){
                                                $curso=1;
                                            }
                                            if(($row->CUR_nombre)=="Lenguaje"){
                                                $curso=3;
                                            }
                                            if(($row->CUR_nombre)=="Geografia"){
                                                $curso=2;
                                            }
                                            @endphp
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                    name="newCurso" 
                                                    value="{{ $curso }}">
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
