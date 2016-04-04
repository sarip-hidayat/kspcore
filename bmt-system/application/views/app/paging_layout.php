<div class="paging_wrap pagination pagination-large">
    <span class="pg_first"><img src="{{ assets_path }}/images/button-first.png" /></span>
    <span class="pg_pre"><img src="{{ assets_path }}/images/button-prev.png" /></span>
    [ Hal : <input style="text-align: center;" size="4" class="pg_hal input-small" value="1"/> / <span class="pg_total"></span> ]
    <span class="pg_next"><img src="{{ assets_path }}/images/button-next.png" /></span>
    <span class="pg_last"><img src="{{ assets_path }}/images/button-last.png" /></span>&nbsp;|&nbsp;Limit
        <select class="pg_row input-small">
            <option value="10">10</option>
            <option value="20">20</option>
            <option value="50">50</option>
        </select>
    &nbsp;{% if printer %} <img class="pg_printer" src="{{ assets_path }}/images/printer.png"> {% endif %}
    &nbsp;{% if excelclass %} <img class="{{ excelclass }}" src="{{ assets_path }}/images/excel.png"> {% endif %}
</div>
