{% extends "tpl/tpl1.php" %}

        {% block breadcrumb %}
						<ul class="breadcrumb">
							<li>
								<i class="icon-home"></i>
								<a href="..">Home</a> 
								<i class="icon-angle-right"></i>
							</li>
							<li><a href="#">Laba Rugi</a></li>
						</ul>
        {% endblock breadcrumb %}

        {% block page %}
				<div id="page" class="dashboard">
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="tabbable tabbable-custom boxless">
                                <ul class="nav nav-tabs">
                                   <li class="active"><a href="#tabs-1" data-toggle="tab">Laba rugi</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tabs-1">
                                        <div id="table_laplaba" class="ui-grid ui-widget ui-widget-content ui-corner-all">
                                            <div class="filter ui-grid-header ui-widget-header ui-corner-top">
                                                <select id="type" name="type" style="margin-bottom:0px;">
                                                    <option value="1">LAPORAN LABA RUGI</option>
                                                    <option value="2">LAPORAN LABA RUGI DETAIL</option>
                                                </select>
                                                Tanggal :  <input class="tgl m-wrap m-ctrl-medium date-picker" size="10" id="tgllap1"/>  s/d  <input class="tgl m-wrap m-ctrl-medium date-picker" size="10" id="tgllap2"/>
                                                <button class="ui-state-default ui-corner-all">Buat report</button>
                                                <p class="infonya"></p>
                                            </div>
                                            <div style="width:100%;background:#fff">
                                                <div id="tlaplaba">
                                                    <table style="margin-left:5px;width:99%;color:#000">
                                                        <thead>
                                                        <tr>
                                                            <td colspan="4" align="center" style="font-size: 18px;"><b>Laporan Laba Rugi <br><span id="bmttitle" style="font-size: 18px;"></b></span></td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="4" style="text-align:left;border-bottom:1px solid #000"><b>Posisi Tanggal : <span id="isitgl"></span></b></td>
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

{% block footer %}
    {% embed "app/footer.php" %}{% endembed %}
    {% block footer_dialog %}
        <!-- Dialog Area -->
        <iframe name="ctkframe" id="ctkframe" style="width:0px;height:0px;border:0" src="akunting/neraca/cetakneraca"></iframe>
    {% endblock footer_dialog %}
{% endblock footer %}
