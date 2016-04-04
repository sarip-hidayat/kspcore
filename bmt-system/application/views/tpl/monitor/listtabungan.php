{% extends "tpl/tpl1.php" %}

        {% block breadcrumb %}
						<ul class="breadcrumb">
							<li>
								<i class="icon-home"></i>
								<a href="..">Home</a> 
								<i class="icon-angle-right"></i>
							</li>
							<li><a href="#">Monitor Tabungan</a></li>
						</ul>
        {% endblock breadcrumb %}

        {% block page %}
				<div id="page" class="dashboard">
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="tabbable tabbable-custom boxless">
                                <ul class="nav nav-tabs">
                                   <li class="active"><a href="#tabs-1" data-toggle="tab">Tabungan</a></li>
                                   <li><a href="#tabs-2" data-toggle="tab">Cari rekening tabungan</a></li>
                                   <li><a href="#tabs-3" data-toggle="tab">Data Tabungan</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tabs-1">
                                        <form class="form-horizontal" id="form_tabungan" method="post">
                                        <div class="span6 ">
                                            <div class="control-group fm-req">
                                                <label class="control-label">No. Rekening <span class="required">*</span></label>
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
                                                <label class="control-label">Kota</label>
                                                <div class="controls">
                                                    <input name="kota" tabindex="7" type="text" class="input-medium">
                                                    <!--<button class="btn btn-primary" id="showangsuran"><i class="icon-list"></i> Show</button>-->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="span11">
                                            <div id="tbllaptabdetail">
                                                <table style="width:100%;color:#000" border="0" bgcolor="#fff">
                                                    <thead>
                                                        <tr>
                                                            <td colspan="6" align="center" style="font-size: 18px;border-bottom:1px solid #000"><b>Tabungan<br><span id="bmttitle" style="font-size: 18px;"></b></span></td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="6" style="text-align:left;border-bottom:1px solid #000"><b><span id="nasabah"></span></b></td>
                                                        </tr>
                                                        <tr style="background:#F2F2F2;text-align:center;">
                                                        	<td style="border-top:1px solid #000"><b>Tgl Transaksi</b></td>
                                                        	<td style="border-top:1px solid #000"><b>No. Slip</b></td>
                                                        	<td style="border-top:1px solid #000"><b>Debet</b></td>
                                                        	<td style="border-top:1px solid #000"><b>Kredit</b></td>
                                                        	<td style="border-top:1px solid #000"><b>Saldo</b></td>
                                                        </tr>
                                                        </thead>
                                                    <tbody id="tb_view"></tbody>
                                                </table>
                                                </div>
                                                <br/><br/>
                                                <div class="ui-grid-footer ui-widget-header ui-corner-bottom ptabDatadetail" align="right"><button class="ui-state-default ui-corner-all"><img src="assets/images/printer.png"> Cetak</button></div>
                                         </div>
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
                                    <div class="tab-pane" id="tabs-3">
                                        <div class="widget box blue">
                                            <div id="table_viewp">
                                                <div class="filter ui-grid-header ui-widget-header ui-corner-top">
                                                    <p></p><select id="f" name="f">
                                                    	<option value="">--------</option>
                                                    	<option value="nama_pegawai">AO</option>
                                                    	<option value="nama">Nasabah</option>
                                                    	<option value="grouptabungan_nama">Nama produk</option>
                                                    	<input id="if" name="if" type="text" class="isi_filter input-xlarge" placeholder="Search">
                                                    </select>
                                                    Tgl mutasi :  <input class="tgl m-wrap m-ctrl-medium date-picker" size="10" id="tgl1" style="width:90px"/>  s/d  <input style="width:90px" class="tgl m-wrap m-ctrl-medium date-picker" size="10" id="tgl2"/>
                                                    <button class="cariDataTab ui-state-default ui-corner-all">SEARCH</button>
                                                    <p class="infonya"></p>
                                                </div>
                                                <br>
                                                <div id="tlaptabungan">
                                                <table style="width:100%;color:#000" border="0" bgcolor="#fff">
                                                    <thead>
                                                        <tr>
                                                            <td colspan="11" align="center" style="font-size: 18px;"><b>List Tabungan<br><span id="bmttitle" style="font-size: 18px;"></b></span></td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="11" style="text-align:left;border-bottom:1px solid #000"><b>Posisi Tanggal : <span id="isitgl"></span></b></td>
                                                        </tr>
                                                        </thead>
                                                        <tr style="text-align:center;background:#EFF1F1">
                                                            <td style="border-top:1px solid #000">Rekening</td>
                                                            <td style="border-top:1px solid #000">Nama</td>
                                                            <td style="border-top:1px solid #000">Produk</td>
                                                            <td style="border-top:1px solid #000">AO</td>
                                                            <td style="border-top:1px solid #000">Tgl buka</td>
                                                            <td style="border-top:1px solid #000">Alamat</td>
                                                            <td style="border-top:1px solid #000">Kota</td>
                                                            <td style="border-top:1px solid #000">Saldo</td>
                                                        </tr>
                                                        </thead>
                                                    <tbody id="tb_view1"></tbody>
                                                </table>
                                                </div>
                                                <br/><br/>
                                                <div class="ui-grid-footer ui-widget-header ui-corner-bottom ptabData" align="right"><button class="ui-state-default ui-corner-all"><img src="assets/images/printer.png"> Cetak</button></div>
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
        <iframe name="ctkframe" id="ctkframe" style="width:0px;height:0px;border:0" src="monitor/pembiayaan/cetak"></iframe>
    {% endblock footer_dialog %}   	
{% endblock footer %}
