{% if error %}
<div class="alert alert-danger">
    <strong>{{error}}</strong>
</div>
{%endif %}

{% if success %}
<div class="alert alert-success">
    <strong>{{success}}</strong>
</div>
{%endif %}

{% if user %}
<div class="row">
    {% for event in events %}
    <div class="col-sm-6">
        <form class="form-horizontal" method="post" action="?page=betting/save">
            <fieldset>

                <!-- Form Name -->
                <legend>{{event.event.getName()}}</legend>

                {% if event.inTime %}

                <!-- Select Basic -->
                {% for eventAttribute in event.eventAttributes %}

                {% set attrId = eventAttribute.getId() %}
                {% set attrType = eventAttribute.getType() %}
                {% set betAttrValue = event.bet ? event.bet.getAttributeValueByKey(attrId) : '' %}

                <div class="form-group">
                    <label class="col-md-4 control-label"
                           for="selectbasic">{{language.get('betting_' ~ attrId)}}</label>
                    <div class="col-md-7">
                        <select id="selectbasic" name="bet_attr[{{attrId}}]"
                                class="form-control event-{{event.event.getId()}}"
                                {{ event.bet ? ' disabled="disabled"' : ''}}>
                            <option value="">{{language.get('betting_default_option')}}</option>
                            {{formHelper.getSelectOption(attrType).getOptions(betAttrValue)|raw}}
                        </select>
                    </div>
                </div>

                {% endfor %}

                <input type="hidden" name="user-token" value="{{userToken}}">
                <input type="hidden" name="event-id" value="{{event.event.getId}}">

                <!-- Button -->
                {% if not event.bet %}
                <div class="center-block">
                    <button id="event-bet-submit-{{event.event.getId()}}" name="singlebutton"
                            class="btn btn-danger center-block" disabled="disabled">
                        {{language.get('betting_submit_' ~ event.event.getType())}}
                    </button>
                </div>
                {% endif %}

                {% else %}
                <h3>{{language.get('betting_time_out')}}</h3>
                {% endif %}
            </fieldset>
        </form>
    </div>
    {% endfor %}
</div>
{% else %}
<h3>{{language.get('betting_no_login')}}</h3>
{% endif %}

<script type="text/javascript">
    $(document).ready(function () {
        {% for event in events %}
        checkFakeBet('.event-{{event.event.getId()}}', '#event-bet-submit-{{event.event.getId()}}');
        {% endfor %}
    });
</script>
