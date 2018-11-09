@extends("shared.frontend-layout")
@section("content")

<!-- Home -->

<div class="home">
    <div class="breadcrumbs_container">
        <div class="container">
            <div class="row">
                <div class="col">
                    <ul class="breadcrumbs_list d-flex flex-row align-items-center justify-content-start">
                        <li><a href="index.html">home</a></li>
                        <li><a href="courses.html">courses</a></li>
                        <li>english</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Language -->

<div class="language">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="language_title">Learn Languages Easily</div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="language_slider_container">
                    
                    <!-- Language Slider -->

                    <div class="owl-carousel owl-theme language_slider">

                        <!-- Flag -->
                        <div class="owl-item language_item">
                            <a href="#">
                                <div class="flag"><img src="images/Ukrainian.svg" alt=""></div>
                                <div class="lang_name">Ukrainian</div>
                            </a>
                        </div>

                        <!-- Flag -->
                        <div class="owl-item language_item">
                            <a href="#">
                                <div class="flag"><img src="images/Japanese.svg" alt=""></div>
                                <div class="lang_name">Japanese</div>
                            </a>
                        </div>

                        <!-- Flag -->
                        <div class="owl-item language_item">
                            <a href="#">
                                <div class="flag"><img src="images/Lithuanian.svg" alt=""></div>
                                <div class="lang_name">Lithuanian</div>
                            </a>
                        </div>

                        <!-- Flag -->
                        <div class="owl-item language_item">
                            <a href="#">
                                <div class="flag"><img src="images/Swedish.svg" alt=""></div>
                                <div class="lang_name">Swedish</div>
                            </a>
                        </div>

                        <!-- Flag -->
                        <div class="owl-item language_item">
                            <a href="#">
                                <div class="flag"><img src="images/English.svg" alt=""></div>
                                <div class="lang_name">English</div>
                            </a>
                        </div>

                        <!-- Flag -->
                        <div class="owl-item language_item">
                            <a href="#">
                                <div class="flag"><img src="images/Italian.svg" alt=""></div>
                                <div class="lang_name">Italian</div>
                            </a>
                        </div>

                        <!-- Flag -->
                        <div class="owl-item language_item">
                            <a href="#">
                                <div class="flag"><img src="images/Chinese.svg" alt=""></div>
                                <div class="lang_name">Chinese</div>
                            </a>
                        </div>

                        <!-- Flag -->
                        <div class="owl-item language_item">
                            <a href="#">
                                <div class="flag"><img src="images/French.svg" alt=""></div>
                                <div class="lang_name">French</div>
                            </a>
                        </div>

                        <!-- Flag -->
                        <div class="owl-item language_item">
                            <a href="#">
                                <div class="flag"><img src="images/German.svg" alt=""></div>
                                <div class="lang_name">German</div>
                            </a>
                        </div>

                    </div>

                    <div class="lang_nav lang_prev"><i class="fa fa-angle-left" aria-hidden="true"></i></div>
                    <div class="lang_nav lang_next"><i class="fa fa-angle-right" aria-hidden="true"></i></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Courses -->

<div class="courses">
    <div class="container">
        <div class="row courses_row">

            <!-- Course -->
            <div class="col-lg-4 course_col">
                <div class="course">
                    <div class="course_image"><img src="images/course_4.jpg" alt=""></div>
                    <div class="course_body">
                        <div class="course_title"><a href="course.html">Vocabulary</a></div>
                        <div class="course_info">
                            <ul>
                                <li><a href="instructors.html">Sarah Parker</a></li>
                                <li><a href="#">English</a></li>
                            </ul>
                        </div>
                        <div class="course_text">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce enim nulla.</p>
                        </div>
                    </div>
                    <div class="course_footer d-flex flex-row align-items-center justify-content-start">
                        <div class="course_students"><i class="fa fa-user" aria-hidden="true"></i><span>10</span></div>
                        <div class="course_rating ml-auto"><i class="fa fa-star" aria-hidden="true"></i><span>4,5</span></div>
                        <div class="course_mark course_free trans_200"><a href="#">Free</a></div>
                    </div>
                </div>
            </div>

            <!-- Course -->
            <div class="col-lg-4 course_col">
                <div class="course">
                    <div class="course_image"><img src="images/course_5.jpg" alt=""></div>
                    <div class="course_body">
                        <div class="course_title"><a href="course.html">Vocabulary</a></div>
                        <div class="course_info">
                            <ul>
                                <li><a href="instructors.html">Sarah Parker</a></li>
                                <li><a href="#">Spanish</a></li>
                            </ul>
                        </div>
                        <div class="course_text">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce enim nulla.</p>
                        </div>
                    </div>
                    <div class="course_footer d-flex flex-row align-items-center justify-content-start">
                        <div class="course_students"><i class="fa fa-user" aria-hidden="true"></i><span>10</span></div>
                        <div class="course_rating ml-auto"><i class="fa fa-star" aria-hidden="true"></i><span>4,5</span></div>
                        <div class="course_mark course_free trans_200"><a href="#">Free</a></div>
                    </div>
                </div>
            </div>

            <!-- Course -->
            <div class="col-lg-4 course_col">
                <div class="course">
                    <div class="course_image"><img src="images/course_6.jpg" alt=""></div>
                    <div class="course_body">
                        <div class="course_title"><a href="course.html">Vocabulary</a></div>
                        <div class="course_info">
                            <ul>
                                <li><a href="instructors.html">Sarah Parker</a></li>
                                <li><a href="#">English</a></li>
                            </ul>
                        </div>
                        <div class="course_text">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce enim nulla.</p>
                        </div>
                    </div>
                    <div class="course_footer d-flex flex-row align-items-center justify-content-start">
                        <div class="course_students"><i class="fa fa-user" aria-hidden="true"></i><span>10</span></div>
                        <div class="course_rating ml-auto"><i class="fa fa-star" aria-hidden="true"></i><span>4,5</span></div>
                        <div class="course_mark trans_200"><a href="#">$45</a></div>
                    </div>
                </div>
            </div>

            <!-- Course -->
            <div class="col-lg-4 course_col">
                <div class="course">
                    <div class="course_image"><img src="images/course_7.jpg" alt=""></div>
                    <div class="course_body">
                        <div class="course_title"><a href="course.html">Vocabulary</a></div>
                        <div class="course_info">
                            <ul>
                                <li><a href="instructors.html">Sarah Parker</a></li>
                                <li><a href="#">English</a></li>
                            </ul>
                        </div>
                        <div class="course_text">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce enim nulla.</p>
                        </div>
                    </div>
                    <div class="course_footer d-flex flex-row align-items-center justify-content-start">
                        <div class="course_students"><i class="fa fa-user" aria-hidden="true"></i><span>10</span></div>
                        <div class="course_rating ml-auto"><i class="fa fa-star" aria-hidden="true"></i><span>4,5</span></div>
                        <div class="course_mark course_free trans_200"><a href="#">Free</a></div>
                    </div>
                </div>
            </div>

            <!-- Course -->
            <div class="col-lg-4 course_col">
                <div class="course">
                    <div class="course_image"><img src="images/course_8.jpg" alt=""></div>
                    <div class="course_body">
                        <div class="course_title"><a href="course.html">Vocabulary</a></div>
                        <div class="course_info">
                            <ul>
                                <li><a href="instructors.html">Sarah Parker</a></li>
                                <li><a href="#">Spanish</a></li>
                            </ul>
                        </div>
                        <div class="course_text">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce enim nulla.</p>
                        </div>
                    </div>
                    <div class="course_footer d-flex flex-row align-items-center justify-content-start">
                        <div class="course_students"><i class="fa fa-user" aria-hidden="true"></i><span>10</span></div>
                        <div class="course_rating ml-auto"><i class="fa fa-star" aria-hidden="true"></i><span>4,5</span></div>
                        <div class="course_mark course_free trans_200"><a href="#">Free</a></div>
                    </div>
                </div>
            </div>

            <!-- Course -->
            <div class="col-lg-4 course_col">
                <div class="course">
                    <div class="course_image"><img src="images/course_9.jpg" alt=""></div>
                    <div class="course_body">
                        <div class="course_title"><a href="course.html">Vocabulary</a></div>
                        <div class="course_info">
                            <ul>
                                <li><a href="instructors.html">Sarah Parker</a></li>
                                <li><a href="#">English</a></li>
                            </ul>
                        </div>
                        <div class="course_text">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce enim nulla.</p>
                        </div>
                    </div>
                    <div class="course_footer d-flex flex-row align-items-center justify-content-start">
                        <div class="course_students"><i class="fa fa-user" aria-hidden="true"></i><span>10</span></div>
                        <div class="course_rating ml-auto"><i class="fa fa-star" aria-hidden="true"></i><span>4,5</span></div>
                        <div class="course_mark trans_200"><a href="#">$45</a></div>
                    </div>
                </div>
            </div>

            <!-- Course -->
            <div class="col-lg-4 course_col">
                <div class="course">
                    <div class="course_image"><img src="images/course_10.jpg" alt=""></div>
                    <div class="course_body">
                        <div class="course_title"><a href="course.html">Vocabulary</a></div>
                        <div class="course_info">
                            <ul>
                                <li><a href="instructors.html">Sarah Parker</a></li>
                                <li><a href="#">English</a></li>
                            </ul>
                        </div>
                        <div class="course_text">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce enim nulla.</p>
                        </div>
                    </div>
                    <div class="course_footer d-flex flex-row align-items-center justify-content-start">
                        <div class="course_students"><i class="fa fa-user" aria-hidden="true"></i><span>10</span></div>
                        <div class="course_rating ml-auto"><i class="fa fa-star" aria-hidden="true"></i><span>4,5</span></div>
                        <div class="course_mark course_free trans_200"><a href="#">Free</a></div>
                    </div>
                </div>
            </div>

            <!-- Course -->
            <div class="col-lg-4 course_col">
                <div class="course">
                    <div class="course_image"><img src="images/course_11.jpg" alt=""></div>
                    <div class="course_body">
                        <div class="course_title"><a href="course.html">Vocabulary</a></div>
                        <div class="course_info">
                            <ul>
                                <li><a href="instructors.html">Sarah Parker</a></li>
                                <li><a href="#">Spanish</a></li>
                            </ul>
                        </div>
                        <div class="course_text">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce enim nulla.</p>
                        </div>
                    </div>
                    <div class="course_footer d-flex flex-row align-items-center justify-content-start">
                        <div class="course_students"><i class="fa fa-user" aria-hidden="true"></i><span>10</span></div>
                        <div class="course_rating ml-auto"><i class="fa fa-star" aria-hidden="true"></i><span>4,5</span></div>
                        <div class="course_mark course_free trans_200"><a href="#">Free</a></div>
                    </div>
                </div>
            </div>

            <!-- Course -->
            <div class="col-lg-4 course_col">
                <div class="course">
                    <div class="course_image"><img src="images/course_12.jpg" alt=""></div>
                    <div class="course_body">
                        <div class="course_title"><a href="course.html">Vocabulary</a></div>
                        <div class="course_info">
                            <ul>
                                <li><a href="instructors.html">Sarah Parker</a></li>
                                <li><a href="#">English</a></li>
                            </ul>
                        </div>
                        <div class="course_text">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce enim nulla.</p>
                        </div>
                    </div>
                    <div class="course_footer d-flex flex-row align-items-center justify-content-start">
                        <div class="course_students"><i class="fa fa-user" aria-hidden="true"></i><span>10</span></div>
                        <div class="course_rating ml-auto"><i class="fa fa-star" aria-hidden="true"></i><span>4,5</span></div>
                        <div class="course_mark trans_200"><a href="#">$45</a></div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col">
                <div class="load_more_button"><a href="#">load more</a></div>
            </div>
        </div>
    </div>
</div>
@endsection