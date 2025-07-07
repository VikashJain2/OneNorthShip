<?php
defined("BASEPATH") or exit("No direct script access allowed");
class OrderModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function save_order($order_data, $order_items)
    {
        $this->db->trans_start();
        $this->db->insert("orders", $order_data);
        $order_id = $this->db->insert_id();
        foreach ($order_items as $item) {
            $item['order_id'] = $order_id;
            $this->db->insert("order_items", $item);
        }
        $this->db->trans_complete();
        return $this->db->trans_status();
    }

    public function process_order_items($file)
    {
        if ($_SERVER["REQUEST_METHOD"] == 'POST') {
            $upload_status = $file;

            if ($upload_status !== false) {
                $inputFileName = 'assets/uploads/imports/' . $upload_status;
                $inputFileType = \PhpOffice\PhpSpreadsheet\IOFactory::identify($inputFileName);
                $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputFileType);
                $spreadsheet = $reader->load($inputFileName);
                $sheet = $spreadsheet->getActiveSheet();

                // Start reading from row 7
                $highestRow = $sheet->getHighestRow();
                for ($row = 9; $row <= $highestRow; $row++) {
                    $code      = $sheet->getCell('C' . $row)->getValue();
                    $qty           = $sheet->getCell('D' . $row)->getValue();
            
                    if (!empty($code) && !empty($qty)) { // Prevent inserting empty rows

                        $product = $this->get_product_by_code($code);

                        if($product){
                            $items[] = array(
                                'product_id' => $product['id'],
                                'quantity'=> $product['qty'],
                                'unit_price'=> $product['unit_price'],
                                'total_price'=> $qty * $product['unit_price'],
                                'item_no'=> $product['item_no'],
                                'description'=> $product['description'],
                                'unit' => $product['unit'],
                            );
                        }
                    }
                }
              return $items;
            }
        }
    }


    public function get_product_by_code($code){
       $this->db->where('code', $code);
$query = $this->db->get('products');
return $query->row_array();

    }

    function uploadDoc()
    {
        
    }
}
