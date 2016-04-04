<?php
/*
 * Aplikasi AKSIOMA (Aplikasi Keuangan Mikro Masyarakat Ekonomi Syariah) ver. 1.0
* Copyright (c) 2014
*
* file   : base/tabungan.php
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

        $this->menuact = "base";

        $this->menuactsub = "tabungan";

    }

    //---- Admin
    public function index()
    {
        $data['idpeg'] = $this->session->userdata('username');

        $data['menunya'] = $this->authlib->loadMenu('0', $this->nama_group, $this->menuact, $this->menuactsub);
        $data['tema'] = $this->tema;
        $data['page_title'] = "Tabungan";

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
            $assets_path .'/js/base/tabungan.js',
            $assets_path .'/js/jq/jquery.autocomplete.js',
            $assets_path .'/scripts/form-wizard.js',
            $assets_path .'/scripts/ui-general.js',
            $assets_path .'/scripts/form-validationtabungan.js'
            )
        );

        echo $this->twig_lib->render('tpl/base/tabungan.php', $data);
    }
    

    public function run_code()
    {

        $id    = $this->input->post('id');

        $cab    = $this->input->post('cab');
        //$query = $this->db->query("SELECT count(*) AS jlh FROM tb_tabungan WHERE nomor_rekening LIKE '$id%'");

        $query = $this->db->query("SELECT nomor_rekening AS jlh FROM tb_tabungan WHERE nomor_rekening LIKE '$id%' order by nomor_rekening desc");
        $data = $query->result_array();

        
        if ($query->num_rows() > 0) {
            $num = $data[0]["jlh"] + 1;
            $paddedNum = $num;
        } else {
            $paddedNum = $id."".$cab."".sprintf("%05d", 1);
        }

        echo  $paddedNum;

        

    }

    public function isi_propinsi()
    {
        $hasil = $this->db->select('kodeBPS,namaProvinsi')->get('provinsi')->result();
        $i=0;
        $pTitle = "<option style=\"background:#EFF1F1\" value=\"0\">--------pilih propinsi-------</option>";
        foreach ($hasil as $row) {
            $clr = (($i%2) == 0) ? '#fff' : '#EFF1F1';
            $pTitle .= "<option style=\"background:".$clr."\" value=\"".$row->kodeBPS."\">".$row->namaProvinsi."</option>";
            $i++;
        }
        echo $pTitle;
    }

    public function cab_code()
    {

        $query = $this->db->query("SELECT kode FROM bmt_wilayah AS t1 INNER JOIN bmt AS t2 ON t2.wilayah_kerja=t1.kode");

        $data = $query->result_array();

        echo $data[0]["kode"];

    }

    public function produk_code()
    {

        $query = $this->db->query("SELECT kode_produk FROM master_grouptabungan");

        $data = $query->result_array();

        echo $data[0]["kode_produk"];

    }

    // ---- Fungsi membantu Autocomplete

    public function search_nasabah()
    {

        $nama = strtoupper($this->input->post('q'));

        $query = $this->db->select('nomor_nasabah,nama,alamat,rtrw,kabupaten')->like('nama', $nama)->limit(20)->get('tb_nasabah')->result();

        echo json_encode($query);

    }

    // ---- Fungsi membantu Autocomplete
    public function search_fo()
    {

        $nama = strtoupper($this->input->post('q'));

        $query = $this->db->select('nip,nama_pegawai')->like('nama_pegawai', $nama)->limit(20)->get('pegawai')->result();

        echo json_encode($query);

    }

    /// save new Tabungan

    public function saveTabungan()
    {

        $data = $this->allfunct->securePost();

        if ($data['tgl_dibuka'] !="") {

            $data['tgl_dibuka'] = $this->allfunct->revDate($data['tgl_dibuka']);

        }

        unset($data['nomor_foname']);

        unset($data['nama']);

        unset($data['alamat']);

        unset($data['kota']);

        $data['create_by'] = $this->session->userdata('username');

        $data['update_by'] = $this->session->userdata('username');

        echo $this->master->simpan('tb_tabungan', $data);

    }

    public function editTabungan()
    {

        $data = $this->allfunct->securePost();

        $id    = $data['nomor_rekening'];

        unset($data['nomor_rekening']);

        unset($data['tgl_dibuka']);

        unset($data['nomor_foname']);

        unset($data['nama']);

        unset($data['alamat']);

        unset($data['kota']);

        $data['update_by'] = $this->session->userdata('username');

        $where = array('nomor_rekening' => $id);

        echo $this->master->update("tb_tabungan", $data, $where);

    }

    public function hapus()
    {

        $where = array('tabungan_id' => $this->input->post('id'));

        echo  $this->master->delete("tb_tabungan", $where);

    }

    public function get_tabungan()
    {
        $ff            = $this->input->post('ff'); // Jenis Filter
        $if            = $this->input->post('if'); // Value Filter
        $fd            = $this->input->post('fd'); // Field Sorting
        $adsc        = $this->input->post('adsc'); // Asc or Desc
        $hal        = $this->input->post('hal'); // Offset Limit
        $juml        = $this->input->post('juml'); // Jumlah Limit
        $awal         = $juml * ($hal - 1);
        $alldata     = $this->modelku->getAllTabungan($ff, $if, $fd, $adsc, $awal, $juml);
        $records     = $alldata['numrow'];
        $page_num     = ceil($records / $juml);
        if ($records > 0) {

            $hasil['total'] = $page_num;
            $hasil['alldata'] = $alldata['result'];
               echo json_encode($hasil);
        }
    }

    public function isi_tabungan()
    {

        $hasil = $this->db->select('kode_produk,grouptabungan_nama')->get('master_grouptabungan')->result();

        $i=0;

        foreach ($hasil as $row) {

            $clr = (($i%2) == 0) ? '#fff' : '#EFF1F1';

            echo "<option style=\"background:".$clr."\" value=\"".$row->kode_produk."\">".$row->grouptabungan_nama."</option>";

            $i++;

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


    public function single_jnstab()
    {

        $data = $this->allfunct->securePost();

        $jnstab    = $data['jnstab'];

        $query = $this->db->query("SELECT grouptabungan_nama FROM `master_grouptabungan` WHERE kode_produk='".$jnstab."'");

        $data = $query->result_array();

        if ($query->num_rows() > 0) {

            $pjnstab = $data[0]["grouptabungan_nama"];

            echo $pjnstab;

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

    public function jurnal()
    {
        $data = $this->allfunct->securePost();
        $id    = @$data['id'];
        $norek = @$data['norek'];
        if ($norek) {
            $this->db->select('jenis_simpanan');
            $q = $this->db->get_where('tb_tabungan', array('nomor_rekening' => $norek));
            if ($q->num_rows() > 0) {
                $r = $q->row();
                $id = $r->jenis_simpanan;
            }
        }
        $query = $this->db->query("SELECT gl_produk FROM master_tabungan WHERE kode_produk='".$id."'");
        $data = $query->result_array();
        echo $data[0]["gl_produk"];
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
}

/* End of file */
