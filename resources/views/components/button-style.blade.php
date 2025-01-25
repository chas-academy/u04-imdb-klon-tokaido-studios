<div {{ $attributes->merge(['class' =>  'btn-style-standard ' . $class]) }}>
    {{ $slot }}
</div>


bg-buttonStyle-background text-buttonStyle-text border-buttonStyle-border font-body font-bold px-3 py-2
                rounded-md shadow-content-box hover:bg-buttonStyle-hooverOn
                transition duration-300 ease-in-out cursor-pointer border;
                ($ === 'large' ? 'px-5 py-3' : 'px-3 py-2')