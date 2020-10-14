<label for="">Статус</label>
<select name="published" class="form-control">
	@if (isset($article->id))
		<option value="0" @if($article->published == 0) selected="" @endif>Не опубликовано</option>
		<option value="1" @if($article->published == 1) selected="" @endif>Опубликовано</option>
	@else
		<option value="0">Не опубликовано</option>
		<option value="1">Опубликовано</option>
	@endif
</select>

<label for="">Заголовок</label>
<input type="text" class="form-control" name="title" placeholder="Заголовок новости" value="{{$article->title ?? ""}}" required>

<label for="">Slug (уникальное значение)</label>
<input type="text" class="form-control" name="slug" placeholder="Автоматическая генерация" value="{{$article->slug ?? ""}}" readonly="">

<label for="">Родительская категория</label>
<select name="categories[]" multiple="" class="form-control">
	@include('admin.articles.partials.categories', ['categories' => $categories])
</select>

<label for="">Краткое описание</label>
<textarea name="description_short" id="description_short" class="form-control">{{$article->description_short ?? ""}}</textarea>
<label for="">Полное описание</label>
<textarea name="description" id="description" class="form-control">{{$article->description ?? ""}}</textarea>

<hr>

<label for="">Мета заголовок</label>
<input type="text" class="form-control" name="meta_title" placeholder="Мета заголовок" value="{{$article->meta_title ?? ""}}">
<label for="">Мета описание</label>
<input type="text" class="form-control" name="meta_description" placeholder="Мета описание" value="{{$article->meta_description ?? ""}}">
<label for="">Ключевые слова</label>
<input type="text" class="form-control" name="meta_keywords" placeholder="Ключевые слова, через запятую" value="{{$article->meta_keywords ?? ""}}">

<hr>

<input type="submit" class="btn btn-primary" value="Сохранить">