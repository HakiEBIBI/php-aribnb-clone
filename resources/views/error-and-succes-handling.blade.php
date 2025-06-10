@if ($errors->any())
    <div class="w-full bg-red-100 text-red-700 border border-red-300 rounded-md p-4 mb-4">
        <ul class="list-none pl-0">
            @foreach ($errors->all() as $error)
                <li class="flex items-center mb-2">
                    <svg class="w-5 h-5 text-red-700 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zM9 5a1 1 0 112 0v4a1 1 0 11-2 0V5zm1 8a1.5 1.5 0 100 3 1.5 1.5 0 000-3z" clip-rule="evenodd" />
                    </svg>
                    <span>{{ $error }}</span>
                </li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('success'))
    <div class="w-full bg-green-100 text-green-700 border border-green-300 rounded-md p-4 mb-4">
        <div class="flex items-center">
            <svg class="w-5 h-5 text-green-700 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 00-1.414 0L8 12.586 4.707 9.293a1 1 0 00-1.414 1.414l4 4a1 1 0 001.414 0l8-8a1 1 0 000-1.414z" clip-rule="evenodd" />
            </svg>
            <span>{{ session('success') }}</span>
        </div>
    </div>
@endif
