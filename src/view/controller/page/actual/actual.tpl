<img class="img-responsive" src="{{ domain }}/src/view/image/aktual.jpg" alt=""
     style="margin-bottom: 10px; border-radius: 4px;">
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