<div>
    <div class="row mt-4">
        <div class="col">
            <input type="text" class="form-control my-2" placeholder=" Search" wire:model.live="searchTerm" />

            <div class="table-responsive">
                <table class="table table-hover table-responsive-sm" wire:loading.class="table-secondary">
                    <thead>
                        <tr class="justify-content-around text-center">
                            <th>{{ __('labels.backend.users.fields.name') }}</th>
                            <th>{{ __('labels.backend.users.fields.email') }}</th>
                            <th>{{ __('labels.backend.users.fields.status') }}</th>
                            <th>DID</th>
                            <th>Requested Type</th>
                            <th>{{ __('labels.backend.users.fields.permissions') }}</th>
                            <th>{{ __('labels.backend.users.fields.social') }}</th>
                            <!-- <th>{{ __('labels.backend.users.fields.roles') }}</th> -->
                            <th class="ms-2">{{ __('labels.backend.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr class="text-center">
                            <td>
                                <strong>
                                    <a href="{{route('backend.users.show', $user->id)}}">
                                        {{ $user->name }}
                                    </a>
                                </strong>
                            </td>
                            <td>{{ $user->email }}</td>
                            
                            <td>
                                {!! $user->status_label !!}
                                {!! $user->confirmed_label !!}
                            </td>
                            <td>{{ $user->mbbs_id }}</td>
                           
                            <td>{{ $user->user_type == 1  ? 'Doctor' : 'Patient' }}</td>
                            <td>
                                @if($user->getAllPermissions()->count() > 0)
                                <ul>
                                    @foreach ($user->getDirectPermissions() as $permission)
                                    <li>{{ $permission->name }}</li>
                                    @endforeach
                                </ul>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex flex-row flex-wrap gap-1">
                                    @foreach ($user->providers as $provider)
                                        <div class="d-flex align-items-center">
                                            <i class="fab fa-{{ $provider->provider }}"></i>
                                            {{ label_case($provider->provider) }}
                                        </div>
                                    @endforeach
                                </div>
                            </td>

                            <td>
                                <a href="{{route('backend.users.show', $user)}}" class="btn btn-success btn-sm mt-1" data-toggle="tooltip" title="{{__('labels.backend.show')}}"><i class="fas fa-desktop"></i></a>
                                @can('edit_users')
                                <a href="{{route('backend.users.edit', $user)}}" class="btn btn-primary btn-sm mt-1" data-toggle="tooltip" title="{{__('labels.backend.edit')}}"><i class="fas fa-wrench"></i></a>
                                <a href="{{route('backend.users.changePassword', $user)}}" class="btn btn-info btn-sm mt-1" data-toggle="tooltip" title="{{__('labels.backend.changePassword')}}"><i class="fas fa-key"></i></a>
                                @if ($user->status != 2)
                                <a href="{{route('backend.users.block', $user)}}" class="btn btn-warning btn-sm mt-1" data-method="PATCH" data-token="{{csrf_token()}}" data-toggle="tooltip" title="{{__('labels.backend.block')}}" data-confirm="Are you sure?"><i class="fas fa-ban"></i></a>
                                @endif
                                @if ($user->status == 2)
                                <a href="{{route('backend.users.unblock', $user)}}" class="btn btn-info btn-sm mt-1" data-method="PATCH" data-token="{{csrf_token()}}" data-toggle="tooltip" title="{{__('labels.backend.unblock')}}" data-confirm="Are you sure?"><i class="fas fa-check"></i></a>
                                @endif
                                <a href="{{route('backend.users.destroy', $user)}}" class="btn btn-danger btn-sm mt-1" data-method="DELETE" data-token="{{csrf_token()}}" data-toggle="tooltip" title="{{__('labels.backend.delete')}}" data-confirm="Are you sure?"><i class="fas fa-trash-alt"></i></a>
                                @if ($user->email_verified_at == null)
                                <a href="{{route('backend.users.emailConfirmationResend', $user->id)}}" class="btn btn-primary btn-sm mt-1" data-toggle="tooltip" title="Send Confirmation Email"><i class="fas fa-envelope"></i></a>
                                @endif
                                @endcan
                            </td>                        
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-7">
            <div class="float-left">
                {!! $users->total() !!} {{ __('labels.backend.total') }}
            </div>
        </div>
        <div class="col-5">
            <div class="float-end">
                {!! $users->links() !!}
            </div>
        </div>
    </div>
</div>