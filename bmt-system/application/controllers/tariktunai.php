<?php
/*
 * Aplikasi AKSIOMA (Aplikasi Keuangan Mikro Masyarakat Ekonomi Syariah) ver. 1.0
 * Copyright (c) 2014
 *
 * file   : tariktunai.php
 * author : Edi Suwoto S.Komp
 * email  : edi.suwoto@gmail.com
 */
/*----------------------------------------------------------*/
class Tariktunai extends Controller
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
        $this->menuactsub = "tariktunai";
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
            $assets_path .'/js/tariktunai.js',
            $assets_path .'/js/jq/jquery.autocomplete.js',
            $assets_path .'/scripts/form-wizard.js',
            $assets_path .'/scripts/ui-general.js',
            $assets_path .'/scripts/form-validationtabungan.js'
            )
        );

        echo $this->twig_lib->render('tpl/tariktunai.php', $data);
    }
    
    //---- Fungsi mengisi option Wilayah
    public function isi_wilayah()
    {
        $hasil = $this->db->select('wilayah_id,kode,wilayah_kerja')->get('bmt_wilayah')->result();
        $i=0;
        foreach ($hasil as $row) {
            $clr = (($i%2) == 0) ? '#fff' : '#EFF1F1';
            echo "<option style=\"background:".$clr."\" value=\"".$row->wilayah_id."\">".$row->kode." - ".$row->wilayah_kerja."</option>";
            $i++;
        }
    }
    public function run_code()
    {
        $num = $this->db->count_all_results('tb_accounttrans') + 1;
        $paddedNum = sprintf("%05d", $num);
        echo  date('m')."".date('y')."".$paddedNum;
    }

    public function saldo()
    {
        $data           = $this->allfunct->securePost();
        $no_rekening    = $data['id'];
        $jurnal        = $data['jurnal'];
        $query = $this->db->query("SELECT ifnull(sum(accounttrans_value), 0) as jlh FROM tb_accounttrans WHERE accounttrans_listid=$jurnal AND accounttrans_user='".$no_rekening."' and accounttrans_type='01'");
        $data = $query->result_array();
        if ($query->num_rows() > 0) {
            $query1 = $this->db->query("SELECT ifnull(sum(accounttrans_value),0) as jlh FROM tb_accounttrans WHERE accounttrans_listid=$jurnal AND accounttrans_user='".$no_rekening."' and accounttrans_type='02'");
            $data1 = $query1->result_array();
            $jlh = $data[0]["jlh"] - $data1[0]["jlh"];
            echo $jlh;
        } else {
            echo "0";
        }
    }

    public function saldoval()
    {
        $data           = $this->allfunct->securePost();
        $no_rekening    = $data['id'];
        $jurnal         = $data['jurnal'];
        $query = $this->db->query("SELECT ifnull(sum(accounttrans_value), 0) as jlh FROM tb_accounttrans WHERE accounttrans_listid=$jurnal AND accounttrans_user='".$no_rekening."' and accounttrans_type='01'");
        $data = $query->result_array();
        if ($query->num_rows() > 0) {
            $query1 = $this->db->query("SELECT ifnull(sum(accounttrans_value), 0) as jlh FROM tb_accounttrans WHERE accounttrans_listid=$jurnal AND accounttrans_user='".$no_rekening."' and accounttrans_type='02'");
            $data1 = $query1->result_array();
            $jlh = ($data[0]["jlh"] * 1) - ($data1[0]["jlh"] * 1);
            echo $jlh;
        } else {
            echo "0";
        }
    }

    public function savetunai()
    {
        $data = $this->allfunct->securePost();
        //cek status tabungan
        $query = $this->db->query("SELECT blockir FROM tb_tabungan WHERE nomor_rekening='".$data['nomor_rekening']."'");
        $datar = $query->result_array();
        $blockir = $datar[0]["blockir"];
        if (($blockir == "Block Debet")||($blockir == "Block Debet-Kredit")) {
            echo "Maaf Tabungan anda di blokir silahkan hubungi administrator";
        } else {
            $data1['accounttrans_listid'] = "19";
            $data1['accounttrans_date'] = $this->allfunct->revDate($data['tgl_transaksi']);
            $data1['accounttrans_code'] = $data['nomor_ref']." - 19";
            $data1['accounttrans_type'] = '01';
            $data1['accounttrans_value'] = $data['jumlah'];
            $data1['accounttrans_desc'] = $data['ket']." - ".$data['nomor_rekening']."( ".$data['nama']." )";
            $data1['accounttrans_user'] = $data['nomor_rekening'];
            $data1['create_date'] = date("Y-m-d H:i:s");
            $data1['create_by'] = $this->session->userdata('username');
            $data1['update_by'] = $this->session->userdata('username');
            
            $data2['accounttrans_listid'] = $data['id_jurnal'];
            $data2['accounttrans_date'] = $this->allfunct->revDate($data['tgl_transaksi']);
            $data2['accounttrans_code'] = $data['nomor_ref']." - ".$data['id_jurnal'];
            $data2['accounttrans_type'] = '02';
            $data2['accounttrans_value'] = $data['jumlah'];
            $data2['accounttrans_desc'] = $data['ket']." - ".$data['nomor_rekening']."( ".$data['nama']." )";
            $data2['accounttrans_user'] = $data['nomor_rekening'];
            $data2['create_date'] = date("Y-m-d H:i:s");
            $data2['create_by'] = $this->session->userdata('username');
            $data2['update_by'] = $this->session->userdata('username');
            
            $nomor_jurnal= $data['nomor_jurnal'];
            $nomor_ref= $data['nomor_ref'];
            $nomor_rekening= $data['nomor_rekening'];
            $nama= $data['nama'];
            unset($data['id_jurnal']);
            unset($data['biaya_jurnal']);
            unset($data['nama']);
            unset($data['alamat']);
            unset($data['kota']);
            unset($data['saldo']);
            $this->master->simpan('tb_accounttrans', $data1);
            $this->master->simpan('tb_accounttrans', $data2);
            $data2['accounttrans_posted'] = '1';
            $data1['accounttrans_posted'] = '1';
            $this->master->simpan('tb_accounttemp', $data1);
            echo $this->master->simpan('tb_accounttemp', $data2)."#".$nomor_jurnal."#".$nomor_ref."#".$nomor_rekening." ".$nama;
        }
    }

    public function limittarik()
    {
        $data = $this->allfunct->securePost();
        $nilai    = $data['nilai'];
        $userlevel = $this->authlib->levellogin($this->session->userdata('username'));
        if ($userlevel != 1) {
            $query = $this->db->query("SELECT kode FROM master_otoritas WHERE level='".$userlevel."'");
            $data = $query->result_array();
            if ($query->num_rows() > 0) {
                $kode = $data[0]["kode"];
                if ($kode >= $nilai) {
                    echo "1";
                } else {
                    echo "0";
                }
            } else {
                echo "no";
            }
        } else {
            echo "no";
        }
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
