{% extends "tpl/tpl1.php" %}

        {% block breadcrumb %}
						<ul class="breadcrumb">
							<li>
								<i class="icon-home"></i>
								<a href="..">Home</a> 
								<i class="icon-angle-right"></i>
							</li>
							<li><a href="#">Parameter Daftar Akun</a></li>
						</ul>
        {% endblock breadcrumb %}

        {% block page %}
				<div id="page" class="dashboard">
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="tabbable tabbable-custom boxless">
                                <ul class="nav nav-tabs">
                                   <!--<li class="active"><a href="#tabs-1" data-toggle="tab">Tahun buku</a></li>-->
                                   <li class="active"><a href="#tabs-1" data-toggle="tab">List listakun</a></li>
                                   <li><a href="#tabs-2" data-toggle="tab">Daftar Akun / Chart of Account</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tabs-1">
                                        <div class="widget box blue">
                                            <div class="widget-title">
                                               <h4><i class="icon-reorder"></i>Form List listakun</h4>
                                            </div>
                                            <div id="table_listakun">  	
{% set option = [{'listakun_code': 'Kode CoA', 'listakun_name': 'Nama Akun'}] %}
{% set tombol = '<button id="addakun" class="fg-button ui-state-default ui-corner-all"><img src="assets/images/addicon.png" />Tambah Akun</button>' %}

{%
set tabel_head = [
    ['', '5%', 'No', '1'],
    ['listakun_code', '25%', 'Kode CoA', '1'],
    ['', '40%', 'Nama Akun', '1'],
    ['', '5%', 'Manage', '1'],
    ['listakun_id', '5%', 'ID', '1'],
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
                                            <div class="widget">
                                                <div class="widget-title">
                                                   <h4><i class="icon-sitemap"></i>Daftar Akun / Chart of Account</h4>
                                                </div>
                                                <div class="widget-body" id="isitree"></div>
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
    <div id="dialog-akun">
          <form id="form_akun" method="post">
            <fieldset>
                <div class="fm-req">
                  <label for="listakun_code">Kode Akun :</label>
                  <input class="inp" name="listakun_code" type="text"/>
                </div>
                <div class="fm-req">
                  <label for="listakun_name">Nama Akun :</label>
                  <input class="inp" name="listakun_name" type="text" />
                </div>
                <div class="fm-opt">
                  <label>Kode Tambahan :</label>
                  <input class="inp" name="listakun_alias" type="text"/>
                </div>
                <!--<div class="fm-opt">
                  <label for="listakun_folder"> :</label>
                  <input type="checkbox" id="CTBfolder" name="listakun_folder"/> Folder akun lain
                </div>-->
                <div class="fm-opt">
                  <label>Anak dari :</label>
                  <select name="listakun_parent"></select>
                </div>
                </fieldset>
                <p class="infonya"></p>
        </form>
    </div>
        <div id="dialog-tahunbuku">
          <form id="form_tahunbuku" method="post">
            <fieldset>
                <div class="fm-req">
                  <label for="listakun_code">Nama tahun buku :</label>
                  <input class="inp" name="nama_tahun" type="text"/>
                </div>
                <div class="fm-req">
                  <label>Tanggal Mulai :</label>
                  <input class="inp tgl input-small date-picker" maxlength="12" name="tgl_mulai"  type="text" style="width:75px" />
                </div>
                <div class="fm-req">
                  <label>Tanggal Selesai :</label>
                  <input class="inp tgl input-small date-picker" maxlength="12" name="tgl_akhir"  type="text" style="width:75px" />
                </div>
                <div class="fm-opt">
                  <label>Active :</label>
                  <input id="active" type="checkbox" checked="checked" />
                </div>
                </fieldset>
                <p class="infonya"></p>
        </form>
    </div>
    {% endblock footer_dialog %}   	
{% endblock footer %}
