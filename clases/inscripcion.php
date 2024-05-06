<?php

require_once('db.php');

class Inscripcion extends DB
{
    protected $Id_Inscripcion;
    public $FechaHora;
    public $Id_Alumno;
    public $Id_Carrera;
    public $Id_Grado;

    public function get($Id_Alumno = '')
    {
        $this->query = "SELECT Id_Inscripcion,
                                FechaHora,
                                Id_Alumno,
                                Id_Carrera,
                                Id_Grado
								FROM inscripcion
                                WHERE Id_Alumno = $Id_Alumno
                                ORDER BY FechaHora DESC
                                LIMIT 1";
        $this->get_results_from_query();
        if (count($this->rows) == 1) {
            foreach ($this->rows[0] as $propiedad => $valor) {
                $this->$propiedad = $valor;
            }
        }
    }

    public function set($id = '', $id_C = '', $grado = '')
    {
        $this->query = "INSERT INTO inscripcion (FechaHora,Id_Alumno,Id_Carrera,Id_Grado)
                        VALUES(now(),$id,$id_C,$grado)";
        $this->execute_single_query();
    }

    public function edit($inscripcion_data = array())
    {
        foreach ($inscripcion_data as $campo => $valor) {
            $$campo = $valor;
        }
        $this->query = "UPDATE inscripcion 
    					SET Id_Alumno ='$Id_Alumno', 
                            Id_Carrera ='$Id_Carrera',
                            ID_Grado ='$Id_Grado'  
    					WHERE Id_Inscipcion = '$Id_Inscripcion'";
        $this->execute_single_query();
    }

    public function delete($Id_Inscripcion = '')
    {
        $this->query = "DELETE FROM inscipcion 
							WHERE Id_Inscripcion = '$Id_Inscripcion'";
        $this->execute_single_query();
    }

    public function cargaUC($id_alumno, $id_uc)
    {
        $this->get($id_alumno);
        $this->query = "INSERT INTO inscripcion_uc(Id_Inscripcion,Id_UC)
        VALUES($this->Id_Inscripcion,$id_uc)";
        $this->execute_single_query();
    }

    public function getDatosInscripcion($id_alumno)
    {
        $this->get($id_alumno);
        $this->query = "SELECT a.Nombre,a.Apellido,i.FechaHora,c.Carrera,g.Detalle  
                        FROM inscripcion i 
                        INNER JOIN alumno a ON i.Id_Alumno = a.Id_Alumno
                        INNER JOIN carrera c ON i.Id_Carrera = c.Id_Carrera 
                        INNER JOIN alumno_grado ag ON i.Id_Alumno = ag.Id_Alumno 
                        INNER JOIN grado g ON ag.Id_Grado = g.Id_Grado
                        WHERE i.Id_Inscripcion = $this->Id_Inscripcion";
        unset($this->rows);
        $this->get_results_from_query();
        if (count($this->rows) == 1) {
            foreach ($this->rows[0] as $propiedad => $valor) {
                $this->$propiedad = $valor;
            }
        }
    }

    public function getUCInscripcion($id_alumno)
    {
        $this->get($id_alumno);
        $this->query = "SELECT uc.Unidad_Curricular  
                        FROM inscripcion_uc iu  
                        INNER JOIN unidad_curricular uc ON iu.Id_UC  = uc.Id_UC 
                        INNER JOIN inscripcion i ON iu.Id_Inscripcion = i.Id_Inscripcion 
                        WHERE iu.Id_Inscripcion = $this->Id_Inscripcion";
        unset($this->rows);
        $this->get_results_from_query();
        $UCs = $this->rows;
        return $UCs;
    }

    public function getCantInsciptos()
    {
        $this->query = "SELECT c.Carrera, COALESCE(COUNT(i.Id_Inscripcion), 0) AS CantidadInscriptos
                        FROM carrera c
                        LEFT JOIN inscripcion i ON c.Id_Carrera = i.Id_Carrera AND DAY(i.FechaHora) = DAY(NOW())
                        GROUP BY c.Carrera";
        $this->get_results_from_query();
        return $this->rows;
    }
}
