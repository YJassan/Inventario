<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Productos_model extends CI_Model{

	public function __construct (){
		$this->load->database();
	}

	public function fecha()
	{
		date_default_timezone_set("America/Bogota");
		return $fecha = date("Ymd");
	}

	public function Productos()
	{
		$this->db->select("ID AS codproducto, nombreproducto, referencia, precio, peso, categoria, stock, fechacreacion, 
												IFNULL(fechaultimaventa,'') AS fechaultimaventa");
		$this->db->from("productos");
		$query = $this->db->get();
		return $query->result_array();		
	}

	public function Registro(){

		$datos = $this->input->post();
		$fecha = $this->fecha();

		$data=array(
		'nombreproducto'=> trim($datos["nombre"]),
		'referencia' 		=> trim($datos["referencia"]),
		'precio' 				=> trim($datos["precio"]),
		'peso' 					=> trim($datos["peso"]),
		'categoria' 		=> trim($datos["categoria"]),
		'stock' 				=> trim($datos["stock"]),
		'fechacreacion' => $fecha
		);
		return $this->db->insert("productos",$data);
	}

	public function Actualizar(){

		$datos = $this->input->post();
		$precio =  str_replace(",", "", (str_replace("$", "", $datos["precio"])));

		$data = ['nombreproducto' => trim($datos["nombre"]), 'referencia' => trim($datos["referencia"]), 'precio' => trim($precio), 
							'peso' => trim($datos["peso"]), 'categoria' => trim($datos["categoria"]), 'stock' => trim($datos["stock"]) ];
    $this->db->where('ID', trim($datos["codproducto"]));
    return $this->db->update('productos', $data);
	}	

	public function Eliminar(){

		$datos = $this->input->post();
		$this->db->where('ID', $datos["codproducto"]);
		return $this->db->delete('productos');
	}

	public function Validar_Stock(){

		$datos = $this->input->post();

		$this->db->select("stock");
		$this->db->from("productos");
		$this->db->where('ID', $datos["codproducto"] );
		$query = $this->db->get();
		return $query->result_array();
	}

	public function Venta(){

	 	date_default_timezone_set("America/Bogota");
	 	$fecha= date("Y-m-d H:i:s");
		$datos = $this->input->post();

		$id = $datos["codproducto"];

		$sql=" UPDATE productos SET stock =  stock - 1, fechaultimaventa = '$fecha' ";
		$sql.=" WHERE ID  = ?  ";

		return $this->db->query($sql,array($id));
	}		

}

?>