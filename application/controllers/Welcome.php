<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('materialmodel');		
	}
	
	public function index()
	{
		$this->load->view('headers/librerias');
		$this->load->view('PrincipalAdm');
		$this->load->view('footer');
	}
	public function inventario(){
		$this->load->view('headers/librerias');
		$this->load->view('Sermate');
		$this->load->view('footer');
	}
	public function inventarioB(){
		$this->load->view('headers/librerias');
		$this->load->view('Bormate');
		$this->load->view('footer');
	}
	public function lispser(){
		$this->load->view('headers/librerias');
		$this->load->view('ListaPedidos');
		$this->load->view('footer');
	}
	public function lispMos(){
		$this->load->view('headers/librerias');
		$this->load->view('ListaEntrega');
		$this->load->view('footer');
	}
	public function listoTodoS(){
		$folio = $this->uri->segment(3);
      	$data=array(
        'estado_ped'=> 'Listo'
        );
        $this->materialmodel->ListoS($folio,$data);

        $this->load->view('headers/librerias');
		$this->load->view('ListaPedidos');
		$this->load->view('footer');
	}
	public function listoTodoB(){
		$folio = $this->uri->segment(3);
      	$data=array(
        'estado_ped'=> 'Listo'
        );
        $this->materialmodel->ListoB($folio,$data);

        $this->load->view('headers/librerias');
		$this->load->view('ListaPedidosB');
		$this->load->view('footer');
	}
	public function listoTodoE(){
		$folio = $this->uri->segment(3);
      	$data=array(
        'estado_ped'=> 'Entregado'
        );
        $this->materialmodel->Listo($folio,$data);

        $this->load->view('headers/librerias');
		$this->load->view('ListaEntrega');
		$this->load->view('footer');
	}
	public function lispbor(){
		$this->load->view('headers/librerias');
		$this->load->view('ListaPedidosB');
		$this->load->view('footer');
	}
	public function materiAdm(){
		$this->load->view('headers/librerias');
		$this->load->view('Materiales');
		$this->load->view('footer');
	}
	public function editar(){
		$cod_mat = $this->uri->segment(3);
		$obtenerDatos = $this->materialmodel->obtenerDatos($cod_mat);
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

		$this->load->view('headers/librerias');
		$this->load->view('EditarSer',$data);
		$this->load->view('footer');
	}
	public function editarb(){
		$cod_mat = $this->uri->segment(3);
		$obtenerDatos = $this->materialmodel->obtenerDatos($cod_mat);
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

		$this->load->view('headers/librerias');
		$this->load->view('EditarBor',$data);
		$this->load->view('footer');
	}

	public function editarAdm(){
		$cod_mat = $this->uri->segment(3);
		$obtenerDatos = $this->materialmodel->obtenerDatos($cod_mat);
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

		$this->load->view('headers/librerias');
		$this->load->view('EditarAdm',$data);
		$this->load->view('footer');
	}
	public function eliminAdm(){
		$cod_mat = $this->uri-> segment(3);
		$this->materialmodel->Eliminar($cod_mat);

		$this->load->view('headers/librerias');
		$this->load->view('Materiales');
		$this->load->view('footer');
	}

	public function inserAdm(){
		$this->load->view('headers/librerias');
		$this->load->view('insertarAdm');
		$this->load->view('footer');
	}
	public function inserErr(){
		$this->load->view('headers/librerias');
		$this->load->view('insertarAdm');
		$this->load->view('headers/Alerta');
		$this->load->view('footer');
	}
	public function prodAdm(){
		$this->load->view('headers/librerias');
		$this->load->view('Producto');
		$this->load->view('footer');
	}
	public function inserAdp(){
		$this->load->view('headers/librerias');
		$this->load->view('insertarAdp');
		$this->load->model('materialmodel');
		$this->load->view('footer');
	}
	public function inserErp(){
		$this->load->view('headers/librerias');
		$this->load->view('insertarAdp');
		$this->load->view('headers/Alerta');
		$this->load->view('footer');
	}
	public function editarAdmp(){
		$cod_prod = $this->uri->segment(3);
		$obtenerDatos = $this->materialmodel->obtenerDatosp($cod_prod);
		if($obtenerDatos != FALSE){
			foreach ($obtenerDatos->result() as $row){
				
				$color = $row->color;
				$modelo=$row->modelo;
				$talla=$row->talla;
				$cant_p=$row->cant_p;
				$descrip=$row->descrip;
				$precio=$row->precio;
				$genero=$row->genero;
				$tipo = $row->tipo;
			}
			$data = array(
					'cod_prod'=>$cod_prod,
					'color'=>$color,
					'modelo'=>$modelo,
					'talla'=>$talla,
					'cant_p'=>$cant_p,
					'descrip'=>$descrip,
					'precio'=>$precio,
					'genero'=>$genero,
					'tipo'=>$tipo
				);
		}else{
			return FALSE;
		}

		$this->load->view('headers/librerias');
		$this->load->view('EditarAdp',$data);
		$this->load->view('footer');
	}
	public function eliminAdp(){
		$cod_prod = $this->uri-> segment(3);
		$this->materialmodel->Eliminarp($cod_prod);

		$this->load->view('headers/librerias');
		$this->load->view('producto');
		$this->load->view('footer');
	}
	public function Guardar()
	{	
		$cod_prod = $_POST["cod_prod"];
		$color = $_POST["color"];
		$modelo = $_POST["modelo"];
		$talla = $_POST["talla"];
		$img_p = $this->do_upload();
		$cant_p = $_POST["cant_p"];
		$descrip = $_POST["descrip"];
		$precio = $_POST["precio"];
		$genero = $_POST["genero"];
		$tipo = $_POST["tipo"];
		$data=array(
			'cod_prod'=>$cod_prod,
			'color'=>$color,
			'modelo'=>$modelo,
			'talla'=>$talla,
			'img_p'=>$img_p,
			'cant_p'=>$cant_p,
			'descrip'=>$descrip,
			'precio'=>$precio,
			'genero'=>$genero,
			'tipo'=>$tipo
			);
		$this->materialmodel->save($data);
		$this->load->view('headers/librerias');
		$this->load->view('Producto');
		$this->load->view('footer');
	}
	private function do_upload()
	{
		$type = explode('.', $_FILES["pic"]["name"]);
		$type = strtolower($type[count($type)-1]);
		$url = "./imagen/".uniqid(rand()).'.'.$type;
		if(in_array($type, array("jpg", "jpeg", "gif", "png")))
			if(is_uploaded_file($_FILES["pic"]["tmp_name"]))
				if(move_uploaded_file($_FILES["pic"]["tmp_name"],$url))
					return $url;
		return "";
	}
	public function Crp(){
		$this->load->view('headers/librerias');
		$this->load->view('pedido');
		$this->load->view('footer');
	}
	public function reporte(){
		$this->load->view('headers/librerias');
		$this->load->view('Reporte');
		$this->load->view('footer');
	}
	
	public function usuarios(){
		$this->load->view('headers/librerias');
		$this->load->view('Usuarios');
		$this->load->view('footer');
	}

		public function inserusu(){
		$this->load->view('headers/librerias');
		$this->load->view('insertarUsu');
		$this->load->view('footer');
	}
	public function insertusu(){
		$this->load->view('headers/librerias');
		$this->load->view('insertarusu');
		$this->load->view('headers/Alerta');
		$this->load->view('footer');
	}


	public function editarUsu(){
		$id = $this->uri->segment(3);
		$obtenerDatos = $this->materialmodel->obtenerDatosU($id);
		if($obtenerDatos != FALSE){
			foreach ($obtenerDatos->result() as $row){
				
				$username= $row->username;
				$password=$row->password;
			}
			$data = array(
					'id'=>$id,
					'username'=>$username,
					'password'=>$password,
				);
		}else{
			return FALSE;
		}

		$this->load->view('headers/librerias');
		$this->load->view('editarUsu',$data);
		$this->load->view('footer');
	}

	public function eliminusu(){
		$id = $this->uri-> segment(3);
		$this->materialmodel->EliminarU($id);

		$this->load->view('headers/librerias');
		$this->load->view('Usuarios');
		$this->load->view('footer');
	}


	public function inseremp(){
		$this->load->view('headers/librerias');
		$this->load->view('insertaremp');
		$this->load->view('footer');
	}
	public function editaremp(){
		$iduser = $this->uri->segment(3);
		$obtenerDatos = $this->materialmodel->obtenerDatosE($iduser);
		if($obtenerDatos != FALSE){
			foreach ($obtenerDatos->result() as $row){
				
				$nombre= $row->nombre;
				$aPaterno=$row->aPaterno;
				$aMaterno=$row->aMaterno;
			}
			$data = array(
					'iduser'=>$iduser,
					'nombre'=>$nombre,
					'aPaterno'=>$aPaterno,
					'aMaterno'=>$aMaterno,
				);
		}else{
			return FALSE;
		}
		$this->load->view('headers/librerias');
		$this->load->view('editaremp',$data);
		$this->load->view('footer');

}


public function eliminemp(){
		$iduser = $this->uri-> segment(3);
		$this->materialmodel->EliminarE($iduser);

		$this->load->view('headers/librerias');
		$this->load->view('Usuarios');
		$this->load->view('footer');
	}


	public function Grupo(){
		$this->load->view('headers/librerias');
		$this->load->view('grupo');
		$this->load->view('footer');
	}
	public function insergru(){
		$this->load->view('headers/librerias');
		$this->load->view('insertargrupo');
		$this->load->view('footer');
	}

	public function editargru(){
		$id = $this->uri->segment(3);
		$obtenerDatos = $this->materialmodel->obtenerDatosG($id);
		if($obtenerDatos != FALSE){
			foreach ($obtenerDatos->result() as $row){
				
				$name= $row->name;
				$description=$row->description;

			}
			$data = array(
					'id'=>$id,
					'name'=>$name,
					'description'=>$description,
				);
		}else{
			return FALSE;
		}
		$this->load->view('headers/librerias');
		$this->load->view('editargru',$data);
		$this->load->view('footer');

}
public function elimingru(){
		$id = $this->uri-> segment(3);
		$this->materialmodel->EliminarG($id);

		$this->load->view('headers/librerias');
		$this->load->view('Grupo');
		$this->load->view('footer');
	}

	public function asociarug(){
		$this->load->view('headers/librerias');
		$this->load->view('asociar');
		$this->load->view('footer');
	}
	public function editarug(){
		$id = $this->uri->segment(3);
		$obtenerDatos = $this->materialmodel->obtenerDatosUG($id);
		if($obtenerDatos != FALSE){
			foreach ($obtenerDatos->result() as $row){
				
				$iduser= $row->user_id;
				$idgroup=$row->group_id;

			}
			$data = array(
					'user_id'=>$iduser,
					'group_id'=>$idgroup,
				);
		}else{
			return FALSE;
		}
		$this->load->view('headers/librerias');
		$this->load->view('editarug',$data);
		$this->load->view('footer');

}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */