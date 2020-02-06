@php
    /** @var \App\Services\SidebarItem $sidebarItem */
@endphp
@canany($sidebarItem->getPermissions())
    <li>
        @if ($sidebarItem->hasChildren() && !$sidebarItem->hasSameControllerWithRoute())
            <div class="toggle"><i class="fas fa-angle-down"></i></div>
        @endif
        <a href="{{ route($sidebarItem->getRouteName()) }}"
           @if ($sidebarItem->hasSameControllerWithRoute()) class='active' @endif>
            <div class="icon">
                <i class="{{ $sidebarItem->getIcon() }}"></i>
            </div>
            <div class="text">
                {{ $sidebarItem->getText() }}
            </div>
        </a>
        @if($sidebarItem->hasChildren())
            <div class="children @if(!$sidebarItem->hasSameControllerWithRoute()) sliding @endif">
                @php
                    /** @var \App\Services\SidebarItem $child */
                @endphp
                @foreach($sidebarItem->getChildren() as $child)
                    @canany($child->getPermissions())
                        <a href="{{ route($child->getRouteName()) }}"
                           @if($child->ownRoute()) class="active" @endif
                        >
                            <div class="icon">
                                <i class="{{ $child->getIcon() }}"></i>
                            </div>
                            <div class="text">
                                {{ $child->getText() }}
                            </div>
                        </a>
                    @endif
                @endforeach
            </div>
        @endif
    </li>
@endcan