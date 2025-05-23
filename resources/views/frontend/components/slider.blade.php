<section class="swiper-container js-swiper-slider swiper-number-pagination slideshow" data-settings='{
        "autoplay": {
          "delay": 5000
        },
        "slidesPerView": 1,
        "effect": "fade",
        "loop": true
      }'>
    <div class="swiper-wrapper" id="productcSlider">

    </div>

    <div class="container">
        <div
            class="slideshow-pagination slideshow-number-pagination d-flex align-items-center position-absolute bottom-0 mb-5">
        </div>
    </div>
</section>
<script>
    getSliderList();
    async function getSliderList(){
        let res = await axios.get("/ListProductSlider");
        $("#productcSlider").empty();

        res.data['data'].forEach(function (sliderItem, i){
            let sliderRow =`<div class="swiper-slide">
            <div class="overflow-hidden position-relative h-100">
                <div class="slideshow-character position-absolute bottom-0 pos_right-center">
                    <img loading="lazy" src="${sliderItem['image']}" width="542" height="733"
                         alt="Woman Fashion 1"
                         class="slideshow-character__img animate animate_fade animate_btt animate_delay-9 w-auto h-auto" />
                    <div class="character_markup type2">
                        <p
                            class="text-uppercase font-sofia mark-grey-color animate animate_fade animate_btt animate_delay-10 mb-0">
                            ${sliderItem['title']}</p>
                    </div>
                </div>
                <div class="slideshow-text container position-absolute start-50 top-50 translate-middle">
                    <h6 class="text_dash text-uppercase fs-base fw-medium animate animate_fade animate_btt animate_delay-3">
                        New Arrivals</h6>
                    <h2 class="h1 fw-normal mb-0 animate animate_fade animate_btt animate_delay-5">${sliderItem['title']}</h2>
                    <a href="#"
                       class="btn-link btn-link_lg default-underline fw-medium animate animate_fade animate_btt animate_delay-7">Shop
                        Now</a>
                </div>
            </div>
        </div>`;
            $("#productcSlider").append(sliderRow)
        });

    }
</script>
