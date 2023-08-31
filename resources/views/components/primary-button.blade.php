<button {{ $attributes->merge(['type' => 'submit', 'class' => 'w-full text-white text-center px-3 py-2 bg-blue-400 hover:bg-blue-500 rounded-lg font-bold']) }}>
    {{ $slot }}
</button>
