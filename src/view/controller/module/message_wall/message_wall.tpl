<div class="panel panel-danger remove-able-{{id}}">
    <div class="panel-heading text-center">{{language.get('message_wall_title')}}
        <div class="btn-group pull-right" style="margin-top: -2px">
            <a id="{{id}}" class="text-right glyphicon glyphicon-minus-sign toggle" aria-hidden=true></a>
            <span style="margin-left: .5em"></span>
            <a id="{{id}}" class="text-right glyphicon glyphicon-remove-sign remove" aria-hidden=true></a>
        </div>
    </div>
    <div class="panel-body toggle-able-{{id}}" style="max-height: 150px;overflow-y: scroll;">
        {% for message in messages %}
        {% set userName = message.getUser().getName() %}
        <strong>{{userName}}: </strong>{{message.getContent()}} - {{message.getDateTime()|date('h:i')}}
        <br>
        {% endfor %}
    </div>
    <form class="form-inline toggle-able-{{id}}">
        <div class="form-group container-fluid ">
            <input type="text" class="form-control">
            <button type="submit" class="btn btn-danger">Beleugatok</button>
        </div>
    </form>
</div>