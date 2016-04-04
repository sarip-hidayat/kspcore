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
                                   <li class="active"><a href="#tabs-1" data-toggle="tab">Setor Tunai</a></li>
                                   <li><a href="#tabs-2" data-toggle="tab">Search</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tabs-1">
                                        <form class="form-horizontal" id="form_setortunai" method="post">
                                        <div class="span6 ">
                                            <div class="control-group fm-req">
                                                <label class="control-label">Tanggal Transaksi</label>
                                                <div class="controls">
                                                    <input name="tgl_transaksi" tabindex="0" type="text" size="16" class="inp m-wrap m-ctrl-medium date-picker input-small">
                                                </div>
                                            </div>

                                            <div class="control-group fm-req">
                                                <label class="control-label">No. Jurnal <span class="required">*</span></label>
                                                <div class="controls">
                                                    <input name="nomor_jurnal" tabindex="1" type="text" class="inp input-small">
                                                    <input name="id_jurnal" type="hidden">
                                                    <!--<input name="biaya_jurnal" type="hidden">-->
                                                </div>
                                            </div>
                                            <div class="control-group fm-req">
                                                <label class="control-label">No. Ref <span class="required">*</span></label>
                                                <div class="controls">
                                                    <input name="nomor_ref" tabindex="2" type="text" class="inp input-small">
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Wilayah Kerja</label>
                                                <div class="controls">
                                                    <select tabindex="3" class="inp input-large" name="wilayah_id"></select>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Saldo Rata - rata</label>
                                                <div class="controls">
                                                <input name="rata_rata" type="text" class="input-large bold" readonly style="text-align: right;color:green;">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="span6 ">
                                            <div class="control-group fm-req">
                                                <label class="control-label">No. Rekening tabungan <span class="required">*</span></label>
                                                <div class="controls">
                                                    <input name="nomor_rekening" tabindex="4" type="text" class="inp input-large"> <a class="btn searchact"><i class="icon-search"></i></a>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Nama</label>
                                                <div class="controls">
                                                    <input name="nama" tabindex="5" type="text" class="input-large">
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Alamat</label>
                                                <div class="controls">
                                                    <input name="alamat" tabindex="6" type="text" class="input-xlarge">
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Kota / Kode pos</label>
                                                <div class="controls">
                                                    <input name="kota" tabindex="7" type="text" class="input-large">
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Saldo</label>
                                                <div class="controls">
                                                    <input name="saldo" tabindex="9" type="text" class="input-large bold" readonly style="text-align: right;color:red;">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="span11">
                                            <hr>
                                            <div class="control-group fm-req">
                                                <label class="control-label">Jumlah <span class="required">*</span></label>
                                                <div class="controls">
                                                    <input name="jumlah" tabindex="9" type="text" class="inp input-large" style="text-align: right;">
                                                    
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label"></label>
                                                <div class="controls">
                                                    <span class="badge badge-inverse jumlahket"><b></b></span>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Terbilang : </label>
                                                <div class="controls">
                                                    <span id="terbilang" class="alert-info"></span>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Keterangan</label>
                                                <div class="controls">
                                                    <input name="ket" tabindex="9" type="text" class="input-xlarge">
                                                </div>
                                            </div><!--
                                            <div class="control-group">
                                                <label class="control-label">Biaya</label>
                                                <div class="controls">
                                                    <input name="biaya" tabindex="9" type="text" class="input-large" style="text-align: right;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <span class="badge badge-inverse biayaket"><b></b></span>
                                                </div>
                                            </div>-->
                                        </div>
                                        
                                        <div class="span11 ">
                                            <div class="form-actions">
                                                <button class="btn btn-primary" id="save"><i class="icon-ok"></i> Save</button>
                                            </div>
                                            <p class="infonya"></p>
                                         </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane" id="tabs-2">
                                        <div class="widget box blue">
                                            <div class="widget-title">
                                               <h4><i class="icon-reorder"></i> Data Tabungan</h4>
                                            </div>
                                            <div id="table_datatabungan">

{% set option = [{'t2.nama': 'Nama Nasabah'}, {'t2.nomor_rekening': 'Nomor Rekening'}] %}

{%
set tabel_head = [
    ['', '5%', 'No'],
    ['nomor_rekening', '7%', 'Nomor Rekening'],
    ['', '20%', 'Nama Nasabah'],
    ['', '25%', 'Alamat'],
    ['', '10%', 'Kota'],
    ['', '10%', 'Jenis Tab'],
    ['', '5%', 'Manage'],
    ['nasabah_id', '5%', 'ID'],
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

        {% block footer%}
            {% embed 'app/footer.php' %}
                {% block footer_dialog %}
                <!-- Dialog Area -->
                <iframe name="ctkframe" id="ctkframe" style="width:0px;height:0px;border:0" src="setortunai/cetakValidasi"></iframe>
                {% endblock footer_dialog %}
            {% endembed %}
        {% endblock footer%}
