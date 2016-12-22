{% for driver in drivers %}
<option value="{{driver.getShort()}}">{{driver.getName() ~ ' (' ~ driver.getShort() ~ ')'}}</option>
{% endfor %}