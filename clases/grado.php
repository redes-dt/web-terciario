<?php

require_once('db.php');

class Grado extends DB
{
    protected $Id_Grado;
    public $Grado;
    public $Division;

    public function get($Id_Grado = '')
    {
        $this->query = "SELECT Id_Grado,
                                Grado,
                                Division
								FROM grado
                                WHERE Id_Grado = $Id_Grado";
        $this->get_results_from_query();
        if (count($this->rows) == 1) {
            foreach ($this->rows[0] as $propiedad => $valor) {
                $this->$propiedad = $valor;
            }
        }
    }

    public function set($grado_data = array())
    {
        if (array_key_exists('Id_Grado', $grado_data)) {
            $this->get($grado_data['Id_Grado']);
            if ($grado_data['Id_Grado'] != $this->Id_Grado) {
                foreach ($grado_data as $campo => $valor) {
                    $$campo = $valor;
                }
                $this->query = "INSERT INTO grado (Grado,Division) 
    								VALUES ('$Grado',
                                            '$Division')";
                $this->execute_single_query();
            }
        }
    }

    public function edit($grado_data = array())
    {
        foreach ($grado_data as $campo => $valor) {
            $$campo = $valor;
        }
        $this->query = "UPDATE grado 
    					SET Grado ='$Grado', 
                            Division ='$Division'  
    					WHERE Id_Grado = '$Id_Grado'";
        $this->execute_single_query();
    }

    public function delete($Id_Grado = '')
    {
        $this->query = "DELETE FROM grado
						WHERE Id_Grado = '$Id_Grado'";
        $this->execute_single_query();
    }

    public function getGradoCarrera($id)
    {
        $this->query = "SELECT g.Grado, c.Id_Carrera
                        FROM alumno a
                        JOIN alumno_grado ag ON a.Id_Alumno = ag.Id_Alumno
                        JOIN grado g ON ag.Id_Grado = g.Id_Grado
                        JOIN alumno_carrera ac ON a.Id_Alumno = ac.Id_Alumno
                        JOIN carrera c ON ac.Id_Carrera = c.Id_Carrera
                        WHERE a.Id_Alumno = $id";
        $this->get_results_from_query();
        if (count($this->rows) == 1) {
            foreach ($this->rows[0] as $propiedad => $valor) {
                $this->$propiedad = $valor;
            }
        }
    }

    public function getCantInsGrado()
    {
        $this->query = "SELECT g.Detalle  , COALESCE(COUNT(i.Id_Inscripcion), 0) AS CantidadInscriptos
                        FROM grado g 
                        LEFT JOIN inscripcion i ON g.Id_Grado = i.Id_Grado AND DAY(i.FechaHora) = DAY(now())
                        GROUP BY g.Detalle ";
        $this->get_results_from_query();
        return $this->rows;
    }
}
