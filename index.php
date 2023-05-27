
<!DOCTYPE html>
<html lang="en">
<head>
    
    <link rel="stylesheet" href="styles.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Home | 1ne Travel and Tours</title>
    <link rel="stylesheet" href="modal.css">
</head>
<body>
    <div class="modal-background" onclick="toggleModal()"></div>

    <div class="modal" id="modal">
        <h2>Thank you for contacting us!</h2>
        <p>
            Thank you for leaving an honest review!
        </p>
    </div>
    <script src="modal.js"></script>
    <?php 
        include 'header.php';
    ?>
    <div class="home">
        <div class="text">
        <img src="./img/<?php echo $row['logo_path'];?>" alt="" width="120px" class="hidden">
        <h1 class="home-content hidden">From <b style="color: #d7263d;">DREAM</b> to <b style="color: #03d3fc;">DESTINATION</b></h1>
        
        <p class="home-content hidden">Travel the world, one adventure at a time</p><br>
        <button class="home-content hidden" onclick="window.location.href='./index.php#contact';">Start Your Journey Now</button>
        </div>
        <div class="slider background-tint-dark">
            <div class="slides background-tint-dark">
                <input type="radio" name="radio-btn" id="radio1">
                <input type="radio" name="radio-btn" id="radio2">
                <input type="radio" name="radio-btn" id="radio3">
                <input type="radio" name="radio-btn" id="radio4">

                <div class="sliding first">
                    <img src="./img/shrine-entrance.jpg" alt="">
                </div>
                <div class="sliding">
                    <img src="./img/huts.jpg" alt="">
                </div>
                <div class="sliding">
                    <img src="./img/lake.jpg" alt="">
                </div>
                <div class="sliding">
                    <img src="./img/pic1.jpg" alt="">
                </div>
            </div>
        </div>
        
        
    </div>
    <script>
        var counter = 1;
        setInterval(function(){
            document.getElementById('radio' + counter).checked = true;
            counter++;
            if(counter > 4){
                counter = 1;
            }
        }, 5000);
    </script>
    <div class="home2 background-tint" id="about">
        <span class="hidden">TRAVEL
        <span style="font-weight: bold; color: #d7263d;">MORE,</span><br>
        <span class="hidden">WORRY
        <span style="font-weight: bold; color: #d7263d;">LESS.</span>
        
        <p class="hidden">We are a travel agency that provide diverse travel services to clients all <b>across the country</b>.<br> Founded in <b>2022</b>, we specialize in assisting you in your travel needs.</p>
        <button id="button" class="hidden" onclick="window.location.href='about.php';">Find Out More</button>
    </div>
    <div class="home3" id="services">
        <p class="hidden" style="color: grey;">What We Offer</p>
        <h1 class="hidden">SERVICES</h1>
        <br>
        <div class="services">
            <div class="flex flex-center" >
                <?php 
                    $query = "SELECT * FROM services;";
                    $result = mysqli_query($con, $query);
                    while($row = mysqli_fetch_assoc($result)){
                        echo '<div class="card-showcase hidden">
                        <div class="image">
                            <img src="./img/'.$row['sevice_imgPath'].'" alt="">
                        </div>
                        <div class="description">
                            <h4>'.strtoupper($row['service_name']).'</h4>
                        </div>
                    </div>';
                    }
                ?>
                
            </div>
        </div>
    </div>
    <div class="img-area background-tint-dark" id="img-area">
        <div class="text hidden">
            <p style="color: white;">At One Travel and Tours, our commitment to high-quality work extends beyond the booking process. </p>
            <span style="color: white; font-size: 32px;">We provide <b style="color: #d7263d;">timely assistance</b> and <b style="color: #d7263d;">support</b>, even while you are on the <b style="color: #d7263d;">go</b>.</span>
            
        </div>
        <img id="test" src="./img/suitcase2.jpeg"/>
    </div>
<script>
      window.addEventListener('scroll', () => {  
    let scrollTop = document.documentElement.scrollTop;
    document.getElementById('test').style.width = 100 + scrollTop / 5 + '%';
  });
window.addEventListener('scroll', () => {
  let imgElement = document.getElementById('test');
  let imgAreaElement = document.getElementById('img-area');
  
  let imgAreaRect = imgAreaElement.getBoundingClientRect();
  let imgAreaTop = imgAreaRect.top;
  let imgAreaBottom = imgAreaRect.bottom;
  
  let viewportHeight = window.innerHeight;
  
  if (imgAreaTop < viewportHeight && imgAreaBottom > 0) {
    let scrollTop = document.documentElement.scrollTop;
    let scrollPosition = imgAreaTop - scrollTop;
    let scrollPercentage = (viewportHeight - scrollPosition) / viewportHeight;
    let zoomLevel = 100 + (scrollPercentage * 20);
    console.log(zoomLevel);
    imgElement.style.width = zoomLevel + '%';
  }
});
</script>
<div class="featured-tours">
    <p class="hidden" style="color: grey;">Explore and Uncover</p>
    <h1 class="hidden">FEATURED PACKAGES</h1>
    <div class="tours">
        <?php 
            $query = "SELECT * FROM packages WHERE featured=1;";
            $result = mysqli_query($con, $query);
            while($row = mysqli_fetch_assoc($result)){
                echo "<div class='tour-card hidden'>
                <div class='tour-image'>
                    <img src='./img/".$row['pImgPath']."' alt=''>
                </div>
                <div class='intro'>
                    <h1>".$row['p_name']."</h1>
                    <p>".$row['p_desc']."</p>
                </div>
            </div>";
            }
        ?>
    </div>
    <button class="button" onclick="window.location.href = 'tours.php'">See All</button>
</div>
    <div class="home4" id="feedback">
        <p style="color: #fff;" class="hidden">Tried our services before?</p>
        <h3 style="color: #d7263d;" class="hidden"> <b>Give us a feedback!</b> </h3>
        <form action="sendmail.php" method="POST" class="hidden">
            <input type="text" name="fname" id="fname" placeholder="Your Name" required>
            <input type="email" name="femail" id="femail" placeholder="Your Email" required>
            <textarea name="fmessage" id="" cols="30" rows="5" placeholder="Your Feedback" required></textarea >
            <input type="submit" value="Send" onclick="document.querySelector('#modal h2').innerHTML = 'Thank you for your feedback!';
                document.querySelector('#modal p').innerHTML = 'We appreciate your thoughts and we will keep striving to become better.';
                toggleModal();
                setTimeout(function(){
                    window.location.href = 'index.php#feedback';
                }, 5000);" name="submit">
        </form>
        
    </div>
    <div class="home5">

        <p class="hidden" style="color: grey;">What Our Customers Say</p>
        <h1 class="hidden">Reviews</h1><br>
        <div class="flex flex-center">
        <?php 
            $query = "SELECT customers.cName, reviews.rating, reviews.r_msg, reviews.r_date FROM reviews JOIN customers ON reviews.cID = customers.cID LIMIT 3";
            $result = mysqli_query($con, $query);
            while($row = mysqli_fetch_assoc($result)){
                echo "<div class='feedback-container hidden flex flex-col flex-main-spacebetween'>
                <div>
                    ".$row['r_msg']."
                </div>
                <div style='align-self: flex-end;'>
                    <b>".$row['cName']."</b>
                </div>
            </div>";
            }
        ?>
            
            
        </div>
        <button id="button" class="hidden" onclick="window.location.replace('./feedback.php')">SEE ALL</button>
    </div>
    <div class="home6 background-tint-dark" id="contact">
        <div class="touch-container hidden">
            <p>Get in touch with</p>
            <div id="text-div">
            <img src="./img/<?php echo $logo;?>" alt="" style="width: 60px; margin: 10px 0;">
            <span>1ne Travel and Tours</span>
            </div>
            <button class="button" onclick="window.location.href = 'contact.php'">Inquire Now</button>
            <p style="font-size: 16px; margin: 10px 0;">Follow Us On</p>
            <a href="https://www.facebook.com/1netravelandtours"><img alt="Facebook" style="width: 32px; height: 32px; object-fit: cover;" fetchpriority="high" src="https://static.wixstatic.com/media/11062b_f4e3e7f537ff4762a1914aa14e3e36b9~mv2.png/v1/fill/w_32,h_32,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/11062b_f4e3e7f537ff4762a1914aa14e3e36b9~mv2.png"></a>
        </div>
    </div>
    <footer>
        Copyright © 2022 1NE Travel and Tours. All rights reserved.
    </footer>
    <script src="stickynav.js"></script>
    <script defer src="app.js"></script>
    
</body>
</html>
