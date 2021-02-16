
  <?php
  $title='formation' ;
  include_once 'head.php';
  ?>

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Authentification</h2>
          <ol>
            <li><a href="index">accueil</a></li>
            <li>formation</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

      <div class="bloc-authentification">
            <div>Authentification</div>
            <form action="Insertion.php" method="post">
                   <label for="au">Login</label>
                   <input type="text" name="login" id="" class="textbox">
                   <label for="au">password</label>
                   <input type="password" name="pass" id="" class="textbox"><br>
                   <button type="sublit" class="btn-authentification">Valider</button>
            </form>
      </div>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php include_once '../footer.php' ?>


