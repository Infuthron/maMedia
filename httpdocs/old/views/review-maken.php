 <?php
 $success = 0;
 if (!empty($_POST['postReview'])){
 $reviews = new Crud('reviews');
 $bannedips = new Crud('bannedip');
 if ($_GET['reviews']=='bedrijf'||$_GET['reviews']=='stage') {

     if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
     {
         $ip=$_SERVER['HTTP_CLIENT_IP'];
     }
     elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
     {
         $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
     }
     else
     {
         $ip=$_SERVER['REMOTE_ADDR'];
     }
     if (!$bannedips->select(array(),array('ip'=>$ip))->rowCount()>0) {
        if($reviews->insert(array('ip'=>$ip,'target' => $_GET['reviews'], 'stars' => $_POST['stars'], "comment" => $_POST['comment'], 'naam' => $_POST['naam'], 'email' => $_POST['email'], 'titel' => $_POST['titel']))){
            $success = 1;
        }else{
            $success = 2;
        };
     }else{
         $success = 3;
     }}}

 ?>
  <div class="papertrial">

    <a href="./" class="paper1 paper2 "><p class="no"><i class="fa fa-home" aria-hidden="true"></i>
  Home / </p></a>


    <a href="reviews?reviews=<?php echo $_GET['reviews']?>" class="paper paper2"><p class="no"><i class="fa fa-th" aria-hidden="true"></i>
      Reviews <?php echo $_GET['reviews']?>      / </p></a>


    <a href="review-maken?reviews=<?php echo $_GET['reviews']?>" class="paper paper2"><p class="no"> <i class="fa fa-folder" aria-hidden="true"></i>
Schrijf een review  </p></a>



  </div>
  <div class="full2">
  <div class="bar2">
    <h2> SCHRIJF EEN REVIEW</h2>
  </div>
  <div class="intro">
  <form method="post">
<div class="left5"> <p class="none"> Algemene score </p> </div>

    <div class="  review-container2 left4">
        <div onclick="document.getElementById('starsRating').value = 1" class="star"><span class="stararea">★</span></div>
        <div onclick="document.getElementById('starsRating').value = 2" class="star"><span class="stararea">★</span></div>
        <div onclick="document.getElementById('starsRating').value = 3" class="star"><span class="stararea">★</span></div>
        <div onclick="document.getElementById('starsRating').value = 4" class="star"><span class="stararea">★</span></div>
        <div onclick="document.getElementById('starsRating').value = 5" class="star"><span class="stararea">★</span></div>
        </div>
    <input type="hidden" name="stars" id="starsRating" value="0">
        <div class="left1"> <p class="grijs"> klik om een score te geven </p> </div>

    <input type="text" id="1" name="titel" placeholder="Titel van beoordeling" required>


<textarea  class="reviewtextarea form-control" name="comment" id="5" rows="3" placeholder="Beoordeling... " required></textarea>

<input type="text" id="3" name="naam" placeholder="Naam" required>

<input type="text" id="4" name="email" placeholder="E-mailadres" required>


  <div class="knopcenter">
    <input type="submit" name="postReview" value="Beoordeling posten">
    </div>

  </form><br>
      <?php
      switch ($success){
          case 1:
              echo '<p style="text-align: center; color: #E62686">Bedankt voor uw review!</p>';
              break;
          case 2:
              echo '<p style="text-align: center; color: #E62686">De review versturen was mislukt</p>';
              break;
          case 3:
              echo '<p style="text-align: center; color: #E62686">U heeft te veel reviews of heeft te veel ongepaste reviews verstuurd</p>';
              break;      }
      ?>
</div>
</div>
  </div>

<!--  <script src="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.js"></script>-->
<!--  <script src="../dist/js/swiper.min.js"></script>-->
  <script src="./vendor/jquery/jquery.min.js"></script>
<!--  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>-->
<!--  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>-->
<!--  <script src="../js/jqBootstrapValidation.js"></script>-->
<!--  <script src="../js/style.js"></script>-->

  <script>
    $(function() {
  AOS.init();
});
  </script>
</body>

</html>
