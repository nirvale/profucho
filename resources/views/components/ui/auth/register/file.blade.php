@props(['label','helper','model','isOptional'=>false])
<fieldset class="fieldset ">
  <legend  class="fieldset-legend text-xs">{{$label}}</legend>
  <input type="file" {{$attributes->merge(['class'=>'file-input rounded-sm'. ($errors->has($model) ? ' input-error' : '')])}} id={{$model}} name={{$model}} />

  <div class="flex justify-between items-center">
    @if ($isOptional)
      <span class="badge badge-neutral badge-xs">{{__('Optional')}}</span>
    @endif
    <label for="{{$model}}" class="label">{{$helper ?? ''}}</label>

  </div>

      <x-ui.forms.input-error for={{$model}} />
</fieldset>
