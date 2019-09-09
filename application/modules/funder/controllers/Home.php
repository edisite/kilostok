<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Admin_Controller {

	public function index()
	{		
            var_dump($_SESSION);
            $this->render('home');
	}
}
