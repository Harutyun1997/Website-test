<?php
include("header .html");
?>
<link rel="stylesheet" href="assets/css/register.css">


<body>
<?php
include("header_nav_bar.html");
?>


<div class="container">
    <div class="row main">
        <div class="main-login main-center">
            <h3> Create Your Profile</h3>
            <form ng-app="myApp" ng-controller="validateCtrl"
                  name="myForm" novalidate>

                <div class="form-group">
                    <label for="name" class="cols-sm-2 control-label">Your Name</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" id="name" name="name" ng-model="name"
                                   placeholder="Enter your Name" required/>
                            <span ng-show="myForm.name.$touched && myForm.name.$invalid" class="error">The name is required.</span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="email" class="cols-sm-2 control-label">Your Email</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope fa"
                                                                   aria-hidden="true"></i></span>
                            <input type="email" ng-model="email" name="email" class="form-control" id="email"
                                   placeholder="Enter your Email" required/>
                            <span style="color:red" ng-show="myForm.email.$dirty && myForm.email.$invalid">
                            <span ng-show="myForm.email.$error.required">Email is required.</span>
                            <span ng-show="myForm.email.$error.email">Invalid email address.</span>
                            </span>
                            <div id="cont-email" class="error">

                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password" class="cols-sm-2 control-label">Password</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock fa-lg"
                                                                   aria-hidden="true"></i></span>
                            <input type="password" ng-model="password" class="form-control" name="password"
                                   id="password" placeholder="Enter your Password" required/>
                            <span ng-show="myForm.password.$touched && myForm.password.$invalid" class="error">Password is required.</span>

                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="confirm" class="cols-sm-2 control-label">Confirm Password</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock fa-lg"
                                                                   aria-hidden="true"></i></span>
                            <input type="password" class="form-control" ng-model="confirm" name="confirm"
                                   placeholder="Confirm your Password" required/>
                            <span ng-show="myForm.confirm.$touched && myForm.confirm.$invalid" class="error"> confirm is required.</span>
                            <span ng-show=" password !== confirm && myForm.confirm.$touched "
                                  class="error"> confirm mismatch</span>


                        </div>
                    </div>
                </div>
                <div class="form-group ">
                    <button ng-click="myFunction()" id="button"
                            ng-disabled="!(myForm.name.$valid && myForm.email.$valid && myForm.password.$valid && myForm.confirm.$valid && password == confirm )"
                            class="btn btn-primary btn-lg btn-block login-button">Register
                    </button>
                </div>

        </div>
    </div>
</div>
</div>
<script src="assets/js/register.js"></script>
</body>

</html>
