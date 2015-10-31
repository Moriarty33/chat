<div class="container" ng-controller="LoginCtrl">
    <div class="login-container">
        <span class="label label-warning">{{massage_login}}</span>

        <div id="output"></div>
        <div class="avatar"></div>
        <div class="form-box">
            <form>
                <input name="user" type="text" ng-model="username" placeholder="username">
                <input type="password" ng-model="password" placeholder="password">

                <br> <img src="public/template/captcha.php"/><br>
                <input name="captcha" ng-model="captcha" type="text" placeholder="captcha"/>
                <button class="btn btn-info btn-block login" ng-click="login()" type="submit">Login</button>
                <a href="#register">Register</a>
            </form>

        </div>
    </div>

</div>

