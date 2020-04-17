<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productos extends CI_Controller {

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
        
        $this->load->model('ProductosModel');
    }
    
    public function getAllProductos(){
        echo json_encode($this->ProductosModel->getProductos());
    }
    public function getFilterProductos(){
        $id_categoria = $this->input->get('id_categoria');
      
        echo json_encode($this->ProductosModel->getFilterProductos($id_categoria));
    }
    public function getInfoProducto(){
        $id_producto = $this->input->get('id_producto');
      
        echo json_encode($this->ProductosModel->getProducto($id_producto));

    }
}