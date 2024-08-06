<?php
class Products extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Product_model');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
    }

    public function index()
    {
        if ($this->input->is_ajax_request()) {
            $products = $this->Product_model->get_products();
            echo json_encode($products);
        } else {
            $data['products'] = $this->Product_model->get_products();
            if (empty($data['products'])) {
                log_message('error', 'No products found.');
            }

            $this->load->view('products/index', $data);
        }
    }

    public function create()
    {
        $this->load->view('products/create');
    }

    public function store()
    {
        $data = array(
            'name' => $this->input->post('name'),
            'description' => $this->input->post('description'),
            'price' => $this->input->post('price'),
            'quantity' => $this->input->post('quantity'),
        );
        $this->Product_model->set_product($data);
        redirect('products');
    }

    public function edit($id)
    {
        $data['product'] = $this->Product_model->get_products($id);
        $this->load->view('products/edit', $data);
    }

    public function update($id)
    {
        $data = array(
            'name' => $this->input->post('name'),
            'description' => $this->input->post('description'),
            'price' => $this->input->post('price'),
            'quantity' => $this->input->post('quantity'),
        );
        $this->Product_model->update_product($id, $data);
        redirect('products');
    }

    public function delete($id)
    {
        $this->Product_model->delete_product($id);
        redirect('products');
    }
}
