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
                            <input type="file" class="form-control" id="img1" required>
                        </div>
                        <div class="col-md-3">
                            <label>Image 2</label>
                            <input type="file" class="form-control" id="img2" required>
                        </div>
                        <div class="col-md-3">
                            <label>Image 3</label>
                            <input type="file" class="form-control" id="img3" required>
                        </div>
                        <div class="col-md-3">
                            <label>Image 4</label>
                            <input type="file" class="form-control" id="img4" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label>Description</label>
                        <textarea id="description" class="form-control" rows="3" required></textarea>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <label>Color</label>
                            <input type="text" id="color" class="form-control" required>
                        </div>
                        <div class="col">
                            <label>Size</label>
                            <input type="text" id="size" class="form-control" required>
                        </div>
                    </div>

                    <input type="hidden" id="product_id" value=""> <!-- set this dynamically -->
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button onclick="submitProductDetails()" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>

<script>
    async function submitProductDetails() {
        let form = document.getElementById('productDetailsForm');
        let formData = new FormData();

        formData.append('img1', document.getElementById('img1').files[0]);
        formData.append('img2', document.getElementById('img2').files[0]);
        formData.append('img3', document.getElementById('img3').files[0]);
        formData.append('img4', document.getElementById('img4').files[0]);

        formData.append('description', document.getElementById('description').value);
        formData.append('color', document.getElementById('color').value);
        formData.append('size', document.getElementById('size').value);
        formData.append('product_id', document.getElementById('product_id').value);

        try {
            // Optional loader
            let res = await axios.post('/product-add-details', formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            });

            if (res.data.status === 'success') {
                alert('Product details added successfully!');
                form.reset();
                document.querySelector('#addProductDetails .btn-close').click();
                // Optionally refresh list
            } else {
                alert('Error: ' + res.data.message);
            }
        } catch (err) {
            console.error(err);
            alert('Something went wrong while adding product details.');
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
