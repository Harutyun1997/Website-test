<?php
include("header .html");
?>
<body>
<?php
include("header_nav_bar.html");
?>

<div class="login">
    <h1>Member Log-in</h1>

    <form ng-app="myLogin" ng-controller="validateLogin"
          name="myForm" novalidate>
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" ng-model="email" id="exampleInputEmail1"
                   aria-describedby="emailHelp"
                   placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" ng-model="password"
                   placeholder="Password">
            <div id="error-login" class="error"></div>
        </div>

        <button ng-click="myFunction()" class="btn btn-primary">Login</button>
    </form>
</div>
<script src="assets/js/login.js"></script>
</body>

