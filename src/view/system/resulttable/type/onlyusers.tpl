<div class="panel panel-danger text-center">
    <div class="panel-heading text-center">
        <strong>{{ event.getName() }} - {{ language.get('general_' ~ event.getType) }}</strong>
    </div>
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
</div>