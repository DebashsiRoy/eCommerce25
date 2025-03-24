<div class="container rounded-5">
    <div class="d-flex justify-content-between mt-5">
                <h4 class="category-title-bg">Categories</h4>
        <button type="button" class="btn btn-primary fs-3 mb-5" data-bs-toggle="modal" data-bs-target="#createCategory">
            Create Category
        </button>
    </div>

<div class="row mb-5 fs-3">

<div class="container-fluid">
    <div class="row">

        <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="card px-5 py-5">
                <table class="table-secondary flex-auto" id="tableData">
                    <thead class="myTable-bg">
                    <tr>
                        <th scope="col">Serial Number</th>
                        <th scope="col">Name</th>
                        <th scope="col">Category Image</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody id="tableList">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<script>
    getList();
    async function getList() {
        showLoader();
        let res=await axios.get("/category-list");
        hideLoader();
        let tableList=$('#tableList');
        let tableData=$('#tableData');
// For refresh the table, at first destroy the table
        tableData.DataTable().destroy();
        tableList.empty();

        res.data.forEach(function (item,index){
            let row=`<tr>
                <td>${index+1}</td>
                <td>${item['categoryName']}</td>
                <td><img src="${item['categoryImg']}" alt="${item['categoryName']}" width="40" height="35"></td>
                <td>
                    <button data-path="${item['categoryImg']}" data-id="${item['id']}" class="btn editBtn btn-sm btn-outline-primary fs-3 rounded-5" type="button" data-bs-toggle="modal" data-bs-target="#updateCategory">Edit</button>

<!--                    // ****************Read me *******************-->
<!--                    ///why I don't create editBtn id for pic-up a category->id. Because has many class but id is unique.-->
<!--                    // for this use HTML "data-id" attribute to get id in button-->

                    <button data-path="${item['categoryImg']}" data-id="${item['id']}" class="btn deleteBtn btn-sm btn-outline-danger fs-3 rounded-5" data-bs-toggle="modal" data-bs-target="#deleteCategory">Delete</button>

<!--                    // ****************Read me *******************-->
<!--                    ///why I don't create deleteBtn id for pic-up a category->id. Because has many class but id is unique.-->
<!--                    // for this use HTML "data-id" attribute to get id in button-->

                </td>
            </tr>`
            tableList.append(row)
        });

        $('.editBtn').on('click', async function () {
            let id= $(this).data('id');
            let filePath= $(this).data('path');
            // This path get from html <button data-path="${item['categoryImg']}"
            await FillUpUpdateForm(id,filePath)
            $("updateCategory").modal('show');
        })

            $('.deleteBtn').on('click', function (){
                let id= $(this).data('id');                 // delete button's id
                $("#deleteCategory").modal('show');         // Show delete modal
                $("#deleteID").val(id);                     // get id into the delete modal input field
            })

            $(document).ready( function () {
                $('#tableData').DataTable({
                    order: [[0, 'desc']],
                    lengthMenu: [10, 20, 30, { label: 'All', value: -1 }]
                });
            } );

    }


</script>
<style>
    .myTable-bg{
        background-color: darkslategray !important;
        color: white;
    }
    .align-items-center{
        width: 100%;
    }
    .category-title-bg{
        width: auto;
        margin: 10px;
    }
</style>

