<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="./icon.ico">
    <link rel="stylesheet" href="./style.css">
    <title>Kawiarnia</title>
</head>
<body>
    <header>
        <div id="logo">
            <a href="#"><img src="logo.svg" alt="cafe logo"></a>
        </div>
        <div id="title">Kawiarnia</div>
        <div id="navbar">
            <ul class="menu">
                <li><a href="#about-us">O nas</a></li>
                <li><a href="#offer">Oferta</a></li>
                <li><a href="#gallery">Galeria</a></li>
                <li><a href="#contact-us">Kontakt</a></li>
            </ul>
        </div>
    </header>
    <div id="box">
        <div id="slider">
            <div class="slides">
                <input type="radio" name="radio-btn" id="radio1" onclick="manualChange(1)" checked>
                <input type="radio" name="radio-btn" id="radio2" onclick="manualChange(2)">
                <input type="radio" name="radio-btn" id="radio3" onclick="manualChange(3)">
                <input type="radio" name="radio-btn" id="radio4" onclick="manualChange(4)">
                <!-- slide images -->
                <?php
                    $connect = new mysqli("localhost","root","","kawiarnia");
                    $sql = "SELECT id, name, alt FROM slider;";
                    $result = $connect->query($sql);
                    $name = [];
                    $alt = [];
                    while ($row = $result->fetch_assoc()){
                        $i = (int)$row['id'] - 1;
                        $name[$i] = $row['name'];
                        $alt[$i] = $row['alt'];
                    }
                    echo<<<SLIDES
                        <div class="slide first">
                            <img src="./images/slider/$name[0].jpg" alt="$alt[0]">
                        </div>
                        <div class="slide">
                            <img src="./images/slider/$name[1].jpg" alt="$alt[1]">
                        </div>
                        <div class="slide">
                            <img src="./images/slider/$name[2].jpg" alt="$alt[2]">
                        </div>
                        <div class="slide">
                            <img src="./images/slider/$name[3].jpg" alt="$alt[3]">
                        </div>
SLIDES;
                    $connect->close();
                ?>
                <div class="navigation-auto">
                    <div class="auto-btn1"></div>
                    <div class="auto-btn2"></div>
                    <div class="auto-btn3"></div>
                    <div class="auto-btn4"></div>
                </div>
            </div>
            <div class="navigation-manual">
                <label for="radio1" class="manual-btn"></label>
                <label for="radio2" class="manual-btn"></label>
                <label for="radio3" class="manual-btn"></label>
                <label for="radio4" class="manual-btn"></label>
            </div>
        </div>
    </div>

    <h2 id="about-us">O nas</h2>
    <div class="backgroundAbout">
        <div id="about-us-content" class="reveal">
            <div id="figure">
                <?php
                    $connect = new mysqli("localhost","root","","kawiarnia");
                    $sql = "SELECT id, name, alt FROM aboutus;";
                    $result = $connect->query($sql);
                    $row = $result->fetch_assoc();
                    echo "<img src='./images/$row[name].png' alt='$row[alt]'>";
                    $connect->close();
                ?>
            </div>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vulputate magna a risus malesuada tincidunt. Ut non turpis sapien. Maecenas mattis ultrices sem ac  pharetra. Morbi ut imperdiet lorem. Quisque sapien enim, convallis quis ipsum vel, laoreet posuere dui. Praesent pulvinar lectus et dolor fermentum pulvinar. Cras dignissim risus sed vulputate rutrum. Aliquam sed enim nec ante vehicula sollicitudin nec facilisis elit.<br><br>
            Duis in velit scelerisque, interdum turpis eleifend, sagittis lectus. Nullam nec faucibus orci, quis lacinia tortor. Duis nulla ipsum, tempor id massa at, ornare mattis nibh. Sed tempus sem vel velit molestie rhoncus. Donec vitae turpis lectus. Aenean ac varius elit. Aenean vel euismod nisl. Curabitur a mattis libero.<br><br>
            Suspendisse congue, est ac sagittis tempor, neque nunc dignissim nulla, ut finibus odio nisl eget massa. &#128151;&#128513;</p>
        </div>
    </div>

    <h2 id="offer">Oferta</h2>
    <div class="backgroundOffer">
        <div id="offer-content" class="reveal">
            <div id="offer-menu-left">
                <div class="offer-menu-heading">Kawa</div>
                <div class="offer-menu-product-list">
                    <div class="offer-menu-product">
                        <div class="product-name">espresso</div>
                        <div class="product-price">7 zł</div>
                    </div>
                    <div class="offer-menu-product">
                        <div class="product-name">espresso macchiato</div>
                        <div class="product-price">8 zł</div>
                    </div>
                    <div class="offer-menu-product">
                        <div class="product-name">americano</div>
                        <div class="product-price">9 zł</div>
                    </div>
                    <div class="offer-menu-product">
                        <div class="product-name">cappuccino</div>
                        <div class="product-price">9 zł</div>
                    </div>
                    <div class="offer-menu-product">
                        <div class="product-name">espresso doppio</div>
                        <div class="product-price">9 zł</div>
                    </div>
                    <div class="offer-menu-product">
                        <div class="product-name">doppio macchiato</div>
                        <div class="product-price">10 zł</div>
                    </div>
                    <div class="offer-menu-product">
                        <div class="product-name">latte</div>
                        <div class="product-price">11 zł</div>
                    </div>
                    <div class="offer-menu-product">
                        <div class="product-name">duże latte</div>
                        <div class="product-price">13 zł</div>
                    </div>
                    <div class="offer-menu-product">
                        <div class="product-name">flat white</div>
                        <div class="product-price">11 zł</div>
                    </div>
                    <div class="offer-menu-product">
                        <div class="product-name">drip</div>
                        <div class="product-price">13 zł</div>
                    </div>
                    <div class="offer-menu-product">
                        <div class="product-name">moccamaster</div>
                        <div class="product-price">10 zł</div>
                    </div>
                </div>
            </div>
            <div id="offer-menu-right">
                <div class="offer-menu-heading">Herbata</div>
                <div class="offer-menu-product-list">
                    <div class="offer-menu-product">
                        <div class="product-name">czarna Kenia</div>
                        <div class="product-price">8 zł</div>
                    </div>
                    <div class="offer-menu-product">
                        <div class="product-name">czarna earl grey Sri Lanka</div>
                        <div class="product-price">9 zł</div>
                    </div>
                    <div class="offer-menu-product">
                        <div class="product-name">zielona Chiny</div>
                        <div class="product-price">10 zł</div>
                    </div>
                    <div class="offer-menu-product">
                        <div class="product-name">zielona jaśminowa Chiny</div>
                        <div class="product-price">11 zł</div>
                    </div>
                    <div class="offer-menu-product">
                        <div class="product-name">herbata zielona</div>
                        <div class="product-price">15 zł</div>
                    </div>
                </div>
                <div class="offer-menu-heading">Na chłodne dni</div>
                <div class="offer-menu-product-list">
                    <div class="offer-menu-product">
                        <div class="product-name">kakao</div>
                        <div class="product-price">14 zł</div>
                    </div>
                    <div class="offer-menu-product">
                        <div class="product-name">napar imbir</div>
                        <div class="product-price">14 zł</div>
                    </div>
                    <div class="offer-menu-product">
                        <div class="product-name">napar rozmaryn</div>
                        <div class="product-price">14 zł</div>
                    </div>
                    <div class="offer-menu-product">
                        <div class="product-name">gorąca czekolada</div>
                        <div class="product-price">15 zł</div>
                    </div>
                    <div class="offer-menu-product">
                        <div class="product-name">grzaniec</div>
                        <div class="product-price">15 zł</div>
                    </div>
                </div>
            </div>
            <div id="offer-special">-20% na wszystkie napoje z ważną legitymacją studencką</div>
        </div> 
    </div>

    <h2 id="gallery">Galeria</h2>
    <div class="backgroundGallery">
        <div id="gallery-content" class="reveal">
            <?php
                $connect = new mysqli("localhost","root","","kawiarnia");
                $sql = "SELECT id, name, alt FROM gallery;";
                $result = $connect->query($sql);
                $name = [];
                $alt = [];
                while ($row = $result->fetch_assoc()){
                    $i = (int)$row['id'] - 1;
                    $name[$i] = $row['name'];
                    $alt[$i] = $row['alt'];
                }
                echo<<<CONTENT
                    <div class="gallery-cell">
                        <img src="./images/gallery/$name[0].jpg" alt="$alt[0]" class="gallery-cell-img">
                        <div class="gallery-cell-text">Kwiaty</div>
                    </div>
                    <div class="gallery-cell">
                        <img src="./images/gallery/$name[1].jpg" alt="$alt[1]" class="gallery-cell-img">
                        <div class="gallery-cell-text">Kubek</div>
                    </div>
                    <div class="gallery-cell">
                        <img src="./images/gallery/$name[2].jpg" alt="$alt[2]" class="gallery-cell-img">
                        <div class="gallery-cell-text">Cappuccino</div>
                    </div>
                    <div class="gallery-cell">
                        <img src="./images/gallery/$name[3].jpg" alt="$alt[3]" class="gallery-cell-img">
                        <div class="gallery-cell-text">Środek</div>
                    </div>
                    <div class="gallery-cell">
                        <img src="./images/gallery/$name[4].jpg" alt="$alt[4]" class="gallery-cell-img">
                        <div class="gallery-cell-text">Menu</div>
                    </div>
                    <div class="gallery-cell">
                        <img src="./images/gallery/$name[5].jpg" alt="$alt[5]" class="gallery-cell-img">
                        <div class="gallery-cell-text">Dodatki</div>
                    </div>
                    <div class="gallery-cell">
                        <img src="./images/gallery/$name[6].jpg" alt="$alt[6]" class="gallery-cell-img">
                        <div class="gallery-cell-text">Macchiato</div>
                    </div>
                    <div class="gallery-cell">
                        <img src="./images/gallery/$name[7].jpg" alt="$alt[7]" class="gallery-cell-img">
                        <div class="gallery-cell-text">Latte</div>
                    </div>
CONTENT;
                $connect->close();
            ?>
        </div>
    </div>
            
    <h2 id="contact-us">Kontakt do nas</h2>
    <div class="backgroundContact">
        <div id="contact-content" class="reveal">
            <div id="phone-nr" class="contact-tiles">Numer kontaktowy: +48 444 444 444</div>
            <div id="email" class="contact-tiles">Email kontaktowy: <a href="mailto:kawiarnia@gmail.com">kawiarnia@gmail.com</a></div>
            <div id="opening-hours" class="contact-tiles">
                Godziny otwarcia:<br><br>
                poniedziałek, 08:00–17:00<br>
                wtorek, 08:00–17:00<br>
                środa, 08:00–17:00<br>
                czwartek, 08:00–17:00<br>
                piątek, 08:00–17:00<br>
                sobota, 10:00–19:00<br>
                niedziela, 10:00–19:00
            </div>
            <div id="address" class="contact-tiles">Nasz adres: Zmyślona 44, 61-834 Poznań</div>
        </div>
    </div>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d608.4754754483922!2d16.933758406092707!3d52.40845409421937!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47045bb29ba4727d%3A0x6debfca6aaeccb8b!2sRatusz!5e0!3m2!1spl!2spl!4v1648902421713!5m2!1spl!2spl" title="map with the address marked" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

    <footer>Copyright &copy; <script>document.write(new Date().getFullYear())</script> Sebastian Malicki</footer>
    <script src="./scripts.js"></script>
</body>
</html>