@if (is_string($item))
<li class="header">{{ trans($item) }}</li>
@elseif (!isset($item['role']) || (isset($item['role']) && auth()->user()->hasRole($item['role'])))
<li class="{{ $item['class'] }}">
    <a href="{{ $item['href'] }}" @if (isset($item['target'])) target="{{ $item['target'] }}" @endif>
        <i class="fa fa-fw fa-{{ isset($item['icon']) ? $item['icon'] : 'circle-o' }} {{ isset($item['icon_color']) ? 'text-' . $item['icon_color'] : '' }}"></i>
        <span>{{ trans($item['text']) }}</span>
        @if (isset($item['label']))
        <span class="pull-right-container">
            <span class="label label-{{ isset($item['label_color']) ? $item['label_color'] : 'primary' }} pull-right">{{ trans($item['label']) }}</span>
        </span>
        @elseif (isset($item['submenu']))
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
        @endif
    </a>
    @if (isset($item['submenu']))
    <ul class="{{ $item['submenu_class'] }}">
        @each('jcrud::vendor.adminlte.partials.menu-item', $item['submenu'], 'item')
    </ul>
    @endif
</li>
@endif