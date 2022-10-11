<?php
defined('BASEPATH') or exit('No direct script access allowed');

// require('./application/third_party/PHPExcel/PHPExcel.php');

class LapPersediaanSparepart extends MY_Controller
{
  public function __construct()
  {
    parent::__construct();
    if (!$this->session->userdata("user_login")) {
      redirect('Auth');
    }
  }

  // ----------------------------------------------------------------

  public function index()
  {

    $this->header('Laporan Persediaan Sparepart');
    $this->load->view('Laporancabang/lap_persediaansparepart');
    $this->footer();
  }

  public function list_LapPersediaanSparepart()
  {
    $id_uker = $this->session->userdata('user_login')['id_uker'];
    $list = $this->General->fetch_CoustomQuery("SELECT nama_uker, nama_barang,nama_merek, kode_barang, round(harga_barang) as harga_barang,qty FROM `v_stockcbg` no_urut WHERE id_jtran = '2' AND dari_uker = '1' AND is_have = '1' AND id_uker = '" . $id_uker . "'  AND qty != 0 GROUP BY no_urut HAVING COUNT(*) >0");
    // cetak_die($list);

    $data = array();
    $no = $_POST['start'];

    foreach ($list as $results) {

      // $a = $this->General->getRow('tbl_stock', ['id_tipe_barang' => $results->id_tipe_barang, 'id_uker' => $results->id_uker]);


      $row = array();
      $no++;
      $row[] = $no;
      $row[] = $results->nama_uker;
      $row[] = $results->nama_barang;
      $row[] = $results->nama_merek;
      $row[] = $results->kode_barang;
      $row[] = rupiah($results->harga_barang);
      // $row[] = $results->nama_mere;
      // $row[] = $results->max_stock;
      $row[] = $results->qty;
      // $row[] = rupiah($results->total_harga);

      $data[] = $row;
    }

    $output = array(
      "draw" => $_POST['draw'],
      "recordsTotal" => $this->Serverside->_countAll('v_stockcbg'),
      "recordsFiltered" => $list,
      "data" => $data,
    );

    echo json_encode($output);
  }

  public function filter_PersediaanSparepart()
  {
    $status = input('status');
    // cetak_die($status);
    $id_uker = $this->session->userdata('user_login')['id_uker'];
    $list = $this->General->fetch_CoustomQuery("SELECT nama_uker, nama_barang,nama_merek, kode_barang, round(harga_barang) as harga_barang,qty FROM `v_stockcbg` no_urut WHERE kon_barang = '" . $status . "' AND id_jtran = '2' AND dari_uker = '1' AND is_have = '1' AND id_uker = '" . $id_uker . "'  AND qty != 0");
    // lastq();

    $data = array();
    $no = $_POST['start'];

    foreach ($list as $results) {

      // $a = $this->General->getRow('tbl_stock', ['id_tipe_barang' => $results->id_tipe_barang, 'id_uker' => $results->id_uker]);


      $row = array();
      $no++;
      $row[] = $no;
      $row[] = $results->nama_uker;
      $row[] = $results->nama_barang;
      $row[] = $results->nama_merek;
      $row[] = $results->kode_barang;
      $row[] = rupiah($results->harga_barang);
      // $row[] = $results->nama_mere;
      // $row[] = $results->max_stock;
      $row[] = $results->qty;
      // $row[] = rupiah($results->total_harga);

      $data[] = $row;
    }

    $output = array(
      "draw" => $_POST['draw'],
      "recordsTotal" => $this->Serverside->_countAll('v_stockcbg'),
      "recordsFiltered" => $list,
      "data" => $data,
    );

    echo json_encode($output);
  }

  public function downloadExcel()
  {
    include APPPATH . 'third_party/PHPExcel/PHPExcel.php';
    $status = input('status');
    // Panggil class PHPExcel nya
    $excel = new PHPExcel();
    // Settingan awal fil excel
    $excel->getProperties()->setCreator('My Notes Code')
      ->setLastModifiedBy('My Notes Code')
      ->setTitle("RINCIAN BAD PART KANTOR CABANG SELINDO")
      ->setSubject("PART")
      ->setDescription("Laporan RINCIAN BAD PART KANTOR CABANG SELINDO")
      ->setKeywords("RINCIAN BAD PART KANTOR CABANG SELINDO");
    // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
    $style_col = array(
      'font' => array('bold' => true), // Set font nya jadi bold
      'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
      ),
      'borders' => array(
        'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
        'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
        'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
        'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
      )
    );
    // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
    $style_row = array(
      'alignment' => array(
        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
      ),
      'borders' => array(
        'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
        'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
        'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
        'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
      )
    );
    $excel->setActiveSheetIndex(0)->setCellValue('A2', "RINCIAN BAD PART KANTOR CABANG SELINDO"); // Set kolom A1 dengan tulisan "DATA SISWA"
    $excel->getActiveSheet()->mergeCells('A2:H2'); // Set Merge Cell pada kolom A1 sampai E1
    $excel->getActiveSheet()->getStyle('A2')->getFont()->setBold(TRUE); // Set bold kolom A1
    $excel->getActiveSheet()->getStyle('A2')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
    $excel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
    // Buat header tabel nya pada baris ke 3
    $excel->setActiveSheetIndex(0)->setCellValue('A3', "NO"); // Set kolom A3 dengan tulisan "NO"
    $excel->setActiveSheetIndex(0)->setCellValue('B3', "ASAL"); // Set kolom B3 dengan tulisan "NIS"
    $excel->setActiveSheetIndex(0)->setCellValue('C3', "SN"); // Set kolom C3 dengan tulisan "NAMA"
    $excel->setActiveSheetIndex(0)->setCellValue('D3', "MEREK"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
    $excel->setActiveSheetIndex(0)->setCellValue('E3', "NAMA PART"); // Set kolom E3 dengan tulisan "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('F3', "QTY"); // Set kolom E3 dengan tulisan "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('G3', "HARGA BARANG"); // Set kolom E3 dengan tulisan "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('H3', "TOTAL NILAI BARANG"); // Set kolom E3 dengan tulisan "ALAMAT"
    // Apply style header yang telah kita buat tadi ke masing-masing kolom header
    $excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('G3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('H3')->applyFromArray($style_col);
    // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
    $id_uker = $this->session->userdata('user_login')['id_uker'];
    $siswa = $this->General->fetch_CoustomQuery("SELECT nama_uker,no_sn, nama_merek,nama_barang, qty, round(harga_barang) as harga_barang, round((qty*harga_barang)) as harga_barang_total FROM `v_stockcbg` no_urut WHERE id_jtran = '2' AND dari_uker = '1' AND kon_barang = '0' AND is_have = '1' AND id_uker = '" . $id_uker . "' AND qty != 0");
    $no = 1; // Untuk penomoran tabel, di awal set dengan 1
    $numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
    foreach ($siswa as $data) { // Lakukan looping pada variabel siswa
      $excel->setActiveSheetIndex(0)->setCellValue('A' . $numrow, $no);
      $excel->setActiveSheetIndex(0)->setCellValue('B' . $numrow, $data->nama_uker);
      $excel->setActiveSheetIndex(0)->setCellValue('C' . $numrow, $data->no_sn);
      $excel->setActiveSheetIndex(0)->setCellValue('D' . $numrow, $data->nama_merek);
      $excel->setActiveSheetIndex(0)->setCellValue('E' . $numrow, $data->nama_barang);
      $excel->setActiveSheetIndex(0)->setCellValue('F' . $numrow, $data->qty);
      $excel->setActiveSheetIndex(0)->setCellValue('G' . $numrow, $data->harga_barang);
      $excel->setActiveSheetIndex(0)->setCellValue('H' . $numrow, $data->harga_barang_total);

      // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
      $excel->getActiveSheet()->getStyle('A' . $numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('B' . $numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('C' . $numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('D' . $numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('E' . $numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('F' . $numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('G' . $numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('H' . $numrow)->applyFromArray($style_row);

      $no++; // Tambah 1 setiap kali looping
      $numrow++; // Tambah 1 setiap kali looping
    }
    // Set width kolom
    $excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
    $excel->getActiveSheet()->getColumnDimension('B')->setWidth(15); // Set width kolom B
    $excel->getActiveSheet()->getColumnDimension('C')->setWidth(25); // Set width kolom C
    $excel->getActiveSheet()->getColumnDimension('D')->setWidth(20); // Set width kolom D
    $excel->getActiveSheet()->getColumnDimension('E')->setWidth(30); // Set width kolom E

    // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
    $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
    // Set orientasi kertas jadi LANDSCAPE
    $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
    // Set judul file excel nya
    $excel->getActiveSheet(0)->setTitle("Bad Part Kanca");
    $excel->setActiveSheetIndex(0);
    // Proses file excel
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="RINCIAN BAD PART KANTOR CABANG SELINDO ' . date('Y-m-d') . ' .xlsx"'); // Set nama file excel nya
    header('Cache-Control: max-age=0');
    $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
    $write->save('php://output');
  }
}
