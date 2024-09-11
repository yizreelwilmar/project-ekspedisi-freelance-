<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LandingController extends CI_Controller {

    public function index() {
        // Load the landing page from the separate directory
        $this->load->helper('url');
        redirect(base_url('landing/index.html'));
    }
}
