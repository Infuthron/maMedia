<?php
$id = $_GET['id'];
$portfolio = new Crud('portfolio');
$sql = "SELECT * FROM portfolio ORDER BY rand() LIMIT 6";
$result = $mysqli->query($sql);
$ports = array();
while($row = $result->fetch_assoc()){
    array_push($ports, $row);
}
$portfolios = $portfolio->select(array(),array('id'=>$id));
foreach ($portfolios as $project){
    echo '
<div class="papertrial">

    <a href="./" class="paper1 paper2">
        <p class="no">
            <i class="fa fa-home" aria-hidden="true"></i>
            Home / </p>
    </a>


    <a href="./#Portfolio" class="paper paper2">
        <p class="no">
            <i class="fa fa-th" aria-hidden="true"></i>
            Portfolio / </p>
    </a>


    <a href="#" class="paper paper2">
        <p class="no">
            <i class="fa fa-folder" aria-hidden="true"></i>
            '.$project['titel'].' </p>
    </a>
</div>
<div class="full2">
    <div class="bar2">
        <h2> '.$project['titel'].'</h2>
    </div>
    <div class="intro2">
        <div class="row">
            <div class="col-sm-6 col-xs-12">
                <div class="responsive2">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="https://player.vimeo.com/video/'.$project['link'].'" allowfullscreen></iframe>
                    </div>
                </div>
                <p class="smalltextwrap">
                    '.$project['text'].'</p>
            </div>
            <div class="col-sm-6 col-xs-12">

                <div class="more">
                    <p class="moretext">Meer projecten</p>
                    <div class="projectrandoms2">
                    <div class="projectrandoms">
                    ';
                        for($i = 2; $i<count($ports)+2; $i++){
                            $row = $ports[$i-2];
                            if($i%2 == 0){
                                echo '</div><div class="projectrandoms">';
                            }
                            echo ' <div class="projectrandom"><a href="project?id='.$row['id'].'">
                                <img src="images/thumbnail/'.$row['filename'].'" alt="werk"></a>
                            </div>';
                        };
    echo '
                    </div>

                </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
                            '; };
                            ?>
