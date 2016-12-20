<form class="form-horizontal">
    <fieldset>

        <!-- Form Name -->
        <legend>{{qualify.getName()}}</legend>

        <!-- Select Basic -->
        {% for qualifyAttribute in qualifyAttributes %}
        <div class="form-group">
            <label class="col-md-4 control-label" for="selectbasic">{{qualifyAttribute.getId()}}</label>
            <div class="col-md-4">
                <select id="selectbasic" name="selectbasic" class="form-control">
                    <option value="1">{{qualifyAttribute.getType()}}</option>
                    <option value="2">{{qualifyAttribute.getType()}}</option>
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
