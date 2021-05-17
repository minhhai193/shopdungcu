    <div class="slide">
        <div id="slider1">
            <div class="owl-carousel owl-slider owl-theme">
                <?php
                    $showslider = $product ->show_slider();
                    if($showslider){
                        while($result_slide= $showslider->fetch_assoc()){

                ?>
                <div class="item">
                    <img src="admin/uploads/<?=$result_slide['image']?>">
                </div>
                <?php 
                        }
                    }
                 ?>
            </div>
        </div>
    </div>