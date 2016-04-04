<?php
/*
 * Aplikasi AKSIOMA (Aplikasi Keuangan Mikro Masyarakat Ekonomi Syariah) ver. 1.0
 * Copyright (c) 2014
 *
 * file   : lapmutasi.php
 * author : Edi Suwoto S.Komp
 * email  : edi.suwoto@gmail.com
 */
/*----------------------------------------------------------*/
class Lapmutasi extends Controller
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
        $this->menuactsub = "lapmutasi";
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
            $assets_path .'/js/lapmutasi.js',
            $assets_path .'/js/jq/jquery.autocomplete.js',
            $assets_path .'/scripts/form-wizard.js',
            $assets_path .'/scripts/ui-general.js',
            $assets_path .'/scripts/form-validationtabungan.js'
            )
        );

        echo $this->twig_lib->render('tpl/lapmutasi.php', $data);
        // $this->load->view('lapmutasi',$data);
    }
    public function get_transaksitabungan()
    {
        $tglawal = $this->allfunct->revDate($this->input->post('tglawal'));
        $tglakhir = $this->allfunct->revDate($this->input->post('tglakhir'));
        $query = $this->db->query(
            "SELECT t2.nomor_rekening,grouptabungan_nama,SUM(CASE WHEN accounttrans_type = '01' THEN accounttrans_value END) AS mutasi_kredit, t4.nama, 
                                    SUM(CASE WHEN accounttrans_type = '02' THEN accounttrans_value END) AS mutasi_debet  
                                    FROM tb_accounttrans AS t1 
                                    INNER JOIN tb_tabungan AS t2 ON t2.nomor_rekening=t1.accounttrans_user 
                                    INNER JOIN master_grouptabungan AS t3 ON t3.kode_produk=t2.jenis_simpanan
                                    INNER JOIN tb_nasabah AS t4 ON t4.nomor_nasabah=t2.nomor_nasabah 
                                    WHERE accounttrans_listid !=19 and accounttrans_listid!=349 AND accounttrans_date BETWEEN '$tglawal' AND '$tglakhir' 
                                    GROUP BY t1.accounttrans_user"
        );
        $data = $query->result_array();
        //echo $data;
        $hasil['alldata'] = $data;
        echo json_encode($hasil);
    }
    public function get_transaksideposito()
    {
        $tglawal = $this->allfunct->revDate($this->input->post('tglawal'));
        $tglakhir = $this->allfunct->revDate($this->input->post('tglakhir'));
        $query = $this->db->query(
            "SELECT t2.nomor_rekening,groupdeposito_nama,SUM(CASE WHEN accounttrans_type = '01' THEN accounttrans_value END) AS mutasi_kredit, t4.nama, 
                                    SUM(CASE WHEN accounttrans_type = '02' THEN accounttrans_value END) AS mutasi_debet  
                                    FROM tb_accounttrans AS t1 
                                    INNER JOIN tb_deposito AS t2 ON t2.nomor_rekening=t1.accounttrans_user 
                                    INNER JOIN master_groupdeposito AS t3 ON t3.kode_produk=t2.nama_produk
                                    INNER JOIN tb_nasabah AS t4 ON t4.nomor_nasabah=t2.nomor_nasabah 
                                    WHERE accounttrans_listid !=19 AND accounttrans_date BETWEEN '$tglawal' AND '$tglakhir' 
                                    GROUP BY t1.accounttrans_user"
        );
        $data = $query->result_array();
        //echo $data;
        $hasil['alldata'] = $data;
        echo json_encode($hasil);
    }
    public function get_transaksipembiayaan()
    {
        $tglawal = $this->allfunct->revDate($this->input->post('tglawal'));
        $tglakhir = $this->allfunct->revDate($this->input->post('tglakhir'));
        $query = $this->db->query(
            "SELECT t2.nomor_rekening,grouppembiayaan_nama,SUM(CASE WHEN accounttrans_type = '01' THEN accounttrans_value END) AS mutasi_kredit, t4.nama,
                                    SUM(CASE WHEN accounttrans_type = '02' THEN accounttrans_value END) AS mutasi_debet  
                                    FROM tb_accounttrans AS t1 
                                    INNER JOIN tb_pembiayaan AS t2 ON t2.nomor_rekening=t1.accounttrans_user 
                                    INNER JOIN master_grouppembiayaan AS t3 ON t3.kode_produk=t2.jenis_pembiayaan 
                                    INNER JOIN tb_nasabah AS t4 ON t4.nomor_nasabah=t2.nomor_nasabah 
                                    WHERE accounttrans_listid!=19 and accounttrans_listid!=44 and accounttrans_listid!=118 and 
                                    accounttrans_listid!=288 and accounttrans_date BETWEEN '$tglawal' AND '$tglakhir' 
                                    GROUP BY t1.accounttrans_user"
        );
        $data = $query->result_array();
        //echo $data;
        $hasil['alldata'] = $data;
        echo json_encode($hasil);
    }
    
    public function saldonow()
    {
        $tglawal = $this->allfunct->revDate($this->input->post('tglawal'));
        $id = $this->input->post('id');
        $query = $this->db->query(
            "SELECT SUM(CASE WHEN accounttrans_type = '01' THEN accounttrans_value END) AS mutasi_kredit,SUM(CASE WHEN accounttrans_type = '02' THEN accounttrans_value END) AS mutasi_debet 
                                FROM tb_accounttrans WHERE accounttrans_listid !=19 AND accounttrans_date < '$tglawal' AND accounttrans_user='$id'"
        );
        $data = $query->result_array();
        echo floor($data[0]["mutasi_kredit"] - $data[0]["mutasi_debet"]);
    }
    public function cetakLaptabungan()
    {
        $this->load->view('cetak/laporan');
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
