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
                        <th scope="col">ID</th>
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
                <td><img src="${item['categoryImg']}" alt="${item['categoryName']}" width="70" height="75"></td>
                <td>
                    <button class="btn btn-sm btn-outline-primary fs-3 rounded-5" type="button" data-bs-toggle="modal" data-bs-target="#updateCategory">Edit</button>
                    <button class="btn btn-sm btn-outline-danger fs-3 rounded-5">Delete</button>
                </td>
            </tr>`
            tableList.append(row)
        })

        $(document).ready( function () {
            $('#tableData').DataTable({
                order: [[0, 'desc']],
                lengthMenu: [5, 10, 20, { label: 'All', value: -1 }]
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

