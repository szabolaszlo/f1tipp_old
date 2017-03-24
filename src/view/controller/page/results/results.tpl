<div style="text-align: center; padding: 15px;">
    <button onclick="$('#results').load('?page=information/index&information_title=2014&ajax=true');"  class="btn btn-danger" role="button">
        2014
    </button>
    <button onclick="$('#results').load('?page=information/index&information_title=2015&ajax=true');" class="btn btn-danger" role="button">
        2015
    </button>
    <button onclick="$('#results').load('?page=information/index&information_title=2016&ajax=true');" class="btn btn-danger" role="button">
        2016
    </button>
    <a href="?page=results/index" class="btn btn-danger" role="button">
        2017
    </a>
</div>
<div id="results">
    {% for table in tables %}
        {{ table|raw }}
    {% endfor %}
</div>