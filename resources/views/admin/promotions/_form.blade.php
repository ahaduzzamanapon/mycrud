<div class="form-group">
    <label for="title">Title</label>
    <input type="text" name="title" class="form-control" value="{{ old('title', $promotion->title ?? '') }}" required>
</div>
<div class="form-group">
    <label for="description">Description</label>
    <textarea name="description" class="form-control">{{ old('description', $promotion->description ?? '') }}</textarea>
</div>
<div class="form-group">
    <label for="image">Image</label>
    <input type="file" name="image" class="form-control">
    @if(isset($promotion) && $promotion->image)
        <img src="{{ asset('storage/' . $promotion->image) }}" alt="{{ $promotion->title }}" width="100" class="mt-2">
    @endif
</div>
<div class="form-group">
    <label for="status">Status</label>
    <select name="status" class="form-control">
        <option value="1" {{ (isset($promotion) && $promotion->status) ? 'selected' : '' }}>Active</option>
        <option value="0" {{ (isset($promotion) && !$promotion->status) ? 'selected' : '' }}>Inactive</option>
    </select>
</div>
