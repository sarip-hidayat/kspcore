{% extends "tpl/tpl1.php" %}

        {% block breadcrumb %}
						<ul class="breadcrumb">
							<li>
								<i class="icon-home"></i>
								<a href="..">Home</a> 
								<i class="icon-angle-right"></i>
							</li>
							<li><a href="#">Transaksi Kasanah</a></li>
						</ul>
        {% endblock breadcrumb %}

        {% block page %}
				<div id="page" class="dashboard">
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="tabbable tabbable-custom boxless">
                                <ul class="nav nav-tabs">
                                   <li class="active"><a href="#tabs-1" data-toggle="tab">Laporan Transaksi</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tabs-1">
                                        <form class="form-horizontal" id="form_reportteller" method="post">
                                        <div class="span12" id="table_lapteller">
                                            <!--<div class="control-group fm-req">
                                                <label class="control-label">Jumlah dana khasanah </label>
                                                <div class="controls">
                                                <input id="infodana" name="infodana" type="text" class="input-xlarge" style="text-align: right;" readonly>
                                                </div>
                                            </div>
                                            <hr>
                                            -->
                                            <div class="control-group fm-req">
                                                <label class="control-label">Tanggal transaksi </label>
                                                <div class="controls">
                                                <input class="tgl input-small date-picker" size="10" id="tgllap1"/>  s/d  <input class="tgl input-small date-picker" size="10" id="tgllap2"/>
                                                </div>
                                            </div>
                                            <div class="control-group fm-req">
                                                <label class="control-label">Teller</label>
                                                <div class="controls">
                                                    <select name="user" id="user"></select> <button class="btn btn-primary" id="showlap"><i class="icon-search"></i> Search</button> <span class="infoproses"><img src="assets/images/loading.gif"> Proses...</span>
                                                 <p class="infonya"></p>
                                                </div>
                                            </div>
                                            <div style="width:100%;background:#fff">
                                                <div id="tlaptransteller">
                                                    <table style="margin-left:5px;width:99%;color:#000">
                                                        <thead>
                                                        <tr>
                                                            <td colspan="7" style="text-align:left;"><b>Laporan transaksi teller</b></td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="7" style="text-align:right;"><b>Bulan : <span id="isitgllap"></span></b></td>
                                                        </tr>
                                                        <tr class="jdl" style="text-align:center;background:#EFF1F1">
                                                            <td width="8%" style="border-top:1px solid #000"><b>Tanggal</b></td>
                                                            <td width="8%" style="border-top:1px solid #000"><b>Waktu</b></td>
                                                            <td width="10%" style="border-top:1px solid #000"><b>Teller</b></td>
                                                            <td width="10%" style="border-top:1px solid #000"><b>Kode</b></td>
                                                            <td width="25%" style="border-top:1px solid #000"><b>Keterangan</b></td>
                                                            <td width="10%" style="border-top:1px solid #000"><b>Debit</b></td>
                                                            <td width="10%" style="border-top:1px solid #000"><b>Kredit</b></td>
                                                        </tr>
                                                        </thead>
                                                        <tbody></tbody>
                                                    </table>
                                                </div>
                                                <br/><br/>
                                                <div class="ui-grid-footer ui-widget-header ui-corner-bottom" align="right"><button class="ui-state-default ui-corner-all"><img src="assets/images/printer.png"> Cetak</button></div>
                                            </div>
                                        
                                        </div>
                                        
                                        </form>
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
        <iframe name="ctkframe" id="ctkframe" style="width:0px;height:0px;border:0" src="trans/reporttransaksi/cetakLapTeller"></iframe>
    {% endblock footer_dialog %}   	
{% endblock footer %}
