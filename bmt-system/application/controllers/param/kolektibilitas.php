<?php
/*
 * Aplikasi AKSIOMA (Aplikasi Keuangan Mikro Masyarakat Ekonomi Syariah) ver. 1.0
 * Copyright (c) 2014
 *
 * file   : param/kolektibilitas.php
 * author : Edi Suwoto S.Komp
 * email  : edi.suwoto@gmail.com
 */
/*----------------------------------------------------------*/
class Kolektibilitas extends Controller
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

        $this->menuactsub = "kolektibilitas";

    }

    //---- Pameter Nasabah
    public function index()
    {
        $data['idpeg'] = $this->session->userdata('username');

        $data['menunya'] = $this->authlib->loadMenu('0', $this->nama_group, $this->menuact, $this->menuactsub);
        $data['tema'] = $this->tema;
        $data['page_title'] = "Parameter Kolekbilitas";

        $assets_path = $this->config->item('assets_path');

        $data['css_links'] = get_css(
            array(
            $assets_path .'/css/autocomplete.css',
            )
        );
        $data['js_links'] = get_js(
            array(
            $assets_path .'/js/param/kolektibilitas.js',
            $assets_path .'/js/jq/jquery.autocomplete.js',
            )
        );

        echo $this->twig_lib->render('tpl/param/kolektibilitas.php', $data);
        // $this->load->view('param/kolektibilitas',$data);
    }
    

    /*

    *  --------------------- kharian -----------------------------------------

    */
    //---- Simpan kharian

    public function savekharian()
    {

        echo $this->master->simpan('kolekbilitas_harian', $this->allfunct->securePost());

    }

    //---- Edit kharian

    public function editkharian()
    {

        $data = $this->allfunct->securePost();

        $id    = $data['id'];

        unset($data['id']);

        $where = array('kharian_id' => $id);

        echo $this->master->update("kolekbilitas_harian", $data, $where);

    }

    public function get_kharian()
    {

        $ff            = $this->input->post('ff'); // Jenis Filter

        $if            = $this->input->post('if'); // Value Filter

        $fd            = $this->input->post('fd'); // Field Sorting

        $adsc        = $this->input->post('adsc'); // Asc or Desc

        $hal        = $this->input->post('hal'); // Offset Limit

        $juml        = $this->input->post('juml'); // Jumlah Limit

        $awal         = $juml * ($hal - 1);

        $alldata     = $this->modelku->getAllKharian($ff, $if, $fd, $adsc, $awal, $juml);

        $records     = $alldata['numrow'];

        $page_num     = ceil($records / $juml);

        if ($records > 0) {

            $hasil['total'] = $page_num;

            $hasil['alldata'] = $alldata['result'];

               echo json_encode($hasil);

        }

    }
    
    //---- Edit bulanan
    public function editkbulanan()
    {
        $data = $this->allfunct->securePost();
        $id    = $data['id'];
        unset($data['id']);
        $where = array('kbulanan_id' => $id);
        echo $this->master->update("kolekbilitas_bulanan", $data, $where);
    }
    
    public function get_kbulanan()
    {
        $ff            = $this->input->post('ff'); // Jenis Filter
        $if            = $this->input->post('if'); // Value Filter
        $fd            = $this->input->post('fd'); // Field Sorting
        $adsc        = $this->input->post('adsc'); // Asc or Desc
        $hal        = $this->input->post('hal'); // Offset Limit
        $juml        = $this->input->post('juml'); // Jumlah Limit
        $awal         = $juml * ($hal - 1);
        $alldata     = $this->modelku->getAllKbulanan($ff, $if, $fd, $adsc, $awal, $juml);
        $records     = $alldata['numrow'];
        $page_num     = ceil($records / $juml);
        if ($records > 0) {
            $hasil['total'] = $page_num;
            $hasil['alldata'] = $alldata['result'];
               echo json_encode($hasil);
        }
    }

    public function editkmingguan()
    {
        $data = $this->allfunct->securePost();
        $id    = $data['id'];
        unset($data['id']);
        $where = array('kmingguan_id' => $id);
        echo $this->master->update("kolekbilitas_mingguan", $data, $where);
    }

    public function get_kmingguan()
    {
        $ff            = $this->input->post('ff'); // Jenis Filter
        $if            = $this->input->post('if'); // Value Filter
        $fd            = $this->input->post('fd'); // Field Sorting
        $adsc        = $this->input->post('adsc'); // Asc or Desc
        $hal        = $this->input->post('hal'); // Offset Limit
        $juml        = $this->input->post('juml'); // Jumlah Limit
        $awal         = $juml * ($hal - 1);
        $alldata     = $this->modelku->getAllKmingguan($ff, $if, $fd, $adsc, $awal, $juml);
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
