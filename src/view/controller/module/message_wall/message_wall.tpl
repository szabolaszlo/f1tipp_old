{% extends 'controller/module/base_module.tpl' %} {% block body_content %}
<div class="panel-body" style="max-height: 150px;overflow-y: scroll;">
    {% for message in messages %}
    {% set userName = message.getUser().getName() %}
    <strong>{{userName}}: </strong>{{message.getContent()}} - {{message.getDateTime()|date('h:i')}}
    <br>
    {% endfor %}
</div>
<form class="form-inline">
    <div class="form-group container-fluid ">
        <input type="text" class="form-control">
        <button type="submit" class="btn btn-danger">{{language.get(id ~ '_submit')}}</button>
    </div>
</form>
{% endblock %}