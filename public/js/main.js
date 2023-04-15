$(document).ready(function(){

    //Navbar
    $('.fa-bars').click(function(){
        $('.navbar').toggle();
        $(this).toggleClass('fa-times');
    })

    $('.navbar, .navbar a').click(function(){
        $('.navbar').hide();
        $('.fa-bars').removeClass('fa-times');
    });

    //Cart
    let cartIcon= document.querySelector("#cart-icon");
    let cart = document.querySelector(".shopping-cart");
    let closeCart = document.querySelector("#close-cart");

    cartIcon.onclick = () => {
        cart.classList.add("active");
    };

    closeCart.onclick = () => {
        cart.classList.remove("active");
    }

    if(document.readyState == "loading"){
        document.addEventListener("DOMContentLoaded", ready);
    }else{
        ready();
    }

    function ready(){
        var removeCartButtons = document.getElementsByClassName("cart-remove");
        for(var i=0; i<removeCartButtons.length; i++){
            var button = removeCartButtons[i];
            console.log(button);
            button.addEventListener("click", removeCartItem);
        }

        var quantityInputs = document.getElementsByClassName("cart-quantity");
        for(var i=0; i<quantityInputs.length; i++){
            var input = quantityInputs[i];
            input.addEventListener("change", quantityChanged);
        }

        var addCart = document.getElementsByClassName("add-cart");
        for(var i = 0; i < addCart.length; i++){
            var button = addCart[i];
            button.addEventListener("click", addCartClicked);
        }
    }

    function removeCartItem(event){
        var buttonClicked = event.target;
        buttonClicked.parentElement.remove();
        updatetotal();
    }

    function quantityChanged(event){
        var input = event.target;
        if (isNaN(input.value) || input.value <= 0) {
            input.value = 1;
        }
        updatetotal();
    }

    function addCartClicked(event){
        var button = event.target;
        var shopProducts = button.closest(".product-card");
        var title = shopProducts.querySelector(".product-name").innerText;
        var id = shopProducts.querySelector(".product-id").innerText;
        var price = shopProducts.querySelector(".price").innerText;
        var productImg = shopProducts.querySelector(".product-image").src;
        addProductToCart(title,price,productImg, id);
        updatetotal();
    }

    function addProductToCart(title,price,productImg, id){
        var cartShopBox = document.createElement("div");
        cartShopBox.classList.add("cart-box");
        var cartItems = document.getElementsByClassName('cart-content')[0];
        var cartItemsNames = cartItems.getElementsByClassName('cart-product');
        for(var i = 0; i < cartItemsNames.length; i++){
            if(cartItemsNames[i].innerText == title){
            alert("You have already add this item to cart");
            return;
            }
        }

        var cartBoxContent = `
        <img src="${productImg}" alt="">
        <div class="detail-box">
            <div class="cart-product">${title}</div>
            <div class="cart-price">${price}</div>
            <input type="number" name="items[quantity][]" value="1" class="cart-quantity">
            <input type="hidden" name="items[id][]" value="${id}">
            <input type="hidden" name="items[price][]" value="${price}">
        </div>
        <i class="cart-remove fa-solid fa-trash"></i>`;

        cartShopBox.innerHTML = cartBoxContent;
        cartItems.append(cartShopBox);
        cartShopBox.getElementsByClassName("cart-remove")[0].addEventListener("click", removeCartItem);
        cartShopBox.getElementsByClassName("cart-quantity")[0].addEventListener("change", quantityChanged);
    }

    function updatetotal(){
        var cartContent = document.getElementsByClassName("cart-content")[0];
        var cartBoxes = cartContent.getElementsByClassName("cart-box");
        var total = 0;
        if(cartBoxes.length == 0) {
            total = 0;
            document.getElementsByClassName("total-price")[0].innerText = total + " PLN";
        }
        else {
            for (var i = 0; i < cartBoxes.length; i++) {
                var cartBox = cartBoxes[i];
                var priceElement = cartBox.getElementsByClassName("cart-price")[0];
                var quantityElement = cartBox.getElementsByClassName("cart-quantity")[0];
                var price = parseFloat(priceElement.innerText.replace("PLN",""));
                var quantity = quantityElement.value;
                total = total + price * quantity;

                total = Math.round(total*100)/100;

                document.getElementsByClassName("total-price")[0].innerText = total + " PLN";
            }
        }
    }

    //Scroll Header
    $(window).on('scroll load',function(){
        if($(window).scrollTop()>20){
            $('header').css({
                'background':'#EB4D4B',
                'box-shadow':'0 .1rem .3rem #000'
            });
        }else{
            $('header').css({
                'background':'#333',
                'box-shadow':'none'
            });
        }
    });

    //Home Slider
    $('.home-slider').owlCarousel({
        loop:true,
        margin:10,
        nav: true,
        items:1,
        autoplay: true,
        dots: true
    });

    //Product Slider
    $('.product-slider').owlCarousel({
        loop:true,
        margin:10,
        startPosition: 2,
        nav: true,
        items:3,
        autoplay: false,
        dots: false,
        center: true,
        responsive:{
            0:{
                items:1,
                nav:true
            },
            550:{
                items:2,
            },
            1000:{
                items:3
            }
        }
    });

    //Barnd Slider
    $('.brand-slider').owlCarousel({
        loop:true,
        nav: false,
        items:4,
        autoplay: true,
        dots: false,
        responsive:{
            0:{
                items:1,
                nav:true
            },
            400:{
                items:2,
            },
            550:{
                items:3
            },
            1000:{
                item:4
            }
        }
    });

});
