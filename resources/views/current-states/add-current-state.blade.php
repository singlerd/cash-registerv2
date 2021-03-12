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
            <button id="pdfmake" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700">
                <svg width="50" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                </svg>
            </button>
        </div>
        <br>
        <div class="inline-flex rounded-md shadow pt-1">
            <button id="makeExcelFile" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700">
                <svg  width="50" id="Livello_1" xmlns:x="&ns_extend;" xmlns:i="&ns_ai;" xmlns:graph="&ns_graphs;"
                     xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 2289.75 2130"
                     enable-background="new 0 0 2289.75 2130" xml:space="preserve">
                <metadata>
                    <sfw  xmlns="&ns_sfw;">
                        <slices></slices>
                        <sliceSourceBounds  bottomLeftOrigin="true" height="2130" width="2289.75" x="-1147.5" y="-1041"></sliceSourceBounds>
                    </sfw>
                </metadata>
                                    <path fill="#185C37" d="M1437.75,1011.75L532.5,852v1180.393c0,53.907,43.7,97.607,97.607,97.607l0,0h1562.036
                    c53.907,0,97.607-43.7,97.607-97.607l0,0V1597.5L1437.75,1011.75z"/>
                                    <path fill="#21A366" d="M1437.75,0H630.107C576.2,0,532.5,43.7,532.5,97.607c0,0,0,0,0,0V532.5l905.25,532.5L1917,1224.75
                    L2289.75,1065V532.5L1437.75,0z"/>
                                    <path fill="#107C41" d="M532.5,532.5h905.25V1065H532.5V532.5z"/>
                                    <path opacity="0.1" enable-background="new    " d="M1180.393,426H532.5v1331.25h647.893c53.834-0.175,97.432-43.773,97.607-97.607
                    V523.607C1277.825,469.773,1234.227,426.175,1180.393,426z"/>
                                    <path opacity="0.2" enable-background="new    " d="M1127.143,479.25H532.5V1810.5h594.643
                    c53.834-0.175,97.432-43.773,97.607-97.607V576.857C1224.575,523.023,1180.977,479.425,1127.143,479.25z"/>
                                    <path opacity="0.2" enable-background="new    " d="M1127.143,479.25H532.5V1704h594.643c53.834-0.175,97.432-43.773,97.607-97.607
                    V576.857C1224.575,523.023,1180.977,479.425,1127.143,479.25z"/>
                                    <path opacity="0.2" enable-background="new    " d="M1073.893,479.25H532.5V1704h541.393c53.834-0.175,97.432-43.773,97.607-97.607
                    V576.857C1171.325,523.023,1127.727,479.425,1073.893,479.25z"/>
                                    <linearGradient id="SVGID_1_" gradientUnits="userSpaceOnUse" x1="203.5132" y1="1729.0183" x2="967.9868" y2="404.9817" gradientTransform="matrix(1 0 0 -1 0 2132)">
                                        <stop  offset="0" style="stop-color:#18884F"/>
                                        <stop  offset="0.5" style="stop-color:#117E43"/>
                                        <stop  offset="1" style="stop-color:#0B6631"/>
                                    </linearGradient>
                                    <path fill="url(#SVGID_1_)" d="M97.607,479.25h976.285c53.907,0,97.607,43.7,97.607,97.607v976.285
                    c0,53.907-43.7,97.607-97.607,97.607H97.607C43.7,1650.75,0,1607.05,0,1553.143V576.857C0,522.95,43.7,479.25,97.607,479.25z"/>
                                    <path fill="#FFFFFF" d="M302.3,1382.264l205.332-318.169L319.5,747.683h151.336l102.666,202.35
                    c9.479,19.223,15.975,33.494,19.49,42.919h1.331c6.745-15.336,13.845-30.228,21.3-44.677L725.371,747.79h138.929l-192.925,314.548
                    L869.2,1382.263H721.378L602.79,1160.158c-5.586-9.45-10.326-19.376-14.164-29.66h-1.757c-3.474,10.075-8.083,19.722-13.739,28.755
                    l-122.102,223.011H302.3z"/>
                                    <path fill="#33C481" d="M2192.143,0H1437.75v532.5h852V97.607C2289.75,43.7,2246.05,0,2192.143,0L2192.143,0z"/>
                                    <path fill="#107C41" d="M1437.75,1065h852v532.5h-852V1065z"/>
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
                                <th class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider text-xs">
                                    Jedinica Mere

                                </th>
                                <th class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider text-xs">
                                    Preneta količina
                                    <div class="text-left">
                                        <strong class="text-red-700" >L</strong>
                                    </div>
                                </th>

                                <th class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider text-xs">
                                    Nab. Kol. Pića
                                    <div class="text-left">
                                        <strong class="text-red-700 ">L</strong>
                                    </div>
                                </th>
                                <th class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider text-xs">
                                    Ukupno
                                    <div class="text-left">
                                        <strong class="text-red-700 " style="font-size: 0.5rem;">L</strong>
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
            {{--                        TOTAL--}}

                </div>
       </div>
    </div>
</x-app-layout>
