$(document).ready(function () {
   $('[data-product-quantity]').change(function () {
       var newQauntity = $(this).val();

       var $parent = $(this).parents('[data-product-info]');

       var pricePerUnit = $parent.attr('data-product-price');

       var totalPriceForProduct = newQauntity * pricePerUnit;

       $parent.find('.total-price-for-product').text(totalPriceForProduct + '$');

       calculateTotalPrice();
   });
   function calculateTotalPrice() {
       var totalPriceForAllProduct = 0;

       $('[data-product-info]').each(function () {
           var pricePerUnit = $(this).attr('data-product-price');
           var quantity = $(this).find('[data-product-quantity]').val();

           var totalPriceForProduct = pricePerUnit * quantity;

           totalPriceForAllProduct = totalPriceForAllProduct + (totalPriceForProduct);
       });
       $('#total-price-for-all-priducts').text(totalPriceForAllProduct + '$');
   }
   $('[data-remove-from-cart]').click(function () {
       var sure = confirm("Are you sue to remove this item?");
       if(sure) {
           $(this).parents('[data-product-info]').remove();
           calculateTotalPrice();
       }
   });
});

function calculateTotalPrice() {
    var totalPriceForAllProduct = 0;

    $('[data-product-info]').each(function () {
        var pricePerUnit = $(this).attr('data-product-price');
        var quantity = $(this).find('[data-product-quantity]').val();

        var totalPriceForProduct = pricePerUnit * quantity;

        totalPriceForAllProduct = totalPriceForAllProduct + (totalPriceForProduct);
    });
    $('#total-price-for-all-priducts').text(totalPriceForAllProduct + '$');
}