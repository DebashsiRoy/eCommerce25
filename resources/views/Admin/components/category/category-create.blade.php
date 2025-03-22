<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade border-radius-4" id="createCategory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header px-5">
                <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body px-5">
                <form id="save-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">

                                <label class="form-label fs-2">Category Name</label>
                                <input type="text" class="form-control addCatName" id="categoryName">
                                <br/>
                                <img class="w-15" id="newImg" src="{{asset('admin/images/default.jpg')}}"/>
                                <br/>

                                <label class="form-label fs-2">Category Image</label>
                                <input oninput="newImg.src=window.URL.createObjectURL(this.files[0])" type="file" class="form-control addCatName" id="categoryImg">

                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer px-5">
                <button type="button" id="modal-close" class="btn btn-secondary fs-3 border-radius-10" data-bs-dismiss="modal">Close</button>
                <button onclick="Save()" type="button" id="save-btn" class="btn btn-primary fs-3 border-radius-10">Save changes</button>
            </div>
        </div>
    </div>
</div>
<script>
    async function Save(){                               // call  Save() function into the button
        let catName = document.getElementById('categoryName').value;
        let catImage = document.getElementById('categoryImg').files[0];
        if (catName.length===0){
            errorToast("Category Name Required !")
        }
        else if (catImage.length===0){
            errorToast("Category Image Required !")
        }
        else {
            document.getElementById('modal-close').click();

            let formData=new FormData();
            formData.append('categoryName',catName)
            formData.append('categoryImg', catImage)
            const config = {
                headers: {
                    'content-type': 'multipart/form-data'
                }
            }

            showLoader();
            let res = await axios.post("/category-crate", formData, config)
            hideLoader();

            if (res.status===201){
                successToast("Category Added Successfully !");
                document.getElementById("save-form").reset();
                await getList();
            }
            else {
                errorToast("Category is not added !")
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






















