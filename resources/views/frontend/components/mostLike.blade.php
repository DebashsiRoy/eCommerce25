<section class="category-carousel container">
    <h2 class="section-title text-center mb-3 pb-xl-2 mb-xl-4">You Might Like</h2>

    <div class="position-relative">
        <div class="swiper-container js-swiper-slider" data-settings='{
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": 8,
              "slidesPerGroup": 1,
              "effect": "none",
              "loop": true,
              "navigation": {
                "nextEl": ".products-carousel__next-1",
                "prevEl": ".products-carousel__prev-1"
              },
              "breakpoints": {
                "320": {
                  "slidesPerView": 2,
                  "slidesPerGroup": 2,
                  "spaceBetween": 15
                },
                "768": {
                  "slidesPerView": 4,
                  "slidesPerGroup": 4,
                  "spaceBetween": 30
                },
                "992": {
                  "slidesPerView": 6,
                  "slidesPerGroup": 1,
                  "spaceBetween": 45,
                  "pagination": false
                },
                "1200": {
                  "slidesPerView": 8,
                  "slidesPerGroup": 1,
                  "spaceBetween": 60,
                  "pagination": false
                }
              }
            }'>
            <div class="swiper-wrapper" id="likeCategoryList">

            </div><!-- /.swiper-wrapper -->
        </div><!-- /.swiper-container js-swiper-slider -->

        <div
            class="products-carousel__prev products-carousel__prev-1 position-absolute top-50 d-flex align-items-center justify-content-center">
            <svg width="25" height="25" viewBox="0 0 25 25" xmlns="http://www.w3.org/2000/svg">
                <use href="#icon_prev_md" />
            </svg>
        </div><!-- /.products-carousel__prev -->
        <div
            class="products-carousel__next products-carousel__next-1 position-absolute top-50 d-flex align-items-center justify-content-center">
            <svg width="25" height="25" viewBox="0 0 25 25" xmlns="http://www.w3.org/2000/svg">
                <use href="#icon_next_md" />
            </svg>
        </div><!-- /.products-carousel__next -->
    </div><!-- /.position-relative -->
</section>
<script>
    likeCategory();

    async function likeCategory() {
        let res = await axios.get("/category-list-in-menu");
        $("#likeCategoryList").empty();

        res.data.forEach(function (itemMay,i) {
            let row = `
                    <div class="card d-f" style="width: 18rem;">
                        <img src="${item['categoryImg']}" class="card-img-top" alt="${item['categoryName']}">
                        <div class="card-body">
                            <h5 class="card-title">${item['categoryName']}</h5>

                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                `;
            $("#likeCategoryList").append(row);
        });
    }
</script>
