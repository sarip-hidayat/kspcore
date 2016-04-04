<?php
/*
 * Aplikasi AKSIOMA (Aplikasi Keuangan Mikro Masyarakat Ekonomi Syariah) ver. 1.0
 * Copyright (c) 2014
 *
 * file   : monitor/listtabungan.php
 * author : Edi Suwoto S.Komp
 * email  : edi.suwoto@gmail.com
 */
/*----------------------------------------------------------*/
class Listtabungan extends Controller
{

    public function __construct()
    {
        parent::Controller();
        $this->authlib->cekcontr();
        $this->tema = $this->allfunct->getSetupapp('tema');
        $this->load->model('master_model', 'master');
        $this->load->model('admin_model', 'modelku');
        $this->nama_group = $this->authlib->getGroup($this->encrypt->decode($this->session->userdata('id_group')));
        $this->menuact = "monitor";
        $this->menuactsub = "listtabungan";
    }

    //---- Admin
    public function index()
    {
        $data['idpeg'] = $this->session->userdata('username');
        $data['menunya'] = $this->authlib->loadMenu('0', $this->nama_group, $this->menuact, $this->menuactsub);
        $data['tema'] = $this->tema;
        $data['page_title'] = "Monitor Tabungan";

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
            $assets_path .'/js/monitor/listtabungan.js',
            $assets_path .'/js/jq/jquery.autocomplete.js',
            $assets_path .'/scripts/form-wizard.js',
            $assets_path .'/scripts/ui-general.js',
            $assets_path .'/scripts/form-validationtabungan.js'
            )
        );

        echo $this->twig_lib->render('tpl/monitor/listtabungan.php', $data);
    }

    public function get_dataview()
    {
        $tgl1 = $this->allfunct->revDate($this->input->post('tgl1'));
        $tgl2 = $this->allfunct->revDate($this->input->post('tgl2'));
        $fv = $this->input->post('fv');
        $ifv = $this->input->post('ifv');
        $where = " WHERE accounttrans_listid !='19'";
        if (($tgl1 != "")&&($tgl2 != "")) {
            $where .= " AND accounttrans_date BETWEEN '$tgl1' AND '$tgl2'";
        }
        if (($fv != "")) {
            $where .= " AND `$fv` LIKE '%".$ifv."%'";
        }
        $query = $this->db->query(
            "SELECT SUM(CASE WHEN accounttrans_type like '01' THEN accounttrans_value END) AS kredit,SUM(CASE WHEN accounttrans_type like '02' THEN accounttrans_value END) AS debet,t1.*,t2.nama,t2.alamat,t2.kabupaten,t3.nama_pegawai,t5.grouptabungan_nama FROM tb_tabungan AS t1
    								INNER JOIN tb_nasabah AS t2 ON t2.nomor_nasabah=t1.nomor_nasabah
    								INNER JOIN pegawai AS t3 ON t1.nomor_fo=t3.nip 
									INNER JOIN tb_accounttrans AS t4 ON t4.accounttrans_user=t1.nomor_rekening 
									INNER JOIN master_grouptabungan AS t5 ON t5.kode_produk=t1.jenis_simpanan 
									".$where." GROUP BY t1.nomor_rekening"
        );
        $data = $query->result_array();
        $hasil['alldata'] = $data;
        echo json_encode($hasil);
    }

    public function get_transview()
    {
        $rek = $this->input->post('id');
        $query = $this->db->query("SELECT * FROM tb_accounttrans WHERE accounttrans_user='$rek' AND accounttrans_listid !='19' AND accounttrans_listid !='577' AND accounttrans_listid !='244' AND accounttrans_listid !='416' AND accounttrans_listid !='349' AND accounttrans_listid !='440'");
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
