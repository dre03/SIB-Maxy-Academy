<?php
include('koneksi.php');
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Csv;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Periksa apakah parameter "type" disertakan dalam URL
if(isset($_GET['type'])) {
    // Tangani permintaan ekspor berdasarkan jenis file
    $exportType = $_GET['type'];
    
    // Query untuk mengambil data penduduk dari database
    $query = "SELECT * FROM penduduk";
    $result = mysqli_query($koneksi, $query);
    
    // Buat objek Spreadsheet
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    $sheet->setCellValue('A1', 'No');
    $sheet->setCellValue('B1', 'Nama');
    $sheet->setCellValue('C1', 'Usia');
    $sheet->setCellValue('D1', 'Alamat');
    $sheet->setCellValue('E1', 'Pekerjaan');

    $i = 2;
    $no = 1;
    // Tambahkan data penduduk ke lembar kerja
    while($row = mysqli_fetch_array($result)) {
        $sheet->setCellValue('A'.$i, $no++);
        $sheet->setCellValue('B'.$i, $row['nama']);
        $sheet->setCellValue('C'.$i, $row['usia']);
        $sheet->setCellValue('D'.$i, $row['alamat']);
        $sheet->setCellValue('E'.$i, $row['pekerjaan']);
        $i++;
    }

    // Gaya untuk memberikan garis pada lembar kerja
    $styleArray = [
        'borders' => [
            'allBorders' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            ],
        ],
    ];
    // Terapkan gaya ke seluruh rentang data
    $sheet->getStyle('A1:E'.$i)->applyFromArray($styleArray);
    
    // Tentukan jenis file yang akan diekspor
    switch($exportType) {
        case 'xlsx':
            // Ekspor ke format XLS (Excel 2007 ke atas)
            $writer = new Xlsx($spreadsheet);
            $filename = 'data_penduduk_xlsx.xlsx';
            break;
        case 'xls':
            // Ekspor ke format XLSX (Excel 2003 ke bawah)
            $writer = new Csv($spreadsheet);
            $filename = 'data_penduduk_xls.xls';
            break;
        case 'csv':
            // Ekspor ke format CSV
            $filename = 'data_penduduk_csv.csv';
            
            // Buat file CSV
            $file = fopen('php://output', 'w');

            // Tulis header kolom
            fputcsv($file, ['No', 'Nama', 'Usia', 'Alamat', 'Pekerjaan']);
            
            // Tambahkan data penduduk ke file CSV
            mysqli_data_seek($result, 0); // Reset pointer hasil MySQL ke baris pertama
            while($row = mysqli_fetch_array($result)) {
                // Tulis baris CSV tanpa tanda kutip
                fputcsv($file, $row);
            }

            // Tutup file CSV
            fclose($file);
            
            // Set header untuk file CSV
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment;filename="'.$filename.'"');
            break;
        default:
            // Jika parameter "type" tidak valid, kembalikan 404
            http_response_code(404);
            exit;
    }
    
    // Jika bukan format CSV, simpan lembar kerja ke output
    if($exportType != 'csv') {
        // Keluarkan header untuk tipe file yang dipilih
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0');
        
        // Tulis lembar kerja ke output
        $writer->save('php://output');
    }
    
    // Hentikan eksekusi skrip
    exit;
} else {
    // Jika parameter "type" tidak disertakan, kembalikan 404
    http_response_code(404);
    exit;
}
?>
