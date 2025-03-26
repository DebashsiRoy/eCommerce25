<div class="container rounded-5">
    <div class="d-flex justify-content-between mt-5">
        <h4 class="category-title-bg">Brands</h4>
        <button type="button" class="btn btn-primary fs-3 mb-5" data-bs-toggle="modal" data-bs-target="#createBrand">
            Add Brands
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
                                <th scope="col">Brand Name</th>
                                <th scope="col">Brand Image</th>
                                <th scope="col">Slug</th>
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
    getBrandList();

async function getBrandList(){

    showLoader();
    let res=await axios.get("/brands-list");
    hideLoader();

    let tableList=$('#tableList');
    let tableData=$('#tableData');

    tableData.DataTable().destroy();
    tableList.empty();

    res.data.forEach(function (item,index){
        let row=`<tr>
                <td>${index+1}</td>
                <td>${item['brandName']}</td>
                <td><img src="${item['brandImg']}" alt="${item['brandName']}" width="40" height="35"></td>
                <td>${item['slug']}</td>
                <td>
                    <button data-path="${item['brandImg']}" data-id="${item['id']}" class="btn editBtn btn-sm btn-outline-primary fs-3 rounded-5" type="button" data-bs-toggle="modal" data-bs-target="#updateBrand">Edit</button>

<!--                    // ****************Read me *******************-->
<!--                    ///why I don't create editBtn id for pic-up a category->id. Because has many class but id is unique.-->
<!--                    // for this use HTML "data-id" attribute to get id in button-->

                    <button data-path="${item['brandImg']}" data-id="${item['id']}" class="btn deleteBtn btn-sm btn-outline-danger fs-3 rounded-5" data-bs-toggle="modal" data-bs-target="#deleteBrand">Delete</button>

<!--                    // ****************Read me *******************-->
<!--                    ///why I don't create deleteBtn id for pic-up a category->id. Because has many class but id is unique.-->
<!--                    // for this use HTML "data-id" attribute to get id in button-->

                </td>
            </tr>`
        tableList.append(row)
    });

    $('.deleteBtn').on('click', function (){
        let id= $(this).data('id');                 // delete button's id
        $("#deleteBrand").modal('show');         // Show delete modal
        $("#deleteID").val(id);                     // get id into the delete modal input field
    })
    $('.editBtn').on('click', async function () {
        let id= $(this).data('id');
        let filePath= $(this).data('path');
        // This path get from html <button data-path="${item['categoryImg']}"
        await FillUpUpdateForm(id,filePath)
        $("updateCategory").modal('show');
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



