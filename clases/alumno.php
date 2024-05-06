<?php

require_once('db.php');

class Alumno extends DB
{
    public $Id_Alumno;
    public $DNI;
    public $Nombre;
    public $Apellido;
    public $Email;
    public $Telefono;
    public $Genero;
    public $Fecha_Nac;
    public $Nacionalidad;
    public $Direccion;
    public $Localidad;
    public $Grado;
    private $Pass;

    public function get($DNI = '')
    {
        if ($DNI != '') :
            $this->query = "SELECT Id_Alumno,
                                DNI,
                                Nombre,
                                Apellido,
                                Email,
                                Telefono,
                                Genero,
                                Fecha_Nac,
                                Nacionalidad,
                                Direccion,
                                Localidad,
                                Pass
								FROM alumno 
								WHERE DNI = '$DNI'";
            $this->get_results_from_query();
        endif;
        if (count($this->rows) == 1) {
            foreach ($this->rows[0] as $propiedad => $valor) {
                $this->$propiedad = $valor;
            }
        }
    }

    public function set($user_data = array())
    {
        if (array_key_exists('DNI', $user_data)) {
            $this->get($user_data['DNI']);
            if ($user_data['DNI'] != $this->DNI) {
                foreach ($user_data as $campo => $valor) {
                    $$campo = $valor;
                }
                $this->query = "INSERT INTO alumno (DNI, Nombre, Apellido, Email, Telefono, Genero, Fecha_Nac, Nacionalidad, Direccion, Localidad, Pass) 
                                VALUES ('$DNI',
                                        '$Nombre',
                                        '$Apellido',
                                        '$Email',
                                        '$Telefono',
                                        '$Genero',
                                        '$Fecha_Nac',
                                        '$Nacionalidad',
                                        '$Direccion',
                                        '$Localidad',
                                        '$Pass')";
                $this->execute_single_query();
            }
        }
    }

    public function edit($user_data = array())
    {
        foreach ($user_data as $campo => $valor) {
            $$campo = $valor;
        }
        $this->query = "UPDATE alumno 
    						SET DNI='$DNI', 
    							Nombre='$Nombre', 
    							Apellido='$Apellido',
                                Email='$Email',
                                Telefono='$Telefono', 
                                Genero='$Genero', 
                                Fecha_Nac='$Fecha_Nac', 
                                Nacionalidad='$Nacionalidad', 
                                Direccion='$Direccion', 
                                Localidad='$Localidad'  
    						    WHERE DNI = '$DNI'";
        $this->execute_single_query();
    }

    public function delete($DNI = '')
    {
        $this->query = "DELETE FROM alumno 
							WHERE DNI = '$DNI'";
        $this->execute_single_query();
    }

    public function verificarPassword($password)
    {
        return password_verify($password, $this->Pass);
    }

    public function asigCarrera($id, $DNI)
    {
        $this->get($DNI);
        $this->query = "INSERT INTO alumno_carrera (Id_alumno,Id_Carrera)
                        VALUES($this->Id_Alumno,$id)";
        $this->execute_single_query();
    }

    public function asigGrado($DNI)
    {
        $this->get($DNI);
        $id = rand(1, 3);
        $this->query = "INSERT INTO alumno_grado (Id_alumno,Id_Grado)
                        VALUES($this->Id_Alumno,$id)";
        $this->execute_single_query();
    }
}
