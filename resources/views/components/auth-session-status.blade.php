@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'fw-medium text-success text-opacity-75']) }}>
        {{ $status }}
    </div>
@endif
