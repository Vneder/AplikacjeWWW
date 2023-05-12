let cartItems = {};

$('.buy-btn').click(function () {
    let card = $(this).closest('.card');
    let name = card.find('.title-gun').text();
    let price = parseFloat(card.find('.price-gun').text().replace(' zł', '').replace(/\s/g, ''));
    if (cartItems[name]) {
        cartItems[name].count++;
        cartItems[name].element.text(name + ': ' + cartItems[name].price.toFixed(2) + ' zł x ' + cartItems[name].count);
    } else {
        // dodawanie elementu do koszyka
        let item = $('<li>').text(name + ': ' + price.toFixed(2) + ' zł');
        $('.cart ul').append(item);

        cartItems[name] = {
            price: price,
            count: 1,
            element: item
        };
    }

    // Aktualizacja łącznej ceny koszyka
    let totalPrice = parseFloat($('.total-price').text());
    $('.total-price').text((totalPrice + price).toFixed(2) + ' zł');

    $('.cart').show();

    // wyświetlanie popupa
    $('.cart-popup').fadeIn();
    // ukrywanie popupa
    setTimeout(function () {
        $('.cart-popup').fadeOut();
    }, 800);
});

// Usuwanie przedmiotów z koszyka
$('.cart ul').on('click', 'li', function () {
    let name = $(this).text().split(': ')[0];
    let price = cartItems[name].price;
    let count = cartItems[name].count;
    let totalPrice = parseFloat($('.total-price').text());

    $(this).remove();
    delete cartItems[name];

    // wyświetlanie popupa
    let popup = $('<div>').addClass('cart-popupr').text('Usunięto ' + name + ' z koszyka');
    $('body').append(popup);
    popup.fadeIn();

    // ukrywanie popupa
    setTimeout(function () {
        popup.fadeOut(function () {
            $(this).remove();
        });
    }, 800);

    // Aktualizacja łącznej ceny koszyka
    $('.total-price').text((totalPrice - price * count).toFixed(2) + ' zł');
});