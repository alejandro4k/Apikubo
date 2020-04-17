<?php
class CategoriasModel extends CI_Model{
    function __construct()
    {
        $this->load->database();
    }
    public function getCategorias(){
        $query = $this->db->get('Categoria');
        if ($query->result_array()) {

            return $query->result_array();
        } else {
            return false;
        }
    }
}

?>