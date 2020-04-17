<?php
class ProductosModel extends CI_Model{
    function __construct()
    {
        $this->load->database();
    }
    public function getProductos(){
        $query = $this->db->get('Productos');
        if ($query->result_array()) {

            return $query->result_array();
        } else {
            return false;
        }
    }
    public function getFilterProductos($id_categoria){
        $data = $this->db->get_where('Productos', array('id_categoria' => $id_categoria));
        if ($data->result_array()) {

            return $data->result_array();
        } else {
            return false;
        }
    }
    public function getProducto($id_producto){
        $data = $this->db->get_where('Productos', array('id_producto' => $id_producto));
        if ($data->result_array()) {

            return $data->row();
        } else {
            return false;
        }

    }
}

?>