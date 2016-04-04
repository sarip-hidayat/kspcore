<?php
/*
 * Aplikasi AKSIOMA (Aplikasi Keuangan Mikro Masyarakat Ekonomi Syariah) ver. 1.0
 * Copyright (c) 2014
 *
 * file   : param/tabungan.php
 * author : Edi Suwoto S.Komp
 * email  : edi.suwoto@gmail.com
 */
/*----------------------------------------------------------*/
class Tabungan extends Controller
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

        $this->menuactsub = "tabungan";

    }

    //---- Pameter Nasabah
    public function index()
    {
        $data['idpeg'] = $this->session->userdata('username');

        $data['menunya'] = $this->authlib->loadMenu('0', $this->nama_group, $this->menuact, $this->menuactsub);
        $data['tema'] = $this->tema;
        $data['page_title'] = "Parameter Tabungan";

        $assets_path = $this->config->item('assets_path');

        $data['css_links'] = get_css(
            array(
            $assets_path .'/css/autocomplete.css',
            )
        );
        $data['js_links'] = get_js(
            array(
            $assets_path .'/js/param/tabungan.js',
            $assets_path .'/js/jq/jquery.autocomplete.js',
            )
        );

        echo $this->twig_lib->render('tpl/param/tabungan.php', $data);
    }
    

    //---- Edit Tabungan info

    public function editMTabungan()
    {

        $data = $this->allfunct->securePost();

        $data['adm_buka_rekening'] = $data['adm_buka_rekening'];

        $data['adm_tutup_rekening'] = $data['adm_tutup_rekening'];

        $data['adm_lain_lain'] = $data['adm_lain_lain'];

        $id    = $data['kode_produk'];

        unset($data['kode_produk']);

        $where = array('kode_produk' => $id);

        echo $this->master->update("master_tabungan", $data, $where);

    }

    public function get_tabunganinfo()
    {

        $objord = $this->input->post('id');

        $query = $this->db->query("SELECT * FROM master_tabungan WHERE kode_produk='".$objord."'");

        $data = $query->result_array();

        $hasil['alldata'] = $data;

        echo json_encode($hasil);

    }





    /*

    *  --------------------- biaya -----------------------------------------

    */

    //---- Simpan biaya

    public function savebiaya()
    {

        $data = $this->allfunct->securePost();

        $data['kode'] = $data['kode'];

        $data['nama'] = $data['nama'];

        echo $this->master->simpan('master_biaya', $data);

    }



    //---- Edit biaya

    public function editbiaya()
    {

        $data = $this->allfunct->securePost();

        $data['kode'] = $data['kode'];

        $data['nama'] = $data['nama'];

        $id    = $data['id'];

        unset($data['id']);

        $where = array('biaya_id' => $id);

        echo $this->master->update("master_biaya", $data, $where);

    }



    //---- Hapus biaya

    public function delbiaya()
    {

        $where = array('biaya_id' => $this->input->post('id'));

        echo  $this->master->delete("master_biaya", $where);

    }



    public function get_biaya()
    {

        $ff            = $this->input->post('ff'); // Jenis Filter

        $if            = $this->input->post('if'); // Value Filter

        $fd            = $this->input->post('fd'); // Field Sorting

        $adsc        = $this->input->post('adsc'); // Asc or Desc

        $hal        = $this->input->post('hal'); // Offset Limit

        $juml        = $this->input->post('juml'); // Jumlah Limit

        $awal         = $juml * ($hal - 1);

        $alldata     = $this->modelku->getAllBiaya($ff, $if, $fd, $adsc, $awal, $juml);

        $records     = $alldata['numrow'];

        $page_num     = ceil($records / $juml);

        if ($records > 0) {

            $hasil['total'] = $page_num;

            $hasil['alldata'] = $alldata['result'];

               echo json_encode($hasil);

        }

    }


    /*
    *  --------------------- Kode Mutasi -----------------------------------------
    */
    //---- Simpan mutasi
    public function savemutasi()
    {
        echo $this->master->simpan('master_kodemutasi', $this->allfunct->securePost());
    }

    //---- Edit mutasi
    public function editmutasi()
    {
        $data = $this->allfunct->securePost();
        $id    = $data['id'];
        unset($data['id']);
        $where = array('mutasi_id' => $id);
        echo $this->master->update("master_kodemutasi", $data, $where);
    }

    //---- Hapus mutasi
    public function delmutasi()
    {
        $where = array('mutasi_id' => $this->input->post('id'));
        echo  $this->master->delete("master_kodemutasi", $where);
    }

    public function get_mutasi()
    {
        $ff            = $this->input->post('ff'); // Jenis Filter
        $if            = $this->input->post('if'); // Value Filter
        $fd            = $this->input->post('fd'); // Field Sorting
        $adsc        = $this->input->post('adsc'); // Asc or Desc
        $hal        = $this->input->post('hal'); // Offset Limit
        $juml        = $this->input->post('juml'); // Jumlah Limit
        $awal         = $juml * ($hal - 1);
        $alldata     = $this->modelku->getAllKodeMutasi($ff, $if, $fd, $adsc, $awal, $juml);
        $records     = $alldata['numrow'];
        $page_num     = ceil($records / $juml);
        if ($records > 0) {
            $hasil['total'] = $page_num;
            $hasil['alldata'] = $alldata['result'];
               echo json_encode($hasil);
        }
    }

    //---- Fungsi level otorisasi

    public function isi_level()
    {

        $hasil = $this->db->select('jabatan_id,nama_jabatan')->get('jabatan')->result();

        $i=0;

        foreach ($hasil as $row) {

            $clr = (($i%2) == 0) ? '#fff' : '#EFF1F1';

            echo "<option style=\"background:".$clr."\" value=\"".$row->jabatan_id."\">".$row->nama_jabatan."</option>";

            $i++;

        }

    }

    //

    //---- Simpan produk

    public function saveproduk()
    {

        echo $this->master->simpan('master_grouptabungan', $this->allfunct->securePost());

    }



    //---- Edit produk

    public function editproduk()
    {

        $data = $this->allfunct->securePost();

        $id    = $data['id'];

        unset($data['id']);

        $where = array('grouptabungan_id' => $id);

        echo $this->master->update("master_grouptabungan", $data, $where);

    }

    public function get_produk()
    {

        $ff            = $this->input->post('ff'); // Jenis Filter

        $if            = $this->input->post('if'); // Value Filter

        $fd            = $this->input->post('fd'); // Field Sorting

        $adsc        = $this->input->post('adsc'); // Asc or Desc

        $hal        = $this->input->post('hal'); // Offset Limit

        $juml        = $this->input->post('juml'); // Jumlah Limit

        $awal         = $juml * ($hal - 1);

        $alldata     = $this->modelku->getAllTabunganProduk($ff, $if, $fd, $adsc, $awal, $juml);

        $records     = $alldata['numrow'];

        $page_num     = ceil($records / $juml);

        if ($records > 0) {

            $hasil['total'] = $page_num;

            $hasil['alldata'] = $alldata['result'];

               echo json_encode($hasil);

        }

    }
}

/* End of file */
