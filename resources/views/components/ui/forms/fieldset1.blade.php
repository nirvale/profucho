@props(['title'=>''])
<div>
  <fieldset  {{$attributes->merge(['class'=>'fieldset bg-base-200 border-base-300 rounded-sm border p-4'])}} >
    <legend class="fieldset-legend text-lg">{{$title}}</legend>
    {{$slot}}
  </fieldset>
</div>
