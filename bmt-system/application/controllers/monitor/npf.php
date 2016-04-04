<?php
/*
 * Aplikasi AKSIOMA (Aplikasi Keuangan Mikro Masyarakat Ekonomi Syariah) ver. 1.0
 * Copyright (c) 2014
 *
 * file   : monitor/npf.php
 * author : Edi Suwoto S.Komp
 * email  : edi.suwoto@gmail.com
 */
/*----------------------------------------------------------*/
class Npf extends Controller
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
        $this->menuactsub = "npf";
    }

    //---- Admin
    public function index()
    {
        $data['idpeg'] = $this->session->userdata('username');
        $data['menunya'] = $this->authlib->loadMenu('0', $this->nama_group, $this->menuact, $this->menuactsub);
        $data['tema'] = $this->tema;
        $data['page_title'] = "Monitor NPF";

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
            $assets_path .'/js/monitor/npf.js',
            $assets_path .'/js/jq/jquery.autocomplete.js',
            $assets_path .'/scripts/form-wizard.js',
            $assets_path .'/scripts/ui-general.js',
            $assets_path .'/scripts/form-validationtabungan.js'
            )
        );

        echo $this->twig_lib->render('tpl/monitor/npf.php', $data);
    }

    public function get_dataangsuran()
    {
        $data = $this->allfunct->securePost();
        $id    = $data['id'];
        $query = $this->db->query("SELECT pokok,margin FROM tb_pembiayaandetail WHERE id_pembiayaan='$id'");
        $data = $query->result_array();
        if ($query->num_rows() > 0) {
            echo $data[0]["pokok"]."#".$data[0]["margin"];
        } else {
            echo "0#0";
        }
    }
    public function get_totalangsuran()
    {
        $tgl2 = $this->allfunct->revDate($this->input->post('tgl2'));
        $rek = $this->input->post('id');
        $hasil = $this->db->query(
            "SELECT t1.*,sum(accounttrans_value) AS jlh,t1.accounttrans_id FROM tb_accounttrans AS t1
				WHERE accounttrans_user='$rek' AND `accounttrans_desc` LIKE 'ANGSURAN%' AND `accounttrans_listid` !=19 AND
				`accounttrans_type`='01' AND `accounttrans_date` <='$tgl2' GROUP BY `accounttrans_code`,accounttrans_listid ORDER BY `accounttrans_value` ASC"
        )->result();
        $pokok = 0;
        $margin = 0;
        $i=0;
        foreach ($hasil as $row) {
            if ($i==0) {
                $margin = $row->jlh;
            } else {
                $pokok = $row->jlh;
            }
            $i++;
        }
        echo $pokok."#".$margin;
    }

    public function get_dataview()
    {
        
        //$tgl1 = $this->allfunct->revDate($this->input->post('tgl1'));
        $tgl2 = $this->allfunct->revDate($this->input->post('tgl2'));
        
        $fv = $this->input->post('fv');
        $ifv = $this->input->post('ifv');
        $where = " WHERE t1.status=0 ";
        if ($tgl2 != "") {
            //$where .= " AND tgl_dibuka BETWEEN '$tgl1' AND '$tgl2'";
            $where .= " AND tgl_dibuka <='$tgl2'";
        }

        if (($fv != "")) {
            $where .= " AND `$fv` LIKE '%".$ifv."%'";
        }
        $query = $this->db->query(
            "SELECT t1.*,t2.nama,t3.nama_pegawai FROM tb_pembiayaan AS t1 
    								INNER JOIN tb_nasabah AS t2 ON t2.nomor_nasabah=t1.nomor_nasabah 
    								INNER JOIN pegawai AS t3 ON t1.nomor_ao=t3.nip
    								".$where.""
        );
        $data1 = $query->result_array();
        $hasil['alldata'] = $data1;
        echo json_encode($hasil);
    }
     
    public function get_angsuranview()
    {
        $rek = $this->input->post('id');
        $query = $this->db->query(
            "SELECT t1.* FROM tb_pembiayaandetail AS t1 
                                    INNER JOIN tb_pembiayaan AS t2 ON t2.pembiayaan_id=t1.id_pembiayaan 
                                    WHERE nomor_rekening='$rek'"
        );
        $data = $query->result_array();
        //echo $data;
        $hasil['alldata'] = $data;
        echo json_encode($hasil);
    }

    public function get_setoranview()
    {
        $rek = $this->input->post('id');
        $query = $this->db->query(
            "SELECT t1.*,sum(accounttrans_value) AS jlh FROM tb_accounttrans AS t1 
        						WHERE accounttrans_user='$rek' AND `accounttrans_desc` LIKE 'ANGSURAN%' AND `accounttrans_listid` !=19 AND 
        						`accounttrans_type`='01' GROUP BY `accounttrans_code` ORDER BY `accounttrans_id`,accounttrans_date"
        );
        $data = $query->result_array();
        //echo $data;
        $hasil['alldata'] = $data;
        echo json_encode($hasil);
    }

    public function get_outstanding()
    {
        $tgl2 = $this->allfunct->revDate($this->input->post('tgl2'));
        $rek = $this->input->post('id');
        $id_pembiayaan = $this->input->post('id1');
        $query = $this->db->query(
            "SELECT sum(pokok + margin) AS jlh FROM tb_pembiayaandetail AS t1 
                                    INNER JOIN tb_pembiayaan AS t2 ON t2.pembiayaan_id=t1.id_pembiayaan 
                                    WHERE nomor_rekening='$rek'"
        );
        $data = $query->result_array();
        if ($query->num_rows() > 0) {
            $jlh = $data[0]["jlh"];
        } else {
            $jlh = 0;
        }
          $query1 = $this->db->query(
              "SELECT t1.*,sum(accounttrans_value) AS jlh1 FROM tb_accounttrans AS t1 
        						WHERE accounttrans_user='$rek' AND `accounttrans_desc` LIKE 'ANGSURAN%' AND `accounttrans_listid` !=19 AND 
        						`accounttrans_type`='01' GROUP BY `accounttrans_code` ORDER BY `accounttrans_id`,accounttrans_date"
          );
          $data1 = $query1->result_array();
          $trans = $data1[0]["jlh1"];
          echo $trans;
    }
     
    public function get_coltrans()
    {
        //$tgl1 = $this->allfunct->revDate($this->input->post('tgl1'));
        $tgl2 = $this->allfunct->revDate($this->input->post('tgl2'));
        $rek = $this->input->post('id');
        $query = $this->db->query(
            "SELECT count(*) AS jlh FROM `tb_accounttrans` 
        						WHERE accounttrans_date <='$tgl2' AND `accounttrans_listid`=19 AND `accounttrans_user`='$rek'"
        );
        $data = $query->result_array();
        if ($query->num_rows() > 0) {
            echo $data[0]["jlh"];
        } else {
            echo 0;
        }
    }

    public function get_coljadwal()
    {
        //$tgl1 = $this->allfunct->revDate($this->input->post('tgl1'));
        $tgl2 = $this->allfunct->revDate($this->input->post('tgl2'));
        $rek = $this->input->post('id');
        $query = $this->db->query(
            "SELECT count(*) AS jlh FROM `tb_pembiayaandetail` 
        						WHERE `id_pembiayaan`='$rek' AND tgl_angsuran <='$tgl2'"
        );
        $data = $query->result_array();
        if ($query->num_rows() > 0) {
            echo $data[0]["jlh"];
        } else {
            echo 0;
        }
    }

    public function get_paramcol()
    {
        $query = $this->db->query("SELECT * FROM kolekbilitas_harian ORDER BY kharian_id");
        $data = $query->result_array();
        echo json_encode($data);
    }

    public function get_paramcol1()
    {
        $query = $this->db->query("SELECT * FROM kolekbilitas_bulanan ORDER BY kbulanan_id");
        $data = $query->result_array();
        echo json_encode($data);
    }

    public function get_paramcol2()
    {
        $query = $this->db->query("SELECT * FROM kolekbilitas_mingguan ORDER BY kmingguan_id");
        $data = $query->result_array();
        echo json_encode($data);
    }
    public function cetak()
    {
        $this->load->view('cetak/laporan');
    }
}

/* End of file */
