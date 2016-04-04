{% extends "tpl/tpl1.php" %}

        {% block breadcrumb %}
						<ul class="breadcrumb">
							<li>
								<i class="icon-home"></i>
								<a href="..">Home</a> 
								<i class="icon-angle-right"></i>
							</li>
							<li><a href="#">Input Jurnal</a></li>
						</ul>
        {% endblock breadcrumb %}

        {% block page %}
				<div id="page" class="dashboard">
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="tabbable tabbable-custom boxless">
                                <ul class="nav nav-tabs">
                                   <li class="active"><a href="#tabs-1" data-toggle="tab">Input data manual</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tabs-1">
                                        <form class="form-horizontal" id="form_jurnal" method="post">
                                        <div class="span12">
                                            <div class="control-group fm-req">
                                                <label class="control-label">Tanggal Transaksi</label>
                                                <div class="controls">
                                                    <input id="accounttrans_date" name="accounttrans_date" tabindex="0" type="text" size="16" class="inp m-wrap m-ctrl-medium date-picker input-small">
                                                </div>
                                            </div>
                                            <div class="control-group fm-req">
                                                <label class="control-label">Kode Transaksi <span class="required">*</span></label>
                                                <div class="controls">
                                                    <input id="code" name="code" tabindex="1" type="text" class="inp input-small">
                                                </div>
                                            </div>
                                            <div class="control-group fm-opt">
                                                <label class="control-label">Informasi transaksi</label>
                                                <div class="controls">
                                                    <input id="accounttrans_desc" name="accounttrans_desc" tabindex="2" type="text" class="input-xlarge">
                                                </div>
                                            </div>
                                            <hr>
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th width="12%"></th>
                                                        <th width="30%">Nama Akun</th>
                                                        <th width="15%">Jumlah</th>
                                                        <th width="20%">No.Rekening</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><select tabindex="2" id="accounttrans_code" class="input-medium" name="accounttrans_code">
                                                            <option value="DEBET">DEBET</option>
                                                            <option value="KREDIT">KREDIT</option>
                                                        </select></td>
                                                        <td><select tabindex="3" class="input-xlarge" name="accounttrans_type" id="jurnal1"></select></td>
                                                        <td><input id="jumlah" name="jumlah" type="text" class="inp input-large" style="text-align: right;"></td>
                                                        <td><input id="ket" name="ket" type="text" class="input-large"></td>
                                                        <td><button class="btn btn-success" id="addjurnalrow"><i class="icon-plus icon-white"></i></button></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <hr>
                                            <table class="table table-striped table-bordered table-advance table-hover">
                                                <thead>
                                                    <tr>
                                                        <th width="45%">Nama akun</th>
                                                        <th width="20%">No.Rekening</th>
                                                        <th width="15%">Jumlah debet</th>
                                                        <th width="15%">Jumlah kredit</th>
                                                        <th width="5%"></th>
                                                    </tr>
                                                </thead>
                                              <tbody id="tbl_listjurnal"></tbody>
                                            </table>
                                        </div>
                                        
                                        <div class="span11 ">
                                            <div class="form-actions">
                                                <button class="btn btn-primary" id="save_a"><i class="icon-ok"></i> Save</button>
                                            </div>
                                            <p class="infonya"></p>
                                         </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
						</div>
					</div>
				</div>
        {% endblock page %}

