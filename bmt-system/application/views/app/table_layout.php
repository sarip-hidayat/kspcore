<table class="table table-striped table-bordered table-hover">
    <thead>
{% if jumrow %}
    {% for i in jumrow %}
    <tr>
        {% for item in tabel_head %}
            {% if item[3] == loop.index %}
        <th {{ item[0] ? 'id="' ~ item[0] ~ '"' : '' }} 
            {{ item[1] ? 'width=' ~ item[1] ~'"' : '' }} 
            {{ item[4] ? item[4] :"" }} >{{ item[2] }}</th>
            {% endif %}
        {% endfor %}
    </tr>
    {% endfor %}
{% else %}
    <tr>
        {% for item in tabel_head %}
            <th {{ item[0] ? 'id="' ~ item[0] ~ '"' : '' }} 
                {{ item[1] ? 'width="' ~ item[1] ~ '"' : '' }} >
                {{ item[2] }}</th>
        {% endfor %}
    </tr>
{% endif %}
    </thead>
    <tbody class="tbl_body"></tbody>
</table>
