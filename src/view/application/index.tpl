{% autoescape false %}
<!DOCTYPE html>
<html lang="hu">

{% include('application/head.tpl') %}

<body>

{% include('application/navigation.tpl') %}

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Content Column -->
        <div class="col-lg-8">
            {{ page.content }}
        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">
            {{modules.qualifyCountDown}}
            {{modules.raceCountDown}}
            {{modules.userChampionship}}
        </div>

    </div>

    <hr>

    <!-- Footer -->
    <footer>
        <div class="row">
            <div class="col-lg-12">
                <p>{{language.get('app_creator')}}</p>
            </div>
        </div>
        <!-- /.row -->
    </footer>

</div>
<!-- /.container -->

</body>

</html>
{% endautoescape %}