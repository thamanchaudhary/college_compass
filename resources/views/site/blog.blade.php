@extends('site.layouts.app')
@section('title')
Softech Foundation : Software company in Nepal - Software development - Web development - Mobile Apps development- Software products- Nepal Government Website Development - Outsourcing Nepal
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('assets/site/plugin/wow-master/css/libs/animate.css')}}">
<link rel="stylesheet" href="{{ asset('assets/site/plugin/animate/animate.min.css')}}">
<style type="text/css">
    div#toc_container ul li {
        font-size: 100%
    }
</style>

@endsection
@section('content')
<!-- latest blog -->
@if(isset($data['blog']))
<div class="all_posts">
    <div class="container">
        <div class="allposts_header pt-3">
            <h3 class="section_title"> Blogs</h3>
        </div>
        <div class="loop_wrapper wow animate__fadeInBottomRight" data-wow-duration="1s" data-wow-delay="0.5s">
            @foreach($data['blog'] as $row)
            <article id="post-11338" class="latest_post post-11338 post type-post status-publish format-standard has-post-thumbnail hentry category-blogs category-latest-blog category-offers tag-featured">
                <a class="post-thumbnail" href="{{ route('site.blog.show', ['id'=> $row->post_unique_id]) }}" aria-hidden="true" tabindex="-1">
                    <img style="box-shadow: 0 0 4px 0 rgba(0,0,0,.25);" width="1200" height="700" src="{{$row->thumbs}}" class="attachment-full size-full wp-post-image" alt="" loading="lazy" srcset="" sizes="(max-width: 1200px) 100vw, 1200px" /> </a>
                <div class="text-holder">
                    <header class="entry-header">
                        <h2 class="entry-title"><a href="{{ route('site.blog.show', ['id'=> $row->post_unique_id]) }}" rel="bookmark">{{ $row->title }}
                            </a></h2>
                    </header>
                    <footer class="entry-footer">
                        <span class="cat-links">
                            <a href="{{ route('site.blog.show', ['id'=> $row->post_unique_id,]) }}" rel="category tag">@if(isset($row->postCategory)) {{ $row->postCategory->title }} @endif</a>,
                            <!-- <a href="category/latest-blog/index.html" rel="category tag">Latest Blog</a>,  -->
                        </span><span>{{ date('F d, Y', strtotime($row->created_at)) }}</span>
                    </footer>
                    <div class="entry-content">
                    <p>{!! strlen($row->description) > 150 ? substr($row->description,0,150).'..' : $row->description !!}</p>
                    </div>
                </div>
            </article>
            @endforeach
        </div>
    </div>
</div>
@endif




@endsection
@section('js')
<script src="{{ asset('assets/site/plugin/wow-master/js/wow.min.js')}}"></script>
<script src="{{ asset('assets/site/plugin/animate/main.mjs')}}"></script>

<script>
    wow = new WOW({
        boxClass: 'wow', // default
        animateClass: 'animated', // default
        offset: 0, // default
        mobile: true, // default
        live: true // default
    })
    wow.init();
</script>
@endsection