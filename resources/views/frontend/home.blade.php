@extends('frontend.layouts.master')
@section('title', $data['title'] ?? 'Home')
@section('content')



    @foreach ($data['section'] as $key => $section)
        @if ($section->snake_title == 'slider')
            @include('frontend.home.hero_area')
        @elseif($section->snake_title == 'featured_courses')
            @include('frontend.home.featured_courses')

        <!-- working process -->
       <section class="working-process tw-bg-[#F1F2F4]">
        <div class="rt-spacer-100 rt-spacer-md-50"></div>
        <div class="container">
          <div class="row">
            <div class="col-12 text-center text-h4 ft-wt-5">
              <span class="text-primary-500 has-title-shape"
                >Knowed
                <img
                  src="https://jobpilot.templatecookie.com/frontend/assets/images/all-img/title-shape.png"
                  alt
                />
              </span>
              <label>Working Process</label>
            </div>
          </div>
          <div class="rt-spacer-50"></div>
          <div class="row">
            <div class="col-lg-3 col-sm-6 rt-mb-24 position-relative">
              <div class="has-arrow first">
                <img
                  src="https://jobpilot.templatecookie.com/frontend/assets/images/all-img/arrow-1.png"
                  alt
                  draggable="false"
                />
              </div>
              <div class="rt-single-icon-box working-progress icon-center">
                <div class="icon-thumb rt-mb-24">
                  <div class="icon-72">
                    <i class="fa-solid fa-user-plus"></i>
                  </div>
                </div>
                <div class="iconbox-content">
                  <div class="body-font-2 rt-mb-12">Explore Opportunities</div>
                  <div class="body-font-4 text-gray-400">
                    Browse through a diverse range of job listings tailored to
                    your interests and expertise
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 rt-mb-24 col-sm-6 position-relative">
              <div class="has-arrow middle">
                <img
                  src="https://jobpilot.templatecookie.com/frontend/assets/images/all-img/arrow-2.png"
                  alt
                  draggable="false"
                />
              </div>
              <div class="rt-single-icon-box working-progress icon-center">
                <div class="icon-thumb rt-mb-24">
                  <div class="icon-72">
                    <i class="fa-solid fa-cloud-arrow-up"></i>
                  </div>
                </div>
                <div class="iconbox-content">
                  <div class="body-font-2 rt-mb-12">Create Knowed Profile</div>
                  <div class="body-font-4 text-gray-400">
                    Build a standout profile highlighting your skills, experience,
                    and qualifications
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 rt-mb-24 col-sm-6 position-relative">
              <div class="has-arrow last">
                <img
                  src="https://jobpilot.templatecookie.com/frontend/assets/images/all-img/arrow-1.png"
                  alt
                  draggable="false"
                />
              </div>
              <div class="rt-single-icon-box working-progress icon-center">
                <div class="icon-thumb rt-mb-24">
                  <div class="icon-72">
                    <i class="fa-solid fa-magnifying-glass-plus"></i>
                  </div>
                </div>
                <div class="iconbox-content">
                  <div class="body-font-2 rt-mb-12">Get Skilled</div>
                  <div class="body-font-4 text-gray-400">
                    Learn the skills of your interest and achieve and add more
                    value to get market ready.
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 rt-mb-24 col-sm-6">
              <div class="rt-single-icon-box working-progress icon-center">
                <div class="icon-thumb rt-mb-24">
                  <div class="icon-72">
                    <i class="fa-solid fa-circle-check"></i>
                  </div>
                </div>
                <div class="iconbox-content">
                  <div class="body-font-2 rt-mb-12">Get Hired</div>
                  <div class="body-font-4 text-gray-400">
                    Stay informed on your applications and manage your job-seeking
                    journey effectively and get hired.
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="rt-spacer-100 rt-spacer-md-50"></div>
      </section>
      <!-- working process end-->

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
                    <button type="button"  class="btn btn-primary rounded-circle" data-bs-dismiss="modal" aria-label="Close">&times;</button>
                  </div>
                  <div class="modal-body">
                        <form method="post" id="formNewsLetter" action="{{ route('store.newsletter') }}">
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
                                <label>Contact <sup>Optional</sup></label>
                                <input type="number" class="form-control" name="contact"/>
                            </div>
                            <div class="col-md-12 mt-3">
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"> Login </button>
                    <button type="button" class="btn btn-primary"> Register </button>
                  </div>
                </div>
              </div>
            </div>
            
        </section>
    <!--Organization Section3 -->

                   <!-- We are hiring -->
                   <div class="section-box mb-30">
                    <div class="container">
                      <div class="box-we-hiring">
                        <div class="box-we-hiring-before page_speed_669028259"></div>
                        <div class="text-1">
                          <span class="text-we-are">We are</span
                          ><span class="text-hiring">HIRING</span>
                        </div>
                        <div class="text-2">
                          Let’s <span class="color-brand-1">Work</span> Together
                          <br />&amp;<span class="color-brand-1"> Explore</span> Opportunities
                        </div>
                        <div class="text-3">
                          <a href="http://questal.oppositeeye.com/" target="_blank">
                            <div class="btn btn-apply btn-apply-icon">Apply</div>
                          </a>
                        </div>
                        <div class="box-we-hiring-after page_speed_1137568649"></div>
                      </div>
                    </div>
                  </div>
                  <!-- We are hiring end-->

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



@endsection
@section('scripts')
    @if(auth()->check() == 0)
        @php
            $showModal = !session()->has('newsletter_modal_shown');
            if ($showModal) {
                session(['newsletter_modal_shown' => true]);
            }
        @endphp

        @if($showModal)
            <script>
                $(document).ready(function(){
                    $("#newsLetter").modal("show");
                });
            </script>
        @endif
    @endif

    <script>
        $("#formNewsLetter").submit(function(e){
            e.preventDefault()
            formData = $(this).serialize()
            $.ajax({
                url : $(this).attr("action"),
                method : "post",
                data : {
                    "_token" : $("meta[name='csrf_token']").attr("content"),
                    "formData" : formData
                },
                success:function(response){
                    if(response.status == "200"){
                        console.log(response.message)
                        toastr.success(`response.message`)
                        $("#newsLetter").modal("hide")
                        alert(response.message)
                    }else{
                        console.log(response.status,response.message)
                    }
                },error:function(error){
                    console.log(error);
                }
            });
        })
    </script>
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
