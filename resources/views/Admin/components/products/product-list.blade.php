<div class="container rounded-5 max-w-1400">
    <div class="d-flex justify-content-between mt-5">
        <h4 class="category-title-bg">Products</h4>
        <button type="button" class="btn btn-primary fs-3 mb-5" data-bs-toggle="modal" data-bs-target="#addProduct">
            Add Product
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
                                <th scope="col">SL Num</th>
                                <th scope="col">Title</th>
                                <th scope="col">Short Description</th>
                                <th scope="col">Price</th>
                                <th scope="col">Discount</th>
                                <th scope="col">Discount Price</th>
                                <th scope="col">Product Image</th>
                                <th scope="col">Stock</th>
                                <th scope="col">Star</th>
                                <th scope="col">Remark</th>
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
    async function getList(){
        showLoader();
        let res=await axios.get("/products-list")
        hideLoader();

        let tableList=$('#tableList');
        let tableData=$('#tableData');
        // For refresh the table, at first destroy the table
        tableData.DataTable().destroy();
        tableList.empty();
        res.data.forEach(function (item,index){
            let row=`<tr>
                       <td>${index+1}</td>
                         <td>${item['title']}</td>
                         <td class="overflow-hidden">${item['short_des']}</td>
                         <td>${item['price']}</td>
                         <td>${item['discount']}</td>
                         <td>${item['discount_price']}</td>
                         <td><img src="${item['image']}" alt="${item['title']}"></td>
                         <td>${item['stock']}</td>
                         <td>${item['star']}</td>
                         <td>${item['remark']}</td>
                         <td>
                    <button data-path="${item['image']}" data-id="${item['id']}" class="btn editBtn btn-sm btn-outline-primary fs-3 rounded-5" type="button" data-bs-toggle="modal" data-bs-target="#updateCategory">Edit</button>

<!--                    // ****************Read me *******************-->
<!--                    ///why I don't create editBtn id for pic-up a category->id. Because has many class but id is unique.-->
<!--                    // for this use HTML "data-id" attribute to get id in button-->

                    <button data-path="${item['image']}" data-id="${item['id']}" class="btn deleteBtn btn-sm btn-outline-danger fs-3 rounded-5" data-bs-toggle="modal" data-bs-target="#deleteCategory">Delete</button>

<!--                    // ****************Read me *******************-->
<!--                    ///why I don't create deleteBtn id for pic-up a category->id. Because has many class but id is unique.-->
<!--                    // for this use HTML "data-id" attribute to get id in button-->

                </td>
                    </tr>`

            tableList.append(row)
        })


    }

    $(document).ready( function () {
        $('#tableData').DataTable({
            order: [[0, 'desc']],
            lengthMenu: [10, 20, 30, { label: 'All', value: -1 }]
        });
    } );
</script>

<style>
    .container.rounded-5.max-w-1400 {
        max-width: 100%;
    }
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

