@extends('layouts.app')

@section('content')

<section class="pt-4 bg-blueGray-50">

    <x-auth-flash-message status="session('status')" />

    <div class="w-full lg:w-3/6 px-4 mx-auto">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            出品者情報
        </h2>
        <div class="text-right">
            @if( Auth::id() !== $user->id )
            <follow-component :initial-is-followed-by='@json($user->isFollowedBy(Auth::user()))' :count-followers='@json($user->count_followers)' endpoint="{{ route('user.follow', ['user' => $user]) }}" />
            @endif
        </div>

        <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-xl rounded-lg mt-4">
            <div class="px-6">

                <div class="flex flex-wrap justify-center">

                    <div class="w-full px-4 flex justify-center">
                        <div class="relative">
                            <img src="{{ asset('storage/profiles/'  . $user->profile->icon) }}" alt="icon" class="object-fill" style="border-radius: 50%; width: 200px; height: 200px;">
                        </div>
                    </div>
                    <div class="w-full text-center mt-6">
                        <div class="flex justify-center py-4 lg:pt-4 pt-8">
                            <div class="mr-4 p-3 text-center">
                                <a href="{{ route('user.follow.index', ['id' => $user->id]) }}" class="no-underline">
                                    <span class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">
                                        {{ $user->count_follows }}
                                    </span>

                                    <span class="text-sm text-blueGray-400">フォロー</span>
                                </a>
                            </div>
                            <div class="mr-4 p-3 text-center">
                                <a href="{{ route('user.follower.index', ['id' => $user->id]) }}" class="no-underline">
                                    <span class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">
                                        {{ $user->count_followers }}
                                    </span>
                                    <span class="text-sm text-blueGray-400">フォロワー</span>
                                </a>
                            </div>
                            <div class="lg:mr-4 p-3 text-center">
                                <a href="{{ route('user.product.index', ['id' => $user->id]) }}" class="no-underline">
                                    <span class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">
                                        {{ $product_count }}
                                    </span>
                                    <span class="text-sm text-blueGray-400">出品数</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center mt-6">
                    <h3 class="text-xl font-semibold leading-normal mb-2 text-blueGray-700 mb-2">
                        {{$user->profile->nickname}}
                    </h3>
                    <div class="mb-2 text-blueGray-600 mt-10">

                        <i class="fas fa-map-marker-alt mr-2 text-lg text-blueGray-400"></i>
                        @foreach(config('pref') as $pref_id => $name)
                        @if ($pref_id === $user->profile->prefecture)
                        {{ $name }}
                        @endif
                        @endforeach
                    </div>
                    <div class="mb-2 text-blueGray-600 mt-10">
                        <i class="fas fa-briefcase mr-2 text-lg text-blueGray-400"></i>
                        年齢: {{ $user->profile->age }}才
                    </div>
                    <div class="mb-2 text-blueGray-600">
                        <i class="fas fa-university mr-2 text-lg text-blueGray-400"></i>
                        性別: {{\App\Enums\GenderType::getDescription($user->gender)}}
                    </div>
                </div>
                <div class="mt-10 py-10 border-t border-blueGray-200 text-center">
                    <div class="flex flex-wrap justify-center">
                        <div class="w-full lg:w-9/12 px-4">
                            <p class="mb-4 text-lg leading-relaxed text-blueGray-700">
                                {{ $user->profile->content }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="flex justify-center mt-16">
    <button type="button" onclick="window.history.back();" class="bg-gray-200 border-0 py-2 px-8 mr-7 focus:outline-none hover:bg-gray-400 rounded text-lg">戻る</button>
</div>


@endsection