<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * CodeIgniter PDF Library
 *
 * Generate PDF's in your CodeIgniter applications.
 *
 * @package			CodeIgniter
 * @subpackage		Libraries
 * @category		Libraries
 * @author			Chris Harvey
 * @license			MIT License
 * @link			https://github.com/chrisnharvey/CodeIgniter-PDF-Generator-Library
 */

require_once(dirname(__FILE__) . '/dompdf/autoload.inc.php');
define('DOMPDF_ENABLE_AUTOLOAD', false);
use Dompdf\Dompdf;


class Pdf {
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
