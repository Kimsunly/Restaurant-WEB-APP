@extends('layouts.admin')
@section('title', 'Edit Menu Item')

@section('content')
    <section class="admin-content-shell">
        <div class="container">
            <div class="admin-section-title">
                <div>
                    <span class="admin-chip">Menu catalog</span>
                    <h2>Edit Menu Item</h2>
                    <p>Adjust the item details and image while keeping the public menu consistent.</p>
                </div>
                <a href="{{ route('admin.menus.index') }}" class="admin-action-link secondary">← Back</a>
            </div>

            <div class="row">
                <div class="col-lg-8 mb-4 mb-lg-0">
                    <div class="admin-form-card p-4 p-lg-5">
                        <form action="{{ route('admin.menus.update', $menu) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group admin-form-field">
                                <label>Name *</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name', $menu->name) }}">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group admin-form-field">
                                <label>Description</label>
                                <textarea name="description" class="form-control @error('description') is-invalid @enderror"
                                    rows="4">{{ old('description', $menu->description) }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6 pr-md-2">
                                    <div class="form-group admin-form-field mb-0">
                                        <label>Price *</label>
                                        <input type="number" step="0.01" min="0" inputmode="decimal" name="price"
                                            class="form-control @error('price') is-invalid @enderror"
                                            value="{{ old('price', $menu->price) }}">
                                        @error('price')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 pl-md-2">
                                    <div class="form-group admin-form-field mb-0">
                                        <label class="d-block">Category *</label>
                                        <select name="category"
                                            class="form-control admin-select-field @error('category') is-invalid @enderror">
                                            @foreach(['burger', 'pizza', 'pasta', 'fries'] as $cat)
                                                <option value="{{ $cat }}" {{ old('category', $menu->category) === $cat ? 'selected' : '' }}>{{ ucfirst($cat) }}</option>
                                            @endforeach
                                        </select>
                                        @error('category')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group admin-upload-box admin-form-field">
                                @if($menu->image)
                                    <label class="d-block">Current Image</label>
                                    <img src="{{ asset('storage/' . $menu->image) }}" alt="{{ $menu->name }}"
                                        class="admin-preview-image mb-3" id="menuCurrentImage"
                                        style="max-width: 260px; max-height: 200px;">
                                @endif
                                <label>{{ $menu->image ? 'Replace Image' : 'Image' }}</label>
                                <input type="file" name="image"
                                    class="admin-file-input @error('image') is-invalid @enderror" accept="image/*"
                                    id="menuImageInput">
                                <div class="admin-image-preview-wrap mt-3">
                                    <img id="menuImagePreview" class="admin-preview-image d-none"
                                        alt="Selected menu image preview">
                                    <div id="menuImagePlaceholder" class="admin-image-preview-placeholder">
                                        Choose a new image to preview it here.
                                    </div>
                                </div>
                                @error('image')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                                <div class="admin-upload-help">Upload a different image if you want to replace the current
                                    one.</div>
                            </div>

                            <div class="form-group custom-control custom-checkbox">
                                <input type="checkbox" name="is_active" class="custom-control-input" id="is_active" {{ $menu->is_active ? 'checked' : '' }}>
                                <label class="custom-control-label" for="is_active">Active</label>
                            </div>

                            <button type="submit" class="admin-mini-btn border-0">Update Item</button>
                        </form>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="admin-preview-card p-4 p-lg-5 h-100">
                        <span class="admin-chip mb-3">Preview</span>
                        <h4 style="color:#222831;">{{ $menu->name }}</h4>
                        <p class="mt-2" style="color:#666666;">{{ $menu->description ?: 'No description added yet.' }}</p>
                        <div class="mt-4 p-3" style="background:#fffaf0; border-radius:18px; border:1px solid #f0e2bf;">
                            <div class="admin-field-help">Category: {{ ucfirst($menu->category) }}</div>
                            <div class="admin-field-help mt-1">Price: ${{ number_format($menu->price, 2) }}</div>
                            <div class="admin-field-help mt-1">Status: {{ $menu->is_active ? 'Active' : 'Inactive' }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('page-scripts')
    <script>
        (function () {
            var input = document.getElementById('menuImageInput');
            var preview = document.getElementById('menuImagePreview');
            var placeholder = document.getElementById('menuImagePlaceholder');

            if (!input || !preview || !placeholder) {
                return;
            }

            input.addEventListener('change', function () {
                var file = this.files && this.files[0];

                if (!file) {
                    preview.src = '';
                    preview.classList.add('d-none');
                    placeholder.classList.remove('d-none');
                    return;
                }

                var reader = new FileReader();

                reader.onload = function (event) {
                    preview.src = event.target.result;
                    preview.classList.remove('d-none');
                    placeholder.classList.add('d-none');
                };

                reader.readAsDataURL(file);
            });
        })();
    </script>
@endpush