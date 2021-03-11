<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kasa') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="sticky top-0 bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">
                <form method="post" action="{{route('update-sale')}}">
                    @csrf
                    {{ method_field('PATCH') }}
                    <div id="fetchSolds"></div>
                    <div class=" text-center">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Plaćeno</button>
                    </div>
                </form>
            </div>
            <div class="grid grid-cols-4 gap-20 bind">
                @foreach($currentStatesAndDrinks as $currentStateAndDrink)
                    <div id="result">
                        <button id="{{$currentStateAndDrink->current_state_id}}" name="post_button" class="btnSale">
                            <div class="w-60 h-60 m-2 hover:-mt-1 border-4 border-orange-600  cursor-pointer hover:shadow-lg">
                                <input type="hidden" name="current_state_id" id="current_state_id"  value="{{$currentStateAndDrink->current_state_id}}">
                                <img class="w-full h-full object-scale-down" src="{{asset('storage/drinks/'.$currentStateAndDrink->drink_image)}}" />
                                <div class="text-center text-2xl font-bold pt-2.5">{{$currentStateAndDrink->name}}</div>
                            </div>
                        </button>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
