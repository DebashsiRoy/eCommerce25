<section class="category-carousel container position-top">
    <h2 class="section-title text-center mb-3 pb-xl-2 mb-xl-4">Top Category</h2>
    <p class="section-title text-center top-position">Here is the Top Category</p>

    <div class="position-relative" id="topCategoryList">

    </div><!-- /.position-relative -->
</section>
<script>
    TopCategory();

    async function TopCategory() {
        let res = await axios.get("/category-list-in-menu");
        $("#topCategoryList").empty();

        res.data.forEach(function (item,i) {
            let row = `
                    <div class="card d-f" style="width: 18rem;">
                        <img src="${item['categoryImg']}" class="card-img-top" alt="${item['categoryName']}">
                        <div class="card-body">
                            <h5 class="card-title">${item['categoryName']}</h5>

                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                `;
            $("#topCategoryList").append(row);
        });
    }
</script>
<style>
    .category-carousel.container.position-top {
        margin-top: 50px;
    }
    .section-title.text-center.top-position {
        margin: 0;
        padding: 0;
        position: relative;
        top: -42px;
        font-size: 2rem;
    }
    #topCategoryList {
        display: flex;
    }
    .card.d-f {
        margin: 5px;
    }
    .card-img-top {
        width: auto;
        height: 250px;
    }
    img.card-img-top {
        width: auto;
        height: 200px;
        margin: 0 auto;
    }
</style>
