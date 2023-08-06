<div>
    @if($color == "green")
        <button type="{{ $type }}" class="focus:outline-none mt-3 text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">{{ $slot }}</button>
    @elseif($color == "blue")
        <button type="{{ $type }}" class="focus:outline-none mt-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">{{ $slot }}</button>
    @elseif($color == "purple")
        <button type="{{ $type }}" class="focus:outline-none mt-3 text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-800">{{ $slot }}</button>
    @elseif($color == "red")
        <button type="{{ $type }}" class="focus:outline-none mt-3 text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">{{ $slot }}</button>
    @endif

</div>
