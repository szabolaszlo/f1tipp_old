<div class="panel panel-default remove-able-{{ id }}">
    <div class="panel-heading text-center">
        <table class="table table-responsive" style="margin-bottom: 0;">
            <tr>
                <td class="visible-lg visible-md visible-sm"><strong class="color-one">{{ titleEvent.name }}</strong></td>
                <td><strong class="color-one">{{ language.get('general_' ~ titleEvent.id) }}</strong></td>
                <td class="visible-lg visible-md visible-sm"><strong class="color-one">{{ titleEvent.date }}</strong></td>
                <td><strong><span id="{{ titleEvent.id }}_counter" class="color-one"></span></strong></td>
            </tr>
        </table>
    </div>
    {#<img class="img-responsive" src="{{ image }}?v={{ imageModifyTime }}" alt="">#}
    <div class="container-yt">
        <iframe src="https://www.youtube.com/embed/jRlSV512lAo?autoplay=1"
                frameborder="0" allowfullscreen class="video-yt"></iframe>
    </div>
    {{ titleEvent.countDown|raw }}
</div>
{{ modules.topFeed|raw }}
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