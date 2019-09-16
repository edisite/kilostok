<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// NOTE: this controller inherits from MY_Controller instead of Admin_Controller,
// since no authentication is required
class Register extends MY_Controller {

	/**
	 * Login page and submission
	 */
        public function __construct() {
            parent::__construct();
            $this->load->library('form_builder');
                $files = array(
                            'app-assets/js/scripts/forms/validation/form-validation.js',
                            'app-assets/js/scripts/forms/form-login-register.js'
                );
                $screen = array(
                            'app-assets/css/plugins/forms/validation/form-validation.css',
                            'app-assets/css/pages/login-register.css'
                );
                $this->add_script($files);  
                $this->add_stylesheet($screen);
        }
        public function index()
	{
		// (optional) only top-level admin user groups can create Admin User
		//$this->verify_auth(array('webmaster'));

		$form = $this->form_builder->create_form();

		if ($form->validate())
		{
			// passed validation
			$email 				= $this->input->post('email');
			$password 			= $this->input->post('password');
			$additional_data 	= array(
				'first_name'	=> $this->input->post('first_name'),
				'last_name'		=> $this->input->post('last_name'),
			);
			$groups = array('1'); // default mitra is manager
                        
                        $username = explode("@", $email)[0] ?: "urand".mt_rand(10000, 99999);
			// create user (default group as "members")
			$user = $this->ion_auth->register($username, $password, $email, $additional_data, $groups,FALSE);
                        if ($user)
			{
				// success
				$messages = $this->ion_auth->messages();
				$this->system_message->set_success($messages);
			}
			else
			{
				// failed
				$errors = $this->ion_auth->errors();
				$this->system_message->set_error($errors);
			}
			refresh();
		}

		$groups = $this->ion_auth->groups()->result();
                
		unset($groups[0]);	// disable creation of "webmaster" account
		$this->mViewData['groups'] = $groups;
		$this->mPageTitle = 'Create Admin User';

		$this->mViewData['form'] = $form;
		//$this->render('panel/admin_user_create');
               
                
                $this->render('register', 'empty');
	}
}
