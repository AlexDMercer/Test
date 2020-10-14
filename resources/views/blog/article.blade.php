@extends('layouts.app')

@section('title', $category->title . " - OdinBlog")
@section('meta_keyword', $category->meta_keyword)
@section('meta_description', $category->meta_description)


@section('content')
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h1>{{$article->title}}</h1>
				<p>{!!$article->description_short!!}</p>
			</div>
		</div>
	</div>
@endsection