<?php
defined('BASEPATH') or exit('No direct script access allowed');

// require('./application/third_party/PHPExcel/PHPExcel.php');

class LapPartdanMaterialKanPus extends MY_Controller
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
    $data = array();

    // cetak_die($data['Thermal']);
    $this->header('Laporan Part dan Material');
    $this->load->view('LaporanPusat/lap_partdanmaterial', $data);
    $this->footer();
  }

  public function List_LapPerso()
  {

    $list = $this->General->fetch_CoustomQuery("SELECT nama_barang,kode_barang,harga_barang,nama_sgbarang, count(nama_barang) AS qty FROM v_lap_part_material WHERE nama_gbarang LIKE '%Material%' GROUP BY nama_barang ORDER BY kode_barang ASC");
    // $list = $this->Serverside->_serverSide(
    //     'v_lap_part_material',
    //     ['no', 'nama_barang', 'kode_barang', 'harga_barang'],
    //     ['nama_barang', 'kode_barang', 'harga_barang'],
    //     ['nama_sgbarang' => 'DESC'],
    //     ['nama_gbarang' => 'Material'],
    //     null,
    //     'data'
    // );

    $countAll = $this->Serverside->_countAllLike('v_lap_part_material', '%Material%');
    // cetak_die($countAll[0]->result);
    $data = array();
    $no = $_POST['start'];

    foreach ($list as $results) {
      $row = array();
      $no++;
      $row[] = $no;
      $row[] = $results->nama_sgbarang;
      $row[] = $results->nama_barang;
      $row[] = $results->kode_barang;
      $row[] = rupiah($results->harga_barang);
      $row[] = $results->qty;
      $data[] = $row;
    }

    $output = array(
      "draw" => $_POST['draw'],
      "recordsTotal" => $countAll[0]->result,
      "recordsFiltered" => $list,

      "data" => $data,
    );

    echo json_encode($output);
  }

  public function List_LapSparepart()
  {

    $list = $this->General->fetch_CoustomQuery("SELECT nama_barang,kode_barang,harga_barang,nama_sgbarang, count(nama_barang) AS qty FROM v_lap_part_material WHERE nama_gbarang LIKE '%Sparepart%' GROUP BY nama_barang ORDER BY kode_barang ASC");

    $countAll = $this->Serverside->_countAllLike('v_lap_part_material', '%Sparepart%');

    $data = array();
    $no = $_POST['start'];

    foreach ($list as $results) {
      $row = array();
      $no++;
      $row[] = $no;
      $row[] = $results->nama_sgbarang;
      $row[] = $results->nama_barang;
      $row[] = $results->kode_barang;
      $row[] = rupiah($results->harga_barang);
      $row[] = $results->qty;
      $data[] = $row;
    }

    $output = array(
      "draw" => $_POST['draw'],
      "recordsTotal" => $countAll[0]->result,
      "recordsFiltered" => $list,
      "data" => $data,
    );
    echo json_encode($output);
  }

  public function downloadExcel()
  {
    include APPPATH . 'third_party/PHPExcel/PHPExcel.php';
    // cetak_die($data);

    $excel = new PHPExcel();
    // Settingan awal fil excel
    $excel->getProperties()->setCreator('My Notes Code')
      ->setLastModifiedBy('My Notes Code')
      ->setTitle("Data Siswa")
      ->setSubject("Siswa")
      ->setDescription("Laporan Semua Data Siswa")
      ->setKeywords("Data Siswa");
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
    $excel->setActiveSheetIndex(0)->setCellValue('A2', "Laporan Persediaan Part Dan Material Kantor Pusat"); // Set kolom A1 dengan tulisan "DATA SISWA"
    $excel->getActiveSheet()->mergeCells('A2:F2'); // Set Merge Cell pada kolom A1 sampai E1
    $excel->getActiveSheet()->getStyle('A2')->getFont()->setBold(TRUE); // Set bold kolom A1
    $excel->getActiveSheet()->getStyle('A2')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
    $excel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
    // Buat header tabel nya pada baris ke 3
    $excel->setActiveSheetIndex(0)->setCellValue('A3', "NO"); // Set kolom A3 dengan tulisan "NO"
    $excel->setActiveSheetIndex(0)->setCellValue('B3', "Subgrup Barang"); // Set kolom B3 dengan tulisan "NIS"
    $excel->setActiveSheetIndex(0)->setCellValue('C3', "Nama Barang"); // Set kolom C3 dengan tulisan "NAMA"
    $excel->setActiveSheetIndex(0)->setCellValue('D3', "Kode Barang"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
    $excel->setActiveSheetIndex(0)->setCellValue('E3', "Harga Beli"); // Set kolom E3 dengan tulisan "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('F3', "QTY");
    // Apply style header yang telah kita buat tadi ke masing-masing kolom header
    $excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
    // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
    $material = $this->General->fetch_CoustomQuery("SELECT nama_barang,kode_barang,harga_barang,nama_sgbarang, count(nama_barang) AS qty FROM v_lap_part_material WHERE nama_gbarang LIKE '%Material%' GROUP BY nama_barang ORDER BY kode_barang ASC");
    $sparepart = $this->General->fetch_CoustomQuery("SELECT nama_barang,kode_barang,harga_barang,nama_sgbarang, count(nama_barang) AS qty FROM v_lap_part_material WHERE nama_gbarang LIKE '%Sparepart%' GROUP BY nama_barang ORDER BY kode_barang ASC");
    // cetak_die($material);
    $no = 1; // Untuk penomoran tabel, di awal set dengan 1
    $numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
    foreach ($material as $data) { // Lakukan looping pada variabel siswa
      $excel->setActiveSheetIndex(0)->setCellValue('A' . $numrow, $no);
      $excel->setActiveSheetIndex(0)->setCellValue('B' . $numrow, $data->nama_sgbarang);
      $excel->setActiveSheetIndex(0)->setCellValue('C' . $numrow, $data->nama_barang);
      $excel->setActiveSheetIndex(0)->setCellValue('D' . $numrow, $data->kode_barang);
      $excel->setActiveSheetIndex(0)->setCellValue('E' . $numrow, $data->harga_barang);
      $excel->getActiveSheet()->getStyle('E' . $numrow,)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
      $excel->setActiveSheetIndex(0)->setCellValue('F' . $numrow, $data->qty);

      // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
      $excel->getActiveSheet()->getStyle('A' . $numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('B' . $numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('C' . $numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('D' . $numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('E' . $numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('F' . $numrow)->applyFromArray($style_row);

      $no++; // Tambah 1 setiap kali looping
      $numrow++; // Tambah 1 setiap kali looping
    }
    foreach ($sparepart as $data) { // Lakukan looping pada variabel siswa
      $excel->setActiveSheetIndex(0)->setCellValue('A' . $numrow, $no);
      $excel->setActiveSheetIndex(0)->setCellValue('B' . $numrow, $data->nama_sgbarang);
      $excel->setActiveSheetIndex(0)->setCellValue('C' . $numrow, $data->nama_barang);
      $excel->setActiveSheetIndex(0)->setCellValue('D' . $numrow, $data->kode_barang);
      $excel->setActiveSheetIndex(0)->setCellValue('E' . $numrow, $data->harga_barang);
      $excel->getActiveSheet()->getStyle('E' . $numrow,)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
      $excel->setActiveSheetIndex(0)->setCellValue('F' . $numrow, $data->qty);

      // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
      $excel->getActiveSheet()->getStyle('A' . $numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('B' . $numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('C' . $numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('D' . $numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('E' . $numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('F' . $numrow)->applyFromArray($style_row);

      $no++; // Tambah 1 setiap kali looping
      $numrow++; // Tambah 1 setiap kali looping
    }

    // Set width kolom
    $excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
    $excel->getActiveSheet()->getColumnDimension('B')->setWidth(15); // Set width kolom B
    $excel->getActiveSheet()->getColumnDimension('C')->setWidth(25); // Set width kolom C
    $excel->getActiveSheet()->getColumnDimension('D')->setWidth(20); // Set width kolom D
    $excel->getActiveSheet()->getColumnDimension('E')->setWidth(30); // Set width kolom E
    // $excel->getActiveSheet()->getColumnDimension('F')->setWidth(30); // Set width kolom E

    // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
    $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
    // Set orientasi kertas jadi LANDSCAPE
    $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
    // Set judul file excel nya
    $excel->getActiveSheet(0)->setTitle("Sheet1");
    $excel->setActiveSheetIndex(0);
    // Proses file excel
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="Laporan Persediaan Part Dan Material Kantor Pusat ' . date('Y-m-d') . ' .xlsx"'); // Set nama file excel nya
    header('Cache-Control: max-age=0');
    $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
    $write->save('php://output');
  }
}
