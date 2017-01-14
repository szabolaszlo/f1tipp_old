{% extends 'controller/module/base_module.tpl' %}

{% block heading_title %}
    <strong>{{ events|first.name }}</strong>
{% endblock %}

{% block body_content %}
    <div class="panel-body">
        <table class="table small" style="margin-bottom: 0;">
            {% for event in events %}
                <tr>
                    <td><strong>{{ language.get('general_' ~ event.id) }}</strong></td>
                    <td><strong>{{ event.date }}</strong></td>
                    <td><strong><span id="{{ event.id }}_counter" style="color: red"></span></strong></td>
                </tr>
            {% endfor %}
        </table>
    </div>
    {% for event in events %}
        {{ event.countDown|raw }}
    {% endfor %}
{% endblock %}