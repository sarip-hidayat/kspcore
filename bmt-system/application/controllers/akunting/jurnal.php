<?php
/*
 * Aplikasi AKSIOMA (Aplikasi Keuangan Mikro Masyarakat Ekonomi Syariah) ver. 1.0
* Copyright (c) 2014
*
* file   : akunting/jurnal.php
* author : Edi Suwoto S.Komp
* email  : edi.suwoto@gmail.com
*/
/*----------------------------------------------------------*/
class Jurnal extends Controller
{

    public function __construct()
    {
        parent::Controller();
        $this->authlib->cekcontr();
        $this->tema = $this->allfunct->getSetupapp('tema');
        $this->load->model('master_model', 'master');
        $this->load->model('admin_model', 'modelku');
        $this->nama_group = $this->authlib->getGroup($this->encrypt->decode($this->session->userdata('id_group')));
        $this->menuact = "akun";
        $this->menuactsub = "jurnal";
    }

    //---- Admin
    public function index()
    {
        $data['idpeg'] = $this->session->userdata('username');
        $data['menunya'] = $this->authlib->loadMenu('0', $this->nama_group, $this->menuact, $this->menuactsub);
        $data['tema'] = $this->tema;
        $data['page_title'] = "Input Jurnal";

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
            $assets_path .'/js/akunting/jurnal.js',
            $assets_path .'/js/jq/jquery.autocomplete.js',
            $assets_path .'/scripts/form-wizard.js',
            $assets_path .'/scripts/ui-general.js',
            $assets_path .'/scripts/form-validationtabungan.js'
            )
        );

        echo $this->twig_lib->render('tpl/akunting/jurnal.php', $data);
        // $this->load->view('akunting/jurnal',$data);
    }

    public function infoaccount()
    {
        $id    = $this->input->post('id');
        $query = $this->db->query("SELECT listakun_code,listakun_name FROM coa_listakun WHERE listakun_id=$id");
        $data = $query->result_array();
        echo $data[0]['listakun_code']." ".$data[0]['listakun_name'];
    }
    public function savejurnal()
    {
        $objord = json_decode($this->input->post('ord'));
        $data['accounttrans_date'] = $this->allfunct->revDate($objord->accounttrans_date);
        $code = $objord->accounttrans_code;
        $data['accounttrans_desc'] = $objord->accounttrans_desc;
        foreach ($objord->orderan as $objpro) {
            $data['accounttrans_type'] = $objpro->dk;
            $data['accounttrans_listid'] = $objpro->code;
            $data['accounttrans_code'] = $code."-".$objpro->code;
            $data['accounttrans_user'] = $objpro->ketval;
            $data['accounttrans_value'] = $objpro->qty;
            $data['create_date'] = date("Y-m-d H:i:s");
            $data['create_by'] = $this->session->userdata('username');
            $data['update_by'] = $this->session->userdata('username');
            $rsp = $this->master->simpan("tb_accounttemp", $data);
        }
        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            echo "Rollback : ".$rsp;
        } else {
            $this->db->trans_commit();
            echo "1";
        }
    }

    //cek otorisasi transaksi
    public function login()
    {
        $data = $this->allfunct->securePost();
        $login = array($data['username'], $data['password']);
        $resp = $this->authlib->login1($login);
        echo $resp;
    }
}

/* End of file */
