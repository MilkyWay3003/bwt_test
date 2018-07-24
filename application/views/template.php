<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bwttest project</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description" content="bwttest task"/>
    <meta name="author" content="MilkyWay"/>

    <link href="/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="/css/style.css" rel="stylesheet"/>
    <script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">BWT test</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="/">Home</a></li>
                        <li><a href="/FeedbackController/Index">Leave feedback</a></li>
                    </ul>
                    <? if (isset($_SESSION['login']) && $_SESSION['login']): ?>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="/UserController/Logout">Log out</a></li>
                        </ul>
                    <? endif; ?>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
    </div>

    <? include 'application/views/'.$content_view.'.php'; ?>

</body>
</html>