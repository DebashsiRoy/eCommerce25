<div class="modal fade border-radius-4" id="deleteProduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog deletePopup">
        <div class="modal-content deleteModal">
            <div class="modal-header deleteModal-header">
                <h3 class="modal-title text-center" id="exampleModalLabel">Delete Product!</h3>
            </div>
            <div class="modal-body px-5">
                <form id="save-form">
                    <div class="container">
                        <div class="row">
                            <h6>Once delete, you can't get it back</h6>
                            <div class="col-12 p-1">
                                <input class="d-none" id="deleteID" />
                                <input class="d-none" id="deleteFilePath" />
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer px-5">
                <button type="button" id="delete-modal-close" class="btn btn-secondary fs-3 border-radius-10" data-bs-dismiss="modal">Close</button>
                <button onclick="itemDalete()" type="button" id="confirmDelete" class="btn btn-danger fs-3 border-radius-10">Delete</button>
            </div>
        </div>
    </div>
</div>

<script>
    async function itemDalete(){
        let id=document.getElementById('deleteID').value;
        let deleteFilePath=document.getElementById('deleteFilePath').value;
        document.getElementById('delete-modal-close').click();

        showLoader();
        let res=await axios.post("/product-delete",{id:id, file_path:deleteFilePath})
        hideLoader();

        if (res.data===1){
            successToast("Product Deleted Successfully")
            await getList();
        }
        else {
            errorToast("Product is not deleted! ")
        }
    }
</script>

<style>
    .deleteModal{
        text-align: center;
    }
    .deleteModal-header{
        display: block;
    }
    .deleteModal-header h3 {
        color: goldenrod;
    }
    .modal-content {
        width: 100% !important;
    }
    .deletePopup {
        width: 450px;
    }
</style>
