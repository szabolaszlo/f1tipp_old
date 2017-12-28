{% extends 'controller/module/base_module.tpl' %}
        {% block button_group %}
            <div class="btn-group pull-right" style="margin-top: -2px">
                <a class="feed_source" href="https://hu.motorsport.com/f1/"
                   target="_blank">{{ language.get('feed_source') }}</a>
                <a id="{{ id }}" class="text-right glyphicon {{ visibilityIcon }} toggle" aria-hidden=true></a>
                <span style="margin-left: .5em"></span>
                <a id="{{ id }}" class="text-right glyphicon glyphicon-remove-sign remove" aria-hidden=true></a>
            </div>
        {% endblock %}
{% block body_content %}
    <table class="table table-striped">
        {% for feed in feeds %}
            <tr>
                <td class="visible-lg visible-md visible-sm"
                    style="vertical-align: middle;width: 30%;text-align: center">
                    <img class="img-responsive" src="{{ feed.image|raw }}" style="padding: 5px">
                    <span class="color-two small">{{ feed.publishDate|date }}</span>
                </td>
                <td>
                    <div class="text-center"><strong class="color-one">{{ feed.title }}</strong></div>
                    <div class="visible-xs text-center"><img class="img-responsive" src="{{ feed.image|raw }}"
                                                             style="padding: 5px">
                        <span class="color-two small">{{ feed.publishDate|date }}</span>
                    </div>
                    <div class="text-justify" style="padding: 5px">
                        <strong>{{ feed.description|raw }}</strong>
                    </div>
                </td>
            </tr>
        {% endfor %}
    </table>
{% endblock %}