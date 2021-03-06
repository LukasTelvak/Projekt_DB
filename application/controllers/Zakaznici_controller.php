<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Zakaznici_controller extends CI_Controller{

    function __construct() {
        parent::__construct();
        $this->load->helper('url_helper');
        $this->load->model('Zakaznici_model');

    }

    public function index()
    {
        $data['zakaznici'] = $this->Zakaznici_model->get_zakaznici();
        $data['title'] = 'Zakaznici';
        $this->load->view('template/header', $data);
        $this->load->view('template/navigation');
        $this->load->view('zakaznici/index', $data);
        $this->load->view('template/footer');
    }

    public function create()
    {
        $this->load->view('template/header');
        $this->load->view('template/navigation');
        $this->load->view('zakaznici/create');
        $this->load->view('template/footer');
    }

    public function view($id = NULL)
    {
        $data['customers_item'] = $this->Zakaznici_model->get_zakaznici($id);
        if (empty($data['customers_item'])) {
            show_404();
        }
        $data['title'] = $data['customers_item']['Meno'] . $data['customers_item']['Priezvisko'];
        $this->load->view('template/header', $data);
        $this->load->view('template/navigation');
        $this->load->view('zakaznici/view', $data);
        $this->load->view('template/footer');
    }

    public function delete()
    {
        $id = $this->uri->segment(3);
        if (empty($id)) {
            show_404();
        }
        $customers_item = $this->Zakaznici_model->get_zakaznici_podla_id($id);
        $this->news_model->delete_zakaznici($id);
        redirect(base_url() . 'index.php/zakaznici');
    }

    public function edit()
    {
        $id = $this->uri->segment(3);
        if (empty($id)) {
            show_404();
        }
        $this->load->helper('form');
        $this->load->library('form_validation');
        $data['customers_item'] = $this->Zakaznici_model->get_zakaznici_podla_id($id);
        $data['title'] = 'Upraviť profil zákazníka ';
        $data['subtitle'] = $data['customers_item']['Meno'] . $data['customers_item']['Priezvisko'];
        $this->form_validation->set_rules('idZakaznika', 'Číslo Zákazníka', 'required');
        $this->form_validation->set_rules('Meno', 'Meno zákazníka', 'required');
        $this->form_validation->set_rules('Priezvisko', 'Priezvisko zákazníka', 'required');
        $this->form_validation->set_rules('Telefon', 'Telefónne číslo', 'required');
        $this->form_validation->set_rules('Adresa', 'Adresa zákazníka', 'required');
        $this->form_validation->set_rules('Mesto', 'Mesto', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('template/navigation');
            $this->load->view('zakaznici/edit', $data);
            $this->load->view('template/footer');
        } else {
            $this->Zakaznici_model->set_zakaznici($id);
            redirect(base_url() . 'index.php/zakaznici');
        }
    }
}
?>
