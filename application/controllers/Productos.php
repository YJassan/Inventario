<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productos extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url_helper');
		$this->load->model('Productos_model');
		$this->load->helper('form'); 
		$this->load->library('form_validation');
	}
	public function index()
	{
		$this->load->view('Productos');
	
	}
	public function ListarProductos()
	{
		$vector["productos"]=$this->Productos_model->Productos();
		$vector["productos"]=$this->Productos_model->Productos();

			if (count($vector["productos"]) > 0)
				{
						foreach ($vector["productos"] as $key) {
						 $r[] = array(
	 					   "codproducto" => $key["codproducto"],
	 					   "nombreproducto" => $key["nombreproducto"],
		           "referencia" => $key["referencia"],
		           "precio" => "$".number_format($key["precio"]),
		           "peso" => $key["peso"],
		           "categoria" => $key["categoria"],
		           "stock" => $key["stock"],
		           "fechacreacion" => $key["fechacreacion"],
		           "fechaultimaventa" => $key["fechaultimaventa"]);
								}

									$x = array('data' => $r );
									echo $x = json_encode($x,JSON_UNESCAPED_UNICODE);
				}
			else{
				$a = array("codproducto" => "","nombreproducto" => "","referencia" => "","precio" => "","peso" => "","categoria" => "","stock" => "",
										"fechacreacion" => "","fechaultimaventa" => "");
				$x = array('data' => $a );
				echo $x = json_encode($x, JSON_UNESCAPED_UNICODE);
			}
	}


	public function Registro()
	{
		$data = $this->input->post();

		if ($data["nombre"] == "" || $data["referencia"] == "" || $data["precio"] == "" || $data["peso"] == "" || $data["categoria"] == "" 
				|| $data["stock"] == ""  ) 
			{echo "Todos los campos son requeridos."; return;}


	if(!preg_match("/^[0-9]*$/",$data["precio"])) { echo "El campo Precio solo permite números."; return;	}

	if(!preg_match("/^[0-9]*$/",$data["peso"])) { echo "El campo Peso solo permite números."; return;	}

	if(!preg_match("/^[0-9]*$/",$data["stock"])) { echo "El campo Stock solo permite números."; return;	}

	$resultadoregistro = $this->Productos_model->Registro();
	echo $resultadoregistro;
}

	public function Actualizar()
	{
		$data = $this->input->post();

		if ($data["codproducto"] == "" || $data["nombre"] == "" || $data["referencia"] == "" || $data["precio"] == "" || $data["peso"] == "" 
					|| $data["categoria"] == ""  || $data["stock"] == ""  ) 
			{echo "Todos los campos son requeridos."; return;}

		$precio =  str_replace(",", "", (str_replace("$", "", $data["precio"])));

		if(!preg_match("/^[0-9]*$/",$precio)) { echo "El campo Precio solo permite números."; return;	}

		if(!preg_match("/^[0-9]*$/",$data["peso"])) { echo "El campo Peso solo permite números."; return;	}

		if(!preg_match("/^[0-9]*$/",$data["stock"])) { echo "El campo Stock solo permite números."; return;	}

		$resultadoregistro = $this->Productos_model->Actualizar();
		echo $resultadoregistro;

}

	public function Eliminar()
	{
		$data = $this->input->post();

		if ($data["codproducto"] == "") {echo "Todos los campos son requeridos."; return;}

		$resultadoregistro = $this->Productos_model->Eliminar();
		echo $resultadoregistro;

}

	public function venta()
	{
		$data = $this->input->post();

		if ($data["codproducto"] == "") {echo "Todos los campos son requeridos."; return;}

		$var = $this->Productos_model->Validar_Stock();;
		if ($var[0]["stock"] <= 0) { echo "No hay stock del producto seleccionado."; return;}

		$resultadoregistro = $this->Productos_model->Venta();
		echo $resultadoregistro;

}
	
}
