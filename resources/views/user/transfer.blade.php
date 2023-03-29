<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __("Send Money") }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 shadow-xl py-12 text-gray-900 dark:text-gray-100 block ">

                    <body class="antialiased sans-serif ">
                        <div x-data="app()" x-cloak>
                            <div class="max-w-3xl mx-auto px-4 py-10">

                                <div x-show.transition="step === 'complete'">
                                    <div class="bg-white rounded-lg p-10 flex items-center shadow justify-between">
                                        <div>
                                            <svg class="mb-4 h-20 w-20 text-green-500 mx-auto" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                    clip-rule="evenodd" />
                                            </svg>

                                            <h2 class="text-2xl mb-4 text-gray-800 text-center font-bold">Transfer
                                                Succesfull</h2>

                                            <div class="text-gray-600 mb-8 text-center">
                                                Your transfer has been sent succesfully, your beneficiary is expected to
                                                be credited within 60 seconds subjected to the beneficiary bank
                                                notifications
                                            </div>

                                            <div class="space-y-1">
                                                <button @click="step = 1"
                                                    class="w-40 block mx-auto focus:outline-none py-2 px-5 rounded-lg shadow-sm text-center text-gray-600 bg-white hover:bg-gray-100 font-medium border">Back
                                                    to home</button>

                                                {{-- if clicked a script could be executed and generate a receipt for
                                                the transfer transaction --}}
                                                <button
                                                    class="w-40 block mx-auto focus:outline-none py-2 px-5 rounded-lg shadow-sm text-center text-gray-600 bg-white hover:bg-gray-100 font-medium border">Download
                                                    Receipt</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div x-show.transition="step != 'complete'">
                                    <!-- Top Navigation -->
                                    <div class="border-b-2 py-4">
                                        <div class="uppercase tracking-wide text-xs font-bold text-gray-500 mb-1 leading-tight"
                                            x-text="`Step: ${step} of 3`"></div>
                                        <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                                            <div class="flex-1">
                                                <div x-show="step === 1">
                                                    <div
                                                        class="text-lg font-bold text-gray-900 dark:text-white leading-tight">
                                                        Local
                                                        Transfer
                                                    </div>
                                                </div>

                                                <div x-show="step === 2">
                                                    <div class="text-lg font-bold text-gray-700 leading-tight">Save
                                                        Beneficiary
                                                    </div>
                                                </div>

                                                <div x-show="step === 3">
                                                    <div class="text-lg font-bold text-gray-700 leading-tight">Transfer
                                                        Review</div>
                                                </div>
                                            </div>

                                            <div class="flex items-center md:w-64">
                                                <div class="w-full bg-white rounded-full mr-2">
                                                    <div class="rounded-full bg-green-500 text-xs leading-none h-2 text-center text-gray-900 dark:text-white"
                                                        :style="'width: '+ parseInt(step / 3 * 100) +'%'"></div>
                                                </div>
                                                <div class="text-xs w-10 text-gray-600"
                                                    x-text="parseInt(step / 3 * 100) +'%'"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /Top Navigation -->

                                    <!-- Step Content -->
                                    <div class="py-10">
                                        <div x-show.transition.in="step === 1">
                                            <div class="mb-5 flex justify-center ">
                                                <div
                                                    class="w-full shadow-lg rounded-md text-gray-900 bg-gray-100 dark:bg-gray-900 dark:text-white">
                                                    <div class="p-4">
                                                        <div class="flex justify-between">
                                                            <h2>Patrick Samson Tobi</h2>
                                                            <p>****4589</p>
                                                        </div>
                                                        <div class="flex justify-between mt-2">
                                                            <h2>Available Balance</h2>
                                                            <p>@naira(562430)</p>
                                                        </div>

                                                        <div class="flex justify-between mt-4">
                                                            <h2>Savings Account</h2>
                                                            <p>****4956</p>
                                                        </div>

                                                        <div class="flex justify-between mt-2">
                                                            <h2>Balance</h2>
                                                            <p>@naira(2003880)</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="flex flex-col md:flex-row md:justify-content">
                                                <div
                                                    class="w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-900 dark:text-white dark:bg-gray-900 md:mr-2 mb-4 md:mb-0 font-medium">

                                                    <a href="" class="flex justify-between">
                                                        <button>Unity Account</button>
                                                        <p class="text-2xl">></p>


                                                    </a>
                                                </div>
                                                <div
                                                    class="w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-900 dark:text-white dark:bg-gray-900 font-medium">
                                                    <a href="" class="flex justify-between">
                                                        <button>Other Banks</button>
                                                        <p class="text-2xl">></p>


                                                    </a>
                                                </div>

                                            </div>

                                        </div>
                                        <div x-show.transition.in="step === 2">

                                            <div class="mb-5">

                                                <div class="text-gray-900 dark:text-white mt-2 mb-4">
                                                    <div class="flex justify-between">
                                                        <label for="Transfer to">Transfer to</label>
                                                        <div>Choose Beneficiary</div>
                                                    </div>

                                                    <input type="text"
                                                        class="w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-900 dark:text-white font-medium dark:bg-gray-900"
                                                        placeholder="enter acccount number">
                                                </div>
                                                <div class="text-gray-900 dark:text-white mt-2 mb-4">
                                                    <div class="flex justify-between">
                                                        <label for="Transfer to">Amount</label>

                                                    </div>

                                                    <input type="text" name="amount"
                                                        class="w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-900 dark:text-white font-medium dark:bg-gray-900"
                                                        placeholder="amount">
                                                </div>
                                                <div class="text-gray-900 dark:text-white mt-2 mb-4">
                                                    <div class="flex justify-between">
                                                        <label for="Transfer to">Bank</label>
                                                        <div>Choose reciepient bank</div>
                                                    </div>

                                                    <input type="text" id="myInput" name="reciepient_bank"
                                                        placeholder="start typing to search banks"
                                                        class="w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-900 dark:text-white font-medium dark:bg-gray-900">
                                                </div>
                                                <div class="text-gray-900 dark:text-white mt-2 mb-4">
                                                    <p>Currency</p>

                                                    <p>Nigeria Naira (NGN)</p>
                                                    <hr
                                                        class="h-px mx-0 my-4 bg-transparent border-0 opacity-25 bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent " />
                                                </div>
                                                <div class="text-gray-900 dark:text-white mt-2 mb-4">
                                                    <div class="flex justify-between">
                                                        <label for="Transfer to">Save Beneficiary</label>
                                                        <div><label
                                                                class="relative inline-flex items-center cursor-pointer">
                                                                <input type="checkbox" value="" class="sr-only peer"
                                                                    checked>
                                                                <div
                                                                    class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                                                                </div>
                                                                <span
                                                                    class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">
                                                                </span>
                                                            </label></div>
                                                    </div>


                                                </div>








                                            </div>

                                        </div>
                                        <div x-show.transition.in="step === 3">
                                            <div class="mb-5">

                                                <div class="text-gray-900 dark:text-white mt-2 mb-4">
                                                    <div class="flex justify-between">
                                                        <label for="Transfer to">Beneficiary account</label>

                                                    </div>

                                                    {{-- beneficiary account selected will be here --}}
                                                    <div
                                                        class="w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-900 dark:text-white font-medium dark:bg-gray-900 text-right text-lg">
                                                        1234567890
                                                    </div>

                                                </div>

                                                <div class="text-gray-900 dark:text-white mt-2 mb-4">
                                                    <div class="flex justify-between">
                                                        <label>Beneficiary Name</label>

                                                    </div>

                                                    {{-- beneficiary account selected will be here --}}
                                                    <div
                                                        class="w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-900 dark:text-white font-medium dark:bg-gray-900 text-right text-lg">
                                                        Jane John Doe
                                                    </div>

                                                </div>

                                                <div class="text-gray-900 dark:text-white mt-2 mb-4">
                                                    <div class="flex justify-between">
                                                        <label>Amount to be sent</label>

                                                    </div>


                                                    <div
                                                        class="w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-900 dark:text-white font-medium dark:bg-gray-900 text-right text-lg">
                                                        @naira(84930)
                                                    </div>

                                                </div>
                                                <div class="text-gray-900 dark:text-white mt-2 mb-4">
                                                    <div class="flex justify-between">
                                                        <label>transaction description</label>

                                                    </div>


                                                    <input name="purpose" type="text"
                                                        class="w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-900 dark:text-white font-medium dark:bg-gray-900 text-right text-lg">

                                                </div>
                                                <div class="text-gray-900 dark:text-white mt-2 mb-4">
                                                    <div class="flex justify-between">
                                                        <label>Transfer Pin</label>

                                                    </div>


                                                    <input name="pin" type="text"
                                                        placeholder="confirm your transaction pin"
                                                        class="w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-900 dark:text-white font-medium dark:bg-gray-900 text-left text-lg">

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- / Step Content -->
                                </div>
                            </div>

                            <!-- Bottom Navigation -->
                            <div class="fixed bottom-0 left-0 right-0 py-5 bg-white shadow-md"
                                x-show="step != 'complete'">
                                <div class="max-w-3xl mx-auto px-4">
                                    <div class="flex justify-between">
                                        <div class="w-1/2">
                                            <button x-show="step > 1" @click="step--"
                                                class="w-32 focus:outline-none py-2 px-5 rounded-lg shadow-sm text-center text-gray-600 bg-white hover:bg-gray-100 font-medium border">Back</button>
                                        </div>

                                        <div class="w-1/2 text-right">
                                            <button x-show="step < 3" @click="step++"
                                                class="w-32 focus:outline-none border border-transparent py-2 px-5 rounded-lg shadow-sm text-center text-white bg-blue-500 hover:bg-blue-600 font-medium">Continue</button>

                                            <button @click="step = 'complete'" x-show="step === 3"
                                                class="w-32 focus:outline-none border border-transparent py-2 px-5 rounded-lg shadow-sm text-center text-white bg-blue-500 hover:bg-blue-600 font-medium">Send</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- / Bottom Navigation https://placehold.co/300x300/e2e8f0/cccccc -->
                        </div>

                        <script>
                            function app() {
                			return {
                				step: 1, 


                
                
                				
                			}
                		}
                        </script>
                    </body>

                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>