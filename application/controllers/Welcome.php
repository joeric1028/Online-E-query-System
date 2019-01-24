<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function index()
	{
		$config['image_library']   = 'gd2';
		$config['source_image']    = 'application/cache/temp.jpg';
		$config['create_thumb']    = TRUE;
		$config['maintain_ratio']  = TRUE;
		$config['width']           = 500;
		$config['height']          = 500;

		$this->load->library('image_lib', $config);
		$this->load->helper('file');
		$this->load->helper('path');

		if ( ! $this->image_lib->resize())
		{
        	echo $this->image_lib->display_errors();
		}

		$data['image'] = set_realpath('./application/cache/temp_thumb.jpg');
		//$data['image'] = read_file(set_realpath('./application/cache/temp_thumb.jpg'));

		$this->load->view('underconstruction/index', $data);
	}
}
