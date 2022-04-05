<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Data_perjalanan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        error_reporting(0);
    }
    function index()
    {
        $data['halaman'] = "Data-Peduli Diri";
        $this->load->view('template/header_v', $data);
        $this->load->view('data_perjalanan_v');
        $this->load->view('template/footer_v');
    }
    function cetak_excel()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Tanggal');
        $sheet->setCellValue('C1', 'Waktu');
        $sheet->setCellValue('D1', 'Lokasi');
        $sheet->setCellValue('E1', 'Suhu Tubuh');

        $no = 1;
        $x = 2;
        $data = file('data/dataPerjalanan.txt', FILE_IGNORE_NEW_LINES);
        $user = $_SESSION['nik'] . "|" . $_SESSION['nama'];
        foreach ($data as $value) {
            $index = explode("|", $value);
            @$key = $index['1'] . "|" . $index['2'];
            if ($key == $user) {
                $sheet->setCellValue('A' . $x, $no++);
                $sheet->setCellValue('B' . $x, $index['3']);
                $sheet->setCellValue('C' . $x, $index['4']);
                $sheet->setCellValue('D' . $x, $index['5']);
                $sheet->setCellValue('E' . $x, $index['6']);
                $x++;
            }
        }

        $writer = new Xlsx($spreadsheet);
        $filename = 'laporan-catatan-perjalanan';

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
    function cetak_pdf()
    {
        // panggil library yang kita buat sebelumnya yang bernama pdfgenerator
        $this->load->library('pdfgenerator');

        // title dari pdf
        $this->data['title_pdf'] = 'Laporan Penjualan Toko Kita';

        // filename dari pdf ketika didownload
        $file_pdf = 'laporan_catatan_perjalanan';
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "portrait";

        $html = $this->load->view('laporan_pdf/cetak_data_perjalanan', $this->data, true);

        // run dompdf
        $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }
}
