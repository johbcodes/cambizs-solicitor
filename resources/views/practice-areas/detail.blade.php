@extends('navigation.master')

@section('content')
    <!-- MAIN SECTION -->
    <section class="whiteSection commonSection clearfix">
        <div class="container">
            <div class="main-content reverse">
                <div class="row">

                    <div class="col-md-3 col-sm-4 col-xs-12">
                        <div class="sidebar">

                            <div class="block">
                                <h3>Search</h3>
                                <div class="block-inner">
                                    <ul class="list-unstyled sideNav">
                                        <li>
                                            <form action="#" method="POST" role="form">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="title"
                                                        placeholder="Title">
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="location"
                                                        placeholder="Location">
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="specialty"
                                                        placeholder="Specialty">
                                                </div>
                                                <div class="form-group">
                                                    <input type="number" class="form-control" name="fee"
                                                        placeholder="Fee">
                                                </div>
                                                <div class="form-group">
                                                    <input type="number" class="form-control" name="rating"
                                                        placeholder="Rating">
                                                </div>
                                            </form>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                            <div class="block">
                                <a href="#" class="btn btn-common btn-full-round btn-theme">Apply Filter</a>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-9 col-sm-8 col-xs-12">
                        <div class="primary-content">
                            <div class="practice-content">
                                <img class="title-img img-responsive" src="{{ asset('user/img/practice/img-13.jpg') }}"
                                    alt="Image">
                                <div class="sectionTitle text-left">
                                    <h2>{{ $area->name }}</h2>
                                    <p>{{ $area->description }}.</p>
                                    <div class="row">
                                        <div class="col-sm-8 col-xs-12">
                                            <p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below
                                                for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum
                                                et Malorum" by Cicero are also reproduced in their exact original form,
                                                accompanied by English versions from the 1914 translation by H. Rackham.</p>
                                            <p>Since the 1500s is reproduced below for those interested. Sections 1.10.32
                                                and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also
                                                reproduced in their exact original form, accompanied by English </p>
                                        </div>
                                        <div class="col-sm-4 col-xs-12">
                                            <img class="inner-img img-responsive"
                                                src="{{ asset('user/img/practice/img-14.jpg') }}" alt="Image">
                                        </div>
                                    </div>
                                </div>
                                <div class="collapse navbar-collapse navbar-ex1-collapse content-collapse">
                                    <ul class="nav navbar-nav collapse-nav">
                                        <li>
                                            <a class="collapsed" href="javascript:;" data-toggle="collapse"
                                                data-target="#collapse1" aria-expanded="true">Where can i get some? <i
                                                    class="fa fa-minus"></i></a>
                                            <div id="collapse1" class="collapse collapseItem in">
                                                <p>It is a long established fact that a reader will be distracted by the
                                                    readable content of a page when looking at its layout. The point of
                                                    using Lorem Ipsum is that it has a more-or-less normal distribution of
                                                    letters, as opposed to using 'Content here, content here.</p>
                                            </div>
                                        </li>
                                        <li>
                                            <a class="collapsed" href="javascript:;" data-toggle="collapse"
                                                data-target="#collapse2">Why do we use it?<i class="fa fa-plus"></i></a>
                                            <div id="collapse2" class="collapse collapseItem">
                                                <p>It is a long established fact that a reader will be distracted by the
                                                    readable content of a page when looking at its layout. The point of
                                                    using Lorem Ipsum is that it has a more-or-less normal distribution of
                                                    letters, as opposed to using 'Content here, content here.</p>
                                            </div>
                                        </li>
                                        <li>
                                            <a class="collapsed" href="javascript:;" data-toggle="collapse"
                                                data-target="#collapse3">Where can I get some?<i class="fa fa-plus"></i></a>
                                            <div id="collapse3" class="collapse collapseItem">
                                                <p>It is a long established fact that a reader will be distracted by the
                                                    readable content of a page when looking at its layout. The point of
                                                    using Lorem Ipsum is that it has a more-or-less normal distribution of
                                                    letters, as opposed to using 'Content here, content here.</p>
                                            </div>
                                        </li>

                                    </ul>
                                </div>
                            </div>

                            <div class="teamSection padding-topLarge">
                                <div class="sectionTitle text-left">
                                    <h2>Attorneys in this area</h2>
                                </div>
                                <div class="row">
                                    @foreach ($solicitors as $solicitor)
                                        <div class="col-sm-4 col-xs-12">
                                            <div class="teamContent text-center">
                                                <div class="teamImage">
                                                    <img src="{{ asset('user/img/home/team4.jpg') }}" alt="img">
                                                    <div class="overlay">
                                                        <a href="#"></a>
                                                    </div>
                                                </div>
                                                <div class="teamInfo">
                                                    <h3><a href="#">{{ $solicitor->user->name }}</a></h3>
                                                    <p>Lawyer &amp ceo</p>
                                                    <ul class="list-inline">
                                                        <li><a href="#"><i class="fa fa-facebook"
                                                                    aria-hidden="true"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-twitter"
                                                                    aria-hidden="true"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-rss"
                                                                    aria-hidden="true"></i></a>
                                                        </li>
                                                        <li><a href="#"><i class="fa fa-linkedin"
                                                                    aria-hidden="true"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-skype"
                                                                    aria-hidden="true"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
