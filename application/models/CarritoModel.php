<?php
class CarritoModel extends CI_Model{
    function __construct()
    {
        $this->load->database();
    }
    public function addToCard($id_producto){
        $arrayInsert = array(
            'id_producto' => $id_producto,
            'venta' => false
        );
        $this->db->insert('Carrito', $arrayInsert);

        if ($this->db->affected_rows() > 0) {



            $response['status'] = true;
        } else {
            $response['status'] = false;
            $response['msj'] = "error al agregar al carrito.";
        }
        return $response;
    }
    public function getProductsFromCard(){
        $this->db->select('*');
        $this->db->from('Productos');
        $this->db->join('Carrito', 'Carrito.id_producto = Productos.id_producto');
        $this->db->where('Carrito.venta', false);
        $this->db->order_by('Carrito.id_carrito', 'DESC');
        $query = $this->db->get();
        if($query->result_array()){
            return $query->result_array();
        }else{

            return false;
        }
    }
    public function saveCompra($valor){
        $arrayInsert = array(
            'total' => $valor,
            
        );
        $this->db->insert('Ventas', $arrayInsert);
        $dataUpdate = array(
            'venta' => true
    );
    
        
        $this->db->update('Carrito', $dataUpdate);

        if ($this->db->affected_rows() > 0) {



            $response = true;
        } else {
            $response = false;
            
        }
        return $response;

    }
}
