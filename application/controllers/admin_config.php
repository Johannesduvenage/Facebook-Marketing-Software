<?php

require_once("home.php"); // including home controller

/**
* class admin_config
* @category controller
*/
class Admin_config extends Home
{
    /**
    * load constructor method
    * @access public
    * @return void
    */
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('logged_in')!= 1) {
            redirect('home/login_page', 'location');
        }

        if ($this->session->userdata('user_type')!= 'Admin') {
            redirect('home/login_page', 'location');
        }

        $this->important_feature();
        $this->periodic_check();
    }

    /**
    * load index method. redirect to config
    * @access public
    * @return void
    */
    public function index()
    {
        $this->configuration();
    }

    /**
    * load config form method
    * @access public
    * @return void
    */
    public function configuration()
    {
        if ($this->session->userdata('logged_in') == 1 && $this->session->userdata('user_type') != 'Admin') {
           redirect('home/login_page', 'location');
        }
        
        $data['body'] = "admin/config/edit_config";
        $data['time_zone'] = $this->_time_zone_list();        
        $data['language_info'] = $this->_language_list();
        $data['page_title'] = $this->lang->line('general settings');
        $this->_viewcontroller($data);
    }

    /**
    * method to edit config
    * @access public
    * @return void
    */
    public function edit_config()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            redirect('home/access_forbidden', 'location');
        }

        if ($_POST) 
        {
            // validation
            $this->form_validation->set_rules('institute_name',       '<b>'.$this->lang->line("company name").'</b>',             'trim|xss_clean');
            $this->form_validation->set_rules('institute_address',    '<b>'.$this->lang->line("company address").'</b>',          'trim|xss_clean');
            $this->form_validation->set_rules('institute_email',      '<b>'.$this->lang->line("company email").'</b>',            'trim|required|xss_clean');
            $this->form_validation->set_rules('institute_mobile',     '<b>'.$this->lang->line("company phone/ mobile").'</b>',    'trim|xss_clean');
            $this->form_validation->set_rules('time_zone',            '<b>'.$this->lang->line("time zone").'</b>',                'trim|xss_clean');
            $this->form_validation->set_rules('language',             '<b>'.$this->lang->line("language").'</b>',                 'trim|xss_clean');
            // go to config form page if validation wrong
            if ($this->form_validation->run() == false) {
                return $this->configuration();
            } else {
                // assign
                $institute_name=addslashes(strip_tags($this->input->post('institute_name', true)));
                $institute_address=addslashes(strip_tags($this->input->post('institute_address', true)));
                $institute_email=addslashes(strip_tags($this->input->post('institute_email', true)));
                $institute_mobile=addslashes(strip_tags($this->input->post('institute_mobile', true)));
                $time_zone=addslashes(strip_tags($this->input->post('time_zone', true)));                
                $language=addslashes(strip_tags($this->input->post('language', true)));

                $base_path=realpath(APPPATH . '../assets/images');

                $this->load->library('upload');

                if ($_FILES['logo']['size'] != 0) {
                    $photo = "logo.png";
                    $config = array(
                        "allowed_types" => "png",
                        "upload_path" => $base_path,                        
                        "overwrite" => true,
                        "file_name" => $photo,
                        'max_size' => '200',
                        'max_width' => '600',
                        'max_height' => '300'
                        );
                    $this->upload->initialize($config);
                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload('logo')) {
                        $this->session->set_userdata('logo_error', $this->upload->display_errors());
                        return $this->configuration();
                    }
                }

                if ($_FILES['favicon']['size'] != 0) {
                    $photo = "favicon.png";
                    $config2 = array(
                        "allowed_types" => "png",
                        "upload_path" => $base_path,
                        "overwrite" => true,
                        "file_name" => $photo,
                        'max_size' => '50',
                        'max_width' => '32',
                        'max_height' => '32'
                        );
                    $this->upload->initialize($config2);
                    $this->load->library('upload', $config2);

                    if (!$this->upload->do_upload('favicon')) {
                        $this->session->set_userdata('favicon_error', $this->upload->display_errors());
                        return $this->configuration();
                    }
                }

                // writing application/config/my_config
                  $app_my_config_data = "<?php ";
                $app_my_config_data.= "\n\$config['default_page_url'] = '".$this->config->item('default_page_url')."';\n";
                $app_my_config_data.= "\$config['product_name'] = '".$this->config->item('product_name')."';\n";
                $app_my_config_data.= "\$config['product_short_name'] = '".$this->config->item('product_short_name')."' ;\n";
                $app_my_config_data.= "\$config['product_version'] = '".$this->config->item('product_version')." ';\n\n";
                $app_my_config_data.= "\$config['institute_address1'] = '$institute_name';\n";
                $app_my_config_data.= "\$config['institute_address2'] = '$institute_address';\n";
                $app_my_config_data.= "\$config['institute_email'] = '$institute_email';\n";
                $app_my_config_data.= "\$config['institute_mobile'] = '$institute_mobile';\n\n";
                $app_my_config_data.= "\$config['developed_by'] = '".$this->config->item('developed_by')."';\n";
                $app_my_config_data.= "\$config['developed_by_href'] = '".$this->config->item('developed_by_href')."';\n";
                $app_my_config_data.= "\$config['developed_by_title'] = '".$this->config->item('developed_by_title')."';\n";
                $app_my_config_data.= "\$config['developed_by_prefix'] = '".$this->config->item('developed_by_prefix')."' ;\n";
                $app_my_config_data.= "\$config['support_email'] = '".$this->config->item('support_email')."' ;\n";
                $app_my_config_data.= "\$config['support_mobile'] = '".$this->config->item('support_mobile')."' ;\n";                
                $app_my_config_data.= "\$config['time_zone'] = '$time_zone';\n";                
                $app_my_config_data.= "\$config['language'] = '$language';\n";
                $app_my_config_data.= "\$config['sess_use_database'] = true;\n";
                $app_my_config_data.= "\$config['sess_table_name'] = 'ci_sessions';\n";

                file_put_contents(APPPATH.'config/my_config.php', $app_my_config_data, LOCK_EX);                  //writting  application/config/my_config

                 $this->session->unset_userdata("selected_language");

              
                $this->session->set_flashdata('success_message', 1);
                redirect('admin_config/configuration', 'location');
            }
        }
    }

    public function purchase_code_configuration()
    {
        if($this->session->userdata('logged_in') == 1 && $this->session->userdata('user_type') != 'Admin'){
            redirect('home/login_page', 'location');
        }

        $data['body'] = "admin/config/edit_purchase_code_config";
        $data['time_zone'] = $this->_time_zone_list();
        $data['page_title'] = $this->lang->line('purchase code settings');
        $this->_viewcontroller($data);
    }

    public function edit_purchase_code_config()
    {   
        $this->load->helper('file');
        if($this->session->userdata('logged_in') == 1 && $this->session->userdata("user_type")!="Admin"){
            redirect('home/access_forbidden', 'location');
        } 
        $file_data = file_get_contents(APPPATH . 'core/licence.txt');
        $file_data_array = json_decode($file_data, true);

        $purchase_code = $file_data_array['purchase_code'];
        $only_domain = $file_data_array['domain'];

        // $url = "http://konok-pc/xeroneit/envato_license_activation/delete_purchase_code.php?purchase_code={$purchase_code}&domain={$domain}";
         $url = "http://xeroneit.net/development/envato_license_activation/delete_purchase_code.php?purchase_code={$purchase_code}&domain={$only_domain}&item_name=FB Inboxer";
        $credentials = $this->get_general_content($url);
        $delete_option = json_decode($credentials,true);

        

        if(isset($delete_option) && $delete_option['status'] == "1" ){
            $path_core = APPPATH . 'core/licence.txt';
            $path_config = APPPATH . 'config/licence.txt';
            if(file_exists($path_core)){
                unlink($path_core);
            }
            if(file_exists($path_config)){
                unlink($path_config);
            }
            $this->session->set_flashdata('my_success_message', 1);
            redirect('home/credential_check','location');
            //redirect('admin_config/purchase_code_configuration','location');
        }else{
            $this->session->set_flashdata('delete_error_message', 1);
            redirect('admin_config/purchase_code_configuration','location');
        }  
    }
    
}
