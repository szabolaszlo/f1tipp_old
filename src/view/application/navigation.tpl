<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#f1tipp-navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><img src="{{domain}}/src/view/image/logo.png" height="51" alt=""></a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="f1tipp-navbar-collapse">
            <ul class="nav navbar-nav navbar-left">
                <li {{page.id == 'betting' ? 'class="active"' : ''}}>
                    <a href="?page=betting/index">{{language.get('nav_bet')}}</a>
                </li>
                <li {{page.id == 'results' ? 'class="active"' : ''}}>
                    <a href="?page=results/index">{{language.get('nav_results')}}</a>
                </li>
                <li {{page.id == 'calendar' ? 'class="active"' : ''}}>
                    <a href="?page=calendar/index">{{language.get('nav_calendar')}}</a>
                </li>
                <li>
                    <a href="#">{{language.get('nav_rules')}}</a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li>{{modules.login|raw}}</li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>