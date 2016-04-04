<?php
/*
 * Aplikasi BMT v1.0
 * Copyright (c) 2013
 *
 * file   : hapustransaksi.php
 * author : Edi Suwoto S.Komp
 * email  : edi.suwoto@gmail.com
 */
/*----------------------------------------------------------*/

class Hapustransaksi extends Controller
{

    public function __construct()
    {
        parent::Controller();
        $this->authlib->cekcontr();
        $this->tema = $this->allfunct->getSetupapp('tema');
        $this->load->model('master_model', 'master');
        $this->load->model('admin_model', 'modelku');
        $this->nama_group = $this->authlib->getGroup($this->encrypt->decode($this->session->userdata('id_group')));
        $this->menuact = "transaksiumum";
        $this->menuactsub = "hapustransaksi";
    }

    //---- Admin
    public function index()
    {
        $data['idpeg'] = $this->session->userdata('username');
        $data['menunya'] = $this->authlib->loadMenu('0', $this->nama_group, $this->menuact, $this->menuactsub);
        $data['tema'] = $this->tema;
        $data['page_title'] = "Transaksi Umum";

        $assets_path = $this->config->item('assets_path');
        $data['assets']['form'] = "true";
        $data['js_add'] = "FormWizard.init();
        UIGeneral.init();
        FormValidation.init();";

        $data['css_links'] = get_css(
            array(
            $assets_path .'/css/autocomplete.css',
            )
        );
        $data['js_links'] = get_js(
            array(
            $assets_path .'/js/hapustransaksi.js',
            $assets_path .'/js/jq/jquery.autocomplete.js',
            $assets_path .'/scripts/form-wizard.js',
            $assets_path .'/scripts/ui-general.js',
            $assets_path .'/scripts/form-validationtabungan.js'
            )
        );

        echo $this->twig_lib->render('tpl/hapustransaksi.php', $data);
        // $this->load->view('hapustransaksi',$data);
    }
    
    public function get_trans()
    {
        $ff        = $this->input->post('ff'); // Jenis Filter
        $if        = $this->input->post('if'); // Value Filter
        $fd        = $this->input->post('fd'); // Field Sorting
        $adsc      = $this->input->post('adsc'); // Asc or Desc
        $hal       = $this->input->post('hal'); // Offset Limit
        $juml      = $this->input->post('juml'); // Jumlah Limit
        $pawal     = $this->allfunct->revDate($this->input->post('pawal'));// Periode Awal
        $pakhir    = $this->allfunct->revDate($this->input->post('pakhir')); // Periode Akhir
        $awal      = $juml * ($hal - 1);
        $alldata   = $this->modelku->getAllTransaksi($ff, $if, $fd, $adsc, $awal, $juml, $pawal, $pakhir);
        $records   = $alldata['numrow'];
        $page_num  = ceil($records / $juml);
        if ($records > 0) {
            $hasil['total'] = $page_num;
            $hasil['alldata'] = $alldata['result'];
            echo json_encode($hasil);
        } else {
            $hasil['alldata'] = 0;
            echo $hasil;
        }
    }
    public function delTransaksi()
    {
        $where = array('accounttrans_id' => $this->input->post('id'));
        echo $this->master->delete("tb_accounttrans", $where);
    }
    
    public function login()
    {
        $data = $this->allfunct->securePost();
        $login = array($data['username'], $data['password']);
        $resp = $this->authlib->login1($login);
        echo $resp;
    }
}

/* End of file */
