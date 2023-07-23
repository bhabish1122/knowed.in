@extends('frontend.layouts.master')
@section('title', $data['title'] ?? 'Home')
@section('content')



    @foreach ($data['section'] as $key => $section)
        @if ($section->snake_title == 'slider')
            @include('frontend.home.hero_area')
        @elseif($section->snake_title == 'featured_courses')
            @include('frontend.home.featured_courses')
        @elseif($section->snake_title == 'popular_category')
            @include('frontend.home.popular_category')
        @elseif($section->snake_title == 'latest_courses')
            @include('frontend.home.latest_courses')
            
            <!-- section learn and get trained-->
                <section class="page-header  min-vh-70 py-5" >
          <div class="container">
                <div class="row">
                <div class="mb-7 col-lg-6 col-md-6 d-flex text-md-start flex-column">
                <h4 class="fw-bolder text-start text-purple  mt-8 mb-0">
                <!-- iasa vad -->
                </h4>
                <h1 class="fw-bolder display-5  text-start mt-4 mb-0" style="color: #232323;">
                    Learn,<br> 
                    Get trained,<br>
                    Get hired,<br>
                </h1>
                <p class="text-start lead  mt-3 mb-4">
                <p>Discover the Power of Knowledge with Our Online Course Selling Platform - Elevate Your Skills, Inspire Others, and Monetize Your Expertise!</p>
                </p>
                <div class="text-start buttons mb-4">
                <a href="#" type="button" class="btn-primary-fill bisg-btn mt-4">Click Here!</a>
                </div>
                <p class="text-start  mt-2">Newly enrolled students</p>
                <div class="text-start avatar-group d-flex mt-2">
                <div class="avatar avatar-sm rounded-circle bg-purple-light mb-4 ">
                <p class="mt-3 text-info">
                </p>
                </div>
                <div class="avatar avatar-sm rounded-circle bg-purple-light mb-4 ">
                <p class="mt-3 text-info">
                </p>
                </div>
                <div class="avatar avatar-sm rounded-circle bg-purple-light mb-4 ">
                <p class="mt-3 text-info">
                </p>
                </div>
                <div class="avatar avatar-sm rounded-circle bg-purple-light mb-4 ">
                <p class="mt-3 text-info">
                </p>
                </div>
                <div class="avatar avatar-sm rounded-circle bg-purple-light mb-4 ">
                <p class="mt-3 text-info">
                </p>
                </div>
                <div class="avatar avatar-sm rounded-circle bg-purple-light mb-4 ">
                <p class="mt-3 text-info">
                </p>
                </div>
                <span class="fw-bolder"> + more</span>
                </div>
                </div>
                <div class="col-lg-6 col-md-6 ps-5 pe-0  d-flex">
                <div class="row ">
                <div class="position-relative d-flex flex-column align-items-center justify-content-center h-100 ">
                <figure class=" d-none d-lg-block position-absolute bottom-0 start-50 translate-middle-x  mb-0">
                <svg width="650px" height="658px" id="10015.io" viewbox="0 0 480 480" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#EBF3FF">
                <path fill="fill-primary" d="M452.5,292.5Q440,345,401.5,382Q363,419,314,431.5Q265,444,212,449Q159,454,125,413Q91,372,57.5,332.5Q24,293,38.5,243.5Q53,194,63.5,143.5Q74,93,116.5,59.5Q159,26,212,30.5Q265,35,314,48.5Q363,62,391.5,104Q420,146,442.5,193Q465,240,452.5,292.5Z" />
                </svg>
                </figure>
                <div class="position-relative" style="width: 70%; margin-bottom: 3rem;">
                <img src="https://upskill.cloudonex.com/public/uploads/media/OxFumGn4V1UpEHKdsviuHDU7vUr259HdIoGK8wWJ.png" alt class="img-fluid  rounded-3">
                </div>
               
                 </div>
                </div>
            </div>
          </div>
        </div>
      </section>
            <!---->
            
        @elseif($section->snake_title == 'latest_courses')
            @include('frontend.home.learn_get_trained')
            
     
        
{{--
        @elseif($section->snake_title == 'best_rated_courses')
            @include('frontend.home.best_rated_courses')
        @elseif($section->snake_title == 'discount_courses')
            @include('frontend.home.discount_courses')
        @elseif($section->snake_title == 'most_popular_courses')
            @include('frontend.home.most_popular_courses')
--}}

     
        @elseif($section->snake_title == 'become_an_instructor')
            @include('frontend.home.become_an_instructor')
        @elseif($section->snake_title == 'testimonials')
            @include('frontend.home.testimonials')
        @elseif($section->snake_title == 'blogs')
            @include('frontend.home.blogs')
        @elseif($section->snake_title == 'brands')
            @include('frontend.home.brands')
        @endif
    @endforeach

  <!--Organization Section-->
              <section class="home-sections home-sections-swiper container">
            <div class="d-flex justify-content-between">
                <div>
                    <h2 class="section-title">Organizations</h2>
                    <p class="section-hint">#Greatest education organizations are here to help you</p>
                </div>

                <a href="#" class="btn btn-border-white">All Organization</a>
            </div>

            <div class="position-relative mt-20">
                <div class="swiper-container organization-swiper-container px-12">
                   <div id="owl-demo" class="swiper-wrapper owl-carousel owl-theme">

                             <div class="item">
                                <div class="home-organizations-card d-flex flex-column align-items-center justify-content-center">
                                    <div class="home-organizations-avatar">
                                        <img src="https://t4.ftcdn.net/jpg/02/33/30/41/360_F_233304133_wxKVU6KtEGyCXVogY5DkS5AccSk8w3hi.jpg" class="img-cover rounded-circle" alt="organization1">
                                    </div>
                                    <a href="#" class="mt-25 d-flex flex-column align-items-center justify-content-center">
                                        <h3 class="home-organizations-title">Affogato Media</h3>
                                        <p class="home-organizations-desc mt-10">Chemical Engineering Institute</p>
                                        <span class="home-organizations-badge badge mt-15">2</span>
                                    </a>
                                </div>
                            </div>
                            
                            <div class="item">
                                <div class="home-organizations-card d-flex flex-column align-items-center justify-content-center">
                                    <div class="home-organizations-avatar">
                                        <img src="https://t4.ftcdn.net/jpg/02/33/30/41/360_F_233304133_wxKVU6KtEGyCXVogY5DkS5AccSk8w3hi.jpg" class="img-cover rounded-circle" alt="organization1">
                                    </div>
                                    <a href="#" class="mt-25 d-flex flex-column align-items-center justify-content-center">
                                        <h3 class="home-organizations-title">Owosso</h3>
                                        <p class="home-organizations-desc mt-10">Chemical Engineering Institute</p>
                                        <span class="home-organizations-badge badge mt-15">2</span>
                                    </a>
                                </div>
                            </div>
                            
                            <div class="item" >
                                <div class="home-organizations-card d-flex flex-column align-items-center justify-content-center">
                                    <div class="home-organizations-avatar">
                                        <img src="https://t4.ftcdn.net/jpg/02/33/30/41/360_F_233304133_wxKVU6KtEGyCXVogY5DkS5AccSk8w3hi.jpg" class="img-cover rounded-circle" alt="organization1">
                                    </div>
                                    <a href="#" class="mt-25 d-flex flex-column align-items-center justify-content-center">
                                        <h3 class="home-organizations-title">King Pictures</h3>
                                        <p class="home-organizations-desc mt-10">Chemical Engineering Institute</p>
                                        <span class="home-organizations-badge badge mt-15">2</span>
                                    </a>
                                </div>
                            </div>
                            
                            <div class="item">
                                <div class="home-organizations-card d-flex flex-column align-items-center justify-content-center">
                                    <div class="home-organizations-avatar">
                                        <img src="https://t4.ftcdn.net/jpg/02/33/30/41/360_F_233304133_wxKVU6KtEGyCXVogY5DkS5AccSk8w3hi.jpg" class="img-cover rounded-circle" alt="organization1">
                                    </div>
                                    <a href="#" class="mt-25 d-flex flex-column align-items-center justify-content-center">
                                        <h3 class="home-organizations-title">Cactus Cat Clothing</h3>
                                        <p class="home-organizations-desc mt-10">Chemical Engineering Institute</p>
                                        <span class="home-organizations-badge badge mt-15">2</span>
                                    </a>
                                </div>
                            </div>
                               <div class="item">
                                <div class="home-organizations-card d-flex flex-column align-items-center justify-content-center">
                                    <div class="home-organizations-avatar">
                                        <img src="https://t4.ftcdn.net/jpg/02/33/30/41/360_F_233304133_wxKVU6KtEGyCXVogY5DkS5AccSk8w3hi.jpg" class="img-cover rounded-circle" alt="organization1">
                                    </div>
                                    <a href="#" class="mt-25 d-flex flex-column align-items-center justify-content-center">
                                        <h3 class="home-organizations-title">Cactus Cat Clothing</h3>
                                        <p class="home-organizations-desc mt-10">Chemical Engineering Institute</p>
                                        <span class="home-organizations-badge badge mt-15">2</span>
                                    </a>
                                </div>
                            </div>
                               <div class="item">
                                <div class="home-organizations-card d-flex flex-column align-items-center justify-content-center">
                                    <div class="home-organizations-avatar">
                                        <img src="https://t4.ftcdn.net/jpg/02/33/30/41/360_F_233304133_wxKVU6KtEGyCXVogY5DkS5AccSk8w3hi.jpg" class="img-cover rounded-circle" alt="organization1">
                                    </div>
                                    <a href="#" class="mt-25 d-flex flex-column align-items-center justify-content-center">
                                        <h3 class="home-organizations-title">Cactus Cat Clothing</h3>
                                        <p class="home-organizations-desc mt-10">Chemical Engineering Institute</p>
                                        <span class="home-organizations-badge badge mt-15">2</span>
                                    </a>
                                </div>
                            </div>
                    </div>
                    </div>
            </div>
           
            <!--<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newsLetter">-->
            <!--  Launch demo modal-->
            <!--</button>-->
                
            <!-- Modal -->
            <div class="modal fade" id="newsLetter" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Subscribe to our news letter?</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">&times;</button>
                  </div>
                  <div class="modal-body">
                        <form method="post" action="hello">
                            @csrf
                            <div class="row-md-12">
                                <label>Name</label>
                                <input type="text" name="name" placeholder="Enter your Name"  class="form-control"/>
                            </div>
                            <div class="row-md-12">
                                <label>Email</label>
                                <input type="email" name="email" placeholder="Email"  class="form-control"/>
                            </div>
                            <div class="row-md-12">
                                <label>Interests</label>
                                input
                            </div>
                        </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                  </div>
                </div>
              </div>
            </div>
            
        </section>
           <!--Organization Section3 -->

@endsection
@section('scripts')
@if(auth()->check() == 0)
    <script>
        $(document).ready(function(){
             $("#newsLetter").modal("show");
        })
    </script>
@endif
<script>
    
    $(document).ready(function() {
    
      $("#owl-demo").owlCarousel({
          items : 4, 
          itemsDesktop : [1000,5], 
          itemsDesktopSmall : [900,3],
          itemsTablet: [600,2], 
          itemsMobile : false, 
          autoplay: true,
          slideSpeed: 1000,
          margin: 20,
          responsive: {
              0:{
                  items: 1
              },
              500:{
                  items:2
              },
              728:{
                  items:3
              },
              1024:{
                  items: 4
              }
          }
      });

});
</script>
@endsection
