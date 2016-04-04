{% extends "tpl/tpl1.php" %}

        {% block breadcrumb %}
						<ul class="breadcrumb">
							<li>
								<i class="icon-home"></i>
								<a href="..">Home</a> 
								<i class="icon-angle-right"></i>
							</li>
							<li><a href="#">Parameter Tabungan</a></li>
						</ul>
        {% endblock breadcrumb %}

        {% block page %}
				<div id="page" class="dashboard">
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="tabbable tabbable-custom boxless">
                                <ul class="nav nav-tabs">
                                   <li class="active"><a href="#tabs-1" data-toggle="tab">Produk Tabungan</a></li>
                                   <li><a href="#tabs-2" data-toggle="tab">Parameter Tabungan</a></li>
                                   <li><a href="#tabs-3" data-toggle="tab">Daftar kode mutasi tabungan</a></li>
                                   <li><a href="#tabs-4" data-toggle="tab">Daftar biaya pemeliharaan simpanan wadiah</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tabs-1">
                                        <div class="widget box blue">
                                            <div class="widget-title">
                                               <h4><i class="icon-reorder"></i>Produk Tabungan</h4>
                                            </div>
                                            <br>
                                            <div class="row-fluid">
                                                <div id="table_produk">
{% set option = [{'kode': 'Kode', 'nama': 'Nama'}] %}
{% set tombol = '<button id="addproduk" class="btn btn-success">Tambah Produk <i class="icon-plus"></i></button>' %}

{%
set tabel_head = [
    ['', '3%', 'No'],
    ['kode', '10%', 'Kode'],
    ['nama', '25%', 'Nama'],
    ['', '10%', 'Manage'],
    ['grouptabungan_id', '5%', 'ID'],
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
                                               <h4><i class="icon-reorder"></i>Parameter Tabungan</h4>
                                            </div>
                                            <br>
                                            <div class="row-fluid">
                                                <form class="form-horizontal" id="form_mtabungan" method="post">
                                                    <div class="control-group">
                                                        <label class="control-label1">Kode Produk</label>
                                                        <div class="controls">
                                                            <input type="text" class="input-small m-wrap" id="kode_produk" name="kode_produk" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label1">Adm lain - lain</label>
                                                        <div class="controls">
                                                            <input type="text" class="input-large m-wrap" name="adm_lain_lain" style="text-align: right;"> / bulan
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label1">PPH</label>
                                                        <div class="controls">
                                                            <input type="text" class="input-small m-wrap" name="tab_pph" style="text-align: right;"> %
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label1">Zakat</label>
                                                        <div class="controls">
                                                            <input type="text" class="input-small m-wrap" name="tab_zakat" style="text-align: right;"> %
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label1">GL produk</label>
                                                        <div class="controls">
                                                            <select tabindex="5" class="input-large" name="gl_produk">
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="control-group" id="idmudharabah">
                                                        <label class="control-label1">GL Bagi Hasil / Bonus</label>
                                                        <div class="controls">
                                                            <select tabindex="5" class="input-large" name="gl_bagihasil">
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label1">GL Pemeliharaan Simpanan Wadiah</label>
                                                        <div class="controls">
                                                            <select tabindex="5" class="input-large" name="gl_pemeliharaan">
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label1">GL Zakat</label>
                                                        <div class="controls">
                                                            <select tabindex="5" class="input-large" name="gl_zakat">
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label1">GL Pajak</label>
                                                        <div class="controls">
                                                            <select tabindex="5" class="input-large" name="gl_pajak">
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-actions">
                                                        <button class="btn btn-primary" id="tabungansave"><i class="icon-ok"></i> Save</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tabs-3">
                                        <div class="widget box blue">
                                            <div class="widget-title">
                                               <h4><i class="icon-reorder"></i>Daftar kode mutasi tabungan</h4>
                                            </div>
                                            <br>
                                            <div class="row-fluid">
                                                <div id="table_mutasi">
{% set option = [{'kode': 'Kode', 'nama': 'Nama'}] %}
{% set tombol = '<button id="addmutasi" class="btn btn-success">Tambah Kode Mutasi <i class="icon-plus"></i></button>' %}

{%
set tabel_head = [
    ['', '3%', 'No'],
    ['kode', '10%', 'Kode'],
    ['nama', '25%', 'Nama'],
    ['', '10%', 'Manage'],
    ['mutasi_id', '5%', 'ID'],
]
%}

{% embed "app/filter_layout.php" %}{% endembed %}
{% embed "app/table_layout.php" %}{% endembed %}
{% embed "app/paging_layout.php" %}{% endembed %}
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tabs-4">
                                        <div class="widget box blue">
                                            <div class="widget-title">
                                               <h4><i class="icon-reorder"></i>Daftar biaya pemeliharaan simpanan wadiah</h4>
                                            </div>
                                            <br>
                                            <div id="table_biaya">
{% set option = [{'kode': 'Kode'}] %}
{% set tombol = '<button id="addbiaya" class="btn btn-success">Tambah Biaya <i class="icon-plus"></i></button>' %}

{%
set tabel_head = [
    ['', '3%', 'No'],
    ['', '10%', 'Dana Maximal'],
    ['nama', '25%', 'Biaya Penitipan'],
    ['', '10%', 'Manage'],
    ['biaya_id', '5%', 'ID'],
]
%}

{% embed "app/filter_layout.php" %}{% endembed %}
{% embed "app/table_layout.php" %}{% endembed %}
{% embed "app/paging_layout.php" %}{% endembed %}
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
<div id="dialog-biaya">
      <form id="form_biaya" method="post">
        <fieldset>
		    <div class="fm-req">
		      <label for="kode">Dana maximal :</label>
		      <input class="inp" name="kode" type="text" id="mask_currency3" maxlength="20"/>
		    </div>
		    <div class="fm-req">
		      <label for="nama">Biaya penitipan :</label>
		      <input class="inp" name="nama" type="text" id="mask_currency4" maxlength="50" />
		    </div>
		    </fieldset>
		    <p class="infonya"></p>
    </form>
</div>
<div id="dialog-mutasi">
      <form id="form_mutasi" method="post">
        <fieldset>
		    <div class="fm-req">
		      <label for="kode">Kode :</label>
		      <input class="inp" name="kode"  type="text" maxlength="20"/>
		    </div>
		    <div class="fm-req">
		      <label for="nama">Nama :</label>
		      <input class="inp" name="nama" type="text" maxlength="50" />
		    </div>
		    </fieldset>
		    <p class="infonya"></p>
    </form>
</div>
<div id="dialog-produk">
      <form id="form_produk" method="post">
        <fieldset>
		    <div class="fm-req">
		      <label for="kode_produk">Kode :</label>
		      <input class="inp" name="kode_produk"  type="text" maxlength="20"/>
		    </div>
		    <div class="fm-req">
		      <label for="grouptabungan_nama">Nama :</label>
		      <input class="inp" name="grouptabungan_nama" type="text" maxlength="50" />
		    </div>
		    </fieldset>
		    <p class="infonya"></p>
    </form>
</div>


<div id="dialog-hapus-mutasi">
      <br /><h3><img src="assets/images/question.png">&nbsp;Anda yakin <span class="phps"></span> akan dihapus ?</h3>
</div>
<div id="dialog-hapus-biaya">
      <br /><h3><img src="assets/images/question.png">&nbsp;Anda yakin <span class="phps"></span> akan dihapus ?</h3>
</div>
    {% endblock footer_dialog %}   	
{% endblock footer %}
