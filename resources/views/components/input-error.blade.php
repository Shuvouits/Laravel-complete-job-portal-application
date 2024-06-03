@props(['messages'])

@if ($messages)
    <div {{ $attributes->merge(['class' => 'text-sm text-red-600 space-y-1']) }}>
        @foreach ((array) $messages as $message)
            <p style="#6777ef">{{ $message }}</p>
        @endforeach
    </div>
@endif



{{--
    
    
  @if ($messages)
    <ul {{ $attributes->merge(['class' => 'text-sm text-red-600 space-y-1']) }}>
        @foreach ((array) $messages as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
@endif  
    
    --}}
