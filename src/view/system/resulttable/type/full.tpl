<div class="table-responsive">
    <table class="table table-condensed">
        <thead>
        <tr>
            <th>{{language.get('result_name')}}</th>
            <th class="text-center">{{language.get('result_point')}}</th>
            {% for resultAttribute in result.getAttributes() %}
            <th class="text-center">{{language.get('result_' ~ resultAttribute.getKey())}}</th>
            {% endfor %}
        </tr>
        </thead>
        <tbody>
        <caption><strong>{{result.getEvent().getName()}}</strong></caption>
        {% for bet in bets %}
        <tr>
            <td class="text-left bg-grey"><strong>{{bet.getUser().getName()}}</strong></td>
            <td class="text-center bg-grey"><strong>{{bet.getPoint()}}</strong></td>
            {% for betAttribute in bet.getAttributes() %}
            <td class="text-center {{betAttribute.getClass() ? betAttribute.getClass() : 'bg-white'}}">{{betAttribute.getValue()}}</td>
            {% endfor %}
        </tr>
        {% endfor %}
        <tr class="bg-grey">
            <td><strong>{{language.get('general_result')}}</strong></td>
            <td></td>
            {% for resultAttribute in result.getAttributes() %}
            <td class="text-center"><strong>{{resultAttribute.getValue()}}</strong></td>
            {% endfor %}
        </tr>
        </tbody>
    </table>
</div>