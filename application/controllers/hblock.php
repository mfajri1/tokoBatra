<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hblock extends CI_Controller {

	public function halaman_block()
	{
		$data['title']	= "Error 404";
		$this->load->view('vblock', $data);		
	}

}

/* End of file block.php */
/* Location: ./application/controllers/block.php */