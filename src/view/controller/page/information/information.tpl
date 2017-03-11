<div class="panel panel-danger">
    <div class="panel-heading text-center">
        <strong>{{ information.getTitle() }}</strong>
    </div>
    <div style="padding: 20px">
        {{ information.getContent()|raw }}
    </div>
</div>