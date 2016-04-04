{% extends "tpl/tpl1.php" %}

        {% block breadcrumb %}
						<ul class="breadcrumb">
							<li>
								<i class="icon-home"></i>
								<a href="..">Home</a> 
								<i class="icon-angle-right"></i>
							</li>
							<li><a href="#">Parameter Wewenang</a></li>
						</ul>
        {% endblock breadcrumb %}

        {% block page %}
				<div id="page" class="dashboard">
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="tabbable tabbable-custom boxless">
                                <ul class="nav nav-tabs">
                                   <li class="active"><a href="#tabs-1" data-toggle="tab">Tentang BMT</a></li>
                                   <li><a href="#tabs-2" data-toggle="tab">Wilayah Kerja</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tabs-1">
                                        <div class="widget box blue">
                                            <div class="widget-title">
                                               <h4><i class="icon-reorder"></i>Identitas BMT</h4>
                                            </div>
                                            <br>
                                            <div class="row-fluid">
                                                <form class="form-horizontal" id="form_bmtinfo" method="post">
                                                    <div class="control-group">
                                                        <label class="control-label">Nama</label>
                                                        <div class="controls">
                                                            <input type="text" class="input-large" name="nama">
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label">Kode Cabang</label>
                                                        <div class="controls">
                                                            <input type="text" class="input-small" name="kode_cabang"> (2 digit)
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label">Alamat</label>
                                                        <div class="controls">
                                                            <input type="text" class="input-xlarge" name="alamat">
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label">Kota / Kode Pos</label>
                                                        <div class="controls">
                                                            <input type="text" class="input-medium" name="kota"> <input type="text" class="input-small" name="kode_pos">
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label">Propinsi</label>
                                                        <div class="controls">
                                                            <select tabindex="5" class="input-large" name="propinsi">
                                                                <option value=""></option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label">Wilayah kerja Kantor ini</label>
                                                        <div class="controls">
                                                            <select tabindex="5" class="input-large" name="wilayah_kerja">
                                                                <option value=""></option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-actions">
                                                        <button class="btn btn-primary" id="bmtsave"><i class="icon-ok"></i> Save</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tabs-2">
                                        <div class="widget box blue">
                                            <div class="widget-title">
                                               <h4><i class="icon-reorder"></i>Wilayah Kerja</h4>
                                            </div>
                                            <div id="table_bmt">
{% set option = [{'nama_wilayah': 'Nama Wilayah'}] %}
{% set tombol = '<button id="addwilayah" class="btn btn-success">Tambah Wilayah <i class="icon-plus"></i></button>' %}

{%
set tabel_head = [
    ['', '3%', 'No', '1'],
    ['', '10%', 'Kode', '1'],
    ['nama_wilayah', '25%', 'Nama Wilayah', '1'],
    ['', '10%', 'Manage', '1'],
    ['bmt_id', '5%', 'ID', '1'],
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
<div id="dialog-bmt">
      <form id="form_bmt" method="post">
        <fieldset>
		    <div class="fm-req">
		      <label for="kode">Kode :</label>
		      <input class="inp" name="kode"  type="text" maxlength="20"/>
		    </div>
		    <div class="fm-req">
		      <label for="wilayah_kerja">Wilayah Kerja :</label>
		      <input class="inp" name="wilayah_kerja" type="text" maxlength="50" />
		    </div>
		    </fieldset>
		    <p class="infonya"></p>
    </form>
</div>
<div id="dialog-hapus-bmt">
      <br /><h3><img src="assets/images/question.png">&nbsp;Anda yakin <span class="phps"></span> akan dihapus ?</h3>
</div>
    {% endblock footer_dialog %}   	
{% endblock footer %}
