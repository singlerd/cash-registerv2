<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Promena Stanja') }}
        </h2>
    </x-slot>
    <div class="text-left pt-5">
         <pre>
            <strong class="text-red-700">* Kliknite na crvena polja da biste menjali vrednost</strong>
        </pre>
    </div>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div>
                <form action="{{route('store-current-state')}}" method="post">
                    @csrf

                    <div class="bg-gray-50 text-center">
                        <div class=" mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8 lg:flex lg:items-center">
                            <div class="mt-1 flex rounded-md shadow-sm">
                                <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
                                     Piće
                                </span>
                                <select name="drink" id="" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300">
                                    @foreach($drinks as $drink)
                                        <option value="{{$drink->drink_id}}">{{$drink->drink_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                           <div class="text-center pl-5">
                               X
                           </div>
                            <div class="mt-1 flex rounded-md shadow-sm pl-5">
                                <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
                                     Preneta količina
                                </span>
                                <input type="text" name="quantity"  class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" placeholder="primer: 1.80">
                            </div>
                            <div class="mt-1 flex rounded-md shadow-sm pl-5">
                                <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                   Ubaci u sistem
                                </button>
                            </div>
                        </div>
                    </div>
                </form>

                <table class="w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50 sticky top-0">
                    <tr>
                        <th class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            #
                        </th>
                        <th class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Naziv pića
                        </th>
                        <th class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Jedinica mere
                        </th>

                        <th class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Preneta količina
                        </th>

                        <th class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Nab. Kol. Pića
                        </th>
                        <th class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Ukupno
                        </th>
                        <th class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Prodata količina
                        </th>
                        <th class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Prodajna Cena
                        </th>
                        <th class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Iznos pića
                        </th>
                        <th class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            <div class="text-center"><strong><u>Ostalno na zalihi</u></strong></div>
                        </th>
                    </tr>
                    </thead>
                    <tbody class="bg-white text-xs divide-y divide-gray-200" id="fetchQuantityTable">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
