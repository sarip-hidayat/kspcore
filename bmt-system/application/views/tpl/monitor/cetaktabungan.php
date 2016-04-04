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
                                   <li class="active"><a href="#tabs-1" data-toggle="tab">Transaksi rekening tabungan</a></li>
                                   <li><a href="#tabs-2" data-toggle="tab">Cetak Sampul Tabungan</a></li>
                                   <li><a href="#tabs-3" data-toggle="tab">Cari rekening tabungan</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tabs-1">
                                        <div id="table_lap">
                                            <form class="form-horizontal" id="form_setor" method="post">
                                            <div>
                                                <div class="control-group fm-req">
                                                    <label class="control-label">No. Rekening</label>
                                                    <div class="controls">
                                                        <input id="nomor_rekening" name="nomor_rekening" tabindex="4" type="text" class="inp input-large"> <a class="btn searchact"><i class="icon-search"></i></a>
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
                                                Baris ke: <input name="baris" id="baris" type="text" class="input-small" value="0"> Tanggal :  <input class="tgl m-wrap m-ctrl-medium date-picker input-small" size="10" id="tgllap1"/>  s/d  <input class="tgl m-wrap m-ctrl-medium date-picker input-small" size="10" id="tgllap2"/>
                                                <button class="btn ui-state-default ui-corner-all" id="buatdaftar">Buat daftar</button>
                                                <p class="infonya"></p>
                                            </div>
                                            </form>
                                            <div style="width:100%;background:#fff">
                                                <table style="margin-left:2px;width:100%;color:#000">
                                                    <thead>
                                                        <tr>
                                                            <td style="text-align:left;border-bottom:1px solid #000;width:10%">NO</td>
                                                            <td style="text-align:center;border-bottom:1px solid #000">Tanggal</td>
                                                            <td style="text-align:center;border-bottom:1px solid #000;width:15%">Sandi</td>
                                                            <td style="text-align:right;border-bottom:1px solid #000;width:15%">Debet</td>
                                                            <td style="text-align:right;border-bottom:1px solid #000;width:15%">Kredit</td>
                                                            <td style="text-align:right;border-bottom:1px solid #000;width:15%">Saldo</td>
                                                            <td style="text-align:right;border-bottom:1px solid #000;width:15%">Petugas</td>
                                                        </tr>
                                                    </thead>
                                                </table>
                                                <div id="tlapcetak">
                                                    <table style="margin-left:2px;width:100%;color:#000">
                                                        <tbody></tbody>
                                                    </table>
                                                </div>
                                                <br/><br/>
                                                <div class="ui-grid-footer ui-widget-header ui-corner-bottom" align="right"><button class="ui-state-default ui-corner-all"><img src="assets/images/printer.png"> Cetak</button></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tabs-2">
                                    	<div id="table_lap1">
                                            <form class="form-horizontal" id="form_setor1" method="post">
                                            <div>
                                                <div class="control-group fm-req">
                                                    <label class="control-label">No. Rekening</label>
                                                    <div class="controls">
                                                        <input id="nomor_rekening1" name="nomor_rekening1" tabindex="4" type="text" class="inp input-large"> <a class="btn searchact1"><i class="icon-search"></i></a>
                                                    </div>
                                                </div>
                                                <hr>
                                            </div>
                                            </form>
                                            <div style="width:100%;background:#fff">
                                                <div id="kopcetak">
                                                    <table style="margin-left:2px;width:100%;color:#000">
                                                        <tbody></tbody>
                                                    </table>
                                                </div>
                                                <br><br>
                                                <div class="ui-grid-footer ui-widget-header ui-corner-bottom" align="right"><button class="ui-state-default ui-corner-all"><img src="assets/images/printer.png"> Cetak</button></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tabs-3">
                                        <div class="widget box blue">
                                            <div class="widget-title">
                                               <h4><i class="icon-reorder"></i> Data Tabungan</h4>
                                            </div>
                                            <div id="table_datatabungan">
{% set option = [{'t2.nama': 'Nama Nasabah'}, {'t2.nomor_rekening': 'Nomor Rekening'}] %}

{%
set tabel_head = [
    ['', '5%', 'No'],
    ['nomor_nasabah', '12%', 'Nomor Rekening'],
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

{% block footer %}
    {% embed "app/footer.php" %}{% endembed %}
    {% block footer_dialog %}
    <!-- Dialog Area -->
    <iframe name="ctkframe" id="ctkframe" style="width:0px;height:0px;border:0" src="monitor/cetaktabungan/cetak"></iframe>
    <iframe name="ctkframe1" id="ctkframe1" style="width:0px;height:0px;border:0" src="monitor/cetaktabungan/cetakkop"></iframe>
    {% endblock footer_dialog %}   	
{% endblock footer %}
