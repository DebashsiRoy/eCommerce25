<div class="modal fade border-radius-4" id="updateCategory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header px-5">
                <h5 class="modal-title" id="exampleModalLabel">Update Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body px-5">
                <form id="save-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">

                                <label class="form-label fs-2">Category Name</label>
                                <input type="text" v class="form-control addCatName" id="categoryName">
                                <br/>
                                <img class="w-15" id="newImg" src="{{asset('admin/images/default.jpg')}}"/>
                                <br/>

                                <label class="form-label fs-2">Category Image</label>
                                <input oninput="newImg.src=window.URL.createObjectURL(this.files[0])" type="file" class="form-control addCatName" id="categoryImg">

                                <input type="text" class="d-none" id="updateID">
                                <input type="text" class="d-none" id="filePath">

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
