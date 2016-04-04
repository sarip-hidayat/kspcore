<?php
/*
 * Aplikasi AKSIOMA (Aplikasi Keuangan Mikro Masyarakat Ekonomi Syariah) ver. 1.0
 * Copyright (c) 2014
 *
 * file   : monitor/cetaktabungan.php
 * author : Edi Suwoto S.Komp
 * email  : edi.suwoto@gmail.com
 */
/*----------------------------------------------------------*/
class Cetaktabungan extends Controller
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

        $this->menuactsub = "cetaktabungan";

    }

    //---- Admin
    public function index()
    {
        $data['idpeg'] = $this->session->userdata('username');

        $data['menunya'] = $this->authlib->loadMenu('0', $this->nama_group, $this->menuact, $this->menuactsub);
        $data['tema'] = $this->tema;
        $data['page_title'] = "Monitor";

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
            $assets_path .'/js/monitor/cetaktabungan.js',
            $assets_path .'/js/jq/jquery.autocomplete.js',
            $assets_path .'/scripts/form-wizard.js',
            $assets_path .'/scripts/ui-general.js',
            $assets_path .'/scripts/form-validationtabungan.js'
            )
        );

        echo $this->twig_lib->render('tpl/monitor/cetaktabungan.php', $data);
    }
    

    public function get_cetaktrans()
    {

        $tglawal = $this->allfunct->revDate($this->input->post('tglawal'));

        $tglakhir = $this->allfunct->revDate($this->input->post('tglakhir'));

        $id = $this->input->post('id');

        $stmt = "SELECT accounttrans_date,accounttrans_type,accounttrans_value,create_by ".
            "FROM tb_accounttrans WHERE accounttrans_listid !=19 and accounttrans_listid!=349 ".
            "AND accounttrans_user='$id' AND accounttrans_date BETWEEN '$tglawal' AND '$tglakhir'";

        $query = $this->db->query($stmt);

        $data = $query->result_array();

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

    public function cetak()
    {

        $query = $this->db->query("SELECT set4,set5,set6,set7,set8,set9,set10,set11 FROM setting");
        $data = $query->result_array();
        if ($query->num_rows() > 0) {
            $set4 = $data[0]["set4"]."";
            $set5 = $data[0]["set5"]."";
            $set6 = $data[0]["set6"]."";
            $set7 = $data[0]["set7"]."";
            $set8 = $data[0]["set8"]."";
            $set9 = $data[0]["set9"]."";
            $set10 = $data[0]["set10"]."cm";
            $set11 = $data[0]["set11"]."";
        } else {
            $set4 = "";
            $set5 = "";
        }
        $wth = 1 + $set4 + $set5 + $set6 + $set7 + $set8 + $set9;
        $data['wth'] = $wth."%";
        $data['sizetop'] = "<tr><td width='1%'>&nbsp;</td><td width='".$set4."%'>&nbsp;</td><td width='".$set5."%'>&nbsp;</td><td width='".$set6."%'>&nbsp;</td><td width='".$set7."%'>&nbsp;</td><td width='".$set8."%'>&nbsp;</td><td width='".$set9."%'>&nbsp;</td></tr>";
        $data['margin'] = "margin-left : 0.1cm; margin-top : ".$set10.";";
        $this->load->view('cetak/laporantabungan', $data);

    }
    public function cetakkop()
    {
        $query = $this->db->query("SELECT set1,set2,set3 FROM setting");
        $data = $query->result_array();
        if ($query->num_rows() > 0) {
            $set1 = $data[0]["set1"]."mm";
            $set2 = $data[0]["set2"]."mm";
        } else {
            $set1 = "5mm";
            $set2 = "5mm";
        }
           $data['margin'] = "margin-left : ".$set2."; margin-top : ".$set1.";";
        $this->load->view('cetak/kopbuku', $data);
    }

    public function get_paramlayout()
    {
        $query = $this->db->query("SELECT set4,set5,set6,set7,set8,set9,set10,set11 FROM setting");
        $data = $query->result_array();
        echo json_encode($data);
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
