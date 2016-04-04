{% extends "tpl/tpl1.php" %}

        {% block breadcrumb %}
						<ul class="breadcrumb">
							<li>
								<i class="icon-home"></i>
								<a href="..">Home</a> 
								<i class="icon-angle-right"></i>
							</li>
							<li><a href="#">Monitor</a></li>
						</ul>
        {% endblock breadcrumb %}

        {% block page %}
				<div id="page" class="dashboard">
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="tabbable tabbable-custom boxless">
                                <ul class="nav nav-tabs">
                                   <li class="active"><a href="#tabs-1" data-toggle="tab">Aktivasi tabungan</a></li>
                                   <li><a href="#tabs-2" data-toggle="tab">Cari data tabungan</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tabs-1">
                                        <form class="form-horizontal" id="form_aktivasi" method="post">
                                        <div class="span6">
                                            <div class="control-group fm-req">
                                                <label class="control-label">No. Rekening tabungan <span class="required">*</span></label>
                                                <div class="controls">
                                                    <input name="nomor_rekening" tabindex="4" type="text" class="inp input-large"> <a class="btn searchact"><i class="icon-search"></i></a>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Nama</label>
                                                <div class="controls">
                                                    <input name="nama" tabindex="5" type="text" class="input-large">
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Alamat</label>
                                                <div class="controls">
                                                    <input name="alamat" tabindex="6" type="text" class="input-xlarge">
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Kota / Kode pos</label>
                                                <div class="controls">
                                                    <input name="kota" tabindex="7" type="text" class="input-large">
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Saldo</label>
                                                <div class="controls">
                                                    <input name="saldo" tabindex="9" type="text" class="input-large bold" readonly style="text-align: right;color:red;">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="span6 ">
                                            <div class="widget box blue">
                                                <div class="widget-title">
                                                   <h4><i class="icon-reorder"></i> Riwayat penonaktifan rekening</h4>
                                                </div>
                                                <table style="width:100%;color:#000" border="0" bgcolor="#fff">
                                                    <thead>
                                                        <tr>
                                                            <td align=\"center\"><b>Tanggal</b></td>
                                                            <td align=\"center\"><b>ref</b></td>
                                                            <td align=\"center\"><b>alasan</b></td>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tb_view"></tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="span11">
                                            <hr>
                                            <div class="control-group fm-req">
                                                <label class="control-label">Tanggal Proses</label>
                                                <div class="controls">
                                                    <input name="tgl_proses" tabindex="0" type="text" size="16" class="inp m-wrap m-ctrl-medium date-picker input-small">
                                                </div>
                                            </div>
                                            <div class="control-group fm-req">
                                                <label class="control-label">No. Ref </label>
                                                <div class="controls">
                                                    <input name="nomor_ref" tabindex="2" type="text" class="input-small">
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Alasan</label>
                                                <div class="controls">
                                                    <input name="alasan" tabindex="9" type="text" class="input-xlarge">
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Active</label>
                                                <div class="controls">
                                                    <input id="active" type="checkbox" checked="checked" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="span11 ">
                                            <div class="form-actions">
                                                <button class="btn btn-primary" id="save"><i class="icon-ok"></i> Save</button>
                                            </div>
                                            <p class="infonya"></p>
                                         </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane" id="tabs-2">
                                        <div class="widget box blue">
                                            <div class="widget-title">
                                               <h4><i class="icon-reorder"></i> Data Tabungan</h4>
                                            </div>
                                            <div id="table_datatabungan">

{% set option = [{'t2.nama': 'Nama Nasabah'}, {'t2.nomor_rekening': 'Nomor Rekening'}] %}

{%
set tabel_head = [
    ['', '5%', 'No'],
    ['nomor_rekening', '12%', 'Nomor Rekening'],
    ['', '20%', 'Nama Nasabah'],
    ['', '25%', 'Alamat'],
    ['', '10%', 'Kota'],
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
                            </div>
						</div>
					</div>
				</div>
			</div>	
        {% endblock page %}

