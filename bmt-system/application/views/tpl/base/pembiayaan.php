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
                                   <li class="active"><a href="#tabs-1" data-toggle="tab">Data Pembiayaan</a></li>
                                   <li><a href="#tabs-2" data-toggle="tab">Form Pembiayaan</a></li>
                                   <li><a href="#tabs-3" data-toggle="tab">Search AO</a></li>
                                   <li><a href="#tabs-4" data-toggle="tab">Search Nasabah</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tabs-1">
                                        <div class="widget box blue">
                                            <div class="widget-title">
                                               <h4><i class="icon-reorder"></i> Data pembiayaan</h4>
                                            </div>
                                            <div id="table_datapembiayaan">

{% set option = [{'nama': 'Nama Nasabah'}, {'nomor_rekening': 'Nomor Rekening'}] %}
{% set tombol = '<button id="addpembiayaan" class="fg-button ui-state-default ui-corner-all"><img src="'~ assets_path ~'/images/addicon.png" />Tambah Pembiayaan</button>' %}

{%
set tabel_head = [
    ['', '5%', 'No'],
    ['nomor_rekening', '10%', 'Nomor Rekening'],
    ['', '18%', 'Nama Nasabah'],
    ['', '20%', 'Jenis Pembiayaan'],
    ['', '15%', 'Jumlah Pengajuan'],
    ['', '10%', 'Tgl Pengajuan'],
    ['', '5%', 'Status'],
    ['', '5%', 'Manage'],
    ['pembiayaan_id', '5%', 'ID'],
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
                                            <form class="form-horizontal" id="form_pemb" method="post">
                                                <input name="id_pemb" id="id_pemb" type="hidden">
                                                <div class="control-group">
                                                  <label class="control-label">Tanggal dibuka<span class="required">*</span></label>
                                                  <div class="controls">
                                                     <input name="tgl_dibuka" type="text" size="16" class="m-wrap m-ctrl-medium date-picker" readonly>
                                                  </div>
                                               </div>
                                                <div class="control-group">
                                                    <label class="control-label">No. Pembiayaan<span class="required">*</span></label>
                                                    <div class="controls">
                                                        <input name="nomor_rekening" type="text" class="inp input-large" readonly>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label">AO<span class="required">*</span></label>
                                                    <div class="controls">
                                                        <input name="nomor_ao" type="hidden" class="inp input-large">
                                                        <input name="nomor_aoname" type="text" class="input-large"> <a class="btn searchfo"><i class="icon-search"></i></a>
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
                                                    <label class="control-label">Nomor Akad</label>
                                                    <div class="controls">
                                                        <input name="nomor_akad" type="text" class="input-large">
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label">Tanggal akad</label>
                                                    <div class="controls">
                                                        <input name="tgl_akad" type="text" size="16" class="m-wrap m-ctrl-medium date-picker">
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label">Jenis Pembiayaan</label>
                                                    <div class="controls">
                                                        <select class="inp input-xlarge" name="jenis_pembiayaan"></select>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label">Jumlah pengajuan</label>
                                                    <div class="controls">
                                                        <input name="jumlah_pengajuan" type="text" class="inp input-large">
                                                    </div>
                                                </div>
                                                <hr>
                                                <!--murabahah-->
                                                <div id="info_murabahah">
                                                    <div class="control-group">
                                                        <label class="control-label">Harga pokok</label>
                                                        <div class="controls">
                                                            <input name="harga_pokok" type="text" class="input-large">
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label">Marjin</label>
                                                        <div class="controls">
                                                            <input name="marjin" type="text" class="input-large">
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label">Harga jual</label>
                                                        <div class="controls">
                                                            <input name="harga_jual" type="text" class="input-large" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label">Uang muka</label>
                                                        <div class="controls">
                                                            <input name="uang_muka" type="text" class="input-large">
                                                        </div>
                                                    </div>
                                                    <hr>
                                                </div>
                                                <div id="info_mudharobah">
                                                    <div class="control-group">
                                                        <label class="control-label">Modal</label>
                                                        <div class="controls">
                                                            <input name="modal" type="text" class="input-large">
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label">Nisbah (Bank : Nasabah)</label>
                                                        <div class="controls">
                                                            <input name="nisbah_bank" type="text" class="input-small"> % / <input name="nisbah_nasabah" type="text" class="input-small"> %
                                                        </div>
                                                    </div>
                                                    <hr>
                                                </div>
                                                
                                                <div id="info_qordh">
                                                    <div class="control-group">
                                                        <label class="control-label">Pinjaman</label>
                                                        <div class="controls">
                                                            <input name="pinjaman" type="text" class="input-large">
                                                        </div>
                                                    </div>
                                                    <hr>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label">Lama angsuran</label>
                                                    <div class="controls">
                                                        <input name="lama_angsuran" type="text" class="input-small"> kali
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label">Type angsuran</label>
                                                    <div class="controls">
                                                        <select class="input-small" name="type_angsuran" id="type_angsuran">
                                                            <option value="HARI">HARI</option>
                                                            <option value="MINGGU">MINGGU</option>
                                                            <option value="BULAN">BULAN</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label">Mulai angsuran<span class="required">*</span></label>
                                                    <div class="controls">
                                                        <input name="mulai_angsuran" type="text" size="16" class="m-wrap m-ctrl-medium date-picker">
                                                        <input name="selesai_angsuran" type="hidden" size="16"> 
                                                        <button class="btn" id="buatjadwal"><i class="icon-list-ul"></i> Buat jadwal</button>
                                                    </div>
                                                </div>
                                                <div id="showangsuran"></div>
                                                <div class="control-group">
                                                    <label class="control-label">Status</label>
                                                    <div class="controls">
                                                        <select class="input-small" name="status">
                                                            <option value="0">Aktif</option>
                                                            <option value="1">Lunas</option>
                                                        </select>
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
                                               <h4><i class="icon-reorder"></i> Data FO</h4>
                                            </div>
                                            <div id="table_pegawai">

{% set option = [{'nama_pegawai': 'Nama Pegawai'}, {'nip': 'NIP'}, {'nama_jabatan': 'Jabatan'}, {'nama_panggilan': 'Panggilan'}] %}
{% set tombol = false %}

{%
set tabel_head = [
    ['', '5%', 'No', '1', ''],
    ['nama_pegawai', '10%', 'Nama', '1', ''],
    ['', '7%', 'Panggilan', '1', ''],
    ['', '20%', 'Alamat', '1', ''],
    ['nama_jabatan', '10%', 'Jabatan', '1', ''],
    ['', '7%', 'Manage', '1', ''],
    ['pegawai_id', '5%', 'ID', '1', ''],
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
                                </div>
                            </div>
						</div>
					</div>
				</div>
        {% endblock page %}
