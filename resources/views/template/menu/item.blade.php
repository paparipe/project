<div class="item {{$i->active ? 'active' : ''}} {{$i->sub?->open ? "open" : ''}}">

    <a {!!$i->route ? 'href="' . $i->route . '"': ''!!} {{$i->external ? 'target="_blank"' : ''}}>
        {{$i->label}}
    </a>

    @if ($i->external)
        <i class="fa-solid fa-arrow-up-right-from-square external"></i>
    @endif

    @if ($i->sub)

        <i class="fa-solid fa-chevron-up toggle"></i>

        @include('template.menu.main', ['menu' => $i->sub])

    @endif

</div>