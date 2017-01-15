<div class="panel panel-danger">
    <div class="panel-heading text-center">
        <strong>{{ language.get('nav_calendar') }}</strong>
    </div>
    <div style="text-align: center; margin-top: 15px;">
        <a href="?page=calendar/qualify" class="btn btn-danger {{ type == 'Qualify' ? 'active' : '' }}" role="button">
            {{ language.get('general_qualify') }}
        </a>
        <a href="?page=calendar/race" class="btn btn-danger {{ type == 'Race' ? 'active' : '' }}" role="button">
            {{ language.get('general_races') }}
        </a>
        <a href="?page=calendar/index" class="btn btn-danger {{ type == 'Event' ? 'active' : '' }}" role="button">
            {{ language.get('general_all') }}
        </a>
    </div>
    <table class="table table-responsive table-hovered">
        <thead>
        <tr>
            <th>{{ language.get('calendar_type') }}</th>
            <th>{{ language.get('calendar_event') }}</th>
            <th>{{ language.get('calendar_time') }}</th>
        </tr>
        </thead>
        <tbody>
        {% for event in events %}
            <tr>
                <td>{{ event.getType() == 'race' ? language.get('general_race') : language.get('general_qualify') }}</td>
                <td>{{ event.getName() }}</td>
                <td>{{ event.getDateTime()|date("Y. M. d.") }}</td>
            </tr>
        {% endfor %}
        </tbody>
    </table>
</div>