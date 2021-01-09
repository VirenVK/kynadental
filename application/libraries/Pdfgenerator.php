<?php
defined('BASEPATH') OR exit('No direct script access allowed');
define('DOMPDF_ENABLE_AUTOLOAD', false);
require_once("./vendor/dompdf/dompdf/dompdf_config.inc.php");
use Dompdf\Dompdf;

class Pdfgenerator {
	public function generate($html, $filename='', $stream=TRUE, $customPaper = 'A4', $orientation = "portrait",$attachment = 0){
		$dompdf = new DOMPDF();
		$dompdf->set_option('enable_html5_parser', TRUE);
		$dompdf->load_html(preg_replace('/>\s+</', '><',$html));
		$dompdf->set_paper('A4', 'portrait');
		$dompdf->render();
		if ($stream) {
			$dompdf->stream($filename.".pdf", array("Attachment" => $attachment));
			return TRUE;
		} else {
			return $dompdf->output();
		}
	}
}
?>
