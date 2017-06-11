{% extends 'system/resulttable/type/full.tpl' %}
{% block heading_title %}
    <strong>{{ event.getName() }} - {{ language.get('general_' ~ event.getType) }}</strong>
{% endblock %}
{% block body_content %}
    <div class="table-responsive">
        <table class="table table-condensed">
            <thead>
            <tr>
                <th>{{ bets|length ? language.get('result_betting_user') : language.get('result_betting_nobody') }}</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                {% if bets|length %}
                    <td class="text-left bg-grey">
                        <strong>
                            {% for bet in bets %}
                                {{ bet.getUser().getName() }} {{ loop.last ? '' : ', ' }}
                            {% endfor %}
                        </strong>
                    </td>
                {% endif %}
            </tr>
            </tbody>
        </table>
    </div>
    <input type="hidden" id="event-table-bet-numbers" value="{{ bets|length }}">
    <input type="hidden" id="event-table-event-id" value="{{ event.getId() }}">
{% endblock %}
