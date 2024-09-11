<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Mpdf\Mpdf;

class PdfController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('CrudModel', 'crudModel');
        $this->load->library('session');
        if ($this->session->userdata('role') !== 'admin') {
            redirect('login/');
        }
    }

    public function generate_pdf()
    {
        // Load your view with data
        $id = $this->uri->segment(3);

        $tampil = $this->db->query('SELECT * FROM package JOIN kota
            WHERE package.id_package = ' . $id . ' AND package.id_kota = kota.id_kota')->row();
        $no_pack = $this->db->escape($tampil->no_package);

        $data = [
            'package' => [
                'id_package' => $tampil->id_package,
                'no_package' => $tampil->no_package,
                'customer_name' => $tampil->customer_name,
                'phone' => $tampil->phone,
                'address' => $tampil->address,
                'kota' => $tampil->kota,
                't_kg' => $tampil->t_kg,
                't_kgv' => $tampil->t_kgv,
                'date' => $tampil->date,
                'metode_pembayaran' => $tampil->metode_pembayaran,
            ],

            'product' => $this->db->query('SELECT * FROM product')->result(),
            'v_package' => $this->db->query('SELECT * FROM v_package JOIN package JOIN product WHERE v_package.id_package = ' . $id . ' AND v_package.id_package = package.id_package AND v_package.id_product = product.id_product')->result(),
            'v_capacity' => $this->db->query(' SELECT driver.driver,driver.phone,driver.email FROM v_capacity JOIN package JOIN kota JOIN driver JOIN capacity WHERE package.no_package = ' . $no_pack . ' AND package.id_kota = kota.id_kota AND capacity.id_driver = driver.id_driver ORDER BY kota.priority desc LIMIT 1')->result(),
        ];
        $html = $this->load->view('ReportPackage', $data, TRUE); // TRUE returns the view as a string

        // Initialize mPDF
        $mpdf = new Mpdf();

        // Write HTML to PDF
        $mpdf->WriteHTML($html);

        // Output PDF (D forces download, I shows inline)
        $mpdf->Output('report.pdf', 'D');
    }
}
