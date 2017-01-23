<!DOCTYPE html>
<html ng-app="datalab">
<head>
  @include("shared.head")
  <title>Open Datalab | Contact</title>
</head>
<body>

  <header class="header-landing">
    @include("shared.nav")
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
            <p><i class="material-icons">info_outline</i>@{{ msg }}</p>
          </div>
          <div ng-show="success" class="card-alert success">
            <p><i class="material-icons">check_circle</i>@{{ msg }}</p>
          </div>
          <div ng-show="error" class="card-alert error">
            <p><i class="material-icons">warning</i>@{{ msg }}</p>
          </div>
        </div>
      </div>
    </div>
  </main>

  @include("shared.footer")
  @include("shared.scripts")
</body>
</html>
