(function ($) {
    Drupal.behaviors.ext_commerce = {
        attach: function (context, settings) {
            $("[name=update-cart]").hide();

            $('input[name*=edit_quantity]', context).each(function() {
                var $input = $(this);

                // сохранить колво для последующего сравнения
                $(this).data("value", $(this).val());

                // обновлять только если значение отличается
                $(this).on("change", function() {
                    if ($(this).data("value") !== $(this).val()) {
                      Drupal.ext_commerce.quantityChanged(this);
                    }
                });

                $input.keyup(function() {
                    if ($(this).val()) {
                        Drupal.ext_commerce.quantityChanged(this);
                    }
                });

            });

            // $('input.delete-line-item', context).click(function (event) {
            //     var $input = $(this);
            //     var $cartViews = $input.closest('.view-commerce-cart-form');
            //
            //     if ($cartViews.length) {
            //         $cartViews.addClass('view-commerce-cart-form-loading');
            //     }
            // });
        }
    };

    Drupal.ext_commerce = {
        timer: false,

        quantityChanged: function(element) {
            clearTimeout(Drupal.ext_commerce.timer);
            Drupal.ext_commerce.timer = setTimeout(function() {
                var $input = $(element);

                $input.closest('.view-commerce-cart-form').addClass('view-commerce-cart-form-loading');
                $input.trigger('quantityChanged');

                if ($input.hasClass('quantity-input-spinner')) {
                    $input.spinner('disable');
                }
            }, 400);
        }
    };
})(jQuery);
