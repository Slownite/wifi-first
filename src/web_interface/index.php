<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">

        <link rel="stylesheet" href="css/styles.css">
        <link rel="stylesheet" href="css/bootstrap.css">


<!---->
<!--        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">-->
        
        <title>Wifi Dashboard</title>
    </head>
    
    <body>

    <nav class="navbar navbar-expand-lg bg-dark navbar-light">
        <a class="navbar-brand" href="#">Network configuration</a>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-12 col-md-5">
                <div class="card">
                    <h5 class="card-header">System Status</h5>
                    <div class="card-body">
                        <p class="card-text" id="status">
                            <?php
                            include "php/speed_test_parse.php";
                            echo status();
                            echo online();
                            echo interfaces();
                            ?>
                        </p>
                            <a href="#" class="btn btn-primary">Refresh</a>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-7">
                <div class="card">
                    <h5 class="card-header">System Log</h5>
                    <div class="card-body">
                        <p class="card-text" id="Log">
                            <?php echo logvar(); ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-5">
                <div class="card">
                    <h5 class="card-header">Internet speed</h5>
                    <div class="card-body">
                        <form method="post" action="index.php">
                            <input type="submit" class="btn btn-primary" name="speedTest" value="Measure">
                            <div class="speedtest-output">
                                <?php
                                if ($_POST['speedTest'] === "Measure")
                                    echo speed();
                                ?>
                            </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-5">
                <div class="card">
                    <h5 class="card-header">Wifirst account</h5>
                    <div class="card-body">
<!--                        <p id="account" class="card-text"></p>-->
                        <form>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">Login</label>
                                <div class="col-sm-9">
                                    <input type="login" class="form-control" name="username" id="inputEmail3" placeholder="Login">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-3 col-form-label">Password</label>
                                <div class="col-sm-9">
                                    <input type="password" name="pswd" class="form-control" id="inputPassword3" placeholder="Password">
                                </div>
                            </div>
                            <input type="submit" class="btn btn-primary" value="Save">
                        </form>
<!---->
<!--                        <form method="post" action="index.php">-->
<!--                            <label>Login: <input type="email" name="mail"><label>-->
<!--                                    <label>Password: <input type=password" name="pswd"> <label>-->
<!--                                            <input type="submit" value="Save">-->
<!--                        </form>-->
                        <?php
                        if (isset($_POST['username']) && isset($_POST['pswd']))
                            formStuff(htmlspecialchars($_POST['pswd']), htmlspecialchars($_POST['mail']))
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer">
        <p>v0.1</p>
    </footer>





    </body>


    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <!-- build:js js/main.js -->
    <script src="js/jquery-3.4.0.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.js"></script>
<!---->
<!--    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>-->
<!--    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>-->
<!--    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>i-->
</html>
