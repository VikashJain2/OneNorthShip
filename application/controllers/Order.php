<?php
defined("BASEPATH") or exit("No direct script access allowed");

class Order extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('OrderModel');
        $this->load->model('ProductModel');
        if (!$this->session->userdata('user_id')) {
            redirect('auth/login');
        }
    }


    public function index()
    {
        $this->load->view('order/form');
    }

    public function upload()
    {
        if ($this->input->post()) {
            $uploadPath = 'assets/uploads/imports/';
            $this->form_validation->set_rules("customer_name", 'Customer Name', 'required');

            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('order_id', 'Order Id', 'required|is_unique[orders.order_id]');
            $this->form_validation->set_rules('order_date', 'Order Date', 'required');
            $this->form_validation->set_rules('payment_method', 'Payment Method', 'required');

            if ($this->form_validation->run() == TRUE) {
                $uploadPath = 'assets/uploads/imports/';
                if (!is_dir($uploadPath)) {
                    mkdir($uploadPath, 0777, TRUE);
                }

                $config['upload_path'] = $uploadPath;
                $config['allowed_types'] = 'csv|xlsx|xls';
                $config['max_size'] = 100000;
                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if ($this->upload->do_upload("order_items")) {
                    $fileData = $this->upload->data();
                     $uploadedFile = $fileData['file_name'];
                    $fullFilePath = $uploadPath . $uploadedFile;
                    $order_items = $this->OrderModel->process_order_items($uploadedFile);
                   
                    if (file_exists($fullFilePath)) {
                        unlink($fullFilePath);
                    }
                    if ($order_items) {
                        $data['form_data'] = array(
                            'customer_name' => $this->input->post('customer_name'),
                            'email' => $this->input->post('email'),
                            'order_id' => $this->input->post('order_id'),
                            'order_date' => $this->input->post('order_date'),
                            'payment_method' => $this->input->post('payment_method')
                        );

                        // log_message('success', 'Upload data: ', $data);

                        $data['order_items'] = $order_items;
                        $this->load->view('order/preview', $data);
                        return;
                    } else {
                        $this->session->set_flashdata('error', 'No valid items found in the uploaded sheet');
                    }
                } else {
                    log_message('error', 'Upload Error: ' . $this->upload->display_errors());
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                }
            }
        }
        $this->load->view('order/form');
    }

    public function save()
    {
        if ($this->input->post()) {
            $this->form_validation->set_rules('customer_name', 'Customer Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('order_id', 'Order Id', 'required|is_unique[orders.order_id]');

            $this->form_validation->set_rules('order_date', 'Order Date', 'required');
            $this->form_validation->set_rules('payment_method', 'Payment Method', 'required');


            if ($this->form_validation->run() == TRUE) {
                $order_data = array(
                    'customer_name' => $this->input->post('customer_name'),
                    'email' => $this->input->post('email'),
                    'order_id' => $this->input->post('order_id'),
                    'order_date' => $this->input->post('order_date'),
                    'payment_method' => $this->input->post('payment_method'),
                    'user_id' => $this->session->userdata('user_id'),
                );
                $order_items = json_decode($this->input->post('order_items'), true);

                if ($this->OrderModel->save_order($order_data, $order_items)) {
                    $this->session->set_flashdata('message', 'Order saved succssfully');

                    redirect('order');
                } else {
                    log_message('error', 'Upload Error: ' . $this->upload->display_errors());

                    $this->session->set_flashdata('error', 'Failed to save order');
                }
            }
        }
        $this->load->view('order/preview', $this->input->post());
    }
}
