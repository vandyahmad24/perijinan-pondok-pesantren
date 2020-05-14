@extends('layouts.app')

@section('content')
    <!--/#cta-->
    <style>
        p    {font-size: 15px;}
        </style>
    <section id="cta" class="wow fadeIn">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <h2>Visi dan Misi PPLWH</h2>
                    <p>Didalam pendirian Pondok Pesantren Luhur Wahid Hasyim Semarang  ini, banyak sekali harapan yang ingin dicapai oleh para pendiri Pondok Pesantren, selanjutnya harapan tersebut tertuang dalam visi dan misi Pondok Pesantren Luhur Wahid Hasyim.
                    </p>
                    <p>
                        <ol>
                            <li>Visi“Membentuk kepribadian yang disiplin, ahli dzikir, ahli fikir, dan berakhlakul karimah serta mengembangkan SDM yang berkualitas”.
                            </li> 
                            <li>
                             Misi
                            <ul>
                                <li>  Menyelenggarakan pendidikan yang berorientasi kualitas baik dalam agama, moral, maupun social.</li>
                                <li> Membekali sntri dengan penguasaan ilmu agama dan ilmu umum dengan memadukan unsur pesantren dan perguruan tinggi.</li>
                                <li> Membekali santri dengan akhlakul karimah melalui pendekatan social culture pesantren</li>
                                <li> Melatih kedisiplinan dan mengemban tanggungjawab dengan membekali santri dengan kemampuan berorganisasi dan kemampuan hidup (life skill).</li>
                            </ul>
                        </li>
                        </ol>  
                            
                    </p>
                </div>
                <div class="col-sm-4 text-center">
                    <img src="{{asset('public/images/logo/logo.png')}}" width="350px;"> <br>
                </div>
            </div>
        </div>
    </section>
    <!--/#meet-team-->
    @endsection
