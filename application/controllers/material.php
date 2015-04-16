<?php
class material extends CI_Controller {
	function __construct(){

		parent::__construct();
	}

	function index(){

		
		$host='localhost';
		$basededatos='tienda';
		$user='root';
		$pass='';
		$cod_mat="";
		$desc_mat="";
		$color="";
		$cant_mat="";

		if (isset($_GET['br'])) {
			$cod_mat=$_GET['br'];
			$this->db->delete('material',$cod_mat);
			
		}

		if (isset($_GET['md'])) {
			$cod_mat=$_GET['md'];
			$this->db->where('cod_mat',$cod_mat);
			$query= $this->db->get('material');
			if($obtenerDatos != FALSE){
			foreach ($obtenerDatos->result() as $row){
				$desc_mat = $row->desc_mat;
				$color = $row->color;
				$cant_mat = $row->cant_mat;
			}
			$data = array(
				'cod_mat'=>$cod_mat,
				'desc_mat' => $desc_mat,
				'color' => $color,
				'cant_mat' => $cant_mat
				);
		}else{
			return FALSE;
		}	
		}	
		$this->load->view('headers/librerias');
		$this->load->view('Materiales',$data);
		$this->load->view('footer');

	}

} ?>