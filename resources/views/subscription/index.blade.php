@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Our Plans') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('Subscribe plans!') }}
                            @if (!empty($prices))
                                <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
                                    @foreach($prices as $price)
                                        <div class="card mb-4 rounded-3 shadow-sm">
                                            <div class="card-header py-3">
                                                <h4 class="my-0 fw-normal">{{ $price->productName }}</h4>
                                            </div>
                                            <div class="card-body">
                                                <h1 class="card-title pricing-card-title">{{$price->unit_amount_decimal / 100 }}$
                                                    @if($price->type === 'recurring')
                                                        <small class="text-muted fw-light">/ {{$price->recurring->interval}}</small>
                                                    @endif
                                                </h1>
                                                <a href="{{ route('subscription.create', ['id' => $price->id]) }}" class="w-100 btn btn-lg btn-outline-primary">Select this plan</a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
