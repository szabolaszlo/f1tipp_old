<div class="table-responsive">
    <table class="table table-condensed">
        <thead>
        <tr>
            <th colspan="{{bets|length}}">{{language.get('result_betting_user')}}</th>
        </tr>
        </thead>
        <tbody>
        <caption><strong>{{event.getName()}}</strong></caption>
        <tr>
            {% for bet in bets %}
            <td class="text-left bg-grey"><strong>{{bet.getUser().getName()}}</strong></td>
            {% endfor %}
        </tr>
        </tbody>
    </table>
</div>