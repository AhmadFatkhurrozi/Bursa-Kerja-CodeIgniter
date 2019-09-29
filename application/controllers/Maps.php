<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Maps extends CI_Controller {

	public function index()
	{
	    $this->load->library('googlemaps');
	     
	    $config['center'] = '-6.13952, 106.92075';//Coordinate tengah peta
	    $config['zoom'] = 'auto';
	    $this->googlemaps->initialize($config);
	     
	    $marker = array();
	    $marker['position'] = '-6.13952, 106.92075';//Posisi marker (itu tuh yang merah2 lancip itu loh :-p)
	    $this->googlemaps->add_marker($marker);
	     
	    $data['map'] = $this->googlemaps->create_map();
	     
	    $this->load->view('maps', $data);
	}

}