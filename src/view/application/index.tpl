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
        <div class="col-md-8">
            {{ page.content }}
        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">
            {{modules.countDown}}
            {{modules.userChampionship}}
            {% if page.id != 'actual' %}
            {{modules.messageWall}}
            {% endif %}
            {{modules.userActivity}}
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