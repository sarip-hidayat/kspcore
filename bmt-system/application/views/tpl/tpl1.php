{% embed "app/header.php" %}{% endembed %}
    {% block body %}
		<div id="body">
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="span12">		
						<h3 class="page-title">
                            {{ page_title }}
						</h3>
                        {% block breadcrumb %}{% endblock breadcrumb %}
					</div>
				</div>
                {% block page %}{% endblock page %}
			</div>	
        </div>
    {% endblock body %}
{% block footer %}
    {% embed "app/footer.php" %}{% endembed %}
{% endblock footer %}
