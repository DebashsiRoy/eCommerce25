<div class="modal fade border-radius-4" id="updateBrand" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header px-5">
                <h5 class="modal-title" id="exampleModalLabel">Update Brand</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body px-5">
                <form id="update-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">

                                <label class="form-label fs-2">Brand Name</label>
                                <input type="text" class="form-control addCatName" id="brandNameUpdate">
                                <br/>
                                <img class="w-15" id="oldImg" src="{{asset('images/default.jpg')}}"/>
                                <br/>
                                <label class="form-label mt-2">Image</label>
                                <input oninput="oldImg.src=window.URL.createObjectURL(this.files[0])"  type="file" class="form-control" id="brandImgUpDate">
                                <input type="text" class="d-none" id="updateID">
                                <input type="text" class="d-none" id="filePath">

                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer px-5">
                <button type="button" id="update-modal-close" class="btn btn-secondary fs-3 border-radius-10" data-bs-dismiss="modal">Close</button>
                <button onclick="updateBrand()" type="button" id="save-btn" class="btn btn-primary fs-3 border-radius-10">Update Brand</button>
            </div>
        </div>
    </div>
</div>
<script>
    async function FillUpUpdateForm(id, filePath){
        document.getElementById('updateID').value=id;
        document.getElementById('filePath').value=filePath;
        document.getElementById('oldImg').src=filePath;

        showLoader();
        let res=await axios.post("/brand-by-id", {id:id})
        hideLoader();

        document.getElementById('brandNameUpdate').value=res.data['brandName']
    }
    async function updateBrand(){
        let brandUpdatedName=document.getElementById('brandNameUpdate').value;
        let updateID=document.getElementById('updateID').value;
        let filePath=document.getElementById('filePath').value;
        let brandImgUpdate=document.getElementById('brandImgUpDate').files[0];

        if (brandUpdatedName.length === 0){
            errorToast("Brand Name Required !");
        } else {
            document.getElementById('update-modal-close').click();

            let formData = new FormData();
            formData.append('id', updateID);
            formData.append('brandName', brandUpdatedName);

            if (brandImgUpdate){
                formData.append('brandImg', brandImgUpdate);
            }
            else {
                formData.append('file_path', filePath);
            }

            const config = {
                headers: {
                    'content-type': 'multipart/form-data'
                }
            }
            showLoader();
            let res=await axios.post("/brand-update", formData, config);
            hideLoader();

            if (res.status ===200 && res.data===1){
                successToast("Brand Update Successfully");
                document.getElementById('update-form').reset();
                await getBrandList();
            } else {
                errorToast("Brand update failed");
            }
        }

    }
</script>


<style>
    img#oldImg {
        height: auto;
        width: 25%;
        margin: 15px;
    }
</style>
