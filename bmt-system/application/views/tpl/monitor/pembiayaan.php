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
                                   <li class="active"><a href="#tabs-1" data-toggle="tab">Transaksi rekening pembiayaan</a></li>
                                   <li><a href="#tabs-2" data-toggle="tab">Cari rekening pembiayaan</a></li>
                                   <li><a href="#tabs-3" data-toggle="tab">Data Pembiayaan</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tabs-1">
                                        <form class="form-horizontal" id="form_pembiayaan" method="post">
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
                                        <div class="span6">
                                            <hr>
                                            <div class="widget box blue">
                                                <div class="widget-title">
                                                   <h4><i class="icon-list"></i> Pencairan yang telah dilakukan</h4>
                                                </div>
                                                <table style="width:100%;color:#000" border="0" bgcolor="#fff">
                                                    <thead class="jdl">
                                                        <tr>
                                                            <td align=\"center\"><b>Kode</b></td>
                                                            <td align=\"center\"><b>Tanggal</b></td>
                                                            <td align=\"center\"><b>Jumlah</b></td>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tb_view"></tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="span11">
                                            <div id="tbllapangsuran">
                                                <table style="width:100%;color:#000" border="0" bgcolor="#fff">
                                                    <thead>
                                                        <tr>
                                                            <td colspan="2" align="center" style="font-size: 18px;border-bottom:1px solid #000"><b>Pembiayaan<br><span id="bmttitle" style="font-size: 18px;"></b></span></td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2" style="text-align:left;border-bottom:1px solid #000"><b><span id="nasabah"></span></b></td>
                                                        </tr>
                                                        </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td valign="top" width="30%">
                                                                <div>
                                                                    <table style="width:100%;color:#000" border="0" bgcolor="#fff">
                                                                        <thead>
                                                                        <tr style="background:#F2F2F2;text-align:center;">
                                                                            <td align=\"center\" colspan="4"><b>Jadwal angsuran</b></td>
                                                                        </tr>
                                                                        <tr style="background:#F2F2F2;text-align:center;">
                                                                            <td style="border-top:1px solid #000"><b>No</b></td>
                                                                            <td style="border-top:1px solid #000"><b>Tanggal</b></td>
                                                                            <td style="border-top:1px solid #000"><b>Jumlah</b></td>
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody id="tlist1"></tbody>
                                                                    </table>
                                                                </div>
                                                            </td>
                                                            <td valign="top" width="70%">
                                                                <div>
                                                                    <table style="width:100%;color:#000" border="0" bgcolor="#fff">
                                                                        <thead>
                                                                        <tr style="background:#F2F2F2;text-align:center;">
                                                                            <td align=\"center\" colspan="6"><b>Angsuran yang sudah dibayarkan</b></td>
                                                                        </tr>
                                                                        <tr style="background:#F2F2F2;text-align:center;">
                                                                            <td style="border-top:1px solid #000"><b>Tanggal</b></td>
                                                                            <td style="border-top:1px solid #000"><b>Nr.Slip</b></td>
                                                                            <td style="border-top:1px solid #000"><b>Outstanding</b></td>
                                                                            <td style="border-top:1px solid #000"><b>Pokok</b></td>
                                                                            <td style="border-top:1px solid #000"><b>Margin/Bagi hasil</b></td>
                                                                            <td style="border-top:1px solid #000"><b>Total</b></td>
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody id="tlist2"></tbody>
                                                                    </table>
                                                                </div>
                                                            </td>
                                                        <tr>
                                                    </tbody>
                                                </table>
                                                </div>
                                                <br/><br/>
                                                <div class="ui-grid-footer ui-widget-header ui-corner-bottom pcariDatadetail" align="right"><button class="ui-state-default ui-corner-all"><img src="assets/images/printer.png"> Cetak</button></div>
                                           
                                        </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane" id="tabs-2">
                                        <div class="widget box blue">
                                            <div class="widget-title">
                                               <h4><i class="icon-reorder"></i> Data pembiayaan</h4>
                                            </div>
                                            <div id="table_datapembiayaan">
{% set option = [{'nama': 'Nama Nasabah'}, {'nomor_rekening': 'Nomor Rekening'}] %}

{%
set tabel_head = [
    ['', '5%', 'No'],
    ['nomor_nasabah', '10%', 'No. Rekening'],
    ['', '18%', 'Nama Nasabah'],
    ['', '20%', 'Jenis Pembiayaan'],
    ['', '15%', 'Jumlah Pengajuan'],
    ['', '10%', 'Tgl Pengajuan'],
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
                                    <div class="tab-pane" id="tabs-3">
                                        <div class="widget box blue">
                                            <div id="table_viewp">
                                                <div class="filter ui-grid-header ui-widget-header ui-corner-top">
                                                    <p></p><select id="f" name="f">
                                                    	<option value="">--------</option>
                                                    	<option value="nama_pegawai">AO</option>
                                                    	<option value="nama">Nasabah</option>
                                                    	<input id="if" name="if" type="text" class="isi_filter input-xlarge" placeholder="Search">
                                                    </select>
                                                    Tanggal :  <input class="tgl m-wrap m-ctrl-medium date-picker" size="10" id="tgl1" style="width:90px"/>  s/d  <input style="width:90px" class="tgl m-wrap m-ctrl-medium date-picker" size="10" id="tgl2"/>
                                                    <button class="cariData ui-state-default ui-corner-all">SEARCH</button>
                                                    <p class="infonya"></p>
                                                </div>
                                                <br>
                                                <div id="tlappembiayaan">
                                                <table style="width:100%;color:#000" border="0" bgcolor="#fff">
                                                    <thead>
                                                        <tr>
                                                            <td colspan="11" align="center" style="font-size: 18px;"><b>Pembiayaan<br><span id="bmttitle" style="font-size: 18px;"></b></span></td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="11" style="text-align:left;border-bottom:1px solid #000"><b>Posisi Tanggal : <span id="isitgl"></span></b></td>
                                                        </tr>
                                                        </thead>
                                                        
                                                        <tr style="text-align:center;background:#EFF1F1">
                                                            <td style="border-top:1px solid #000" colspan="3">Nasabah</td>
                                                            <td style="border-top:1px solid #000" colspan="2">Waktu</td>
                                                            <td style="border-top:1px solid #000" colspan="3">Harga Jual</td>
                                                            <td style="border-top:1px solid #000;border-right:1px solid #000" colspan="3">Angsuran</td>
                                                        </tr>
                                                        <tr style="text-align:center;background:#EFF1F1">
                                                            <td style="border-top:1px solid #000">Rekening</td>
                                                            <td style="border-top:1px solid #000">Nama</td>
                                                            <td style="border-top:1px solid #000">AO</td>
                                                            <td style="border-top:1px solid #000">Mulai</td>
                                                            <td style="border-top:1px solid #000">Sampai</td>
                                                            <td style="border-top:1px solid #000">Pokok</td>
                                                            <td style="border-top:1px solid #000">Margin</td>
                                                            <td style="border-top:1px solid #000">Total</td>
                                                            <td style="border-top:1px solid #000">Pokok</td>
                                                            <td style="border-top:1px solid #000">Margin</td>
                                                            <td style="border-top:1px solid #000">Total</td>
                                                        </tr>
                                                        </thead>
                                                    <tbody id="tb_viewp"></tbody>
                                                </table>
                                                </div>
                                                <br/><br/>
                                                <div class="ui-grid-footer ui-widget-header ui-corner-bottom pcariData" align="right"><button class="ui-state-default ui-corner-all"><img src="assets/images/printer.png"> Cetak</button></div>
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
        <iframe name="ctkframe" id="ctkframe" style="width:0px;height:0px;border:0" src="monitor/pembiayaan/cetak"></iframe>
    {% endblock footer_dialog %}   	
{% endblock footer %}
