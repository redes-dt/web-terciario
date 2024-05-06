<?php

require_once('db.php');

class Cupo extends DB
{
    protected $Id_Cupos;
    public $Id_Carrera;
    public $Ano_Lectivo;
    public $Cupos_Disp;

    public function get($Id_Carrera = '', $Ano_Lectivo = '')
    {
        $this->query = "SELECT Id_Cupos,
                                Id_Carrera,
                                Ano_Lectivo,
                                Cupos_Disp
								FROM cupos
                                WHERE Id_Carreara = $Id_Carrera AND Ano_Lectivo = $Ano_Lectivo";
        $this->get_results_from_query();
        if (count($this->rows) == 1) {
            foreach ($this->rows[0] as $propiedad => $valor) {
                $this->$propiedad = $valor;
            }
        }
    }

    public function set($cupo_data = array())
    {
        if (array_key_exists('Id_Carrera', $cupo_data) and array_key_exists('Ano_Lectivo', $cupo_data)) {
            $this->get($cupo_data['Id_Carrera'], $cupo_data['Ano_Lectivo']);
            if ($cupo_data['Id_Carrera'] != $this->Id_Carrera and $cupo_data['Ano_Lectivo'] != $this->Ano_Lectivo) {
                foreach ($cupo_data as $campo => $valor) {
                    $$campo = $valor;
                }
                $this->query = "INSERT INTO cupos (Id_Carrera,Ano_Lectivo,Cupos_Disp) 
    								VALUES ('$Id_Carrera',
                                            '$Ano_Lectivo',
                                            '$Cupos_Disp')";
                $this->execute_single_query();
            }
        }
    }

    public function edit($cupo_data = array())
    {
        foreach ($cupo_data as $campo => $valor) {
            $$campo = $valor;
        }
        $this->query = "UPDATE cupos 
    					SET Id_Carrera ='$Id_Carrera', 
                            Ano_Lectivo ='$Ano_Lectivo',
                            Cupos_Disp ='$Cupos_Disp'  
    					WHERE Id_Carrera = '$Id_Carrera' AND Ano_Lectivo = '$Ano_Lectivo'";
        $this->execute_single_query();
    }

    public function delete($Id_Carrera = '', $Ano_Lectivo = '')
    {
        $this->query = "DELETE FROM cupos 
							WHERE Id_Carrera = '$Id_Carrera' AND Ano_Lectivo = '$Ano_Lectivo'";
        $this->execute_single_query();
    }

    public function validarCupo($id)
    {
        $this->query = "SELECT c.Cupos_Disp, ca.Cupo
                        FROM cupos c
                        JOIN carrera ca
                        ON c.Id_Carrera = ca.Id_Carrera
                        WHERE c.Id_Carrera = $id AND c.Ano_Lectivo = (SELECT YEAR(DATE_ADD(NOW(), INTERVAL 1 YEAR)));";
        $this->get_results_from_query();
        $result = $this->rows;
        foreach ($result as $row) {
            if ($row['Cupos_Disp'] < $row['Cupo']) {
                $this->query = "UPDATE cupos 
                SET Cupos_Disp = Cupos_Disp + 1  
                WHERE Id_Carrera = $id AND Ano_Lectivo = (SELECT YEAR(DATE_ADD(NOW(), INTERVAL 1 YEAR)))";
                $this->execute_single_query();
                return true;
            } else {
                return false;
            }
        }
    }

    public function getCuposDisponibles()
    {
        $this->query = "SELECT ca.Carrera ,(ca.Cupo - c.Cupos_Disp) AS CupoDisp  
                        FROM cupos c
                        INNER JOIN carrera ca ON c.Id_Carrera = ca.Id_Carrera
                        WHERE c.Ano_Lectivo = (SELECT YEAR(DATE_ADD(NOW(), INTERVAL 1 YEAR)))
                        GROUP BY ca.Id_Carrera";
        $this->get_results_from_query();
        return $this->rows;
    }
}
