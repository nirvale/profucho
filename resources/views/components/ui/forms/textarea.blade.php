@props(['label'=>'','isOptional'=>false,'model'])
<div class="">
  <fieldset class="fieldset">
    <legend class="fieldset-legend">{{$label}}</legend>
    <textarea {{$attributes->merge(['class'=>'grow textarea h-24'. ($errors->has($model) ? ' input-error' : '')])}} id={{$model}} name={{$model}}></textarea>
    @if ($isOptional)
      <span class="badge badge-neutral badge-xs">{{__('Optional')}}</span>
    @endif
  </fieldset>
  <x-ui.forms.input-error for={{$model}} />

</div>
