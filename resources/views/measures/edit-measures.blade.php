<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ažuriranje pića') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="min-h-screen bg-gray-100 py-6 flex flex-col justify-center sm:py-12">
                        <div class="relative py-3 sm:max-w-xl sm:mx-auto">
                            <div class="relative px-4 py-10 bg-white mx-8 md:mx-0 shadow rounded-3xl sm:p-10">
                                <div class="max-w-md mx-auto">
                                    <div class="flex items-center space-x-5">
                                        <div class="h-14 w-14 bg-yellow-200 rounded-full flex flex-shrink-0 justify-center items-center text-yellow-500 text-2xl font-mono">AMJ</div>
                                        <div class="block pl-2 font-semibold text-xl self-start text-gray-700">
                                            <h2 class="leading-relaxed">Ažuriranje merne jedinice</h2>
                                            <p class="text-sm text-gray-500 font-normal leading-relaxed">Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
                                        </div>
                                    </div>
                                    <form action="{{route('update-measure',['id', $measure->id_measure])}}" method="post">
                                        @csrf
                                        <input name="_method" type="hidden" value="PATCH">
                                        <input name="id_measure" type="hidden" value="{{ $measure->id_measure}}">
                                        <div class="divide-y divide-gray-200">
                                            <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
                                                <div class="flex flex-col">
                                                    <label class="leading-loose">Merna jedinica</label>
                                                    <input type="text" name="measure" value="{{$measure->measure}}" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" placeholder="primer: 'Jelen pivo'">
                                                    @error('measure')
                                                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                                        <span class="block sm:inline"> {{ $message }}</span>
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="pt-4 flex items-center space-x-4">
                                                <button class="bg-yellow-400 flex justify-center items-center w-full text-white px-4 py-3 rounded-md focus:outline-none">Ažuriraj</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

