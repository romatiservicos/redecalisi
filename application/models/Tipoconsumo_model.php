<?php

#modelo que verifica usu�rio e senha e loga o usu�rio no sistema, criando as sess�es necess�rias

defined('BASEPATH') OR exit('No direct script access allowed');

class Tipoconsumo_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('basico');
    }

    public function set_tipoconsumo($data) {

        $query = $this->db->insert('Tab_TipoConsumo', $data);

        if ($this->db->affected_rows() === 0) {
            return FALSE;
        } else {
            #return TRUE;
            return $this->db->insert_id();
        }
    }

    public function get_tipoconsumo($data) {
        $query = $this->db->query('SELECT * FROM Tab_TipoConsumo WHERE idTab_TipoConsumo = ' . $data);
        $query = $query->result_array();

        return $query[0];
    }

    public function update_tipoconsumo($data, $id) {

        unset($data['Id']);
        $query = $this->db->update('Tab_TipoConsumo', $data, array('idTab_TipoConsumo' => $id));
        /*
          echo $this->db->last_query();
          echo '<br>';
          echo "<pre>";
          print_r($query);
          echo "</pre>";
          exit ();
         */
        if ($this->db->affected_rows() === 0) {
            return FALSE;
        } else {
            return TRUE;
        }
    }
		
	public function delete_tipoconsumo($data) {        
		$query = $this->db->delete('Tab_TipoConsumo', array('idTab_TipoConsumo' => $data));

        if ($this->db->affected_rows() === 0) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function lista_tipoconsumo($x) {

        $query = $this->db->query('SELECT * '
                . 'FROM Tab_TipoConsumo '
                . 'WHERE '
                . 'Empresa = ' . $_SESSION['log']['Empresa'] . ' AND '
                . 'idTab_Modulo = ' . $_SESSION['log']['idTab_Modulo'] . ' '
                . 'ORDER BY TipoConsumo ASC ');

        /*
          echo $this->db->last_query();
          $query = $query->result_array();
          echo "<pre>";
          print_r($query);
          echo "</pre>";
          exit();
        */
        if ($query->num_rows() === 0) {
            return FALSE;
        } else {
            if ($x === FALSE) {
                return TRUE;
            } else {
                #foreach ($query->result_array() as $row) {
                #    $row->idApp_Profissional = $row->idApp_Profissional;
                #    $row->NomeProfissional = $row->NomeProfissional;
                #}
                $query = $query->result_array();
                return $query;
            }
        }
    }
	
	public function select_tipoconsumo2($data = FALSE) {

        if ($data === TRUE) {
            $array = $this->db->query(
                'SELECT '
                    . 'idTab_TipoConsumo, '
                    . 'TipoConsumo '
                    . 'FROM '
                    . 'Tab_TipoConsumo '                   
					. 'WHERE '
                    . 'Empresa = ' . $_SESSION['log']['Empresa'] . ' AND ' 
                    . 'idTab_Modulo = ' . $_SESSION['log']['idTab_Modulo'] );

        } else {
            $query = $this->db->query(
                'SELECT '
                    . 'idTab_TipoConsumo, '
                    . 'TipoConsumo '
                    . 'FROM '
                    . 'Tab_TipoConsumo '                   
					. 'WHERE '
                    . 'Empresa = ' . $_SESSION['log']['Empresa'] . ' AND ' 
                    . 'idTab_Modulo = ' . $_SESSION['log']['idTab_Modulo'] ); 

            $array = array();
            foreach ($query->result() as $row) {
                $array[$row->idTab_TipoConsumo] = $row->TipoConsumo;
            }
        }

        return $array;
    }
	
	public function select_tipoconsumo($data = FALSE) {

        if ($data === TRUE) {
            $array = $this->db->query('
                SELECT 
                    idTab_TipoConsumo,
                    TipoConsumo 
				FROM 
                    Tab_TipoConsumo                    
				WHERE 
                    Empresa = ' . $_SESSION['log']['Empresa'] . ' AND  
                    idTab_Modulo = ' . $_SESSION['log']['idTab_Modulo'] . '
				ORDER BY
					TipoConsumo ASC
				');

        } else {
            $query = $this->db->query('
                SELECT 
                    idTab_TipoConsumo,
                    TipoConsumo 
				FROM 
                    Tab_TipoConsumo                    
				WHERE 
                    Empresa = ' . $_SESSION['log']['Empresa'] . ' AND  
                    idTab_Modulo = ' . $_SESSION['log']['idTab_Modulo'] . '
				ORDER BY
					TipoConsumo ASC
				'); 

            $array = array();
            foreach ($query->result() as $row) {
                $array[$row->idTab_TipoConsumo] = $row->TipoConsumo;
            }
        }

        return $array;
    }	

}
