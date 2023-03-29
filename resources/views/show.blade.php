<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __("Note") }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 shadow-xl py-12 text-gray-900 dark:text-gray-100 block ">
                    <div class="flex flex-col  md:flex-row">

                        <div class="md:w-4/12 border bg-white dark:bg-gray-800 rounded mb-4 md:mb-0 md:mr-4">
                            <div class="space-y-2 p-4">
                                <div class=" h-[100px] md:h-[300px] overflow-y-auto ">
                                    @if (isset($note))
                                    <div
                                        class="bg-white dark:bg-gray-800 hover:bg-gray-200 dark:hover:text-black hover:rounded-md">

                                        <div class="py-3 p-3 rounded-md flex justify-between">
                                            <p>{{ \illuminate\support\Str::limit($note->text, 35, '......')}}</p>
                                            <form action="/note/delete/{{ $note->id }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit">
                                                    <i
                                                        class="mr-2 far fa-trash-alt bg-150 text-red-600 bg-x-25 bg-clip-text"></i>
                                                </button>
                                            </form>
                                        </div>
                                        <h4 class="pl-3 mb-4">{{ $note->created_at->diffForHumans() }}</h4>
                                        <hr
                                            class="h-px mx-0 my-4 bg-transparent border-0 opacity-25 bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent " />

                                    </div>
                                    @else
                                    <div class="text-center ">No Notes found</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="md:w-8/12  bg-white rounded">

                            <form action="/note/edit/{{ $note->note_id }}" method="POST">
                                @csrf



                                <textarea id="text" rows="4" name="text"
                                    class="block p-2.5 h-[200px] md:h-[500px] leading-loose tracking-wide w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Write your thoughts here...">{{ $note->text }}</textarea>
                                <div class="flex justify-end items-center dark:bg-gray-800">
                                    @if (session('status') === 'Note saved')
                                    <p x-data="{ show: true }" x-show="show" x-transition
                                        x-init="setTimeout(() => show = false, 2000)"
                                        class="text-sm text-gray-600 dark:text-gray-400 mr-3">{{ __('Note Updated
                                        Succesfully') }}</p>
                                    @endif
                                    <button type="submit"
                                        class="py-1.5 px-6 bg-slate-900 text-white mt-4 mr-4">Edit</button>
                                    <a href="{{ route('notes.index') }}"
                                        class="py-1.5 px-6 bg-slate-900 text-white mt-4 ">My
                                        Notes</a>
                                </div>
                            </form>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>