<?php

function _construct(){

}

function get_zakaznici($id = FALSE){
    if($id == FALSE){
        $query = $this->db->get('zakaznici');
        return $query->result_array();
    }
    $query = $this->db->get_where('zakaznici', array('idZakaznika' => $id));
    return $query->row_array();
}

function set_zakaznici($id = 0){
    $this->load->helper('url');
    foreach($_POST as $key => $value){
        if($key !='submit')
        $data[$key] = $value;
    }
    if($id == 0){
        return $this->db->insert('zakaznici',$data);
    }else{
        $this->db->where('idZakaznika',$id);
        return $this->db->update('zakaznik',$data);
    }
}

function delete_zakaznici($id){
    $this->db->where('id', $id);
    return $this->db->delete('zakaznici');
}
