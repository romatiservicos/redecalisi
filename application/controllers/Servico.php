<?php

#controlador de Login

defined('BASEPATH') OR exit('No direct script access allowed');

class Servico extends CI_Controller {

    public function __construct() {
        parent::__construct();

        #load libraries
        $this->load->helper(array('form', 'url', 'date', 'string'));
        #$this->load->library(array('basico', 'Basico_model', 'form_validation'));
        $this->load->library(array('basico', 'form_validation'));
        $this->load->model(array('Basico_model', 'Convenio_model', 'Servico_model', 'Servicobase_model', 'Servicocompra_model', 'Empresa_model', 'Contatocliente_model'));
        $this->load->driver('session');

        #load header view
        $this->load->view('basico/header');
        $this->load->view('basico/nav_principal');

        #$this->load->view('cliente/nav_secundario');
    }

    public function index() {

        if ($this->input->get('m') == 1)
            $data['msg'] = $this->basico->msg('<strong>Informa��es salvas com sucesso</strong>', 'sucesso', TRUE, TRUE, TRUE);
        elseif ($this->input->get('m') == 2)
            $data['msg'] = $this->basico->msg('<strong>Erro no Banco de dados. Entre em contato com o administrador deste sistema.</strong>', 'erro', TRUE, TRUE, TRUE);
        else
            $data['msg'] = '';

        $this->load->view('cliente/tela_index', $data);

        #load footer view
        $this->load->view('basico/footer');
    }

    public function cadastrar($tabela = NULL) {

        if ($this->input->get('m') == 1)
            $data['msg'] = $this->basico->msg('<strong>Informa��es salvas com sucesso</strong>', 'sucesso', TRUE, TRUE, TRUE);
        elseif ($this->input->get('m') == 2)
            $data['msg'] = $this->basico->msg('<strong>Erro no Banco de dados. Entre em contato com o administrador deste sistema.</strong>', 'erro', TRUE, TRUE, TRUE);
        else
            $data['msg'] = '';

        $data['query'] = quotes_to_entities($this->input->post(array(
			'idTab_Servico',
			'CodServ',
			'NomeServico',
            'ValorVendaServico',
			'Empresa',			
			#'ValorCompraServico',
			#'TipoServico',
			
			#'Convenio',
			#'ServicoBase',

                ), TRUE));

		#(!$data['query']['TipoServico']) ? $data['query']['TipoServico'] = 'V' : FALSE;
		
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">', '</div>');

        $this->form_validation->set_rules('NomeServico', 'Nome do Servi�o', 'required|trim');
        #$this->form_validation->set_rules('ValorVendaServico', 'Valor do Servi�o', 'required|trim');
		
		#$data['select']['TipoServico'] = $this->Basico_model->select_tiposervico(); 
		#$data['select']['Convenio'] = $this->Convenio_model->select_convenio(); 
		#$data['select']['ServicoBase'] = $this->Servicobase_model->select_servicobase2();
		#$data['select']['ServicoBase'] = $this->Servicocompra_model->select_servicocompra();
 
		
        $data['titulo'] = 'Cadastrar Servi�os';
        $data['form_open_path'] = 'servico/cadastrar';
        $data['readonly'] = '';
        $data['disabled'] = '';
        $data['panel'] = 'primary';
        $data['metodo'] = 1;
        $data['button'] =
                '
                <button class="btn btn-sm btn-primary" name="pesquisar" value="0" type="submit">
                    <span class="glyphicon glyphicon-plus"></span> Cadastrar
                </button>
        ';

        $data['sidebar'] = 'col-sm-3 col-md-2';
        $data['main'] = 'col-sm-7 col-md-8';

        $data['q'] = $this->Servico_model->lista_servico(TRUE);
        $data['list'] = $this->load->view('servico/list_servico', $data, TRUE);

        #run form validation
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('servico/pesq_servico', $data);
        } else {
			
			$data['query']['CodServ'] = trim(mb_strtoupper($data['query']['CodServ'], 'ISO-8859-1'));
            $data['query']['NomeServico'] = trim(mb_strtoupper($data['query']['NomeServico'], 'ISO-8859-1'));
            $data['query']['ValorVendaServico'] = str_replace(',','.',str_replace('.','',$data['query']['ValorVendaServico']));
			$data['query']['Empresa'] = $_SESSION['log']['id'];			
			#$data['query']['ValorCompraServico'] = str_replace(',','.',str_replace('.','',$data['query']['ValorCompraServico']));
			#$data['query']['TipoServico'] = $data['query']['TipoServico'];
			#$data['query']['Convenio'] = $data['query']['Convenio'];
			#$data['query']['ServicoBase'] = $data['query']['ServicoBase'];

			$data['query']['idSis_Usuario'] = $_SESSION['log']['id'];
            $data['query']['idTab_Modulo'] = $_SESSION['log']['idTab_Modulo'];

            $data['campos'] = array_keys($data['query']);
            $data['anterior'] = array();

            $data['idTab_Servico'] = $this->Servico_model->set_servico($data['query']);

			
            if ($data['idTab_Servico'] === FALSE) {
                $msg = "<strong>Erro no Banco de dados. Entre em contato com o administrador deste sistema.</strong>";

                $this->basico->erro($msg);
                $this->load->view('servico/cadastrar', $data);
            } else {

                $data['auditoriaitem'] = $this->basico->set_log($data['anterior'], $data['query'], $data['campos'], $data['idTab_Servico'], FALSE);
                $data['auditoria'] = $this->Basico_model->set_auditoria($data['auditoriaitem'], 'Tab_Servico', 'CREATE', $data['auditoriaitem']);
                $data['msg'] = '?m=1';

                redirect(base_url() . 'servico/cadastrar' . $data['msg']);
                exit();
            }
        }

        $this->load->view('basico/footer');
    }

    public function alterar($id = FALSE) {

        if ($this->input->get('m') == 1)
            $data['msg'] = $this->basico->msg('<strong>Informa��es salvas com sucesso</strong>', 'sucesso', TRUE, TRUE, TRUE);
        elseif ($this->input->get('m') == 2)
            $data['msg'] = $this->basico->msg('<strong>Erro no Banco de dados. Entre em contato com o administrador deste sistema.</strong>', 'erro', TRUE, TRUE, TRUE);
        else
            $data['msg'] = '';

        $data['query'] = quotes_to_entities($this->input->post(array(
			'idTab_Servico',
			'CodServ',
            'NomeServico',
            'ValorVendaServico',
			'Empresa',			
			#'ValorCompraServico',
			#'TipoServico',
			#'Convenio',
			#'ServicoBase',

                ), TRUE));

		#(!$data['query']['TipoServico']) ? $data['query']['TipoServico'] = 'V' : FALSE;
				
        if ($id)
            $data['query'] = $this->Servico_model->get_servico($id);


        $this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">', '</div>');

        $this->form_validation->set_rules('NomeServico', 'Nome do Servi�o', 'required|trim');
        #$this->form_validation->set_rules('ValorVendaServico', 'Valor do Servi�o', 'required|trim');

		#$data['select']['TipoServico'] = $this->Basico_model->select_tiposervico(); 
		#$data['select']['Convenio'] = $this->Convenio_model->select_convenio();
		#$data['select']['ServicoBase'] = $this->Servicobase_model->select_servicobase2();
		#$data['select']['ServicoBase'] = $this->Servicocompra_model->select_servicocompra();

		
        $data['titulo'] = 'Editar Servi�os';
        $data['form_open_path'] = 'servico/alterar';
        $data['readonly'] = '';
        $data['disabled'] = '';
        $data['panel'] = 'primary';
        $data['metodo'] = 2;
        $data['button'] =
                '
                <button class="btn btn-sm btn-warning" name="pesquisar" value="0" type="submit">
                    <span class="glyphicon glyphicon-edit"></span> Salvar Altera��o
                </button>
        ';

        $data['sidebar'] = 'col-sm-3 col-md-2';
        $data['main'] = 'col-sm-7 col-md-8';

        $data['q'] = $this->Servico_model->lista_servico(TRUE);
        $data['list'] = $this->load->view('servico/list_servico', $data, TRUE);

        #run form validation
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('servico/pesq_servico', $data);
        } else {

			$data['query']['CodServ'] = trim(mb_strtoupper($data['query']['CodServ'], 'ISO-8859-1'));
			$data['query']['NomeServico'] = trim(mb_strtoupper($data['query']['NomeServico'], 'ISO-8859-1'));
            $data['query']['ValorVendaServico'] = str_replace(',','.',str_replace('.','',$data['query']['ValorVendaServico']));
			$data['query']['Empresa'] = $_SESSION['log']['id'];            
			#$data['query']['ValorCompraServico'] = str_replace(',','.',str_replace('.','',$data['query']['ValorCompraServico']));
			#$data['query']['TipoServico'] = $data['query']['TipoServico'];
			#$data['query']['Convenio'] = $data['query']['Convenio'];
			#$data['query']['ServicoBase'] = $data['query']['ServicoBase'];

			$data['query']['idSis_Usuario'] = $_SESSION['log']['id'];
			$data['query']['idTab_Modulo'] = $_SESSION['log']['idTab_Modulo'];

            $data['anterior'] = $this->Servico_model->get_servico($data['query']['idTab_Servico']);
            $data['campos'] = array_keys($data['query']);

            $data['auditoriaitem'] = $this->basico->set_log($data['anterior'], $data['query'], $data['campos'], $data['query']['idTab_Servico'], TRUE);

            if ($data['auditoriaitem'] && $this->Servico_model->update_servico($data['query'], $data['query']['idTab_Servico']) === FALSE) {
                $data['msg'] = '?m=2';
                redirect(base_url() . 'servico/alterar/' . $data['query']['idApp_Cliente'] . $data['msg']);
                exit();
            } else {

                if ($data['auditoriaitem'] === FALSE) {
                    $data['msg'] = '';
                } else {
                    $data['auditoria'] = $this->Basico_model->set_auditoria($data['auditoriaitem'], 'Tab_Servico', 'UPDATE', $data['auditoriaitem']);
                    $data['msg'] = '?m=1';
                }

                redirect(base_url() . 'servico/cadastrar/' . $data['msg']);
                exit();
            }
        }

        $this->load->view('basico/footer');
    }
	
	public function excluir($id = FALSE) {

        if ($this->input->get('m') == 1)
            $data['msg'] = $this->basico->msg('<strong>Informa��es salvas com sucesso</strong>', 'sucesso', TRUE, TRUE, TRUE);
        elseif ($this->input->get('m') == 2)
            $data['msg'] = $this->basico->msg('<strong>Erro no Banco de dados. Entre em contato com o administrador deste sistema.</strong>', 'erro', TRUE, TRUE, TRUE);
        else
            $data['msg'] = '';

                $this->Servico_model->delete_servico($id);

                $data['msg'] = '?m=1';

				redirect(base_url() . 'servico/cadastrar/' . $data['msg']);
				exit();
            //}
        //}

        $this->load->view('basico/footer');
    }

}
