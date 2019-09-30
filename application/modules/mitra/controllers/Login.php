<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// NOTE: this controller inherits from MY_Controller instead of Admin_Controller,
// since no authentication is required
class Login extends MY_Controller {
         
	/**
	 * Login page and submission
	 */
	public function index()
	{
		$this->load->library('form_builder');
		$form = $this->form_builder->create_form();
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

		if ($form->validate())
		{
			// passed validation
			$identity = $this->input->post('username');
			$password = $this->input->post('password');
			$remember = ($this->input->post('remember')=='on');
			
			if ($this->ion_auth->login($identity, $password, $remember))
			{
				// login succeed
				$messages = $this->ion_auth->messages();
				$this->system_message->set_success($messages);
                                
                                // check status mitra_id                                   
                                redirect($this->mModule.'/login/login_mitra_verify');                         
			}
			else
			{
				// login failed
				$errors = $this->ion_auth->errors();
				$this->system_message->set_error($errors);
				refresh();
			}
		}
		
		// display form when no POST data, or validation failed
		$this->mViewData['form'] = $form;
		$this->mBodyClass = 'login-page';

		$this->render('login', 'empty');
	}
        public function login_mitra_verify() {
            if(count($this->mUser->user_id)== 0){
                redirect($this->mModule.'/login');
            }
            if(count($this->mUserGroups[0]->id) == 0){
                redirect($this->mModule.'/login');
            }
            
            $select = '*';
            $where['data'][] = array(
                    'column' => 'user_id',
                    'param'	 => $this->mUser->user_id
            );
            $where['data'][] = array(
                    'column' => 'group_id',
                    'param'	 => $this->mUserGroups[0]->id
            );

            $query = $this->mod->select($select, 'mitra_users_groups', NULL, $where);
            if ($query<>false) {
                foreach ($query->result() as $val) {
                        // CARI JENIS BARANG
                        $this->mitra_id = $val->mitra_id;
                }
            }
            
            if($this->mitra_id == 0 || $this->mitra_id == ''){
                redirect($this->mModule.'/akun');
            }
            $this->mitra_guide();           
            redirect($this->mModule);            
        }
}
