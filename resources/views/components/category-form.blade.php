<div>
    @csrf
    <div class="row">
        @if ($form === 'products')
            <div class="col-md-12">
                <div class="input-group input-group-static mb-3">
                    <select name="category_id" id="category_id" class="form-control" aria-label="Default select example" value="{{ old('category_id', optional($data ?? null)->category_id) }}">
                        <option value="" selected>Select a category</option>
                        @forelse ($attributes['categories'] as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @empty
                            <option value="">No categories</option>
                        @endforelse
                    </select>
                    @error('category_id')
                        <div class="error-message invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        @endif
        <div class="col-md-6">
            <div class="input-group input-group-outline mb-3 {{ !$errors->has('name')?'':'is-invalid' }}">
                <label class="form-label">Name</label>
                <input 
                    type="text" 
                    name="name" 
                    id="name" 
                    class="form-control {{ !$errors->has('name')?'':'border-danger' }}" 
                    value="{{ old('name', optional($data ?? null)->name) }}"
                />
                @error('name')
                    <div class="error-message invalid-feedback d-block">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="input-group input-group-outline mb-3 {{ !$errors->has('slug')?'':'is-invalid' }}">
                <label class="form-label">Slug</label>
                <input 
                    type="text" 
                    name="slug" 
                    id="slug" 
                    class="form-control {{ !$errors->has('slug')?'':'border-danger' }}" 
                    value="{{ old('slug', optional($data ?? null)->slug) }}"
                />
                @error('slug')
                    <div class="error-message invalid-feedback d-block">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        @if ($form === 'products')
            <div class="col-md-12">
                <div class="input-group input-group-outline mb-3 {{ !$errors->has('small_description')?'':'is-invalid' }}">
                    <textarea 
                        name="small_description" 
                        id="small_description" 
                        cols="30" 
                        rows="5" 
                        class="form-control {{ !$errors->has('small_description')?'':'border-danger' }}" 
                        placeholder="Small Description"
                    >{{ old('small_description', optional($data ?? null)->small_description) }}</textarea>
                    @error('small_description')
                        <div class="error-message invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        @endif
        <div class="col-md-12">
            <div class="input-group input-group-outline mb-3 {{ !$errors->has('description')?'':'is-invalid' }}">
                <textarea 
                    name="description" 
                    id="description" 
                    cols="30" 
                    rows="5" 
                    class="form-control {{ !$errors->has('description')?'':'border-danger' }}" 
                    placeholder="Description"
                >{{ old('description', optional($data ?? null)->description) }}</textarea>
                @error('description')
                    <div class="error-message invalid-feedback d-block">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        @if ($form==='products')
            <div class="col-md-6 mb-3">
                <div class="input-group input-group-outline my-3 {{ !$errors->has('original_price')?'':'is-invalid' }}">
                    <label class="form-label">Original price</label>
                    <input 
                        type="number" 
                        class="form-control {{ !$errors->has('original_price')?'':'border-danger' }}" 
                        name="original_price" 
                        id="original_price" 
                        value="{{ old('original_price', optional($data ?? null)->original_price) }}" 
                    />
                    @error('original_price')
                        <div class="error-message invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="input-group input-group-outline my-3 {{ !$errors->has('selling_price')?'':'is-invalid' }}">
                    <label class="form-label">Selling price</label>
                    <input 
                        type="number" 
                        class="form-control {{ !$errors->has('selling_price')?'':'border-danger' }}" 
                        name="selling_price" 
                        id="selling_price" 
                        value="{{ old('selling_price', optional($data ?? null)->selling_price) }}" 
                    />
                    @error('selling_price')
                        <div class="error-message invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="input-group input-group-outline my-3 {{ !$errors->has('qty')?'':'is-invalid' }}">
                    <label class="form-label">Quantity</label>
                    <input 
                        type="number" 
                        class="form-control {{ !$errors->has('qty')?'':'border-danger' }}" 
                        name="qty" 
                        id="qty" 
                        value="{{ old('qty', optional($data ?? null)->qty) }}" 
                    />
                    @error('qty')
                        <div class="error-message invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="input-group input-group-outline my-3 {{ !$errors->has('tax')?'':'is-invalid' }}">
                    <label class="form-label">Tax</label>
                    <input 
                        type="number" 
                        class="form-control {{ !$errors->has('tax')?'':'border-danger' }}" 
                        name="tax" 
                        id="tax" 
                        value="{{ old('tax', optional($data ?? null)->tax) }}" 
                    />
                    @error('tax')
                        <div class="error-message invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        @endif
        <div class="col-md-6 mb-3">
            <div class="form-check p-0">
                <input 
                    type="checkbox" 
                    name="status" 
                    id="status" 
                    class="form-check-input" 
                    value="true" {{ old('status', optional($data ?? null)->status)?'checked':'' }} 
                />
                <label for="status" class="custom-control-label">Status</label>
            </div>
            @if ($form === 'products')
                <div class="form-check p-0">
                    <input 
                        type="checkbox" 
                        name="trending" 
                        id="trending" 
                        class="form-check-input" 
                        value="true" {{ old('trending', optional($data ?? null)->trending)?'checked':'' }} 
                    />
                    <label for="trending" class="custom-control-label">trending</label>
                </div>
            @else
                <div class="form-check p-0">
                    <input 
                        type="checkbox" 
                        name="popular" 
                        id="popular" 
                        class="form-check-input" 
                        value="true" {{ old('popular', optional($data ?? null)->popular)?'checked':'' }} 
                    />
                    <label for="popular" class="custom-control-label">Popular</label>
                </div>
            @endif
        </div>
        <div class="col-md-12">
            <div class="input-group input-group-outline mb-3 {{ !$errors->has('meta_title')?'':'is-invalid' }}">
                <label class="form-label">Meta title</label>
                <input 
                    type="text" 
                    name="meta_title" 
                    id="meta_title" 
                    class="form-control {{ !$errors->has('meta_title')?'':'border-danger' }}" 
                    value="{{ old('meta_title', optional($data ?? null)->meta_title) }}" 
                />
                @error('meta_title')
                    <div class="error-message invalid-feedback d-block">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-md-12">
            <div class="input-group input-group-outline mb-3 {{ !$errors->has('meta_description')?'':'is-invalid' }}">
                <textarea 
                    name="meta_description" 
                    id="meta_description" 
                    cols="30" 
                    rows="5" 
                    class="form-control {{ !$errors->has('meta_description')?'':'border-danger' }}" 
                    placeholder="Meta description"
                >{{ old('meta_description', optional($data ?? null)->meta_descrip) }}</textarea>
                @error('meta_description')
                    <div class="error-message invalid-feedback d-block">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-md-12">
            <div class="input-group input-group-outline mb-3 {{ !$errors->has('meta_keywords')?'':'is-invalid' }}">
                <textarea 
                    name="meta_keywords" 
                    id="meta_keywords" 
                    cols="30" 
                    rows="5" 
                    class="form-control {{ !$errors->has('meta_keywords')?'':'border-danger' }}" 
                    placeholder="Meta keywords"
                >{{ old('meta_keywords', optional($data ?? null)->meta_keywords) }}</textarea>
                @error('meta_keywords')
                    <div class="error-message invalid-feedback d-block">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-md-12">
            <div class="mb-3 input-group input-group-outline">
                <input 
                    type="file" 
                    name="image" 
                    id="image" 
                    class="form-control {{ !$errors->has('image')?'':'border-danger' }}" 
                />
                @error('image')
                    <div class="error-message invalid-feedback d-block">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-md-12">
            <div class="mb-3">
                <button type="submit" class="btn btn-primary text-uppercase">Submit</button>
            </div>
        </div>
    </div>
</div>