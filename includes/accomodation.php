<?php
include("./backend/Category.php");
$category = new Category();
$res = $category->listRoom('category_ID');
$image=$category->listRoom1('category_ID');

?>
<section class="accomodation_area section_gap">
    <div class="container">
        <div class="section_title text-center">
            <h2 class="title_color">Hotel Accomodation</h2>
            <p>We all live in an age that belongs to the young at heart. Life that is becoming extremely fast, </p>
        </div>
        <div class="row ">
<?php
foreach($image as $key){
        foreach($res as $item){
if($key['category_ID']==$item['category_ID']){
        ?>
            <div class="col-lg-3 col-sm-6">
                <div class="accomodation_item text-center">
                    <div class="hotel_img">
                        <img src="image/<?php echo $key['name'];?>" alt="image"class="img-thumbnail" >
                    </div>
                    <a href="/room_detail.php">
                        <h4 class="sec_h4"><?php echo $item['category_name'] ?></h4>
                    </a>
<<<<<<< HEAD
                    <h5><?php echo $item['price_on_day']; ?><small>/night</small></h5>
=======
                    <h5>$250<small>/night</small></h5>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="accomodation_item text-center">
                    <div class="hotel_img">
                        <img src="image/room2.jpg" alt="">
                        <a href="#" class="btn theme_btn button_hover">Book Now</a>
                    </div>
                    <a href="room_detail.php">
                        <h4 class="sec_h4">Single Deluxe Room</h4>
                    </a>
                    <h5>$200<small>/night</small></h5>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="accomodation_item text-center">
                    <div class="hotel_img">
                        <img src="image/room3.jpg" alt="">
                        <a href="#" class="btn theme_btn button_hover">Book Now</a>
                    </div>
                    <a href="#">
                        <h4 class="sec_h4">Honeymoon Suit</h4>
                    </a>
                    <h5>$750<small>/night</small></h5>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="accomodation_item text-center">
                    <div class="hotel_img">
                        <img src="image/room4.jpg" alt="">
                        <a href="#" class="btn theme_btn button_hover">Book Now</a>
                    </div>
                    <a href="#">
                        <h4 class="sec_h4">Economy Double</h4>
                    </a>
                    <h5>$200<small>/night</small></h5>
>>>>>>> f54d23e183d9e9ef5c776c3d3a62bedbcfccacde
                </div>
            </div>
<?php }}}?>
        </div>
    </div>
</section>