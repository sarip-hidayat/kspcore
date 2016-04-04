{% extends "tpl/tpl1.php" %}

        {% block breadcrumb %}
						<ul class="breadcrumb">
							<li>
								<i class="icon-home"></i>
								<a href="..">Home</a> 
								<i class="icon-angle-right"></i>
							</li>
							<li><a href="#">Perhitungan Bagi Hasil</a></li>
						</ul>
        {% endblock breadcrumb %}

        {% block page %}
				<div id="page" class="dashboard">
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="tabbable tabbable-custom boxless">
                                <ul class="nav nav-tabs">
                                   <li class="active"><a href="#tabs-1" data-toggle="tab">Data Perhitugan Utama</a></li>
                                   <li><a href="#tabs-2" data-toggle="tab">Rincian Saldo rata-rata</a></li>
                                   <li><a href="#tabs-3" data-toggle="tab">Rincian Bagi Hasil per Produk</a></li>
                                   <li><a href="#tabs-4" data-toggle="tab">Rincian Bagi Hasil per Nasabah</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tabs-1">
                                        <div class="span12">
                                            <table class="table table-hover">
                                                <tbody>
                                                    <tr>
                                                        <td>Periode</td>
                                                        <td>
                                                            <input name="periode1" id="periode1" type="text" size="10" class="inp m-wrap m-ctrl-medium date-picker input-small"> s/d 
                                                            <input name="periode2" id="periode2" type="text" size="10" class="inp m-wrap m-ctrl-medium date-picker input-small">
                                                        </td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" align="center"><b>Hitung saldo rata-rata penghimpunan</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Saldo rata-rata penghimpunan</td>
                                                        <td><input id="saldoratahimpun" name="saldoratahimpun" type="text" size="10" class="input-medium" style="text-align: right;"></td>
                                                        <td align="right"><button class="btn btn-warning hitung" id="hitung"><i class="icon-ok"></i> Hitung saldo rata - rata</button></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Saldo pendapatan</td>
                                                        <td><input id="saldoratapenyalur" name="saldoratapenyalur" type="text" size="10" class="input-medium" style="text-align: right;"></td>
                                                        <td align="right"><button class="btn" id="lihat_rincian"><i class="icon-eye-open"></i> Lihat rincian saldo rata - rata</button></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" align="center"><b>Hitung bagi hasil</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Total Bagi Hasil</td>
                                                        <td><input id="totalbasil" name="totalbasil" type="text" size="10" class="input-medium" style="text-align: right;"></td>
                                                        <td align="right">
	                                                        <button class="btn btn-danger proses_hitung_basil" id="proses_hitung_basil"><i class="icon-plus icon-white"></i> Proses hitung bagi hasil</button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Bonus wadiah yang dibagikan</td>
                                                        <td><input id="bonusdibagi" name="bonusdibagi" type="text" size="10" class="input-medium">
	                                                        Minimal saldo rata-rata<input id="minsaldo" name="minsaldo" type="text" size="10" class="input-medium">
	                                                    </td>
                                                        <td align="right"><button class="btn btn-primary hitung_bonus_wadiah" id="hitung_bonus_wadiah"><i class="icon-money"></i> Proses hitung bonus wadiah</button><br><br>
	                                                        <button class="btn" id="lihat_rincian_basil1"><i class="icon-eye-open"></i> Lihat rincian bagi hasil per produk.....</button><br>
	                                                        <button class="btn" id="lihat_rincian_basil2"><i class="icon-eye-open"></i> Lihat rincian bagi hasil per nasabah...</button></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="left" colspan="3"><button class="btn btn-success distribusi_basil" id="distribusi_basil"> <i class="icon-star-empty"></i> <i class="icon-star-empty"></i> <i class="icon-star-empty"></i> Distribusi bagi hasil</button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Zakat</td>
                                                        <td><span class="infoproses2"><img src="assets/images/loading.gif"> Proses...</span> <span class="ok2"><img src="assets/images/icontruechecklist.png"> OK</span></td>
                                                         <td align="right"><button class="btn btn-inverse aZakat" id="aZakat"><i class="icon-ok"></i> Proses</button></td>
                                                    </tr>
                                                    <tr>
                                                        <td>PPH</td>
                                                        <td><span class="infoproses4"><img src="assets/images/loading.gif"> Proses...</span> <span class="ok4"><img src="assets/images/icontruechecklist.png"> OK</span></td>
                                                         <td align="right"><button class="btn btn-info aPph" id="aPph"><i class="icon-ok"></i> Proses</button></td>
                                                    </tr>
                                                    
                                                    <tr>
                                                        <td><b>Administrasi</b><br>Untuk proses ini dijalankan satu bulan sekali</td>
                                                        <td><span class="infoproses3"><img src="assets/images/loading.gif"> Proses...</span> <span class="ok3"><img src="assets/images/icontruechecklist.png"> OK</span></td>
                                                         <td align="right"><button class="btn btn-danger aAdm" id="aAdm"><i class="icon-plus icon-white"></i> Proses</button></td>
                                                    </tr>
                                                    
                                                    
                                                <tr>
                                                </tbody>
                                            </table>
                                            
                                            
                                        </div>
                                        
                                    </div>
                                    <div class="tab-pane" id="tabs-2">
                                        <div class="span12">
                                            <div class="widget">
                                                <div class="widget-title">
                                                    <h4><i class="icon-reorder"></i>Perhimpunan dana</h4>
                                                </div>
                                            </div>
                                            <div class="widget-body" id="tblperhimpunan">
                                                <table class="table table-striped table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>Nama sumber dana</th>
                                                            <th>Akun</th>
                                                            <th>Saldo rata-rata</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody></tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tabs-3">
                                        <div class="span12">
                                            <div class="widget">
                                                <div class="widget-title">
                                                    <h4><i class="icon-reorder"></i>Rincian bagi hasil per Produk</h4>
                                                </div>
                                            </div>
                                            <div class="widget-body" id="tblrincianbasil1">
                                                <table class="table table-striped table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>Nama sumber dana</th>
                                                            <th>Akun</th>
                                                            <th>Bagi hasil / Bonus</th>
                                                            <th>Pendapatan bank</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody></tbody>
                                                </table>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tabs-4">
                                        <div class="span12">
                                            <div class="widget">
                                                <div class="widget-title">
                                                    <h4><i class="icon-reorder"></i>Rincian bagi hasil per Nasabah</h4>
                                                </div>
                                            </div>
                                            <div class="widget-body" id="tblrincianbasil2">
                                                <table class="table table-striped table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>Nomor rekening</th>
                                                            <th>Nama</th>
                                                            <th>Mulai</th>
                                                            <th>Sampai</th>
                                                            <th>Saldo rata-rata</th>
                                                            <th>Basil/Bonus</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody></tbody>
                                                </table>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
						</div>
					</div>
				</div>
        {% endblock page %}
