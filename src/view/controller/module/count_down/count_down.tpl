{% extends 'controller/module/base_module.tpl' %}

{% block heading_title %}
<strong>{{name}} {{date}}</strong>
{% endblock %}

{% block body_content %}
<div class="panel-body"><span id="{{id}}_counter" style="color: red"></span></div>
{{countDown|raw}}
{% endblock %}