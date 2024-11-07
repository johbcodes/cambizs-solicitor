@extends('navigation.master')

<style>
    /* Custom styles */
    .profile-card {
        background-color: #ffffff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        padding: 20px;
        margin-top: 20px;
        text-align: center;
    }

    .profile-card img {
        border-radius: 50%;
        width: 100px;
        height: 100px;
        object-fit: cover;
    }

    .request-btn {
        background-color: #f9a825;
        color: #ffffff;
        font-weight: 600;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    .request-btn:hover {
        background-color: #e68a00;
    }

    .service-card,
    .review-card {
        background-color: #ffffff;
        border: 1px solid #e0e0e0;
        border-radius: 8px;
        padding: 15px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
    }
</style>

@section('content')
    <section class="whiteSection commonSection clearfix">
        <div class="container my-5">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="profile-card"
                        style="position: relative; padding: 40px 30px; background-color: rgba(255, 255, 255, 0.95); border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                        <div
                            style="background-image: url('{{ $solicitor->profile->background_image ? asset('storage/' . $solicitor->profile->background_image) : asset('assets/images/default-background.jpg') }}'); background-size: cover; background-position: center; position: absolute; top: 0; left: 0; right: 0; bottom: 0; opacity: 0.15; border-radius: 10px;">
                        </div>

                        <div style="position: relative; z-index: 2;">
                            <img src="{{ $solicitor->avatar ? asset('storage/' . $solicitor->avatar) : asset('assets/images/avatar/1.png') }}"
                                alt="Solicitor Photo"
                                style="border-radius: 50%; border: 3px solid #ffffff; width: 120px; height: 120px; margin-bottom: 15px;">
                            <h2 style="margin-top: 15px; color: #333; font-size: 1.8rem;">{{ $solicitor->name }}</h2>
                            <p style="color: #555; font-size: 1rem; margin-bottom: 5px;">{{ $solicitor->profile->location }}
                            </p>
                            <p style="color: #777; font-size: 0.95rem; margin-bottom: 20px;">{{ $solicitor->profile->bio }}
                            </p>

                            @if ($solicitor->profile->video_link)
                                <div class="mt-3 mb-3" style="margin: 1rem">
                                    <button type="button" class="btn btn-default" data-toggle="modal"
                                        data-target="#videoModal"
                                        style="padding: 12px 20px; border-radius: 8px; font-weight: 500; color: #ffffff; background:rgba(59, 59, 59, 0.301)">
                                        <i class="fa fa-play-circle" style="margin-right: 8px;"></i> Watch Introduction
                                        Video
                                    </button>
                                </div>
                            @endif

                            <a href="{{ route('client.serviceRequest.submit', ['solicitor' => $solicitor->id]) }}"
                                class="btn btn-primary mt-3"
                                style="padding: 12px 25px; border-radius: 8px; font-weight: 600; margin-right: 10px;">
                                Request Service
                            </a>

                            <a href="{{ route('chat.start', $solicitor->id) }}" class="btn btn-secondary mt-3"
                                style="padding: 12px 25px; border-radius: 8px; font-weight: 600;">
                                Message Solicitor
                            </a>
                        </div>
                    </div>
                </div>
            </div>


            <div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="videoModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="videoModalLabel">Introduction Video</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" src="{{ $solicitor->profile->video_link }}"
                                    allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <ul class="nav nav-tabs mt-4" id="profileTabs" role="tablist">
                <li class="active">
                    <a href="#services" data-toggle="tab" role="tab">Services Offered</a>
                </li>
                <li>
                    <a href="#reviews" data-toggle="tab" role="tab">Reviews</a>
                </li>
            </ul>

            <div class="tab-content mt-4" id="profileTabContent">
                <div class="tab-pane fade in active" id="services" role="tabpanel">
                    <div class="row">
                        @foreach ($areas as $practiceArea)
                            <div class="col-md-6 mb-4" style="margin-top: 1rem">
                                <div class="service-card">
                                    <h5>{{ $practiceArea->name }}</h5>
                                    <p>{{ $practiceArea->description }}</p>
                                    <button class="btn">Request Service</button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="tab-pane fade" id="reviews" role="tabpanel">
                    <div class="row">
                        @foreach ($reviews as $review)
                            <div class="col-md-6 mb-4">
                                <div class="review-card">
                                    <h5>{{ $review->sender }}</h5>
                                    <p>"{{ $review->comment }}"</p>
                                    @if ($review->comments->isNotEmpty())
                                        <ul>
                                            @foreach ($review->comments as $comment)
                                                <li>{{ $comment->content }} - <strong>{{ $comment->sender }}</strong>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
