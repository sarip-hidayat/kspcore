{% extends "tpl/tpl1.php" %}

        {% block breadcrumb %}
        <ul class="breadcrumb">
            <li>
                <i class="icon-home"></i>
                <a href="..">Home</a> 
                <i class="icon-angle-right"></i>
            </li>
            <li><a href="#">Base</a></li>
            
        </ul>
        {% endblock  breadcrumb %}

        {% block page %}
				<div id="page" class="dashboard">
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="tabbable tabbable-custom boxless">
                                <ul class="nav nav-tabs">
                                   <li class="active"><a href="#tabs-1" data-toggle="tab">Nasabah</a></li>
                                   <li><a href="#tabs-2" data-toggle="tab">Nasabah Baru</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tabs-1">
                                        <div class="widget box blue">
                                            <div class="widget-title">
                                               <h4><i class="icon-reorder"></i> Nasabah</h4>
                                            </div>
                                            <div id="table_datanasabah">
{% set option = [{'nama': 'Nama Nasabah'}, {'nomor_nasabah': 'Nomor Nasabah'}] %}
{% set tombol = '<button id="addnasabah" class="fg-button ui-state-default ui-corner-all"><img src="'~ assets_path ~'/images/addicon.png" />Tambah Nasabah</button>' %}

{%
set tabel_head = [
    ['', '5%', 'No'],
    ['nomor_nasabah', '12%', 'Nomor Nasabah'],
    ['', '20%', 'Nama Nasabah'],
    ['', '25%', 'Alamat'],
    ['', '10%', 'Kota'],
    ['', '5%', 'Manage'],
    ['nasabah_id', '5%', 'ID'],
]
%}
{% embed "app/filter_layout.php" %}{% endembed %}
{% embed "app/table_layout.php" %}{% endembed %}
{% embed "app/paging_layout.php" %}{% endembed %}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tabs-2">
                                        <div class="row-fluid">
                                        <div class="span12">
                                        <div class="widget box blue" id="form_wizard_1">
                                        <form action="#" id="form_sample_1" class="form-horizontal">
                                            <input name="code_wilayah" type="hidden" >
                                            <div class="widget-title">
                                               <h4><i class="icon-reorder"></i> Nasabah Baru</h4>
                                            </div>
                                            <div id="table_pencariannasabah">
                                                <br>
                                                <div class="alert alert-error hide">
                                                  <button class="close" data-dismiss="alert">×</button>
                                                  Ada inputan yang errors. Silahkan periksa.
                                               </div>
                                               <div class="alert alert-success hide">
                                                  <button class="close" data-dismiss="alert">×</button>
                                                  Your form validation is successful!
                                               </div>
                                            
                                                <div class="row-fluid">
                                                    <div class="span6 ">
                                                        <div class="control-group">
                                                            <label class="control-label">Tanggal masuk<span class="required">*</span></label>
                                                            <div class="controls">
                                                                <input name="tgl_masuk" type="text" size="16" class="m-wrap m-ctrl-medium date-picker">
                                                            </div>
                                                        </div>
                                                        <div class="control-group">
                                                            <label class="control-label">No. Nasabah<span class="required">*</span></label>
                                                            <div class="controls">
                                                                <input name="nomor_nasabah" type="text" class="input-large" readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="widget-body form">
                                                        <div class="form-wizard">
                                                            <div class="navbar steps">
                                                                <div class="navbar-inner">
                                                                    <ul class="row-fluid">
                                                                       <li class="span3">
                                                                          <a href="#tab1" data-toggle="tab" class="step active">
                                                                          <span class="number">1</span>
                                                                          <span class="desc"><i class="icon-ok"></i> Umum</span>   
                                                                          </a>
                                                                       </li>
                                                                       <li class="span3">
                                                                          <a href="#tab2" data-toggle="tab" class="step">
                                                                          <span class="number">2</span>
                                                                          <span class="desc"><i class="icon-ok"></i> Alamat</span>   
                                                                          </a>
                                                                       </li>
                                                                       <li class="span3">
                                                                          <a href="#tab3" data-toggle="tab" class="step">
                                                                          <span class="number">3</span>
                                                                          <span class="desc"><i class="icon-ok"></i> Pekerjaan</span>   
                                                                          </a>
                                                                       </li>
                                                                       <li class="span3">
                                                                          <a href="#tab4" data-toggle="tab" class="step">
                                                                          <span class="number">4</span>
                                                                          <span class="desc"><i class="icon-ok"></i> Kerabat</span>   
                                                                          </a> 
                                                                       </li>
                                                                    </ul>
                                                                 </div>
                                                              </div>
                                                              <div id="bar" class="progress progress-success progress-striped">
                                                                 <div class="bar"></div>
                                                              </div>
                                                              <div class="tab-content">
                                                                 <div class="tab-pane active" id="tab1">
                                                                    <div class="row-fluid">
                                                                        <div class="span6 ">
                                                                            <h4>Pribadi</h4>
                                                                            <hr>
                                                                            <div class="control-group">
                                                                                <label class="control-label">Nama</label>
                                                                                <div class="controls">
                                                                                    <input tabindex="1" type="text" class="input-large" name="nama" id="nama">
                                                                                </div>
                                                                            </div>
                                                                            <div class="control-group">
                                                                                <label class="control-label">Nama Panggilan</label>
                                                                                <div class="controls">
                                                                                    <input tabindex="1" type="text" class="input-large" name="nama_pangilan">
                                                                                </div>
                                                                            </div>
                                                                            <div class="control-group">
                                                                                <label class="control-label">Tempat Lahir</label>
                                                                                <div class="controls">
                                                                                    <input tabindex="2" type="text" class="input-large" name="tempat_lahir">
                                                                                </div>
                                                                            </div>
                                                                            <div class="control-group">
                                                                                <label class="control-label">Tanggal Lahir</label>
                                                                                <div class="controls">
                                                                                    <input tabindex="3" type="text" size="16" class="m-wrap m-ctrl-medium date-picker" name="tanggal_lahir">
                                                                                </div>
                                                                            </div>
                                                                            <div class="control-group">
                                                                                <label class="control-label">Jenis Kelamin</label>
                                                                                <div class="controls">
                                                                                    <select tabindex="4" class="input-large" name="jenis_kelamin">
                                                                                        <option value="1">Laki - laki</option>
                                                                                        <option value="2">Perempuan</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="control-group">
                                                                                <label class="control-label">Agama</label>
                                                                                <div class="controls">
                                                                                    <select tabindex="5" class="input-large" name="agama">
                                                                                        <option value="1">Islam</option>
                                                                                        <option value="2">Kristen</option>
                                                                                        <option value="3">Hindu</option>
                                                                                        <option value="4">Budha</option>
                                                                                        <option value="5">Katolik</option>
                                                                                        <option value="6">Kepercayaan</option>
                                                                                        <option value="7">Lain - lain</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="control-group">
                                                                                <label class="control-label">Pendidikan</label>
                                                                                <div class="controls">
                                                                                    <select tabindex="6" class="input-large" name="pendidikan">
                                                                                        <option value="1">SD</option>
                                                                                        <option value="2">SMP</option>
                                                                                        <option value="3">SMU/SMK</option>
                                                                                        <option value="4">D1</option>
                                                                                        <option value="5">D2</option>
                                                                                        <option value="6">D3</option>
                                                                                        <option value="7">D4</option>
                                                                                        <option value="8">S1</option>
                                                                                        <option value="9">S2</option>
                                                                                        <option value="10">S3</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="control-group">
                                                                                <label class="control-label">Nama Ibu Kandung</label>
                                                                                <div class="controls">
                                                                                    <input tabindex="7" type="text" class="input-large" name="nama_ibu_kandung">
                                                                                </div>
                                                                            </div>
                                                                            <div class="control-group">
                                                                                <label class="control-label">Status Marital</label>
                                                                                <div class="controls">
                                                                                    <select tabindex="8" class="input-large" name="status_marital" id="status_marital">
                                                                                        <option value="1">Lajang</option>
                                                                                        <option value="2">Menikah</option>
                                                                                        <option value="3">Janda</option>
                                                                                        <option value="4">Duda</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div id="infomarital">
                                                                                <div class="control-group">
                                                                                    <label class="control-label">Nama Istri / Suami</label>
                                                                                    <div class="controls">
                                                                                        <input tabindex="9" type="text" class="input-large" name="nama_istri_suami">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="control-group">
                                                                                    <label class="control-label">Jumlah Anak</label>
                                                                                    <div class="controls">
                                                                                        <input tabindex="10" type="text" class="input-small" name="jumlah_anak"> Orang
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="span6 ">
                                                                            <h4>Identitas</h4>
                                                                            <hr>
                                                                            <div class="control-group">
                                                                                <label class="control-label">Jenis</label>
                                                                                <div class="controls">
                                                                                    <select tabindex="11" class="input-large" name="jenis_identitas">
                                                                                        <option value="1">KTP</option>
                                                                                        <option value="2">Paspor</option>
                                                                                        <option value="3">SIM</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="control-group">
                                                                                <label class="control-label">Nomor</label>
                                                                                <div class="controls">
                                                                                    <input tabindex="12" type="text" class="input-large" name="nomor_identitas">
                                                                                </div>
                                                                            </div>
                                                                            <div class="control-group">
                                                                                <label class="control-label">Berlaku Sampai</label>
                                                                                <div class="controls">
                                                                                    <input tabindex="13" type="text" size="16" class="m-wrap m-ctrl-medium date-picker" name="berlaku_identitas">
                                                                                </div>
                                                                            </div>
                                                                            <div class="control-group">
                                                                                <label class="control-label">Warga Negara</label>
                                                                                <div class="controls">
                                                                                    <select tabindex="14" class="input-large" name="warga_negara">
                                                                                        <option value="1">WNI</option>
                                                                                        <option value="2">WNA</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <h4>Waris</h4>
                                                                            <hr>
                                                                            <div class="control-group">
                                                                                <label class="control-label">Nama Waris</label>
                                                                                <div class="controls">
                                                                                    <input tabindex="15" type="text" class="input-large" name="nama_waris">
                                                                                </div>
                                                                            </div>
                                                                            <div class="control-group">
                                                                                <label class="control-label">Hubungan</label>
                                                                                <div class="controls">
                                                                                    <select tabindex="8" class="input-small" name="hubungan_waris" id="hubungan_waris">
                                                                                        <option value="0">----------------</option>
                                                                                        <option value="1">ANAK</option>
                                                                                        <option value="2">ISTRI</option>
                                                                                        <option value="3">SUAMI</option>
                                                                                        <option value="4">BAPAK KANDUNG</option>
                                                                                        <option value="5">BAPAK MERTUA</option>
                                                                                        <option value="6">IBU KANDUNG</option>
                                                                                        <option value="7">IBU MERTUA</option>
                                                                                        <option value="8">SAUDARA</option>
                                                                                        <option value="9">LAIN-LAIN</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="control-group">
                                                                                <label class="control-label">Jenis Identitas</label>
                                                                                <div class="controls">
                                                                                    <select tabindex="17" class="input-large" name="jenis_identitas_waris">
                                                                                        <option value="1">KTP</option>
                                                                                        <option value="2">Paspor</option>
                                                                                        <option value="3">SIM</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="control-group">
                                                                                <label class="control-label">Nomor Identital</label>
                                                                                <div class="controls">
                                                                                    <input tabindex="18" type="text" class="input-large" name="nomor_identitas_waris">
                                                                                </div>
                                                                            </div>
                                                                            <div class="control-group">
                                                                                <label class="control-label">Berlaku Sampai</label>
                                                                                <div class="controls">
                                                                                    <input tabindex="19" type="text" size="16" class="m-wrap m-ctrl-medium date-picker" name="berlaku_identitas_waris">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                 </div>
                                                                 <div class="tab-pane" id="tab2">
                                                                    <div class="row-fluid">
                                                                        <div class="span6 ">
                                                                            <h4>Alamat</h4>
                                                                            <hr>
                                                                            <div class="control-group">
                                                                                <label class="control-label">Alamat</label>
                                                                                <div class="controls">
                                                                                    <input tabindex="21" type="text" class="input-xlarge" name="alamat" id="alamat">
                                                                                </div>
                                                                            </div>
                                                                            <div class="control-group">
                                                                                <label class="control-label">RT / RW</label>
                                                                                <div class="controls">
                                                                                    <input tabindex="22" type="text" class="input-small" name="rtrw">
                                                                                </div>
                                                                            </div>
                                                                            <div class="control-group">
                                                                                <label class="control-label">Propinsi</label>
                                                                                <div class="controls">
                                                                                    <select tabindex="25" class="input-large" name="propinsi" id="propinsi">
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="control-group">
                                                                                <label class="control-label">Kabupaten</label>
                                                                                <div class="controls">
                                                                                    <select tabindex="25" class="input-large" name="kabupaten" id="kabupaten">
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="control-group">
                                                                                <label class="control-label">Kecamatan</label>
                                                                                <div class="controls">
                                                                                    <select tabindex="25" class="input-large" name="kecamatan" id="kecamatan">
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="control-group">
                                                                                <label class="control-label">Kode Pos</label>
                                                                                <div class="controls">
                                                                                    <input tabindex="24" type="text" class="input-small" name="kode_pos">
                                                                                </div>
                                                                            </div>
                                                                            
                                                                        </div>
                                                                        <div class="span6 ">
                                                                            <h4>Kontak Elektronik</h4>
                                                                            <hr>
                                                                            <div class="control-group">
                                                                                <label class="control-label">Telpon rumah</label>
                                                                                <div class="controls">
                                                                                    <input tabindex="41" type="text" class="input-medium" name="telpon_rumah">
                                                                                </div>
                                                                            </div>
                                                                            <div class="control-group">
                                                                                <label class="control-label">Telpon kantor</label>
                                                                                <div class="controls">
                                                                                    <input tabindex="42" type="text" class="input-medium" name="telpon_kantor">
                                                                                </div>
                                                                            </div>
                                                                            <div class="control-group">
                                                                                <label class="control-label">HP</label>
                                                                                <div class="controls">
                                                                                    <input tabindex="43" type="text" class="input-medium" name="hp">
                                                                                </div>
                                                                            </div>
                                                                            <div class="control-group">
                                                                                <label class="control-label">Email</label>
                                                                                <div class="controls">
                                                                                    <input tabindex="44" type="text" class="input-large" name="email">
                                                                                </div>
                                                                            </div>
                                                                            
                                                                        </div>
                                                                    </div>
                                                                 </div>
                                                                 <div class="tab-pane" id="tab3">
                                                                    <div class="row-fluid">
                                                                        <div class="span6 ">
                                                                            <h4>Pekerjaan (Karyawan)</h4>
                                                                            <hr>
                                                                            <div class="control-group">
                                                                                <label class="control-label">Nama Perusahaan</label>
                                                                                <div class="controls">
                                                                                    <input tabindex="21" type="text" class="input-xlarge" name="nama_perusahaan" id="nama_perusahaan">
                                                                                </div>
                                                                            </div>
                                                                            <div class="control-group">
                                                                                <label class="control-label">Bidang Pekerjaan</label>
                                                                                <div class="controls">
                                                                                    <select tabindex="35" class="input-large" name="bidang_pekerjaan">
                                                                                        <option value="0">----------------</option>
                                                                                        <option value="1">PERTANIAN, KEHUTANAN, DAN SARANA PERTANIAN</option>
                                                                                        <option value="2">PERTAMBANGAN</option>
                                                                                        <option value="3">INDUSTRI PENGOLAHAN</option>
                                                                                        <option value="4">LISTRIK, GAS, DAN AIR</option>
                                                                                        <option value="5">KONSTRUKSI</option>
                                                                                        <option value="6">PERDAGANGAN, RESTORAN, DAN HOTEL</option>
                                                                                        <option value="7">PENGANGKUTAN, PERGUDANGAN, DAN KOMUNIKASI</option>
                                                                                        <option value="8">JASA-JASA DUNIA USAHA</option>
                                                                                        <option value="9">JASA-JASA SOSIAL/MASYARAKAT</option>
                                                                                        <option value="10">LAIN-LAIN</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="control-group">
                                                                                <label class="control-label">Alamat</label>
                                                                                <div class="controls">
                                                                                    <input tabindex="21" type="text" class="input-xlarge" name="alamat_pekerjaan" id="alamat_pekerjaan">
                                                                                </div>
                                                                            </div>
                                                                            <div class="control-group">
                                                                                <label class="control-label">Propinsi</label>
                                                                                <div class="controls">
                                                                                    <select tabindex="25" class="input-large" name="propinsi_pekerjaan" id="propinsi_pekerjaan">
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="control-group">
                                                                                <label class="control-label">Kabupaten</label>
                                                                                <div class="controls">
                                                                                    <select tabindex="25" class="input-large" name="kabupaten_pekerjaan" id="kabupaten_pekerjaan">
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="control-group">
                                                                                <label class="control-label">Kecamatan</label>
                                                                                <div class="controls">
                                                                                    <select tabindex="25" class="input-large" name="kecamatan_pekerjaan" id="kecamatan_pekerjaan">
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="control-group">
                                                                                <label class="control-label">Kode Pos</label>
                                                                                <div class="controls">
                                                                                    <input tabindex="24" type="text" class="input-small" name="kode_pos_pekerjaan">
                                                                                </div>
                                                                            </div>
                                                                            
                                                                            <div class="control-group">
                                                                                <label class="control-label">Atasan Langsung</label>
                                                                                <div class="controls">
                                                                                    <input tabindex="21" type="text" class="input-xlarge" name="atasan_langsung" id="atasan_langsung">
                                                                                </div>
                                                                            </div>
                                                                            <div class="control-group">
                                                                                <label class="control-label">Posisi / Jabatan</label>
                                                                                <div class="controls">
                                                                                    <input tabindex="21" type="text" class="input-xlarge" name="posisi_jabatan" id="posisi_jabatan">
                                                                                </div>
                                                                            </div>
                                                                            <div class="control-group">
                                                                                <label class="control-label">Status Pekerjaan</label>
                                                                                <div class="controls">
                                                                                    <select tabindex="25" class="input-large" name="status_pekerjaan">
                                                                                        <option value="0">----------------</option>
                                                                                        <option value="1">PEGAWAI TETAP</option>
                                                                                        <option value="2">PEGAWAI KONTRAK</option>
                                                                                        <option value="3">LAIN - LAIN</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <h4>Penghasilan</h4>
                                                                            <hr>
                                                                            <div class="control-group">
                                                                                <label class="control-label">Penghasilan Tetap</label>
                                                                                <div class="controls">
                                                                                    <select tabindex="25" class="input-large" name="penghasilan_tetap">
                                                                                        <option value="0">----------------</option>
                                                                                        <option value="1">>0 - 200.000</option>
                                                                                        <option value="2">>200.000 - 500.000</option>
                                                                                        <option value="3">>500.000 - 1.000.000</option>
                                                                                        <option value="4">>1.000.000 - 2.000.000</option>
                                                                                        <option value="5">>2.000.000 - 5.000.000</option>
                                                                                        <option value="6">>5.000.000 - 10.000.000</option>
                                                                                        <option value="7">>10.000.000</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="control-group">
                                                                                <label class="control-label">Penghasilan tambahan</label>
                                                                                <div class="controls">
                                                                                    <select tabindex="25" class="input-large" name="penghasilan_tamb">
                                                                                        <option value="0">----------------</option>
                                                                                        <option value="1">>0 - 200.000</option>
                                                                                        <option value="2">>200.000 - 500.000</option>
                                                                                        <option value="3">>500.000 - 1.000.000</option>
                                                                                        <option value="4">>1.000.000 - 2.000.000</option>
                                                                                        <option value="5">>2.000.000 - 5.000.000</option>
                                                                                        <option value="6">>5.000.000 - 10.000.000</option>
                                                                                        <option value="7">>10.000.000</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="span6 ">
                                                                            <h4>Pekerjaan (Wiraswasta)</h4>
                                                                            <hr>
                                                                            <div class="control-group">
                                                                                <label class="control-label">Bidang Usaha</label>
                                                                                <div class="controls">
                                                                                    <select tabindex="35" class="input-large" name="bidang_usaha">
                                                                                        <option value="0">----------------</option>
                                                                                        <option value="1">PERTANIAN, KEHUTANAN, DAN SARANA PERTANIAN</option>
                                                                                        <option value="2">PERTAMBANGAN</option>
                                                                                        <option value="3">INDUSTRI PENGOLAHAN</option>
                                                                                        <option value="4">LISTRIK, GAS, DAN AIR</option>
                                                                                        <option value="5">KONSTRUKSI</option>
                                                                                        <option value="6">PERDAGANGAN, RESTORAN, DAN HOTEL</option>
                                                                                        <option value="7">PENGANGKUTAN, PERGUDANGAN, DAN KOMUNIKASI</option>
                                                                                        <option value="8">JASA-JASA DUNIA USAHA</option>
                                                                                        <option value="9">JASA-JASA SOSIAL/MASYARAKAT</option>
                                                                                        <option value="10">LAIN-LAIN</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="control-group">
                                                                                <label class="control-label">Saldo rata-rata /bln</label>
                                                                                <div class="controls">
                                                                                    <input tabindex="21" type="text" class="input-xlarge" name="usaha_saldoratarata" id="usaha_saldoratarata">
                                                                                </div>
                                                                            </div>
                                                                            <div class="control-group">
                                                                                <label class="control-label">Jumlah karyawan</label>
                                                                                <div class="controls">
                                                                                    <input tabindex="21" type="text" class="input-small" name="usaha_jlhkaryawan" id="usaha_jlhkaryawan">
                                                                                </div>
                                                                            </div>
                                                                            <div class="control-group">
                                                                                <label class="control-label">Pendapatan /tahun</label>
                                                                                <div class="controls">
                                                                                    <input tabindex="21" type="text" class="input-large" name="usaha_pendapatanpertahun" id="usaha_pendapatanpertahun">
                                                                                </div>
                                                                            </div>
                                                                            <div class="control-group">
                                                                                <label class="control-label">Nama pemilik</label>
                                                                                <div class="controls">
                                                                                    <input tabindex="21" type="text" class="input-large" name="usaha_pemilik" id="usaha_pemilik">
                                                                                </div>
                                                                            </div>
                                                                            <div class="control-group">
                                                                                <label class="control-label">Alamat</label>
                                                                                <div class="controls">
                                                                                    <input tabindex="21" type="text" class="input-xlarge" name="alamat_usaha" id="alamat_usaha">
                                                                                </div>
                                                                            </div>
                                                                            <div class="control-group">
                                                                                <label class="control-label">Propinsi</label>
                                                                                <div class="controls">
                                                                                    <select tabindex="25" class="input-large" name="propinsi_usaha" id="propinsi_usaha">
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="control-group">
                                                                                <label class="control-label">Kabupaten</label>
                                                                                <div class="controls">
                                                                                    <select tabindex="25" class="input-large" name="kabupaten_usaha" id="kabupaten_usaha">
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="control-group">
                                                                                <label class="control-label">Kecamatan</label>
                                                                                <div class="controls">
                                                                                    <select tabindex="25" class="input-large" name="kecamatan_usaha" id="kecamatan_usaha">
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="control-group">
                                                                                <label class="control-label">Kode Pos</label>
                                                                                <div class="controls">
                                                                                    <input tabindex="24" type="text" class="input-small" name="kode_pos_usaha">
                                                                                </div>
                                                                            </div>
                                                                            
                                                                        </div>
                                                                    </div>
                                                                 </div>
                                                                 <div class="tab-pane" id="tab4">
                                                                    <div class="row-fluid">
                                                                        <div class="span6 ">
                                                                            <h4>Pribadi</h4>
                                                                            <hr>
                                                                            <div class="control-group">
                                                                                <label class="control-label">Nama</label>
                                                                                <div class="controls">
                                                                                    <input tabindex="21" type="text" class="input-xlarge" name="nama_kerabat" id="nama_kerabat">
                                                                                </div>
                                                                            </div>
                                                                            <div class="control-group">
                                                                                <label class="control-label">Hubungan</label>
                                                                                <div class="controls">
                                                                                    <select tabindex="35" class="input-large" name="hubungan_kerabat">
                                                                                        <option value="0">----------------</option>
                                                                                        <option value="1">ANAK</option>
                                                                                        <option value="2">ISTRI</option>
                                                                                        <option value="3">SUAMI</option>
                                                                                        <option value="4">BAPAK KANDUNG</option>
                                                                                        <option value="5">BAPAK MERTUA</option>
                                                                                        <option value="6">IBU KANDUNG</option>
                                                                                        <option value="7">IBU MERTUA</option>
                                                                                        <option value="8">SAUDARA</option>
                                                                                        <option value="9">LAIN-LAIN</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <h4>Alamat</h4>
                                                                            <hr>
                                                                            <div class="control-group">
                                                                                <label class="control-label">Alamat</label>
                                                                                <div class="controls">
                                                                                    <input tabindex="21" type="text" class="input-xlarge" name="alamat_kerabat" id="alamat_kerabat">
                                                                                </div>
                                                                            </div>
                                                                            <div class="control-group">
                                                                                <label class="control-label">RT / RW</label>
                                                                                <div class="controls">
                                                                                    <input tabindex="32" type="text" class="input-small" name="rtrw_kerabat">
                                                                                </div>
                                                                            </div>
                                                                            <div class="control-group">
                                                                                <label class="control-label">Propinsi</label>
                                                                                <div class="controls">
                                                                                    <select tabindex="25" class="input-large" name="propinsi_kerabat" id="propinsi_kerabat">
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="control-group">
                                                                                <label class="control-label">Kabupaten</label>
                                                                                <div class="controls">
                                                                                    <select tabindex="25" class="input-large" name="kabupaten_kerabat" id="kabupaten_kerabat">
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="control-group">
                                                                                <label class="control-label">Kecamatan</label>
                                                                                <div class="controls">
                                                                                    <select tabindex="25" class="input-large" name="kecamatan_kerabat" id="kecamatan_kerabat">
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            
                                                                            <div class="control-group">
                                                                                <label class="control-label">Kode Pos</label>
                                                                                <div class="controls">
                                                                                    <input tabindex="24" type="text" class="input-small" name="kode_pos_kerabat">
                                                                                </div>
                                                                            </div>
                                                                            
                                                                        </div>
                                                                        <div class="span6 ">
                                                                            <h4>Kontak Elektronik</h4>
                                                                            <hr>
                                                                            <div class="control-group">
                                                                                <label class="control-label">Telpon rumah</label>
                                                                                <div class="controls">
                                                                                    <input tabindex="41" type="text" class="input-medium" name="telpon_rumah_kerabat">
                                                                                </div>
                                                                            </div>
                                                                            <div class="control-group">
                                                                                <label class="control-label">Telpon kantor</label>
                                                                                <div class="controls">
                                                                                    <input tabindex="42" type="text" class="input-medium" name="telpon_kantor_kerabat">
                                                                                </div>
                                                                            </div>
                                                                            <div class="control-group">
                                                                                <label class="control-label">HP</label>
                                                                                <div class="controls">
                                                                                    <input tabindex="43" type="text" class="input-medium" name="hp_kerabat">
                                                                                </div>
                                                                            </div>
                                                                            <div class="control-group">
                                                                                <label class="control-label">Email</label>
                                                                                <div class="controls">
                                                                                    <input tabindex="44" type="text" class="input-large" name="email_kerabat">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                 </div>
                                                              </div>
                                                              <div class="form-actions clearfix">
                                                                 <a href="javascript:;" class="btn button-previous">
                                                                 <i class="icon-angle-left"></i> Back 
                                                                 </a>
                                                                 <a href="javascript:;" class="btn btn-primary blue button-next">
                                                                 Continue <i class="icon-angle-right"></i>
                                                                 </a>
                                                                 <a href="javascript:;" class="btn btn-success button-submit">
                                                                 Simpan <i class="icon-ok"></i>
                                                                 </a>
                                                              </div>
                                                           </div>
                                                        </form>
                                                     </div>
                                                </div>
                                            </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
						</div>
					</div>
				</div>
        {% endblock page %}
