{% extends 'controller/module/base_module.tpl' %} {% block body_content %}
    <div class="panel-body center-block">
        <div class="table-responsive center-block">
            <table class="table table-condensed">
                <tbody>
                {% for user in users %}
                <tr>
                    <td class="user-activity user-{{ user.getName() }}"></td>
                    <td><strong>{{user.getName()}}</strong></td>
                    <td><strong>{{user.getPoint()}}</strong></td>
                    <td>{{user.getPointDifference()}}</td>
                </tr>
                {% endfor %}
                </tbody>
            </table>
            <table class="table table-condensed">
                <tbody>
                {% for typeKey, recordType in recordTypes %}
                {% if recordType is not empty %}
                <tr>
                    <td class="text-center bg-danger" colspan="3"><strong>{{language.get(id ~ '_best_of_' ~ typeKey)}}</strong></td>
                </tr>
                {% for record in recordType %}
                <tr>
                    <td><strong>{{record.getUserName()}}</strong></td>
                    <td><strong>{{record.getPoint()}}</strong></td>
                    <td><strong>{{record.getTimes() > 1 ? ' X' ~ record.getTimes() : ''}}</strong></td>
                </tr>
                {% endfor %}
                {% endif %}
                {% endfor %}
                </tbody>
            </table>
        </div>

    </div>
{% endblock %}
