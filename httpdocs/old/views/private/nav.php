<div class="overflow">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
        <a class="navbar-brand js-scroll-trigger" href="<?php if(isset($_GET['reviews']) || $action == 'contact' || $action == 'vacature' || $action == 'project' || $action == 'admin'){ echo './';} ?>#page-top">
            <img src="links/logo2.svg" class="fit" alt="logo"> </a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">

            <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="<?php if(isset($_GET['reviews']) || $action == 'contact' || $action == 'vacature' || $action == 'project' || $action == 'admin'){ echo './';} ?>#overons">Over ons</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="<?php if(isset($_GET['reviews']) || $action == 'contact' || $action == 'vacature' || $action == 'project' || $action == 'admin'){ echo './';} ?>#Portfolio">Portfolio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="<?php if(isset($_GET['reviews']) || $action == 'contact' || $action == 'vacature' || $action == 'project' || $action == 'admin'){ echo './';} ?>#Samenwerken">Samenwerken</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="<?php if(isset($_GET['reviews']) || $action == 'contact' || $action == 'vacature' || $action == 'project' || $action == 'admin'){ echo './';} ?>#Stage">Stage</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="<?php if(isset($_GET['reviews']) || $action == 'contact' || $action == 'vacature' || $action == 'project' || $action == 'admin'){ echo './';} ?>#Amsterdammertjes">Amsterdammertjes</a>
                </li>
                <li class="nav-item dropdown">
                    <a class=" nav-link dropdown-toggle <?php if(isset($_GET['reviews'])){ echo 'active2';} ?>" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Reviews
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="nav-link" href="reviews?reviews=stage">Reviews stage</a>
                        </li>
                        <li>
                            <a class="nav-link" href="reviews?reviews=bedrijf">Reviews bedrijf</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>