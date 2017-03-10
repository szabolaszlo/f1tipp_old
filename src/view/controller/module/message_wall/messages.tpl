{% for message in messages %}
    {% set userName = message.getUser().getName() %}
    <strong>{{ userName }}:</strong> {{ message.getContent() }} <small><i>({{ message.getDateTime()|date("G:i/M.j")  }})</i></small>
    <br>
{% endfor %}
