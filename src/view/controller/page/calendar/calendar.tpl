<div style="text-align: center">
    <a href="?page=calendar/qualify" class="btn btn-danger {{type == 'Qualify' ? 'active' : ''}}" role="button">Időmérők</a>
    <a href="?page=calendar/race" class="btn btn-danger {{type == 'Race' ? 'active' : ''}}"role="button">Futamok</a>
    <a href="?page=calendar/index" class="btn btn-danger {{type == 'Event' ? 'active' : ''}}"role="button">Összes</a>
</div>
<table class="table table-responsive table-hovered">
    <thead>
    <tr>
        <th>Típus</th>
        <th>Esemény</th>
        <th>Idő</th>
    </tr>
    </thead>
    <tbody>
    {% for event in events %}
    <tr>
        <td>{{event.getType() == 'race' ? 'Futam' : 'Időmérő'}}</td>
        <td>{{event.getName()}}</td>
        <td>{{event.getDateTime()|date("Y. M. d.")}}</td>
    </tr>
    {% endfor %}
    </tbody>
</table>