<div class="container rounded-5">
    <div class="d-flex justify-content-between mt-5">
        <h4 class="category-title-bg">Products Details</h4>
        <button type="button" class="btn btn-primary fs-3 mb-5" data-bs-toggle="modal" data-bs-target="#addProductDetails">
            Add Product Details
        </button>
    </div>
    <div class="row mb-5 fs-3">

        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12 col-sm-12 col-lg-12">
                    <div class="card px-5 py-5">
                        <table class="table-secondary flex-auto" id="productDetailsTableData">
                            <thead class="myTable-bg">

                            <tr>
                                <th class="productSL" scope="col">SL N.</th>
                                <th class="productTitle" scope="col">Image 1</th>
                                <th class="productTitle" scope="col">Image 2</th>
                                <th class="productTitle" scope="col">Image 3</th>
                                <th class="productTitle" scope="col">Image 4</th>
                                <th class="productShortDes" scope="col">Description</th>
                                <th class="productPrice" scope="col">Color</th>
                                <th class="productDiscount" scope="col">Size</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody id="productDetailsTableList">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
   </div>
</div>
<script>
    getPDetailsList();
    async function getPDetailsList() {
        showLoader();
        let res=await axios.get("/productDetails-list");
        hideLoader();
        let productDetailsTableList=$('#productDetailsTableList');
        let productDetailsTableData=$('#productDetailsTableData');
// For refresh the table, at first destroy the table
        productDetailsTableData.DataTable().destroy();
        productDetailsTableList.empty();
        function truncateText(text, maxLength = 70) {
            if (!text) return '';
            return text.length > maxLength ? text.substring(0, maxLength) + ' ...' : text;
        }

        res.data.forEach(function (item,index){
            let row=`<tr>
                <td>${index+1}</td>
                <td><img src="${item['img1']}" alt="${item['title']}" width="40" height="35"></td>
                <td><img src="${item['img2']}" alt="${item['title']}" width="40" height="35"></td>
                <td><img src="${item['img3']}" alt="${item['title']}" width="40" height="35"></td>
                <td><img src="${item['img4']}" alt="${item['title']}" width="40" height="35"></td>
                <td class="productDetailsMar">${truncateText(item['description'], 70)}</td>
                <td>${item['color']}</td>
                <td>${item['size']}</td>

                <td>
                    <button data-path="${item['image']}" data-id="${item['id']}" class="btn editBtn btn-sm btn-outline-primary fs-3 rounded-5" type="button" data-bs-toggle="modal" data-bs-target="#updatedProduct">Edit</button>
                    <button data-path="${item['image']}" data-id="${item['id']}" class="btn deleteBtn btn-sm btn-outline-danger fs-3 rounded-5" data-bs-toggle="modal" data-bs-target="#deleteProduct">Delete</button>
                </td>
            </tr>`
            productDetailsTableList.append(row)
        });



        $('.editBtn').on('click', async function () {
            let id= $(this).data('id');
            let filePath= $(this).data('path');
            await FillUpdatedFormProduct(id,filePath)
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
            $('#productDetailsTableData').DataTable({
                order: [[0, 'desc']],
                lengthMenu: [10, 20, 30, { label: 'All', value: -1 }]
            });
        } );

    }

</script>
<style>
    .productDetailsMar {
        padding-top: 0;
        overflow: hidden;
    }

    .productSL {
        width: 5%;
    }
    .productPrice {
        width: 7%;
    }
    .productShortDes {
        width: 37%;
    }
    .productTitle {
        width: 8%;
    }

    .productDiscount {
        width: 5%;
    }
    .myTable-bg{
        background-color: darkslategray !important;
        color: white;
    }
    .container, .container-lg, .container-md, .container-sm, .container-xl, .container-xxl {
        max-width: 100%;
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
