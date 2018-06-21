

    <div class="full">
        <div class="full3">
        </div>
        <div class="wrap">

            <div class="title">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12">
                            <h1 class="animated  zoomInDown"><?php
                                $tmparr = $pagesText->fetch(PDO::FETCH_ASSOC);
                                echo $tmparr['text'];
                                ?></h1>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <a class="js-scroll-trigger" href="#overons">
                                <div class="buttonclass animated  zoomIn"> Wie wij zijn </div>
                            </a>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <a class="js-scroll-trigger" href="#Portfolio">
                                <div class="buttonclass2 animated  zoomIn"> Bekijk ons werk </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="full7" id="overons">
        <div class="bar">
            <div class="normal">
                <div class="col-xs-12">
                    <h2> OVER ONS </h2>
                </div>
                <div class="col-xs-12">
                    <p class="smalltext">mamedia is het mediaproductiebedrijf van het Mediacollege Amsterdam, gedreven door een jong team van video- en
                        tvmakers.
                    </p>
                </div>
            </div>
        </div>
        <div class="full4">
            <!--<div class="foto_overons">
                <img src="http://via.placeholder.com/1000x260" alt="over ons image"> </div>-->
            <div class="middlewrap">
        <pre class="smalltextwrap"><?php
            $tmparr = $pagesText->fetch(PDO::FETCH_ASSOC);
            echo $tmparr['text'];
            ?></pre>
            </div>
            <div class="social4">
                <h1 class="socal4font">HET TEAM</h1>
            </div>
            <div class="center2">
                <div class="container">
                    <div class="row">
                        <?php
                        $personeel = new Crud('personeel');
                        $personen = $personeel->select();
                        foreach ($personen as $persoon){
                        echo '<div class="col-md-3 col-sm-6 col-xs-12 col-padding">
                            <div class="wrap">
                                <div class="project2 col-centered">
                                    <img class="fit" src="./images/personeel/'.$persoon['image'].'" alt="werk">
                                </div>
                                <p class="naam">'.$persoon['naam'].'</p>
                                <p class="beschrijving">'.$persoon['text'].'</p>
                            </div>
                        </div>';
                        }
?>
                    </div>
                </div>
            </div>
            <div data-aos="zoom-in">
                <div class="social2">
                    <h1 class="socal2font">Volg ons op social media</h1>
                </div>
                <div class="social3">
                    <div class="size">
                        <a href="https://www.instagram.com/mamedia_/" target="blank">
                            <div class="round2">
                                <i class="fa fa-instagram animated infinite tada" aria-hidden="true"></i>
                            </div>
                        </a>
                        <a href="https://www.facebook.com/mamedia.amsterdam" target="blank">
                            <div class="round2">
                                <i class="fa fa-facebook animated infinite tada" aria-hidden="true"></i>
                            </div>
                        </a>
                        <a href="https://vimeo.com/mamedia" target="blank">
                            <div class="round2">
                                <i class="fa fa-vimeo animated infinite tada" aria-hidden="true"></i>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="full5" id="Portfolio">
        <div class="bar4">
            <div class="normal">
                <div class="col-xs-12">
                    <h2> PORTFOLIO </h2>
                </div>
                <div class="col-xs-12">
                    <p class="smalltext"> Dit is onze collectie van projecten en opdrachten </p>
                </div>
            </div>
        </div>
        <div class="swiper-container ">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="container">
                        <div class="row">
                            <div class="stage" data-aos="fade-right">
                                <p class="smaller"> Swipe voor meer </p>

                                <div class="swipe">
                                    <i class="fa fa-hand-o-down"></i>
                                </div>
                                <div class="swipe ontop">

                                    <i class="down fa fa-long-arrow-left"></i>
                                    <i class="down fa fa-long-arrow-right "></i>
                                </div>

                            </div>
                        <!-- <div class="load-more-container">
                  <input type="checkbox" id="load-more"/>
                  <ul> -->
                        <?php
                        $id = 0;
                        while ($row = $portfolioWerk->fetch(PDO::FETCH_ASSOC)) {
                            $id++;
                            echo '<a href="project?id='.$row['id'].'" class="col-md-3 col-sm-6 col-xs-12 col-padding">
                            <div class="project1 col-centered">
                                <img class="fit" src="images/thumbnail/'.$row['filename'].'" alt="werk">
                                <div class="overlay">
                                    <div class="text">'.$row['titel'].'</div>
                                </div>
                            </div>
                            </a>';
                            if($id==8 && $portfolioWerk->rowCount()%8!=0){
                                echo '</div>

                </div>
            </div>            <div class="swiper-slide">
                <div class="container">
                    <div class="row">
                        <div class="stage">
                            <p class="smaller"> Swipe for more </p>

                            <div class="swipe">
                                <i class="fa fa-hand-o-down"></i>
                            </div>
                            <div class="swipe ontop">

                                <i class="down fa fa-long-arrow-left"></i>
                                <i class="down fa fa-long-arrow-right "></i>
                            </div>

                        </div>';
                                $id = 0;
                            }
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>
        <!-- Add Arrows -->
        <div class="swiper-button-next">
            <i class="fa fa-chevron-right" aria-hidden="true"></i>

        </div>
        <div class="swiper-button-prev">
            <i class="fa fa-chevron-left" aria-hidden="true"></i>

        </div>
    </div>

</div>
    <div class="full2" id="Samenwerken">
        <div class="bar4 ">
            <div class="normal">
                <div class="col-xs-12">
                    <h2> SAMENWERKEN </h2>
                </div>
                <div class="col-xs-12">
                    <p class="smalltext2"> voor een goede praktijkopleiding werken we graag met echte projecten en klanten. </div>
            </div>
        </div>
        <div class="middlewrap">
        <pre class="smalltextwrap2"><?php
            $tmparr = $pagesText->fetch(PDO::FETCH_ASSOC);
            echo $tmparr['text'];
            ?></pre>
        </div>
        <div class="col-xs-12">
            <a class="js-scroll-trigger" href="contact">
                <div class="buttonclass3"> Neem contact op </div>
            </a>
        </div>

    </div>
    <div class="full2" id="Stage">
        <div class="bar4">
            <div class="normal">
                <div class="col-xs-12">
                    <h2> STAGE </h2>
                </div>
                <div class="col-xs-12">
                    <p class="smalltext">Mamedia biedt je een unieke stageplaats, waar je verantwoordelijkheid, ruimte om te experiementeren en veel creatieve
                        vrijheid krijgt.</p>
                </div>
            </div>
        </div>
        <!--<div class="foto_overons">
            <img src="http://via.placeholder.com/1000x250" alt="over ons image"> </div>-->
        <div class="middlewrap">
        <pre class="smalltextwrap"><?php
            $tmparr = $pagesText->fetch(PDO::FETCH_ASSOC);
            echo $tmparr['text'];
            ?></pre>
        </div>
        <div class="col-xs-12">
            <a class="js-scroll-trigger" href="vacature">
                <div class="buttonclass3"> Soliciteer nu </div>
            </a>
        </div>

    </div>
    <div class="bar1" id="Amsterdammertjes">
        <div class="normal" data-aos="zoom-in">
            <div class="col-xs-12">
                <h2 class="scale amsterdam"> AMSTERDERDAMMERTJES </h2>
            </div>
            <div class="col-xs-12">
                <pre style="color: #ffffff;" class="smalltext amsterdam"><?php
                    $tmparr = $pagesText->fetch(PDO::FETCH_ASSOC);
                    echo $tmparr['text'];
                    ?></pre>
            </div>
            <div class="col-xs-12">
                <a class="js-scroll-trigger " target="blank" href="http://www.salto.nl/programma/amsterdammertjes/">
                    <div class="buttonclass4"> Bekijk nu </div>
                </a>
            </div>
        </div>

    </div>

