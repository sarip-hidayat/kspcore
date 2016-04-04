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
                                   <li class="active"><a href="#tabs-1" data-toggle="tab">Users</a></li>
                                   <li ><a href="#tabs-2" data-toggle="tab">Pegawai</a></li>
                                   <li><a href="#tabs-3" data-toggle="tab">Jabatan</a></li>
                                   <li><a href="#tabs-4" data-toggle="tab">Otoritas penarikan tunai</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tabs-1">
                                        <div class="widget box blue">
                                            <div class="widget-title">
                                               <h4><i class="icon-reorder"></i>Users</h4>
                                            </div>
                                            <div id="table_user">
{% set option = [{'nama_pegawai': 'Nama Pegawai', 'username': 'Username'}] %}
{% set tombol = '<button id="adduser" class="fg-button ui-state-default ui-corner-all">Tambah User <i class="icon-plus"></i></button>' %}

{%
set tabel_head = [
    ['', '3%', 'No', '1'],
    ['nip', '7%', 'NIP', '1'],
    ['nama_pegawai', '25%', 'Nama', '1'],
    ['Username', '15%', 'Panggilan', '1'],
    ['active', '5%', 'Tempat', '1'],
    ['nama_group', '15%', 'Tanggal', '1'],
    ['last_login', '15%', 'Alamat', '1'],
    ['', '10%', 'Manage', '1'],
    ['user_id', '30px', 'ID', '1'],
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
                                               <h4><i class="icon-reorder"></i>Pegawai</h4>
                                            </div>
                                            <div id="table_pegawai">
{% set option = [{'nama_pegawai': 'Nama Pegawai', 'nip': 'NIP', 'nama_jabatan': 'Jabatan', 'nama_panggilan': 'Panggilan'}] %}
{% set tombol = '<button id="addpeg" class="fg-button ui-state-default ui-corner-all"><img src="assets/images/addicon.png" />Tambah Pegawai</button>' %}

{%
set tabel_head = [
    ['', '5%', 'No', '1', 'rowspan="1"'],
    ['nip', '8%', 'NIP', '1', 'rowspan="1"'],
    ['nama_pegawai', '10%', 'Nama', '1', 'rowspan="1"'],
    ['nama_panggilan', '7%', 'Panggilan', '1', 'rowspan="1"'],
    ['tpt_lhr', '5%', 'Tempat', '1', 'rowspan="1"'],
    ['tgl_lahir', '5%', 'Tanggal', '1', 'rowspan="1"'],
    ['', '20%', 'Alamat', '1', 'rowspan="1"'],
    ['nama_jabatan', '10%', 'Jabatan', '1', 'rowspan="1"'],
    ['', '7%', 'Manage', '1', 'rowspan="1"'],
    ['pegawai_id', '5%', 'ID', '1', 'rowspan="1"'],
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
                                               <h4><i class="icon-reorder"></i>Jabatan</h4>
                                            </div>
                                            <div id="table_jabatan">
{% set option = [{'nama_jabatan': 'Nama Jabatan'}] %}
{% set tombol = '<button id="addjabatan" class="fg-button ui-state-default ui-corner-all"><img src="assets/images/addicon.png" />Tambah Jabatan</button>' %}

{%
set tabel_head = [
    ['', '5%', 'No'],
    ['nama_jabatan', '20%', 'Nama Jabatan'],
    ['', '15%', 'Keterangan'],
    ['', '5%', 'Manage'],
    ['jabatan_id', '5%', 'ID'],
]
%}

{% embed "app/filter_layout.php" %}{% endembed %}
{% embed "app/table_layout.php" %}{% endembed %}
{% embed "app/paging_layout.php" %}{% endembed %}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tabs-4">
                                       <div class="widget box blue">
                                            <div class="widget-title">
                                               <h4><i class="icon-reorder"></i>Otoritas penarikan tunai</h4>
                                            </div>
                                            <br>
                                            <div id="table_otoritas">
{% set option = [{'kode': 'Kode'}] %}
{% set tombol = '<button id="addotoritas" class="fg-button ui-state-default ui-corner-all"><img src="assets/images/addicon.png" />Tambah Otoritas</button>' %}

{%
set tabel_head = [
    ['', '3%', 'No'],
    ['', '10%', 'Dana Maximal'],
    ['nama', '25%', 'Otoritas Level'],
    ['', '10%', 'Manage'],
    ['otoritas_id', '5%', 'ID'],
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
<div id="dialog-user">
      <form id="form_user" method="post">
        <fieldset>
		    <div class="fm-req">
		      <label for="username">Username :</label>
		      <input class="inp" name="username"  type="text" maxlength="20"/>
		    </div>
		    <div class="fm-req">
		      <label for="password">Password :</label>
		      <input class="inp" name="password" type="password" maxlength="20"/>
		    </div>
		    <div class="fm-req">
		      <label for="password2">Ulangi Password :</label>
		      <input class="inp" type="password" maxlength="20"/>
		    </div>
		    <div class="fm-req">
		      <label for="nip">NIP :</label>
		      <input class="inp" type="text" maxlength="20"/>
		    </div>
		    <div class="fm-req">
		      <label for="nama">Nama Pegawai :</label>
		      <input class="inp" type="text" maxlength="50" />
		    </div>
		    <div class="fm-req">
		      <label for="group">Group :</label>
		      <select name="id_group" class="input-small">
			  </select>
		    </div>
		    <div class="fm-opt">
		      <label for="active">Aktif :</label>
		      <input type="checkbox" id="CTBaktif" name="active"/>
		    </div>
            <input type="hidden" name="id_pegawai" maxlength="20"/>
		  </fieldset>
		    <p class="infonya"></p>
    </form>
</div>
<div id="dialog-pegawai">
      <form id="form_pegawai" method="post">
        <fieldset>
            <div class="fm-req">
              <label>NIP :</label>
              <input class="inp" maxlength="20" name="nip"  type="text" />
            </div>
            <div class="fm-req">
              <label>Jabatan :</label>
              <select name="id_jabatan"></select>
            </div>
            <div class="fm-req">
              <label>Nama :</label>
              <input class="inp" maxlength="50" name="nama_pegawai"  type="text" />
            </div>
            <div class="fm-req">
              <label>Nama Panggilan :</label>
              <input class="inp" maxlength="10" name="nama_panggilan"  type="text" />
            </div>
            <div class="fm-req">
              <label>Tempat Lahir :</label>
              <input class="inp" maxlength="50" name="tpt_lhr"  type="text" />
            </div>
            <div class="fm-req">
              <label>Tanggal Lahir :</label>
              <input class="inp tgl" maxlength="10" name="tgl_lhr"  type="text" style="width:70px" />
            </div>
            <div class="fm-req">
              <label>Jenis Kelamin :</label>
              <select name="jns_klmn">
                <option value="1">Pria</option>
                <option value="2">Wanita</option>
              </select>
            </div>
            <div class="fm-req">
              <label>Agama :</label>
              <select name="agama">
                <option value="1">Islam</option>
                <option value="2">Keristen</option>
                <option value="3">Budha</option>
                <option value="4">Hindu</option>
                <option value="5">Lainnya</option>
              </select>
            </div>
            <div class="fm-req">
              <label>Status :</label>
              <select name="status">
                <option value="1">Belum Menikah</option>
                <option value="2">Menikah</option>
                <option value="3">Duda</option>
                <option value="4">Janda</option>
              </select>
            </div>
            <div class="fm-req">
              <label>Alamat :</label>
              <textarea class="inp" name="alamat"></textarea>
            </div>
            <div class="fm-req">
              <label>Kota :</label>
              <input class="inp" maxlength="50" name="kota"  type="text" />
            </div>
            <div class="fm-opt">
              <label>Telp :</label>
              <input class="inp" maxlength="20" name="telepon"  type="text" />
            </div>
            <div class="fm-opt">
              <label>Pendidikan :</label>
              <input class="inp" maxlength="20" name="pendidikan"  type="text" />
            </div>
            <div class="fm-req">
              <label>No KTP :</label>
              <input class="inp" maxlength="20" name="noktp"  type="text" />
            </div>
            <div class="fm-opt">
		      <label>Keterangan :</label>
              <textarea class="inp" name="keterangan"></textarea>
		    </div>
        </fieldset>
        <p class="infonya"></p>
    </form>
</div>
<div id="dialog-otoritas">
      <form id="form_otoritas" method="post">
        <fieldset>
		    <div class="fm-req">
		      <label for="kode">Dana Maksimal :</label>
		      <input class="inp" name="kode"  type="text" maxlength="20"/>
		    </div>
		    <div class="fm-req">
		      <label for="level">Level Otoritas :</label>
		      <select name="level" class="input-medium">
			  </select>
		    </div>
		    </fieldset>
		    <p class="infonya"></p>
    </form>
</div>
<div id="dialog-hapus-pegawai">
      <br /><h3><img src="assets/images/question.png">&nbsp;Anda yakin <span class="phps"></span> akan dihapus ?</h3>
</div>
<div id="dialog-hapus-otoritas">
      <br /><h3><img src="assets/images/question.png">&nbsp;Anda yakin <span class="phps"></span> akan dihapus ?</h3>
</div>
<div id="dialog-jabatan">
      <form id="form_jabatan" method="post">
        <fieldset>
            <div class="fm-req">
              <label>Nama jabatan :</label>
              <input class="inp" maxlength="255" name="nama_jabatan"  type="text" />
            </div>
            <div class="fm-opt">
		      <label>Keterangan :</label>
              <textarea class="inp" name="keterangan"></textarea>
		    </div>
        </fieldset>
        <p class="infonya"></p>
    </form>
</div>
<div id="dialog-hapus">
      <br /><h3><img src="assets/images/question.png">&nbsp;Anda yakin <span class="phps"></span> akan dihapus ?</h3>
      <p class="infonya"></p>
</div>
<div id="dialog-upload">
      <fieldset>
        <img id="foto_upload" style="width:100px;border:1px solid;float:left;margin-left:-10px;" src="assets/images/fotopegawai/default.jpg"/>
        <div style="margin-left:100px;">
            <h3>Pegawai : <span class="napeg"></span></h3>
            <form enctype="multipart/form-data" method="post" action="param/pegawai/uploadfoto" id="formUpload" name="formUpload" target="upload_target">
                <input type="file" id="userfile" name="userfile" size="40" />
                <input type="hidden" name="nipfoto" />
            </form>
        </div>
        <p class="infonya"></p>
      </fieldset>
</div>
<div id="dialog-detail">
        <div style="float:right;position:relative;right:50px;top:10px"><img style="width:100px;border:1px solid;" id="foto_pegawai" src="" /></div>
        <fieldset>
            <div class="fm-opt">
              <label>NIP :</label>
              <div class="dtl"></div>
            </div>
            <div class="fm-opt">
              <label>Jabatan :</label>
              <div class="dtl"></div>
            </div>
            <div class="fm-opt">
              <label>Nama :</label>
              <div class="dtl"></div>
            </div>
            <div class="fm-opt">
              <label>Nama Panggilan :</label>
              <div class="dtl"></div>
            </div>
            <div class="fm-opt">
              <label>Tempat Lahir :</label>
              <div class="dtl"></div>
            </div>
            <div class="fm-opt">
              <label>Tanggal Lahir :</label>
              <div class="dtl"></div>
            </div>
            <div class="fm-opt">
              <label>Jenis Kelamin :</label>
              <div class="dtl"></div>
            </div>
            <div class="fm-opt">
              <label>Agama :</label>
              <div class="dtl"></div>
            </div>
            <div class="fm-opt">
              <label>Status :</label>
              <div class="dtl"></div>
            </div>
            <div class="fm-opt">
              <label>Alamat :</label>
              <div class="dtl"></div>
            </div>
            <div class="fm-opt">
              <label>Kota :</label>
              <div class="dtl"></div>
            </div>
            <div class="fm-opt">
              <label>Telp :</label>
              <div class="dtl"></div>
            </div>
            <div class="fm-opt">
              <label>Pendidikan :</label>
              <div class="dtl"></div>
            </div>
            <div class="fm-opt">
              <label>No KTP :</label>
              <div class="dtl"></div>
            </div>
            <div class="fm-opt">
		      <label>Keterangan :</label>
              <div class="dtl"></div>
		    </div>
     </fieldset>
</div>
<iframe name="ctkframe" id="ctkframe" style="width:0px;height:0px;border:0;display:none;" src="param/pegawai/cetakDetail"></iframe>
    {% endblock footer_dialog %}   	
{% endblock footer %}
