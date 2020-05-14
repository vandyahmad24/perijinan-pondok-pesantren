@extends('layouts.app')

@section('content')
    <!--/#cta-->
    <section id="main-slider">
            <div class="owl-carousel">
                <div class="item" style="background-image: url({{asset('public/images/slider/bg3.jpg')}});">
                    <div class="slider-inner">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-6">
                                    {{-- <div class="carousel-content">
                                        <h2><span>Multi</span> is the best Onepage html template</h2>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna incididunt ut labore aliqua. </p>
                                        <a class="btn btn-primary btn-lg" href="#">Read More</a>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/.item-->
                <div class="item" style="background-image: url({{asset('public/images/slider/bg2.jpg')}});">
                    <div class="slider-inner">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-6">
                                    {{-- <div class="carousel-content">
                                        <h2>Beautifully designed <span>free</span> one page template</h2>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna incididunt ut labore aliqua. </p>
                                        <a class="btn btn-primary btn-lg" href="#">Read More</a>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item" style="background-image: url({{asset('public/images/slider/bg1.jpg')}});">
                    <div class="slider-inner">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-6">
                                    {{-- <div class="carousel-content">
                                        <h2>Beautifully designed <span>free</span> one page template</h2>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna incididunt ut labore aliqua. </p>
                                        <a class="btn btn-primary btn-lg" href="#">Read More</a>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item" style="background-image: url({{asset('public/images/slider/bg4.jpg')}});">
                    <div class="slider-inner">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-6">
                                    {{-- <div class="carousel-content">
                                        <h2>Beautifully designed <span>free</span> one page template</h2>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna incididunt ut labore aliqua. </p>
                                        <a class="btn btn-primary btn-lg" href="#">Read More</a>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/.item-->
            </div>
            <!--/.owl-carousel-->
        </section>
    <section id="services">
            <div class="container">
    
                <div class="section-header">
                    <h2 class=" text-center wow fadeInDown">Profil Pondok Pesantren</h2>
                    <p class="text-center wow fadeInDown" style="font-size: 20px; letter-spacing: 3px; word-spacing: 10px;"> 
                        {{-- diganti nanti lewat db --}}
                        Pondok pesantren luhur wahid hasyim semarang (PPLWH) adalah sebuah pondok integral kampus universitas wahid hasyim semarang (unwahas). pplwh di rintis pada tahun 2006 oleh Drs. Noor Ahmad, MA selaku rektor Unwahas. PPLWH didirikan untuk memberikan kemampuan religious kepada mahasiswa di universitas wahid hasyim Semarang.</p>
                </div>
    
                <div class="row">
                    <div class="features text-center">
                      <img class="rounded mx-auto d-block" src="{{asset('public/images/blog/ayo-mondok.jpg')}}" alt="">
                      <br>
                      <a href="{{route('profil')}}" class="btn btn-success" style="padding-right: 20px; padding-left:20px; padding-top:10px; padding-bottom-10px; margin-top:20px;">Lihat Profil</a>
                    </div>
                </div>
                <!--/.row-->
            </div>
            <!--/.container-->
        </section>
    <section id="features">
        <div class="container">
            <div class="section-header">
                
            <div class="row">
                <h1 class=" text-center wow fadeInDown">Lembaga Pendidikan</h1>
                <div class="col-sm-6 wow fadeInLeft">
                    <img class="img-responsive" src="{{asset('public/images/main-feature.png')}}" alt="">
                </div>
                <div class="col-sm-6">
                    <div class="media service-box wow fadeInRight">
                        <div class="pull-left">
                            <i class="fa fa-line-chart"></i>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Madrasah Diniyah</h4>
                            <p>Madrasah Diniyah lembaga pendidikan yang menerapkan kurikulum yang mengacu pada Standar Nasional Pendidikan</p>
                        </div>
                    </div>

                    <div class="media service-box wow fadeInRight">
                        <div class="pull-left">
                            <i class="fa fa-cubes"></i>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Madrasah Diniyah</h4>
                            <p>Madrasah Diniyah lembaga pendidikan yang menerapkan kurikulum yang mengacu pada Standar Nasional Pendidikan</p>
                        </div>
                    </div>

                    <div class="media service-box wow fadeInRight">
                        <div class="pull-left">
                            <i class="fa fa-pie-chart"></i>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Madrasah Diniyah</h4>
                            <p>Madrasah Diniyah lembaga pendidikan yang menerapkan kurikulum yang mengacu pada Standar Nasional Pendidikan</p>
                        </div>
                    </div>

                    <div class="media service-box wow fadeInRight">
                        <div class="pull-left">
                            <i class="fa fa-pie-chart"></i>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Madrasah Diniyah</h4>
                            <p>Madrasah Diniyah lembaga pendidikan yang menerapkan kurikulum yang mengacu pada Standar Nasional Pendidikan</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    
    <section id="about">
        <div class="container">

            <div class="section-header">
                <h2 class="text-center wow fadeInDown">Profil Pendiri</h2>
            </div>

            <div class="row">
                <div class="col-sm-6 wow fadeInLeft">
                    <h3 class="column-title">Drs. H. Noor Achmad, MA</h3>
                    <img class="img-responsive" src="{{asset('public/images/blog/muhamutarom.jpg')}}" alt="">
                  <p></p>
                </div>

                <div class="col-sm-6 wow fadeInRight">
                    <h3 class="column-title">Profil Drs. H. Noor Achmad, MA</h3>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>

                    <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                    <a class="btn btn-primary" href="#">Lihat Profil Lebih Lanjut</a>

                </div>
            </div>
        </div>
    </section>
    <section id="portfolio">
        <div class="container">
            <div class="section-header">
                <h2 class="text-center wow fadeInDown">Galeri</h2>
            </div>
            <div class="portfolio-items">
                <div class="portfolio-item creative">
                    <div class="portfolio-item-inner">
                        <img class="img-responsive" src="{{asset('public/images/portfolio/01.jpg')}}" alt="">
                        <div class="portfolio-info">
                            <h3>Portfolio Item 1</h3>
                            Lorem Ipsum Dolor Sit
                            <a class="preview" href="images/portfolio/full.jpg" rel="prettyPhoto"><i class="fa fa-eye"></i></a>
                        </div>
                    </div>
                </div>
                <!--/.portfolio-item-->

                <div class="portfolio-item corporate portfolio">
                    <div class="portfolio-item-inner">
                        <img class="img-responsive" src="{{asset('public/images/portfolio/01.jpg')}}" alt="">
                        <div class="portfolio-info">
                            <h3>Portfolio Item 2</h3>
                            Lorem Ipsum Dolor Sit
                            <a class="preview" href="images/portfolio/full.jpg" rel="prettyPhoto"><i class="fa fa-eye"></i></a>
                        </div>
                    </div>
                </div>
                <!--/.portfolio-item-->

                <div class="portfolio-item creative">
                    <div class="portfolio-item-inner">
                        <img class="img-responsive" src="{{asset('public/images/portfolio/01.jpg')}}" alt="">
                        <div class="portfolio-info">
                            <h3>Portfolio Item 3</h3>
                            Lorem Ipsum Dolor Sit
                            <a class="preview" href="images/portfolio/full.jpg" rel="prettyPhoto"><i class="fa fa-eye"></i></a>
                        </div>
                    </div>
                </div>
                <!--/.portfolio-item-->

                <div class="portfolio-item corporate">
                    <div class="portfolio-item-inner">
                        <img class="img-responsive" src="{{asset('public/images/portfolio/01.jpg')}}" alt="">
                        <div class="portfolio-info">
                            <h3>Portfolio Item 4</h3>
                            Lorem Ipsum Dolor Sit
                            <a class="preview" href="images/portfolio/full.jpg" rel="prettyPhoto"><i class="fa fa-eye"></i></a>
                        </div>
                    </div>
                </div>
                <!--/.portfolio-item-->

                <div class="portfolio-item creative portfolio">
                    <div class="portfolio-item-inner">
                        <img class="img-responsive" src="{{asset('public/images/portfolio/01.jpg')}}" alt="">
                        <div class="portfolio-info">
                            <h3>Portfolio Item 5</h3>
                            Lorem Ipsum Dolor Sit
                            <a class="preview" href="images/portfolio/full.jpg" rel="prettyPhoto"><i class="fa fa-eye"></i></a>
                        </div>
                    </div>
                </div>
                <!--/.portfolio-item-->

                <div class="portfolio-item corporate">
                    <div class="portfolio-item-inner">
                        <img class="img-responsive" src="{{asset('public/images/portfolio/01.jpg')}}" alt="">
                        <div class="portfolio-info">
                            <h3>Portfolio Item 5</h3>
                            Lorem Ipsum Dolor Sit
                            <a class="preview" href="images/portfolio/full.jpg" rel="prettyPhoto"><i class="fa fa-eye"></i></a>
                        </div>
                    </div>
                </div>
                <!--/.portfolio-item-->

                <div class="portfolio-item creative portfolio">
                    <div class="portfolio-item-inner">
                        <img class="img-responsive" src="{{asset('public/images/portfolio/01.jpg')}}" alt="">
                        <div class="portfolio-info">
                            <h3>Portfolio Item 7</h3>
                            Lorem Ipsum Dolor Sit
                            <a class="preview" href="images/portfolio/full.jpg" rel="prettyPhoto"><i class="fa fa-eye"></i></a>
                        </div>
                    </div>
                </div>
                <!--/.portfolio-item-->

                <div class="portfolio-item corporate">
                    <div class="portfolio-item-inner">
                        <img class="img-responsive" src="{{asset('public/images/portfolio/01.jpg')}}" alt="">
                        <div class="portfolio-info">
                            <h3>Portfolio Item 8</h3>
                            Lorem Ipsum Dolor Sit
                            <a class="preview" href="images/portfolio/full.jpg" rel="prettyPhoto"><i class="fa fa-eye"></i></a>
                        </div>
                    </div>
                </div>
                <!--/.portfolio-item-->
            </div>
        </div>
        <!--/.container-->
    </section>
    <!--/#meet-team-->
    @endsection
