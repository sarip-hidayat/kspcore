<?php
/*
 * Aplikasi AKSIOMA (Aplikasi Keuangan Mikro Masyarakat Ekonomi Syariah) ver. 1.0
 * Copyright (c) 2014
 *
 * file   : monitor/aktivasitabungan.php
 * author : Edi Suwoto S.Komp
 * email  : edi.suwoto@gmail.com
 */
/*----------------------------------------------------------*/
class Aktivasitabungan extends Controller
{

    public function __construct()
    {
        parent::Controller();
        $this->authlib->cekcontr();
        $this->tema = $this->allfunct->getSetupapp('tema');
        $this->load->model('master_model', 'master');
        $this->load->model('admin_model', 'modelku');
        $this->nama_group = $this->authlib->getGroup($this->encrypt->decode($this->session->userdata('id_group')));
        $this->menuact = "base";
        $this->menuactsub = "aktivasitabungan";
    }

    //---- Admin
    public function index()
    {
        $data['idpeg'] = $this->session->userdata('username');
        $data['menunya'] = $this->authlib->loadMenu('0', $this->nama_group, $this->menuact, $this->menuactsub);
        $data['tema'] = $this->tema;
        $data['page_title'] = "Aktivasi Tabungan";

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
            $assets_path .'/js/monitor/aktivasitabungan.js',
            $assets_path .'/js/jq/jquery.autocomplete.js',
            $assets_path .'/scripts/form-wizard.js',
            $assets_path .'/scripts/ui-general.js',
            $assets_path .'/scripts/form-validationtabungan.js'
            )
        );

        echo $this->twig_lib->render('tpl/monitor/aktivasitabungan.php', $data);
    }

    public function saveaktivasi()
    {
        $data = $this->allfunct->securePost();
        $data1['tgl_proses'] = $this->allfunct->revDate($data['tgl_proses']);
        $data1['nomor_rekening'] = $data['nomor_rekening'];
        $data1['nomor_ref'] = $data['nomor_ref'];
        $data1['alasan'] = $data['alasan'];
        $data1['active'] = $data['active'];
        $data1['create_by'] = $this->session->userdata('username');
        $data1['update_by'] = $this->session->userdata('username');
        echo $this->master->simpan('tb_tabunganriwayat', $data1);
        
        $where = array('nomor_rekening' => $data['nomor_rekening']);
        $dataa['status '] = '1';
        $this->master->update("tb_tabungan", $dataa, $where);
    }

    public function get_riwayatview()
    {
        $objord = $this->input->post('id');
        $query = $this->db->query("SELECT tgl_proses,nomor_ref,alasan  FROM tb_tabunganriwayat WHERE nomor_rekening='".$objord."' order by tgl_proses desc");
        $data = $query->result_array();
        //echo $data;
        $hasil['alldata'] = $data;
        echo json_encode($hasil);
    }
    
    public function single_pegawai()
    {
        $data = $this->allfunct->securePost();
        $peg    = $data['peg'];
        $query = $this->db->query("SELECT nama_pegawai FROM pegawai WHERE nip='".$peg."'");
        $data = $query->result_array();
        if ($query->num_rows() > 0) {
            $ppeg = $data[0]["nama_pegawai"];
            echo $ppeg;
        } else {
            echo "";
        }
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
