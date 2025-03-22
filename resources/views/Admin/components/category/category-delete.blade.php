<div class="modal fade border-radius-4" id="deleteCategory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content deleteModal">
            <div class="modal-header deleteModal-header">
                <h3 class="modal-title text-center" id="exampleModalLabel">Delete Category!</h3>
            </div>
            <div class="modal-body px-5">
                <form id="save-form">
                    <div class="container">
                        <div class="row">
                            <h6>Once delete, you can't get it back</h6>
                            <div class="col-12 p-1">
                                <input type="hidden" id="deleteID" />
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
        document.getElementById('delete-modal-close').click();

        showLoader();
        let res=await axios.post("/category-delete",{id:id})
        hideLoader();

        if (res.data===1){
            successToast("Category Deleted Successfully")
            await getList();
        }
        else {
            errorToast("Category is not deleted! ")
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
</style>
