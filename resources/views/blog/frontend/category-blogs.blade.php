@extends('layouts.master')

@push('css')
    <style>
        .details-wrapper{
            display: inline-block;
            width: 100%;
        }
        .details-wrapper a{
            margin-bottom: 5px;
            display: inline-block;
        }
    </style>
@endpush

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left"><i class="fa fa-tags"></i> {{$category->title}} Blogs</h3>
                    <div class="clearfix"></div>
                    <hr>
                    @if(count($blogs) > 0)
                        @foreach($blogs as $blog)
                            <h1><a href="{{url('blogs/'.$blog->slug)}}">{{$blog->title}}</a></h1>
                            <span class="text-muted">Posted on {{$blog->created_at->format('d-m-Y h:i a')}}</span>
                            <p>{!!  ltrim(substr($blog->content,0,250)) !!} ...</p>
                            <div class="details-wrapper">
                                <a href="{{url('blogs/author/'.$blog->author->id)}}"><span
                                            class="label label-success">Author : {{$blog->author->name}}</span></a>
                                <a href="{{url('blogs/category/'.$blog->category->slug)}}"><span
                                            class="label label-primary">Category : {{$blog->category->title}}</span></a>
                                <div class="pull-right">
                                    @if(count($blog->tags) > 0)
                                        @foreach($blog->tags as $tag)
                                            <a href="{{url('blogs/tag/'.$tag->slug)}}"><span
                                                        class="label label-warning">{{$tag->name}}</span></a>
                                        @endforeach
                                    @endif
                                </div>
                                <div class="clearfix"></div>
                                <hr>
                            </div>

                        @endforeach
                        <div class="text-center">
                            {!! $blogs->links() !!}
                        </div>
                    @else
                        <h1>No Blogs Available</h1>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

