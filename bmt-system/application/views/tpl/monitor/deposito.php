{% extends "tpl/tpl1.php" %}

        {% block breadcrumb %}
						<ul class="breadcrumb">
							<li>
								<i class="icon-home"></i>
								<a href="..">Home</a> 
								<i class="icon-angle-right"></i>
							</li>
							<li><a href="#">Monitor Deposito</a></li>
						</ul>
        {% endblock breadcrumb %}

        {% block page %}
				<div id="page" class="dashboard">
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="tabbable tabbable-custom boxless">
                                <ul class="nav nav-tabs">
                                   <li class="active"><a href="#tabs-1" data-toggle="tab">Data Deposito</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tabs-1">
                                        <div class="widget box blue">
                                            <div id="table_viewp">
                                                <div class="filter ui-grid-header ui-widget-header ui-corner-top">
                                                    <p></p><select id="f" name="f">
                                                    	<option value="">--------</option>
                                                    	<option value="nama">Nasabah</option>
                                                    	<option value="groupdeposito_nama">Nama produk</option>
                                                    	<input id="if" name="if" type="text" class="isi_filter input-xlarge" placeholder="Search">
                                                    </select>
                                                    Tgl mutasi :  <input class="tgl m-wrap m-ctrl-medium date-picker" size="10" id="tgl1" style="width:90px"/>  s/d  <input style="width:90px" class="tgl m-wrap m-ctrl-medium date-picker" size="10" id="tgl2"/>
                                                    <button class="cariDataDep ui-state-default ui-corner-all">SEARCH</button>
                                                    <p class="infonya"></p>
                                                </div>
                                                <br>
                                                <div id="tlapdeposito">
                                                <table style="width:100%;color:#000" border="0" bgcolor="#fff">
                                                    <thead>
                                                        <tr>
                                                            <td colspan="11" align="center" style="font-size: 18px;"><b>List Deposito<br><span id="bmttitle" style="font-size: 18px;"></b></span></td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="11" style="text-align:left;border-bottom:1px solid #000"><b>Posisi Tanggal : <span id="isitgl"></span></b></td>
                                                        </tr>
                                                        </thead>
                                                        <tr style="text-align:center;background:#EFF1F1">
                                                            <td style="border-top:1px solid #000">Rekening</td>
                                                            <td style="border-top:1px solid #000">Nama</td>
                                                            <td style="border-top:1px solid #000">Produk</td>
                                                            <td style="border-top:1px solid #000">Tgl buka</td>
                                                            <td style="border-top:1px solid #000">Jatuh tempo</td>
                                                            <td style="border-top:1px solid #000">Alamat</td>
                                                            <td style="border-top:1px solid #000">Kota</td>
                                                            <td style="border-top:1px solid #000">Nominal</td>
                                                        </tr>
                                                        </thead>
                                                    <tbody id="tb_view1"></tbody>
                                                </table>
                                                </div>
                                                <br/><br/>
                                                <div class="ui-grid-footer ui-widget-header ui-corner-bottom pdeData" align="right"><button class="ui-state-default ui-corner-all"><img src="assets/images/printer.png"> Cetak</button></div>
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
