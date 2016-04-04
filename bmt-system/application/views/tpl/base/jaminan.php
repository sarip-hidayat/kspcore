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
        {% endblock breadcrumb %}

        {% block page %}
				<div id="page" class="dashboard">
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="tabbable tabbable-custom boxless">
                                <ul class="nav nav-tabs">
                                   <li class="active"><a href="#tabs-1" data-toggle="tab">Data Jaminan</a></li>
                                   <li><a href="#tabs-2" data-toggle="tab">Jaminan Baru</a></li>
                                   <li><a href="#tabs-3" data-toggle="tab">Search Pembiayaan</a></li>
                                   <li><a href="#tabs-4" data-toggle="tab">Search Rekening Tabungan</a></li>
                                   <li><a href="#tabs-5" data-toggle="tab">Search Rekening Deposito</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tabs-1">
                                        <div class="widget box blue">
                                            <div class="widget-title">
                                               <h4><i class="icon-reorder"></i> Data Jaminan</h4>
                                            </div>
                                            <div id="table_datajaminan">

{% set option = [{'nama': 'Nama Nasabah'}] %}
{% set tombol = '<button id="addjaminan" class="fg-button ui-state-default ui-corner-all"><img src="'~ assets_path ~'/images/addicon.png" />Tambah Jaminan</button>' %}

{%
set tabel_head = [
    ['', '5%', 'No'],
    ['nomor_jaminan', '12%', 'Nomor Jaminan'],
    ['nomor_rekening', '12%', 'Nomor Rekening'],
    ['', '20%', 'Nama Nasabah'],
    ['', '25%', 'Jenis Jaminan'],
    ['', '10%', 'Nilai Jaminan'],
    ['', '5%', 'Manage'],
    ['jaminan_id', '5%', 'ID'],
]
%}

{% embed "app/filter_layout.php" %}{% endembed %}
{% embed "app/table_layout.php" %}{% endembed %}
{% embed "app/paging_layout.php" %}{% endembed %}

                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tabs-2">
                                        <div class="widget-body form">
                                            <form action="#" id="form_jamin" class="form-horizontal">
                                               <div class="alert alert-error hide">
                                                  <button class="close" data-dismiss="alert">×</button>
                                                  You have some form errors. Please check below.
                                               </div>
                                               <div class="alert alert-success hide">
                                                  <button class="close" data-dismiss="alert">×</button>
                                                  Your form validation is successful!
                                               </div>
                                               <div class="control-group">
                                                    <label class="control-label">No. Jaminan<span class="required">*</span></label>
                                                    <div class="controls">
                                                        <input name="nomor_jaminan" type="text" class="input-large" readonly>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label">Cari Nama Nasabah<span class="required">*</span></label>
                                                    <div class="controls">
                                                        <input name="nama" type="text" class="input-large">
                                                        <input name="nomor_rekening" type="hidden" class="input-large"> <a class="btn searchnasabah"><i class="icon-search"></i></a>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label"></label>
                                                    <div class="controls">
                                                        <input type="text" name="alamat" disabled="" placeholder="Alamat..." class="input-xlarge">
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label"></label>
                                                    <div class="controls">
                                                        <input type="text" name="kota" disabled="" placeholder="Kota..." class="input-large">
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label">Jenis Jaminan</label>
                                                    <div class="controls">
                                                        <select class="input-xlarge" name="Jenis_jaminan">
                                                             <option value="">--------------------------</option>
                                                             <option value="01">TABUNGAN</option>
                                                            <option value="02">DEPOSITO</option>
                                                            <option value="03">PERHIASAN EMAS DAN LOGAM MULIA</option>
                                                            <option value="04">TANAH DAN BANGUNAN</option>
                                                            <option value="05">KENDARAAN BERMOTOR</option>
                                                             <option value="06">DAN LAIN - LAIN</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label">Rekening Tabungan/Deposito</label>
                                                    <div class="controls">
                                                        <input name="rekening_tab_deposito" type="text" class="input-large"> <a class="btn searchrek"><i class="icon-search"></i></a>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label">Pemilik</label>
                                                    <div class="controls">
                                                        <input name="pemilik" type="text" class="input-large">
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label">No. Rek/BPKB/Sert.</label>
                                                    <div class="controls">
                                                        <input name="no_rek_bpkb_sert" type="text" class="input-large">
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label">STNK/HGB</label>
                                                    <div class="controls">
                                                        <input name="stnk_hgb" type="text" class="input-large">
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label">Luas Tanah</label>
                                                    <div class="controls">
                                                        <input name="luas_tanah" type="text" class="input-large">
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label">Lain - lain</label>
                                                    <div class="controls">
                                                        <input name="lain_lain" type="text" class="input-large">
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label">Nilai Jaminan<span class="required">*</span></label>
                                                    <div class="controls">
                                                        <input name="nilai_jaminan" type="text" class="input-large">
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label">Inspeksi Terakhir</label>
                                                    <div class="controls">
                                                        <input name="inspeksi_terakhir" type="text" size="16" class="m-wrap m-ctrl-medium date-picker">
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label">Oleh</label>
                                                    <div class="controls">
                                                        <input name="inspeksi_oleh" type="text" class="input-large"> 
                                                    </div>
                                                </div>
                                                <div id="info_nisbah" class="control-group">
                                                    <label class="control-label">Keterangan</label>
                                                    <div class="controls">
                                                        <textarea name="keterangan" rows="3" class="input-large"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-actions">
                                                  <button type="submit" class="btn btn-primary">Simpan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tabs-3">
                                        <div class="widget box blue">
                                            <div class="widget-title">
                                               <h4><i class="icon-reorder"></i> Nasabah</h4>
                                            </div>
                                            <div id="table_datanasabah">

{% set option = [{'nama': 'Nama Nasabah'}, {'nomor_rekening': 'Nomor Rekening'}] %}
{% set tombol = false %}

{%
set tabel_head = [
    ['', '5%', 'No'],
    ['nomor_rekening', '12%', 'Nomor Rekening'],
    ['', '15%', 'Jumlah'],
    ['', '20%', 'Nama Nasabah'],
    ['', '25%', 'Alamat'],
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
                                    <div class="tab-pane" id="tabs-4">
                                        <div class="widget box blue">
                                            <div class="widget-title">
                                               <h4><i class="icon-reorder"></i> Rekening Tabungan</h4>
                                            </div>
                                            <div id="table_datatabungan">

{% set option = [{'nama': 'Nama Nasabah'}, {'nomor_rekening': 'Nomor Rekening'}] %}
{% set tombol = false %}

{%
set tabel_head = [
    ['', '5%', 'No'],
    ['nomor_rekening', '12%', 'Nomor Rekening'],
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
                                    <div class="tab-pane" id="tabs-5">
                                        <div class="widget box blue">
                                            <div class="widget-title">
                                               <h4><i class="icon-reorder"></i> Rekening Deposito</h4>
                                            </div>
                                            <div id="table_deposito">

{% set option = [{'nama': 'Nama Nasabah'}, {'nomor_rekening': 'Nomor Rekening'}] %}
{% set tombol = false %}

{%
set tabel_head = [
    ['', '5%', 'No'],
    ['nomor_rekening', '10%', 'Nomor Rekening'],
    ['', '18%', 'Nama Nasabah'],
    ['', '20%', 'Produk Deposito'],
    ['', '15%', 'Nominal'],
    ['', '10%', 'Jatuh Tempo'],
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
                                </div>
						</div>
					</div>
				</div>
			</div>	
        {% endblock page %}
