<?php
/*
 * Aplikasi AKSIOMA (Aplikasi Keuangan Mikro Masyarakat Ekonomi Syariah) ver. 1.0
 * Copyright (c) 2014
 *
 * file   : tool/backupdata.php
 * author : Edi Suwoto S.Komp
 * email  : edi.suwoto@gmail.com
 */
/*----------------------------------------------------------*/
class Backupdata extends Controller
{

    public function __construct()
    {
        parent::Controller();
        $this->authlib->cekcontr();
        $this->load->dbutil();
        $this->tema = $this->allfunct->getSetupapp('tema');
        $this->load->model('master_model', 'master');
        $this->load->model('admin_model', 'modelku');
        $this->nama_group = $this->authlib->getGroup($this->encrypt->decode($this->session->userdata('id_group')));
        $this->menuact = "tools";
        $this->menuactsub = "backupdata";
    }

    //---- Admin
    public function index()
    {
        $data['idpeg'] = $this->session->userdata('username');
        $data['menunya'] = $this->authlib->loadMenu('0', $this->nama_group, $this->menuact, $this->menuactsub);
        $data['tema'] = $this->tema;
        $data['page_title'] = "Pencadangan Data";

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
            $assets_path .'/js/tool/backupdata.js',
            $assets_path .'/js/jq/jquery.autocomplete.js',
            $assets_path .'/scripts/form-wizard.js',
            $assets_path .'/scripts/ui-general.js',
            $assets_path .'/scripts/form-validationtabungan.js'
            )
        );

        echo $this->twig_lib->render('tpl/tool/backupdata.php', $data);
        // $this->load->view('tool/backupdata',$data);
    }
    
    public function dobackup()
    {
        $tgl = date("d-m-Y");
        $backup = $this->dbutil->backup();
        $this->load->helper('file');
        write_file($_SERVER['DOCUMENT_ROOT'].'/assets/backup/db_AKSIOMA_'.$tgl.'.gz', $backup);
        $this->load->helper('download');
        force_download('db_AKSIOMA_'.$tgl.'.gz', $backup);
    }
    public function listtable()
    {
        $tables = $this->db->list_tables();
        $i = 1;
        echo "<table width=\"30%\">";
        echo "<tr><td width=\"3%\">No</td><td width=\"20%\">Nama Table</td><td width=\"3%\">Pilih</td></tr>";
        foreach ($tables as $table) {
            echo "<tr><td>".$i."</td><td>".$table."</td><td><input type=\"checkbox\" name=\"sports\" value=\"soccer\"  /></td><tr>";
            $i++;
        }
        echo "</table>";
        
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
