<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="page-title">
                    <h1>Brand: <span id="BranName"></span></h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="{{url("/")}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">This Page</a></li>
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<div class="mt-5">
    <div class="container my-5">
        <div id="byBrandList" class="row">

        </div>
    </div>
</div>
<script>
    byBrand();
    async function byBrand(){
        let searchParams=new URLSearchParams(window.location.search);
        let id=searchParams.get('id');

        let res=await axios.get(`/byBrandListById/${id}`);
        $("#byBrandList").empty();
        res.data['data'].forEach((item,i)=>{
            let EachItem=`<div class="col-lg-3 col-md-4 col-6">
                                <div class="product">
                                    <div class="product_img">
                                           <div class="product_action_box">
                                                <ul class="list_none pr_action_btn">
                                                    <li><a href="/details?id=${item['id']}" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
                                                </ul>
                                            </div>

                                            <ul> <a href="#"><img src="${item['image']}" class="popup-ajax" alt="${item['title']}"></a></li></ul>
                                        </div>
                                        <div class="product_info">
                                        <h6 class="product_title"><a href="/details?id=${item['id']}">${item['title']}</a></h6>
                                        <div class="product_price">
                                            <span class="price">$ ${item['price']}</span>
                                        </div>
                                        <div class="rating_wrap">
                                            <div class="rating">
                                                <div class="product_rate" style="width:${item['star']}%"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>`
            $("#byBrandList").append(EachItem);

            $("#BranName").text(res.data['data'][0]['brand']['brandName']);
        })
    }

</script>
<style>
    .product_img {
        width: 150px;
        height: 150px;
        margin: 0 auto;
        padding-top: 5px;
    }
    .popup-ajax {
        position: revert;
    }
</style>
