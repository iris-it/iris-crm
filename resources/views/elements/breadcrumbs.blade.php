@if ($breadcrumbs)

    @foreach ($breadcrumbs as $breadcrumb)
        @if ($breadcrumb->first)
            <h1>{{ $breadcrumb->title }}</h1>
        @endif
    @endforeach

    <ol class="breadcrumb">
        @foreach ($breadcrumbs as $breadcrumb)
            @if (!$breadcrumb->last)
                <li><a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a></li>
            @else
                <li class="active">{{ $breadcrumb->title }}</li>
            @endif
        @endforeach
    </ol>

@endif