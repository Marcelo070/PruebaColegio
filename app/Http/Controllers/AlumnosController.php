<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\TryCatch;

class AlumnosController extends Controller
{
    //Muestra los alumnos
    public function show(){
        $alumnos=DB::select('SELECT * FROM alumnos');
        return view("inicio")->with("alumnos",$alumnos);
    }
    //Agrega nuevo alumno
    public function create(Request $request){
        try {
            $sql= DB::insert("INSERT INTO alumnos (ALU_nombres,ALU_apellidos,ALU_fechNaci,ALU_sexo) VALUES (?,?,?,?)",
            [
            $request->newNombre,
            $request->newApellido,
            $request->newFechaNaci,
            $request->newSexo
            ]
                );
            
        } catch (\Throwable $th) {
            $sql=0;
        }
        if($sql==true){
            return back()->with("Agregado","Alumno agregado");
        }else{
            return back()->with("No agregado","Error al agregar");
        }
    }
    //Actualiza alumno
    public function update(Request $request){
        try {
            $sql= DB::update(" UPDATE alumnos SET ALU_nombres=?,ALU_apellidos=?,ALU_fechNaci=?,ALU_sexo=? WHERE ALU_id=? ",
            [
            $request->newNombre,
            $request->newApellido,
            $request->newFechaNaci,
            $request->newSexo,
            $request->newId
            ]);
            
            /*
            if($sql==true){
                $sql2=DB::insert("INSERT INTO notas (ALU_id,CUR_id,NOT_pc1,NOT_pc2,NOT_pc3,NOT_parcial,NOT_final)values(?,'1','','','','','')",[
                    $request->newId
                ]);
            }
            if($sql==true){
                $sql3=DB::insert("INSERT INTO notas (ALU_id,CUR_id,NOT_pc1,NOT_pc2,NOT_pc3,NOT_parcial,NOT_final)values(?,'2','','','','','')",[
                    $request->newId
                ]);
            }
            if($sql==true){
                $sql4=DB::insert("INSERT INTO notas (ALU_id,CUR_id,NOT_pc1,NOT_pc2,NOT_pc3,NOT_parcial,NOT_final)values(?,'3','','','','','')",[
                    $request->newId
                ]);
            }*/
        } catch (\Throwable $th) {
            $sql=0;
        }
        if($sql==true){
            return back()->with("Editado","Alumno editado");    
        }else{
            return back()->with("No editado","Error al editar");
        }
    }
    //Elimina alumno
    public function delete($id){
        try {
            $sql= DB::delete("DELETE FROM alumnos WHERE ALU_id='$id'");
        } catch (\Throwable $th) {
            $sql=0;
        }
        if($sql==true){
            return back()->with("Eliminado","Alumno eliminado");
        }else{
            return back()->with("No elimiado","Error al eliminar");
        }
    }
    public function createCourse($id){
        try {
            $sql    =DB::insert("INSERT INTO notas (ALU_id,CUR_id) values($id,1)");
            $sql2   =DB::insert("INSERT INTO notas (ALU_id,CUR_id) values($id,2)");
            $sql3   =DB::insert("INSERT INTO notas (ALU_id,CUR_id) values($id,3)");
        } catch (\Throwable $th) {
            $sql=0;
        }
    }
}
