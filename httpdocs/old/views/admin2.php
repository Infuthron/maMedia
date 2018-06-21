<?php if(LOGGED_IN) {
    if(!isset($_GET['p'])){
        $_GET['p'] = 'home';
    }
    ?><div style="width: 100%; padding: 10px; background-color: #DB2581; margin: -20px 0 20px;">
    <a href="?p=home" style="color: white;">Home teksten &nbsp; &nbsp;| </a>

    <a href="?p=opdrachten" style="color: white;">&nbsp; &nbsp;Opdrachten &nbsp; &nbsp; | </a>
    <a href="?p=portfolio" style="color: white;">&nbsp; &nbsp;Portfolio &nbsp; &nbsp; | </a>
    <?php if(ADMIN){ ?>
    <a href="?p=stage" style="color: white;">&nbsp; &nbsp;Stage &nbsp; &nbsp; |</a>
    <a href="?p=personeel" style="color: white;">&nbsp; &nbsp;Team &nbsp; &nbsp; | </a>
    <a href="?p=reviews&t=stage" style="color: white;">&nbsp; &nbsp;reviews stage &nbsp; &nbsp;| </a>
    <a href="?p=reviews&t=bedrijf" style="color: white;">&nbsp; &nbsp;reviews bedrijf &nbsp; &nbsp;| </a>
    <a href="?p=gebruikers" style="color: white;">&nbsp; &nbsp;Gebruikers &nbsp; &nbsp; | </a>
    <?php } ?>
    <a href="?logout" style="color: white;">&nbsp; &nbsp;Uitloggen</a>
</div>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <?php
    $personeel = new Crud('personeel');
    $reviews = new Crud('reviews');
    if (!empty($_POST['addPersoneel'])) {
        $path = 'images/personeel/';

        $filename = $_FILES['image']['name'];
        $tmp_filename = $_FILES['image']['tmp_name'];
        $target_file = $path . time() . '.'. pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $personeel->insert(array('naam' => $_POST['naam'], 'image' => basename($target_file), 'text' => $_POST['text']));
        } else {
        };
    }
    if (!empty($_POST['deletePersoon'])){

        $persoon =$personeel->select(array(),array('id'=>$_POST['id']))->fetch(PDO::FETCH_ASSOC);
        if (unlink('images/personeel/'.$persoon['image'])){
            $personeel->delete(array('id'=>$_POST['id']));
        }
    }
    if (!empty($_POST['project'])) {
        $res = $project->insert(array('bedrijfsnaam' => $_POST['bedrijfsnaam'], 'branche' => $_POST['branche'], 'straatnaam' => $_POST['straatnaam'], 'postcode' => $_POST['postcode'], 'telefoonnummer' => $_POST['telefoonnummer'], 'website' => $_POST['website'], 'naam' => $_POST['naam'], 'functie' => $_POST['functie'], 'mobiel' => $_POST['mobiel'], 'email' => $_POST['email'], 'beschrijving' => $_POST['beschrijving'], 'startdatum' => $_POST['startdatum'], 'opleverdatum' => $_POST['opleverdatum'], 'flexibel' => $_POST['flexibel'] == 'on', 'vragen' => $_POST['vragen']));;
    }

    if (!empty($_POST['editText'])) {
        $edit = $pages->update(array('text' => $_POST['text']), array('id' => $_POST['id']));
    }

    if (!empty($_POST['addWerk'])) {
        $link = $_POST['link'];
        $link = rtrim($link, '/');
        $link = trim(substr($link, strrpos($link, '/') + 1));

        $path = 'images/thumbnail/';

        $filename = $_FILES['img']['name'];
        $tmp_filename = $_FILES['img']['tmp_name'];
        $target_file = $path . basename($filename);

        $destination = $path . $filename;

        if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
            echo "Het bestand: " . basename($_FILES['img']['name']) . " is succesvol geupload.";
        } else {
            echo "dat is fout";
        };

        $portfolio->insert(array('titel' => $_POST['titel'], 'text' => $_POST['text'], 'filename' => $filename, 'link' => $link));
    }
    if (!empty($_POST['editWerk'])) {
        $link = $_POST['link'];
        $link = rtrim($link, '/');
        $link = trim(substr($link, strrpos($link, '/') + 1));
        $portfolio->update(array('titel' => $_POST['titel'], 'text' => $_POST['text'], 'link' => $link), array('id' => $_POST['id']));
    }
    if (!empty($_POST['deleteWerk'])) {
        $tmparr = $portfolio->select(array('filename'), array('id' => $_POST['id']))->fetch(PDO::FETCH_ASSOC);
        unlink('./images/thumbnail/' . $tmparr['filename']);
        $portfolio->delete(array('id' => $_POST['id']));
    }
    if (!empty($_POST['deleteOpdracht'])) {
        $opdrachten->delete(array('id' => $_POST['id']));
    }
    if (!empty($_POST['deleteStage'])) {
        $tmparr = $solicitatie->select(array('cv'), array('id' => $_POST['id']))->fetch(PDO::FETCH_ASSOC);
        unlink('./images/cv/' . $tmparr['cv']);
        $solicitatie->delete(array('id' => $_POST['id']));
    }

    $pagesText = $pages->select();

    if ($_GET['p'] == 'home') {
        echo "<h1 style='text-align: center'>Home Teksten</h1>";

        $text = $pagesText->fetch(PDO::FETCH_ASSOC);
        ?>
        <h3 style="text-align: center">Titel</h3>
        <form method="post" style="margin: 0 auto; text-align: center;">
            <input type="hidden" name="id" value="<?php echo $text['id'] ?>">
            <textarea style="width: 580px; height: 50px" name="text"><?php echo $text['text']; ?></textarea>
            <input name="editText" type="submit" value="Verander" style="display: block;">
        </form>
        <?php
        $text = $pagesText->fetch(PDO::FETCH_ASSOC);
        ?>
        <h3 style="text-align: center">over ons</h3>
        <form method="post" style="margin: 0 auto; text-align: center;">
            <input type="hidden" name="id" value="<?php echo $text['id'] ?>">
            <textarea style="width: 580px; height: 300px" name="text"><?php echo $text['text']; ?></textarea>
            <input name="editText" type="submit" value="Verander" style="display: block;">
        </form>
        <?php
        $text = $pagesText->fetch(PDO::FETCH_ASSOC);
        ?>
        <h3 style="text-align: center">samenwerken</h3>
        <form method="post" style="margin: 0 auto; text-align: center;">
            <input type="hidden" name="id" value="<?php echo $text['id'] ?>">
            <textarea style="width: 580px; height: 300px" name="text"><?php echo $text['text']; ?></textarea>
            <input name="editText" type="submit" value="Verander" style="display: block;">
        </form>
        <?php
        $text = $pagesText->fetch(PDO::FETCH_ASSOC);
        ?>
        <h3 style="text-align: center">stage</h3>
        <form method="post" style="margin: 0 auto; text-align: center;">
            <input type="hidden" name="id" value="<?php echo $text['id'] ?>">
            <textarea style="width: 580px; height: 300px" name="text"><?php echo $text['text']; ?></textarea>
            <input name="editText" type="submit" value="Verander" style="display: block; margin: 10px auto 15px;">
        </form>
        <?php
        $text = $pagesText->fetch(PDO::FETCH_ASSOC);
        ?>
        <h3 style="text-align: center">amsterdammertjes</h3>
        <form method="post" style="margin: 0 auto; text-align: center;">
            <input type="hidden" name="id" value="<?php echo $text['id'] ?>">
            <textarea style="width: 580px; height: 300px" name="text"><?php echo $text['text']; ?></textarea>
            <input name="editText" type="submit" value="Verander" style="display: block; margin: 10px auto 15px;">
        </form>
        <?php
    }  elseif ($_GET['p'] == 'opdrachten') {
        $opdrachten = $opdrachten->select();

        echo "<h1 style='text-align: center'>Opdrachten</h1>";
        ?>
        <div class="container">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Email</th>
                    <th>Beschrijving</th>
                    <th>Verwijder</th>
                </tr>
                </thead>
                <tbody>
                <?php
                while ($row = $opdrachten->fetch(PDO::FETCH_ASSOC)) {
                    echo "<form method='post'><tr><input name='id' type='hidden' value='".$row['id']."'/><td>" . $row['email'] . "</td><td><pre>" . $row['beschrijving'] . "</pre><a href='downloadText?p=".$_GET['p']."&id=".$row['id']."'>Download</a></td><td><input type=\"submit\" value=\"verwijder\" name=\"deleteOpdracht\"></td></input></form>";
                }
                ?>
                </tbody>
            </table>
        </div>
        <?php
    } elseif ($_GET['p'] == 'portfolio') {
        echo "<h1 style='text-align: center'>Portfolio</h1>";
        echo '<form method="post" enctype="multipart/form-data">
        
    <input name="titel" type="text" placeholder="Titel">
    <input name="link" type="text" placeholder="Video Link url">
    Thumbnail<input name="img" type="file" accept="image/*">
    <textarea name="text" rows="10" cols="20" placeholder="Beschrijving van project"></textarea>
    <input name="addWerk" type="submit">
</form>';
        $portfolios = $portfolio->select();
        echo '<table>';
        while ($row = $portfolios->fetch(PDO::FETCH_ASSOC)){
        echo '<tr><form method="post"><input type="hidden" name="id" value="'.$row['id'].'" ><td>'.$row['titel'].'</td><td><img height="50" src="images/thumbnail/'.$row['filename'].'"></td><td><input type="submit" value="verwijder" name="deleteWerk"></td></form></tr>';
        }
        echo '</table>';
    }
    //admin content
    if (ADMIN) {
        if ($_GET['p'] == 'personeel') {
            echo "<h1>Personeel</h1>";
            echo '<form method="post" enctype="multipart/form-data">
    <input required name="naam" type="text" placeholder="naam">
    foto<input required name="image" type="file" accept="image/*">
    <textarea required name="text" rows="10" cols="20" placeholder="Beschrijving van de persoon"></textarea>
    <input name="addPersoneel" type="submit">
</form><div class="center2">
                <div class="container">
                    <div class="row">';
            $personen = $personeel->select();
            foreach ($personen as $persoon) {
                echo '
<div class="col-md-3 col-sm-6 col-xs-12 col-padding">
                            <div class="wrap">
                            
                                <div class="project2 col-centered">
                                    <img class="fit" src="./images/personeel/' . $persoon['image'] . '" alt="werk">
                                </div>
                                <p class="naam">' . $persoon['naam'] . '</p>
                                <p class="beschrijving">' . $persoon['text'] . '</p>
                                <form method="post">
                                <input type="hidden" name="id" value="' . $persoon['id'] . '">
                                <input type="submit" name="deletePersoon" value="verwijderen"></form>
                            </div>
                        </div>';
            }
            echo '</div></div></div>';
        }elseif ($_GET['p'] == 'stage') {
            echo "<h1>Stage</h1>";
            $stage = $solicitatie->select();

            ?>
            <div class="container">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Email</th>
                        <th>Download CV</th>
                        <th>Motivatie</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    while ($row = $stage->fetch(PDO::FETCH_ASSOC)) {
                        echo "<tr><form method='post'><input type='hidden' name='id' value='".$row['id']."'><td>" . $row['email'] . "</td><td><a href='images/cv/" . $row['cv'] . "'>Download</a></td><td><pre>" . $row['motivatie'] . "</pre><a href='downloadText?p=".$_GET['p']."&id=".$row['id']."'>Download</a></td><td><input type=\"submit\" name='deleteStage' value=\"verwijder\"></td></form></tr>";
                    }
                    ?>
                    </tbody>
                </table>
            </div>
            <?php
        } elseif ($_GET['p'] == 'reviews') {
            if (!empty($_POST['deleteReview'])) {
                $reviews->delete(array('id' => $_POST['id']));
            } elseif (!empty($_POST['banReview'])) {
                $bannedip = new Crud('bannedip');
                $bannedip->insert(array('ip' => $_POST['ip']));
                $reviews->delete(array('id' => $_POST['id']));
            }
            $stmt = $reviews->select(array(), array('target' => $_GET['t']));
            echo '<div id="reviews">';
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo '<form method="post"><input type="hidden" name="id" value="' . $row['id'] . '"><input type="hidden" name="ip" value="' . $row['ip'] . '"><div>
    <div class="reviewname">
      <div class="star3">';
                for ($i = 1; $i < 6; $i++) {
                    $active = ($row['stars'] >= $i) ? 'active' : '';
                    echo '<div class="star2 ' . $active . '"><span class="stararea">★</span></div>';
                }
                echo '</div>
    <div class="star4"> <p>' . $row['titel'] . '</p>
</div>
    </div>
    <div class="reviewname">              <div class="star3">
        <p class="left">' . $row['naam'] . '</p> <p class="left2">|</p> <p class="left2">' . date_format(date_create($row['upload_date']), 'j F Y') . '</p> </div>
    </div>
    <div class="reviewname3">
        ' . $row['comment'] . '
      </div><input type="submit" value="verwijder review" name="deleteReview"><input type="submit" value="Ban deze persoon" name="banReview"></div></form>';
            }
            echo '</div>';

        } elseif ($_GET['p'] == 'gebruikers') {
            ?><br><br><br><br>
            <form style="background-color: white;
               padding: 50px;
               " method="post">
                <?php if (isset($registerSuccess)) {
                    if ($registerSuccess) {
                        echo "<h1>geregistreerd</h1>";
                    } else {
                        echo "<h1>registreren mislukt</h1>";
                    }
                } ?>
                Registrer een nieuwe gebruiker<br><br>
                e-mail: <input style="float: inherit; margin: inherit" type="text" name="username" placeholder="e-mail">
                wachtwoord: <input style="
    width: 100%;
    height: 45px;
    padding: 12px 20px;
    /*margin: 8px 0;*/
    border: 1px solid #ccc;
    box-sizing: border-box;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.30);
    margin-bottom: 40px;" type="password" name="password" placeholder="wachtwoord"><br>
                <input type="checkbox" name="admin" id="admin"><label style="float: inherit" for="admin">maak
                    admin</label><br>
                <input type="submit" name="register" value="registreer">
            </form>


            <?php
            $users = new Crud('users');
            if (!empty($_POST['save'])){
                $users->update(array('admin'=>(isset($_POST['admin']))?1:0),array('id'=>$_POST['id']));
            }elseif (!empty($_POST['delete'])){
                $users->delete(array('id'=>$_POST['id']));
            }
            $users = $users->select(array('id', 'admin', 'email'));
            while ($row = $users->fetch(PDO::FETCH_ASSOC)) {
                echo '<form method="post"><p style="display: inline">' . $row['email'] . '</p>&nbsp;&nbsp;&nbsp;<input type="hidden" value="' . $row['id'] . '" name="id"><input type="checkbox"';
                echo ($row['admin']) ? ' checked' : '';
                echo ' name="admin" id="admin"><label style="float: inherit" for="admin">maak admin</label><br><input type="submit" name="save" value="sla op"><input type="submit" name="delete" value="verwijder"><br></form><hr>';
            }
        }
    }
    ?>

    <style>
        pre {
            font-family: inherit;
            white-space: pre-wrap;
        }
    </style>

    <?php
}else{
    ?><br><br><br><br>

<form style="background-color: white;padding: 50px;" method="post">
   <div style="max-width: 500px; margin-right: auto; margin-left: auto;">
    <?php if (isset($loginSuccess)){
        if ($loginSuccess){
            echo "<h1>ingelogd</h1>";
        }else{
            echo "<h1>inloggen mislukt</h1>";
        }
    }?>
    Log in om deze pagina te bekijken<br><br>
    e-mail: <br> <br> <input style="float: inherit; margin: inherit;     max-width: 500px;
" type="text" name="username" placeholder="e-mail"> <br> <br>
    wachtwoord: <br> <br> <input style="
    max-width: 500px;
    width: 100%;
    height: 45px;
    padding: 12px 20px;
    /*margin: 8px 0;*/
    border: 1px solid #ccc;
    box-sizing: border-box;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.30);
    margin-bottom: 40px;" type="password" name="password" placeholder="wachtwoord"><br>
    <input type="submit" name="login" value="log in">
  </div>
</form>
    <br><br><br><br><br><br><br>

<?php
}
?>
