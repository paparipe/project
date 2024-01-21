<div id="{{$menu->id}}" class="menu" {!!!$menu->open ? 'style="display: none;"' : ''!!}>
    @foreach ($menu->items as $i)
        @include('template.menu.item', ['item' => $i])
    @endforeach
</div>