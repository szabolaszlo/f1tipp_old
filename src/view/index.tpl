{% autoescape false %}
<!DOCTYPE html>
<html lang="hu">

{% include('head.tpl') %}

<body>

{% include('navigation.tpl') %}

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Content Column -->
        <div class="col-lg-8">
            {{ page }}
        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">
            {{modules.qualifyCountDown}}
            {{modules.raceCountDown}}
        </div>

    </div>

    <hr>

    <!-- Footer -->
    <footer>
        <div class="row">
            <div class="col-lg-12">
                <p>Copyright &copy; F1 Tipp 2014</p>
            </div>
        </div>
        <!-- /.row -->
    </footer>

</div>
<!-- /.container -->

<!-- jQuery -->
<script type="text/javascript" src="{{domain}}/src/view/js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script type="text/javascript" src="{{domain}}/src/view/js/bootstrap.min.js"></script>

</body>

</html>
{% endautoescape %}