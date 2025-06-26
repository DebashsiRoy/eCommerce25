<div class="section small_pt pb_70">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="heading_s1 text-center">
                    <h2>Top Brand</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 d-flex" id="homeBrandList">

            </div>
        </div>
    </div>
</div>



<script>
    // Define the function
    async function TopBrandList() {
        try {
            let res = await axios.get("/brand-list-home");
            $("#homeBrandList").empty();

            res.data.forEach(function (item, i) {
                let rowData = `
                    <div class="p-2 col-2">
                        <div class="product">
                            <div class="product_action_box">
                                <ul class="list_none pr_action_btn">
                                    <li><a href="/details?id=${item['id']}" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
                                </ul>
                            </div>

                            <div class="product_img">
                                <a href="/details?id=${item['id']}">
                                    <img src="${item['brandImg']}" alt="${item['brandName']}">
                                </a>
                            </div>
                            <div class="product_info">
                                <h6 class="product_title"><a href="/details?id=${item['id']}">${item['brandName']}</a></h6>
                            </div>
                        </div>
                    </div>
                `;
                $("#homeBrandList").append(rowData);
            });
        } catch (error) {
            console.error("TopCategoryList error:", error);
        }
    }

    // Call the function
    // TopBrandList();
</script>

<style>
    .product_img {
        width: 100px;
        height: 100px;
        margin: 0 auto;
        padding-top: 5px;
    }
    .topCat {
        flex: 0 0 auto;
        width: 12% !important;
        margin: 15px;
    }
</style>
