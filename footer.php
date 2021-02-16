   <div class="taxe">
   <div class="mon">
         <figure>
              <img src="images/<?php if(isset($_COOKIE["dark"])&& !empty($_COOKIE["dark"])) echo'soleil.png'; else echo'lune.png' ?>" alt="" class="lune dar" title="activer mode sombre">
         </figure>
   </div>
   <footer class="container-fluid">
   <section class="row">
       <aside class="col-lg-4 col-md-4 col-sm-12 col-xs-12 ">
            <p><span class="nom-afrikode">{Coding<span class="kod">-Africa}</span></span></p>
            <p class="vop10">
            Coding-Africa est une entreprise web dynamique , qui a pour but
            de mettre en adéquation la technique et la complexité de l
            'informatique , du graphisme et du community 
                , nous sommes passionné par le web 
                depuis un peu plus longtemps nous aimons partager 
                nos compétences et nos découvertes avec les personnes qui 
                ont cette même passion pour le web 
            </p>
            <figure>
                <img src="images/fb1.png" alt="" class="fist">
                <img src="images/wh.png" alt="" class="fist">
                <img src="images/in.png" alt="" class="fist">
                <img src="images/tw.jpg" alt="" class="fist">
            </figure>
       </aside>
       <aside class="col-lg-4 col-md-4 col-sm-12 col-xs-12 ">
       <span class="titre">Contact</span>
       <p class="vop1">
           phone :+243823039778<br>
           phone :+243829317615  <br>
           Email : ContactCodingAfrica@gmail.com <br>
           facebook: <br>
           whatsapp : <br>
       </p>
       </aside>
       <aside class="col-lg-4 col-md-4 col-sm-12 col-xs-12 ">
              <span class="titre">Newsletter</span>
              <p class="vop1"><input type="checkbox" name="" id="" checked> Voulez-vous vous abonner à notre newsletter et recevez nos emails ?</p>
              <span class="email">Email</span>
              <form id="news">
                  <input type="email" name="newsletter" id="new" class="yup"placeholder="votre email ici" ><br>
                  <span id="toto"></span>
                  <button class="new ne" >Envoyer</button>
              </form>
        </aside>
      </section>
    </footer>
    </div>
    <div class="bork"><p class="">&copy Copyright  <span> <?php echo date("Y")?> Coding-Africa</span> tous droits reservés. </p></div>
    <script src="js/prism.js"></script>
    <script src="js/Afrikode.js"></script>
    <script src="js/dark.js"></script>
    <script src="js/resp.js"></script>
    <script src="js/da.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
</html>