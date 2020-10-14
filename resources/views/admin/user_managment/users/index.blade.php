@extends('admin.layouts.app_admin')

@section('content')
	<div class="container">
		@component('admin.components.breadcrumb')
			@slot('title') Список пользователей @endslot
			@slot('parent') Главная @endslot
			@slot('active') Пользователи @endslot
		@endcomponent
		<hr>

		<a href="{{route('admin.user_managment.user.create')}}" class="btn btn-primary pull-right"><i class="fafa-plus-square-o"></i> Создать пользователя</a>
		<br><br>
		<table class="table table-striped">
			<thead>
				<th>Имя</th>
				<th class="text-center">Email</th>
				<th class="text-right">Действие</th>
			</thead>
			<tbody>
				@forelse($users as $user)
					<tr>
						<td>{{($user->name)}}</td>
						<td class="text-center">{{($user->email)}}</td>
						<td class="text-right">
							<form action="{{route('admin.user_managment.user.destroy', $user)}}" method="post" onsubmit="if(confirm('Удалить?')){return true}else{return false}">
								{{method_field('DELETE')}}
								{{csrf_field()}}
								<a href="{{route('admin.user_managment.user.edit', $user)}}" class="btn btn-warning">Редактировать</a>
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
							{{$users->links()}}
						</ul>
					</td>
				</tr>
			</tfoot>
		</table>

	</div>
@endsection