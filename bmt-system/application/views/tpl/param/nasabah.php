{% extends "tpl/tpl1.php" %}

        {% block breadcrumb %}
						<ul class="breadcrumb">
							<li>
								<i class="icon-home"></i>
								<a href="..">Home</a> 
								<i class="icon-angle-right"></i>
							</li>
							<li><a href="#">Parameter Nasabah</a></li>
						</ul>
        {% endblock breadcrumb %}

        {% block page %}
				<div id="page" class="dashboard">
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="tabbable tabbable-custom boxless">
                                <ul class="nav nav-tabs">
                                   <li class="active"><a href="#tabs-1" data-toggle="tab">Sektor Pekerjaan / Bidang Usaha nasabah</a></li>
                                   <li><a href="#tabs-2" data-toggle="tab">Status Pekerjaan Nasabah</a></li>
                                   <li><a href="#tabs-3" data-toggle="tab">Range Pendapatan</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tabs-1">
                                        <div class="widget box blue">
                                            <div class="widget-title">
                                               <h4><i class="icon-reorder"></i>Sektor Pekerjaan / Bidang Usaha nasabah</h4>
                                            </div>
                                            <br>
                                            <div id="table_pekerjaan">
{% set option = [{'kode': 'Kode'}] %}
{% set tombol = '<button id="addpekerjaan" class="btn btn-success">Tambah Sektor Pekerjaan <i class="icon-plus"></i></button>' %}

{%
set tabel_head = [
    ['', '3%', 'No'],
    ['', '10%', 'Kode'],
    ['nama', '25%', 'Nama'],
    ['', '10%', 'Manage'],
    ['pekerjaan_id', '5%', 'ID'],
]
%}

{% embed "app/filter_layout.php" %}{% endembed %}
{% embed "app/table_layout.php" %}{% endembed %}
{% embed "app/paging_layout.php" %}{% endembed %}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tabs-2">
                                        <div class="widget box blue">
                                            <div class="widget-title">
                                               <h4><i class="icon-reorder"></i>Status Pekerjaan Nasabah</h4>
                                            </div>
                                            <br>
                                            <div id="table_status">
{% set option = [{'kode': 'Kode'}] %}
{% set tombol = '<button id="addstatus" class="btn btn-success">Tambah Status Pekerjaan <i class="icon-plus"></i></button>' %}

{%
set tabel_head = [
    ['', '3%', 'No'],
    ['', '10%', 'Kode'],
    ['nama', '25%', 'Nama'],
    ['', '10%', 'Manage'],
    ['pekerjaan_id', '5%', 'ID'],
]
%}

{% embed "app/filter_layout.php" %}{% endembed %}
{% embed "app/table_layout.php" %}{% endembed %}
{% embed "app/paging_layout.php" %}{% endembed %}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tabs-3">
                                        <div class="widget box blue">
                                            <div class="widget-title">
                                               <h4><i class="icon-reorder"></i>Range Pendapatan</h4>
                                            </div>
                                            <br>
                                            <div id="table_pendapatan">
{% set option = [{'kode': 'Kode'}] %}
{% set tombol = '<button id="addpendapatan" class="btn btn-success">Tambah Pendapatan <i class="icon-plus"></i></button>' %}

{%
set tabel_head = [
    ['', '3%', 'No'],
    ['', '10%', 'Kode'],
    ['range_pendapatan', '25%', 'Range'],
    ['', '10%', 'Manage'],
    ['pendapatan_id', '5%', 'ID'],
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
<div id="dialog-pekerjaan">
      <form id="form_pekerjaan" method="post">
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
<div id="dialog-status">
      <form id="form_status" method="post">
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
<div id="dialog-pendapatan">
      <form id="form_pendapatan" method="post">
        <fieldset>
		    <div class="fm-req">
		      <label for="kode">Kode :</label>
		      <input class="inp" name="kode"  type="text" maxlength="20"/>
		    </div>
		    <div class="fm-req">
		      <label for="range_pendapatan">Range :</label>
		      <input class="inp" name="range_pendapatan" type="text" maxlength="50" />
		    </div>
		    </fieldset>
		    <p class="infonya"></p>
    </form>
</div>
<div id="dialog-hapus-pendapatan">
      <br /><h3><img src="assets/images/question.png">&nbsp;Anda yakin <span class="phps"></span> akan dihapus ?</h3>
</div>
<div id="dialog-hapus-status">
      <br /><h3><img src="assets/images/question.png">&nbsp;Anda yakin <span class="phps"></span> akan dihapus ?</h3>
</div>
<div id="dialog-hapus-pekerjaan">
      <br /><h3><img src="assets/images/question.png">&nbsp;Anda yakin <span class="phps"></span> akan dihapus ?</h3>
</div>
    {% endblock footer_dialog %}   	
{% endblock footer %}
