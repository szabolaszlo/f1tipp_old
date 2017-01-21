<div class="panel panel-danger text-center">
    <div class="panel-heading text-center">
        <strong>{{ event.getName() }} - {{ language.get('general_' ~ event.getType) }}</strong>
    </div>
    <div class="table-responsive">
        <table class="table table-condensed">
            {% set betAttributes = bets|first.getAttributes() %}
            <thead>
            <tr>
                <th>{{ language.get('result_name') }}</th>
                {% for betAttribute in betAttributes %}
                    <th class="text-center">{{ language.get('result_' ~ betAttribute.getKey()) }}</th>
                {% endfor %}
            </tr>
            </thead>
            <tbody>
            {% for bet in bets %}
                <tr>
                    <td class="text-left bg-grey"><strong>{{ bet.getUser().getName() }}</strong></td>
                    {% for betAttribute in bet.getAttributes() %}
                        <td class="text-center bg-white">{{ betAttribute.getValue() }}</td>
                    {% endfor %}
                </tr>
            {% endfor %}
            </tbody>
        </table>
    </div>
    <input type="hidden" id="event-table-bet-numbers" value="{{ bets|length }}">
    <input type="hidden" id="event-table-event-id" value="{{ event.getId() }}">
</div>