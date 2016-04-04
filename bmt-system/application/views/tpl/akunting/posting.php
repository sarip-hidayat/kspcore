{% extends "tpl/tpl1.php" %}

        {% block breadcrumb %}
						<ul class="breadcrumb">
							<li>
								<i class="icon-home"></i>
								<a href="..">Home</a> 
								<i class="icon-angle-right"></i>
							</li>
							<li><a href="#">Posting Jurnal</a></li>
						</ul>
        {% endblock breadcrumb %}

        {% block page %}
				<div id="page" class="dashboard">
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="tabbable tabbable-custom boxless">
                                <ul class="nav nav-tabs">
                                   <li class="active"><a href="#tabs-1" data-toggle="tab">Posting Transaksi</a></li>
                                   <li><a href="#tabs-2" data-toggle="tab">Koreksi Jurnal</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tabs-1">
                                        <div class="widget box blue">
                                            <div id="table_postingview">
                                                <div class="filter ui-grid-header ui-widget-header ui-corner-top">
                                                    <p></p>
                                                    Tanggal :  <input class="tgl m-wrap m-ctrl-medium date-picker" size="10" id="tgltrans1"/>  s/d  <input class="tgl m-wrap m-ctrl-medium date-picker" size="10" id="tgltrans2"/>
                                                    <button class="cariTrans ui-state-default ui-corner-all">SEARCH</button>
                                                    <p class="infonya"></p>
                                                </div>
                                                <br>
                                                <table style="width:100%;color:#000" border="0" bgcolor="#fff">
                                                    <thead class="jdl">
                                                        <tr style="text-align:center;background:#EFF1F1">
                                                            <td width="5%" style="border-top:1px solid #000">&nbsp;<input type="checkbox" id="selectall"/></td>
                                                            <td style="border-top:1px solid #000">Tanggal</td>
                                                            <td style="border-top:1px solid #000">Kode</td>
                                                            <td style="border-top:1px solid #000">Deskripsi</td>
                                                            <td style="border-top:1px solid #000">Nama akun</td>
                                                            <td style="border-top:1px solid #000">Debit</td>
                                                            <td style="border-top:1px solid #000">Kredit</td>
                                                        </tr>
                                                        </thead>
                                                    <tbody id="tb_view"></tbody>
                                                </table>
                                                <button class="delTrans btn btn-danger"><i class="icon-remove icon-white"></i> HAPUS</button>&nbsp;&nbsp;&nbsp;<button class="postingTrans btn btn-inverse"><i class="icon-refresh icon-white"></i> POSTING</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tabs-2">
                                        <div class="widget box blue">
                                            <div id="table_koreksiview">
                                                <div class="filter ui-grid-header ui-widget-header ui-corner-top">
                                                    <p></p>
                                                    Tanggal :  <input class="tgl m-wrap m-ctrl-medium date-picker" size="10" id="tgl1"/>  s/d  <input class="tgl m-wrap m-ctrl-medium date-picker" size="10" id="tgl2"/>
                                                    <button class="cariKoreksi ui-state-default ui-corner-all">SEARCH</button>
                                                    <p class="infonya"></p>
                                                </div>
                                                <br>
                                                <table style="width:100%;color:#000" border="0" bgcolor="#fff">
                                                    <thead class="jdl">
                                                        <tr style="text-align:center;background:#EFF1F1">
                                                            <td width="5%" style="border-top:1px solid #000">&nbsp;<input type="checkbox" id="selectall1"/></td>
                                                            <td style="border-top:1px solid #000">Tanggal</td>
                                                            <td style="border-top:1px solid #000">Kode</td>
                                                            <td style="border-top:1px solid #000">Deskripsi</td>
                                                            <td style="border-top:1px solid #000">Nama akun</td>
                                                            <td style="border-top:1px solid #000">Debit</td>
                                                            <td style="border-top:1px solid #000">Kredit</td>
                                                        </tr>
                                                        </thead>
                                                    <tbody id="tb_view1"></tbody>
                                                </table>
                                                <button class="delKoreksi btn btn-danger"><i class="icon-remove icon-white"></i> HAPUS</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
						</div>
					</div>
				</div>
        {% endblock page %}

