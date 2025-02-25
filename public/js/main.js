$(document).ready(function() {
    $("[data-toggle=popover]").popover();
    // console.log('RADI');
    // SEARCH
    $(document).on('keyup', '#search', function(){
        var searchValue = $(this).val();
        // console.log(searchValue);
        $.ajax({
            url: "search",
            method: 'POST',
            data: {
                'searchValueInput': searchValue,
                _token: $('#csrf-token')[0].content
            },
            success: function (response) {
                console.log(response);
                // search
                search(response);
            },
            error: function (xhr) {
                console.log(xhr);
                // console.log(xhr.responseJSON);
            }
        })
    });



    // KATEGORIJE
    $(`input[name="categoryIds[]"]`).on('change',
        function () {
            var checkedCategories = [];
            var checked = $('input[name="categoryIds[]"]:checked').val();
            // console.log(checked)
            $('input[name="categoryIds[]"]:checked').each(function (el) {
                checkedCategories.push(parseInt($(this).val()));
                // console.log(checkedCategories);
            });
            // console.log(checkedCategories);
            $.ajax({
                url: "filter-categories",
                method: 'POST',
                data: {
                    checkedCategories: checkedCategories,
                    _token: $('#csrf-token')[0].content
                },
                dataType: 'JSON',
                success: function (response) {
                    console.log(response);
                    filtered_categories_show(response);
                },
                error: function (xhr) {
                    console.log(xhr);
                    // console.log(xhr.responseJSON);
                }
            });
        });
// ADD TO CART
    $('#addToCartBtn').on('click', addToCart);

// FILTER => CATEGORIES
    function filtered_categories_show(data) {
        var html = ``;
        if (data.length != 0) {
            for (var key in data) {
                console.log(data[key])
                html += `<div class="col-lg-3">
                <div class=\"box-shop\">
                    <div class=\"img-box col-lg-12\">
                        <img src="images/${data[key].src_picture}" alt="${data[key].name}" class="img-fluid"/>
                    </div>
                    <div class="detail-box-shop">
                        <h6 class="mt-4">
                          ${data[key].name}
                        </h6>
                        <p class="product-type">${data[key].category_name}</p>
                        <h5 class="d-flex align-items-center justify-content-between">$${data[key].current_price}`;

                if (data[key].previous_price == null) {
                    html += ``;
                } else {
                    html += `<s>${data[key].previous_price}</s>`;
                }
                html += `</h5>
                    <a href="shop/${data[key].id}" class="mt-4">
                        See More...
                    </a>
                    </div>
                </div>
            </div>`;
            }
            $('#products').html(html);

        }
    }

// SEARCH BY NAME
    function search(data){
        var html = ``;
        console.log(data.length);
        if(data.length == 0){
            html+= `No combination for the search input. Try again.`;

        }
        else {
            for (var key in data) {
                // console.log(data[key])
                html += `<div class="col-lg-3">
                <div class=\"box-shop\">
                    <div class=\"img-box col-lg-12\">
                        <img src="images/${data[key].src_picture}" alt="${data[key].name}" class="img-fluid"/>
                    </div>
                    <div class="detail-box-shop">
                        <h6 class="mt-4">
                          ${data[key].name}
                        </h6>
                        <p class="product-type">${data[key].category_name}</p>
                        <h5 class="d-flex align-items-center justify-content-between">$${data[key].current_price}`;

                if (data[key].previous_price == null) {
                    html += ``;
                } else {
                    html += `<s>${data[key].previous_price}</s>`;
                }
                html += `</h5>
                    <a href="shop/${data[key].id}" class="mt-4">
                        See More...
                    </a>
                    </div>
                </div>
            </div>`;
            }


        }
        $('#products').html(html);

    }


});




// ADD TO CART
function addToCart(){
    // alert(id);
    var quantity = $('input[type=number]').val();
    var pathArray = window.location.href.split('/');
    // console.log(pathArray[4])
    // alert(quantity);
    $.ajax({
        url: "/addtocart",
        method: 'POST',
        data: {
            productId: pathArray[4],
            quantity: quantity,
            _token: $('#csrf-token')[0].content
        },
        dataType: 'JSON',
        success: function (response) {
            console.log(response);
            alert('Successfully added to cart!');
        },
        error: function (xhr) {
            console.log(xhr);
            // console.log(xhr.responseJSON);
        },
        headers: {
            "Accept": 'application/json'
        }
    });
}

