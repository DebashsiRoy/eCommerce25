<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="page-title">
                    <h1>Wishlist</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="{{ url("/") }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active">Wishlist</li>
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<!-- END SECTION BREADCRUMB -->

<!-- START MAIN CONTENT -->
<div class="main_content">

    <!-- START SECTION SHOP -->
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive wishlist_table">
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="product-thumbnail d-none">ID</th>
                                <th class="product-thumbnail">Image</th>
                                <th class="product-name">Product</th>
                                <th class="product-price">Price</th>
                                <th class="product-add-to-cart">Add to Cart</th>
                                <th class="product-remove">Remove</th>
                            </tr>
                            </thead>
                            <tbody id="pr_wish_list">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END SECTION SHOP -->
    <script>
        wishList();
        async function wishList(){
            let res = await axios.get("/product-wishlist");
            $("#pr_wish_list").empty();
            res.data['data'].forEach((item, i)=> {
                let wishItem = `
                            <tr>
                                <td class="product-thumbnail d-none"><a href="/details?id=${item['id']}"><img src="${item['product']['id']}" alt="product1"></a></td>
                                <td class="product-thumbnail"><a href="/details?id=${item['id']}"><img src="${item['product']['image']}" alt="product1"></a></td>
                                <td class="product-name" data-title="Product"><a href="/details?id=${item['id']}">${item['product']['title']}</a></td>
                                <td class="product-price" data-title="Price">${item['product']['discount_price']}</td>
                                <td class="product-add-to-cart">
                                  <a href="#" class="btn btn-fill-out addToCartBtn" data-id="${item['product']['id']}">
                                    <i class="icon-basket-loaded"></i> Add to Cart
                                  </a>
                                </td>
                                <td data-id="${item['product']['id']}" class="product-remove remove" data-title="Remove"><a href="#"><i class="ti-close"></i></a></td>
                            </tr>

                `
                $("#pr_wish_list").append(wishItem);
            })

            $(".remove").on('click', function () {
                let id= $(this).data('id');
                removeWishList(id)
            })
        }

        async function removeWishList(id){

            $(".preloader").fadeOut(100).addClass('loaded');
            let res = await axios.get("/remove-wishlist/"+id);
            $(".preloader").fadeOut(100).addClass('loaded');

            if (res.status===200){
                await wishList();
            }
            else {
                alert("Request Fail ")
            }
        }


        //===================================================================

        $(document).on('click', '.addToCartBtn', async function (e) {
            e.preventDefault();

            const productId = $(this).data('id');

            try {
                $(".preloader").fadeIn(100).removeClass('loaded');

                const res = await axios.post("/addTo-cart", {
                    product_id: productId,
                    color: "default",   // ✅ Change if you have dropdowns or options
                    size: "default",
                    qty: 1
                });

                $(".preloader").fadeOut(100).addClass('loaded');

                if (res.status === 200) {
                    alert("Product added to cart!");
                    await removeWishList(productId);
                }

            } catch (e) {
                $(".preloader").fadeOut(100).addClass('loaded');
                console.error(e);
                alert("Failed to add to cart.");
            }
        });


    </script>

