{% extends 'controller/module/base_module.tpl' %}
{% block heading_title %}
    <strong id="result-title">{{ language.get(id ~ '_title') }}</strong>
{% endblock %}
{% block body_content %}
    <div id="real-results-tables">
        <div style="padding: 15px;" class="text-center">
            <img id="loading" src="/src/view/image/ajax-loader.gif" height="34">
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('#real-results-tables').load('?module=resultsOfChampionship/getResults&ajax=true');
        });
    </script>
{% endblock %}
