[Codeigniter Barcode Generator With Zend Library, Support CI 2 & 3]
==========================================

Create barcode generator using Zend Library

It's so easy to use, you just extract the library into libraries path and then put library in controller, check it out now!

<h1>Setup</h1>

<blockquote>
	1. Download and extract into libraries path<br>
	2. Include your library in controller
</blockquote>

Here's an example:

```
class Main extends CI_Controller {

	public function index()
	{
		//I'm just using rand() function for data example
		$temp = rand(10000, 99999);
		$this->set_barcode($temp);
	}
	
	private function set_barcode($code)
	{
		//load library
		$this->load->library('zend');
		//load in folder Zend
		$this->zend->load('Zend/Barcode');
		//generate barcode
		Zend_Barcode::render('code128', 'image', array('text'=>$code), array());
	}
	
}
```
