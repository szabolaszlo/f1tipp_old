{% set no_betting_users = (usersCount/2 < bets|length) and not (usersCount == bets|length) %}
{% set bet_counter %}
    {% if (usersCount/2 < bets|length) %}
        <div class="pull-right" style="margin-right: 10px">
            {{ language.get('result_bets') ~ bets|length ~ '/' ~ usersCount }}
        </div>
    {% endif %}
{% endset %}
<div class="panel panel-danger">
    <div class="panel-heading text-center">
        <div class="row">
            {% block heading_title %}
                {% set titletext = language.get('general_' ~ result.getEvent().getType) %}
                <strong>{{ result.getEvent().getName() ~ ' - ' ~ titletext }}</strong>
            {% endblock %}
            {% if not no_betting_users %}
                {{ bet_counter }}
            {% endif %}
        </div>
        {% if no_betting_users %}
            <div class="row">
                <div class="pull-left" style="margin-left: 10px">
                    {{ language.get('result_no_betting_users') ~ noBettingUsers|join(', ') }}
                </div>
                {{ bet_counter }}
            </div>
        {% endif %}
    </div>
    {% block body_content %}
        <div class="table-responsive">
            <table class="table table-condensed">
                <thead>
                <tr>
                    <th>{{ language.get('result_name') }}</th>
                    <th class="text-center">{{ language.get('result_point') }}</th>
                    {% for resultAttribute in result.getAttributes() %}
                        <th class="text-center">{{ language.get('result_' ~ resultAttribute.getKey()) }}</th>
                    {% endfor %}
                </tr>
                </thead>
                <tbody>
                {% for bet in bets %}
                    <tr>
                        <td class="text-left bg-grey"><strong>{{ bet.getUser().getName() }}</strong></td>
                        <td class="text-center bg-grey"><strong>{{ bet.getPoint() }}</strong></td>
                        {% for betAttribute in bet.getAttributes() %}
                            <td class="text-center {{ betAttribute.getClass() ? betAttribute.getClass() : 'bg-white' }}">{{ betAttribute.getValue() }}</td>
                        {% endfor %}
                    </tr>
                {% endfor %}
                <tr class="bg-grey">
                    <td><strong>{{ language.get('general_result') }}</strong></td>
                    <td></td>
                    {% for resultAttribute in result.getAttributes() %}
                        <td class="text-center"><strong>{{ resultAttribute.getValue() }}</strong></td>
                    {% endfor %}
                </tr>
                </tbody>
            </table>
        </div>
    {% endblock %}
</div>