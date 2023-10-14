@props(["data"=>"", "toolbar"=>"", "title"=>"", "subtitle"=>"", "module_name"=>"", "module_title"=>"", "module_icon"=>"", "module_action"=>""])

<div class="d-flex justify-content-between">
    <div>
        @if($slot != "")
        <h4 class="card-title mb-0">
            {{ $slot }}
        </h4>
        @else
        <h4 class="card-title mb-0">
            <i class="{{ $module_icon }}"></i> {{ __($module_title) }} <small class="text-muted">{{ __($module_action) }}</small>
        </h4>
        @endif

        @if($subtitle)
        <div class="small text-medium-emphasis">
            {{ $subtitle }}
        </div>
        @else
        <div class="small text-medium-emphasis">
            @lang(":module_name Management Dashboard", ['module_name'=>Str::title($module_name)])
        </div>
        @endif
    </div>
    @if($toolbar)
    <div class="btn-toolbar d-block text-end" role="toolbar" aria-label="Toolbar with buttons">
        {{ $toolbar }}
    </div>
    <a href="{{ route('frontend.users.profile', encode_id(auth()->user()->id)) }}" class="block px-4 py-2 text-sm text-gray-600 hover:bg-orange-600 hover:text-white" role="menuitem">
        <i class="fas fa-user fa-fw"></i>&nbsp;{{ Auth::user()->name }}
    </a>
    <a href="{{ route('frontend.users.profileEdit', encode_id(auth()->user()->id)) }}" class="block px-4 py-2 text-sm text-gray-600 hover:bg-orange-600 hover:text-white" role="menuitem">
        <i class="fas fa-cogs fa-fw"></i>&nbsp;{{__('Settings')}}
    </a>
    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="block px-4 py-2 text-sm text-gray-600 hover:bg-orange-600 hover:text-white" role="menuitem">
        {{__('Logout')}}
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
    @else
    <div class="btn-toolbar d-block text-end" role="toolbar" aria-label="Toolbar with buttons">
        @if (Str::endsWith(Route::currentRouteName(), 'create'))
        <x-backend.buttons.return-back small="true" />
        {{-- <a href='{{ route("backend.$module_name.index") }}' class="btn btn-secondary btn-sm ms-1" data-toggle="tooltip" title="{{ __($module_title) }} List"><i class="fas fa-list-ul"></i> List</a> --}}

        @elseif (Str::endsWith(Route::currentRouteName(), 'edit'))
        <x-backend.buttons.return-back small="true" />
        <x-buttons.show route='{!!route("backend.$module_name.show", $data)!!}' title="{{__('Show')}} {{ ucwords(Str::singular($module_name)) }}" class="ms-1" small="true" />

        @elseif (Str::endsWith(Route::currentRouteName(), 'show'))
        <x-backend.buttons.return-back small="true" />
        @can('edit_'.$module_name)
        <x-buttons.edit route='{!!route("backend.$module_name.edit", $data)!!}' title="{{__('Edit')}} {{ ucwords(Str::singular($module_name)) }}" class="m-1" small="true" />
        @endcan
        <a href="{{ route("backend.$module_name.index") }}" class="btn btn-secondary btn-sm" data-toggle="tooltip" title="{{ ucwords($module_name) }} List"><i class="fas fa-list"></i> List</a>
        @endif
    </div>
    @endif
</div>

<hr>