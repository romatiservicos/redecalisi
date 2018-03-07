<?php

#modelo que verifica usu�rio e senha e loga o usu�rio no sistema, criando as sess�es necess�rias

defined('BASEPATH') OR exit('No direct script access allowed');

class Tarefa_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('basico');
        $this->load->model(array('Basico_model'));
    }

    public function set_tarefa($data) {

        $query = $this->db->insert('App_Tarefa', $data);

        if ($this->db->affected_rows() === 0) {
            return FALSE;
        } else {
            #return TRUE;
            return $this->db->insert_id();
        }
    }

    public function set_servico_venda($data) {

        /*
        //echo $this->db->last_query();
        echo '<br>';
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        //exit ();
        */

        $query = $this->db->insert_batch('App_ServicoVenda', $data);

        if ($this->db->affected_rows() === 0) {
            return FALSE;
        } else {
            #return TRUE;
            return $this->db->insert_id();
        }
    }

    public function set_produto_venda($data) {

        $query = $this->db->insert_batch('App_ProdutoVenda', $data);

        if ($this->db->affected_rows() === 0) {
            return FALSE;
        } else {
            #return TRUE;
            return $this->db->insert_id();
        }
    }

    public function set_parcelasrec($data) {

        $query = $this->db->insert_batch('App_ParcelasRecebiveis', $data);

        if ($this->db->affected_rows() === 0) {
            return FALSE;
        } else {
            #return TRUE;
            return $this->db->insert_id();
        }
    }

    public function set_procedtarefa($data) {

        $query = $this->db->insert_batch('App_Procedtarefa', $data);

        if ($this->db->affected_rows() === 0) {
            return FALSE;
        } else {
            #return TRUE;
            return $this->db->insert_id();
        }
    }

    public function get_tarefa($data) {
        $query = $this->db->query('SELECT * FROM App_Tarefa WHERE idApp_Tarefa = ' . $data);
        $query = $query->result_array();

        /*
        //echo $this->db->last_query();
        echo '<br>';
        echo "<pre>";
        print_r($query);
        echo "</pre>";
        exit ();
        */

        return $query[0];
    }

	public function get_servico($data) {
		$query = $this->db->query('SELECT * FROM App_ServicoVenda WHERE idApp_Tarefa = ' . $data);
        $query = $query->result_array();

        return $query;
    }

    public function get_produto($data) {
		$query = $this->db->query('SELECT * FROM App_ProdutoVenda WHERE idApp_Tarefa = ' . $data);
        $query = $query->result_array();

        return $query;
    }

    public function get_parcelasrec($data) {
		$query = $this->db->query('SELECT * FROM App_ParcelasRecebiveis WHERE idApp_Tarefa = ' . $data);
        $query = $query->result_array();

        return $query;
    }

    public function get_procedtarefa($data) {
		$query = $this->db->query('SELECT * FROM App_Procedtarefa WHERE idApp_Tarefa = ' . $data);
        $query = $query->result_array();

        return $query;
    }

    public function list_tarefa($id, $aprovado, $completo) {

        $query = $this->db->query('
            SELECT
                TF.idApp_Tarefa,
                TF.DataTarefa,
    			TF.DataPrazoTarefa,
				TF.Prioridade,
				TF.Rotina,
                TF.ProfissionalTarefa,
                TF.TarefaConcluida,
                TF.ObsTarefa
            FROM
                App_Tarefa AS TF
            WHERE
                TF.idSis_Usuario = ' . $_SESSION['log']['id'] . ' AND
                TF.TarefaConcluida = "' . $aprovado . '"
            ORDER BY
                TF.ProfissionalTarefa ASC,
				TF.Rotina DESC,				
				TF.Prioridade DESC,
				TF.DataPrazoTarefa ASC
				
        ');
        /*
          echo $this->db->last_query();
          echo "<pre>";
          print_r($query);
          echo "</pre>";
          exit();
          */
        if ($query->num_rows() === 0) {
            return FALSE;
        } else {
            if ($completo === FALSE) {
                return TRUE;
            } else {

                foreach ($query->result() as $row) {
					$row->DataTarefa = $this->basico->mascara_data($row->DataTarefa, 'barras');
					$row->DataPrazoTarefa = $this->basico->mascara_data($row->DataPrazoTarefa, 'barras');
                    $row->TarefaConcluida = $this->basico->mascara_palavra_completa($row->TarefaConcluida, 'NS');
					$row->Rotina = $this->basico->mascara_palavra_completa($row->Rotina, 'NS');
					$row->Prioridade = $this->basico->mascara_palavra_completa($row->Prioridade, 'NS');
                    $row->ProfissionalTarefa = $this->get_profissional($row->ProfissionalTarefa);
                }
                return $query;
            }
        }
    }

    public function list_tarefaBKP($x) {

        $query = $this->db->query('SELECT '
            . 'TF.idApp_Tarefa, '
            . 'TF.DataTarefa, '
			. 'TF.DataPrazoTarefa, '
            . 'TF.ProfissionalTarefa, '
            . 'TF.TarefaConcluida, '
            . 'TF.ObsTarefa '
            . 'FROM '
            . 'App_Tarefa AS TF '
            . 'WHERE '
            #. 'TF.idApp_Cliente = ' . $_SESSION['Tarefa']['idApp_Cliente'] . ' '
            . 'ORDER BY TF.DataTarefa ASC ');
        /*
          echo $this->db->last_query();
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

                foreach ($query->result() as $row) {
					$row->DataTarefa = $this->basico->mascara_data($row->DataTarefa, 'barras');
					$row->DataPrazoTarefa = $this->basico->mascara_data($row->DataPrazoTarefa, 'barras');
                    $row->TarefaConcluida = $this->basico->mascara_palavra_completa($row->TarefaConcluida, 'NS');
                    $row->ProfissionalTarefa = $this->get_profissional($row->ProfissionalTarefa);
                }

                return $query;
            }
        }
    }

    public function update_tarefa($data, $id) {

        unset($data['idApp_Tarefa']);
        $query = $this->db->update('App_Tarefa', $data, array('idApp_Tarefa' => $id));
        return ($this->db->affected_rows() === 0) ? FALSE : TRUE;

    }

    public function update_servico_venda($data) {

        $query = $this->db->update_batch('App_ServicoVenda', $data, 'idApp_ServicoVenda');
        return ($this->db->affected_rows() === 0) ? FALSE : TRUE;

    }

    public function update_produto_venda($data) {

        $query = $this->db->update_batch('App_ProdutoVenda', $data, 'idApp_ProdutoVenda');
        return ($this->db->affected_rows() === 0) ? FALSE : TRUE;

    }

    public function update_parcelasrec($data) {

        $query = $this->db->update_batch('App_ParcelasRecebiveis', $data, 'idApp_ParcelasRecebiveis');
        return ($this->db->affected_rows() === 0) ? FALSE : TRUE;

    }

    public function update_procedtarefa($data) {

        $query = $this->db->update_batch('App_Procedtarefa', $data, 'idApp_Procedtarefa');
        return ($this->db->affected_rows() === 0) ? FALSE : TRUE;

    }

    public function delete_servico_venda($data) {

        $this->db->where_in('idApp_ServicoVenda', $data);
        $this->db->delete('App_ServicoVenda');

        //$query = $this->db->delete('App_ServicoVenda', array('idApp_ServicoVenda' => $data));

        if ($this->db->affected_rows() === 0) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function delete_produto_venda($data) {

        $this->db->where_in('idApp_ProdutoVenda', $data);
        $this->db->delete('App_ProdutoVenda');

        if ($this->db->affected_rows() === 0) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function delete_parcelasrec($data) {

        $this->db->where_in('idApp_ParcelasRecebiveis', $data);
        $this->db->delete('App_ParcelasRecebiveis');

        if ($this->db->affected_rows() === 0) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function delete_procedtarefa($data) {

        $this->db->where_in('idApp_Procedtarefa', $data);
        $this->db->delete('App_Procedtarefa');

        if ($this->db->affected_rows() === 0) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function delete_tarefa($id) {

        /*
        $tables = array('App_ServicoVenda', 'App_ProdutoVenda', 'App_ParcelasRecebiveis', 'App_Procedtarefa', 'App_Tarefa');
        $this->db->where('idApp_Tarefa', $id);
        $this->db->delete($tables);
        */

        #$query = $this->db->delete('App_ServicoVenda', array('idApp_Tarefa' => $id));
        #$query = $this->db->delete('App_ProdutoVenda', array('idApp_Tarefa' => $id));
        #$query = $this->db->delete('App_ParcelasRecebiveis', array('idApp_Tarefa' => $id));
        $query = $this->db->delete('App_Procedtarefa', array('idApp_Tarefa' => $id));
        $query = $this->db->delete('App_Tarefa', array('idApp_Tarefa' => $id));

        if ($this->db->affected_rows() === 0) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function get_profissional($data) {
		$query = $this->db->query('SELECT NomeProfissional FROM App_Profissional WHERE idApp_Profissional = ' . $data);
        $query = $query->result_array();

        return (isset($query[0]['NomeProfissional'])) ? $query[0]['NomeProfissional'] : FALSE;
    }

}
