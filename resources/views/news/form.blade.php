<div class="mb-3">
    <label for="inputSlug" class="form-label">Символьный код</label>
    <input type="text" class="form-control" id="inputSlug" placeholder="Введите символьный код" name="slug"
           value="{{ old('slug', $item->slug ?? '') }}">
</div>
<div class="mb-3">
    <label for="inputTitle" class="form-label">Название новости</label>
    <input type="text" class="form-control" id="inputTitle" placeholder="Введите название новости" name="title"
           value="{{ old('title', $item->title ?? '') }}">
</div>
<div class="mb-3">
    <label for="inputBody" class="form-label">Описание новости</label>
    <input type="text" class="form-control" id="inputBody" placeholder="Введите описание новости" name="body"
           value="{{ old('body', $item->body ?? '')  }}">
</div>
<div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="inputPublished" value="1" name="published"
        {{ $item->published ?? '' ? 'checked' : '' }}>
    @if(isset($item))
        <input type="hidden" name="item">
    @endif
    <label class="form-check-label" for="inputPublished">Published</label>
</div>
