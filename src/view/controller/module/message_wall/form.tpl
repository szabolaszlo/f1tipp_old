<form id="message-send" class="form-inline" method="post" action="?module=message_wall/save&ajax=true">
    <input title="" type="text" class="form-control" name="message" placeholder="{{ placeholder }}"
           style="width: 70%;">
    <div class="pull-right">
        <button id="message-submit" type="submit" class="btn btn-danger">{{ language.get(id ~ '_submit') }}</button>
        <img id="loading" src="/src/view/image/ajax-loader.gif" style="display: none;">
    </div>
    <input type="hidden" name="user-token" value="{{ userToken }}">
    <input type="hidden" name="token" value="{{ token }}">
</form>
<script>
    $(document).ready(function () {
        $('#message-submit').click(function () {
            $('#loading').show();
            $('#message-submit').hide();
        });

        $('#message-send').ajaxForm(function () {
            $('#messages-list').load('?module=message_wall/messages&ajax=true');
            $('#messages-send-form-div').load('?module=message_wall/form&ajax=true');
        });

        setInterval(function () {
            $('#messages-list').load('?module=message_wall/messages&ajax=true');
        }, 15000);
    });
</script>