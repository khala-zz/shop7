<div class="related-article-body clearfix">
    <h2 class="article-title page-title"><span>Bài viết liên quan</span></h2>
    <div class="related-content">
        <div class="related-content-inner">
            
            @forelse($news_related as $item)
                <div class="related-inner col-sm-12">
                    <div class="article-body clearfix">
                        <div class="group-blog-top">
                            <div class="top-banner article_banner_show article-image">
                                <img src="{{ asset('uploads/news/'.$item -> image_name) }}" alt="{{ $item -> title }}">
                                <div class="name-title">
                                    {{ $item -> title }}
                                </div>
                            </div>
                        </div>
                        <div class="articleinfo_group">
                            <div class="article-title">
                                <h2 class="article-name"><a href="{{ route('new.detail',['slug' => slugify($item -> title,'-'),'id' => $item -> id])}}">{{ $item -> title }}</a></h2>
                            </div>
                            <div  class="article-content">
                                <p>{!! mb_substr(strip_tags($item->description), 0, 270) !!}...
                                </p>
                            </div>
                            <ul class="article-info list-inline">
                                <li class="article-date">{{ $item -> created_at }}</li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
            @empty
                <div class="post">Chưa có bài viết liên quan </div>
            @endforelse

            
        </div>
    </div>
</div>