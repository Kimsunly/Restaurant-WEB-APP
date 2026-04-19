@extends('layouts.admin')
@section('title', 'Add Slide')

@section('content')
    <section class="admin-content-shell">
        <div class="container">
            <div class="admin-section-title">
                <div>
                    <span class="admin-chip">Homepage carousel</span>
                    <h2>Add New Slide</h2>
                    <p>Add a hero message and button text that will appear on the public homepage slider.</p>
                </div>
                <a href="{{ route('admin.slides.index') }}" class="admin-action-link secondary">← Back</a>
            </div>

            <div class="row">
                <div class="col-lg-8 mb-4 mb-lg-0">
                    <div class="admin-form-card p-4 p-lg-5">
                        <form action="{{ route('admin.slides.store') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label>Title *</label>
                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                                    value="{{ old('title') }}">
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Subtitle</label>
                                <textarea name="subtitle" class="form-control @error('subtitle') is-invalid @enderror"
                                    rows="4">{{ old('subtitle') }}</textarea>
                                @error('subtitle')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Button Text</label>
                                        <input type="text" name="button_text" class="form-control"
                                            value="{{ old('button_text', 'Order Now') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Sort Order</label>
                                        <input type="number" name="sort_order" class="form-control"
                                            value="{{ old('sort_order', 0) }}">
                                        <small class="form-text text-muted">Lower numbers show first in the
                                            carousel.</small>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group custom-control custom-checkbox">
                                <input type="checkbox" name="is_active" class="custom-control-input" id="is_active" checked>
                                <label class="custom-control-label" for="is_active">Active (visible on home page)</label>
                            </div>

                            <button type="submit" class="admin-mini-btn border-0">Save Slide</button>
                        </form>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="admin-preview-card p-4 p-lg-5 h-100">
                        <span class="admin-chip mb-3">Tips</span>
                        <h4 style="color:#222831;">Carousel friendly</h4>
                        <p class="mt-3" style="color:#666666;">
                            Keep the title short and the subtitle readable so the homepage carousel stays clean and close
                            to the original Feane layout.
                        </p>
                        <div class="mt-4 p-3" style="background:#fffaf0; border-radius:18px; border:1px solid #f0e2bf;">
                            <strong style="color:#222831;">Recommended order</strong>
                            <div class="admin-field-help mt-2">Place the strongest hero message first, then continue with
                                secondary promotions.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection