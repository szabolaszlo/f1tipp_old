{% for typeName, statisticType in statistics %}
    {% for name, statistic in statisticType %}
        <div class="panel panel-danger">
            <div class="panel-heading text-center">
                <strong>{{ language.get(typeName~'_'~name~'_'~'stat') }}</strong>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <tbody>
                    {% for attrName, attributes in statistic %}
                        <tr>
                            <th style="vertical-align: middle;"><strong>{{ language.get('result_'~attrName) }}</strong>
                            </th>
                            {% for attributeKey, attributeValue in attributes %}
                                <th style="text-align: center"><span
                                            style="color: #a94442;">{{ attributeKey }}</span><br><span
                                            style="color: green;">{{ attributeValue }}%</span></th>
                            {% endfor %}
                            {% for i in  0..max(0,(10 - attributes|length)) %}
                                {% if i %}
                                    <th width="10%"></th>
                                {% endif %}
                            {% endfor %}
                        </tr>
                    {% endfor %}
                    </tbody>
                </table>
            </div>
        </div>
    {% endfor %}
{% endfor %}