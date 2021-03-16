<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista pića') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- component -->
                    <div>
                        <div class="shadow overflow-hidden border border-gray-200 sm:rounded-lg m-6">

                            <table class="w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Naziv pića
                                    </th>
                                    <th class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Jedinica mere
                                    </th>
                                    <th class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Proizvođač
                                    </th>
                                    <th class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Nabavna Cena
                                    </th>
                                    <th class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Prodajna Cena
                                    </th>
                                    <th class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Objavljeno
                                    </th>
                                    <th class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Operacije
                                    </th>
                                </tr>
                                </thead>
                                @foreach($drinks as $drink)
                                    <tbody class="bg-white text-xs divide-y divide-gray-200">
                                        <tr>
                                            <td class="px-3 py-3">{{$drink->drink_name}}</td>
                                            <td class="px-3 py-3">{{$drink->measure}}</td>
                                            <td class="px-2 py-3">{{$drink->manufacturer}}</td>
                                            <td class="px-3 py-3">{{$drink->purchase_price}}</td>
                                            <td class="px-2 py-3">{{$drink->sold_price}}</td>
                                            <td>{{$drink->created_at}}</td>
                                            <td>
                                                <div class="flex justify-start space-x-1">
                                                    <a class="border-2 border-indigo-200 rounded-md p-1">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-4 w-4 text-indigo-500">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                        </svg>
                                                    </a>
                                                    <a href="{{url('/drinks/'.$drink->drink_id .'/edit')}}" class="border-2 border-indigo-200 rounded-md p-1">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-4 w-4 text-gray-500">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                        </svg>
                                                    </a>
                                                    <form action="{{route('delete-drink',$drink->drink_id)}}" method="post" >
                                                        @csrf
                                                        <input name="_method" type="hidden" value="DELETE">
                                                        <input name="drink_id" type="hidden" value="{{ $drink->drink_id}}">
                                                    <button type="submit" class="border-2 border-red-200 rounded-md p-1">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-4 w-4 text-red-500">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                        </svg>
                                                    </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div>
                 </div>
            </div>
        </div>
    </div>
</x-app-layout>
