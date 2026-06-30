@extends('layouts.app')

@section('title', 'About Us')

@section('content')

    <!-- Header -->

    <section class="bg-primary text-white py-5">

        <div class="container text-center">

            <h1 class="display-5 fw-bold">

                About Hotel Sejatera

            </h1>

            <p class="lead">

                Comfortable • Elegant • Memorable

            </p>

        </div>

    </section>

    <!-- About -->

    <section class="py-5">

        <div class="container">

            <div class="row align-items-center">

                <div class="col-lg-6">

                    <img src="{{ asset('assets/images/about-hotel.jpg') }}" class="img-fluid rounded shadow">

                </div>

                <div class="col-lg-6">

                    <h2 class="fw-bold">

                        Welcome to Hotel Sejatera

                    </h2>

                    <hr>

                    <p class="text-muted">

                        Hotel Sejatera merupakan hotel modern yang menawarkan
                        kenyamanan, kemewahan, dan pelayanan terbaik bagi setiap tamu.
                        Berlokasi strategis di pusat kota, hotel kami menjadi pilihan
                        terbaik untuk perjalanan bisnis maupun liburan keluarga.

                    </p>

                    <p class="text-muted">

                        Dengan desain elegan, kamar yang nyaman,
                        restoran berkualitas, serta berbagai fasilitas premium,
                        kami berkomitmen memberikan pengalaman menginap
                        yang berkesan.

                    </p>

                </div>

            </div>

        </div>

    </section>

    <!-- Vision Mission -->

    <section class="py-5 bg-light">

        <div class="container">

            <div class="row">

                <div class="col-md-6">

                    <div class="card shadow h-100">

                        <div class="card-body">

                            <h3 class="text-primary">

                                Our Vision

                            </h3>

                            <p>

                                Menjadi hotel pilihan utama dengan pelayanan
                                terbaik serta fasilitas modern yang memberikan
                                kenyamanan bagi setiap tamu.

                            </p>

                        </div>

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="card shadow h-100">

                        <div class="card-body">

                            <h3 class="text-success">

                                Our Mission

                            </h3>

                            <ul>

                                <li>Memberikan pelayanan terbaik.</li>

                                <li>Menyediakan fasilitas berkualitas.</li>

                                <li>Mengutamakan kenyamanan tamu.</li>

                                <li>Menciptakan pengalaman menginap terbaik.</li>

                            </ul>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-- Statistics -->

    <section class="py-5">

        <div class="container">

            <div class="row text-center">

                <div class="col-md-3">

                    <h1 class="text-primary">

                        120+

                    </h1>

                    <p>Luxury Rooms</p>

                </div>

                <div class="col-md-3">

                    <h1 class="text-success">

                        1500+

                    </h1>

                    <p>Happy Guests</p>

                </div>

                <div class="col-md-3">

                    <h1 class="text-warning">

                        20+

                    </h1>

                    <p>Professional Staff</p>

                </div>

                <div class="col-md-3">

                    <h1 class="text-danger">

                        10+

                    </h1>

                    <p>Years Experience</p>

                </div>

            </div>

        </div>

    </section>

@endsection
