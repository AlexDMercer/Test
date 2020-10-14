@extends('admin.layouts.app_admin')

@section('content')
	<div class="container">
		@component('admin.components.breadcrumb')
			@slot('title') Список категорий @endslot
			@slot('parent') Главная @endslot
			@slot('active') Категории @endslot
		@endcomponent
		<hr>

		<a href="{{route('admin.category.create')}}" class="btn btn-primary pull-right"><i class="fafa-plus-square-o"></i> Создать категорию</a>
		<br><br>
		<table class="table table-striped">
			<thead>
				<th>Наименовние</th>
				<th class="text-center">Публикация</th>
				<th class="text-right">Действие</th>
			</thead>
			<tbody>
				@forelse($categories as $category)
					<tr>
						<td>{{($category->title)}}</td>
						<td class="text-center">{{($category->published)}}</td>
						<td class="text-right">
							<form action="{{route('admin.category.destroy', $category)}}" method="post" onsubmit="if(confirm('Удалить?')){return true}else{return false}">
								<input type="hidden" name="_method" value="DELETE">
								{{csrf_field()}}
								<a href="{{route('admin.category.edit', $category)}}" class="btn btn-warning">Редактировать</a>
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
							{{$categories->links()}}
						</ul>
					</td>
				</tr>
			</tfoot>
		</table>

	</div>
@endsection