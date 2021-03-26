<?php
    session_start();
    $_SESSION['current_page']="index";
    include ("template/template.php");
    define('mydal', TRUE);
    include 'config/dal.php';
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <title>Homepage</title>
    <link rel="stylesheet" href="css/stylepubblica.css"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    <script src="scripthome.js"></script>
    <script src="@@path/vendor/vanillajs-datepicker/dist/js/datepicker.min.js"></script>
  </head>
<body>
<header>
<div class="flex-container">
  <div id="text"><p class="title">RELPC AGENZIA IMMOBILIARE</p>
  </div>
  <div id="logo">
  </div>
</div>

  <!--Main layout-->
  <main class="mt-5">
    <div class="container">
      <form class="row g-3">
        <div class="col-md-3">
          <label for="inputState" class="form-label">Quartiere</label>
          <select id="inputState" class="form-select">
            <option selected>Choose...</option>
            <option>...</option>
          </select>
        </div>
        <div class="col-md-3">
          <label for="inputState" class="form-label">Categoria Immobile</label>
          <select id="inputState" class="form-select">
            <option selected>Choose...</option>
            <option>...</option>
          </select>
        </div>
        <div class="col-md-3">
          <label for="inputState" class="form-label">Affitto min</label>
          <select id="inputState" class="form-select">
            <option selected>Choose...</option>
            <option>...</option>
          </select>
        </div>
        <div class="col-md-3">
        <label for="inputState" class="form-label">Affitto max</label>
          <select id="inputState" class="form-select">
            <option selected>Choose...</option>
            <option>...</option>
          </select>
        </div>
        <div class="col-md-3">
          <label for="inputState" class="form-label">Posti auto</label>
          <select id="inputState" class="form-select">
            <option selected>Choose...</option>
            <option>...</option>
          </select>
        </div>
        <div class="col-md-3">
          <label for="inputState" class="form-label">Posti letto</label>
          <select id="inputState" class="form-select">
            <option selected>Choose...</option>
            <option>...</option>
          </select>
        </div>
        <div class="col-md-3">
          <label for="inputState" class="form-label">Superficie min (mq)</label>
          <select id="inputState" class="form-select">
            <option selected>Choose...</option>
            <option>...</option>
          </select>
        </div>
        <div class="col-md-3">
          <label for="inputState" class="form-label">Superficie max (mq)</label>
          <select id="inputState" class="form-select">
            <option selected>Choose...</option>
            <option>...</option>
          </select>
        </div>
        <div class="col-md-3">
          <label for="birthday">Data iniziale</label>
          <input type="date" id="birthday" name="birthday">                                         
        </div>
        <div class="col-md-3">
          <label for="birthday">Data finale</label>
          <input type="date" id="birthday" name="birthday">  
        </div>
        <div class="col-12">
          <button type="submit" class="btn btn-primary">Sign in</button>
        </div>
      </form>
    </div>
  </div>
      <!--Section: Content-->

      <!--Section: Content-->

      <hr class="my-5" />

      <!--Section: Content-->
      <section class="text-center">
        <h4 class="mb-5"><strong>APPARTAMENTI DISPONIBILI IN QUESTO WEEKEND</strong></h4>

        <div class="row">
          <div class="col-lg-4 col-md-12 mb-4">
            <div class="card">
              <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                <img src="img/pick1.jpg" class="img-fluid" />
                <a href="#!">
                  <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                </a>
              </div>
              <div class="card-body">
                <h5 class="card-title">Trilocale</h5>
                <p class="card-text">
                  70 mq., 2 bagni con doccia, 2 stanze da letto e cucina. 10 minuti dal Centro. 40 euro a notte.
                </p>
                <a href="#!" class="btn btn-primary">Affitta</a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card">
              <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                <img src="img/pick10.jpg" class="img-fluid" />
                <a href="#!">
                  <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                </a>
              </div>
              <div class="card-body">
                <h5 class="card-title">Bilocale</h5>
                <p class="card-text">
                  50 mq., doccia, cucina e stanza da letto. Due balconi e palazzina dotata di piscina pubblica. 20 euro a notte.
                </p>
                <a href="#!" class="btn btn-primary">Affitta</a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card">
              <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                <img src="img/pick5.jpg" class="img-fluid" />
                <a href="#!">
                  <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                </a>
              </div>
              <div class="card-body">
                <h5 class="card-title">Trilocale</h5>
                <p class="card-text">
                  Terrazza panoramica sul centro. 2 bagni, tre stanze da letto e lavanderia. In centro. Prezzo trattabile.
                </p>
                <a href="#!" class="btn btn-primary">Affitta</a>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!--Section: Content-->

    <hr class="my-5" />

      <!--Section: Content-->
      <section class="text-center">
        <h4 class="mb-5"><strong>APPARTAMENTI DISPONIBILI IN OFFERTA</strong></h4>

        <div class="row">
          <div class="col-lg-4 col-md-12 mb-4">
            <div class="card">
              <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                <img src="css/background3.jpg" class="img-fluid" />
                <a href="#!">
                  <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                </a>
              </div>
              <div class="card-body">
                <h5 class="card-title">Su due livelli</h5>
                <p class="card-text">
                150 mq., doccia, cucina e stanza da letto. Due balconi e palazzina dotata di piscina. 100 euro a notte.
                </p>
                <a href="#!" class="btn btn-primary">Button</a>
              </div> 
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card">
              <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                <img src="img/pick5.jpg" class="img-fluid" />
                <a href="#!">
                  <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                </a>
              </div>
              <div class="card-body">
                <h5 class="card-title">Bilocale</h5>
                <p class="card-text">
                  Some quick example text to build on the card title and make up the bulk of the
                  card's content.
                </p>
                <a href="#!" class="btn btn-primary">Affitta</a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card">
              <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                <img src="img/pick4.jpg" class="img-fluid" />
                <a href="#!">
                  <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                </a>
              </div>
              <div class="card-body">
                <h5 class="card-title">Trilocale</h5>
                <p class="card-text">
                  Some quick example text to build on the card title and make up the bulk of the
                  card's content.
                </p>
                <a href="#!" class="btn btn-primary">Affitta</a>
              </div>
            </div>
          </div>
        </div>
      </section>

    <hr class="m-0" />

    <div class="text-center py-4 align-items-center">
      <p>SEGUI RELPC SUI SOCIAL MEDIA</p>
      <a href="https://www.youtube.com/channel/UC5CF7mLQZhvx8O5GODZAhdA" class="btn btn-primary m-1" role="button"
        rel="nofollow" target="_blank">
        <i class="fab fa-youtube"></i>
      </a>
      <a href="https://www.facebook.com/mdbootstrap" class="btn btn-primary m-1" role="button" rel="nofollow"
        target="_blank">
        <i class="fab fa-facebook-f"></i>
      </a>
      <a href="https://twitter.com/MDBootstrap" class="btn btn-primary m-1" role="button" rel="nofollow"
        target="_blank">
        <i class="fab fa-twitter"></i>
      </a>
      <a href="https://github.com/mdbootstrap/mdb-ui-kit" class="btn btn-primary m-1" role="button" rel="nofollow"
        target="_blank">
        <i class="fab fa-github"></i>
      </a>
    </div>

    <!-- Copyright -->
    <div class="text-center p-4" style="background-color: #171717; color:white; ">
      © 2020 Copyright:
      <a class="text-light">RELPC</a>
    </div>
    <!-- Copyright -->
  </footer>
  <!--Footer-->