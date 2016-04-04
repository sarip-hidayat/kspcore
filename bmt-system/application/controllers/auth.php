<?php
/*
 * Aplikasi AKSIOMA (Aplikasi Keuangan Mikro Masyarakat Ekonomi Syariah) ver. 1.0
 * Copyright (c) 2014
 *
 * file   : auth.php
 * author : Edi Suwoto S.Komp
 * email  : edi.suwoto@gmail.com
 */
/*----------------------------------------------------------*/
class Auth extends Controller
{

    public function __construct()
    {
        parent::Controller();
    }
    
    public function index()
    {
        if ($this->session->userdata('username') !="") {
            echo "<meta http-equiv=\"refresh\" content=\"0;URL=http://".$_SERVER['HTTP_HOST']."\">";
            exit();
        }

        $this->authlib->logged();
        $data['tema'] = 'blitzer';
        $data['js_links'] = get_js(array($this->config->item('assets_path') .'/js/auth.js'));
        $data['css_links'] = get_css(array($this->config->item('assets_path') .'/css/pages/login.css'));
        echo $this->twig_lib->render('tpl/login.php', $data);
    }

    public function login()
    {
        $login = array($this->input->post('username'), $this->input->post('password'));
        $resp = $this->authlib->login($login);
        echo $resp;
    }

    public function logout()
    {
        $this->authlib->logout();
    }

    public function denied()
    {
        $this->load->view('denied');
    }
}

/* End of file */
