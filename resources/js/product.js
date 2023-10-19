
import { getToken } from "/resources/js/helpers/csrf_token";

$(document).ready(function() {
    
    Dropzone.options.imageUpload = {
        maxFilesize         :       1,
        acceptedFiles: ".jpeg,.jpg,.png,.gif"
    };

    // store fucntions
    $('body').on('click','.add-product', function(e){
        e.preventDefault();
        if (!$(".add-product-form").valid()) {
            return;
        }
        var productName = $('.product_name').val();
        var type = $('.type option:selected').val();
        var category = $('.category option:selected').val();
        var categoryName = $('.category option:selected').text();
        var image = $('.image').val();
        var price = $('.price').val();
        var discountPercentage = $('.discount_percentage').val();
        var discountAmount = $('.discount_amount').val();
        var from = $('.from').val();
        var disTo = $('.dis_to').val();
        var taxPercentage = $('.tax_percentage').val();
        var taxAmount = $('.tax_amount').val();
        var inStock = $('.in_stock').val();
        $.ajax({
            url: '/add-product',
            type: 'POST',
            data: {
                'productName':productName,
                'type' : type,
                'category' : category,
                'image' : image,
                'price' : price,
                'discountPercentage' : discountPercentage ,
                'discountAmount' : discountAmount ,
                'from' :from,
                'disTo' : disTo ,
                'taxPercentage' : taxPercentage,
                'taxAmount' : taxAmount,
                'inStock' : inStock,
                'categoryName' : categoryName,
             },
            headers: {
                "X-CSRF-TOKEN": getToken(),
            },
            dataType: "JSON",
        })
            .done(function (response) {
                if (response.status === 'Success') {
                    toastr.success(response.message);
                }
                setTimeout(function () {
                    window.location.href = "/dashboard";
                }, 2000);
            }).fail(function (error) {
                toastr.error(error.message);
            });

    })

   // Getting discounted price
    const discountPercentageInput = document.getElementById('discount_percentage');
    const discountAmountInput = document.getElementById('discount_amount');
    const priceInput = document.getElementById('price');
    const taxPercentageInput = document.getElementById('tax_percentage');
    const taxAmountInput = document.getElementById('tax_amount');

    const updateDiscountAndTax = () => {
        const discountPercentage = parseFloat(discountPercentageInput.value);
        const taxPercentage = parseFloat(taxPercentageInput.value);
        const price = parseFloat(priceInput.value);

        if (!isNaN(price)) {
            if (!isNaN(discountPercentage)) {
                const discountAmount = (discountPercentage / 100) * price;
                discountAmountInput.value = discountAmount.toFixed(2);
                discountAmountInput.setAttribute('disabled', 'true');
            } else {
                discountAmountInput.value = '';
                discountAmountInput.removeAttribute('disabled');
            }

            if (!isNaN(taxPercentage)) {
                const taxAmount = (taxPercentage / 100) * price;
                taxAmountInput.value = taxAmount.toFixed(2);
                taxAmountInput.setAttribute('disabled', 'true');
            } else {
                taxAmountInput.value = '';
                taxAmountInput.removeAttribute('disabled');
            }
        }
    };

    discountPercentageInput.addEventListener('input', updateDiscountAndTax);
    priceInput.addEventListener('input', updateDiscountAndTax);
    taxPercentageInput.addEventListener('input', updateDiscountAndTax);


     // edit popup function

     $('body').on('click','.edit-icon',function(e){
        e.preventDefault();
        var productId = $(this).attr("data-id");
        $(".edit-product").attr("data-id",productId);
        $.ajax({
            url: "/product-edit",
            type: "GET",
            data: { productId: productId },
            headers: {
                "X-CSRF-TOKEN": getToken(),
            },
            dataType: "JSON",
        })
            .done(function (response) {
                const product = response.response[0] || {}; 
                const categories = product.categories || [];
                if (categories.length > 0) {
                    const categoryName = categories[0].category_name;
                    $('#category option').each(function() {
                        if ($(this).text() === categoryName) {
                            $(this).prop('selected', true);
                        }
                    });
                    $('#category').trigger('change');
                } else {
                    console.log("No categories found");
                }
                $(".product_name").val(product.product_name);
                $('.type').val(product.unit_type);
                $('.image').val(product.image);
                $('.price').val(product.price);
                $('.discount_percentage').val(product.discount_percentage);
                $('.discount_amount').val(product.discount_amount);
                $('.from').val(product.discount_from);
                $('.dis_to').val(product.discount_to);
                $('.tax_percentage').val(product.tax_percentage);
                $('.tax_amount').val(product.tax_amount);
                $('.in_stock').val(product.in_stock);
            })
            .fail(function (error) {
                console.log(error);
            });
    })

    // update functions

    $('body').on('click','.edit-product',function(e){
        e.preventDefault();
        var productId = $(this).attr("data-id");
        var productName = $('.product_name').val();
        var type = $('.type option:selected').val();
        var category = $('#category option:selected').val();
        var categoryName = $('#category option:selected').text();
        var price = $('.price').val();
        var discountPercentage = $('.discount_percentage').val();
        var discountAmount = $('.discount_amount').val();
        var from = $('.from').val();
        var disTo = $('.dis_to').val();
        var taxPercentage = $('.tax_percentage').val();
        var taxAmount = $('.tax_amount').val();
        var inStock = $('.in_stock').val();
        $.ajax({
            type: "POST",
            url: "/update-product",
            headers: {
                "X-CSRF-TOKEN": getToken(),
            },
            data: {
                'productId' : productId,
                'productName':productName,
                'type' : type,
                'category' : category,
                'price' : price,
                'discountPercentage' : discountPercentage ,
                'discountAmount' : discountAmount ,
                'from' :from,
                'disTo' : disTo ,
                'taxPercentage' : taxPercentage,
                'taxAmount' : taxAmount,
                'inStock' : inStock,
                'categoryName' : categoryName,
             },
        })
            .done(function (response) {
                if (response.status === 'Success') {
                    toastr.success(response.message);
                }
                setTimeout(function () {
                    window.location.href = "/dashboard";
                }, 2000);
            })
            .fail(function (error) {
                toastr.error("Unable to update");
            });
    })

    // delete functions

    $('body').on('click','.delete-icon', function(e){
        e.preventDefault();
        var id = $(this).attr('data-id');
        $.ajax({
            type: "GET",
            url: "/delete-product",
            data: { 'id' : id },
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        }).done(function (response) {
            if (response.status === 'Success') {
                toastr.success(response.message);
            }
            setTimeout(function () {
                window.location.href = "/dashboard";
            }, 2000);
        }).fail(function (error) { console.log(error); });

    });

    $('body').on('click','.view-icon',function(e){
        e.preventDefault();
        var productId = $(this).attr("data-id");
        $.ajax({
            url: "/view-product/" + productId,
            method: "GET",
            headers: {
                "X-CSRF-TOKEN": getToken(),
            },
        })

            .done(function (response) {
                var data = response.data;
                $(".product_name").text(data.product_name ?? "NA");
                $(".category").text(data.category_name ?? "NA");
                $(".price").text(data.price ?? "NA");
                $(".dis_perc").text(data.discount_percentage ?? "NA");
                $(".disc_amt").text(data.discount_amount ?? "NA");
                $(".in_stock").text(data.in_stock ?? "NA");
                $(".disc_from").text(data.discount_from ?? "NA");
                $(".disc_till").text(data.discount_to ?? "NA");

            })
            .fail(function (error) {
                console.log(error);
            });
    })

});
