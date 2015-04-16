<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class materialModel extends CI_Model { 
	function __construct() {
    	parent::__construct();
  	}
  public function obtenerDatos($cod_mat){
      $this->db->where('cod_mat',$cod_mat);
      $query = $this->db->get('material');
      if ($query->num_rows() > 0){
        return $query;
      }else{
        return FALSE;
      }
  }
  public function obtenerDatosp($cod_prod){
      $this->db->where('cod_prod',$cod_prod);
      $query = $this->db->get('producto');
      if ($query->num_rows() > 0){
        return $query;
      }else{
        return FALSE;
      }
  }
  public function editarprod($cod_prod, $data){
      $this->db->where('cod_prod', $cod_prod);
      $this->db->update('producto', $data);
  }
  public function editarmate($cod_mat, $data){
      $this->db->where('cod_mat', $cod_mat);
      $this->db->update('material', $data);
  }
  public function ListoB($folio,$data){
      
      $this->db->where('folio',$folio);
      $this->db->where('servicio','Bordado');
      $this->db->update('pedido',$data);
  }
  public function ListoS($folio,$data){
      
      $this->db->where('folio',$folio);
      $this->db->where('servicio','Serigrafía');
      $this->db->update('pedido',$data);
  }
  public function Eliminar($cod_mat){
     $this->db->where('cod_mat',$cod_mat);
      $this->db->delete('material');
  }
  public function Eliminarp($cod_prod){
      $this->db->where('cod_prod',$cod_prod);
      $this->db->select('img_p');
      unlink($this->db->get('producto'));
      $this->db->where('cod_prod',$cod_prod);
      $this->db->delete('producto');
  }
  public function insertar($tabla,$data){
    $this->db->insert($tabla,$data);
  }
  public function save($data)
  {
    $this->db->insert('producto',$data);
  }
}