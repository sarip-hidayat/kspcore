<?php
/*
 * Aplikasi AKSIOMA (Aplikasi Keuangan Mikro Masyarakat Ekonomi Syariah) ver. 1.0
 * Copyright (c) 2014
 *
 * file   : param/bmt.php
 * author : Edi Suwoto S.Komp
 * email  : edi.suwoto@gmail.com
 */
/*----------------------------------------------------------*/
class Bmt extends Controller
{

    public function __construct()
    {
        parent::Controller();
        $this->authlib->cekcontr();
        $this->tema = $this->allfunct->getSetupapp('tema');
        $this->load->model('master_model', 'master');

        $this->load->model('admin_model', 'modelku');
        $this->nama_group = $this->authlib->getGroup($this->encrypt->decode($this->session->userdata('id_group')));

        $this->menuact = "param";

        $this->menuactsub = "bmt";

    }

    //---- Pameter BMT
    public function index()
    {
        $data['idpeg'] = $this->session->userdata('username');

        $data['menunya'] = $this->authlib->loadMenu('0', $this->nama_group, $this->menuact, $this->menuactsub);
        $data['tema'] = $this->tema;
        $data['page_title'] = "Parameter Koperasi";

        $assets_path = $this->config->item('assets_path');

        $data['css_links'] = get_css(
            array(
            $assets_path .'/css/autocomplete.css',
            )
        );
        $data['js_links'] = get_js(
            array(
            $assets_path .'/js/param/bmt.js',
            $assets_path .'/js/jq/jquery.autocomplete.js',
            )
        );

        echo $this->twig_lib->render('tpl/param/bmt.php', $data);
    }
    
    /*
    *  --------------------- BMT -----------------------------------------
    */

    //---- Edit BMT Info

    public function editBMTInfo()
    {

        $data = $this->allfunct->securePost();

        $id    = 1;

        //unset($data['bmt_id']);

        $where = array('bmt_id' => $id);

        echo $this->master->update("bmt", $data, $where);

    }

    
    //---- Simpan BMT
    public function saveBMT()
    {
        echo $this->master->simpan('bmt_wilayah', $this->allfunct->securePost());
    }

    //---- Edit BMT
    public function editBMT()
    {
        $data = $this->allfunct->securePost();
        $id    = $data['id'];
        unset($data['id']);
        $where = array('wilayah_id' => $id);
        echo $this->master->update("bmt_wilayah", $data, $where);
    }

    //---- Hapus BMT
    public function delBMT()
    {
        $where = array('wilayah_id' => $this->input->post('id'));
        echo  $this->master->delete("bmt_wilayah", $where);
    }

    public function get_bmt()
    {
        $ff            = $this->input->post('ff'); // Jenis Filter
        $if            = $this->input->post('if'); // Value Filter
        $fd            = $this->input->post('fd'); // Field Sorting
        $adsc        = $this->input->post('adsc'); // Asc or Desc
        $hal        = $this->input->post('hal'); // Offset Limit
        $juml        = $this->input->post('juml'); // Jumlah Limit
        $awal         = $juml * ($hal - 1);
        $alldata     = $this->modelku->getAllBMT($ff, $if, $fd, $adsc, $awal, $juml);
        $records     = $alldata['numrow'];
        $page_num     = ceil($records / $juml);
        if ($records > 0) {
            $hasil['total'] = $page_num;
            $hasil['alldata'] = $alldata['result'];
               echo json_encode($hasil);
        }
    }

    

    public function get_bmtinfo()
    {

        $objord = $this->input->post('id');

        $where = "";

        $query = $this->db->query("SELECT t1.*,namaProvinsi FROM bmt AS t1 INNER JOIN provinsi AS t2 ON t2.kodeBPS=t1.propinsi");

        $data = $query->result_array();

        $hasil['alldata'] = $data;

        echo json_encode($hasil);

    }

    public function get_info()
    {
        $id = $this->input->post('id');
        $query = $this->db->query("SELECT t1.*,namaProvinsi FROM bmt AS t1 INNER JOIN provinsi AS t2 ON t2.kodeBPS=t1.propinsi WHERE kode_cabang='$id'");
        $data = $query->result_array();
        echo $data[0]["nama"];
    }

    //---- propinsi

    public function isi_provinsi()
    {

        $hasil = $this->db->select('kodeBPS,namaProvinsi')->get('provinsi')->result();

        $i=0;

        foreach ($hasil as $row) {

            $clr = (($i%2) == 0) ? '#fff' : '#EFF1F1';

            echo "<option style=\"background:".$clr."\" value=\"".$row->kodeBPS."\">".$row->namaProvinsi."</option>";

            $i++;

        }

    }
    //---- group kerja

    public function isi_wilayah()
    {

        $hasil = $this->db->select('kode,wilayah_kerja')->get('bmt_wilayah')->result();

        $i=0;

        foreach ($hasil as $row) {

            $clr = (($i%2) == 0) ? '#fff' : '#EFF1F1';

            echo "<option style=\"background:".$clr."\" value=\"".$row->kode."\">".$row->wilayah_kerja."</option>";

            $i++;

        }

    }
}

/* End of file */
