<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Trenutno Stanje') }}
        </h2>
    </x-slot>
    <div class="text-center pt-5 text-2xl">
        <h2>OBRAČUN ZA DAN: <br> {{date("d.m.Y.")}} <br> Radnik: {{\Illuminate\Support\Facades\Auth::user()->name}}</h2>
    </div>
    <div class="pt-6 pb-6 sticky top-5">
        <div class="inline-flex rounded-md shadow">
            <a href="{{route("print-current-state")}}" id="btnPrint" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700">
                <svg width="50" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                </svg>
            </a>
        </div>
        <br>
        <div class="inline-flex rounded-md shadow pt-1">
            <button id="makeExcelFile" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700">
                <svg width="50" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
            </button>
        </div>
    </div>
    <div class="py-12">
       <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div>
                    <table class="w-full divide-y divide-gray-200" id="current-states-table">
                        <thead class="bg-gray-50 sticky top-0">
                            <tr>
                                <th class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider text-xs">
                                    #
                                </th>
                                <th class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider text-xs">
                                    Naziv pića
                                </th>
                                <th class="px-2 py-3 text-left font-medium text-gray-500 uppercase tracking-wider">
                                    Jedinica Mere

                                </th>
                                <th class="px-2 py-3 text-left font-medium text-gray-500 uppercase tracking-wider">
                                    Preneta količina
                                    <div class="text-left">
                                        <strong class="text-red-700" >L</strong>
                                    </div>
                                </th>

                                <th class="px-2 py-3 text-left font-medium text-gray-500 uppercase tracking-wider">
                                    Nab. Kol. Pića
                                    <div class="text-left">
                                        <strong class="text-red-700 ">L</strong>
                                    </div>
                                </th>
                                <th class="px-2 py-3 text-left font-medium text-gray-500 uppercase tracking-wider ">
                                    Ukupno
                                    <div class="text-left">
                                        <strong class="text-red-700">L</strong>
                                    </div>
                                </th>
                                <th class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider text-xs">
                                    Prodata količina
                                    <br>

                                </th>
                                <th class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider text-xs">
                                    Prodajna Cena
                                    <br>
                                    <div class="text-left">
                                        <strong class="text-red-700 " style="font-size: 0.5rem;">izražena u dinarima</strong>
                                    </div>
                                </th>
                                <th class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider text-xs">
                                   Iznos pića
                                    <br>
                                    <div class="text-left">
                                        <strong class="text-red-700 " style="font-size: 0.5rem;">izražena u dinarima</strong>
                                    </div>
                                </th>
                                <th class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider text-xs">
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
