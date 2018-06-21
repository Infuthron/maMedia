<?php
$error = 0;
if (!empty($_POST['email'])){
    $opdrachten = new Crud('opdrachten');
        $opdrachten->insert(array('email'=>$_POST['email'],'keuze'=>$_POST['keuze'],'beschrijving'=>$_POST['beschrijving']));

    $id = $opdrachten->db->lastInsertId();

    $to = 'mamediamail@gmail.com';
    $subject = 'nieuwe Opdracht';
    $from = 'mamediamail@gmail.com';

// To send HTML mail, the Content-type header must be set
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Create email headers
    $headers .= 'From: '.$from."\r\n".
        'Reply-To: '.$from."\r\n" .
        'X-Mailer: PHP/' . phpversion();

// Compose a simple HTML email message
    $message = '<html><body>';
    $message .= '<h1>Hallo Mamedia</h1>';
    $message .= '<p>Er is net een nieuwe opdracht binnen gekomen! bekijk het hier.</p><a href="http://www.mamedia.nl/admin?p=opdrachten#'.$id.'">http://www.mamedia.nl/admin?p=opdrachten#'.$id.'</a>';
    $message .= '</body></html>';

    if (mail($to, $subject, $message, $headers)){};
        $error = 1;

}
?>
  <div class="papertrial">

    <a href="./" class="paper1 paper2"><p class="no"><i class="fa fa-home" aria-hidden="true"></i>
  Home / </p></a>


    <a href="./#Stage" class="paper paper2"><p class="no"><i class="fa fa-th" aria-hidden="true"></i>
 Samenwerken / </p></a>


    <a href="vacature" class="paper paper2"><p class="no"> <i class="fa fa-folder" aria-hidden="true"></i>
Contact  </p></a>



  </div>
  <div class="full2">
  <div class="bar2">
    <h2> CONTACT</h2>
  </div>
  <div class="intro">

       <pre class="textbottom"><?php
           $tmparr = $pagesText->fetchAll(PDO::FETCH_ASSOC);
           echo $tmparr[1]['text'];?></pre>


  <form method="post">
    <label for="fname"></label>
    <input type="text" id="fname" name="email" placeholder="E-mailadres">




    <select class="grey" id="options" name="keuze">
      <option value="" disabled selected >Onderwerp</option>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>

    </select>

<textarea name="beschrijving" class="form-control" id="exampleTextarea" rows="3" placeholder="Bericht..." required></textarea>



  <div class="knopcenter">
    <input type="submit" value="verzenden">
      <?php
      switch ($error){
          case 1:
              echo '<p style="text-align: center;margin-top: 20px; color: #E62686">Succesvol verstuurd!</p>';
              break;
          case 2:
              echo '<p style="text-align: center;margin-top: 20px; color: #E62686">fout met uploaden</p>';
              break;
          case 3:
              echo '<p style="text-align: center;margin-top: 20px; color: #E62686">dit bestand wordt niet ondersteund</p>';
              break;
          default:
      }
      ?>
    </div>
  </form>

</div>
</div>
  </div>
