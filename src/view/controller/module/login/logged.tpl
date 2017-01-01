<form id="signin" class="navbar-form navbar-right" role="form" method="post" action="?module=login/logout&{{actualPage}}">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
        <input class="form-control" id="disabledInput" type="text" value="{{name}}" disabled>
    </div>
    <button type="submit" class="btn btn-primary">{{language.get('user_logout')}}</button>
</form>