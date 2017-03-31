{% extends 'controller/module/base_module.tpl' %}
{% block heading_title %}
    <strong>{{ title }}</strong>
{% endblock %}
{% block body_content %}
    <div class="panel-body center-block">
        <div class="table-responsive center-block">
            <table class="table table-condensed">
                <tbody>
                {% for type, trophies in podiumTrophies %}
                    <tr>
                        <td>
                        <span title="{{ language.get('trophy_type_' ~ type) }}">
                            <img src="/src/view/image/trophy_{{ type }}.png" height="18">
                        </span>
                        </td>
                        <td>
                            {% for trophy in trophies %}
                                {% set user = trophy.getUser() %}
                                {% set point = trophy.getPoint() %}
                                <strong>{{ user.getName() }}{{ loop.last ? '' : ', ' }}</strong>
                            {% endfor %}
                        </td>
                        <td><strong>{{ trophies|first.getPoint() }}</strong></td>
                    </tr>
                {% endfor %}
                </tbody>
            </table>
            <input type="hidden" id="trophy-result-id" value="{{ eventId + 1 }}">
        </div>
    </div>
{% endblock %}
