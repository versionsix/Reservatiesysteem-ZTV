@extends('base')

@section('title', 'Beheer')

@section('content')

    <!-- Main -->
    <div class="container-fluid">
        <div class="col-md-1"></div>
        <div class="col-md-2" class="sidebar-nav">
            <!-- Left column -->
            <strong><i class="glyphicon glyphicon-wrench"></i> Beheerconsole</strong>


            <ul class="nav nav-pills nav-stacked">
                <li class="nav-header"></li>
                <li><a href="#"><i class="glyphicon glyphicon-list"></i> Layouts &amp; Templates</a></li>
                <li><a href="#"><i class="glyphicon glyphicon-briefcase"></i> Toolbox</a></li>
                <li><a href="#"><i class="glyphicon glyphicon-link"></i> Widgets</a></li>
                <li><a href="#"><i class="glyphicon glyphicon-list-alt"></i> Reports</a></li>
                <li><a href="#"><i class="glyphicon glyphicon-book"></i> Pages</a></li>
                <li><a href="#"><i class="glyphicon glyphicon-star"></i> Social Media</a></li>
            </ul>

            <hr>

        </div>                    <div class="col-md-6">

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4>Beheerconsole</h4></div>
                            <div class="panel-body">
                                Dit is de beheerconsole
                            </div>
                            <!--/panel-body-->
                        </div>
                        <!--/panel-->

                        <hr>

                        <!--tabs-->
                        <div class="panel">
                            <ul class="nav nav-tabs" id="myTab">
                                <li class="active"><a href="#profile" data-toggle="tab">Profile</a></li>
                                <li><a href="#messages" data-toggle="tab">Messages</a></li>
                                <li><a href="#settings" data-toggle="tab">Settings</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active well" id="profile">
                                    <h4><i class="glyphicon glyphicon-user"></i></h4> Lorem profile dolor sit amet, consectetur adipiscing elit. Duis pharetra varius quam sit amet vulputate.
                                    <p>Quisque mauris augue, molestie tincidunt condimentum vitae, gravida a libero. Aenean sit amet felis dolor, in sagittis nisi.</p>
                                </div>
                                <div class="tab-pane well" id="messages">
                                    <h4><i class="glyphicon glyphicon-comment"></i></h4> Message ipsum dolor sit amet, consectetur adipiscing elit. Duis pharetra varius quam sit amet vulputate.
                                    <p>Quisque mauris augu.</p>
                                </div>
                                <div class="tab-pane well" id="settings">
                                    <h4><i class="glyphicon glyphicon-cog"></i></h4> Lorem settings dolor sit amet, consectetur adipiscing elit. Duis pharetra varius quam sit amet vulputate.
                                    <p>Quisque mauris augue, molestie.</p>
                                </div>
                            </div>

                        </div>
                        <!--/tabs-->

                        <hr>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4>New Requests</h4></div>
                            <div class="panel-body">
                                <div class="list-group">
                                    <a href="#" class="list-group-item active">Hosting virtual mailbox serv..</a>
                                    <a href="#" class="list-group-item">Dedicated server doesn't..</a>
                                    <a href="#" class="list-group-item">RHEL 6 install on new..</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/col-->


                </div>
                <!--/row-->



                </div>
    <div class="col-md-2"></div>
    <!-- /Main -->
@endsection