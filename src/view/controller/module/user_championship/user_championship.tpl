{% extends 'controller/module/base_module.tpl' %} {% block body_content %}
    <div class="panel-body center-block">
        <div class="table-responsive center-block">
            <table class="table table-condensed">
                <tbody>
                {% for user in users %}
                    {% set podiumTrophies = user.getPodiumTrophies() %}
                    <tr>
                        <td class="user-activity user-{{ user.getName() }}">
                            <span class="glyphicon glyphicon-eye-open"
                                  aria-hidden="true" title="Online"
                                  style="color: transparent; font-size: 1.1em;">
                            </span>
                        </td>
                        <td><strong>{{ user.getName() }}</strong></td>
                        <td>
                            {% for type, trophies in podiumTrophies %}
                                {% set trophy = trophies|first %}
                                {% if trophy.getType() %}
                                    <span title="{{ language.get('trophy_type_' ~ trophy.getType()) }}">
                                    <img src="{{ domain }}/src/view/image/trophy_{{ trophy.getType() }}.png"
                                         height="18">
                                </span>
                                    {% if trophies|length > 1 %}
                                        <span class="small">x{{ trophies|length }}</span>
                                    {% endif %}
                                {% endif %}
                            {% endfor %}
                        </td>
                        <td><strong>{{ user.getPoint() }}</strong></td>
                        <td><span class="small">{{ user.getPointDifference() }}</span></td>
                    </tr>
                {% endfor %}
                </tbody>
            </table>
            <table class="table table-condensed">
                <tbody>
                {% for typeKey, recordType in recordTypes %}
                    {% if recordType is not empty %}
                        <tr>
                            <td class="text-center bg-danger" colspan="3">
                                <strong>{{ language.get(id ~ '_best_of_' ~ typeKey) }}</strong>
                            </td>
                        </tr>
                        {% for record in recordType %}
                            <tr>
                                <td><strong>{{ record.getUserName() }}</strong></td>
                                <td><strong>{{ record.getPoint() }}</strong></td>
                                <td><strong>{{ record.getTimes() > 1 ? ' X' ~ record.getTimes() : '' }}</strong></td>
                            </tr>
                        {% endfor %}
                    {% endif %}
                {% endfor %}
                </tbody>
            </table>
            <input type="hidden" id="results-count" value="{{ resultsCount }}">
        </div>
    </div>
{% endblock %}
