{% for message in messages %}
    {% set userName = message.getUser().getName() %}
    <strong>{{ userName }}: </strong>{{ message.getContent() }} - {{ message.getDateTime()|date('h:i') }}
    <br>
{% endfor %}
