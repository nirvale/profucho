@props(['modalId','status','title','content','icon'])

<dialog id="{{'modal'.ucfirst($modalId)}}" class="modal {{$status}}">
  <div class="modal-box w-4/5 max-w-3xl bg-base-300 ">
    <h3 class="flex items-center justify-center text-2xl  font-bold">{!! $icon !!} &nbsp; {{$title}}</h3>
    {{$notext ?? ''}}
    <p class="py-4">{{$slot}}</p>
    <div class="modal-action justify-center items-center">
      <form method="dialog" class="flex flex-col sm:flex-row gap-3 justify-center items-center">
        <!-- if there is a button, it will close the modal -->
        {{ $buttons ?? '' }}

      </form>

  </div>
</dialog>
