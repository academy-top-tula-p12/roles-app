@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{ $user->name }}
                    {{ __('You are logged in!') }}

                    @role('project-manager')
                        Project Manager Panel
                    @endrole
                    @role('web-developer')
                        Web Developer Panel
                    @endrole

                    @if(Gate::allows("manage-users"))
                        <div>Manage for User Action</div>
                    @endif

                    @if(Gate::allows("create-tasks"))
                        <div>Create Task Action</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
