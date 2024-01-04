@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Subscribe to ') }} {{ $price->productName }}.
                        <span>{{$price->unit_amount_decimal / 100}}$
                            @if($price->type === 'recurring')
                                / {{$price->recurring->interval}}
                            @endif
                        </span>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                            <form>
                                <div class="mb-3">
                                    <label for="first_name" class="form-label">First Name</label>
                                    <input type="text" name="first_name" class="form-control" id="first_name" placeholder="First Name" required>
                                </div>
                                <div class="mb-3">
                                    <label for="last_name" class="form-label">Last Name</label>
                                    <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Last Name" required>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email address</label>
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="{{ auth()->check() ? auth()->user()->email : '' }}" required>
                                </div>
                                @if(!auth()->check())
                                <div class="form-check">
                                    <input class="form-check-input" name="create_account" value="1" type="checkbox" id="create_account">
                                    <label class="form-check-label" for="create_account">
                                        I want to create account
                                    </label>
                                </div>
                                <div id="collapsePassword" aria-expanded="false" class="collapse">
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control" id="password" placeholder="Password" >
                                    </div>
                                    <div class="mb-3">
                                        <label for="confirm_password" class="form-label">Confirm Password</label>
                                        <input type="password" name="confirm_password" class="form-control" id="confirm_password" placeholder="Confirm Password" >
                                    </div>
                                </div>
                                @endif
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
