{% extends "tpl/tpl1.php" %}

        {% block breadcrumb %}
						<ul class="breadcrumb">
							<li>
								<i class="icon-home"></i>
								<a href="..">Home</a> 
								<i class="icon-angle-right"></i>
							</li>
							<li><a href="#">Parameter Kolektibilitas</a></li>
						</ul>
        {% endblock breadcrumb %}

        {% block page %}
				<div id="page" class="dashboard">
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="tabbable tabbable-custom boxless">
                                <ul class="nav nav-tabs">
                                   <li class="active"><a href="#tabs-1" data-toggle="tab">Kolektibilitas Parameter Harian</a></li>
                                   <li><a href="#tabs-2" data-toggle="tab">Kolektibilitas Parameter Mingguan</a></li>
                                   <li><a href="#tabs-3" data-toggle="tab">Kolektibilitas Parameter Bulanan</a></li>
                                   
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tabs-1">
                                        <div class="widget box blue">
                                            <div class="widget-title">
                                               <h4><i class="icon-reorder"></i>Kolekbilitas Parameter Harian</h4>
                                            </div>
                                            <br>
                                            <div class="row-fluid">
                                                <div id="table_harian">
{% set option = [{'type_kolekbilitas': 'Tipe'}] %}
{% set tombol = '<button id="addharian" class="btn btn-success">Tambah <i class="icon-plus"></i></button>' %}

{%
set tabel_head = [
    ['', '3%', 'No'],
    ['', '25%', 'Tipe Kolektibilitas'],
    ['', '25%', 'Parameter'],
    ['', '10%', 'Kode'],
    ['', '10%', 'Manage'],
    ['kharian_id', '5%', 'ID'],
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
                                               <h4><i class="icon-reorder"></i>Kolekbilitas Parameter Mingguan</h4>
                                            </div>
                                            <br>
                                            <div class="row-fluid">
                                                <div id="table_mingguan">
{% set option = [{'type_kolekbilitas': 'Tipe'}] %}
{% set tombol = '<button id="addmingguan" class="btn btn-success">Tambah <i class="icon-plus"></i></button>' %}

{%
set tabel_head = [
    ['', '3%', 'No'],
    ['', '25%', 'Tipe Kolektibilitas'],
    ['', '25%', 'Parameter'],
    ['', '10%', 'Kode'],
    ['', '10%', 'Manage'],
    ['kmingguan_id', '5%', 'ID'],
]
%}

{% embed "app/filter_layout.php" %}{% endembed %}
{% embed "app/table_layout.php" %}{% endembed %}
{% embed "app/paging_layout.php" %}{% endembed %}
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tabs-3">
                                        <div class="widget box blue">
                                            <div class="widget-title">
                                               <h4><i class="icon-reorder"></i>Kolekbilitas Parameter Bulanan</h4>
                                            </div>
                                            <br>
                                            <div class="row-fluid">
                                                <div id="table_bulanan">
{% set option = [{'type_kolekbilitas': 'Tipe'}] %}
{% set tombol = '<button id="addbulanan" class="btn btn-success">Tambah <i class="icon-plus"></i></button>' %}

{%
set tabel_head = [
    ['', '3%', 'No'],
    ['', '25%', 'Tipe Kolektibilitas'],
    ['', '25%', 'Parameter'],
    ['', '10%', 'Kode'],
    ['', '10%', 'Manage'],
    ['kbulanan_id', '5%', 'ID'],
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
			</div>	
        {% endblock page %}

{% block footer %}
    {% embed "app/footer.php" %}{% endembed %}
    {% block footer_dialog %}
<!-- Dialog Area -->
<div id="dialog-kharian">
      <form id="form_kharian" method="post">
        <fieldset>
		    <div class="fm-req">
		      <label for="type_kolekbilitas">Type Kolekbilitas :</label>
		      <input class="inp" name="type_kolekbilitas" type="text" maxlength="20"/>
		    </div>
		    <div class="fm-req">
		      <label for="jangka_waktu">Parameter :</label>
		      <input class="inp" name="parameter" type="text" maxlength="50" />
		    </div>
		    <div class="fm-req">
		      <label for="jangka_waktu">Kode :</label>
		      <input class="inp" name="kode" type="text" maxlength="50" />
		    </div>
		    </fieldset>
		    <p class="infonya"></p>
    </form>
</div>
<div id="dialog-kbulanan">
      <form id="form_kbulanan" method="post">
        <fieldset>
		    <div class="fm-req">
		      <label for="type_kolekbilitas">Type Kolekbilitas :</label>
		      <input class="inp" name="type_kolekbilitas" type="text" maxlength="20"/>
		    </div>
		    <div class="fm-req">
		      <label for="jangka_waktu">Parameter :</label>
		      <input class="inp" name="parameter" type="text" maxlength="50" />
		    </div>
		    <div class="fm-req">
		      <label for="jangka_waktu">Kode :</label>
		      <input class="inp" name="kode" type="text" maxlength="50" />
		    </div>
		    </fieldset>
		    <p class="infonya"></p>
    </form>
</div>
<div id="dialog-kmingguan">
      <form id="form_kmingguan" method="post">
        <fieldset>
		    <div class="fm-req">
		      <label for="type_kolekbilitas">Type Kolekbilitas :</label>
		      <input class="inp" name="type_kolekbilitas" type="text" maxlength="20"/>
		    </div>
		    <div class="fm-req">
		      <label for="jangka_waktu">Parameter :</label>
		      <input class="inp" name="parameter" type="text" maxlength="50" />
		    </div>
		    <div class="fm-req">
		      <label for="jangka_waktu">Kode :</label>
		      <input class="inp" name="kode" type="text" maxlength="50" />
		    </div>
		    </fieldset>
		    <p class="infonya"></p>
    </form>
</div>

    {% endblock footer_dialog %}   	
{% endblock footer %}
