<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="about.css">
    <link rel="stylesheet" href="feedback.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
</head>
<body>
    <header>
        <img src="./img/marwinlogowhiters.png" alt="">
        <ul>
            <li>
                <a href="./index.php#">Home</a>
                <a href="./index.php#about">About</a>
                <a href="./index.php#services">Services</a>
                <a href="./index.php#feedback">Feedback</a>
                <a href="./index.php#contact">Contact</a>
            </li>
        </ul>
        
    </header>
    <div class="page1 background-tint-dark">
        <div class="about-details1 hidden">
            <h1>We want you to experience the best journey of your life!</h1>
        </div>
        <div class="about-details2 hidden">
            <p>We are a full-service travel agency dedicated to providing our clients with exceptional travel experiences. Our team of experienced professionals is passionate about travel and committed to delivering the highest level of customer service.</p>
        </div>
    </div>
    <div class="page2 background-tint-dark">
        <div class="div" style="display: flex;
    justify-content: center;
    align-items: flex-start;
    flex-direction: row;">
        <div class="text-side hidden">
            <h3>At 1NE Travel and Tours, we believe that <b style="color: #d7263d;">travel</b> is <b style="color: #d7263d;">more than just visiting new places</b>.</h3>
            <br>
            <p>It's about immersing yourself in new cultures, experiencing unique adventures, and creating memories that will last a lifetime.</p>
        </div>
        <div class="video-side hidden">
            <iframe src="https://www.facebook.com/plugins/video.php?height=314&href=https%3A%2F%2Fwww.facebook.com%2F1netravelandtours%2Fvideos%2F455122020039429%2F&show_text=false&width=560&t=0" width="640" height="480" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share" allowFullScreen="true"></iframe>
        </div>
        </div>
        
        
    </div>
    <div class="page3 background-tint-dark">
        <p class="hidden">We pride ourselves on our attention to detail and commitment to providing our clients with the best possible travel experiences. Our goal is to make your travel dreams a reality and ensure that every aspect of your trip is seamless and stress-free.</p>
        <div class="vision_mission">
            <div class="mission hidden">
                <h1>Our <b style="color: #d7263d;">Mission </b></h1>
                <p>To offer remarkable travel experiences that encourage our customers to discover unfamiliar cultures and locations.</p>
                <p>To produce unforgettable expeditions that meet our clients' desires and surpass their expectations.</p>
            </div>
            <div class="vision hidden">
                <h1>Our <b style="color: #d7263d;">Vision</b></h1>
                <p>We aim to become the best among travel agencies in the country, by offering outstanding service, creative travel solutions, and memorable experiences that surpass our customers' expectations, while fostering a love for exploration.</p>
            </div>
        </div>
        
    </div>
    <div class="page4 background-tint-dark">
        <p class="hidden">Travel with confidence and peace of mind, knowing that our team is dedicated to your satisfaction.</p>
        <h3 id="p1" class="hidden">We ensure that your travel needs are met with <b style="color: #d7263d;">professionalism</b>, <b style="color: #d7263d;">efficiency</b>, and <b style="color: #d7263d;">attention to detail</b>.</h3>
    </div>
    <div class="home6 background-tint-dark" id="contact">
        <div class="flex flex-main-center">
            <div class="form hidden">
                <span>Get in <b style="color: #d7263d;">touch</b> with us</span>
                
                <p><b>Phone:</b> (044) 760 9014</p>
                <p><b>Email:</b> onetravelandtours@yahoo.com</p><br>
                <p>Reach out to us for any business enquiries, service assistance, and everything else in between! </p>
                <hr>
            <form action="">
                <div class="flex">
                    <div style="width: 100%;">
                        <label for="cname">Full Name</label><br>
                        <input type="text" name="cname" id="" placeholder="e.g. Jonas C. Vasallo" required><br>
                        <label for="phone">Contact Number</label><br>
                        <input type="tel" name="phone" id="" placeholder="e.g. 09123456789" required>
                    </div>
                    <div class="div" style="width: 100%;">
                        <label for="email">Email Address</label><br>
                        <input type="email" name="email" id="" placeholder="e.g. example@mail.com" required><br>
                        <label for="inquiry">Choose Option</label><br>
                        <select name="options" id="options">
                            <option value="" disabled selected>Select your option</option>
                            <option value="Inquire">Inquire</option>
                            <option value="Help">Help</option>
                          </select><br>
                    </div>
                </div>
                <label for="message">Message</label><br>
                <textarea name="message" id="" cols="30" rows="10" placeholder="Type your message here..." required></textarea>
                <input type="submit" value="Submit">


            </form>
            </div>
            <div class="contact hidden">
                <span><b style="color: #d7263d;">Located</b> in</span><br>
                <p><b>Address:</b> Unit 205 CDS Bldg Gen Alejo Hiway Poblacion Bustos 3007 Bulacan, Philippines</p>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3854.7365812873004!2d120.91431897572036!3d14.951762185577206!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397aaa077444cd9%3A0xc0db8742e8fb2e8!2sNesabel%20Corporation!5e0!3m2!1sen!2sph!4v1682242092278!5m2!1sen!2sph" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
        
    </div>
    <footer>
        Copyright © 2022 1NE Travel and Tours. All rights reserved.
    </footer>
    <script src="app.js"></script>
</body>
</html>