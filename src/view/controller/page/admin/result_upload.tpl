{% if error %}
<div class="alert alert-danger">
    <strong>{{error}}</strong>
</div>
{% endif %}

{% if success %}
<div class="alert alert-success">
    <strong>{{success}}</strong>
</div>
{% endif %}

{% if not error %}
<div class="row">
    <div class="col-sm-6">
        <form class="form-horizontal" method="post" action="?page=admin/result_upload/save">
            <fieldset>

                <!-- Form Name -->
                <legend>{{event.getName()}}</legend>

                <!-- Select Basic -->
                {% for eventAttribute in attributes %}

                {% set attrId = eventAttribute.getId() %}
                {% set attrType = eventAttribute.getType() %}
                {% set betAttrValue = result ? result.getAttributeValueByKey(attrId) : '' %}

                <div class="form-group">
                    <label class="col-md-4 control-label"
                           for="selectbasic">{{language.get('betting_' ~ attrId)}}</label>
                    <div class="col-md-8">
                        <select id="selectbasic" name="result_attr[{{attrId}}]"
                                class="form-control event-{{event.getId()}}"
                                {{ event.bet ? ' disabled="disabled"' : ''}}>
                            <option value="">{{language.get('admin_result_upload_default_option')}}</option>
                            {{formHelper.getSelectOption(attrType).getOptions(betAttrValue)|raw}}
                        </select>
                    </div>
                </div>

                {% endfor %}

                <input type="hidden" name="event-id" value="{{event.getId}}">
                <input type="hidden" name="token" value="{{token}}">

                <!-- Button -->
                <div class="center-block">
                    <button id="event-bet-submit-{{event.getId()}}" name="singlebutton"
                            class="btn btn-danger center-block submit" disabled="disabled">
                        {{language.get('admin_result_upload_submit_' ~ event.getType())}}
                    </button>
                </div>
            </fieldset>
        </form>
    </div>
</div>
{% endif %}

<script type="text/javascript">
    $(document).ready(function () {
        checkFakeBet('.event-{{event.getId()}}', '#event-bet-submit-{{event.getId()}}');
    });
</script>
