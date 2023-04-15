<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BobbyShop</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Schibsted+Grotesk&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.green.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('images/icon.png') }}">
</head>
<body>
<header id="header" class="fixed-top">
    <div class="fas fa-bars"></div>
    <a href="#" class="logo"><i class="fas fa-shopping-bag"></i><h1>BobbyShop</h1></a>
    <div class="left">
        <div class="fas fa-shopping-cart" id="cart-icon"></div>
    </div>
    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
    @if(session()->has('danger'))
        <div class="alert alert-danger">
            {{ session()->get('danger') }}
        </div>
    @endif
    <nav class="navbar">
        <ul>
            <li><a href="#home">Home</a></li>
            <li><a href="#product">Games</a></li>
            <li><a href="#mmo-rpg">MMO RPG</a></li>
            <li><a href="#fps">FPS</a></li>
            <li><a href="#battle-royal">Battle Royal</a></li>
            <li><a href="#sandbox">Sandbox</a></li>
        </ul>
    </nav>

    <div class="shopping-cart">
        <i class="fa-solid fa-xmark" id="close-cart"></i>
        <h2 class="cart-title">Your Cart</h2>
        <form method="post">
            @csrf
            <div class="cart-content">

            </div>
            <div class="delivery">
                <h2>Delivery Information</h2>
            </div>
            <div class="payment">
                <div class="form">
                    <label for="emial" class="form-label">Email</label>
                    <input type="email" name="form[order_email]" id="email">
                </div>
                <div class="form">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="form[order_firstname]" id="name">
                </div>
                <div class="form">
                    <label for="surname" class="form-label">Surname</label>
                    <input type="text" name="form[order_lastname]" id="surname">
                </div>
                <div class="form">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" name="form[order_address]" id="address">
                </div>
            </div>
            <div class="total">
                <div class="total-title">Total:</div>
                <div class="total-price">0 PLN</div>
                <button class="cart-buy" type="submit">Submit</button>
            </div>
        </form>
    </div>
</header>
<section id="home" class="owl-carousel owl-theme home-slider">

    <div class="slide item">
        <div class="content text-left ms-md-5 ps-md-5">
            <h1>World Of Warcraft</h1>
            <p>World of Warcraft (WoW) is a massively multiplayer online role-playing game (MMORPG) released in 2004 by Blizzard Entertainment. Set in the Warcraft fantasy universe, World of Warcraft takes place within the world of Azeroth, approximately four years after the events of the previous game in the series, Warcraft III: The Frozen Throne.The game was announced in 2001, and was released for the 10th anniversary of the Warcraft franchise on November 23, 2004. Since launch, World of Warcraft has had nine major expansion packs: The Burning Crusade (2007), Wrath of the Lich King (2008), Cataclysm (2010), Mists of Pandaria (2012), Warlords of Draenor (2014), Legion (2016), Battle for Azeroth (2018), Shadowlands (2020), and Dragonflight (2022).</p>
        </div>

        <div class="image">
            <img src="images/wow.png" alt="">
        </div>
    </div>

    <div class="slide item">
        <div class="content text-left ms-md-5 ps-md-5">
            <h1>League Of Legends</h1>
            <p>League of Legends (LoL), commonly referred to as League, is a 2009 multiplayer online battle arena video game developed and published by Riot Games. Inspired by Defense of the Ancients, a custom map for Warcraft III, Riot's founders sought to develop a stand-alone game in the same genre. Since its release in October 2009, League has been free-to-play and is monetized through purchasable character customization. The game is available for Microsoft Windows and macOS.</p>
        </div>

        <div class="image">
            <img src="images/lol.png" alt="">
        </div>
    </div>

    <div class="slide item">
        <div class="content text-left ms-md-5 ps-md-5">
            <h1>Valorant</h1>
            <p>Valorant is a team-based first-person tactical hero shooter set in the near future. Players play as one of a set of Agents, characters based on several countries and cultures around the world. In the main game mode, players are assigned to either the attacking or defending team with each team having five players on it.</p>
        </div>

        <div class="image">
            <img src="images/valorant-main.png" alt="">
        </div>
    </div>
</section>

<section id="product">
    <h1 class="heading">Games</h1>

    @foreach ($products as $key => $product)
    <div class="product-container">
        <a class="anchor" id="mmo-rpg"></a>
        <h2 class="title">{{ $key }}</h2>

        <div class="product-slider owl-carousel owl-theme">
            @foreach ($product as $k => $v)
            <div class="product-card item">
                <div class="image">
                    <img class="product-image" src='{{asset("storage/{$v['product_filepath']}")}}' alt="">
                </div>

                <div class="content">
                    <h3 class="product-name">{{ $v['product_name'] }}</h3>
                    <div class="product-id" style="display: none;">{{ $v['id_product'] }}</div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <div class="price">{{ $v['product_price'] }}</div>
                </div>

                <div class="info">
                    <h4>Product Info</h4>
                    <p>{{ $v['product_description'] }}. </p>
                    <button class="add-cart">Add to cart</button>
                    <div class="share">
                        <a href="https://www.facebook.com/" class="fab fa-facebook-f"></a>
                        <a href="https://twitter.com/" class="fab fa-twitter"></a>
                        <a href="https://www.instagram.com/" class="fab fa-instagram"></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>>
    @endforeach

</section>

<section id="offer">
    <div class="heading">About Us</div>

    <div class="images">
        <div class="box">
            <img src="images/dolar-logo.png" alt="">
            <h3>Best Prices</h3>
        </div>

        <div class="box">
            <img src="images/contact-logo.png" alt="">
            <h3>Instant Service</h3>
        </div>

        <div class="box">
            <img src="images/mail-loog.png" alt="">
            <h3>Free Shipping</h3>
        </div>
    </div>
    <div class="deal">
        <div class="image">
            <img src="images/lol.png" alt="">
        </div>

        <div class="content">
            <h4>League Of Legends</h4>
            <p>Up to 30%</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
        </div>
    </div>
</section>

<section id="brand">
    <div class="brand-slider owl-carousel owl-theme">
        <img src="images/riot-logo.png" alt="" class="item">
        <img src="images/battlenet-logo.png" alt="" class="item">
        <img src="images/steam-logo.png" alt="" class="item">
        <img src="images/rockstar-logo.png" alt="" class="item">
        <img src="images/ubisoft-logo.png" alt="" class="item">
    </div>
</section>

<section id="footer" class="container-fluid">

    <div class="row">
        <div class="col-md-4 text-center brand-info">
            <a href="" class="logo"><i class="fas fa-shopping-bag"></i><h3>BobbyShop</h3></a>
            <p>Undisputed leader among distributors of computer games.</p>
        </div>
        <div class="col-md-4 text-center links">
            <h3>Links</h3>
            <div class="nav-links">
                <a href="https://www.facebook.com/">Facebook</a>
                <a href="https://www.instagram.com/">Instagram</a>
                <a href="https://www.tiktok.com/pl-PL/">Tiktok</a>
            </div>
        </div>
        <div class="col-md-3 text-center follow-us">
            <h3>Follow us</h3>
            <div class="follow-us-links">
                <a href="https://store.steampowered.com/">Steam</a>
                <a href="https://www.riotgames.com/en">Riot Games</a>
                <a href="https://www.blizzard.com/pl-pl/">Blizzard</a>
            </div>
        </div>
    </div>

    <div class="credit text-center">
        &copy; copyright @ 2023 by <span>Miłosz Cmoch</span>
    </div>

</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
