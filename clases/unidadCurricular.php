<?php

require_once('db.php');

class UnidadCurricular extends DB
{
    protected $Id_UC;
    public $Unidad_Curricular;
    public $Tipo;
    public $HorasSem;
    public $HorasAnual;
    public $Formato;

    public function get($Id_UC = '')
    {
        $this->query = "SELECT Id_UC,
                                Unidad_Curricular,
                                Tipo,
                                HorasSem,
                                HorasAnual,
                                Formato
								FROM unidad_curricular
                                WHERE Id_UC = $Id_UC";
        $this->get_results_from_query();
        if (count($this->rows) == 1) {
            foreach ($this->rows[0] as $propiedad => $valor) {
                $this->$propiedad = $valor;
            }
        }
    }

    public function set($uc_data = array())
    {
        if (array_key_exists('Unidad_Curricular', $uc_data)) {
            $this->get($uc_data['Id_UC']);
            if ($uc_data['Unidad_Curricular'] != $this->Unidad_Curricular) {
                foreach ($uc_data as $campo => $valor) {
                    $$campo = $valor;
                }
                $this->query = "INSERT INTO unidad_curricular (Unidad_Curricular,Tipo,HorasSem,HorasAnual,Formato) 
    								VALUES ('$Unidad_Curricular',
                                            '$Tipo',
                                            '$HorasSem',
                                            '$HorasAnual',
                                            '$Formato')";
                $this->execute_single_query();
            }
        }
    }

    public function edit($uc_data = array())
    {
        foreach ($uc_data as $campo => $valor) {
            $$campo = $valor;
        }
        $this->query = "UPDATE unidad_curricular 
    						SET Unidad_Curricular='$Unidad_Curricular', 
    							Tipo='$Tipo', 
    							HorasSem='$HorasSem',
                                HorasAnual='$HorasAnual',
                                Formato='$Formato'  
    							WHERE Id_UC = '$Id_UC'";
        $this->execute_single_query();
    }

    public function delete($Id_UC = '')
    {
        $this->query = "DELETE FROM unidad_curricular 
							WHERE Id_UC = '$Id_UC'";
        $this->execute_single_query();
    }

    public function estadoUC($id_alumno, $id_UC)
    {
        $this->query = "SELECT n.Nota,uc.Formato  
                        FROM notas n
                        JOIN unidad_curricular uc on n.Id_UC = uc.Id_UC 
                        WHERE n.Id_Alumno = $id_alumno AND n.Id_UC = $id_UC";
        $this->get_results_from_query();
        if (count($this->rows) == 1) {
            foreach ($this->rows[0] as $propiedad => $valor) {
                $this->$propiedad = $valor;
            }
            if ($this->Formato == "Materia") {
                if ($this->Nota >= 8) {
                    return true;
                } else {
                    return false;
                }
            } elseif ($this->Formato == "Taller" || $this->Formato == "Laboratorio") {
                if ($this->Nota >= 6) {
                    return true;
                } else {
                    return false;
                }
            } elseif ($this->Formato == "Proyecto") {
                if ($this->Nota >= 7) {
                    return true;
                } else {
                    return false;
                }
            }
        } else {
            return false;
        }
    }

    public function mostrarUC($id_carrera, $id_alumno)
    {
        $this->obtenerUCCarrera($id_alumno);
        $UCs = $this->rows;
        unset($this->rows);
        foreach ($UCs as $row) {
            $cont = 0;
            unset($this->rows);
            if ($this->estadoUC($id_alumno, $row["Id_UC"]) == false) {
                unset($this->rows);
                $this->obtenerCorrelativas($row["Id_UC"], $id_carrera);
                $correlativas = $this->rows;
                if (!empty($correlativas)) {
                    foreach ($correlativas as $uc) {
                        unset($this->rows);
                        if ($this->estadoUC($id_alumno, $uc["Id_UC"]) == true) {
                            $cont++;
                        }
                    }
                    if ($cont == count($correlativas)) {
                        $uc_a_mostrar[] = $row;
                    }
                } else {
                    $uc_a_mostrar[] = $row;
                }
                unset($correlativas);
            }
        }
        return $uc_a_mostrar;
    }

    public function obtenerUCCarrera($id_alumno)
    {
        $this->query = "SELECT cu.Id_UC, uc.Unidad_Curricular
                        FROM carrera_uc cu
                        JOIN unidad_curricular uc ON cu.Id_UC = uc.Id_UC
                        WHERE cu.Id_Carrera IN (
                            SELECT Id_Carrera FROM alumno_carrera WHERE Id_Alumno = $id_alumno)
                        ORDER BY uc.Id_UC";
        $this->get_results_from_query();
    }

    public function obtenerCorrelativas($id_uc, $id_carrera)
    {
        $this->query = "SELECT uc.Id_UC
                        FROM correlatividades c
                        JOIN unidad_curricular uc ON c.Correlativa  = uc.Id_UC
                        WHERE c.Id_UC = $id_uc and c.Id_Carrera = $id_carrera";
        $this->get_results_from_query();
    }
}
