<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title>{{ app_name }}</title>
    <link rel="icon" href="{{ assets_path }}/images/favicon.jpg" type="image/jpg" />
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<link href="{{ assets_path }}/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
	<link href="{{ assets_path }}/plugins/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
	<link href="{{ assets_path }}/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" />
	<link href="{{ assets_path }}/css/style.css" rel="stylesheet" />
	<link href="{{ assets_path }}/css/style-responsive.css" rel="stylesheet" />
	<link href="{{ assets_path }}/css/themes/default.css" rel="stylesheet" id="style_color" />
	<link href="{{ assets_path }}/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
	<link href="{{ assets_path }}/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet" rel="stylesheet" type="text/css" />
	<link href="{{ assets_path }}/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" type="text/css" />
	<link href="{{ assets_path }}/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css" />
	<link href="{{ assets_path }}/plugins/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" type="text/css"  />
	<link href="{{ assets_path }}/plugins/jqvmap/jqvmap/jqvmap.css" media="screen" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ assets_path }}/plugins/chosen-bootstrap/chosen/chosen.css" />
{% if css_links %}
    {{ css_links | raw }}
{% endif %}
    
    <script src="{{ assets_path }}/plugins/jquery-1.8.3.min.js" type="text/javascript"></script>	
	<!-- IMPORTANT! Load jquery-ui-1.10.1.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->	
	<script src="{{ assets_path }}/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>		
	<script src="{{ assets_path }}/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

    <script type="text/javascript" src="{{ assets_path }}/js/fungsi.js"></script>
	<!--[if lt IE 9]>
	<script src="{{ assets_path }}/plugins/excanvas.js"></script>
	<script src="../assets/plugins/respond.js"></script>	
	<![endif]-->	
	<script src="{{ assets_path }}/plugins/breakpoints/breakpoints.js" type="text/javascript"></script>	
	<script src="{{ assets_path }}/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
	<script src="{{ assets_path }}/plugins/jquery.blockui.js" type="text/javascript"></script>	
	<script src="{{ assets_path }}/plugins/jquery.cookie.js" type="text/javascript"></script>
	<script src="{{ assets_path }}/plugins/uniform/jquery.uniform.min.js" type="text/javascript" ></script>	
	<script src="{{ assets_path }}/plugins/flot/jquery.flot.js" type="text/javascript"></script>
	<script src="{{ assets_path }}/plugins/flot/jquery.flot.resize.js" type="text/javascript"></script>
	<script src="{{ assets_path }}/plugins/jquery.peity.min.js" type="text/javascript"></script>	
	<script src="{{ assets_path }}/plugins/jquery-knob/js/jquery.knob.js" type="text/javascript"></script>	
    <script type="text/javascript" src="{{ assets_path }}/js/jq/jquery.jclock.js"></script>
{% if assets.treejs %}
    <script src="{{ assets_path }}/plugins/bootstrap-tree/bootstrap-tree/js/bootstrap-tree.js"></script>
{% endif %}
    <script type="text/javascript" src="{{ assets_path }}/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js"></script>   

{% if assets.form %}
    {% embed "app/form_assets.php" %}{% endembed %}
{% endif %}
   
    <script src="{{ assets_path }}/scripts/app.js" type="text/javascript"></script>
	<script src="{{ assets_path }}/scripts/form-components.js" type="text/javascript"></script> 
{% if js_links %}
    {{ js_links | raw }}
{% endif %}

	<script>
		jQuery(document).ready(function() {		
			App.init(); // initlayout and core plugins
			FormComponents.init();
{% if js_add %}
            {{ js_add }}
{% endif %}
		});
	</script>

{% embed "app/table_assets.php" %}{% endembed %}

{% if js_links2 %}
    {{ js_links2 | raw }}
{% endif %}

</head>
<body class="fixed-top">
    <div id="header" class="navbar navbar-inverse navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="brand" href="."><img src="assets/img/logoc.png" alt="MES"/></a>
				<a class="btn btn-navbar collapsed" id="main_menu_trigger" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="arrow"></span>
				</a>          			
				<div class="top-nav">
					<span class="jclock"></span>				
					<ul class="nav pull-right" id="top_menu">
						<li class="divider-vertical hidden-phone hidden-tablet"></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="icon-user"></i>
							<b class="caret"></b>
							</a>
							<ul class="dropdown-menu">
								<li><a href="profile" class="logut"><i class="icon-user"></i> Profile</a></li>
								<li><a href="auth/logout" class="logut"><i class="icon-key"></i> Log Out</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div id="container" class="row-fluid">
		<div id="sidebar" class="nav-collapse collapse">
			<div class="sidebar-toggler hidden-phone"></div>
            {% for item in menunya %}
                {{ item  | raw}}
            {% endfor %}
		</div>
