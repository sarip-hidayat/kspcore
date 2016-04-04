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
                                   <li class="active"><a href="#tabs-1" data-toggle="tab">Groups wewenang</a></li>
                                   <li><a href="#tabs-2" data-toggle="tab">Menu otoritas</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tabs-1">
                                        <div class="widget box blue">
                                            <div class="widget-title">
                                               <h4><i class="icon-reorder"></i>Groups wewenang</h4>
                                            </div>
                                            <div id="table_group">
{% set option = [{'nama_group': 'Nama Group'}] %}
{% set tombol = '<button id="addgroup" class="btn btn-success">Tambah Group <i class="icon-plus"></i></button>' %}

{%
set tabel_head = [
    ['', '3%', 'No'],
    ['nama_group', '25%', 'Nama Group'],
    ['', '25%', 'Controller'],
    ['', '10%', 'Manage'],
    ['pembiayaan_id', '5%', 'ID'],
]
%}

{% embed "app/filter_layout.php" %}{% endembed %}
{% embed "app/table_layout.php" %}{% endembed %}
{% embed "app/paging_layout.php" %}{% endembed %}

                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane " id="tabs-2">
                                        <div class="widget box blue">
                                            <div class="widget-title">
                                               <h4><i class="icon-reorder"></i>Menu otoritas</h4>
                                            </div>
                                            <br>
                                            <div class="row-fluid">
                                                <h3>Daftar Menu :</h3>
                                               <div id="imenu"></div>
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
<div id="dialog-menu">
    <form id="form_menu" method="post">
        <fieldset>
            <div class="fm-req">
              <label>Nama :</label>
              <input class="inp" maxlength="50" name="nama"  readonly type="text" />
            </div>
            <div class="fm-req">
              <label>Urutan :</label>
              <input class="inp" maxlength="4" name="urutan"  type="text" />
            </div>
            <div class="fm-req">
		      <label>Groups :</label>
		      <select class="inp" size="8" multiple="multiple" name="groups[]" style="width:150px">
			  </select>
		    </div>
        </fieldset>
        <p class="infonya"></p>
    </form>
</div>
<div id="dialog-hapus-user">
      <br /><h3><img src="assets/images/question.png">&nbsp;Anda yakin <span class="phps"></span> akan dihapus ?</h3>
</div>
<div id="dialog-group">
      <form id="form_group" method="post">
        <fieldset>
            <div class="fm-req">
              <label>Nama Group :</label>
              <input class="inp" maxlength="20" name="nama_group"  type="text" />
            </div>
            <div class="fm-req">
              <label>Controller :</label>
              <select size="15" class="slct" multiple="multiple" name="controller[]">
                 <optgroup label="Transaksi">
                 {% for key, item in layanancontr %}
                    <option value="{{ key }}">{{ item }}</option>
                 {% endfor %}
                 </optgroup>
                 <optgroup label="Parameter">
                 {% for key, item in paramcontr %}
                    <option value="{{ key }}">{{ item }}</option>
                 {% endfor %}
                 </optgroup>
                 <optgroup label="Base">
                 {% for key, item in basecontr %}
                    <option value="{{ key }}">{{ item }}</option>
                 {% endfor %}
                 </optgroup>
                 <optgroup label="Akunting">
                 {% for key, item in accountingcontr %}
                    <option value="{{ key }}">{{ item }}</option>
                 {% endfor %}
                 </optgroup>
                 <optgroup label="Transaksi">
                 {% for key, item in transaksicontr %}
                    <option value="{{ key }}">{{ item }}</option>
                 {% endfor %}
                 </optgroup>
                 <optgroup label="Monitor">
                 {% for key, item in monitorcontr %}
                    <option value="{{ key }}">{{ item }}</option>
                 {% endfor %}
                 </optgroup>
                 <optgroup label="Tool">
                 {% for key, item in toolcontr %}
                    <option value="{{ key }}">{{ item }}</option>
                 {% endfor %}
                 </optgroup>
                 <optgroup label="Setting">
                 {% for key, item in setting %}
                    <option value="{{ key }}">{{ item }}</option>
                 {% endfor %}
                 </optgroup>
              </select>
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
<div id="dialog-hapus-otoritas">
      <br /><h3><img src="assets/images/question.png">&nbsp;Anda yakin <span class="phps"></span> akan dihapus ?</h3>
</div>
<div id="dialog-hapus-group">
      <br /><h3><img src="assets/images/question.png">&nbsp;Anda yakin <span class="phps"></span> akan dihapus ?</h3>
      <p class="infonya"></p>
</div>
    {% endblock footer_dialog %}   	
{% endblock footer %}
