@section('auth-form')
    <form action="{{route('auth', app('request')->callback ? ['callback' => app('request')->callback] : null)}}" method="POST" data-form-page="auth" class="active">
            <div class="form-group">
                <input type="text" class="form-control" id="authorized_key" name="authorized_key" value="{{app('request')->authorized_key}}" placeholder="{{__('Phone, Email or Username')}}">
            </div>

            <button class="btn btn-dark btn-block btn-login mb-3">{{__('Enter')}}</button>

            <div class="d-flex justify-content-center">
                <a href="{{route('auth.recovery')}}" class="text-light text-decoration-none fs-14">{{__('Forgot Password')}}</a>
                <span class="px-2 text-white">|</span>
                <a href="{{route('auth.verification')}}" class="text-light text-decoration-none font-weight-bold fs-14">{{__('Mobile verify')}}</a>
                <span class="px-2 text-white">|</span>
                <a href="{{route('register')}}" class="text-light text-decoration-none font-weight-bold fs-14">{{__('Register')}}</a>
            </div>
        </form>
    </div>
@endsection
@extends(app('request')->ajax() ? 'auth.xhr' : 'auth.app')
