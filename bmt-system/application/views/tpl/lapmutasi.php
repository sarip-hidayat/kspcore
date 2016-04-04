{% extends "tpl/tpl1.php" %}

        {% block breadcrumb %}
						<ul class="breadcrumb">
							<li>
								<i class="icon-home"></i>
								<a href="..">Home</a> 
								<i class="icon-angle-right"></i>
							</li>
							<li><a href="#">Transaksi Umum</a></li>
						</ul>
        {% endblock breadcrumb %}

        {% block page %}
				<div id="page" class="dashboard">
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="tabbable tabbable-custom boxless">
                                <ul class="nav nav-tabs">
                                   <li class="active"><a href="#tabs-1" data-toggle="tab">Laporan mutasi tabungan</a></li>
                                   <li><a href="#tabs-2" data-toggle="tab">Laporan mutasi deposito</a></li>
                                   <li><a href="#tabs-3" data-toggle="tab">Laporan mutasi pembiayaan</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tabs-1">
                                        <div id="table_laptab" class="ui-grid ui-widget ui-widget-content ui-corner-all">
                                            <div class="filter ui-grid-header ui-widget-header ui-corner-top">
                                                Tanggal :  <input class="tgl m-wrap m-ctrl-medium date-picker" size="10" id="tgllaptab1"/>  s/d  <input class="tgl m-wrap m-ctrl-medium date-picker" size="10" id="tgllaptab2"/>
                                                <button class="ui-state-default ui-corner-all">Lihat</button>
                                                <p class="infonya"></p>
                                            </div>
                                            <div style="width:100%;background:#fff">
                                                <div id="tlaptranstabungan">
                                                    <table style="margin-left:5px;width:99%;color:#000">
                                                        <thead>
                                                        <tr>
                                                            <td colspan="10"><h3>Laporan Transaksi Tabungan</h3></td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="10" style="text-align:right;"><b>Bulan : <span id="isitgltab"></span></b></td>
                                                        </tr>
                                                        <tr class="jdl" style="text-align:center;background:#EFF1F1">
                                                            <td width="5%"><b>No</b></td>
                                                            <td width="10%"><b>Rekening</b></td>
                                                            <td width="10%"><b>Nama</b></td>
                                                            <td width="15%"><b>Jenis tabungan</b></td>
                                                            <td width="10%"><b>Saldo awal</b></td>
                                                            <td width="10%"><b>Mutasi debet</b></td>
                                                            <td width="10%"><b>Mutasi kredit</b></td>
                                                            <td width="10%"><b>Saldo akhir</b></td>
                                                        </tr>
                                                        </thead>
                                                        <tbody></tbody>
                                                    </table>
                                                </div>
                                                <br/><br/>
                                                <div class="ui-grid-footer ui-widget-header ui-corner-bottom" align="right"><button class="ui-state-default ui-corner-all"><img src="assets/images/printer.png"> Cetak</button></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tabs-2">
                                        <div id="table_lapdeposito" class="ui-grid ui-widget ui-widget-content ui-corner-all">
                                            <div class="filter ui-grid-header ui-widget-header ui-corner-top">
                                                Tanggal :  <input class="tgl m-wrap m-ctrl-medium date-picker" size="10" id="tgllapdep1"/>  s/d  <input class="tgl m-wrap m-ctrl-medium date-picker" size="10" id="tgllapdep2"/>
                                                <button class="ui-state-default ui-corner-all">Lihat</button>
                                                <p class="infonya"></p>
                                            </div>
                                            <div style="width:100%;background:#fff">
                                                <div id="tlaptransdeposito">
                                                    <table style="margin-left:5px;width:99%;color:#000">
                                                        <thead>
                                                        <tr>
                                                            <td colspan="10"><h3>Laporan Transaksi Deposito</h3></td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="10" style="text-align:right;"><b>Bulan : <span id="isitgldep"></span></b></td>
                                                        </tr>
                                                        <tr class="jdl" style="text-align:center;background:#EFF1F1">
                                                            <td width="5%"><b>No</b></td>
                                                            <td width="10%"><b>Rekening</b></td>
                                                            <td width="10%"><b>Nama</b></td>
                                                            <td width="15%"><b>Nama deposito</b></td>
                                                            <td width="10%"><b>Saldo awal</b></td>
                                                            <td width="10%"><b>Mutasi debet</b></td>
                                                            <td width="10%"><b>Mutasi kredit</b></td>
                                                            <td width="10%"><b>Saldo akhir</b></td>
                                                        </tr>
                                                        </thead>
                                                        <tbody></tbody>
                                                    </table>
                                                </div>
                                                <br/><br/>
                                                <div class="ui-grid-footer ui-widget-header ui-corner-bottom" align="right"><button class="ui-state-default ui-corner-all"><img src="assets/images/printer.png"> Cetak</button></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tabs-3">
                                        <div id="table_lappemb" class="ui-grid ui-widget ui-widget-content ui-corner-all">
                                            <div class="filter ui-grid-header ui-widget-header ui-corner-top">
                                                Tanggal :  <input class="tgl m-wrap m-ctrl-medium date-picker" size="10" id="tgllappemb1"/>  s/d  <input class="tgl m-wrap m-ctrl-medium date-picker" size="10" id="tgllappemb2"/>
                                                <button class="ui-state-default ui-corner-all">Lihat</button>
                                                <p class="infonya"></p>
                                            </div>
                                            <div style="width:100%;background:#fff">
                                                <div id="tlaptranspemb">
                                                    <table style="margin-left:5px;width:99%;color:#000">
                                                        <thead>
                                                        <tr>
                                                            <td colspan="10"><h3>Laporan Transaksi Pembiayaan</h3></td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="10" style="text-align:right;"><b>Bulan : <span id="isitglpemb"></span></b></td>
                                                        </tr>
                                                        <tr class="jdl" style="text-align:center;background:#EFF1F1">
                                                            <td width="5%"><b>No</b></td>
                                                            <td width="10%"><b>Rekening</b></td>
                                                            <td width="10%"><b>Nama</b></td>
                                                            <td width="15%"><b>Jenis Pembiayaan</b></td>
                                                            <td width="10%"><b>Saldo awal</b></td>
                                                            <td width="10%"><b>Mutasi debet</b></td>
                                                            <td width="10%"><b>Mutasi kredit</b></td>
                                                            <td width="10%"><b>Saldo akhir</b></td>
                                                        </tr>
                                                        </thead>
                                                        <tbody></tbody>
                                                    </table>
                                                </div>
                                                <br/><br/>
                                                <div class="ui-grid-footer ui-widget-header ui-corner-bottom" align="right"><button class="ui-state-default ui-corner-all"><img src="assets/images/printer.png"> Cetak</button></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
					</div>
				</div>
        {% endblock page %}
