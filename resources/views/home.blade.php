@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   Welcome {{ auth()->user()->name }}!
                   <br />
                   Your API Access Token is <span class="text-primary"><b>{{ auth()->user()->access_token }}</b></span>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-8 d-grid mx-auto">
            <h3>Articles</h3>
            @forelse ($articles as $item)
            <div class="card mb-3" style="max-width: 100%;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="{{ $item->display_feature_photo }}" class="rounded-start" style="height: 200px; object-fit: cover; width: 100%" />
                    </div>
                    <div class="col-md-8 d-flex justify-content-between">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->title }}</h5>
                            <p class="card-text">{{ $item->content }}</p>
                            <p class="card-text"><small class="text-body-secondary">{{ $item->created_date_human }}</small></p>
                        </div>
                        <div class="mt-2" style="margin-right: 15px">
                            <a href="{{ url('home') }}?article_edit=1&article_id={{ $item->id }}" class="text-success" style="font-size: 13px; text-decoration: none"><i class="bi bi-pencil"></i> Edit</a> &nbsp;
                            <a href="javascript:;" onclick="removeArticle({{ $item->id }})" class="text-danger" style="font-size: 13px; text-decoration: none"><i class="bi bi-trash"></i> Delete</a>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="text-center">
                <h4>No articles available</h4>
            </div>
            @endforelse
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-8 d-grid mx-auto">
            <hr>
            <form action="{{ url('articles') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">
                        Create Article
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ $article->title ?? '' }}" />
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label for="feature_photo" class="form-label">Feature Photo</label>
                            <div>
                                <input type="file" name="feature_photo" id="feature_photo" class="@error('feature_photo') is-invalid @enderror" />
                                @error('feature_photo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <label for="content" class="form-label">Article Content</label>
                            <textarea name="content" id="content" rows="4" style="resize: none;" class="form-control @error('content') is-invalid @enderror">{{ $article->content ?? '' }}</textarea>
                            @error('content')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mt-3 d-flex justify-content-end">
                            @if (isset($article_edit))
                            <input type="hidden" name="article_id" value="{{ $article->id }}" />
                            <a href="{{ url('home') }}" class="btn btn-outline-danger">Cancel</a> &nbsp;&nbsp;
                            @endif
                            <button type="submit" class="btn btn-primary">{{ isset($article_edit) ? 'Save Changes' : 'Submit' }}</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
