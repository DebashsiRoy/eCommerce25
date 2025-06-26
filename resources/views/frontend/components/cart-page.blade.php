<!-- START MAIN CONTENT -->
<div class="main_content">

    <!-- START SECTION SHOP -->
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive shop_cart_table">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="product-thumbnail">Image</th>
                                    <th class="product-name">Product</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-subtotal">Total</th>
                                    <th class="product-remove">Remove</th>
                                </tr>
                            </thead>
                            <tbody id="cartListTable">

                            </tbody>


                        </table>

                    </div>
                    <td colspan="6" class="px-0">
                        <div class="row g-0 align-items-center">

                            <div class="col-lg-4 col-md-6 mb-3 mb-md-0">
                                <div class="coupon field_form input-group">
                                    <div id="gradTotalTable">

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-6  text-start  text-md-end">
                                <button onclick="checkOut()" class="btn btn-line-fill btn-sm" type="submit">Proceed To CheckOut</button>
                            </div>
                        </div>
                    </td>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="medium_divider"></div>
                    <div class="divider center_icon"><i class="ti-shopping-cart-full"></i></div>
                    <div class="medium_divider"></div>
                </div>

            </div>

        </div>

    </div>
    <!-- END SECTION SHOP -->
    <script>

        cartList();
        async function cartList() {
            let res = await axios.get("/cart-list");
            $("#cartListTable").empty();
            $("#gradTotalTable").empty();

            let grandTotal = 0; // Moved outside the loop

            res.data['data'].forEach((item, i) => {
                let price = item['product']['price'];
                let qty = item['qty'];
                let subTotal = (price * qty).toFixed(2);

                grandTotal += parseFloat(subTotal); // Accumulate here

                let cartList = `
                <tr>
                    <td class="product-thumbnail">
                        <a href="#"><img src="${item.product.image}" alt="${item.product.title}"></a>
                    </td>
                    <td class="product-name" data-title="Product">
                        <a href="#">${item.product.title}</a>
                    </td>
                    <td class="product-price" data-title="Price">$${price}</td>
                    <td class="product-quantity" data-title="Quantity">
                        <div class="quantity">${qty}</div>
                    </td>
                    <td class="product-subtotal" data-title="Total">$${subTotal}</td>
                    <td class="product-remove removeCart" data-id="${item['product']['id']}" data-title="Remove">
                        <a href="#" class="cartRemove"><i class="ti-close"></i></a>
                    </td>
                </tr>
            `;
                $("#cartListTable").append(cartList);
            });

            // Append grand total row
            let gradTotal = `
                            <p class="grand-total-st">Grand Total: <span> $${grandTotal.toFixed(2)}</span></p>
                        `;
            $("#gradTotalTable").append(gradTotal);

            // Bind remove event

            $(".removeCart").on('click', function () {
                let id= $(this).data('id');
                removeCartList(id)
            })
        }

        async function removeCartList(id){

            $(".preloader").fadeOut(100).addClass('loaded');
            let res = await axios.get("/delete-cart/"+id);
            $(".preloader").fadeOut(100).addClass('loaded');

            if (res.status===200){
                await cartList();
            }
            else {
                alert("Request Fail ")
            }
        }

        async function checkOut(){
            $(".preloader").fadeOut(100).addClass('loaded');
            $("#paymentList").empty();

            let res = await axios.get("/create-invoice");

            $(".preloader").fadeOut(100).addClass('loaded');

            if (res.status===200){
                $("#paymentMethodModal").modal('show');

                res.data['data'].forEach((item, i) =>{
                    let EachItem = `

                       <tr>
                            <td>
                                <ul class="list-group">
                                    <li class="list-group-item"><div class="d-flex justify-content-between"><h5>Total: </h5><span>${item['total']}</span></div></li>
                                </ul>
                                <ul class="list-group">
                                    <li class="list-group-item"><div class="d-flex justify-content-between">VAT+: <span>${item['vat']}</span></div></li>
                                </ul>
                                <ul class="list-group">
                                    <li class="list-group-item"><div class="d-flex justify-content-between">Payable: <span>${item['payable']}</span></div></li>
                                </ul>
                                <ul class="list-group">
                                    <li class="list-group-item"><div class="d-flex justify-content-between"><p class="payWithText">Pay With: </p><span><img class="amazonPay" src="/frontend/paymentIcon/amazon pay.png"></span><span><img src="/frontend/paymentIcon/card.png"></span><span><p class="payWithText">Pay with oter's</p></span></div></li>
                                </ul>
                                <a class="btn btn-danger btn-sm" href="${item['payment_url']}">Pay</a>
                            </td>
                        </tr>
                    `
                    $("#paymentList").append(EachItem);
                })
            }
            else {
                alert("Request Fail");
            }
        }

    </script>

    <style>
        #gradTotalTable {
            display: flex;
        }

        .grand-total-st {
            font-weight: bold;
            font-size: 19px;
            margin-top: 10px;
        }
        img.amazonPay {
            width: 108px;
        }
        p.payWithText {
            color: firebrick;
            font-weight: 600;
        }

    </style>
