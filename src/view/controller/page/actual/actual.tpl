<img class="img-responsive" src="{{ image }}?v={{ imageModifyTime }}" alt=""
     style="margin-bottom: 10px; border-radius: 4px; border: solid 1px; border-color: #ffbbbc" border="1">
{{ modules.messageWall|raw }}
{{ modules.news|raw }}
{% for key, table in tables %}
    {% if loop.first %}
        <div id="refreshing-able-table">
            {{ table|raw }}
        </div>
    {% else %}
        {{ table|raw }}
    {% endif %}
{% endfor %}