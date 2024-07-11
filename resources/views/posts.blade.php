@extends('layouts.frontend.app')
@section('content')

 <!-- Start top-section Area -->
 <section class="top-section-area section-gap">
    <div class="container">
      <div class="row justify-content-between align-items-center d-flex">
        <div class="col-lg-8 top-left">
          <h1 class="text-white mb-20">All Post</h1>
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
                <div class="row justify-content-center">
                    @foreach ($posts as $p)


                  <div class="single-posts col-lg-6 col-sm-6">
                    <img class="img-fluid" src="{{ asset('upload/post/'.$p->image) }}" alt="" />
                    <div class="date mt-20 mb-20">{{ $p->created_at->diffForHumans() }}</div>
                    <div class="detail">
                      <a href="{{ url('post/'.$p->slug) }}"
                        ><h4 class="pb-20">
                            {{ $p->title }}
                        </h4></a>
                      <p style="text-align: justify" >
                        {{-- {{ $p->body }} --}}
                        {!! Str::limit($p->body, 100) !!}
                      </p>
                      <p class="footer pt-20">
                        <i class="fa fa-heart-o" aria-hidden="true"></i>
                        <a href="#">06 Likes</a>
                        <i
                          class="ml-20 fa fa-comment-o"
                          aria-hidden="true"
                        ></i>
                        <a href="#">02 Comments</a>
                      </p>
                    </div>
                  </div>
                  @endforeach

                  <div class="justify-content-center d-flex mt-5">
                   {{ $posts->links() }}
                  </div>
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
