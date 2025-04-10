<div class="container rounded-5">
    <div class="d-flex justify-content-between mt-5">
        <h4 class="category-title-bg">Products</h4>
        <button type="button" class="btn btn-primary fs-3 mb-5" data-bs-toggle="modal" data-bs-target="#createProduct">
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
                                <th class="productSL" scope="col">SL N.</th>
                                <th class="productTitle" scope="col">Product Title</th>
                                <th class="productShortDes" scope="col">Short Description</th>
                                <th class="productPrice" scope="col">price</th>
                                <th class="productDiscount" scope="col">Discount</th>
                                <th class="pDiscount" scope="col">discount price</th>
                                <th class="productImg" scope="col">Product Image</th>
                                <th class="productStock" scope="col">Stock</th>
                                <th class="productStar" scope="col">Star</th>
                                <th class="productRemark" scope="col">Remark</th>
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
        let res=await axios.get("/products-list");
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
                <td class="productShortDes p-4"><p class="product_des">${item['short_des']}</p></td>
                <td>${item['price']}</td>
                <td>${item['discount']}</td>
                <td>${item['discount_price']}</td>
                <td><img src="${item['image']}" alt="${item['title']}" width="80" height="65"></td>
                <td>${item['stock']}</td>
                <td>${item['star']}</td>
                <td>${item['remark']}</td>
                <td>
                    <button data-path="${item['image']}" data-id="${item['id']}" class="btn editBtn btn-sm btn-outline-primary fs-3 rounded-5" type="button" data-bs-toggle="modal" data-bs-target="#updatedProduct">Edit</button>
                    <button data-path="${item['image']}" data-id="${item['id']}" class="btn deleteBtn btn-sm btn-outline-danger fs-3 rounded-5" data-bs-toggle="modal" data-bs-target="#deleteProduct">Delete</button>
                </td>
            </tr>`
            tableList.append(row)
        });

        $('.editBtn').on('click', async function () {
            let id= $(this).data('id');
            let filePath= $(this).data('path');
            // This path get from html <button data-path="${item['categoryImg']}"
            await FillUpUpdateForm(id,filePath)
            $("updatedProduct").modal('show');
        })

        $('.deleteBtn').on('click', function (){
            let id= $(this).data('id');
            let path=$(this).data('path');
            $("#deleteProduct").modal('show');         // Show delete modal
            $("#deleteID").val(id);
            $("#deleteFilePath").val(path);

            // get id into the delete modal input field
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
    .productSL {
        width: 5%;
    }
    .productTitle {
        width: 8%;
    }
    .productDiscount {
        width: 8%;
    }
    .productShortDes {
        width: 25%;
    }
    .productStock {
        width: 6%;
    }
    .productPrice {
        width: 10%;
    }
    .pDiscount {
        width: 7%;
    }
    .productStar {
        width: 85px;
    }
    .productImg {
        width: 8%;
    }
    .productRemark {
        width: 8%;
    }
    .container, .container-lg, .container-md, .container-sm, .container-xl, .container-xxl {
        max-width: 94%;
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
    .productShortDes{
        overflow: hidden;
        padding: 0;
        margin: 0;
    }
</style>
