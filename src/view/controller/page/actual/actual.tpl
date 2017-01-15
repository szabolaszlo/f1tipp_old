<img class="img-responsive" src="{{domain}}/src/view/image/aktual.jpg" alt="" style="margin-bottom: 10px; border-radius: 4px;">
{{ modules.messageWall|raw }}
{% for table in tables %}
{{ table|raw }}
{% endfor %}