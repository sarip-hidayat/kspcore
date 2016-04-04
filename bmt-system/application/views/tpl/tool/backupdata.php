{% extends "tpl/tpl1.php" %}

        {% block breadcrumb %}
						<ul class="breadcrumb">
							<li>
								<i class="icon-home"></i>
								<a href="..">Home</a> 
								<i class="icon-angle-right"></i>
							</li>
							<li><a href="#">Pencadangan Data</a></li>
						</ul>
        {% endblock breadcrumb %}

        {% block page %}
				<div id="page" class="dashboard">
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="tabbable tabbable-custom boxless">
                                <ul class="nav nav-tabs">
                                   <li class="active"><a href="#tabs-1" data-toggle="tab">Backup data</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tabs-1">
                                        <br />
                                           <button id="dobackup" class="fg-button ui-state-default ui-corner-all">Backup</button>
                                           <p class="infonya"></p>
                                    </div>
                                </div>
                            </div>
						</div>
					</div>
				</div>
        {% endblock page %}
