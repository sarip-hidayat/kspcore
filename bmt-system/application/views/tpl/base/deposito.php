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
                                   <li class="active"><a href="#tabs-1" data-toggle="tab">Data Deposito</a></li>
                                   <li><a href="#tabs-2" data-toggle="tab">Form Deposito</a></li>
                                   <li><a href="#tabs-3" data-toggle="tab">Search Nasabah</a></li>
                                   <li><a href="#tabs-4" data-toggle="tab">Search Tabungan</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tabs-1">
                                        <div class="widget box blue">
                                            <div class="widget-title">
                                               <h4><i class="icon-reorder"></i> Data deposito</h4>
                                            </div>
                                            <div id="table_deposito">

{% set option = [{'nama': 'Nama Nasabah'}, {'nomor_rekening': 'Nomor Rekening'}] %}
{% set tombol = '<button id="adddeposito" class="fg-button ui-state-default ui-corner-all"><img src="'~ assets_path ~'/images/addicon.png" />Tambah Deposito</button>' %}

{%
set tabel_head = [
    ['', '5%', 'No'],
    ['nomor_nasabah', '10%', 'Nomor Rekening'],
    ['', '18%', 'Nama Nasabah'],
    ['', '20%', 'Produk Deposito'],
    ['', '15%', 'Nominal'],
    ['', '10%', 'Jatuh Tempo'],
    ['', '5%', 'Manage'],
    ['deposito_id', '5%', 'ID'],
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
                                            <form class="form-horizontal" id="form_deposito" method="post">
                                                <input name="iddeposito" type="hidden">
                                                <div class="control-group">
                                                  <label class="control-label">Tanggal dibuka<span class="required">*</span></label>
                                                  <div class="controls">
                                                     <input name="tgl_dibuka" type="text" size="16" class="m-wrap m-ctrl-medium date-picker" readonly>
                                                  </div>
                                               </div>
                                                <div class="control-group">
                                                    <label class="control-label">No. deposito<span class="required">*</span></label>
                                                    <div class="controls">
                                                        <input name="nomor_rekening" type="text" class="inp input-large" readonly>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label">Nomor ref</label>
                                                    <div class="controls">
                                                        <input name="nomor_ref" type="text" class="input-large">
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label">Cari Nama Nasabah<span class="required">*</span></label>
                                                    <div class="controls">
                                                        <input name="nama" type="text" class="inp input-large">
                                                        <input name="nomor_nasabah" type="hidden" class="input-large"> <a class="btn searchnasabah"><i class="icon-search"></i></a>
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
                                                <hr>
                                                <div class="control-group">
                                                    <label class="control-label">Jenis deposito</label>
                                                    <div class="controls">
                                                        <select class="inp input-xlarge" name="nama_produk"></select>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label">Nomor bilyet</label>
                                                    <div class="controls">
                                                        <input name="nomor_bilyet" type="text" class="input-large">
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label">Nominal</label>
                                                    <div class="controls">
                                                        <input name="nominal" type="text" class="input-large">
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label">Jatuh tempo</label>
                                                    <div class="controls">
                                                        <input name="jatuh_tempo" type="text" size="16" class="m-wrap m-ctrl-medium date-picker">
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label">Sumber dana</label>
                                                    <div class="controls">
                                                        <input name="sumber_dana" type="text" class="input-large">
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label">Administrasi</label>
                                                    <div class="controls">
                                                        <select class="input-small" name="administrasi">
                                                            <option value="">------</option>
                                                            <option value="YA">YA</option>
                                                            <option value="TIDAK">TIDAK</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label">PPH</label>
                                                    <div class="controls">
                                                        <select class="input-small" name="pph">
                                                            <option value="">------</option>
                                                            <option value="YA">YA</option>
                                                            <option value="TIDAK">TIDAK</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label">Di Jaminkan</label>
                                                    <div class="controls">
                                                        <select class="input-small" name="dijaminkan">
                                                            <option value="">------</option>
                                                            <option value="YA">YA</option>
                                                            <option value="TIDAK">TIDAK</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label">Zakat</label>
                                                    <div class="controls">
                                                        <select class="input-small" name="zakat">
                                                            <option value="">-------------</option>
                                                            <option value="YA">YA</option>
                                                            <option value="TIDAK">TIDAK</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="control-group">
                                                    <label class="control-label">Nisbah tambahan</label>
                                                    <div class="controls">
                                                        <input name="nisbah_tambahan" type="text" class="input-small"> %
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label">Rekening basil</label>
                                                    <div class="controls">
                                                        <input name="rekening_basil" type="text" class="input-medium">
                                                        <input name="namatab" type="text" class="inp input-large">
                                                         <a class="btn searchrekening"><i class="icon-search"></i></a>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-actions">
                                                        <button class="btn btn-primary" id="savedata"><i class="icon-ok"></i> Save</button>
                                                    </div>
                                                <p class="infonya"></p>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tabs-3">
                                        <div class="widget box blue">
                                            <div class="widget-title">
                                               <h4><i class="icon-reorder"></i> Nasabah</h4>
                                            </div>
                                            <div id="table_datanasabah">

{% set option = [{'nama': 'Nama Nasabah'}, {'nomor_nasabah': 'Nomor Nasabah'}] %}
{% set tombol = false %}

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
                                    <div class="tab-pane" id="tabs-4">
                                        <div class="widget box blue">
                                            <div class="widget-title">
                                               <h4><i class="icon-reorder"></i> Data Tabungan</h4>
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
                                </div>
                            </div>
						</div>
					</div>
				</div>
        {% endblock page %}

