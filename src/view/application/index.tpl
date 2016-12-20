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
<script type="text/javascript" src="{{domain}}/src/view/vendor/jquery/jquery-3.1.1.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script type="text/javascript" src="{{domain}}/src/view/vendor/bootstrap-3.3.7/js/bootstrap.min.js"></script>

</body>

</html>
{% endautoescape %}