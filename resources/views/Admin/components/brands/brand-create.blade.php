<div class="modal fade border-radius-4" id="createBrand" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header px-5">
                <h5 class="modal-title" id="exampleModalLabel">Add Brand</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body px-5">
                <form id="save-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">

                                <label class="form-label fs-2">Brand Name</label>
                                <input type="text" class="form-control addCatName" id="brandName">
                                <br/>
                                <img class="w-15" id="newImg" src="{{asset('admin/images/default.jpg')}}"/>
                                <br/>

                                <label class="form-label fs-2">Brand Image</label>
                                <input oninput="newImg.src=window.URL.createObjectURL(this.files[0])" type="file" class="form-control addCatName" id="brandImg">

                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer px-5">
                <button type="button" id="modal-close" class="btn btn-secondary fs-3 border-radius-10" data-bs-dismiss="modal">Close</button>
                <button onclick="Create()" type="button" id="save-btn" class="btn btn-primary fs-3 border-radius-10">Create Brand</button>
            </div>
        </div>
    </div>
</div>
<script>
    async function Create(){
        let bName =document.getElementById('brandName').value;
        let bImg = document.getElementById('brandImg').files[0];

        if (bName.length===0){
            errorToast("Brand Name Required !")
        }
        else if (bImg.length===0){
            errorToast("Brand Image is required !")
        }
        else {
            document.getElementById('modal-close').click();

            let formData=new FormData();
            formData.append('brandName', bName)
            formData.append('brandImg', bImg)
            const config ={
                headers:{
                    'content-type':'multipart/form-data'
                }
            }

            showLoader();
            let res= await axios.post("/admin/brands/create", formData, config)
            hideLoader();

            if (res.status===200){
                successToast("Brand Added Successfully");
                document.getElementById('save-form').reset();
                await getBrandList();
            }
            else {
                errorToast("Brand is not Added !")
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
