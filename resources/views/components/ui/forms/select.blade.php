@props(['label'=>'','isOptional'=>false,'model','legendDisabled','options','selected'])
<fieldset class="fieldset -mt-2">
  <legend class="fieldset-legend">{{$label}}</legend>
  <select {{$attributes->merge(['class'=>'select w-full rounded-sm'. ($errors->has($model) ? ' input-error' : '')])}} @if($options->isEmpty()) disabled @endif id={{$model}} name={{$model}} >
      <option @if ($options->count() > 1 || !$isOptional) disabled @endif value="" >@if($options->isEmpty()) {{__('No options available')}} @else {{$legendDisabled}} @endif</option>
      @foreach ($options as $option)
        @if (isset($selected) && $option->id==$selected)
          <option value="{{$option->id}}" selected>{{$option->name}}</option>
        @else
          <option value="{{$option->id}}">{{$option->name}}</option>
        @endif
      @endforeach
  </select>
  @if ($isOptional)
      <span class="label badge badge-neutral badge-xs">{{__('Optional')}}</span>
  @endif
  <x-ui.forms.input-error for={{$model}} />
</fieldset>
