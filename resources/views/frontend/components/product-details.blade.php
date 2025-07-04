
<!-- START MAIN CONTENT -->
<div class="main_content">

    <!-- START SECTION SHOP -->
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 mb-4 mb-md-0">
                    <div class="product-image">
                        <div class="product_img_box">
                            <img id="product_img1" src='assets/images/product_img1.jpg' data-zoom-image="assets/images/product_zoom_img1.jpg" alt="product_img1" />
                            <a href="#" class="product_img_zoom" title="Zoom">
                                <span class="linearicons-zoom-in"></span>
                            </a>
                        </div>
                        <div id="pr_item_gallery" class="product_gallery_item slick_slider" data-slides-to-show="4" data-slides-to-scroll="1" data-infinite="false">
                            <div class="item">
                                <a href="#" class="product_gallery_item active" data-image="assets/images/product_img1.jpg" data-zoom-image="assets/images/product_zoom_img1.jpg">
                                    <img id="img1" src="assets/images/shop_banner_img4.jpg" alt="product_small_img1" style="width: 150px; height: 160px"/>
                                </a>
                            </div>
                            <div class="item">
                                <a href="#" class="product_gallery_item" data-image="assets/images/product_img1-2.jpg" data-zoom-image="assets/images/product_zoom_img2.jpg">
                                    <img id="img2" src="assets/images/product_small_img2.jpg" alt="product_small_img2" style="width: 150px; height: 160px"/>
                                </a>
                            </div>
                            <div class="item">
                                <a href="#" class="product_gallery_item" data-image="assets/images/product_img1-3.jpg" data-zoom-image="assets/images/product_zoom_img3.jpg">
                                    <img id="img3" src="assets/images/product_small_img3.jpg" alt="product_small_img3" style="width: 150px; height: 160px"/>
                                </a>
                            </div>
                            <div class="item">
                                <a href="#" class="product_gallery_item" data-image="assets/images/product_img1-4.jpg" data-zoom-image="assets/images/product_zoom_img4.jpg">
                                    <img id="img4" src="assets/images/product_small_img4.jpg" alt="product_small_img4" style="width: 150px; height: 160px"/>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="pr_detail">
                        <div class="product_description">
                            <h4 class="product_title"><a id="p_title" href="#"></a></h4>
                            <div class="product_price">
                                <span id="discount_price" class="price"></span>
                                <del id="p_price"></del>
                                <div class="on_sale">
                                    <span id="p_discount"></span><span>% Off</span>
                                </div>
                            </div>
                            <div class="rating_wrap">
                                <div class="rating">
                                    <div class="product_rate" style="width:80%"></div>
                                </div>
                                <span class="rating_num">(21)</span>
                            </div>
                            <div class="pr_desc">
                                <p id="pr_short_description"></p>
                            </div>
                            <div class="product_sort_info">
                                <ul>
                                    <li><i class="linearicons-shield-check"></i> 1 Year AL Jazeera Brand Warranty</li>
                                    <li><i class="linearicons-sync"></i> 30 Day Return Policy</li>
                                    <li><i class="linearicons-bag-dollar"></i> Cash on Delivery available</li>
                                </ul>
                            </div>
                            <label class="form-label">Size</label>
                            <select id="pr_size" class="form-select">
                            </select>


                            <label class="form-label">Color</label>
                            <select id="pr_color" class="form-select">

                            </select>


{{--                            <div id="productSize" class="pr_switch_wrap">--}}
{{--                                <span class="switch_lable">Size</span>--}}
{{--                                <div id="pr_size" class="product_size_switch">--}}

{{--                                </div>--}}
{{--                            </div>--}}
                        </div>
                        <hr />
                        <div class="cart_extra">
                            <div class="cart-product-quantity">
                                <div id="pr_qty" class="quantity">
                                    <input type="button" value="-" class="minus">
                                    <input id="product_qty" type="text" name="quantity" value="1" title="Qty" class="qty" size="4">
                                    <input type="button" value="+" class="plus">
                                </div>
                            </div>
                            <div class="cart_btn">
                                <button onclick="getToCart()" class="btn btn-fill-out btn-addtocart" type="button"><i class="icon-basket-loaded"></i> Add to cart</button>
                                <a class="add_compare" href="#"><i class="icon-shuffle"></i></a>
                                <a onclick="AddToWishList()" class="add_wishlist" href="#"><i class="icon-heart"></i></a>
                            </div>
                        </div>
                        <hr />
                        <ul class="product-meta">
                            <li>SKU: <a href="#">BE45VGRT</a></li>
                            <li>Category: <a href="#">Clothing</a></li>
                            <li>Tags: <a href="#" rel="tag">Cloth</a>, <a href="#" rel="tag">printed</a> </li>
                        </ul>

                        <div class="product_share">
                            <span>Share:</span>
                            <ul class="social_icons">
                                <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                                <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                                <li><a href="#"><i class="ion-social-googleplus"></i></a></li>
                                <li><a href="#"><i class="ion-social-youtube-outline"></i></a></li>
                                <li><a href="#"><i class="ion-social-instagram-outline"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="large_divider clearfix"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="tab-style3">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="Description-tab" data-bs-toggle="tab" href="#Description" role="tab" aria-controls="Description" aria-selected="true">Description</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" id="Reviews-tab" data-bs-toggle="tab" href="#Reviews" role="tab" aria-controls="Reviews" aria-selected="false">Reviews (2)</a>
                            </li>
                        </ul>
                        <div class="tab-content shop_info_tab">

                        {{--  Product Description section--}}

                            <div class="tab-pane fade show active" id="Description" role="tabpanel" aria-labelledby="Description-tab">
                                <p >Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Vivamus bibendum magna Lorem ipsum dolor sit amet, consectetur adipiscing elit.Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.</p>
                            </div>

{{--                            List Product Review Section--}}

                            <div class="tab-pane fade" id="Reviews" role="tabpanel" aria-labelledby="Reviews-tab">
                                <div class="comments">
                                    <h5 class="product_tab_title">2 Review For <span>Blue Dress For Woman</span></h5>
                                    {{--  Product Review Display Section--}}
                                    <ul id="listProductReview1" class="list_none comment_list mt-4">

                                    </ul>
                                    {{--  Product Review Display Section End Here--}}
                                </div>
                                <div class="review_form field_form">
                                    <h5>Add a review</h5>
                                    {{--  Product Review Submit Section--}}
                                    <form id="" class="row mt-3">
                                        <div class="form-group col-12 mb-3">
                                            <div id="reviewRating" class="star_rating">
                                                <span data-value="1"><i class="far fa-star star"></i></span>
                                                <span data-value="2"><i class="far fa-star star"></i></span>
                                                <span data-value="3"><i class="far fa-star star"></i></span>
                                                <span data-value="4"><i class="far fa-star star"></i></span>
                                                <span data-value="5"><i class="far fa-star star"></i></span>
                                            </div>
                                        </div>
                                        <div class="form-group col-12 mb-3">
                                            <textarea id="reviewText" required="required" placeholder="Your review *" class="form-control" name="message" rows="4"></textarea>
                                        </div>


                                        <div class="form-group col-12 mb-3">
                                            <button onclick="submitRating()" type="button" class="btn btn-danger">Add Review</button>
                                        </div>
                                    </form>
                                    {{--  Product Review Submit Section End--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="small_divider"></div>
                    <div class="divider"></div>
                    <div class="medium_divider"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="heading_s1">
                        <h3>Releted Products</h3>
                    </div>
                    <div class="releted_product_slider carousel_slider owl-carousel owl-theme" data-margin="20" data-responsive='{"0":{"items": "1"}, "481":{"items": "2"}, "768":{"items": "3"}, "1199":{"items": "4"}}'>
                        <div class="item">
                            <div class="product">
                                <div class="product_img">
                                    <a href="shop-product-detail.html">
                                        <img src="assets/images/product_img1.jpg" alt="product_img1">
                                    </a>
                                    <div class="product_action_box">
                                        <ul class="list_none pr_action_btn">
                                            <li onclick="getToCart()" class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
                                            <li><a href="shop-compare.html"><i class="icon-shuffle"></i></a></li>
                                            <li><a href="shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
                                            <li><a href="#"><i class="icon-heart"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product_info">
                                    <h6 class="product_title"><a href="shop-product-detail.html">Blue Dress For Woman</a></h6>
                                    <div class="product_price">
                                        <span class="price">$45.00</span>
                                        <del>$55.25</del>
                                        <div class="on_sale">
                                            <span>35% Off</span>
                                        </div>
                                    </div>
                                    <div class="rating_wrap">
                                        <div class="rating">
                                            <div class="product_rate" style="width:80%"></div>
                                        </div>
                                        <span class="rating_num">(21)</span>
                                    </div>
                                    <div class="pr_desc">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc id varius nunc.</p>
                                    </div>
                                    <div class="pr_switch_wrap">
                                        <div class="product_color_switch">
                                            <span class="active" data-color="#87554B"></span>
                                            <span data-color="#333333"></span>
                                            <span data-color="#DA323F"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="product">
                                <div class="product_img">
                                    <a href="shop-product-detail.html">
                                        <img src="assets/images/product_img2.jpg" alt="product_img2">
                                    </a>
                                    <div class="product_action_box">
                                        <ul class="list_none pr_action_btn">
                                            <li onclick="getToCart()" class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
                                            <li><a href="shop-compare.html"><i class="icon-shuffle"></i></a></li>
                                            <li><a href="shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
                                            <li><a href="#"><i class="icon-heart"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product_info">
                                    <h6 class="product_title"><a href="shop-product-detail.html">Lether Gray Tuxedo</a></h6>
                                    <div class="product_price">
                                        <span class="price">$55.00</span>
                                        <del>$95.00</del>
                                        <div class="on_sale">
                                            <span>25% Off</span>
                                        </div>
                                    </div>
                                    <div class="rating_wrap">
                                        <div class="rating">
                                            <div class="product_rate" style="width:68%"></div>
                                        </div>
                                        <span class="rating_num">(15)</span>
                                    </div>
                                    <div class="pr_desc">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc id varius nunc.</p>
                                    </div>
                                    <div class="pr_switch_wrap">
                                        <div class="product_color_switch">
                                            <span class="active" data-color="#847764"></span>
                                            <span data-color="#0393B5"></span>
                                            <span data-color="#DA323F"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="product">
                                <span class="pr_flash">New</span>
                                <div class="product_img">
                                    <a href="shop-product-detail.html">
                                        <img src="assets/images/product_img3.jpg" alt="product_img3">
                                    </a>
                                    <div class="product_action_box">
                                        <ul class="list_none pr_action_btn">
                                            <li onclick="getToCart()" class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
                                            <li><a href="shop-compare.html"><i class="icon-shuffle"></i></a></li>
                                            <li><a href="shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
                                            <li><a href="#"><i class="icon-heart"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product_info">
                                    <h6 class="product_title"><a href="shop-product-detail.html">woman full sliv dress</a></h6>
                                    <div class="product_price">
                                        <span class="price">$68.00</span>
                                        <del>$99.00</del>
                                    </div>
                                    <div class="rating_wrap">
                                        <div class="rating">
                                            <div class="product_rate" style="width:87%"></div>
                                        </div>
                                        <span class="rating_num">(25)</span>
                                    </div>
                                    <div class="pr_desc">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc id varius nunc.</p>
                                    </div>
                                    <div class="pr_switch_wrap">
                                        <div class="product_color_switch">
                                            <span class="active" data-color="#333333"></span>
                                            <span data-color="#7C502F"></span>
                                            <span data-color="#2F366C"></span>
                                            <span data-color="#874A3D"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="product">
                                <div class="product_img">
                                    <a href="shop-product-detail.html">
                                        <img src="assets/images/product_img4.jpg" alt="product_img4">
                                    </a>
                                    <div class="product_action_box">
                                        <ul class="list_none pr_action_btn">
                                            <li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
                                            <li><a href="shop-compare.html"><i class="icon-shuffle"></i></a></li>
                                            <li><a href="shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
                                            <li><a href="#"><i class="icon-heart"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product_info">
                                    <h6 class="product_title"><a href="shop-product-detail.html">light blue Shirt</a></h6>
                                    <div class="product_price">
                                        <span class="price">$69.00</span>
                                        <del>$89.00</del>
                                        <div class="on_sale">
                                            <span>20% Off</span>
                                        </div>
                                    </div>
                                    <div class="rating_wrap">
                                        <div class="rating">
                                            <div class="product_rate" style="width:70%"></div>
                                        </div>
                                        <span class="rating_num">(22)</span>
                                    </div>
                                    <div class="pr_desc">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc id varius nunc.</p>
                                    </div>
                                    <div class="pr_switch_wrap">
                                        <div class="product_color_switch">
                                            <span class="active" data-color="#333333"></span>
                                            <span data-color="#A92534"></span>
                                            <span data-color="#B9C2DF"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="item">
                            <div class="product">
                                <div class="product_img">
                                    <a href="shop-product-detail.html">
                                        <img src="assets/images/product_img5.jpg" alt="product_img5">
                                    </a>
                                    <div class="product_action_box">
                                        <ul class="list_none pr_action_btn">
                                            <li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
                                            <li><a href="shop-compare.html"><i class="icon-shuffle"></i></a></li>
                                            <li><a href="shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
                                            <li><a href="#"><i class="icon-heart"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product_info">
                                    <h6 class="product_title"><a href="shop-product-detail.html">blue dress for woman</a></h6>
                                    <div class="product_price">
                                        <span class="price">$45.00</span>
                                        <del>$55.25</del>
                                        <div class="on_sale">
                                            <span>35% Off</span>
                                        </div>
                                    </div>
                                    <div class="rating_wrap">
                                        <div class="rating">
                                            <div class="product_rate" style="width:80%"></div>
                                        </div>
                                        <span class="rating_num">(21)</span>
                                    </div>
                                    <div class="pr_desc">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc id varius nunc.</p>
                                    </div>
                                    <div class="pr_switch_wrap">
                                        <div class="product_color_switch">
                                            <span class="active" data-color="#87554B"></span>
                                            <span data-color="#333333"></span>
                                            <span data-color="#5FB7D4"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END SECTION SHOP -->

</div>
<!-- END MAIN CONTENT -->
    <script>
        function imgPath(file) {
            return `/storage/${file}`;
        }

        let searchParams = new URLSearchParams(window.location.search)
        let id =searchParams.get('id');

        productDetails();
        async function productDetails(){
            let res = await axios.get("/productDetailsById/"+id);
            let Details = await res.data['data'];

            // Set main image src and zoom image
            document.getElementById('product_img1').src=Details[0]['img1'];
            document.getElementById('product_img1').setAttribute('data-zoom-image', Details[0]['img1']);

// Set gallery image src + zoom/image data attributes
            document.getElementById('img1').src=Details[0]['img1'];
            document.getElementById('img1').parentElement.setAttribute('data-image', Details[0]['img1']);
            document.getElementById('img1').parentElement.setAttribute('data-zoom-image', Details[0]['img1']);

            document.getElementById('img2').src=Details[0]['img2'];
            document.getElementById('img2').parentElement.setAttribute('data-image', Details[0]['img2']);
            document.getElementById('img2').parentElement.setAttribute('data-zoom-image', Details[0]['img2']);

            document.getElementById('img3').src=Details[0]['img3'];
            document.getElementById('img3').parentElement.setAttribute('data-image', Details[0]['img3']);
            document.getElementById('img3').parentElement.setAttribute('data-zoom-image', Details[0]['img3']);

            document.getElementById('img4').src=Details[0]['img4'];
            document.getElementById('img4').parentElement.setAttribute('data-image', Details[0]['img4']);
            document.getElementById('img4').parentElement.setAttribute('data-zoom-image', Details[0]['img4']);


            document.getElementById('p_title').innerText=Details[0]['product']['title'];
            document.getElementById('discount_price').innerText=Details[0]['product']['discount_price'];
            document.getElementById('p_price').innerText=Details[0]['product']['price'];
            document.getElementById('p_discount').innerText=Details[0]['product']['discount'];
            document.getElementById('pr_short_description').innerHTML=Details[0]['product']['short_des'];

            document.getElementById('Description').innerText=Details[0]['description'];

            // Product Size & Color
            let size = Details[0]['size'].split(',');
            let color = Details[0]['color'].split(',');

            let SizeOption=`<option value=''>Choose Size</option>`;
            $("#pr_size").append(SizeOption);
            size.forEach((item)=>{
                let option=`<option value='${item}'>${item}</option>`;
                $("#pr_size").append(option);
            })


            let ColorOption=`<option value=''>Choose Color</option>`;
            $("#pr_color").append(ColorOption);
            color.forEach((item)=>{
                let option=`<option value='${item}'>${item}</option>`;
                $("#pr_color").append(option);
            })

        }

        async function getToCart() {
            const searchParams = new URLSearchParams(window.location.search);
            const id = searchParams.get('id');

            try {
                const pr_size = document.getElementById('pr_size').value;
                const pr_color = document.getElementById('pr_color').value;
                const product_qty = document.getElementById('product_qty').value;

                // Input Validation
                if (!pr_size) {
                    alert("Product Size Required!");
                    return;
                }
                if (!pr_color) {
                    alert("Product Color Required!");
                    return;
                }
                if (!product_qty || parseInt(product_qty) <= 0) {
                    alert("Valid Product Quantity Required!");
                    return;
                }

                // Show loader
                $(".preloader").fadeIn(100).removeClass('loaded');

                // Send request
                const res = await axios.post("/addTo-cart", {
                    product_id: id,
                    color: pr_color,
                    size: pr_size,
                    qty: product_qty
                });

                // Hide loader
                $(".preloader").fadeOut(100).addClass('loaded');

                // Success response
                if (res.status === 200) {
                    alert("Product added to cart successfully!");
                }

            } catch (e) {
                // Hide loader on error
                $(".preloader").fadeOut(100).addClass('loaded');

                // Redirect to login on 401
                if (e.response && e.response.status === 401) {
                    sessionStorage.setItem("last_location", window.location.href);
                    window.location.href = "/login";

                } else {
                    console.error(e);
                    alert("Something went wrong. Please try again.");
                }
            }
        }


        async function AddToWishList() {
            try{
                $(".preloader").delay(90).fadeIn(100).removeClass('loaded');
                let res = await axios.get("/create-wishlist/"+id);
                $(".preloader").delay(90).fadeOut(100).addClass('loaded');
                if(res.status===200){
                    alert("Request Successful")
                }
            }catch (e) {
                if(e.response.status===401){
                    sessionStorage.setItem("last_location",window.location.href)
                    window.location.href="/login"
                }
            }
        }

        // ==========Product Review Section=====================//
        let productStarRating = document.querySelectorAll('.star');
        let currentRating = 0;

        productStarRating.forEach((star, index) => {
            star.addEventListener("click", () => {
                currentRating = index + 1;
            });
        });

        async function submitRating() {
            let productReviewText = document.getElementById('reviewText').value;

            // Option 1: Get product ID from URL
            const searchParams = new URLSearchParams(window.location.search);
            const productId = searchParams.get('id');

            // Validate
            if (!productId) {
                errorToast("Product ID not found!");
                return;
            }

            let postBody = {
                product_id: productId,
                description: productReviewText,
                rating: currentRating
            };

            $(".preloader").delay(90).fadeIn(100).removeClass('loaded');
            try {
                let res = await axios.post("/product-review", postBody);
                $(".preloader").delay(90).fadeOut(100).addClass('loaded');

                if (res.data['msg'] === "success") {
                    successToast("Review submitted successfully");
                } else {
                    errorToast("Review submission failed");
                }
            } catch (e) {
                $(".preloader").delay(90).fadeOut(100).addClass('loaded');
                errorToast("Something went wrong!");
                console.error(e);
            }
        }

        listProductReview();

        async function listProductReview(){

            let res = await axios.get("/all-review/"+id);
            let Details=await res.data['data'];

            $("#listProductReview1").empty();


            Details.forEach((item,i)=>{
                const rating = parseInt(item.rating); // assume rating is from 1 to 5
                let starsHTML = '';

                // Loop to create star icons
                for (let j = 1; j <= 5; j++) {
                    if (j <= rating) {
                        starsHTML += `<i class="fa fa-star check" style="color: #FFC107;"></i>`; // filled
                    } else {
                        starsHTML += `<i class="fa fa-star" style="color: #e4e5e9;"></i>`; // empty
                    }
                }

                let each= `<li>
                                <div class="comment_img">
                                    <img src="assets/images/user1.jpg" alt="user1"/>
                                </div>
                                <div class="comment_block">
                                    <div class="rating" id="ratingOutPut">
                                        ${starsHTML}
                                    </div>
                                    <p class="customer_meta">
                                        <span class="review_author">Alea Brooks</span>
                                        <span class="comment-date">March 5, 2018</span>
                                    </p>
                                    <div class="description">
                                        <p>${item['description']}</p>
                                    </div>
                                </div>
                            </li>`;
                $("#listProductReview1").append(each);
            })
        }


    </script>
<style>
    .star-rating {
        font-size: 20px;
        line-height: 1;
        position: relative;
        display: inline-block;
    }
    .back-stars {
        color: #ccc; /* Gray */
        position: relative;
        z-index: 1;
    }
    .front-stars {
        color: #ffc107; /* Yellow */
        position: absolute;
        top: 0;
        left: 0;
        overflow: hidden;
        white-space: nowrap;
        z-index: 2;
    }
    .check{
        color: #f2c000;
    }
</style>

