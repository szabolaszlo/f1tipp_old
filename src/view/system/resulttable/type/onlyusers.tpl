<div class="table-responsive">
    <table class="table table-condensed">
        <thead>
        <tr>
            <th>{{bets|length ? language.get('result_betting_user') : language.get('result_betting_nobody')}}</th>
        </tr>
        </thead>
        <tbody>
        <caption><strong>{{event.getName()}} - {{ language.get('general_' ~ event.getType) }}</strong></caption>
        <tr>
            {% if bets|length %}
            <td class="text-left bg-grey">
                <strong>
                    {% for bet in bets %}
                    {{bet.getUser().getName()}} {{loop.last ? '' : ', '}}
                    {% endfor %}
                </strong>
            </td>
            {% endif %}
        </tr>
        </tbody>
    </table>
</div>