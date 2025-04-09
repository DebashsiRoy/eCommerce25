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

                                <img class="w-15" id="oldImg" src="{{asset('admin/images/default.jpg')}}"/>
                                <br/>
                                <label class="form-label fs-2">Category Image</label>
                                <input oninput="oldImg.src=window.URL.createObjectURL(this.files[0])" type="file" class="form-control addCatName border border-info" id="productImg">
                                <input type="text" class="" id="updateID">
                                <input type="text" class="" id="filePath">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer px-5">
                <button type="button" id="modal-close" class="btn btn-secondary fs-3 border-radius-10" data-bs-dismiss="modal">Close</button>
                <button onclick="FillUpUpdateForm()" type="button" id="save-btn" class="btn btn-primary fs-3 border-radius-10">Update Product</button>
            </div>
        </div>
    </div>
</div>


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
