<?php
/**
 * Created by IntelliJ IDEA.
 * User: Deepak
 * Date: 13/8/19
 * Time: 3:21 PM
 */

function getDateFormatted($date,$format='FdYHi'){
	if($date=='' || is_null($date) || $date=='0000-00-00'){
		return '';
	}
	$dateFormat = '';
	switch ($format){
		case 'dmY': $dateFormat='d-m-Y'; break;
		case 'dMY': $dateFormat='d-M-Y'; break;
		case 'dmYHi': $dateFormat='d-m-Y H:i'; break;
		case 'dmYHiA': $dateFormat='d-m-Y H:i A'; break;
		case 'FdY':  $dateFormat='F d, Y'; break;
		case 'FdYHi': $dateFormat='F d, Y  H:i'; break;
		case 'Hi': $dateFormat='H:i'; break;
		case 'HiA': $dateFormat='H:i A'; break;
		case 'MdYHiA': $dateFormat='M d,Y H:i'; break;
		case 'm/d/y': $dateFormat='m/d/Y'; break;
	}
	return date($dateFormat, strtotime($date));

}

function getCurrentDateTime(){
	return date('Y-m-d H:i:s');
}

function getCurrentDate(){
	return date('Y-m-d');
}

function convertDateTime($date){
	return date('Y-m-d H:i:s',strtotime($date));
}

function getDateYmd($date){
	return date('Y-m-d',strtotime($date));
}
/*Number Format*/
function getNumberFormat($number){
	return number_format($number,2);
}

function getDecryptArray($postVal=array()){
	$result = array();
	if(!empty($postVal)){
		foreach($postVal as $key=>$val){
			$result[$key] = decrypt_url($val);
		}
	}
	return $result;
}

function logmeintofile($file,$data,$log_status=TRUE,$path=FALSE){
	if($log_status){
		$file_path = ROOT_PATH.'logs/'.$file.'_'.date('Y-m-d').'.log';
		if($path){
			$file_path = $path.'logs/'.$file.'_'.date('Y-m-d').'.log';
		}
		file_put_contents($file_path,print_r($data,true)."\n",FILE_APPEND);
	}
	return 1;
}

function printData($array){
	echo "<pre>";
	print_r($array);
	die();
}

function getTwoDateDiff($date_start,$date_end){
	$date1 = date('Y-m-d',strtotime($date_start));
	$date2 = date('Y-m-d',strtotime($date_end));

	$ts1 = strtotime($date1);
	$ts2 = strtotime($date2);

	$year1 = date('Y', $ts1);
	$year2 = date('Y', $ts2);

	$month1 = date('m', $ts1);
	$month2 = date('m', $ts2);

	$diff = (($year2 - $year1) * 12) + ($month2 - $month1);
	return $diff;
}

/*Convert Array with key & Value*/
function cnvtArrToKeyValue($key='',$array=array()){
	$result = array('result'=>array(),'ids'=>array());
	foreach($array as $val){
		$result['result'][$val[$key]] = $val;
	}
	$result['ids'] = array_keys($result['result']);
	return $result;
}

/*Get Status*/
function getStatusImg($status=1){
	switch($status){
		case 0:
			$img = '<i class="fa fa-check-circle text-danger" aria-hidden="true" data-toggle="tooltip" title="Deleted"></i>';
			break;
		case 1:
			$img = '<i class="fa fa-check-circle text-success" aria-hidden="true" data-toggle="tooltip" title="Active"></i>';
			break;
		case 2:
			$img = '<i class="fa fa-times-circle text-danger" aria-hidden="true" data-toggle="tooltip" title="In Active"></i>';
			break;
		default:
			$img = '<i class="fa fa-check-circle text-danger" aria-hidden="true" data-toggle="tooltip" title="Deleted"></i>';
	}
	return $img;
}
?>
