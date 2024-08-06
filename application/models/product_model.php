<?php
class Product_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function get_products($id = FALSE) {
        if ($id === FALSE) {
            $query = $this->db->get('products');
            return $query->result_array();
        }

        $query = $this->db->get_where('products', array('id' => $id));
        return $query->row_array();
    }

    public function set_product($data) {
        return $this->db->insert('products', $data);
    }

    public function update_product($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('products', $data);
    }

    public function delete_product($id) {
        $this->db->where('id', $id);
        return $this->db->delete('products');
    }
}
?>
