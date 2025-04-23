<div class="modal fade" id="addProductDetails" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content p-4">
            <div class="modal-header">
                <h5 class="modal-title">Add Product Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="productDetailsForm">

                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label>Image 1</label>
                            <input type="file" class="form-control" id="detailsImg1" required>
                        </div>
                        <div class="col-md-3">
                            <label>Image 2</label>
                            <input type="file" class="form-control" id="detailsImg2" required>
                        </div>
                        <div class="col-md-3">
                            <label>Image 3</label>
                            <input type="file" class="form-control" id="detailsImg3" required>
                        </div>
                        <div class="col-md-3">
                            <label>Image 4</label>
                            <input type="file" class="form-control" id="detailsImg4" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label>Description</label>
                        <textarea id="detailsDescription" class="form-control" rows="3" required></textarea>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <label>Color</label>
                            <input type="text" id="detailsColor" class="form-control" required>
                        </div>
                        <div class="col">
                            <label>Size</label>
                            <input type="text" id="detailsSize" class="form-control" required>
                        </div>
                    </div>

                    <input type="hidden" id="product_id" value=""> <!-- set this dynamically -->


                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="modal-close" class="btn btn-secondary fs-3 border-radius-10" data-bs-dismiss="modal">Close</button>
                <button onclick="submitProductDetails()" type="button" id="save-btn" class="btn btn-primary fs-3 border-radius-10">Create Brand</button>
            </div>
        </div>
    </div>
</div>

<script>
    async function submitProductDetails() {
        let detailsImg1 = document.getElementById('detailsImg1').files[0];
        let detailsImg2 = document.getElementById('detailsImg2').files[0];
        let detailsImg3 = document.getElementById('detailsImg3').files[0];
        let detailsImg4 = document.getElementById('detailsImg4').files[0];
        let detailsDescription = document.getElementById('detailsDescription').value;
        let detailsColor = document.getElementById('detailsColor').value;
        let detailsSize = document.getElementById('detailsSize').value;

        if (detailsImg1.length===0){
            errorToast("Product image one is required!")
        }
        else if(detailsImg2.length===0){
            errorToast("Product image two is required!")
        }
        else if(detailsImg3.length===0){
            errorToast("Product image two is required!")
        }
        else if(detailsImg4.length===0){
            errorToast("Product image two is required!")
        }
        else if(detailsDescription.length===0){
            errorToast("Product description is required!")
        }
        else if(detailsColor.length===0){
            errorToast("Product color is required!")
        }
        else if(detailsSize.length===0){
            errorToast("Product size is required!")
        }

        else {
            document.getElementById("modal-close").click();

            let formDate=new FormData();
            formDate.append('img1', detailsImg1)
            formDate.append('img2', detailsImg2)
            formDate.append('img3', detailsImg3)
            formDate.append('img4', detailsImg4)
            formDate.append('description', detailsDescription)
            formDate.append('color', detailsColor)
            formDate.append('color', detailsSize)

            const config ={
                headers:{
                    'content-type':'multipart/form-data'
                }
            }
            showLoader();
            let res=await axios.post("/product-add-details", formDate, config)
            hideLoader();

            if(res.status===200){
                successToast("Product Details Added Successfully");
                document.getElementById('productDetailsForm').reset();
                await getPDetailsList()
            }
            else {
                errorToast("Product details is not added!")
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
        width: 100%;
        padding: 15px;
        border-radius: 10px;
        border-block-color: lightskyblue;
    }
    .form-label.fs-2 {
        padding: 0 0 15px 0;
    }


</style>
