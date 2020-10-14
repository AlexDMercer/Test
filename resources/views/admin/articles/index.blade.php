@extends('admin.layouts.app_admin')

@section('content')
	<div class="container">
		@component('admin.components.breadcrumb')
			@slot('title') Список новостей @endslot
			@slot('parent') Главная @endslot
			@slot('active') Новости @endslot
		@endcomponent
		<hr>

		<a href="{{route('admin.article.create')}}" class="btn btn-primary pull-right"><i class="fafa-plus-square-o"></i> Создать новость</a>
		<br><br>
		<table class="table table-striped">
			<thead>
				<th>Наименовние</th>
				<th class="text-center">Публикация</th>
				<th class="text-right">Действие</th>
			</thead>
			<tbody>
				@forelse($articles as $article)
					<tr>
						<td>{{($article->title)}}</td>
						<td class="text-center">{{($article->published)}}</td>
						<td class="text-right">
							<form action="{{route('admin.article.destroy', $article)}}" method="post" onsubmit="if(confirm('Удалить?')){return true}else{return false}">
								<input type="hidden" name="_method" value="DELETE">
								{{csrf_field()}}
								<a href="{{route('admin.article.edit', $article)}}" class="btn btn-warning">Редактировать</a>
								<button type="submit" class="btn btn-danger">Удалить</button>
							</form>
						</td>
					</tr>
				@empty
					<tr>
						<td class="text-center" colspan="3"><h2>Данные отсутствуют</h2></td>
					</tr>
				@endforelse
			</tbody>
			<tfoot>
				<tr>
					<td colspan="3">
						<ul class="pagination pull-right">
							{{$articles->links()}}
						</ul>
					</td>
				</tr>
			</tfoot>
		</table>

	</div>
@endsection