<?php
/*
 * Aplikasi AKSIOMA (Aplikasi Keuangan Mikro Masyarakat Ekonomi Syariah) ver. 1.0
 * Copyright (c) 2014
 *
 * file   : param/distribusiprofit.php
 * author : Edi Suwoto S.Komp
 * email  : edi.suwoto@gmail.com
 */
/*----------------------------------------------------------*/
class Distribusiprofit extends Controller
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
        $this->menuactsub = "distribusiprofit";
    }

    //---- Pameter Nasabah
    public function index()
    {
        $data['idpeg'] = $this->session->userdata('username');
        $data['menunya'] = $this->authlib->loadMenu('0', $this->nama_group, $this->menuact, $this->menuactsub);
        $data['tema'] = $this->tema;
        $data['page_title'] = "Parameter Distribusi Profit";

        $assets_path = $this->config->item('assets_path');

        $data['css_links'] = get_css(
            array(
            $assets_path .'/css/autocomplete.css',
            )
        );
        $data['js_links'] = get_js(
            array(
            $assets_path .'/js/param/distribusiprofit.js',
            $assets_path .'/js/jq/jquery.autocomplete.js',
            )
        );

        echo $this->twig_lib->render('tpl/param/distribusiprofit.php', $data);
        // $this->load->view('param/distribusiprofit',$data);
    }
    
    /*
    *  --------------------- perhimpunan -----------------------------------------
    */
    //---- Simpan perhimpunan
    public function saveperhimpunan()
    {
        echo $this->master->simpan('tb_akunperhimpunan', $this->allfunct->securePost());
    }
    public function delperhimpunan()
    {
        $where = array('perhimpunan_id' => $this->input->post('id'));
        echo $this->master->delete("tb_akunperhimpunan", $where);
    }
    //---- Edit perhimpunan
    public function editperhimpunan()
    {
        $data = $this->allfunct->securePost();
        $id    = $data['id'];
        unset($data['id']);
        $where = array('perhimpunan_id' => $id);
        echo $this->master->update("tb_akunperhimpunan", $data, $where);
    }
    public function get_perhimpunan()
    {
        $ff            = $this->input->post('ff'); // Jenis Filter
        $if            = $this->input->post('if'); // Value Filter
        $fd            = $this->input->post('fd'); // Field Sorting
        $adsc        = $this->input->post('adsc'); // Asc or Desc
        $hal        = $this->input->post('hal'); // Offset Limit
        $juml        = $this->input->post('juml'); // Jumlah Limit
        $awal         = $juml * ($hal - 1);
        $alldata     = $this->modelku->getAllPerhimpunan($ff, $if, $fd, $adsc, $awal, $juml);
        $records     = $alldata['numrow'];
        $page_num     = ceil($records / $juml);
        if ($records > 0) {
            $hasil['total'] = $page_num;
            $hasil['alldata'] = $alldata['result'];
               echo json_encode($hasil);
        }
    }
    /*
    *  --------------------- pendapatan -----------------------------------------
    */
    //---- Simpan pendapatan
    public function savependapatan()
    {
        echo $this->master->simpan('tb_akunpendapatan', $this->allfunct->securePost());
    }
    public function delpendapatan()
    {
        $where = array('akunpendapatan_id' => $this->input->post('id'));
        echo $this->master->delete("tb_akunpendapatan", $where);
    }
    //---- Edit perhimpunan
    public function editpendapatan()
    {
        $data = $this->allfunct->securePost();
        $id    = $data['id'];
        unset($data['id']);
        $where = array('akunpendapatan_id' => $id);
        echo $this->master->update("tb_akunpendapatan", $data, $where);
    }
    public function get_pendapatan()
    {
        $ff            = $this->input->post('ff'); // Jenis Filter
        $if            = $this->input->post('if'); // Value Filter
        $fd            = $this->input->post('fd'); // Field Sorting
        $adsc        = $this->input->post('adsc'); // Asc or Desc
        $hal        = $this->input->post('hal'); // Offset Limit
        $juml        = $this->input->post('juml'); // Jumlah Limit
        $awal         = $juml * ($hal - 1);
        $alldata     = $this->modelku->getAllPendapatanprofit($ff, $if, $fd, $adsc, $awal, $juml);
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
