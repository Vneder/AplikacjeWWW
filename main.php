<?php
    session_start();

    if(!isset($_SESSION['zalog'])){
        header("Location: index.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sklep zbrojny</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>

    <div class="container">
        <main class="main">
            <nav>
                <?php
                    echo "<h1>Witaj ".$_SESSION['user']."!</h1>";
                    echo '<p><a href="logout.php" class="btn">Log out</a></p>';
                ?>
            </nav>
            <h1>Sklep zbrojny</h1>

            
            <section class="products">
                <h2 class="title-row">Bronie krótkie</h2>
                <div class="row">
                    <div class="card">
                        <h3 class="title-gun">Glock 17</h3>
                        <div class="img-container">
                            <img src="./img/glock.png" alt="Glock 17" class="img-gun">
                        </div>
                        <div class="info-gun">
                            <p>Kaliber: 9mm parabellum</p>
                            <p>Pojemność magazynka: 17 naboi</p>
                            <p>Długość lufy: 114mm</p>
                            <p>Waga: 915g</p>
                            <p>Opór spustu: 28N</p>
                        </div>
                        <h3 class="price-gun">3 090,00 zł</h3>
                        <button class="buy-btn">Kup!</button>
                    </div>
                    <div class="card">
                        <h3 class="title-gun">Desert Eagle</h3>
                        <div class="img-container">
                            <img src="./img/digl.png" alt="Desert Eagle" class="img-gun">
                        </div>
                        <div class="info-gun">
                            <p>Kaliber: .44 Magnum</p>
                            <p>Pojemność magazynka: 8 naboi</p>
                            <p>Długość lufy: 6" / 152 mm</p>
                            <p>Waga: 2100g</p>
                            <p>Opór spustu: 4 lb / 2 kg</p>
                        </div>
                        <h3 class="price-gun">10 990,00 zł</h3>
                        <button class="buy-btn">Kup!</button>
                    </div>
                    <div class="card">
                        <h3 class="title-gun">HK Usp</h3>
                        <div class="img-container">
                            <img src="./img/usp.png" alt="Desert Eagle" class="img-gun">
                        </div>
                        <div class="info-gun">
                            <p>Kaliber: 9 Parabellum</p>
                            <p>Pojemność magazynka: 15 naboi</p>
                            <p>Długość lufy: 118 mm</p>
                            <p>Waga: 720g</p>
                            <p>Spust SA/DA</p>
                        </div>
                        <h3 class="price-gun">3000,00 zł</h3>
                        <button class="buy-btn">Kup!</button>
                    </div>
                </div>
                <h2 class="title-row">Karabiny</h2>
                <div class="row">
                    <div class="card">
                        <h3 class="title-gun">Ak-47</h3>
                        <div class="img-container">
                            <img src="./img/ak47.png" alt="Ak47" class="img-gun">
                        </div>
                        <div class="info-gun">
                            <p>Kaliber: 7,62 mm</p>
                            <p>Pojemność magazynka: 30 szt.</p>
                            <p>Długość lufy: 415mm</p>
                            <p>Waga: 4,3 kg</p>
                        </div>
                        <h3 class="price-gun">8000,00 zł </h3>
                        <button class="buy-btn">Kup!</button>
                    </div>
                    <div class="card">
                        <h3 class="title-gun">Galil ARM </h3>
                        <div class="img-container">
                            <img src="./img/galil.png" alt="Galil ARM" class="img-gun">
                        </div>
                        <div class="info-gun">
                            <p>Kaliber: 5.56mm (.223)</p>
                            <p>Pojemność magazynka: 25 szt.</p>
                            <p>Długość lufy: 460mm</p>
                            <p>Waga: 3,8 kg</p>
                        </div>
                        <h3 class="price-gun">4600,00 zł </h3>
                        <button class="buy-btn">Kup!</button>
                    </div>
                    <div class="card">
                        <h3 class="title-gun">M4</h3>
                        <div class="img-container">
                            <img src="./img/m4.png" alt="m4" class="img-gun">

                        </div>
                        <div div class="info-gun">
                            <p>Kaliber: 5.56mm (.223)</p>
                            <p>Pojemność magazynka: 30 szt.</p>
                            <p>Długość lufy: 370mm</p>
                            <p>Waga: 2,5 kg</p>
                        </div>
                        <h3 class="price-gun">9000,00 zł </h3>
                        <button class="buy-btn">Kup!</button>
                    </div>
                </div>
                <h2 class="title-row">Snajperki</h2>
                <div class="row">
                    <div class="card">
                        <h3 class="title-gun">REMINGTON M24</h3>
                        <div class="img-container">

                            <img src="./img/m24.png" alt="M24" class="img-gun">
                        </div>
                        <div class="info-gun">
                            <p>Kaliber: .308 Win.</p>
                            <p>Pojemność magazynka: 5 naboi</p>
                            <p>Długość lufy: 610 mm</p>
                            <p>Waga: 5,5 kg</p>
                            <p>Zasięg maksymalny: 2000 m</p>
                        </div>
                        <h3 class="price-gun">30 000,00 zł </h3>
                        <button class="buy-btn">Kup!</button>
                    </div>
                    <div class="card">
                        <h3 class="title-gun">McMillan TAC-50</h3>
                        <div class="img-container">
                            <img src="./img/tac50.png" alt="TAC50" class="img-gun">

                        </div>
                        <div class="info-gun">
                            <p>Kaliber: 12.7 mm</p>
                            <p>Pojemność magazynka: 5 naboi</p>
                            <p>Długość lufy: 737 mm</p>
                            <p>Waga: 11,8 kg </p>
                            <p>Zasięg maksymalny: 3500 m</p>
                        </div>
                        <h3 class="price-gun">50 000,00 zł </h3>
                        <button class="buy-btn">Kup!</button>
                    </div>
                    <div class="card">
                        <h3 class="title-gun">SWD</h3>
                        <div class="img-container">
                            <img src="./img/dragunov.png" alt="SWD" class="img-gun">

                        </div>
                        <div class="info-gun">
                            <p>Kaliber: 7,62 mm </p>
                            <p>Pojemność magazynka: 10 naboi</p>
                            <p>Długość lufy: 620 mm</p>
                            <p>Waga: 4,3 kg</p>
                            <p>Zasięg maksymalny: 2800 m</p>
                        </div>
                        <h3 class="price-gun">10 000,00 zł</h3>
                        <button class="buy-btn">Kup!</button>
                    </div>
                </div>
            </section>

            <div class="cart">
                <h2>Koszyk:</h2>
                <ul>
                    <!-- koszyk -->
                </ul>
                <hr>
                <h4>Łączna cena: <span class="total-price">0.00 zł</span></h4>
            </div>
            
        </main>
        <div class="cart-popup">Dodano do koszyka</div>

    </div>

    <script src="app.js"></script>
</body>

</html>