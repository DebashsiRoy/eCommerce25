<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade border-radius-4" id="updatedProduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header px-5">
                <h5 class="modal-title" id="exampleModalLabel">Update Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body px-5">
                <form id="save-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">

                                <div class="row">
                                    <div class="col">
                                        <label class="form-label fs-2 pt-3">Category</label>
                                        <select class="form-select addCatName" id="categorySelect">
                                            <option value="" selected>Choose Category</option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <label class="form-label fs-2 pt-3">Brand</label>
                                        <select class="form-select addCatName" id="brandSelect">
                                            <option value="" selected>Choose Brand</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <label class="form-label fs-2 pt-3">Product Title</label>
                                        <input type="text" class="form-control addCatName border border-info" id="productTitle">
                                    </div>
                                    <div class="col">
                                        <label class="form-label fs-2 pt-3">Short Description</label>
                                        <input type="text" class="form-control addCatName border border-info" id="productShortDes">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <label class="form-label fs-2 pt-3">Price</label>
                                        <input type="text" class="form-control addCatName border border-info" id="productPrice">
                                    </div>
                                    <div class="col">
                                        <label class="form-label fs-2 pt-3">Discount</label>
                                        <input type="text" class="form-control addCatName border border-info" id="productDiscount">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <label class="form-label fs-2 pt-3">Stock</label>
                                        <input type="text" class="form-control addCatName border border-info" id="productStock">
                                    </div>
                                    <div class="col">
                                        <label class="form-label fs-2 pt-3">Star</label>
                                        <input type="text" class="form-control addCatName border border-info" id="productStar">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <label class="form-label fs-2 pt-3">Remark</label>
                                        <select class="form-select addCatName" id="productRemark">
                                            <option value="popular" selected>popular</option>
                                            <option value="new" >new</option>
                                            <option value="top" >top</option>
                                            <option value="special" >special</option>
                                            <option value="trending" >trending</option>
                                            <option value="regular" >regular</option>
                                        </select>
                                    </div>
                                    <div class="col">

                                    </div>
                                </div>

                                <img class="w-15" id="newImg" src="{{asset('admin/images/default.jpg')}}"/>
                                <br/>
                                <label class="form-label fs-2">Category Image</label>
                                <input oninput="newImg.src=window.URL.createObjectURL(this.files[0])" type="file" class="form-control addCatName border border-info" id="productImg">

                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer px-5">
                <button type="button" id="modal-close" class="btn btn-secondary fs-3 border-radius-10" data-bs-dismiss="modal">Close</button>
                <button onclick="Save()" type="button" id="save-btn" class="btn btn-primary fs-3 border-radius-10">Update Product</button>
            </div>
        </div>
    </div>
</div>
<script>
    // Fill-up
    FillCategoryDropDown();
    async function FillCategoryDropDown(){
        let res=await axios.get("/category-list")
        res.data.forEach(function (item, i){
            let option=`<option value="${item['id']}" selected>${item['categoryName']}</option>`
            $("#categorySelect").append(option);
        })
    }

    FillBrandDropDown();
    async function FillBrandDropDown(){
        let res=await axios.get("/brands-list")
        res.data.forEach(function (item, i){
            let option=`<option value="${item['id']}" selected>${item['brandName']}</option>`
            $("#brandSelect").append(option);
        })
    }


    async function Save() {
        let categorySelect = document.getElementById('categorySelect').value;
        let brandSelect = document.getElementById('brandSelect').value;
        let productTitle = document.getElementById('productTitle').value;
        let productShortDes = document.getElementById('productShortDes').value;
        let productPrice = document.getElementById('productPrice').value;
        let productDiscount = document.getElementById('productDiscount').value;
        let productStock = document.getElementById('productStock').value;
        let productStar = document.getElementById('productStar').value;
        let productRemark = document.getElementById('productRemark').value;
        let productImg = document.getElementById('productImg').files[0];


        if (categorySelect.length===0){
            errorToast("Please select category !")
        }
        else if (brandSelect.length===0){
            errorToast("Please select Brand !")
        }
        else if (productTitle.length===0){
            errorToast("Please add a Title for your product!")
        }
        else if (productShortDes.length===0){
            errorToast("Please Enter your product short description!")
        }
        else if (productPrice.length===0){
            errorToast("Enter your product price!")
        }
        else if (productDiscount.length===0){
            errorToast("Enter your product discount!")
        }
        else if (productStock.length===0){
            errorToast("Enter your product stock!")
        }
        else if (productStar.length===0){
            errorToast("Enter your product Star!")
        }
        else if (productRemark.length===0){
            errorToast("Enter your product Star!")
        }
        else if (productImg.length===0){
            errorToast("Enter your product Image!")
        }
        else {
            document.getElementById('modal-close').click();

            let formData = new FormData();
            formData.append('category_id', categorySelect);
            formData.append('brand_id', brandSelect);
            formData.append('title', productTitle);
            formData.append('short_des', productShortDes);
            formData.append('price', productPrice);
            formData.append('discount', productDiscount);
            formData.append('stock', productStock);
            formData.append('star', productStar);
            formData.append('remark', productRemark);
            formData.append('image', productImg);

            const config = {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            };

            showLoader();
            try {
                let res = await axios.post("/product-crate", formData, config);
                console.log("Response:", res);

                hideLoader();
                if (res.status === 201) {
                    successToast("Product Added Successfully!");
                    document.getElementById("save-form").reset();
                    await getList();
                } else {
                    errorToast("Product is not added!");
                }
            } catch (error) {
                hideLoader();
                console.error("Error:", error.response);
                errorToast("Failed to add product!");
            }

        }

    }



</script>

<style>
    img#newImg {
        height: auto;
        width: 25%;
        margin: 15px;
    }
    input#categoryName{
        border-color: lightskyblue;
        border-width: 3px;
    }

    #categoryImg {
        padding: 12px;
        border-radius: 10px;
        border-color: lightskyblue;
        border-width: 3px;
    }
    .modal-content {
        width: 850px;
        padding: 15px;
        border-radius: 10px;
        border-block-color: lightskyblue;
    }
    .form-label.fs-2 {
        padding: 0 0 15px 0;
    }

    #categorySelect, #brandSelect {
        font-size: inherit;
        padding: 12px;
        border-radius: 10px;
        border-color: lightskyblue;
        border-width: 3px;
    }

    .d-flex.justify-content-between.mt-5 {
        width: 98%;
    }
    #productRemark {
        font-size: initial;
        padding: 5px;
        border-radius: 10px;
        border-color: lightskyblue;
        margin: auto;
        padding-left: 15px;
    }
    #productImg {
        font-size: 15px;
        border-radius: 10px;
        padding: 12px;
        border-color: lightskyblue;
    }
</style>
