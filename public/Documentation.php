<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <title>SaaS Application</title>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,700,800' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/templatemo-style.css">
</head>
<body>
<div class="preloader">
    <div class="sk-spinner sk-spinner-rotating-plane"></div>
</div>
<nav class="navbar navbar-default navbar-fixed-top templatemo-nav" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon icon-bar"></span>
                <span class="icon icon-bar"></span>
                <span class="icon icon-bar"></span>
            </button>
            <a href="#" class="navbar-brand">SaaS Application</a>
        </div>

        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>

                </ul>
            </li>
        </ul>
    </div>



</nav>

<br/><br/><br/><br/><br/>
<div class="container-fluid">
    <main>
        <div class="row">
            <div class="col-md-9">
                <section>
                    <article id="#" class="jumbotron" style="background-color:#cce6ff !important;">

                        <h1 >
                            Getting started!
                        </h1>
                        <p>An overview of SaaS Base API, how to download and use, basic templates and examples, and more.</p>

                    </article>
                </section>

                <section>
                    <article>
                        <div class="row">
                            <div class="col-xs-6 col-sm-4">
                                <h2 style="color:#28a7e9;">User Module</h2>
                                <p>
                                    This module provied a generic manipulation of users.
                                    An admin can invite users to join teams, assign rols to users,
                                    and send them emails.
                                </p>
                                <p><button class="btn  btn-default"> View Details>></button></p>
                            </div>
                            <div class="col-xs-6 col-sm-4">
                                <h2 style="color:#28a7e9;">Payment Module</h2>
                                <p>In this module, our API deals with Fastspring Payment Processor.
                                    The payment Processor handles all subscriptions transactions. </p>
                                <p><button class="btn  btn-default"> View Details>></button></p>
                            </div>
                            <div class="col-xs-6 col-sm-4">
                                <h2 style="color:#28a7e9;">Subscription</h2>
                                <p>This module enables admin to add plans, delete planes, activate and deactivate planes, assign planes to teams and handles payment information of planes.
                                </p>
                                <p><button class="btn  btn-default"> View Details>></button></p>
                            </div>
                        </div>

                    </article>

                </section>
                <br /><br /><br /><br />
                <section id="intro">
                    <h4>Introduction</h4>
                    <p>Although not all software-as-a-service applicaions share all traits, the characteristics below are common among many SaaS application.
                        Develovers waste time buliding similar modules for their SaaS App.<br />
                        - User Module.<br />
                        - Plan Module.<br />
                        - Billing Module.<br />
                        We will provide a generic SaaS base for different SaaS Apps with the previous mentioned modules.
                    <p>
                </section>
                <section id="Download&Setup">
                    <br /><br />
                    <h4>Download&Setup</h4>
                    <p>
                        To setup the API first cd to /var/www/html and create a folder that will hold API.<br />
                        Then open the terminal and run "get clone https://github.com/amrfayad/SaaSBase".<br />
                        You then need to cd inside the project.<br />
                        The next step is to run generate-key.php just type "php generate-key.php".<br />
                        The output will be something like "hnw1ni567eirjfjxncryhgfydg1nn78n".<br />
                        This should be copied and pasted in config.php . <br />
                        In the config.php also change the name of database name, hostname, username, and password.<br />
                        Then you need to run database migration file "php db-migrate.php". <br />
                    </p>
                </section>

                <hr>
                <section id="membership/login" >
                    <br /><br />
                    <h4 >membership/login</h4>
                    <p>
                        This action will be called as
                    </p>
                </section>
                <hr>
                <section id="membership/signup">
                    <br /><br />
                    <h4>membership/signup</h4>
                </section>
                <hr>
                <section id="membership/invite">
                    <br /><br />
                    <h4>membership/invite</h4>
                </section>
                <hr>
                <section id="membership/accept-invitation">
                    <br /><br />
                    <h4>membership/accept-invitation</h4>
                </section>
                <hr>
                <section id="membership/reset-token">
                    <br /><br />
                    <h4>membership/reset-token</h4>
                </section>
                <hr>
                <section id="membership/change-password">
                    <br /><br />
                    <h4>membership/change-password</h4>
                </section>
                <hr>
                <section id="membership/activate-user">
                    <br /><br />
                    <h4>membership/activate-user</h4>
                </section>
                <hr>
                <section id="membership/deactivate-user">
                    <br /><br />
                    <h4>membership/deactivate-user</h4>
                </section>
                <hr>
                <section id="membership/add-role">
                    <br /><br />
                    <h4>membership/login</h4>
                </section>
                <hr>
                <section id="membership/enable-role">
                    <br /><br />
                    <h4>membership/add-role</h4>
                </section>
                <hr>
                <section id="membership/disable-role">
                    <br /><br />
                    <h4>membership/disable-role</h4>
                </section>
                <hr>
                <section id="membership/add-member-to-tem">
                    <br /><br />
                    <h4>membership/add-member-to-team</h4>
                </section>
                <hr>
                <section id="membership/assigne-billing">
                    <br /><br />
                    <h4>membership/assigne-billing</h4>
                </section>
                <hr>
                <section id="membership/get-team-members">
                    <br /><br />
                    <h4>membership/get-team-members</h4>
                </section>
                <hr>
            </div>
            <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
            <aside class="btn-group-vertical col-md-3">

                <a href="#Download&Setup">
                    <button class="btn btn-default">
                        Download&Setup</button>
                </a>

                <br/>
                <a href="#membership/login">
                    <button class="btn btn-default">
                        membership/login</button>
                </a>


                <a href="#membership/signup">
                    <button class="btn btn-default">
                        membership/signup</button>
                </a>


                <a href="#membership/invite">
                    <button class="btn btn-default">
                        membership/invite</button>
                </a>


                <a href="#membership/accept-invitation">
                    <button class="btn btn-default">
                        membership/accept-invitation</button>
                </a>


                <a href="#membership/reset-token">
                    <button class="btn btn-default">
                        membership/reset-token</button>
                </a>


                <a href="#membership/change-password">
                    <button class="btn btn-default">
                        membership/change-password</button>
                </a>


                <a href="#membership/activate-user">
                    <button class="btn btn-default">
                        membership/activate-user</button>
                </a>


                <a href="#membership/deactivate-user">
                    <button class="btn btn-default">
                        membership/deactivate-user</button>
                </a>


                <a href="#membership/add-role">
                    <button class="btn btn-default">
                        membership/add-role</button>
                </a>


                <a href="#membership/enable-role">
                    <button class="btn btn-default">
                        membership/enable-role</button>
                </a>


                <a href="#membership/disable-role">
                    <button class="btn btn-default">
                        membership/disable-role</button>
                </a>


                <a href="#membership/add-member-to-tem">
                    <button class="btn btn-default">
                        membership/add-member-to-team</button>
                </a>


                <a href="#membership/assigne-billing">
                    <button class="btn btn-default">
                        membership/assigne-billing</button>
                </a>


                <a href="#membership/get-user-profile">
                    <button class="btn btn-default">
                        membership/get-user-profile</button>
                </a>


                <a href="#membership/get-team-members">
                    <button class="btn btn-default">
                        membership/get-team-members</button>
                </a>

                <a href="#">
                    <button class="btn btn-default">
                        <span class="glyphicon glyphicon-menu-up" aria-hidden="true"></span>
                        Back-to-Top
                    </button>
                </a>

            </aside>

        </div>

    </main>
</div>
<footer>
    <div class="container">
        <div class="row">
            <p>Copyright © 2099 TheRocketTeam</p>
        </div>
    </div>
</footer>

<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/jquery.singlePageNav.min.js"></script>
<script src="js/custom.js"></script>
</body>
</html>