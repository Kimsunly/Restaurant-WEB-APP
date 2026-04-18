@extends('layouts.admin')
@section('title', 'Manage Menus')

@section('content')
    <section class="admin-content-shell">
        <div class="container">
            <div class="admin-section-title dark">
                <div>
                    <span class="admin-chip">Menu catalog</span>
                    <h2>Menu Items</h2>
                    <p>Keep the public menu fresh with clear pricing, images, and visibility controls.</p>
                </div>
                <a href="{{ route('admin.menus.create') }}" class="admin-action-link primary">+ Add New Item</a>
            </div>

            <div class="admin-table-card">
                <div class="table-responsive">
                    <table class="table admin-table mb-0">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Active</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($menus as $menu)
                                <tr>
                                    <td>
                                        @if($menu->image)
                                            <img src="{{ asset('storage/' . $menu->image) }}" alt="{{ $menu->name }}"
                                                class="admin-thumb">
                                        @else
                                            <div class="admin-thumb d-flex align-items-center justify-content-center"
                                                style="background:#f6f1e7; color:#b28a29; font-weight:700;">
                                                N/A
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        <strong style="color:#222831;">{{ $menu->name }}</strong>
                                        @if($menu->description)
                                            <div class="text-muted small mt-1">
                                                {{ \Illuminate\Support\Str::limit($menu->description, 58) }}</div>
                                        @endif
                                    </td>
                                    <td><span class="admin-chip">{{ ucfirst($menu->category) }}</span></td>
                                    <td><strong style="color:#222831;">${{ number_format($menu->price, 2) }}</strong></td>
                                    <td>
                                        @if($menu->is_active)
                                            <span class="badge badge-success">Active</span>
                                        @else
                                            <span class="badge badge-secondary">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="admin-toolbar">
                                            <a href="{{ route('admin.menus.edit', $menu) }}"
                                                class="admin-action-link secondary">Edit</a>
                                            <form action="{{ route('admin.menus.destroy', $menu) }}" method="POST"
                                                class="d-inline"
                                                onsubmit="return confirm('Are you sure you want to delete this item?')">
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
                                            <h4 style="color:#222831;">No menu items yet.</h4>
                                            <p class="mb-3">Create the first dish so it appears on the public menu page.</p>
                                            <a href="{{ route('admin.menus.create') }}" class="admin-mini-btn">Add one
                                                now</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="px-4 py-3 border-top" style="border-color:#f0eadf !important;">
                    {{ $menus->links() }}
                </div>
            </div>
        </div>
    </section>
@endsection
