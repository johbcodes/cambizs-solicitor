@extends('navigation.master')

@section('content')
    <!-- PRACTICE SECTION -->
    <section class="whiteSection commonSection clearfix">
        <div class="container">
            <div class="main-content">
                <div class="sectionTitle text-center">
                    <h2>our practice areas</h2>
                </div>

                <div class="row">
                    @foreach ($practiceAreas->shuffle() as $data)
                        <div class="col-sm-4">
                            <article class="gallery-img text-center">
                                <figure>
                                    <img src="{{ asset('user/img/home/g-img1.jpg') }}" alt="Image" class="img-responsive">
                                    <div class="overlay">
                                        <div class="overlayInfo">
                                            <i class="icon-avatar-family"></i>
                                            <h4><a href="#">{{ ucwords($data->name) }}</a></h4>
                                            <p>{{ $data->description }}</p>
                                            <a href="{{ route('practice.detail', $data->name) }}"
                                                class="btn btn-border">learn
                                                more</a>
                                        </div>
                                    </div>
                                </figure>
                            </article>
                        </div>
                    @endforeach


                </div>
            </div>
        </div>
    </section>
@endsection
