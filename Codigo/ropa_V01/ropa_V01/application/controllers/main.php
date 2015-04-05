<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('bookmarksModel');
	}
	
	public function index(){
		$this->load->view('headers/librerias');
		$this->load->view('principal');
		$this->load->view('footer');
	}

	public function agregar(){
		if ($this->tank_auth->is_logged_in()) {
			$this->load->view('headers/librerias');
			$this->load->view('agregar');
			$this->load->view('footer');
		}else{
			echo "No tienes permisos para entrar";
		}
	}

	public function guardar(){
		$data = array(
			"titulo" => $this->input->post('titulo',TRUE),
			"url" => $this->input->post('url',TRUE),
			"creacion" => date('Y/m/D h:m')
		);

		$this->bookmarksModel->guardar($data);
		redirect('main/agregar');
	}

	public function ver(){
		$data = array(
			'enlaces' => $this->bookmarksModel->verTodo()
		);

		$this->load->view('headers/librerias');
		$this->load->view('ver', $data);
		$this->load->view('footer');
	}

	public function eliminar(){
		$id = $this->uri->segment(3);
		$this->bookmarksModel->eliminar($id);
		redirect('main/ver');
	}

	public function editar(){
		$id = $this->uri->segment(3);
		$obtenerEnlace = $this->bookmarksModel->obtenerEnlace($id);

		if ($obtenerEnlace != FALSE){
			foreach ($obtenerEnlace->result() as $row) {
				$titulo = $row->titulo;
				$url = $row->url;
			}

			$data = array(
				'id' => $id,
				'titulo' => $titulo,
				'url' => $url
			);
		}else{
			$data = '';
			return FALSE;
		}

		$this->load->view('headers/librerias');
		$this->load->view('editar', $data);
		$this->load->view('footer');
	}

	public function editarEnlace(){
		$id = $this->uri->segment(3);
		$data = array(
			'titulo' => $this->input->post('titulo', true),
			'url' => $this->input->post('url', true)
		);

		$this->bookmarksModel->editarEnlace($id, $data);
		redirect('main/ver');
	}

	public function buscar(){
		$data = array();

		$query = $this->input->get('query', TRUE);

		if($query){
			$result = $this->bookmarksModel->buscar(trim($query));
			if ($result != FALSE){
				$data = array('result' => $result);
			}else{
				$data = array('result' => '');
			}
		}else{
			$data = array('result' => '');
		}
		

		$this->load->view('headers/librerias');
		$this->load->view('buscar', $data);
		$this->load->view('footer');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */