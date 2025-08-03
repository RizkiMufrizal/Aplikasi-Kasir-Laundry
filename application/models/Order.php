<?php
class Order extends CI_Model {
    public function getByOrderNo($orderNo) {
        return $this->db->get_where('tb_order', ["no_order" => $orderNo])->row();
    }
}