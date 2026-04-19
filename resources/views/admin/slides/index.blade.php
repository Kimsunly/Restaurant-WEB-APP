@extends('layouts.admin')
@section('title', 'Manage Slides')

@section('content')
    <section class="admin-content-shell">
        <div class="container">
            <div class="admin-section-title dark">
                <div>
                    <span class="admin-chip">Homepage carousel</span>
                    <h2>Home Slides</h2>
                    <p>Control the hero text, order, and button labels shown on the public homepage.</p>
                </div>
                <a href="{{ route('admin.slides.create') }}" class="admin-action-link primary">+ Add New Slide</a>
            </div>

            <div class="admin-table-card">
                <div class="table-responsive">
                    <table class="table admin-table mb-0">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Subtitle</th>
                                <th>Button Text</th>
                                <th>Sort Order</th>
                                <th>Active</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($slides as $slide)
                                <tr>
                                    <td>
                                        <strong style="color:#222831;">{{ $slide->title }}</strong>
                                    </td>
                                    <td>
                                        <div class="text-muted small">{{ \Illuminate\Support\Str::limit($slide->subtitle, 56) }}
                                        </div>
                                    </td>
                                    <td>{{ $slide->button_text }}</td>
                                    <td><span class="admin-chip">{{ $slide->sort_order }}</span></td>
                                    <td>
                                        @if($slide->is_active)
                                            <span class="badge badge-success">Active</span>
                                        @else
                                            <span class="badge badge-secondary">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="admin-toolbar">
                                            <a href="{{ route('admin.slides.edit', $slide) }}"
                                                class="admin-action-link secondary">Edit</a>
                                            <form action="{{ route('admin.slides.destroy', $slide) }}" method="POST"
                                                class="d-inline"
                                                onsubmit="return confirm('Are you sure you want to delete this slide?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="admin-mini-btn border-0" type="submit"
                                                    style="padding:10px 16px;">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">
                                        <div class="admin-empty">
                                            <h4 style="color:#222831;">No slides yet.</h4>
                                            <p class="mb-3">Add a slide so the homepage carousel has content to show.</p>
                                            <a href="{{ route('admin.slides.create') }}" class="admin-mini-btn">Add one
                                                now</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="px-4 py-3 border-top" style="border-color:#f0eadf !important;">
                    {{ $slides->links() }}
                </div>
            </div>
        </div>
    </section>
@endsection