<?php
/**
 * Set error reporting 1
 * Hilangkan Notice dan Warning
 */
error_reporting(1);

/**
 * Include Reader Excel (2007 etc.., XLSX)
 */
require "excel-reader/SpreadsheetReader.php";

/** 
 * AAmbil file dan upload
 */
$file = $_FILES['excel']['tmp_name'];
$filename = $_FILES['excel']['name'];

/** Pindahkan file ke penyimpanan */
$moved = move_uploaded_file($file, $filename);


/** Jika sudah upload, maka eksekusi */
if($moved) {
    $spreadsheet = new SpreadsheetReader($filename);
	$sheets = $spreadsheet->Sheets();

    /**
     * Check Sheet
     * Apabila di temukan Sheet , ambil Sheet 1, atau entah namanya yg penting letak sheet 1
     * dalam array urutan 1 adalah 0
     */
    if(is_array($sheets) && isset($sheets[0])) {

        /** Set Sheet 1 / Sheet posisi 1 */
        $spreadsheet->ChangeSheet(0);

        /**
         * Ambil data
         */
        foreach($spreadsheet as $key => $row) {
            /**
             * $row[0] --> berarti kolom 1 dst....
             */
            var_dump($row);
        }
    }
}