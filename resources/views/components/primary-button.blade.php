<button {{ $attributes->merge(['type' => 'submit', 'class' => ' items-center px-4 py-1 bg-green-600 border border-transparent rounded-md font-medium text-lg text-white  hover:bg-green-700 focus:bg-green-700 active:bg-green-900 focus:outline-none  transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
