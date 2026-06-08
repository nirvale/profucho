@props(['for'])



      <p {{ $attributes->merge(['class' => 'text-error']) }}>@error($for){{ $message }}@enderror</p>
