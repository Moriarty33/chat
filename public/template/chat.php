<?php session_start(); ?>
<?php if($_SESSION["login"]){ ?>
<div class="container"  ng-controller="ChatCtrl">
    <div class="row chat-window col-xs-12 col-md-12" id="chat_window_1" style="margin-left:10px;">
        <div class="col-xs-12 col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading top-bar">
                    <div class="col-md-8 col-xs-8">
                        <span class="panel-title"><span class="glyphicon glyphicon-comment"></span> Chat</span>
                        <span class="label label-warning" aria-label="Right Align">{{massage_msg}}</span>
                    </div>
                    <div class="col-md-4 col-xs-4" style="text-align: right;">

                    </div>
                </div>

                    <div ng-repeat="data in chat_data">
                            <div class="row msg_container base_receive" ng-hide="data.login == sesion_login">

                                <div class="col-xs-10 col-md-10">
                                    <div class="messages msg_receive">
                                        <p>{{data.text}}</p>
                                        <time datetime="">{{data.time}}</time>
                                        <span  class="label label-default"> {{data.login}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row msg_container base_sent" ng-hide="data.login != sesion_login">
                                <div class="col-md-10 col-xs-10 ">
                                    <div class="messages msg_sent">
                                        <p>{{data.text}}</p>
                                       <time datetime="">{{data.time}}</time>
                                       <span  class="label label-default" > {{data.login}}</span>

                                       <div type="button" ng-click="delete_msg(data.msg_id)" class="btn btn-default" aria-label="Right Align" >
                                       <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>

                                        </div>
                                        <button type="button" ng-click="edit_msg_g(data.msg_id,$index)" class="btn btn-default" aria-label="Right Align" >
                                       <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </button>

                                    </div>
                                </div>

                            </div>
                        </div>
                        <a id="bottom"></a>
                </div>

                <form class="panel-footer">
                    <div class="input-group">
                        <input id="btn-input" type="text" class="form-control input-sm chat_input" ng-model="msg" placeholder="Write your message here..." />
                        <span class="input-group-btn">
                        <button class="btn btn-primary btn-sm" ng-click="send_msg()" id="btn-chat">Send</button>
                        </span>
                    </div>
                </form>
            <form class="panel-footer">
                <div class="input-group">
                 <div ng-show="edit">
                    <input id="btn-input" type="text" class="form-control input-sm chat_input" ng-model="edit_msg_text" placeholder="{{chat_data[edit_msg_index].text}}" />
                       <span class="input-group-btn">
                      <button class="btn btn-primary btn-sm" ng-click="edit_msg()" id="btn-chat">Edit</button>
                      </span>
                     </div>
                    </div>
                    </form>
            </div>
        </div>
    </div>
</div>
<?php }else {echo "<div class='container'> <span class='label label-success'>Ввойдите или зарегисрируйтесь! <a href='#register'> Регистрация</a>  <a href='#login'> Ввойти</a></span></div>";} ?>


