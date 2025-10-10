@extends('layouts.admin')

@section('title', 'About Page Settings - VIS GmbH')
@section('page-title', 'About Page Settings')
@section('page-subtitle', 'Manage your About page content and sections')

@section('header-actions')
    <a href="{{ route('about') }}" class="btn btn-outline-primary" target="_blank">
        <i class="fas fa-external-link-alt me-1"></i>View About Page
    </a>
@endsection

@section('content')
<form action="{{ route('admin.about-page.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <!-- Page Meta Settings -->
    <div class="card mb-4">
        <div class="card-header">
            <h5 class="mb-0"><i class="fas fa-cog me-2"></i>Page Meta Information</h5>
        </div>
        <div class="card-body">
            @foreach($settings['meta'] ?? [] as $setting)
                <div class="mb-3">
                    <label for="{{ $setting->key }}" class="form-label">{{ ucwords(str_replace('_', ' ', str_replace('page_', '', str_replace('meta_', '', $setting->key)))) }}</label>
                    @if($setting->type === 'textarea')
                        <textarea name="settings[{{ $setting->key }}]" id="{{ $setting->key }}" class="form-control" rows="3">{{ old('settings.'.$setting->key, $setting->value) }}</textarea>
                    @else
                        <input type="text" name="settings[{{ $setting->key }}]" id="{{ $setting->key }}" class="form-control" value="{{ old('settings.'.$setting->key, $setting->value) }}">
                    @endif
                </div>
            @endforeach
        </div>
    </div>

    <!-- Welcome Section -->
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0"><i class="fas fa-home me-2"></i>Welcome Section</h5>
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" name="settings[welcome_show]" id="welcome_show" {{ ($settings['welcome']->firstWhere('key', 'welcome_show')->value ?? '1') == '1' ? 'checked' : '' }}>
                <label class="form-check-label" for="welcome_show">Show Section</label>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                @foreach($settings['welcome'] ?? [] as $setting)
                    @if($setting->key !== 'welcome_show')
                        <div class="col-md-{{ $setting->type === 'textarea' ? '12' : '6' }} mb-3">
                            <label for="{{ $setting->key }}" class="form-label">
                                {{ ucwords(str_replace('_', ' ', str_replace('welcome_', '', $setting->key))) }}
                            </label>

                            @if($setting->type === 'textarea')
                                <textarea name="settings[{{ $setting->key }}]" id="{{ $setting->key }}" class="form-control" rows="4">{{ old('settings.'.$setting->key, $setting->value) }}</textarea>
                            @elseif($setting->type === 'image')
                                <input type="file" name="settings[{{ $setting->key }}]" id="{{ $setting->key }}" class="form-control" accept="image/*">
                                @if($setting->value)
                                    <div class="mt-2">
                                        <img src="{{ \App\Models\AboutPageSetting::getImageUrl($setting->key, $setting->value) }}" alt="Preview" class="img-thumbnail" style="max-height: 100px;">
                                    </div>
                                @endif
                            @else
                                <input type="text" name="settings[{{ $setting->key }}]" id="{{ $setting->key }}" class="form-control" value="{{ old('settings.'.$setting->key, $setting->value) }}">
                            @endif
                            <small class="text-muted">Current: {{ $setting->value }}</small>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0"><i class="fas fa-star me-2"></i>Features Section</h5>
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" name="settings[features_show]" id="features_show" {{ ($settings['features']->firstWhere('key', 'features_show')->value ?? '1') == '1' ? 'checked' : '' }}>
                <label class="form-check-label" for="features_show">Show Section</label>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <!-- Feature 1 -->
                <div class="col-md-4 mb-4">
                    <h6 class="border-bottom pb-2">Feature 1</h6>
                    @foreach(['feature_1_icon', 'feature_1_title', 'feature_1_content'] as $key)
                        @php $setting = $settings['features']->firstWhere('key', $key); @endphp
                        @if($setting)
                            <div class="mb-3">
                                <label for="{{ $key }}" class="form-label">{{ ucwords(str_replace('_', ' ', str_replace('feature_1_', '', $key))) }}</label>
                                @if($setting->type === 'image')
                                    <input type="file" name="settings[{{ $key }}]" id="{{ $key }}" class="form-control" accept="image/*">
                                    @if($setting->value)
                                        <div class="mt-2">
                                            <img src="{{ \App\Models\AboutPageSetting::getImageUrl($setting->key, $setting->value) }}" alt="Preview" class="img-thumbnail" style="max-height: 60px;">
                                        </div>
                                    @endif
                                @elseif($setting->type === 'textarea')
                                    <textarea name="settings[{{ $key }}]" id="{{ $key }}" class="form-control" rows="3">{{ old('settings.'.$key, $setting->value) }}</textarea>
                                @else
                                    <input type="text" name="settings[{{ $key }}]" id="{{ $key }}" class="form-control" value="{{ old('settings.'.$key, $setting->value) }}">
                                @endif
                            </div>
                        @endif
                    @endforeach
                </div>

                <!-- Feature 2 -->
                <div class="col-md-4 mb-4">
                    <h6 class="border-bottom pb-2">Feature 2</h6>
                    @foreach(['feature_2_icon', 'feature_2_title', 'feature_2_content'] as $key)
                        @php $setting = $settings['features']->firstWhere('key', $key); @endphp
                        @if($setting)
                            <div class="mb-3">
                                <label for="{{ $key }}" class="form-label">{{ ucwords(str_replace('_', ' ', str_replace('feature_2_', '', $key))) }}</label>
                                @if($setting->type === 'image')
                                    <input type="file" name="settings[{{ $key }}]" id="{{ $key }}" class="form-control" accept="image/*">
                                    @if($setting->value)
                                        <div class="mt-2">
                                            <img src="{{ \App\Models\AboutPageSetting::getImageUrl($setting->key, $setting->value) }}" alt="Preview" class="img-thumbnail" style="max-height: 60px;">
                                        </div>
                                    @endif
                                @elseif($setting->type === 'textarea')
                                    <textarea name="settings[{{ $key }}]" id="{{ $key }}" class="form-control" rows="3">{{ old('settings.'.$key, $setting->value) }}</textarea>
                                @else
                                    <input type="text" name="settings[{{ $key }}]" id="{{ $key }}" class="form-control" value="{{ old('settings.'.$key, $setting->value) }}">
                                @endif
                            </div>
                        @endif
                    @endforeach
                </div>

                <!-- Feature 3 -->
                <div class="col-md-4 mb-4">
                    <h6 class="border-bottom pb-2">Feature 3</h6>
                    @foreach(['feature_3_icon', 'feature_3_title', 'feature_3_content'] as $key)
                        @php $setting = $settings['features']->firstWhere('key', $key); @endphp
                        @if($setting)
                            <div class="mb-3">
                                <label for="{{ $key }}" class="form-label">{{ ucwords(str_replace('_', ' ', str_replace('feature_3_', '', $key))) }}</label>
                                @if($setting->type === 'image')
                                    <input type="file" name="settings[{{ $key }}]" id="{{ $key }}" class="form-control" accept="image/*">
                                    @if($setting->value)
                                        <div class="mt-2">
                                            <img src="{{ \App\Models\AboutPageSetting::getImageUrl($setting->key, $setting->value) }}" alt="Preview" class="img-thumbnail" style="max-height: 60px;">
                                        </div>
                                    @endif
                                @elseif($setting->type === 'textarea')
                                    <textarea name="settings[{{ $key }}]" id="{{ $key }}" class="form-control" rows="3">{{ old('settings.'.$key, $setting->value) }}</textarea>
                                @else
                                    <input type="text" name="settings[{{ $key }}]" id="{{ $key }}" class="form-control" value="{{ old('settings.'.$key, $setting->value) }}">
                                @endif
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Experience Section -->
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0"><i class="fas fa-award me-2"></i>Experience Section</h5>
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" name="settings[experience_show]" id="experience_show" {{ ($settings['experience']->firstWhere('key', 'experience_show')->value ?? '1') == '1' ? 'checked' : '' }}>
                <label class="form-check-label" for="experience_show">Show Section</label>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                @foreach($settings['experience'] ?? [] as $setting)
                    @if($setting->key !== 'experience_show')
                        <div class="col-md-{{ in_array($setting->type, ['textarea']) ? '12' : '6' }} mb-3">
                            <label for="{{ $setting->key }}" class="form-label">
                                {{ ucwords(str_replace('_', ' ', str_replace('experience_', '', $setting->key))) }}
                            </label>

                            @if($setting->type === 'textarea')
                                <textarea name="settings[{{ $setting->key }}]" id="{{ $setting->key }}" class="form-control" rows="4">{{ old('settings.'.$setting->key, $setting->value) }}</textarea>
                            @elseif($setting->type === 'image')
                                <input type="file" name="settings[{{ $setting->key }}]" id="{{ $setting->key }}" class="form-control" accept="image/*">
                                @if($setting->value)
                                    <div class="mt-2">
                                        <img src="{{ \App\Models\AboutPageSetting::getImageUrl($setting->key, $setting->value) }}" alt="Preview" class="img-thumbnail" style="max-height: 100px;">
                                    </div>
                                @endif
                            @elseif($setting->type === 'number')
                                <input type="number" name="settings[{{ $setting->key }}]" id="{{ $setting->key }}" class="form-control" value="{{ old('settings.'.$setting->key, $setting->value) }}">
                            @else
                                <input type="text" name="settings[{{ $setting->key }}]" id="{{ $setting->key }}" class="form-control" value="{{ old('settings.'.$setting->key, $setting->value) }}">
                            @endif
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>

    <!-- Fun Facts Section -->
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0"><i class="fas fa-chart-bar me-2"></i>Fun Facts Section</h5>
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" name="settings[funfacts_show]" id="funfacts_show" {{ ($settings['funfacts']->firstWhere('key', 'funfacts_show')->value ?? '1') == '1' ? 'checked' : '' }}>
                <label class="form-check-label" for="funfacts_show">Show Section</label>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                @foreach(range(1, 4) as $num)
                    <div class="col-md-3 mb-4">
                        <h6 class="border-bottom pb-2">Fun Fact {{ $num }}</h6>
                        @foreach(['icon', 'number', 'label'] as $field)
                            @php
                                $key = "funfact_{$num}_{$field}";
                                $setting = $settings['funfacts']->firstWhere('key', $key);
                            @endphp
                            @if($setting)
                                <div class="mb-3">
                                    <label for="{{ $key }}" class="form-label">{{ ucwords($field) }}</label>
                                    @if($setting->type === 'image')
                                        <input type="file" name="settings[{{ $key }}]" id="{{ $key }}" class="form-control" accept="image/*">
                                        @if($setting->value)
                                            <div class="mt-2">
                                                <img src="{{ \App\Models\AboutPageSetting::getImageUrl($setting->key, $setting->value) }}" alt="Preview" class="img-thumbnail" style="max-height: 40px;">
                                            </div>
                                        @endif
                                    @elseif($setting->type === 'number')
                                        <input type="number" name="settings[{{ $key }}]" id="{{ $key }}" class="form-control" value="{{ old('settings.'.$key, $setting->value) }}">
                                    @else
                                        <input type="text" name="settings[{{ $key }}]" id="{{ $key }}" class="form-control" value="{{ old('settings.'.$key, $setting->value) }}">
                                    @endif
                                </div>
                            @endif
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Other Sections Visibility -->
    <div class="card mb-4">
        <div class="card-header">
            <h5 class="mb-0"><i class="fas fa-eye me-2"></i>Section Visibility</h5>
        </div>
        <div class="card-body">
            <div class="row">
                @foreach($settings['sections'] ?? [] as $setting)
                    <div class="col-md-4 mb-3">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="settings[{{ $setting->key }}]" id="{{ $setting->key }}" {{ $setting->value == '1' ? 'checked' : '' }}>
                            <label class="form-check-label" for="{{ $setting->key }}">
                                {{ ucwords(str_replace('_', ' ', str_replace('_show', '', $setting->key))) }} Section
                            </label>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="text-end mb-4">
        <button type="submit" class="btn btn-primary">
            <i class="fas fa-save me-1"></i>Save All Changes
        </button>
    </div>
</form>
@endsection

