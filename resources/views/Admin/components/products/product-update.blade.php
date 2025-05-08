<div class="modal fade border-radius-4" id="updatedProduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header px-5">
                <h5 class="modal-title" id="exampleModalLabel">Update Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body px-5">
                <form id="updateProduct-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">

                                <div class="row">
                                    <div class="col">
                                        <label class="form-label fs-2 pt-3">Category</label>
                                        <select class="form-select addCatName" id="categoryUpdate">
                                            <option value="" selected>Choose Category</option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <label class="form-label fs-2 pt-3">Brand</label>
                                        <select class="form-select addCatName" id="brandUpdate">
                                            <option value="" selected>Choose Brand</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <label class="form-label fs-2 pt-3">Product Title</label>
                                        <input type="text" class="form-control addCatName border border-info" id="productTitleUpdate">
                                    </div>
                                    <div class="col">
                                        <label class="form-label fs-2 pt-3">Short Description</label>
                                        <input type="text" class="form-control addCatName border border-info" id="productShortDesUpdate">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <label class="form-label fs-2 pt-3">Price</label>
                                        <input type="text" class="form-control addCatName border border-info" id="productPriceUpdate">
                                    </div>
                                    <div class="col">
                                        <label class="form-label fs-2 pt-3">Discount</label>
                                        <input type="text" class="form-control addCatName border border-info" id="productDiscountUpdate">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <label class="form-label fs-2 pt-3">Stock</label>
                                        <input type="text" class="form-control addCatName border border-info" id="productStockUpdate">
                                    </div>
                                    <div class="col">
                                        <label class="form-label fs-2 pt-3">Star</label>
                                        <input type="text" class="form-control addCatName border border-info" id="productStarUpdate">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <label class="form-label fs-2 pt-3">Remark</label>
                                        <select class="form-select addCatName" id="productRemarkUpdate">
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

                                <img class="w-15" id="oldImg" src="{{asset('admin/images/default.jpg')}}"/>
                                <br/>
                                <label class="form-label fs-2">Product Image</label>
                                <input oninput="oldImg.src=window.URL.createObjectURL(this.files[0])" type="file" class="form-control addCatName border border-info" id="productImgUpdate">
                                <input type="text" class="d-none" id="updateID">
                                <input type="text" class="d-none" id="filePath">
                            </div>
                            <h4>Product Details Section</h4>
                            <div class="row mb-3">
                                <div class="col-md-3">
                                    <img class="w-15 detailsImg" id="updatedNewDetailsImg1" src="{{asset('admin/images/default.jpg')}}"/>
                                    <label>Image 1</label>
                                    <input oninput="updatedNewDetailsImg1.src=window.URL.createObjectURL(this.files[0])" type="file" class="form-control addCatName border border-info" id="updatedDetailsImg1" required>
                                </div>
                                <div class="col-md-3">
                                    <img class="w-15 detailsImg" id="updatedNewDetailsImg2" src="{{asset('admin/images/default.jpg')}}"/>
                                    <label>Image 2</label>
                                    <input oninput="updatedNewDetailsImg2.src=window.URL.createObjectURL(this.files[0])" type="file" class="form-control addCatName border border-info" id="updatedDetailsImg2" required>
                                </div>
                                <div class="col-md-3">
                                    <img class="w-15 detailsImg" id="updatedNewDetailsImg3" src="{{asset('admin/images/default.jpg')}}"/>
                                    <label>Image 3</label>
                                    <input oninput="updatedNewDetailsImg3.src=window.URL.createObjectURL(this.files[0])" type="file" class="form-control addCatName border border-info" id="updatedDetailsImg3" required>
                                </div>
                                <div class="col-md-3">
                                    <img class="w-15 detailsImg" id="updatedNewDetailsImg4" src="{{asset('admin/images/default.jpg')}}"/>
                                    <label>Image 4</label>
                                    <input oninput="updatedNewDetailsImg4.src=window.URL.createObjectURL(this.files[0])" type="file" class="form-control addCatName border border-info" id="updatedDetailsImg4" required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>Description</label>
                                <textarea id="detailsDescription" class="form-control addCatName border border-info" rows="3" required></textarea>
                            </div>

                            <div class="row mb-3">
                                <div class="col">
                                    <label>Color</label>
                                    <input type="text" id="detailsColor" class="form-control addCatName border border-info" required>
                                </div>
                                <div class="col">
                                    <label>Size</label>
                                    <input type="text" id="detailsSize" class="form-control addCatName border border-info" required>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer px-5">
                <button type="button" id="productModal-close" class="btn btn-secondary fs-3 border-radius-10" data-bs-dismiss="modal">Close</button>
                <button onclick="updateProduct()" type="button" id="save-btn" class="btn btn-primary fs-3 border-radius-10">Update Product</button>
            </div>
        </div>
    </div>
</div>
<script>
    // Load categories into the dropdown
    async function FillUpdatedCategoryDropDown() {
        let res = await axios.get("/category-list");
        res.data.forEach(function (item,i) {
            let option = `<option value="${item['id']}">${item['categoryName']}</option>`
            $("#categoryUpdate").append(option);
        });
    }

    // Load brands into the dropdown
    async function FillUpdatedBrandDropDown() {
        let res = await axios.get("/brands-list");
        res.data.forEach(function (item, i) {
            let option = `<option value="${item['id']}">${item['brandName']}</option>`
            $("#brandUpdate").append(option);
        });
    }

    // Fill update form with selected product data
    async function FillUpdatedFormProduct(id, filePath) {
        document.getElementById('updateID').value = id;
        document.getElementById('filePath').value = filePath;
        document.getElementById('oldImg').src = filePath;

        showLoader();

        await FillUpdatedCategoryDropDown();
        await FillUpdatedBrandDropDown();

        let res = await axios.post("/product-by-id", { id });
        hideLoader();

        const data = res.data;

        // Populate the form
        document.getElementById('categoryUpdate').value = data.category_id;
        document.getElementById('brandUpdate').value = data.brand_id;
        document.getElementById('productTitleUpdate').value = data.title;
        document.getElementById('productShortDesUpdate').value = data.short_des;
        document.getElementById('productPriceUpdate').value = data.price;
        document.getElementById('productDiscountUpdate').value = data.discount;
        document.getElementById('productStockUpdate').value = data.stock;
        document.getElementById('productStarUpdate').value = data.star;
        document.getElementById('productRemarkUpdate').value = data.remark;
    }

    // Submit product update
    async function updateProduct() {
        const categoryUpdate = document.getElementById('categoryUpdate').value;
        const brandUpdate = document.getElementById('brandUpdate').value;
        const productTitleUpdate = document.getElementById('productTitleUpdate').value;
        const productShortDesUpdate = document.getElementById('productShortDesUpdate').value;
        const productPriceUpdate = document.getElementById('productPriceUpdate').value;
        const productDiscountUpdate = document.getElementById('productDiscountUpdate').value;
        const productRemarkUpdate = document.getElementById('productRemarkUpdate').value;
        const productStockUpdate = document.getElementById('productStockUpdate').value;
        const productStarUpdate = document.getElementById('productStarUpdate').value;
        const productImgUpdate = document.getElementById('productImgUpdate').files[0];
        const updateID = document.getElementById('updateID').value;

        // Validation
        if (categoryUpdate.length===0){
            errorToast("Category Name Required !")
        }
        else if (brandUpdate.length===0){
            errorToast("Brand Name is required !")
        }
        else if (productTitleUpdate.length===0){
            errorToast("Product Name is required !")
        }
        else if (productDiscountUpdate.length === 0 || productDiscountUpdate < 0 || productDiscountUpdate > 100) {
            errorToast("Product Discount must be between 0% and 100%");
        }

        else if (productPriceUpdate.length===0){
            errorToast("Product Price is required !")
        }
        else if (productShortDesUpdate.length===0){
            errorToast("Product Short Description is required !")
        }
        else if (productRemarkUpdate.length===0){
            errorToast("Product Remark is required !")
        }
        else if (productStockUpdate.length===0){
            errorToast("Product Stock is required !")
        }
        else if (productStarUpdate.length===0){
            errorToast("Product Star is required !")
        }

        // Close modal
        document.getElementById('productModal-close').click();

        let formData = new FormData();
        formData.append('id', updateID);
        formData.append('category_id', categoryUpdate);
        formData.append('brand_id', brandUpdate);
        formData.append('title', productTitleUpdate);
        formData.append('short_des', productShortDesUpdate);
        formData.append('price', productPriceUpdate);
        formData.append('discount', productDiscountUpdate);
        formData.append('remark', productRemarkUpdate);
        formData.append('stock', productStockUpdate);
        formData.append('star', productStarUpdate);

        if (productImgUpdate) {
            formData.append('image', productImgUpdate);
        }

        showLoader();

        try {
            let res = await axios.post("/product-update", formData, {
                headers: { 'content-type': 'multipart/form-data' }
            });

            hideLoader();

            if (res.status === 200 && res.data === 1) {
                successToast("Product updated successfully");
                document.getElementById('updateProduct-form').reset();
                await getList(); // Refresh product list
            } else {
                errorToast("Product update failed");
            }
        } catch  {
            hideLoader();
            errorToast("Error updating product");
        }
    }
</script>

<style>
    img#oldImg {
        height: auto;
        width: 25%;
        margin: 15px;
    }
    input#categoryName{
        border-color: lightskyblue;
        border-width: 3px;
    }

    #productImg {
        padding: 12px;
        border-radius: 10px;
        border-color: lightskyblue;
        border-width: 3px;
    }
    .modal-dialog {
        max-width: 870px !important;
    }
    .modal-content {
        padding: 15px;
        border-radius: 10px;
        border-block-color: lightskyblue;
    }
    .form-label.fs-2 {
        padding: 0 0 15px 0;
    }

    #categoryUpdate, #brandUpdate {
        font-size: inherit;
        padding: 12px;
        border-radius: 10px;
        border-color: lightskyblue;
        border-width: 3px;
    }

    .d-flex.justify-content-between.mt-5 {
        width: 98%;
    }
    #productRemarkUpdate {
        font-size: initial;
        padding: 5px;
        border-radius: 10px;
        border-color: lightskyblue;
        margin: auto;
        padding-left: 15px;
    }
    #productImgUpdate {
        font-size: 15px;
        border-radius: 10px;
        padding: 12px;
        border-color: lightskyblue;
    }
</style>
