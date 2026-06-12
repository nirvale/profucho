<div class="flex flex-wrap  gap-4 items-center justify-center">
  {{-- {{dd($groups)}} --}}
  @foreach ($groups as $group => $members)
    <x-dashboard.group :group="$group" :members="$members" />
  @endforeach
</div>
