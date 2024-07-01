@extends('layouts.app')
@section('title')
    Home
@endsection
@section('content')
    <div class="container py-4">
        <div class="mb-5">
            <div class="h4 text-primary mb-3">
                Locations
            </div>
            <div class="row g-3">
                @foreach ($locations as $Location)
                    <div class="col">
                        <div class="border rounded p-2">
                            <div class="h6 mb-0">
                                <a href="{{ route('homes.index', ['location' => $location->id]) }}"
                                    class="link-dark text-decoration-none">
                                    {{ $location->name }}
                                </a>
                                <span class="badge bg-warning-subtle text-warning-emphasis rounded-pill">
                                    {{ $location->homes_count }}
                                </span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div>
            <div class="h4 text-primary mb-3">
                Styles
            </div>
            <div class="row g-3">
                @foreach ($styles as $style)
                    <div class="col">
                        <div class="border rounded p-2">
                            <div class="h6">
                                <a href="{{ route('homes.index', ['$style' => $style->id]) }}"
                                    class="link-dark text-decoration-none">
                                    {{ $style->name }}
                                </a>
                                <span class="badge bg-warning-subtle text-warning-emphasis rounded-pill">
                                    {{ $style->homes_count }}
                                </span>
                            </div>
                            <div>
                                @foreach ($styles->styleinterior as $styleinterior)
                                    <div>
                                        <a href="{{ route('homes.index', ['styleinterior' => $styleinterior->id]) }}"
                                            class="link-dark text-decoration-none">
                                            {{ $styleinterior->name }}
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
