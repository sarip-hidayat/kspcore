<form id="ffilter">
    <div class="control-group">
    &nbsp;&nbsp;
    {{ tombol | raw }}

    {% if option %}
    </div>
    <select name="ff" class="jns_filter input-large">
        {% for item in option %}
            {% for key, field in item %}
            <option value="{{ key }}">{{ field }}</option>
            {% endfor %}
        {% endfor %}
    </select>
    <input  name="if" type="text" class="isi_filter input-xlarge" placeholder="Search">
    {% endif %}

    {% if periode %}
        Periode :
        <input name="pawal" size="10" class="tgl m-wrap m-ctrl-medium date-picker" value=""/>
        s/d
        <input name="pakhir" size="10" class="tgl m-wrap m-ctrl-medium date-picker" value=""/>
    {% endif %}
    <button data-original-title="Reset" data-placement="Reset" class="reset btn tooltips">GO</button>
</form>
