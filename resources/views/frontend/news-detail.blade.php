<h1>News Details</h1>

<section class="editor-section">
    <div class="container">
        <div class="row">
            <div class="col col-sm-12">
                <div class="card-editor">
                    <div class="card-text">
                        <div class="label-section">
                            <h5 style="font-weight: bold;margin-right: 10px;">{{$new->title ?? ''}}</h5>
                            <p>{{ $new->category->category_name ?? ''}} </p>
                            <img class="img-fluid box-image" src='{{ asset("uploads/new_image/$new->news_image") }}' alt="{{ $new->title ?? '-' }}">
                            <p>{{$new->created_by ?? '-'}}</p>
                            <span>{{ Carbon\Carbon::parse($new->created_at)->format('d M Y h:m') }}</span>
                        </div>
                        {!! $new->description !!}                   
                    </div>
                </div>            
            </div>
        </div>
    </div>
</section>