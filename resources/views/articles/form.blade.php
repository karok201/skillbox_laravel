<div class="mb-3">
    <label for="inputSlug" class="form-label">Символьный код</label>
    <input type="text" class="form-control" id="inputSlug" placeholder="Введите символьный код" name="slug"
           value="{{ old('slug', $article->slug) }}">
</div>
<div class="mb-3">
    <label for="inputTitle" class="form-label">Название статьи</label>
    <input type="text" class="form-control" id="inputTitle" placeholder="Введите название статьи" name="title"
           value="{{ old('title', $article->title) }}">
</div>
<div class="mb-3">
    <label for="inputBody" class="form-label">Детальное описание статьи</label>
    <input type="text" class="form-control" id="inputBody" placeholder="Введите описание" name="shortBody"
           value="{{ old('shortBody', $article->shortBody) }}">
</div>
<div class="mb-3">
    <label for="inputBody" class="form-label">Краткое описание статьи</label>
    <input type="text" class="form-control" id="inputBody" placeholder="Введите описание" name="largeBody"
           value="{{ old('largeBody', $article->largeBody)  }}">
</div>
<div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="inputPublished" value="1" name="published"
        {{ $article->published ? 'checked' : '' }}>
    <label class="form-check-label" for="inputPublished">Published</label>
</div>
