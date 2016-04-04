{% extends "tpl/tpl1.php" %}

        {% block breadcrumb %}
						<ul class="breadcrumb">
							<li>
								<i class="icon-home"></i>
								<a href="..">Home</a> 
								<i class="icon-angle-right"></i>
							</li>
							<li><a href="#">Parameter Pembiayaan</a></li>
						</ul>
        {% endblock breadcrumb %}

        {% block page %}
				<div id="page" class="dashboard">
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="tabbable tabbable-custom boxless">
                                <ul class="nav nav-tabs">
                                   <li class="active"><a href="#tabs-1" data-toggle="tab">Produk Pembiayaan</a></li>
                                   <li><a href="#tabs-2" data-toggle="tab">Parameter Pembiayaan</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tabs-1">
                                        <div class="widget box blue">
                                            <div class="widget-title">
                                               <h4><i class="icon-reorder"></i>Produk Pembiayaan</h4>
                                            </div>
                                            <br>
                                            <div class="row-fluid">
                                                <div id="table_produk">
{% set option = [{'kode_produk': 'Kode', 'grouppembiayaan_nama': 'Nama'}] %}
{% set tombol = '<button id="addproduk" class="btn btn-success">Tambah Produk <i class="icon-plus"></i></button>' %}

{%
set tabel_head = [
    ['', '3%', 'No'],
    ['kode_produk', '10%', 'Kode'],
    ['', '25%', 'Nama'],
    ['', '10%', 'Manage'],
    ['grouppembiayaan_id', '5%', 'ID'],
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
                                               <h4><i class="icon-reorder"></i>Parameter Pembiayaan</h4>
                                            </div>
                                            <br>
                                            <div class="row-fluid">
                                                <form class="form-horizontal" id="form_mpembiayaan" method="post">
                                                    <div class="control-group">
                                                        <label class="control-label1">Kode Produk</label>
                                                        <div class="controls">
                                                            <input type="text" class="input-small m-wrap" id="kode_produk" name="kode_produk" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label1">GL Produk</label>
                                                        <div class="controls">
                                                            <select tabindex="5" class="input-xlarge" name="gl_produk">
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div id="idmurabahah">
                                                        <div class="control-group">
                                                            <label class="control-label1">Margin Ditangguhkan</label>
                                                            <div class="controls">
                                                                <select tabindex="5" class="input-xlarge" name="gl_marginditangguhkan">
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="control-group">
                                                            <label class="control-label1">Pendapatan Margin</label>
                                                            <div class="controls">
                                                                <select tabindex="5" class="input-xlarge" name="gl_pendapatanmargin">
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="idmudharabah">
                                                        <div class="control-group">
                                                            <label class="control-label1">Pendapatan bagi hasil</label>
                                                            <div class="controls">
                                                                <select tabindex="5" class="input-xlarge" name="gl_pendapatanbagihasil">
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="idalqardh">
                                                        <div class="control-group">
                                                            <label class="control-label1">Bonus Al-Qordh</label>
                                                            <div class="controls">
                                                                <select tabindex="5" class="input-xlarge" name="gl_bonusalqardh">
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="idmusyarokah">
                                                        <div class="control-group">
                                                            <label class="control-label1">Pendapatan bagi hasil</label>
                                                            <div class="controls">
                                                                <select tabindex="5" class="input-xlarge" name="gl_pendapatanbagihasilmusy">
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="idijarah">
                                                        <div class="control-group">
                                                            <label class="control-label1">Aktiva ijarah</label>
                                                            <div class="controls">
                                                                <select tabindex="5" class="input-xlarge" name="gl_activaijarah">
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="control-group">
                                                            <label class="control-label1">Pendapatan ijarah</label>
                                                            <div class="controls">
                                                                <select tabindex="5" class="input-xlarge" name="gl_pendapatanijarah">
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="idistishna">
                                                        <div class="control-group">
                                                            <label class="control-label1">Aset dalam penyelesaian</label>
                                                            <div class="controls">
                                                                <select tabindex="5" class="input-xlarge" name="gl_asetistishna">
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="control-group">
                                                            <label class="control-label1">Pendapatan marjin</label>
                                                            <div class="controls">
                                                                <select tabindex="5" class="input-xlarge" name="gl_pendapatanmarjinistishna">
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="control-group">
                                                            <label class="control-label1">Diskon</label>
                                                            <div class="controls">
                                                                <select tabindex="5" class="input-xlarge" name="gl_diskonistishna">
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="idsalam">
                                                        <div class="control-group">
                                                            <label class="control-label1">Pendapatan keuntungan</label>
                                                            <div class="controls">
                                                                <select tabindex="5" class="input-xlarge" name="gl_pendapatankeuntungansalam">
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-actions">
                                                        <button class="btn btn-primary" id="pembiayaansave"><i class="icon-ok"></i> Save</button>
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
		      <label for="grouppembiayaan_nama">Nama :</label>
		      <input class="inp" name="grouppembiayaan_nama" type="text" maxlength="50" />
		    </div>
		    </fieldset>
		    <p class="infonya"></p>
    </form>
</div>

    {% endblock footer_dialog %}   	
{% endblock footer %}
