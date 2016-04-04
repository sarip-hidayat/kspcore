{% extends "tpl/tpl1.php" %}

        {% block breadcrumb %}
						<ul class="breadcrumb">
							<li>
								<i class="icon-home"></i>
								<a href="..">Home</a> 
								<i class="icon-angle-right"></i>
							</li>
							<li><a href="#">Parameter Deposito</a></li>
						</ul>
        {% endblock breadcrumb %}

        {% block page %}
				<div id="page" class="dashboard">
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="tabbable tabbable-custom boxless">
                                <ul class="nav nav-tabs">
                                   <li class="active"><a href="#tabs-1" data-toggle="tab">Produk Deposito</a></li>
                                   <li><a href="#tabs-2" data-toggle="tab">Parameter Deposito</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tabs-1">
                                        <div class="widget box blue">
                                            <div class="widget-title">
                                               <h4><i class="icon-reorder"></i>Produk deposito</h4>
                                            </div>
                                            <br>
                                            <div class="row-fluid">
                                                <div id="table_produk">
{% set option = [{'kode_produk': 'Kode', 'groupdeposito_nama': 'Nama'}] %}
{% set tombol = '<button id="addproduk" class="btn btn-success">Tambah Produk <i class="icon-plus"></i></button>' %}

{%
set tabel_head = [
    ['', '3%', 'No'],
    ['kode_produk', '10%', 'Kode'],
    ['', '25%', 'Nama'],
    ['', '10%', 'Manage'],
    ['groupdeposito_id', '5%', 'ID'],
]
%}

{% embed "app/filter_layout.php" %}{% endembed %}
{% embed "app/table_layout.php" %}{% endembed %}
{% embed "app/paging_layout.php" %}{% endembed %}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tabs-2">
                                        <div class="widget box blue">
                                            <div class="widget-title">
                                               <h4><i class="icon-reorder"></i>Parameter deposito</h4>
                                            </div>
                                            <br>
                                            <div class="row-fluid">
                                                <form class="form-horizontal" id="form_mdeposito" method="post">
                                                    <div class="control-group">
                                                        <label class="control-label1">Kode Produk</label>
                                                        <div class="controls">
                                                            <input type="text" class="input-small m-wrap" id="kode_produk" name="kode_produk" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label1">Biaya Administrasi</label>
                                                        <div class="controls">
                                                            <input type="text" class="input-large m-wrap" name="biaya_administrasi" style="text-align: right;">
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label1">Nominal minimal</label>
                                                        <div class="controls">
                                                            <input type="text" class="input-large m-wrap" name="nominal" style="text-align: right;">
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label1">Janka waktu</label>
                                                        <div class="controls">
                                                            <input type="text" class="input-small m-wrap" name="jangka_waktu"> bulan
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label1">Nisbah (Bank : Nasabah)</label>
                                                        <div class="controls">
                                                            <input type="text" class="input-small m-wrap" name="nisbah_bank"> %  
                                                            <input type="text" class="input-small m-wrap" name="nisbah_nasabah"> %
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label1">PPH</label>
                                                        <div class="controls">
                                                            <input type="text" class="input-small m-wrap" name="pph" style="text-align: right;"> %
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label1">Zakat</label>
                                                        <div class="controls">
                                                            <input type="text" class="input-small m-wrap" name="zakat" style="text-align: right;"> %
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label1">GL Produk</label>
                                                        <div class="controls">
                                                            <select tabindex="5" class="input-xlarge" name="gl_produk">
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label1">GL bagi hasil</label>
                                                        <div class="controls">
                                                            <select tabindex="5" class="input-xlarge" name="gl_bagihasil">
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label1">GL titipan bagi hasil</label>
                                                        <div class="controls">
                                                            <select tabindex="5" class="input-xlarge" name="gl_titipanbagihasil">
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label1">GL Administrasi</label>
                                                        <div class="controls">
                                                            <select tabindex="5" class="input-xlarge" name="gl_administrasi">
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label1">Pajak penghasilan</label>
                                                        <div class="controls">
                                                            <select tabindex="5" class="input-xlarge" name="gl_pajakpenghasilan">
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label1">Zakat</label>
                                                        <div class="controls">
                                                            <select tabindex="5" class="input-xlarge" name="gl_zakat">
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-actions">
                                                        <button class="btn btn-primary" id="depositosave"><i class="icon-ok"></i> Save</button>
                                                    </div>
                                                </form>
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

<div id="dialog-produk">
      <form id="form_produk" method="post">
        <fieldset>
		    <div class="fm-req">
		      <label for="kode_produk">Kode :</label>
		      <input class="inp" name="kode_produk"  type="text" maxlength="20"/>
		    </div>
		    <div class="fm-req">
		      <label for="groupdeposito_nama">Nama :</label>
		      <input class="inp" name="groupdeposito_nama" type="text" maxlength="50" />
		    </div>
		    </fieldset>
		    <p class="infonya"></p>
    </form>
</div>

    {% endblock footer_dialog %}   	
{% endblock footer %}
