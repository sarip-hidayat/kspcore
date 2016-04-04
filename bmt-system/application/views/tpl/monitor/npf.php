{% extends "tpl/tpl1.php" %}

        {% block breadcrumb %}
						<ul class="breadcrumb">
							<li>
								<i class="icon-home"></i>
								<a href="..">Home</a> 
								<i class="icon-angle-right"></i>
							</li>
							<li><a href="#">Monitor NPF</a></li>
						</ul>
        {% endblock breadcrumb %}

        {% block page %}
				<div id="page" class="dashboard">
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="tabbable tabbable-custom boxless">
                                <ul class="nav nav-tabs">
                                   <li class="active"><a href="#tabs-1" data-toggle="tab">Penyesuaian NPF</a></li>
                                   <li><a href="#tabs-2" data-toggle="tab">Data Pembiayaan</a></li>
                                </ul>
                                <div class="tab-content">
                                	<div class="tab-pane active" id="tabs-1">
                                        <div class="span12">
                                            <table class="table table-hover">
                                                <tbody>
                                                    <tr>
                                                        <td>Penyesuaian data laporan NPF</td>
                                                        <td><span class="infoproses1"><img src="assets/images/loading.gif"> Proses...</span> <span class="ok1"><img src="assets/images/icontruechecklist.png"> OK</span></td>
                                                         <td align="right"><button class="btn btn-warning" id="aPembiayaan"><i class="icon-ok"></i> Proses</button></td>
                                                    </tr>
                                                    
                                                <tr>
                                                </tbody>
                                            </table>
                                            
                                            
                                        </div>
                                        
                                    </div>
                                    <div class="tab-pane" id="tabs-2">
                                        <div class="widget box blue">
                                            <div id="table_viewp">
                                                <div class="filter ui-grid-header ui-widget-header ui-corner-top">
                                                    <p></p><select id="f" name="f">
                                                    	<option value="">--------</option>
                                                    	<option value="nama_pegawai">AO</option>
                                                    	<option value="nama">Nasabah</option>
                                                    	<input id="if" name="if" type="text" class="isi_filter input-xlarge" placeholder="Search">
                                                    </select>
                                                    Tanggal :  <!-- <input class="tgl m-wrap m-ctrl-medium date-picker" size="10" id="tgl1" style="width:90px"/>  s/d  --><input style="width:90px" class="tgl m-wrap m-ctrl-medium date-picker" size="10" id="tgl2"/>
                                                    <button class="cariData ui-state-default ui-corner-all">SEARCH</button>&nbsp;&nbsp;&nbsp;<span class="infoproses"><img src="assets/images/loading.gif"> Proses...</span>
                                                    <p class="infonya"></p>
                                                </div>
                                                <br>
                                                <div id="tlappembiayaan">
                                                <table style="width:100%;color:#000" border="0" bgcolor="#fff">
                                                    <thead>
                                                        <tr>
                                                            <td colspan="16" align="center" style="font-size: 18px;"><b>Pembiayaan<br><span id="bmttitle" style="font-size: 18px;"></b></span></td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="16" style="text-align:left;border-bottom:1px solid #000"><b>Posisi Tanggal : <span id="isitgl"></span></b></td>
                                                        </tr>
                                                        </thead>
                                                        
                                                        <tr style="text-align:center;background:#EFF1F1">
                                                            <td style="border-top:1px solid #000;border-right:1px solid #000" colspan="3">Nasabah</td>
                                                            <td style="border-top:1px solid #000;border-right:1px solid #000" colspan="2">Waktu</td>
                                                            <td style="border-top:1px solid #000;border-right:1px solid #000" colspan="3">Pembiayaan</td>
                                                            <td style="border-top:1px solid #000;border-right:1px solid #000" colspan="3">Angsuran</td>
                                                            <td style="border-top:1px solid #000;border-right:1px solid #000" colspan="4">Setoran</td>
                                                            <td style="border-top:1px solid #000;border-right:1px solid #000" rowspan="2">KOL</td>
                                                        </tr>
                                                        <tr style="text-align:center;background:#EFF1F1">
                                                            <td style="border-top:1px solid #000;border-right:1px solid #000">Rekening</td>
                                                            <td style="border-top:1px solid #000;border-right:1px solid #000">Nama</td>
                                                            <td style="border-top:1px solid #000;border-right:1px solid #000">AO</td>
                                                            <td style="border-top:1px solid #000;border-right:1px solid #000">Mulai</td>
                                                            <td style="border-top:1px solid #000;border-right:1px solid #000">Sampai</td>
                                                            <td style="border-top:1px solid #000;border-right:1px solid #000">Pokok</td>
                                                            <td style="border-top:1px solid #000;border-right:1px solid #000">Margin</td>
                                                            <td style="border-top:1px solid #000;border-right:1px solid #000">Total</td>
                                                            <td style="border-top:1px solid #000;border-right:1px solid #000">Pokok</td>
                                                            <td style="border-top:1px solid #000;border-right:1px solid #000">Margin</td>
                                                            <td style="border-top:1px solid #000;border-right:1px solid #000">Total</td>
                                                            <td style="border-top:1px solid #000;border-right:1px solid #000">Outstanding</td>
                                                            <td style="border-top:1px solid #000;border-right:1px solid #000">Type</td>
                                                            <td style="border-top:1px solid #000;border-right:1px solid #000">Rencana</td>
                                                            <td style="border-top:1px solid #000;border-right:1px solid #000">Realisasi</td>
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
        <iframe name="ctkframe" id="ctkframe" style="width:0px;height:0px;border:0" src="monitor/npf/cetak"></iframe>
    {% endblock footer_dialog %}   	
{% endblock footer %}
