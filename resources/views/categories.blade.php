@extends('layouts.frontend.app')
@section('content')

 <!-- Start top-section Area -->
 <section class="top-section-area section-gap">
    <div class="container">
      <div class="row justify-content-between align-items-center d-flex">
        <div class="col-lg-8 top-left">
          <h1 class="text-white mb-20">All Category Post</h1>
          <ul>
            <li>
              <a href="index.html">Home</a
              ><span class="lnr lnr-arrow-right"></span>
            </li>
            <li>
              <a href="category.html">Category</a
              ><span class="lnr lnr-arrow-right"></span>
            </li>
            <li><a href="single.html">Posts</a></li>
          </ul>
        </div>
      </div>
    </div>
  </section>
  <!-- End top-section Area -->

  <!-- Start post Area -->
  <div class="post-wrapper pt-100">
    <!-- Start post Area -->
    <section class="post-area">
      <div class="container">
        <div class="row justify-content-center d-flex">
          <div class="col-lg-8">
            <div class="top-posts pt-50">
              <div class="container">
                <div class="row ">
                    @foreach ($categories as $cat)
                    <div class="col-lg-6 col-sm-6 single-fashion">
                      <img class="img-fluid" src="{{ asset('upload/'.$cat->image) }}" alt="" />
                      <p class="date">{{ $cat->created_at->diffForHumans() }}</p>
                      <h4><a href="{{ url('category/'.$cat->slug) }}">{{ $cat->name }}</a></h4>
                      <p>{{ $cat->discription }}</p>
                      <div class="meta-bottom d-flex justify-content-between">
                        <p><span class="lnr lnr-heart"></span> 15 Likes</p>
                        <p><span class="lnr lnr-bubble"></span> 02 Comments</p>
                      </div>
                    </div>
                    @endforeach


                </div>
              </div>
            </div>
          </div>
        @include('layouts.frontend.partition.sidebar')

        </div>
      </div>
    </section>
    <!-- End post Area -->
  </div>
  <!-- End post Area -->


@endsection
