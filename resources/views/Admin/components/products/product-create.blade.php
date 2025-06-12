<div class="modal fade border-radius-4" id="createProduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content createModal">
            <div class="modal-header px-5">
                <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body px-5">
                {{--       form start         --}}
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
                                        <input type="text" class="form-control addCatName border border-info" placeholder="Enter a maximum of 245 characters" id="productShortDes">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <label class="form-label fs-2 pt-3">Price</label>
                                        <input type="text" class="form-control addCatName border border-info" id="productPrice">
                                    </div>
                                    <div class="col">
                                        <label class="form-label fs-2 pt-3">Discount(%)</label>
                                        <input type="text" class="form-control addCatName border border-info" id="productDiscount">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <label class="form-label fs-2 pt-3">Remark</label>
                                        <select class="form-select addCatName" id="remarkSelect">
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

                                <img class="w-15" id="newImg" src="{{asset('admin/images/default.jpg')}}"/>
                                <br/>
                                <label class="form-label fs-2">Product Image</label>
                                <input oninput="newImg.src=window.URL.createObjectURL(this.files[0])" type="file" class="form-control addCatName border border-info" id="productImg">

                            </div>

                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer px-5">
                <button type="button" id="modal-close" class="btn btn-secondary fs-3 border-radius-10" data-bs-dismiss="modal">Close</button>
                <button onclick="create()" type="button" id="save-btn" class="btn btn-primary fs-3 border-radius-10">Save changes</button>
            </div>
        </div>
    </div>
</div>
<script>
    // Fill-up
    FillCategoryDropDown();
    async function FillCategoryDropDown() {

        let res = await axios.get("/category-list");
        res.data.forEach(function (item,i) {
            let option = `<option value="${item['id']}">${item['categoryName']}</option>`
            $("#categorySelect").append(option);
        });
    }


    FillBrandDropDown();
    async function FillBrandDropDown() {
        let res = await axios.get("/brands-list");
        res.data.forEach(function (item) {
            let option = `<option value="${item['id']}">${item['brandName']}</option>`
            $("#brandSelect").append(option);
        });
    }



    async function create(){
        let categorySelect =document.getElementById('categorySelect').value;
        let brandSelect =document.getElementById('brandSelect').value;
        let productTitle =document.getElementById('productTitle').value;
        let productShortDes =document.getElementById('productShortDes').value;
        let productPrice =document.getElementById('productPrice').value;
        let productDiscount =document.getElementById('productDiscount').value;
        let remarkSelect =document.getElementById('remarkSelect').value;
        let productStock =document.getElementById('productStock').value;
        let productStar =document.getElementById('productStar').value;
        let productImg = document.getElementById('productImg').files[0];

        if (categorySelect.length===0){
            errorToast("Category Name Required !")
        }
        else if (brandSelect.length===0){
            errorToast("Brand Name is required !")
        }
        else if (productTitle.length===0){
            errorToast("Product Name is required !")
        }
        else if (productShortDes.length===0){
            errorToast("Enter your product short discount !")
        }
        else if (productDiscount.length === 0 || productDiscount < 0 || productDiscount > 100) {
            errorToast("Product Discount must be between 0% and 100%");
        }

        else if (productPrice.length===0){
            errorToast("Product Price is required !")
        }
        else if (productDiscount.length===0){
            errorToast("Product Discount is required !")
        }
        else if (remarkSelect.length===0){
            errorToast("Product Remark is required !")
        }
        else if (productStock.length===0){
            errorToast("Product Stock is required !")
        }
        else if (productStar.length===0){
            errorToast("Product Star is required !")
        }

        else if (!productImg){
            errorToast("Product Image is required !")
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
            formData.append('remark', remarkSelect);
            formData.append('stock', productStock);
            formData.append('star', productStar);
            formData.append('image', productImg);

            showLoader();
            let res= await axios.post("/product-create", formData,{
                headers:{
                    'content-type':'multipart/form-data'
                }
            })
            console.log(res); // 👈 ADD THIS

            hideLoader();

            if (res.status===201){
                successToast("Product Added Successfully");
                document.getElementById('save-form').reset();
                await getList();
            }
            else {
                errorToast("Product is not Added !")
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
    .detailsImg{
        height: 100px;
        width: auto;
    }
    input#categoryName{
        border-color: lightskyblue;
        border-width: 3px;
    }

    .modal-content.createModal {
        width: 850px !important;
        padding: 15px;
        border-radius: 10px;
        border-block-color: lightskyblue;
        align-content: inherit;
    }
    #categoryImg {
        padding: 12px;
        border-radius: 10px;
        border-color: lightskyblue;
        border-width: 3px;
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
    #remarkSelect {
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
