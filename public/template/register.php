<div class="container" ng-controller="RegisterCtrl">
    <div class="login-container">
        <span class="label label-warning">{{massage_reg}}</span>

        <div id="output"></div>
        <div class="avatar"></div>
        <div class="form-box">
            <form novalidate class="css-form">
                <input name="user" type="text" ng-model="username" placeholder="username">
                <input type="password" ng-model="password" placeholder="password">
                <input type="password" ng-model="password1" placeholder="confim password">
                <input type="email" ng-model="email" placeholder="email">
                <br> <img src="public/template/captcha.php"/><br>
                <input name="captcha" ng-model="captcha" type="text" placeholder="captcha"/>
                <button class="btn btn-info btn-block login" ng-click="register()" type="submit">Register</button>
                <a href="#login">login</a>
            </form>

        </div>
    </div>

</div>

<style type="text/css">
    .css-form input.ng-invalid.ng-touched {
        background-color: #FA787E;
    }

    .css-form input.ng-valid.ng-touched {
        background-color: #78FA89;
    }
</style>