<div class="footer-section">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm12 col-xs-12">
                <img src="links/logo2.svg" class="fit2" alt="footer-logo">
                <p class="whitep"> Contactweg 36
                    <br> 1014 AN Amsterdam </p>
            </div>
            <div class="col-md-3 col-sm-12 col-xs-12">
                <h5 class="white"> Postadres </h5>
                <p class="whitep"> Mediacollege Amsterdam
                    <br> t.a.v. Mamedia
                    <br> Postbus 67003
                    <br> 1060 JA Amsterdam </p>
            </div>
            <div class="col-md-3 col-sm-12 col-xs-12">
                <h5 class="white"> Telefoon </h5>
                <a class="whitep" href="tel:0208509557">
                    <p class="whitep"> 020 850 9557 </p>
                </a>
                <h5 class="top"> Email-adres </h5>
                <a href="mailto:mamediamail@gmail.com">
                    <p class="whitep"> mamediamail@gmail.com </p>
                </a>
            </div>
            <div class="col-md-3 col-sm-12 col-xs-12 ">
                <h5 class="white"> Social media </h5>
                <div class="socialwrap">
                    <a href="https://www.instagram.com/mamedia_/" target="blank">
                        <div class="round3">
                            <i class="fa fa-instagram" aria-hidden="true"></i>
                        </div>
                    </a>
                    <a href="https://www.facebook.com/mamedia.amsterdam" target="blank">
                        <div class="round">
                            <i class="fa fa-facebook" aria-hidden="true"></i>
                        </div>
                    </a>
                    <a href="https://vimeo.com/mamedia" target="blank">
                        <div class="round">
                            <i class="fa fa-vimeo" aria-hidden="true"></i>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script src="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.js"></script>
<script src="dist/js/swiper.min.js"></script>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="js/jqBootstrapValidation.js"></script>
<script src="js/style.js"></script>

<script>
    var swiper = new Swiper('.swiper-container', {
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });
    function showMore(){
        $('.hidden:lt(4)').removeClass('hidden');
    };

    $(document).ready(function(){
        $('.hidden:lt(4)').removeClass('hidden');
        $('#show-more').on('click', showMore);
    });

    $(function () {
        AOS.init();
    });

</script>

</body>

</html>