<?php
defined('BASEPATH') or exit('No direct script access allowed');

// require('./application/third_party/PHPExcel/PHPExcel.php');

class LapStockOpname extends MY_Controller
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
    $data = array(
      'TotalPusat' => $this->General->fetch_CoustomQuery("SELECT nama_sgbarang, SUM(harga_barang) AS gudang_bg_pusat FROM v_laporan_opname_pusat GROUP BY nama_sgbarang"),
      'QC' => $this->General->fetch_CoustomQuery(" SELECT sum(harga_barang) as QC FROM v_laporan_opname_pusat WHERE kode_barang LIKE '%PP029%' OR kode_barang LIKE '%PP030%' OR kode_barang LIKE '%PP031%' OR kode_barang LIKE '%PP032%' OR kode_barang LIKE '%PP033%'"),
      'AtmCabang' => $this->General->fetch_CoustomQuery("SELECT nama_merek, round(SUM(harga_barang*qty),0) AS total FROM v_laporan_opname_cabang WHERE id_jtran = '2' AND is_have = '1' AND kon_barang = '1' GROUP BY nama_merek"),
      'AtmHyosung' => $this->General->fetch_CoustomQuery("SELECT sum(harga_barang) as hyosung from v_laporan_opname_pusat WHERE kode_barang LIKE '%AH%'"),
      'AtmNcr' => $this->General->fetch_CoustomQuery("SELECT sum(harga_barang) as ncr from v_laporan_opname_pusat WHERE kode_barang LIKE '%AN%'"),
      'AtmWincor' => $this->General->fetch_CoustomQuery("SELECT sum(harga_barang) as wincor from v_laporan_opname_pusat WHERE kode_barang LIKE '%AW%'"),
      'ThermalCab' => $this->General->fetch_CoustomQuery("SELECT nama_merek, round(SUM(harga_barang*qty),0) AS total FROM v_laporan_opname_cabang WHERE kode_barang LIKE '%PP%' GROUP BY nama_merek"),
      'BadPartHyosung' => $this->General->fetch_CoustomQuery("select round(sum(qty*harga_barang)) as total from v_laporan_opname_cabang WHERE kon_barang = 0 AND kode_barang LIKE '%AH%'"),
      'BadPartNCR' => $this->General->fetch_CoustomQuery("select round(sum(qty*harga_barang)) as total from v_laporan_opname_cabang WHERE kon_barang = 0 AND kode_barang LIKE '%AN%'"),
      'BadPartWincore' => $this->General->fetch_CoustomQuery("select round(sum(qty*harga_barang)) as total from v_laporan_opname_cabang WHERE kon_barang = 0 AND kode_barang LIKE '%AW%'"),
      'BadPartCRM' => $this->General->fetch_CoustomQuery("select round(sum(qty*harga_barang)) as total from v_laporan_opname_cabang WHERE kon_barang = 0 AND nama_sgbarang LIKE '%CRM%'"),
      'BadPartSSB' => $this->General->fetch_CoustomQuery("select round(sum(qty*harga_barang)) as total from v_laporan_opname_cabang WHERE kon_barang = 0 AND nama_sgbarang LIKE '%SSB%'"),

    );

    // cetak_die($data['BadPartHyosung']);
    $this->header('Laporan Stock Opname');
    $this->load->view('LaporanPusat/lap_stockopname', $data);
    $this->footer();
  }

  public function downloadExcel()
  {
    include APPPATH . 'third_party/PHPExcel/PHPExcel.php';
    // cetak_die($data);

    //Ambil Data
    $data = array(
      'TotalPusat' => $this->General->fetch_CoustomQuery("SELECT nama_sgbarang, SUM(harga_barang) AS gudang_bg_pusat FROM v_laporan_opname_pusat GROUP BY nama_sgbarang"),
      'QC' => $this->General->fetch_CoustomQuery(" SELECT sum(harga_barang) as QC FROM v_laporan_opname_pusat WHERE kode_barang LIKE '%PP029%' OR kode_barang LIKE '%PP030%' OR kode_barang LIKE '%PP031%' OR kode_barang LIKE '%PP032%' OR kode_barang LIKE '%PP033%'"),
      'AtmCabang' => $this->General->fetch_CoustomQuery("SELECT nama_merek, round(SUM(harga_barang*qty),0) AS total FROM v_laporan_opname_cabang WHERE id_jtran = '2' AND is_have = '1' AND kon_barang = '1' GROUP BY nama_merek"),
      'AtmHyosung' => $this->General->fetch_CoustomQuery("SELECT sum(harga_barang) as hyosung from v_laporan_opname_pusat WHERE kode_barang LIKE '%AH%'"),
      'AtmNcr' => $this->General->fetch_CoustomQuery("SELECT sum(harga_barang) as ncr from v_laporan_opname_pusat WHERE kode_barang LIKE '%AN%'"),
      'AtmWincor' => $this->General->fetch_CoustomQuery("SELECT sum(harga_barang) as wincor from v_laporan_opname_pusat WHERE kode_barang LIKE '%AW%'"),
      'ThermalCab' => $this->General->fetch_CoustomQuery("SELECT nama_merek, round(SUM(harga_barang*qty),0) AS total FROM v_laporan_opname_cabang WHERE kode_barang LIKE '%PP%' GROUP BY nama_merek"),
      'BadPartHyosung' => $this->General->fetch_CoustomQuery("select round(sum(qty*harga_barang)) as total from v_laporan_opname_cabang WHERE kon_barang = 0 AND kode_barang LIKE '%AH%'"),
      'BadPartNCR' => $this->General->fetch_CoustomQuery("select round(sum(qty*harga_barang)) as total from v_laporan_opname_cabang WHERE kon_barang = 0 AND kode_barang LIKE '%AN%'"),
      'BadPartWincore' => $this->General->fetch_CoustomQuery("select round(sum(qty*harga_barang)) as total from v_laporan_opname_cabang WHERE kon_barang = 0 AND kode_barang LIKE '%AW%'"),
      'BadPartCRM' => $this->General->fetch_CoustomQuery("select round(sum(qty*harga_barang)) as total from v_laporan_opname_cabang WHERE kon_barang = 0 AND nama_sgbarang LIKE '%CRM%'"),
      'BadPartSSB' => $this->General->fetch_CoustomQuery("select round(sum(qty*harga_barang)) as total from v_laporan_opname_cabang WHERE kon_barang = 0 AND nama_sgbarang LIKE '%SSB%'"),

    );
    //Hitungan --------------------------------------------------------------------------------------------------------------
    $total = ($data['TotalPusat'][7]->gudang_bg_pusat + $data['TotalPusat'][8]->gudang_bg_pusat + $data['TotalPusat'][6]->gudang_bg_pusat + $data['QC'][0]->QC + $data['TotalPusat'][4]->gudang_bg_pusat + $data['TotalPusat'][5]->gudang_bg_pusat + $data['TotalPusat'][1]->gudang_bg_pusat);
    $totalcabang = ($data['TotalPusat'][7]->gudang_bg_pusat + $data['TotalPusat'][8]->gudang_bg_pusat + $data['TotalPusat'][6]->gudang_bg_pusat + $data['QC'][0]->QC + $data['TotalPusat'][4]->gudang_bg_pusat + $data['TotalPusat'][5]->gudang_bg_pusat + $data['TotalPusat'][1]->gudang_bg_pusat);
    $totalGoodPart = ($data['AtmHyosung'][0]->hyosung + $data['AtmNcr'][0]->ncr + $data['AtmWincor'][0]->wincor + $data['TotalPusat'][2]->gudang_bg_pusat + $data['TotalPusat'][3]->gudang_bg_pusat + $data['TotalPusat'][9]->gudang_bg_pusat);
    $totalGoodPartCab = ($data['AtmCabang'][0]->total + $data['AtmCabang'][2]->total + $data['AtmCabang'][3]->total);
    $totalGoodPartHyosung = ($data['AtmHyosung'][0]->hyosung + $data['AtmCabang'][0]->total);
    $totalGoodPartNcr = ($data['AtmNcr'][0]->ncr + $data['AtmCabang'][2]->total);
    $totalGoodPartWincor = ($data['AtmWincor'][0]->wincor + $data['AtmCabang'][3]->total);
    $totalGoodPartAll = ($totalGoodPartHyosung + $totalGoodPartNcr + $totalGoodPartWincor + $data['TotalPusat'][2]->gudang_bg_pusat + $data['TotalPusat'][3]->gudang_bg_pusat + $data['TotalPusat'][9]->gudang_bg_pusat);
    $totalthermal = ($data['TotalPusat'][6]->gudang_bg_pusat + $data['ThermalCab'][0]->total);
    $totalpusatAll = ($data['TotalPusat'][7]->gudang_bg_pusat + $data['TotalPusat'][8]->gudang_bg_pusat + $data['QC'][0]->QC + $data['TotalPusat'][4]->gudang_bg_pusat + $data['TotalPusat'][5]->gudang_bg_pusat + $data['TotalPusat'][1]->gudang_bg_pusat + $totalthermal);
    $Totalbadpartpusat = ($data['BadPartHyosung'][0]->total + $data['BadPartNCR'][0]->total + $data['BadPartWincore'][0]->total + $data['BadPartCRM'][0]->total + $data['BadPartSSB'][0]->total);
    // -------------------------------------------------------------------------------------------------------------------------
    // cetak_die($Totalbadpartpusat);    
    // Panggil class PHPExcel nya
    $excel = new PHPExcel();
    // Settingan awal fil excel
    $excel->getProperties()->setCreator($this->session->userdata('user_login')['username'])
      ->setLastModifiedBy($this->session->userdata('user_login')['username'])
      ->setTitle("Laporan Stock Opname")
      ->setSubject("Laporan Stock Opname")
      ->setDescription("Laporan Stock Opname")
      ->setKeywords("Laporan Stock Opname");
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
    $excel->setActiveSheetIndex(0)->setCellValue('A1', "Laporan Stock Opname Persediaan Sparepart dan Material"); // Set kolom A1 dengan tulisan "DATA SISWA"
    $excel->getActiveSheet()->mergeCells('A1:E1'); // Set Merge Cell pada kolom A1 sampai E1
    $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
    $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
    $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
    // Buat header tabel nya pada baris ke 3
    $excel->setActiveSheetIndex(0)->setCellValue('A2', "NO"); // Set kolom A3 dengan tulisan "NO"
    $excel->getActiveSheet()->mergeCells('A2:A3');
    $excel->setActiveSheetIndex(0)->setCellValue('B2', "Jenis Persediaan"); // Set kolom B3 dengan tulisan "NIS"
    $excel->getActiveSheet()->mergeCells('B2:B3');
    $excel->setActiveSheetIndex(0)->setCellValue('C2', "Opname"); // Set kolom C3 dengan tulisan "NAMA"
    $excel->getActiveSheet()->mergeCells('C2:E2');
    $excel->setActiveSheetIndex(0)->setCellValue('C3', "Gudang (BG PUSAT)");
    $excel->setActiveSheetIndex(0)->setCellValue('D3', "Kanca BG Selindo"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
    $excel->setActiveSheetIndex(0)->setCellValue('E3', "Total"); // Set kolom E3 dengan tulisan "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('A4', "1");
    $excel->setActiveSheetIndex(0)->setCellValue('B4', "Material");
    $excel->getActiveSheet()->getStyle('B4')->getFont()->setBold(TRUE);
    $excel->setActiveSheetIndex(0)->setCellValue('B5', "Perso");
    $excel->setActiveSheetIndex(0)->setCellValue('B6', "PMS-LAN");
    $excel->setActiveSheetIndex(0)->setCellValue('B7', "Thermal & Segel");
    $excel->setActiveSheetIndex(0)->setCellValue('B8', "Perangkat Pengetesan & QC");
    $excel->setActiveSheetIndex(0)->setCellValue('B9', "Perangkat Notebook BRILife");
    $excel->setActiveSheetIndex(0)->setCellValue('B10', "Perangkat IT EX Project dan Asset");
    $excel->setActiveSheetIndex(0)->setCellValue('B11', "CCTV Pertamina Retail");
    $excel->setActiveSheetIndex(0)->setCellValue('B12', "Total :");
    //Pusat ---------------------------------------------------------------------------------------------------
    $excel->setActiveSheetIndex(0)->setCellValue('C5', $data['TotalPusat'][7]->gudang_bg_pusat);
    $excel->getActiveSheet()->getStyle('C5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
    $excel->setActiveSheetIndex(0)->setCellValue('C6', $data['TotalPusat'][8]->gudang_bg_pusat);
    $excel->getActiveSheet()->getStyle('C6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
    $excel->setActiveSheetIndex(0)->setCellValue('C7', $data['TotalPusat'][6]->gudang_bg_pusat);
    $excel->getActiveSheet()->getStyle('C7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
    $excel->setActiveSheetIndex(0)->setCellValue('C8', $data['QC'][0]->QC);
    $excel->getActiveSheet()->getStyle('C8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
    $excel->setActiveSheetIndex(0)->setCellValue('C9', $data['TotalPusat'][4]->gudang_bg_pusat);
    $excel->getActiveSheet()->getStyle('C9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
    $excel->setActiveSheetIndex(0)->setCellValue('C10', $data['TotalPusat'][5]->gudang_bg_pusat);
    $excel->getActiveSheet()->getStyle('C10')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
    $excel->setActiveSheetIndex(0)->setCellValue('C11', $data['TotalPusat'][1]->gudang_bg_pusat);
    $excel->getActiveSheet()->getStyle('C11')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
    $excel->setActiveSheetIndex(0)->setCellValue('C12', $total);
    $excel->getActiveSheet()->getStyle('C12')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
    //Cabang ------------------------------------------------------------------------------------------------
    $excel->setActiveSheetIndex(0)->setCellValue('D5', '0');
    $excel->getActiveSheet()->getStyle('D5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
    $excel->setActiveSheetIndex(0)->setCellValue('D6', '0');
    $excel->getActiveSheet()->getStyle('D6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
    $excel->setActiveSheetIndex(0)->setCellValue('D7', $data['ThermalCab'][0]->total);
    $excel->getActiveSheet()->getStyle('D7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
    $excel->setActiveSheetIndex(0)->setCellValue('D8', '0');
    $excel->getActiveSheet()->getStyle('D8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
    $excel->setActiveSheetIndex(0)->setCellValue('D9', '0');
    $excel->getActiveSheet()->getStyle('D9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
    $excel->setActiveSheetIndex(0)->setCellValue('D10', '0');
    $excel->getActiveSheet()->getStyle('D10')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
    $excel->setActiveSheetIndex(0)->setCellValue('D11', '0');
    $excel->getActiveSheet()->getStyle('D11')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
    $excel->setActiveSheetIndex(0)->setCellValue('D12', '0');
    $excel->getActiveSheet()->getStyle('D12')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
    $excel->setActiveSheetIndex(0)->setCellValue('E5', $data['TotalPusat'][7]->gudang_bg_pusat);
    $excel->getActiveSheet()->getStyle('E5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
    $excel->setActiveSheetIndex(0)->setCellValue('E6', $data['TotalPusat'][8]->gudang_bg_pusat);
    $excel->getActiveSheet()->getStyle('E6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
    $excel->setActiveSheetIndex(0)->setCellValue('E7', $totalthermal);
    $excel->getActiveSheet()->getStyle('E7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
    $excel->setActiveSheetIndex(0)->setCellValue('E8', $data['QC'][0]->QC);
    $excel->getActiveSheet()->getStyle('E8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
    $excel->setActiveSheetIndex(0)->setCellValue('E9', $data['TotalPusat'][4]->gudang_bg_pusat);
    $excel->getActiveSheet()->getStyle('E9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
    $excel->setActiveSheetIndex(0)->setCellValue('E10', $data['TotalPusat'][5]->gudang_bg_pusat);
    $excel->getActiveSheet()->getStyle('E10')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
    $excel->setActiveSheetIndex(0)->setCellValue('E11', $data['TotalPusat'][1]->gudang_bg_pusat);
    $excel->getActiveSheet()->getStyle('E11')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
    $excel->setActiveSheetIndex(0)->setCellValue('E12', $totalpusatAll);
    $excel->getActiveSheet()->getStyle('E12')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
    //Good Part--------------------------------------------------------------------------------------------
    $excel->setActiveSheetIndex(0)->setCellValue('A13', "2");
    $excel->setActiveSheetIndex(0)->setCellValue('B13', "Sparepart Good");
    $excel->getActiveSheet()->getStyle('B13')->getFont()->setBold(TRUE);
    $excel->setActiveSheetIndex(0)->setCellValue('B14', "ATM Hyosung");
    $excel->setActiveSheetIndex(0)->setCellValue('B15', "ATM NCR");
    $excel->setActiveSheetIndex(0)->setCellValue('B16', "ATM Wincore");
    $excel->setActiveSheetIndex(0)->setCellValue('B17', "CRM");
    $excel->setActiveSheetIndex(0)->setCellValue('B18', "Hybrid");
    $excel->setActiveSheetIndex(0)->setCellValue('B19', "SSB");
    $excel->setActiveSheetIndex(0)->setCellValue('B20', "Total :");
    $excel->setActiveSheetIndex(0)->setCellValue('C14', $data['AtmHyosung'][0]->hyosung);
    $excel->getActiveSheet()->getStyle('C14')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
    $excel->setActiveSheetIndex(0)->setCellValue('C15', $data['AtmNcr'][0]->ncr);
    $excel->getActiveSheet()->getStyle('C15')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
    $excel->setActiveSheetIndex(0)->setCellValue('C16', $data['AtmWincor'][0]->wincor);
    $excel->getActiveSheet()->getStyle('C16')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
    $excel->setActiveSheetIndex(0)->setCellValue('C17', $data['TotalPusat'][2]->gudang_bg_pusat);
    $excel->getActiveSheet()->getStyle('C17')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
    $excel->setActiveSheetIndex(0)->setCellValue('C18', $data['TotalPusat'][3]->gudang_bg_pusat);
    $excel->getActiveSheet()->getStyle('C18')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
    $excel->setActiveSheetIndex(0)->setCellValue('C19', $data['TotalPusat'][9]->gudang_bg_pusat);
    $excel->getActiveSheet()->getStyle('C19')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
    $excel->setActiveSheetIndex(0)->setCellValue('C20', $totalGoodPart);
    $excel->getActiveSheet()->getStyle('C20')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
    $excel->setActiveSheetIndex(0)->setCellValue('D14', $data['AtmCabang'][0]->total);
    $excel->getActiveSheet()->getStyle('D14')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
    $excel->setActiveSheetIndex(0)->setCellValue('D15', $data['AtmCabang'][2]->total);
    $excel->getActiveSheet()->getStyle('D15')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
    $excel->setActiveSheetIndex(0)->setCellValue('D16', $data['AtmCabang'][3]->total);
    $excel->getActiveSheet()->getStyle('D16')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
    $excel->setActiveSheetIndex(0)->setCellValue('D17', '0');
    $excel->getActiveSheet()->getStyle('D17')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
    $excel->setActiveSheetIndex(0)->setCellValue('D18', '0');
    $excel->getActiveSheet()->getStyle('D18')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
    $excel->setActiveSheetIndex(0)->setCellValue('D19', '0');
    $excel->getActiveSheet()->getStyle('D19')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
    $excel->setActiveSheetIndex(0)->setCellValue('D20', $totalGoodPartCab);
    $excel->getActiveSheet()->getStyle('D20')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
    $excel->setActiveSheetIndex(0)->setCellValue('D20', $totalGoodPartCab);
    $excel->getActiveSheet()->getStyle('D20')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
    $excel->setActiveSheetIndex(0)->setCellValue('E14', $totalGoodPartHyosung);
    $excel->getActiveSheet()->getStyle('E14')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
    $excel->setActiveSheetIndex(0)->setCellValue('E15', $totalGoodPartNcr);
    $excel->getActiveSheet()->getStyle('E15')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
    $excel->setActiveSheetIndex(0)->setCellValue('E16', $totalGoodPartWincor);
    $excel->getActiveSheet()->getStyle('E16')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
    $excel->setActiveSheetIndex(0)->setCellValue('E17', $data['TotalPusat'][2]->gudang_bg_pusat);
    $excel->getActiveSheet()->getStyle('E17')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
    $excel->setActiveSheetIndex(0)->setCellValue('E18', $data['TotalPusat'][3]->gudang_bg_pusat);
    $excel->getActiveSheet()->getStyle('E18')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
    $excel->setActiveSheetIndex(0)->setCellValue('E19', $data['TotalPusat'][9]->gudang_bg_pusat);
    $excel->getActiveSheet()->getStyle('E19')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
    $excel->setActiveSheetIndex(0)->setCellValue('E20', $totalGoodPartAll);
    $excel->getActiveSheet()->getStyle('E20')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
    $excel->setActiveSheetIndex(0)->setCellValue('A21', '3');
    $excel->setActiveSheetIndex(0)->setCellValue('B21', "Sparepart Bad");
    $excel->getActiveSheet()->getStyle('B21')->getFont()->setBold(TRUE);
    $excel->setActiveSheetIndex(0)->setCellValue('B22', 'ATM Hyosung');
    $excel->setActiveSheetIndex(0)->setCellValue('B23', 'ATM NCR');
    $excel->setActiveSheetIndex(0)->setCellValue('B24', 'ATM Wincore');
    $excel->setActiveSheetIndex(0)->setCellValue('B25', 'CRM');
    $excel->setActiveSheetIndex(0)->setCellValue('B26', 'SSB');
    $excel->setActiveSheetIndex(0)->setCellValue('B27', 'Total');
    $excel->setActiveSheetIndex(0)->setCellValue('C22', $data['BadPartHyosung'][0]->total);
    $excel->getActiveSheet()->getStyle('C22')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
    $excel->setActiveSheetIndex(0)->setCellValue('C23', $data['BadPartNCR'][0]->total);
    $excel->getActiveSheet()->getStyle('C23')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
    $excel->setActiveSheetIndex(0)->setCellValue('C24', $data['BadPartWincore'][0]->total);
    $excel->getActiveSheet()->getStyle('C24')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
    $excel->setActiveSheetIndex(0)->setCellValue('C25', $data['BadPartCRM'][0]->total);
    $excel->getActiveSheet()->getStyle('C25')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
    $excel->setActiveSheetIndex(0)->setCellValue('C26', $data['BadPartSSB'][0]->total);
    $excel->getActiveSheet()->getStyle('C26')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
    $excel->setActiveSheetIndex(0)->setCellValue('C27', rupiahExcel($Totalbadpartpusat));
    $excel->getActiveSheet()->getStyle('C27')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
    $excel->setActiveSheetIndex(0)->setCellValue('D22', '0');
    $excel->getActiveSheet()->getStyle('D22')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
    $excel->setActiveSheetIndex(0)->setCellValue('D23', '0');
    $excel->getActiveSheet()->getStyle('D23')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
    $excel->setActiveSheetIndex(0)->setCellValue('D24', '0');
    $excel->getActiveSheet()->getStyle('D24')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
    $excel->setActiveSheetIndex(0)->setCellValue('D25', '0');
    $excel->getActiveSheet()->getStyle('D25')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
    $excel->setActiveSheetIndex(0)->setCellValue('D26', '0');
    $excel->getActiveSheet()->getStyle('D26')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
    $excel->setActiveSheetIndex(0)->setCellValue('D27', '0');
    $excel->getActiveSheet()->getStyle('D27')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
    $excel->setActiveSheetIndex(0)->setCellValue('E22', $data['BadPartHyosung'][0]->total);
    $excel->getActiveSheet()->getStyle('E22')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
    $excel->setActiveSheetIndex(0)->setCellValue('E23', $data['BadPartNCR'][0]->total);
    $excel->getActiveSheet()->getStyle('E23')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
    $excel->setActiveSheetIndex(0)->setCellValue('E24', $data['BadPartWincore'][0]->total);
    $excel->getActiveSheet()->getStyle('E24')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
    $excel->setActiveSheetIndex(0)->setCellValue('E25', $data['BadPartCRM'][0]->total);
    $excel->getActiveSheet()->getStyle('E25')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
    $excel->setActiveSheetIndex(0)->setCellValue('E26', $data['BadPartSSB'][0]->total);
    $excel->getActiveSheet()->getStyle('E26')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
    $excel->setActiveSheetIndex(0)->setCellValue('E27', rupiahExcel($Totalbadpartpusat));
    $excel->getActiveSheet()->getStyle('E27')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
    // Apply style header yang telah kita buat tadi ke masing-masing kolom header
    $excel->getActiveSheet()->getStyle('A2')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('B2')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('C2')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('D2')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('E2')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
    // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
    // $siswa = $this->SiswaModel->view();
    // $no = 1; // Untuk penomoran tabel, di awal set dengan 1
    // $numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
    // foreach($siswa as $data){ // Lakukan looping pada variabel siswa
    //   $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
    //   $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->nis);
    //   $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->nama);
    //   $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->jenis_kelamin);
    //   $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->alamat);

    //   // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
    //   $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
    //   $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
    //   $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
    //   $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
    //   $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);

    //   $no++; // Tambah 1 setiap kali looping
    //   $numrow++; // Tambah 1 setiap kali looping
    // }
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
    $excel->getActiveSheet(0)->setTitle("Sheet 1");
    $excel->setActiveSheetIndex(0);
    // Proses file excel
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="Stock Opname Persediaan Sparepart dan Material ' . date('Y-m-d') . '.xlsx"'); // Set nama file excel nya
    header('Cache-Control: max-age=0');
    $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
    $write->save('php://output');
    // for ($i = 0; $i < ob_get_level(); $i++) { ob_end_flush(); }
    //   ob_implicit_flush(1);

    ob_clean();
    // ob_end_clean();
  }
}
