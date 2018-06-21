<?php
$error = 0;
if (!empty($_POST['email'])){

    $ext = strtolower(pathinfo($_FILES['CV']['name'],PATHINFO_EXTENSION));
    if ($ext=='pdf'||$ext=='doc'||$ext=='docx'){
    $vacature = new Crud('solicitatie');
    $filename = time().'.'.pathinfo($_FILES['CV']['name'],PATHINFO_EXTENSION);
        if(move_uploaded_file($_FILES["CV"]["tmp_name"], './images/cv/'.$filename)){
            $stmt = $vacature->insert(array('email'=>$_POST['email'],'keuze'=>$_POST['keuze'],'cv'=>$filename,'motivatie'=>$_POST['motivatie']));
            $id = $vacature->db->lastInsertId();

            $to = 'mamediamail@gmail.com';
            $subject = 'nieuwe Vacature';
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
            $message .= '<p>Er is net een nieuwe vacature voor stage binnen gekomen! bekijk het hier.</p><a href="http://www.mamedia.nl/admin?p=stage#'.$id.'">http://www.mamedia.nl/admin?p=stage#'.$id.'</a>';
            $message .= '</body></html>';

            if (mail($to, $subject, $message, $headers)){};
            $error = 1;
        }else{
            $error = 2;

        }
}else{
        $error = 3;

    }
}
?>
  <div class="papertrial">


    <a href="./" class="paper1 paper2"><p class="no"><i class="fa fa-home" aria-hidden="true"></i>
  Home / </p></a>


    <a href="./#Stage" class="paper paper2"><p class="no"><i class="fa fa-th" aria-hidden="true"></i>
 Stage / </p></a>


    <a href="vacature" class="paper paper2"><p class="no">  <i class="fa fa-folder" aria-hidden="true"></i>
Vacature  </p></a>



  </div>

  <div class="full2">
  <div class="bar2">
    <h2> VACATURE</h2>
  </div>

  <div class="intro">

      <br><br>
      <pre class="textbottom"><?php
          $tmparr = $pagesText->fetchAll(PDO::FETCH_ASSOC);
          echo $tmparr[2]['text'];?></pre>

  <form enctype="multipart/form-data" method="post">
    <label for="fname"></label>
    <input type="text" id="fname" name="email" placeholder="E-mailadres">



    <select class="grey" id="options" name="keuze">
        <option value="" disabled selected >Functie</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>

      </select>

         <label> Curriculum Vitae</label>
       <input type="file" name="CV" accept="application/pdf,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/msword">


<textarea name="motivatie" class="form-control" id="exampleTextarea" rows="3" placeholder="Motivatie..." required></textarea>



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
