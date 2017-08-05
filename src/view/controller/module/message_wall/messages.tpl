<table class="table table-striped">
    {% for message in messages %}
        <tr>
            <td>
                {% set userName = message.getUser().getName() %}
                <strong class="color-one ">{{ userName }}:</strong>
                <strong>{{ message.getContent() }}</strong>
                <small><i class="color-two">({{ message.getDateTime()|date("G:i/M.j") }})</i></small>
            </td>
        </tr>
    {% endfor %}
</table>