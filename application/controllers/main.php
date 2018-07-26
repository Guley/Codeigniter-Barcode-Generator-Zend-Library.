<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index()
	{
		//I'm just using rand() function for data example
		$data=[];
		$temp = rand(10000, 99999);
		$data['barcode']=$this->set_barcode($temp);
		$this->load->template('welcome',$data);
	}
	
	private function set_barcode($code)
	{
		//load library
		$this->load->library('zend');
		//load in folder Zend
		$this->zend->load('Zend/Barcode');
		//generate barcode
		$file = Zend_Barcode::draw('code128', 'image', array('text'=>$code), array());
		    $code = time().$code;
		    $barcodeRealPath = APPPATH. '/cache/'.$code.'.png';
		    $barcodePath = APPPATH.'/cache/';

		    header('Content-Type: image/png');
		    $store_image = imagepng($file,$barcodeRealPath);
		    return $barcodePath.$code.'.png';
	}
	
}
