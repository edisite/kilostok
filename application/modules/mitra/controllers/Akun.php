<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Akun
 *
 * @author edisite
 */
class Akun extends Admin_Controller{
    //put your code here
    public function __construct() {
        parent::__construct();
                $files = array(
                            'app-assets/js/scripts/forms/validation/form-validation.js',
                );
                $screen = array(
                            'app-assets/css/plugins/forms/validation/form-validation.css',
                            'app-assets/css/core/colors/palette-callout.css'
                );
                $this->add_script($files);  
                $this->add_stylesheet($screen);
    }
    public function index() {
        unset($this->mMenu);
        $aar = array('makun' => array(
			'name'		=> 'Akun Mitra',
			'url'		=> 'akun',
			'icon'		=> 'fa fa-users',
		));
        $this->mMenu = $aar;
        $this->render('akun/data_profile');
    }
}
