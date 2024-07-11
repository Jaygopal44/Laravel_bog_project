<div class="col-lg-4 sidebar-area">
    <div class="single_widget search_widget">
      <div id="imaginary_container">
        <div class="input-group stylish-input-group">
            <form action="{{route('search')}}" method="GET">
                <div class="input-group stylish-input-group">
                    <input type="text" class="form-control" placeholder="Search" name="search" />
                    <span class="input-group-addon">
                        <button type="submit">
                            <span class="lnr lnr-magnifier"></span>
                        </button>
                    </span>
                </div>
            </div>
        </form>
      </div>
    </div>

    <div class="single_widget cat_widget">
      <h4 class="text-uppercase pb-20">post categories</h4>
        <ul>
            @foreach ($categories as $cat)
                <li>
                  <a href="{{ url('/category/'.$cat->slug) }}">{{ $cat->name }} <span>{{ $cat->posts->count() }}</span></a>
                </li>
            @endforeach
        </ul>
    </div>

    <div class="single_widget recent_widget">
      <h4 class="text-uppercase pb-20">Recent Posts</h4>
      <div class="active-recent-carusel">
        @foreach ($latest_post as $p)


        <div class="item">
        <a href="{{ url('post/'.$p->id) }}">
          <img src="{{ asset('upload/post/'.$p->image) }}" alt="" />
          <p class="mt-20 title text-uppercase">
            {{ $p->title}}
          </p>
        </a>
          <p>
            {{ $p->created_at->diffForHumans() }}
            <span>
              <i class="fa fa-heart-o" aria-hidden="true"></i> 06
              <i class="fa fa-comment-o" aria-hidden="true"></i
              >02</span
            >
          </p>
        </div>
        @endforeach

      </div>
    </div>


    <div class="single_widget tag_widget">
      <h4 class="text-uppercase pb-20">Tag Clouds</h4>
      <ul>
        @foreach ($recent_tag->unique('name')->take(10) as $tag)

        <li><a href="{{ url('tag',$tag->name) }}">{{ $tag->name }}</a></li>
        @endforeach
      </ul>
    </div>
  </div>
