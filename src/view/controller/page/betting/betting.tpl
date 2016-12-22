{% for event in events %}
<form class="form-horizontal">
    <fieldset>

        <!-- Form Name -->
        <legend>{{event.event.getName()}}</legend>

        <!-- Select Basic -->
        {% for eventAttribute in event.eventAttributes %}
        <div class="form-group">
            <label class="col-md-4 control-label" for="selectbasic">{{eventAttribute.getId()}}</label>
            <div class="col-md-4">
                <select id="selectbasic" name="{{eventAttribute.getId()}}" class="form-control">
                    {{formHelper.getSelectOption(eventAttribute.getType()).getOptions()|raw}}
                </select>
            </div>
        </div>
        {% endfor %}


        <!-- Button -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="singlebutton">Single Button</label>
            <div class="col-md-4">
                <button id="singlebutton" name="singlebutton" class="btn btn-primary">Button</button>
            </div>
        </div>

    </fieldset>
</form>
{% endfor %}