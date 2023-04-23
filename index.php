<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="styles.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
        <img src="./img/marwinlogowhiters.png" alt="">
        <ul>
            <li>
                <a href="#">Home</a>
                <a href="#about">About</a>
                <a href="#services">Services</a>
                <a href="#feedback">Feedback</a>
                <a href="#contact">Contact</a>
            </li>
        </ul>
        
    </header>
    <div class="home">
        <h1 class="hidden">FROM DREAM TO DESTINATION</h1>
        <p class="hidden">Let's turn your wanderlust into reality</p>
    </div>
    <div class="home2 background-tint" id="about">
        <span class="hidden">TRAVEL
        <span style="font-weight: bold; color: #d7263d;">MORE,</span><br>
        <span class="hidden">WORRY
        <span style="font-weight: bold; color: #d7263d;">LESS.</span>
        
        <p class="hidden">We are a travel agency that provide diverse travel services to clients all <b>across the country</b>.<br> Founded in <b>2022</b>, we specialize in assisting you in your travel needs.</p>
        <button class="hidden">Find Out More</button>
    </div>
    <div class="home3" id="services">
        <p class="hidden" style="color: grey;">What We Offer</p>
        <h1 class="hidden">SERVICES</h1>
        <br>
        <div class="flex">
            <div class="card-showcase hidden">
                <div class="image">
                    <img src="./img/philippines.jpg" alt="">
                </div>
                <div class="description">
                    <h4>INTERNATIONAL & DOMESTIC BOOKING</h4>
                </div>
            </div>
            <div class="card-showcase hidden">
                <div class="image">
                    <img src="./img/philippines.jpg" alt="">
                </div>
                <div class="description">
                    <h4>HOTEL RESERVATION</h4>
                </div>
            </div>
            <div class="card-showcase hidden">
                <div class="image">
                    <img src="./img/philippines.jpg" alt="">
                </div>
                <div class="description">
                    <h4>PASSPORT APPOINTMENT</h4>
                </div>
            </div>
            <div class="card-showcase hidden">
                <div class="image">
                    <img src="./img/philippines.jpg" alt="">
                </div>
                <div class="description">
                    <h4>VISA ASSISTANCE</h4>
                </div>
            </div>
        </div>
        <button class="hidden">Learn More</button>
    </div>
    <div class="home4">
        <p style="color: #fff;" class="hidden">Tried our services before?</p>
        <h3 style="color: #d7263d;" class="hidden"> <b>Give us a feedback!</b> </h3>
        <form action="sendmail.php" method="POST" class="hidden">
            <input type="text" name="fname" id="fname" placeholder="Your Name" required>
            <input type="email" name="femail" id="femail" placeholder="Your Email" required>
            <textarea name="fmessage" id="" cols="30" rows="5" placeholder="Your Feedback"></textarea required>
            <input type="submit" value="Send" onclick="feedback();" name="submit">
        </form>
        
    </div>
    <div class="home5" id="feedback">

        <p class="hidden" style="color: grey;">What Our Customers Say</p>
        <h1 class="hidden">Reviews</h1><br>
        <div class="flex">
            <div class="feedback-container hidden">
                testawdtawdt tawd awdtaw dtawd awtd awdtaw dtawd tawd awtd awtd awdt awdt awdta wdawtd awtd awtd awtd awtd watdaw dtw dawtd awtd wtd awtd awtd awtd awtd awtd awtd awtd awtd awtd awtd awtd awtd awtd awtd awtd awtd awtd"
                <br><br><b>-yung nagsabe hahaha</b>
            </div>
            <div class="feedback-container hidden">
                "testawdtawdt tawd awdtaw dtawd awtd awdtaw dtawd tawd awtd awtd awdt awdt awdta wdawtd awtd awtd awtd awtd watdaw dtw dawtd awtd wtd awtd awtd awtd awtd awtd awtd awtd awtd awtd awtd awtd awtd awtd awtd awtd awtd awtd"
                <br><br><b>-yung nagsabe hahaha</b>
            </div>
            <div class="feedback-container hidden">
                "testawdtawdt tawd awdtaw dtawd awtd awdtaw dtawd tawd awtd awtd awdt awdt awdta wdawtd awtd awtd awtd awtd watdaw dtw dawtd awtd wtd awtd awtd awtd awtd awtd awtd awtd awtd awtd awtd awtd awtd awtd awtd awtd awtd awtd
                <br><br><b>-yung nagsabe hahaha</b>
            </div>
        </div>
        <button class="hidden" onclick="window.location.replace('./feedback.html')">SEE ALL</button>
    </div>
    <div class="home6" id="contact">
        <div class="flex">
            <div class="form hidden">
                <span>Get in touch with us</span>
                
                <p><b>Phone:</b> (044) 760 9014</p>
                <p><b>Email:</b> onetravelandtours@yahoo.com</p><br>
                <p>Reach out to us for any business enquiries, partnership proposals, and everything else in between! </p>
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
                <span>Located in</span><br>
                <p><b>Address:</b> Unit 205 CDS Bldg Gen Alejo Hiway Poblacion Bustos 3007 Bulacan, Philippines</p>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3854.7365812873004!2d120.91431897572036!3d14.951762185577206!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397aaa077444cd9%3A0xc0db8742e8fb2e8!2sNesabel%20Corporation!5e0!3m2!1sen!2sph!4v1682242092278!5m2!1sen!2sph" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
        
    </div>
    <script type="text/javascript">
        console.log("test");
        window.addEventListener("scroll", function() {
            var header = document.querySelector('header');
            header.classList.toggle("scrolled", window.scrollY > 0);
            if(window.scrollY > 0){
                
            }
            
        });
    </script>
    <script defer src="app.js"></script>
</body>
</html>
