<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn shade f-primary btn-block fnt-xxs']) }}>
    {{ $slot }}
</button>
