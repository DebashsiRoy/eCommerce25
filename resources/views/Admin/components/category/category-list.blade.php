<div class="container rounded-5">
<div class="row mt-5 mb-5 fs-3">
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
        let res=await axios.get("/category-list");

        let tableList=$('#tableList');
        let tableData=$('#tableData');


        res.data.forEach(function (item,index){
            let row=`<tr>
                <td>${index+1}</td>
                <td>${item['categoryName']}</td>
                <td><img src="${item['categoryImg']}" alt="${item['categoryName']}" width="70" height="75"></td>
                <td>
                    <button class="btn btn-sm btn-outline-primary fs-3 rounded-5" type="button">Edit</button>
                    <button class="btn btn-sm btn-outline-danger fs-3 rounded-5">Delete</button>
                </td>
            </tr>`
            tableList.append(row)
        })
        $(document).ready( function () {
            $('#tableData').DataTable({
                order: [[0, 'desc']],
                fixedHeader: {
                    footer: true
                },
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
</style>
