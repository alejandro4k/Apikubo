<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Carrito extends CI_Controller {

    public function __construct()
    {
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        header("Allow: GET, POST, OPTIONS, PUT, DELETE");
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method == "OPTIONS") {
            die();
        };
        parent::__construct();

        $this->load->helper('url');
        
        $this->load->model('CarritoModel');
    }
    
	public function index()
	{
		echo "CONTROLADOR CARRITO";
    }
    public function addToCard(){
        $id_producto = $this->input->post('id_producto');
        //$cantidad =  $this->input->post('cantidad');
        echo json_encode($this->CarritoModel->addToCard($id_producto));
    }
    public function getProductsFromCard(){
        echo json_encode($this->CarritoModel->getProductsFromCard());

    }
    public function saveCompra(){
        $total = $this->input->post('total');
        echo json_encode($this->CarritoModel->saveCompra($total));

    }
}