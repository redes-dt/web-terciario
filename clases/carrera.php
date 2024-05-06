<?php

require_once('db.php');

class Carrera extends DB
{
    public $Id_Carrera;
    public $Carrera;
    public $Cupo;

    public function get()
    {
        $this->query = "SELECT Id_Carrera,
                                Carrera,
                                Cupo
						FROM carrera";
        $this->get_results_from_query();
        if (count($this->rows) == 1) {
            foreach ($this->rows[0] as $propiedad => $valor) {
                $this->$propiedad = $valor;
            }
        }
    }

    public function set($carrera_data = array())
    {
        if (array_key_exists('Carrera', $carrera_data)) {
            $this->get();
            if ($carrera_data['Carrera'] != $this->Carrera) {
                foreach ($carrera_data as $campo => $valor) {
                    $$campo = $valor;
                }
                $this->query = "INSERT INTO carrera (Carrera,Cupo) 
    							VALUES ('$Carrera',
                                            '$Cupo')";
                $this->execute_single_query();
            }
        }
    }

    public function edit($carrera_data = array())
    {
        foreach ($carrera_data as $campo => $valor) {
            $$campo = $valor;
        }
        $this->query = "UPDATE carreara 
    					SET Carrera='$Carrera', 
    						Cupo='$Cupo'  
    					WHERE Id_Carrera = '$Id_Carrera'";
        $this->execute_single_query();
    }

    public function delete($Id_Carrera = '')
    {
        $this->query = "DELETE FROM carrera 
						WHERE Id_Carrera = '$Id_Carrera'";
        $this->execute_single_query();
    }

    public function listarCarreras()
    {
        $this->get();
        if ($this->rows > 0) {
            $result = $this->rows;
            foreach ($result as $row) {
                echo "<option value='" . $row['Id_Carrera'] . "'>" . $row['Carrera'] . "</option>";
            }
        } else {
            echo "<option value=''>No hay carreras disponibles</option>";
        }
    }

    public function getCarreraAlum($id_alumno = '')
    {
        $this->query = "SELECT Id_Carrera
						FROM alumno_carrera
                        WHERE Id_Alumno = $id_alumno";
        $this->get_results_from_query();
        if (count($this->rows) == 1) {
            foreach ($this->rows[0] as $propiedad => $valor) {
                $this->$propiedad = $valor;
            }
        }
    }
}
