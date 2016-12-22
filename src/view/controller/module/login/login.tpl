<form id="signin" class="navbar-form navbar-right" role="form" method="post" action="?module=login/tryLogin">

    <div class="input-group {{ error.error_user ? 'has-error' : ''}}">
        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
        <input id="text" type="text" class="form-control" name="user-name" value="{{user}}" placeholder="{{ error.error_user ? language.get('user_fail') ~ ' ' : ''}}{{language.get('user_name')}}">
        {{ error.error_user ? '<span class="glyphicon glyphicon-remove form-control-feedback"></span>' : ''}}
    </div>

    <div class="input-group {{ error.error_password ? 'has-error' : ''}}">
        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
        <input id="password" type="password" class="form-control" name="password" value="" placeholder="{{ error.error_password ? language.get('user_fail') ~ ' '  : ''}}{{language.get('user_password')}}">
        {{ error.error_password ? '<span class="glyphicon glyphicon-remove form-control-feedback"></span>' : ''}}
    </div>

    <button type="submit" class="btn btn-primary">{{language.get('user_login')}}</button>
</form>