<?php
defined("BASEPATH") OR exit("No direct script access allowed");

require 'vendor/autoload.php';

class Import extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model("ProductModel");
    }
    public function products() {
        if ($_SERVER["REQUEST_METHOD"] == 'POST') {
            $upload_status = $this->uploadDoc();

            if ($upload_status !== false) {
                $inputFileName = 'assets/uploads/imports/' . $upload_status;
                $inputFileType = \PhpOffice\PhpSpreadsheet\IOFactory::identify($inputFileName);
                $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputFileType);
                $spreadsheet = $reader->load($inputFileName);
                $sheet = $spreadsheet->getActiveSheet();

                // Start reading from row 7
                $highestRow = $sheet->getHighestRow();
                $count_rows = 0;
                for ($row = 9; $row <= $highestRow; $row++) {
                    $item_no       = $sheet->getCell('A' . $row)->getValue();
                    $description   = $sheet->getCell('B' . $row)->getValue();
                    $code      = $sheet->getCell('C' . $row)->getValue();
                    $qty           = $sheet->getCell('D' . $row)->getValue();
                    $unit    = $sheet->getCell('E' . $row)->getValue();
                    $unit_price   = $sheet->getCell('F' . $row)->getValue();
                    $total_price      = $sheet->getCell('G' . $row)->getCalculatedValue();
                    $remarks      = $sheet->getCell('H' . $row)->getValue();

                    if (!empty($item_no)) { // Prevent inserting empty rows
                        $data = [
                            'item_no'      => $item_no,
                            'description'  => $description,
                            'code'=> $code,
                            'unit'          => $unit,
                            'unit_price'   => $unit_price,
                            'total_price'  => $total_price,
                            'remarks'      => $remarks,
                            'qty'     => $qty
                        ];

                        // $this->db->insert('products', $data); // insert into `products` table
                        $this->ProductModel->insert_products($data);
                        $count_rows++;

                    }
                }
                $this->session->set_flashdata('success', "$count_rows product(s) inserted successfully.");

            } else {
                $this->session->set_flashdata('error', "File is not uploaded");
                // redirect(base_url());
            }
        } else {
             // You should create a file upload form view
        }
$this->load->view('import/products');
    }

    function uploadDoc() {
        $uploadPath = 'assets/uploads/imports/';
        if (!is_dir($uploadPath)) {
            mkdir($uploadPath, 0777, TRUE);
        }

        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] = 'csv|xlsx|xls';
        $config['max_size'] = 100000;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if ($this->upload->do_upload("product_file")) {
            $fileData = $this->upload->data();
            return $fileData['file_name'];
        } else {
            return false;
        }
    }
}
