@props(['height', 'width', 'source'])

<div>
    <img {{$attributes->merge([])}} src="{{$source}}" />
</div>