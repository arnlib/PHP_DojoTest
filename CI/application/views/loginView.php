<?php require_once('include/header.php') ?>
</head>
<body>
    <div class="container">
        <h2>Welcome!</h2>
        <div class="wrapper-register col-md-5 col-md-offset-1">
            <form  action="register" method="POST">
                <fieldset id="register">
                    <legend>Register</legend>
                    <div class="form-group row">
                        <label class="col-md-4 form-control-label" for="name">Name:</label>
                        <input class="col-md-7" type="text" name="name" />
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 form-control-label" for="alias">Alias:</label>
                        <input class="col-md-7" type="text" name="alias"/>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 form-control-label" for="email">Email:</label>
                        <input class="col-md-7" type="text" name="email"/>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 form-control-label" for="password">Password:</label>
                        <input class="col-md-7" type="password" name="password" />
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 form-control-label" for="confirmPassword">Confirm PW:</label>
                        <input class="col-md-7" type="password" name="confirmPassword" />
                        <p>*Password should be at least 8 characters</p>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 form-control-label" for="dateOfbirth">Date of Birth: </label>
                        <input class="col-md-7" type="date" name="dateOfBirth" />
                    </div>
                    <div class="form-group row bitones">
                        <div class="col-md-12">
                            <input class="btn btn-default" type="submit" value="Register" />
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>

        <div class="wrapper-login col-md-5">
            <form  action="login" method="POST">
                <fieldset id="login">
                    <legend>Login</legend>
                    <div class="form-group row">
                        <label class="col-md-4 form-control-label" for="email">Email:</label>
                        <input class="col-md-7" type="text" name="email" />
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 form-control-label" for="password">Password:</label>
                        <input class="col-md-7" type="password" name="password" />
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <input class="btn btn-default" type="submit" value="Login" />
                        </div>
                    </div>
<?php
                    if ($this->session->flashdata("error")) {
?>
                        <span style="color:red"><?= $this->session->flashdata("error") ?></span>
<?php
                    }
?>
                </fieldset>
            </form>
        </div>
    </div>
</body>

</html>
