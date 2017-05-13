    <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class Zakaznici_model extends CI_Model{

    function __construct() {
    parent::__construct();
    }

    function get_zakaznici($id = FALSE)
    {
    if ($id == FALSE) {
    $query = $this->db->get('zakaznici');
    return $query->result_array();
    }
    $query = $this->db->get_where('zakaznici', array('idZakaznika' => $id));
    return $query->row_array();
    }

    function get_zakaznici_podla_id($id){
        $this->db->where('idZakaznika', $id);
        $query = $this->db->get('zakaznici');
        if($query->num_rows() > 0){
            return $query->row_array();
        }else{
            return false;
        }
    }

    function set_zakaznici($id = 0)
    {
    $this->load->helper('url');
    foreach ($_POST as $key => $value) {
    if ($key != 'submit')
    $data[$key] = $value;
    }
    if ($id == 0) {
    return $this->db->insert('zakaznici', $data);
    } else {
    $this->db->where('idZakaznika', $id);
    return $this->db->update('zakaznici', $data);
    }
    }

    function delete_zakaznici($id)
    {
    $this->db->where('id', $id);
    return $this->db->delete('zakaznici');
    }
    }
    ?>

