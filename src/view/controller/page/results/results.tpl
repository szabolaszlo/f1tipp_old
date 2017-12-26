{% set resultYears = [2014, 2015, 2016, 2017] %}
{% macro resultButton(year) %}
    <button onclick="$('#results').load('?page=information/index&information_title={{ year }}&ajax=true');"
            class="btn btn-new" role="button">
        {{ year }}
    </button>
{% endmacro %}

{% import _self as button %}

<div style="text-align: center; padding: 15px;">
    {% for year in resultYears %}
        {{ button.resultButton(year) }}
    {% endfor %}
    <a href="?page=results/index" class="btn btn-new" role="button">
        2018
    </a>
</div>

<div id="results">
    {% for table in tables %}
        {{ table|raw }}
    {% endfor %}
</div>
