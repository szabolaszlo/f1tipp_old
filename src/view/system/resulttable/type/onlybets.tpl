<div class="table-responsive">
    <table class="table table-condensed">
        {% set betAttributes = bets|first.getAttributes() %}
        <thead>
        <tr>
            <th>{{language.get('result_name')}}</th>
            {% for betAttribute in betAttributes %}
            <th class="text-center">{{language.get('result_' ~ betAttribute.getKey())}}</th>
            {% endfor %}
        </tr>
        </thead>
        <tbody>
        <caption><strong>{{event.getName()}}</strong></caption>
        {% for bet in bets %}
        <tr>
            <td class="text-left bg-grey"><strong>{{bet.getUser().getName()}}</strong></td>
            {% for betAttribute in bet.getAttributes() %}
            <td class="text-center bg-white">{{betAttribute.getValue()}}</td>
            {% endfor %}
        </tr>
        {% endfor %}
        </tbody>
    </table>
</div>