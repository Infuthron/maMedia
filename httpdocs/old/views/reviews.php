<?php
$reviews = new Crud('reviews');
$result = $reviews->select(array(),array('target'=>$_GET['reviews']),'ORDER BY `upload_date` DESC');
$reviewCount = $result->rowCount();
$allreviews = $result->fetchAll(PDO::FETCH_ASSOC);
$avgStars = 0;
foreach ($allreviews as $review){
    $avgStars += $review['stars'];
}
$avgStars=ceil($avgStars/$reviewCount);
?>
<div class="full6">
      <div class="bar3">
          <div class="normal">
            <div class="col-xs-12">
              <h2 > REVIEWS <?php echo strtoupper($_GET['reviews'])?> </h2>
            </div>
            <div class="col-xs-12">
              <div class="smalltext"><div class="review-container">
                  <div class="star <?php echo ($avgStars>=1)?'active':''; ?>"><span>★</span></div>
                  <div class="star <?php echo ($avgStars>=2)?'active':'';?>"><span>★</span></div>
                  <div class="star <?php echo ($avgStars>=3)?'active':'';?>"><span>★</span></div>
                  <div class="star <?php echo ($avgStars>=4)?'active':'';?>"><span>★</span></div>
                  <div class="star <?php echo ($avgStars>=5)?'active':'';?>"><span>★</span></div>
                  <div class="star"><span>(<?php echo $reviewCount?>)</span></div>
                </div></div>
            </div>
          </div>
        </div>

    <div class="reviews2" data-aos="zoom-in-down">
      <div id="reviews">
          <?php
          foreach ($allreviews as $row){
              echo '<div class="testimonial hidden ">
    <div class="reviewname">
      <div class="star3">';
              for ($i=1;$i<6;$i++) {
                  $active = ($row['stars']>=$i)?'active':'';
                  echo '<div class="star2 '.$active.'"><span class="stararea">★</span></div>';
              }
    echo '</div>
    <div class="star4"> <p>'.$row['titel'].'</p>
</div>
    </div>
    <div class="reviewname">              <div class="star3">
        <p class="left">'.$row['naam'].'</p> <p class="left2">|</p> <p class="left2">'.date_format(date_create($row['upload_date']),'j F Y').'</p> </div>
    </div>
    <div class="reviewname3">
        '.$row['comment'].'
      </div></div>';
          }?>
<div class="center" data-aos="fade-up"
data-aos-duration="20">
  <div class="container">
    <div class="row">
    <div class="col-xs-12 col-sm-6">
        <a class="js-scroll-trigger" href="#overons">
          <div id="show-more" class="buttonclass animated  zoomIn"> Lees meer </div>
        </a>
      </div>
      <div class="col-xs-12 col-sm-6">
        <a class="js-scroll-trigger" href="review-maken?reviews=<?php echo $_GET['reviews']?>">
          <div class="buttonclass5 animated  zoomIn"> Schrijf een review </div>
        </a>
      </div>        </div> </div> </div> </div>


</div>

</div>
  <style>
      .star2.active .stararea,.star.active{
          color:#f1c40f;
      }
  </style>
