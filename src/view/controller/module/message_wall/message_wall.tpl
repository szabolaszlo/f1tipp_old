{% extends 'controller/module/base_module.tpl' %} {% block body_content %}
    <div id="messages-list" class="panel-body" style="max-height: 150px;overflow-y: scroll;">
        {% include('controller/module/message_wall/messages.tpl') %}
    </div>
    <div id="messages-send-form-div" class="bg-danger" style="padding: 5px">
        {% include('controller/module/message_wall/form.tpl') %}
    </div>
{% endblock %}