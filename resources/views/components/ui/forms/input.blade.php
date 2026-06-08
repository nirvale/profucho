@props(['label'=>'','isOptional'=>false,'model'])
<div class="">
  <label for={{$model}} class="fieldset-legend ">{{$label}}</label>
  <label class="input w-full rounded-sm @error($model) input-error @enderror">
  {{$icon ?? ''}}
    <input {{$attributes->merge(['class'=>'grow'])}} id={{$model}} name={{$model}} autocomplete="off"/>
    @if ($isOptional)
      <span class="badge badge-neutral badge-xs">{{__('Optional')}}</span>
    @endif
  </label>
  <x-ui.forms.input-error for={{$model}} />
</div>
