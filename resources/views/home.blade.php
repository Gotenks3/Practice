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

                    <div>
                        <h1>product</h1>
                        <button type="button" onclick="location.href='{{ route('product.index')}}'" class="bg-gray-200 border-0 py-2 px-8 mr-7 focus:outline-none hover:bg-gray-400 rounded text-lg">一覧</button>
                        <button type="button" onclick="location.href='{{ route('product.create')}}'" class="bg-blue-200 border-0 py-2 px-8 mr-7 focus:outline-none hover:bg-gray-400 rounded text-lg">作成</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
