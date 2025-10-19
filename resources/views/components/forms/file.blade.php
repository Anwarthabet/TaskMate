@props(['label', 'name'])

@php
    $defaults = [
        'id' => $name,
        'name' => $name,
        'type' => 'file',
        'class' => 'rounded-xl bg-white/10 border border-grey/10 px-5 py-4 w-full',
    ];
@endphp

<x-forms.field :$label :$name>
    <input {{ $attributes($defaults) }}>
</x-forms.field>
