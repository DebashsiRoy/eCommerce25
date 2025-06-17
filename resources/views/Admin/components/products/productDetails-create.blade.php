<div class="modal fade border-radius-4" id="addDetails" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content createModal">
            <div class="modal-header px-5">
                <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body px-5">
                {{--       form start         --}}


                <form id="save-pDetails">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">

                                <div class="row">
                                    <div class="col">
                                        <label class="form-label fs-2 pt-3">Product Description</label>
                                        <textarea type="text" class="form-control addCatName border border-info summernote" id="productDetails"></textarea>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <label class="form-label fs-2 pt-3">color</label>
                                        <input type="text" class="form-control addCatName border border-info" id="productDTLColor">
                                    </div>
                                    <div class="col">
                                        <label class="form-label fs-2 pt-3">size</label>
                                        <input type="text" class="form-control addCatName border border-info" id="productDTLSize">
                                    </div>
                                </div>
                                {{--This is image upload section--}}
                                <div class="row mt-5">
                                    <div class="col">
                                        <img class="w-15" id="newImg1" src="{{asset('admin/images/default.jpg')}}"/>
                                        <br/>
                                        <label class="form-label fs-2">Product Image 1</label>
                                        <input oninput="newImg1.src=window.URL.createObjectURL(this.files[0])" type="file" class="form-control addCatName border border-info" id="productDTLImg1">
                                    </div>
                                    <div class="col">
                                        <img class="w-15" id="newImg2" src="{{asset('admin/images/default.jpg')}}"/>
                                        <br/>
                                        <label class="form-label fs-2">Product Image 2</label>
                                        <input oninput="newImg2.src=window.URL.createObjectURL(this.files[0])" type="file" class="form-control addCatName border border-info" id="productDTLImg2">
                                    </div>
                                    <div class="col">
                                        <img class="w-15" id="newImg3" src="{{asset('admin/images/default.jpg')}}"/>
                                        <br/>
                                        <label class="form-label fs-2">Product Image 3</label>
                                        <input oninput="newImg3.src=window.URL.createObjectURL(this.files[0])" type="file" class="form-control addCatName border border-info" id="productDTLImg3">
                                    </div>
                                    <div class="col">
                                        <img class="w-15" id="newImg4" src="{{asset('admin/images/default.jpg')}}"/>
                                        <br/>
                                        <label class="form-label fs-2">Product Image 4</label>
                                        <input oninput="newImg4.src=window.URL.createObjectURL(this.files[0])" type="file" class="form-control addCatName border border-info" id="productDTLImg4">
                                    </div>
                                </div>
                                <input class="d-none" id="addDetailsBtn">

                            </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer px-5">
                <button type="button" id="modal-details-close" class="btn btn-secondary fs-3 border-radius-10" data-bs-dismiss="modal">Close</button>
                <button onclick="addProductDetails()" type="button" id="save-btn" class="btn btn-primary fs-3 border-radius-10">Save changes</button>
            </div>
        </div>
    </div>
</div>

<script>
    $('.summernote').summernote({
        tabsize: 2,
        height: 300
    });

    async function FillProductDetails(id) {
        document.getElementById('addDetailsBtn').value = id;
    }


    // Submit product Details

    async function addProductDetails() {
        let productDetails = document.getElementById('productDetails').value;
        let productDTLColor = document.getElementById('productDTLColor').value;
        let productDTLSize = document.getElementById('productDTLSize').value;
        let productID = document.getElementById('addDetailsBtn').value;
        let productDTLImg1 = document.getElementById('productDTLImg1').files[0];
        let productDTLImg2 = document.getElementById('productDTLImg2').files[0];
        let productDTLImg3 = document.getElementById('productDTLImg3').files[0];
        let productDTLImg4 = document.getElementById('productDTLImg4').files[0];

        if (productDetails.length === 0){
            errorToast("Product Details is Required !")
        }
        else if(productDTLColor.length === 0 ){
            errorToast("Product Color is Required !")
        }
        else if(productDTLSize.length === 0 ){
            errorToast("Product Size is Required !")
        }
        else if(productDTLSize.length === 0 ){
            errorToast("Product Size is Required !")
        }
        else if (!productDTLImg1){
            errorToast("Product Image one is required !")
        }
        else if (!productDTLImg2){
            errorToast("Product Image two is required !")
        }
        else if (!productDTLImg3){
            errorToast("Product Image three is required !")
        }
        else if (!productDTLImg4){
            errorToast("Product Image four is required !")
        }
        else {
            document.getElementById('modal-details-close').click();
            let formData = new FormData();
            formData.append('product_id', productID);
            formData.append('description', productDetails);
            formData.append('color', productDTLColor);
            formData.append('size', productDTLSize);
            formData.append('img1', productDTLImg1);
            formData.append('img2', productDTLImg2);
            formData.append('img3', productDTLImg3);
            formData.append('img4', productDTLImg4);

            showLoader();
            let res = await axios.post("/add-product-details", formData,{
                headers: {
                    'content-type': 'multipart/form-data'
                }
            });
            console.log(res); // 👈 ADD THIS
            hideLoader();

            if (res.status===201){
                successToast("Product Added Successfully");
                document.getElementById('save-pDetails').reset();
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
