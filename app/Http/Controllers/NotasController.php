<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\TryCatch;

class NotasController extends Controller
{
    public function show($id)
    {
        $notas = DB::select("SELECT alumnos.ALU_id,cursos.CUR_nombre,notas.NOT_pc1,
        notas.NOT_pc2,notas.NOT_pc3,notas.NOT_parcial,notas.NOT_final from notas
        inner join alumnos on notas.ALU_id=alumnos.ALU_id
        inner join cursos on notas.CUR_id = cursos.CUR_id where notas.ALU_id=$id");
        return view("notas")->with("notas", $notas);
    }
    
    
    public function update(Request $request)
    {
        try {
            $sql = DB::update(
                "UPDATE notas join cursos on notas.CUR_id = cursos.CUR_id
            set notas.NOT_pc1=?,
            notas.NOT_pc2=?,
            notas.NOT_pc3=?,
            notas.NOT_parcial=?,
            notas.NOT_final=? where notas.ALU_id=? and notas.CUR_id=?",
                [
                    $request->newPC1,
                    $request->newPC2,
                    $request->newPC3,
                    $request->newParcial,
                    $request->newFinal,
                    $request->ALU_id,
                    $request->newCurso
                ]
            );
        } catch (\Throwable $th) {
            $sql = 0;
        }
        if ($sql == true) {
            return back()->with("Editado", "Alumno editado");
        } else {
            return back()->with("No editado", "Error al editar");
        }
    }
}
