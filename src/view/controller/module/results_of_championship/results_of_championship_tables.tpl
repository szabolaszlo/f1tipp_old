<div class="panel-body center-block">
    <div class="table-responsive table-striped center-block">
        <table class="table small table-striped">
            <thead>
            <th>{{ language.get(id ~ '_driver') }}</th>
            <th>{{ language.get(id ~ '_point') }}</th>
            <th>{{ language.get(id ~ '_wins') }}</th>
            </thead>
            <tbody>
            {% for driver in driverStandings %}
                <tr>
                    <td>{{ driver.Driver.givenName }} {{ driver.Driver.familyName }}</td>
                    <td>{{ driver.points }}</td>
                    <td>{{ driver.wins }}</td>
                </tr>
            {% endfor %}
            </tbody>
        </table>
        <table class="table small table-striped">
            <thead>
            <th>{{ language.get(id ~ '_construct') }}</th>
            <th>{{ language.get(id ~ '_point') }}</th>
            <th>{{ language.get(id ~ '_wins') }}</th>
            </thead>
            <tbody>
            {% for construct in constructStandings %}
                <tr>
                    <td>{{ construct.Constructor.name }}</td>
                    <td>{{ construct.points }}</td>
                    <td>{{ construct.wins }}</td>
                </tr>
            {% endfor %}
            </tbody>
        </table>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#result-title').before('<strong>' + '{{ event.getName }} - ' + '</strong>');
    });
</script>