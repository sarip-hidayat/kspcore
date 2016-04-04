{% extends "tpl/tpl1.php" %}

        {% block breadcrumb %}
            <ul class="breadcrumb">
                <li>
                    <i class="icon-home"></i>
                    <a href=".">Home</a> 
                    <i class="icon-angle-right"></i>
                </li>
                <li><a href="#">Dashboard</a></li>
                
            </ul>
        {% endblock  breadcrumb %}

        {% block page %}
				<div id="page" class="dashboard">
					<div class="row-fluid">
						<div class="span6">
							<div class="widget-title">
                                <h4><i class="icon-reorder"></i>Login Terakhir</h4>
                            </div>
                            <br>
                            <div id="table_session">
{%
set tabel_head = [
    ['', '3%', 'No'],
    ['', '20%', 'User'],
    ['nama', '25%', 'Nama Komputer'],
    ['nama', '25%', 'Waktu'],
]
%}

{% embed "app/table_layout.php" %}{% endembed %}
{% embed "app/filter_layout.php" %}{% endembed %}
                                
                            </div>
						</div>
					</div>
				</div>
        {% endblock page %}
