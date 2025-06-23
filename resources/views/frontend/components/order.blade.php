<div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">
    <div class="card">
        <div class="card-header">
            <h3>Orders</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Num.</th>
                        <th>Payable</th>
                        <th>Shipping</th>
                        <th>Delivery</th>
                        <th>Payment</th>
                        <th>More</th>
                    </tr>
                    </thead>
                    <tbody id="orderListTB">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>

    async function orderListDetails(){
        let res = await axios.get("/invoice-list");
        let json = res.data;

        $("#orderListTB").empty();

        if (json.length!==0){
            json.forEach((item, i)=> {
                let rows = `<tr>
                        <td>${item['id']}</td>
                        <td>${item['payable']}</td>
                        <td class="shipAddres">${item['ship_details']}</td>
                        <td>${item['delivery_status']}</td>
                        <td>${item['payment_status']}</td>
                        <td><button class="btn btn-fill-out btn-sm more" data-id=${item['id']}>View</button></td>
                    </tr>`
                $("#orderListTB").append(rows);
            })
            $(".more").on('click', function () {
                let id = $(this).data('id');
                InvoiceProductList(id)
            })

        }
    }

    async function InvoiceProductList(id) {
        $(".preloader").delay(90).fadeIn(100).removeClass('loaded');
        let res = await  axios.get("/invoice-product-list/"+id);
        $("#invoiceProductModal").modal('show');
        $(".preloader").delay(90).fadeOut(100).addClass('loaded');

        $("#invoiceProductList").empty();

        res.data.forEach((item, i) => {
            let rows = `<tr>
                            <td><img class="invImageStyle" src="${item['product']['image']}" alt="${item['product']['title']}"></td>
                            <td>${item['product']['title']}</td>
                            <td>${item['qty']}</td>
                            <td>${item['sale_price']}</td>
                        </tr>`
            $("#invoiceProductList").append(rows);
        });

    }

</script>

<style>
    .invImageStyle {
        width: 80px;
        height: 100px;
    }
</style>
