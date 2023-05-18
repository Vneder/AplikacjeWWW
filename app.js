let cartItems = {};
let itemId = 0;

$('.buy-btn').click(function () {
    let card = $(this).closest('.card');
    let name = card.find('.title-gun').text();
    let price = parseFloat(card.find('.price-gun').text().replace(' zł', '').replace(/\s/g, ''));
    if (cartItems[name]) {
        cartItems[name].count++;
        cartItems[name].element.find('.count').text(cartItems[name].count);
    } else {
        // Dodawanie elementu do koszyka
        let item = $('<li>').addClass('cart-item');
        let itemName = $('<span>').addClass('item-name').text(name);
        let itemPrice = $('<span> ').addClass('item-price').text(price.toFixed(2) + ' zł');
        let itemQuantity = $('<span>').addClass('count').text('1');
        let removeBtn = $('<button>').addClass('remove-btn').text('X');
        item.append(itemName, itemPrice, ' x', itemQuantity, ' ', removeBtn);

        // Przypisanie unikalnego identyfikatora do elementu
        let id = 'item-' + itemId;
        item.attr('id', id);
        removeBtn.attr('data-item-id', id);
        itemId++;

        $('.cart ul').append(item);

        cartItems[name] = {
            id: id,
            price: price,
            count: 1,
            element: item
        };
    }

    // Aktualizacja łącznej ceny koszyka
    let totalPrice = 0;
    Object.values(cartItems).forEach(item => {
        totalPrice += item.price * item.count;
    });
    $('.total-price').text(totalPrice.toFixed(2) + ' zł');

    // Pokazywanie koszyka
    $('.cart').addClass('show');

    // wyświetlanie popupa
    $('.cart-popup').fadeIn();

    // ukrywanie popupa
    setTimeout(function () {
        $('.cart-popup').fadeOut();
    }, 800);
});

// Usuwanie przedmiotów z koszyka
$('.cart ul').on('click', '.remove-btn', function () {
    let itemId = $(this).attr('data-item-id');
    let item = $('#' + itemId);
    let name = item.find('.item-name').text();
    let price = cartItems[name].price;
    let count = cartItems[name].count;
    let totalPrice = parseFloat($('.total-price').text());

    item.remove();
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
    let newTotalPrice = totalPrice - price * count;
    $('.total-price').text(newTotalPrice.toFixed(2) + ' zł');

    // Sprawdzanie czy koszyk jest pusty
    if ($.isEmptyObject(cartItems)) {
        $('.cart').removeClass('show');
    }
});

// Pokazywanie i ukrywanie koszyka po kliknięciu w ikonkę koszyka
$('.cart-icon').click(function () {
    $('.cart').toggleClass('show');
});

// Ukrywanie koszyka po kliknięciu w przycisk z krzyżykiem
$('.close-btn').click(function () {
    $('.cart').removeClass('show');
});
