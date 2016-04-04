<?php
/*
 * Aplikasi AKSIOMA (Aplikasi Keuangan Mikro Masyarakat Ekonomi Syariah) ver. 1.0
 * Copyright (c) 2014
 *
 * file   : param/nasabah.php
 * author : Edi Suwoto S.Komp
 * email  : edi.suwoto@gmail.com
 */
/*----------------------------------------------------------*/
class Nasabah extends Controller
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
        $this->menuactsub = "nasabah";
    }

    //---- Pameter Nasabah
    public function index()
    {
        $data['idpeg'] = $this->session->userdata('username');
        $data['menunya'] = $this->authlib->loadMenu('0', $this->nama_group, $this->menuact, $this->menuactsub);
        $data['tema'] = $this->tema;
        $data['page_title'] = "Parameter Nasabah";

        $assets_path = $this->config->item('assets_path');

        $data['css_links'] = get_css(
            array(
            $assets_path .'/css/autocomplete.css',
            )
        );
        $data['js_links'] = get_js(
            array(
            $assets_path .'/js/param/nasabah.js',
            $assets_path .'/js/jq/jquery.autocomplete.js',
            )
        );

        echo $this->twig_lib->render('tpl/param/nasabah.php', $data);
        // $this->load->view('param/nasabah',$data);
    }
    
    /*
    *  --------------------- pendapatan -----------------------------------------
    */
    //---- Simpan pendapatan
    public function savependapatan()
    {
        echo $this->master->simpan('pendapatan', $this->allfunct->securePost());
    }

    //---- Edit pendapatan
    public function editpendapatan()
    {
        $data = $this->allfunct->securePost();
        $id    = $data['id'];
        unset($data['id']);
        $where = array('pendapatan_id' => $id);
        echo $this->master->update("pendapatan", $data, $where);
    }

    //---- Hapus pendapatan
    public function delpendapatan()
    {
        $where = array('pendapatan_id' => $this->input->post('id'));
        echo  $this->master->delete("pendapatan", $where);
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
        $alldata     = $this->modelku->getAllPendapatan($ff, $if, $fd, $adsc, $awal, $juml);
        $records     = $alldata['numrow'];
        $page_num     = ceil($records / $juml);
        if ($records > 0) {
            $hasil['total'] = $page_num;
            $hasil['alldata'] = $alldata['result'];
               echo json_encode($hasil);
        }
    }

    /*
    *  --------------------- status -----------------------------------------
    */
    //---- Simpan status
    public function savestatus()
    {
        echo $this->master->simpan('status_pekerjaan', $this->allfunct->securePost());
    }

    //---- Edit status
    public function editstatus()
    {
        $data = $this->allfunct->securePost();
        $id    = $data['id'];
        unset($data['id']);
        $where = array('status_id' => $id);
        echo $this->master->update("status_pekerjaan", $data, $where);
    }

    //---- Hapus status
    public function delstatus()
    {
        $where = array('status_id' => $this->input->post('id'));
        echo  $this->master->delete("status_pekerjaan", $where);
    }

    public function get_status()
    {
        $ff            = $this->input->post('ff'); // Jenis Filter
        $if            = $this->input->post('if'); // Value Filter
        $fd            = $this->input->post('fd'); // Field Sorting
        $adsc        = $this->input->post('adsc'); // Asc or Desc
        $hal        = $this->input->post('hal'); // Offset Limit
        $juml        = $this->input->post('juml'); // Jumlah Limit
        $awal         = $juml * ($hal - 1);
        $alldata     = $this->modelku->getAllStatusPekerjaan($ff, $if, $fd, $adsc, $awal, $juml);
        $records     = $alldata['numrow'];
        $page_num     = ceil($records / $juml);
        if ($records > 0) {
            $hasil['total'] = $page_num;
            $hasil['alldata'] = $alldata['result'];
               echo json_encode($hasil);
        }
    }

    /*
    *  --------------------- Pekerjaan -----------------------------------------
    */
    //---- Simpan pekerjaan
    public function savepekerjaan()
    {
        echo $this->master->simpan('sektor_pekerjaan', $this->allfunct->securePost());
    }

    //---- Edit pekerjaan
    public function editpekerjaan()
    {
        $data = $this->allfunct->securePost();
        $id    = $data['id'];
        unset($data['id']);
        $where = array('pekerjaan_id' => $id);
        echo $this->master->update("sektor_pekerjaan", $data, $where);
    }

    //---- Hapus pekerjaan
    public function delpekerjaan()
    {
        $where = array('pekerjaan_id' => $this->input->post('id'));
        echo  $this->master->delete("sektor_pekerjaan", $where);
    }

    public function get_pekerjaan()
    {
        $ff            = $this->input->post('ff'); // Jenis Filter
        $if            = $this->input->post('if'); // Value Filter
        $fd            = $this->input->post('fd'); // Field Sorting
        $adsc        = $this->input->post('adsc'); // Asc or Desc
        $hal        = $this->input->post('hal'); // Offset Limit
        $juml        = $this->input->post('juml'); // Jumlah Limit
        $awal         = $juml * ($hal - 1);
        $alldata     = $this->modelku->getAllSektorPekerjaan($ff, $if, $fd, $adsc, $awal, $juml);
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
