<!DOCTYPE html>
<html ng-app="datalab">
<head>
  <!--Import Google Icon Font-->
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="assets/css/materialize.min.css"  media="screen,projection"/>
  <link type="text/css" rel="stylesheet" href="assets/css/style.css"/>

  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>

  <header class="header-landing">
    <nav>
      <div class="nav-wrapper">
        <div class="container">
          <a href="#" class="brand-logo">
            <img src="assets/img/logo_white_xsmall.png" alt="Open Datalab" />
          </a>
          <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="">Objectifs</a></li>
            <li><a href="">Blog</a></li>
            <li><a href="">Contact</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <section class="header-text">
      <div class="container">
        <h1 class="center bold">Contact</h1>
      </div>
    </section>
  </header>

  <main>
    <div ng-controller="contactCtrl" class="container section">
      <div class="row">
        <form class="col s12">
          <div class="row">
            <div class="input-field col s12 m6">
              <input ng-model="contact.first_name" id="first_name" type="text" class="validate">
              <label for="first_name">Prénom</label>
            </div>
            <div class="input-field col s12 m6">
              <input ng-model="contact.last_name" id="last_name" type="text" class="validate">
              <label for="last_name">Nom</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <input ng-model="contact.email" id="email" type="email" class="validate">
              <label for="email">Email</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <textarea ng-model="contact.message" id="textarea1" class="materialize-textarea validate"></textarea>
              <label for="textarea1">Message</label>
            </div>
          </div>
          <div class="row">
            <div class="col s12 center">
              <a  ng-click="send()"
                  ng-disabled="!contact.first_name || !contact.last_name || !contact.email || !contact.message"
                  class="waves-effect waves-light btn">
                <i class="material-icons left">email</i>Envoyer
              </a>
            </div>
          </div>
        </form>
      </div>
      <div class="row">
        <div class="col s12">
          <div ng-show="sending" class="card-alert info">
            <p><i class="material-icons">info_outline</i>{{ msg }}</p>
          </div>
          <div ng-show="success" class="card-alert success">
            <p><i class="material-icons">check_circle</i>{{ msg }}</p>
          </div>
          <div ng-show="error" class="card-alert error">
            <p><i class="material-icons">warning</i>{{ msg }}</p>
          </div>
        </div>
      </div>
    </div>
  </main>

  <footer class="page-footer nomargin dark">
      <div class="container">
        <div class="row">
          <div class="col l4 s12 center">
            <a href="#top">
              <img src="assets/img/logo_text_color_medium.png" height="150" alt="Open Datalab" />
            </a>
          </div>

          <div class="col l4 s12">
            <h5>Liens</h5>
            <ul>
              <li>Blog</li>
              <li>Contact</li>
              <li>Mentions légales</li>
            </ul>
          </div>

          <div class="col l4 s12" style="overflow: hidden;">
            <h5>Réseaux sociaux</h5>
            <a class="btn-floating btn-large waves-effect waves-light"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            <a class="btn-floating btn-large waves-effect waves-light"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
            <a class="btn-floating btn-large waves-effect waves-light"><i class="fa fa-github" aria-hidden="true"></i></a>
          </div>

        </div>
      </div>
      <div class="footer-copyright">
        <div class="container">
          <!-- copyright -->
        </div>
      </div>
    </footer>

  <!--Import jQuery before materialize.js-->
  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.1/angular.min.js"></script>
  <script type="text/javascript" src="assets/js/materialize.min.js"></script>
  <script type="text/javascript" src="assets/js/typed.min.js"></script>
  <script type="text/javascript" src="assets/js/script.js"></script>
  <script type="text/javascript" src="app/env.js"></script>
  <script type="text/javascript" src="app/app.js"></script>
</body>
</html>
