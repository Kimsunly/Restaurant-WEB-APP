@extends('layouts.admin')
@section('title', 'Dashboard')

@section('content')
    <section class="admin-content-shell admin-dashboard-shell">
        <div class="container">
            <div class="row align-items-stretch">
                <div class="col-lg-7 mb-4 mb-lg-0">
                    <div class="admin-hero-card h-100 p-4 p-lg-5">
                        <div class="position-relative">
                            <span class="admin-chip">Admin dashboard</span>
                            <h1 class="mt-3 mb-3">Feane content control center</h1>
                            <p class="mb-4" style="color:#666666; max-width: 620px;">
                                Keep the restaurant menu and homepage slides aligned with the public Feane look.
                                Use the quick actions below to jump into the content you need.
                            </p>

                            <div class="admin-toolbar mb-4">
                                <a href="{{ route('admin.menus.index') }}" class="admin-mini-btn">Manage Menus</a>
                                <a href="{{ route('admin.slides.index') }}" class="admin-action-link secondary">Manage Slides</a>
                                <a href="{{ route('home') }}" target="_blank" rel="noreferrer" class="admin-action-link secondary">View Public Site</a>
                            </div>

                            <div class="row">
                                <div class="col-sm-6 mb-3">
                                    <div class="admin-stat">
                                        <div class="label">Total menus</div>
                                        <p class="value">{{ $menuCount }}</p>
                                        <div class="meta">All items currently stored in the catalog.</div>
                                    </div>
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <div class="admin-stat">
                                        <div class="label">Active menus</div>
                                        <p class="value">{{ $activeMenuCount }}</p>
                                        <div class="meta">Visible on the public food section.</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="admin-preview-card h-100 p-4 p-lg-5">
                        <span class="admin-chip mb-3">At a glance</span>
                        <h4 class="mb-4" style="color:#222831;">Current content status</h4>

                        <div class="row">
                            <div class="col-6 mb-3">
                                <div class="admin-stat p-3">
                                    <div class="label">Slides</div>
                                    <p class="value">{{ $slideCount }}</p>
                                </div>
                            </div>
                            <div class="col-6 mb-3">
                                <div class="admin-stat p-3">
                                    <div class="label">Active slides</div>
                                    <p class="value">{{ $activeSlideCount }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="mt-2">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5 class="mb-0" style="color:#222831;">Recent menus</h5>
                                <a href="{{ route('admin.menus.index') }}">View all</a>
                            </div>

                            @forelse($recentMenus as $menu)
                                <div class="d-flex align-items-center mb-3 pb-3" style="border-bottom:1px solid #f0eadf;">
                                    @if($menu->image)
                                        <img src="{{ asset('storage/' . $menu->image) }}" alt="{{ $menu->name }}" class="admin-thumb mr-3">
                                    @else
                                        <div class="admin-thumb mr-3 d-flex align-items-center justify-content-center" style="background:#f6f1e7; color:#b28a29; font-weight:700;">
                                            {{ strtoupper(substr($menu->name, 0, 1)) }}
                                        </div>
                                    @endif
                                    <div class="flex-grow-1">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <strong style="color:#222831;">{{ $menu->name }}</strong>
                                            <span class="admin-chip" style="padding:4px 10px;">{{ ucfirst($menu->category) }}</span>
                                        </div>
                                        <div class="text-muted small">${{ number_format($menu->price, 2) }}</div>
                                    </div>
                                </div>
                            @empty
                                <div class="admin-empty">No menu items yet.</div>
                            @endforelse
                        </div>

                        <div class="mt-4">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5 class="mb-0" style="color:#222831;">Recent slides</h5>
                                <a href="{{ route('admin.slides.index') }}">View all</a>
                            </div>

                            @forelse($recentSlides as $slide)
                                <div class="d-flex align-items-center mb-3 pb-3" style="border-bottom:1px solid #f0eadf;">
                                    @if($slide->image)
                                        <img src="{{ asset('storage/' . $slide->image) }}" alt="{{ $slide->title }}" class="admin-thumb mr-3">
                                    @else
                                        <div class="admin-thumb mr-3 d-flex align-items-center justify-content-center" style="background:#f6f1e7; color:#b28a29; font-weight:700;">
                                            S
                                        </div>
                                    @endif
                                    <div class="flex-grow-1">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <strong style="color:#222831;">{{ $slide->title }}</strong>
                                            <span class="admin-chip" style="padding:4px 10px;">#{{ $slide->sort_order }}</span>
                                        </div>
                                        <div class="text-muted small">{{ \Illuminate\Support\Str::limit($slide->subtitle, 52) }}</div>
                                    </div>
                                </div>
                            @empty
                                <div class="admin-empty">No slides yet.</div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4 mt-lg-5">
                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="admin-stat text-center">
                        <div class="label">Total menus</div>
                        <p class="value">{{ $menuCount }}</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="admin-stat text-center">
                        <div class="label">Active menus</div>
                        <p class="value">{{ $activeMenuCount }}</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="admin-stat text-center">
                        <div class="label">Total slides</div>
                        <p class="value">{{ $slideCount }}</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="admin-stat text-center">
                        <div class="label">Active slides</div>
                        <p class="value">{{ $activeSlideCount }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
