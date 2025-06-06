<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="page-title">
                    <h1><span id="policyName"></span></h1>
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
        <div class="row">
            <div id="policy" class="col-12">

            </div>
        </div>
    </div>
</div>
<script>

    async function Policy(){
        let searchParams=new URLSearchParams(window.location.search);
        let type=searchParams.get('type');
        if (type==="about"){
            $("#policyName").text("About Us")
        }
        if (type==="refund"){
            $("#policyName").text("Refund Policy")
        }
        if (type==="terms"){
            $("#policyName").text("Terms & Condition")
        }
        if (type==="how to buy"){
            $("#policyName").text("How to buy")
        }
        if (type==="contact"){
            $("#policyName").text("Contact with Us")
        }
        if (type==="complain"){
            $("#policyName").text("Complain")
        }

        let res=await axios.get("/policy-list/"+type);
        let des=res.data['des']
        $("#policy").html(des)

    }

</script>
<style>
    .product_img {
        width: 150px;
        height: 150px;
        margin: 0 auto;
        padding-top: 5px;
    }
</style>
