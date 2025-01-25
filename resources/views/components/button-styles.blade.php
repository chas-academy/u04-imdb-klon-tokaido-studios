
@props(['size' => 'default'])

@php 

    $sizeClasses = match($size)
    {
        'large' => 'px-5 py-2 text-lg font-bold',
        'small' => 'px-1 py-0 text-xs font-light',
        'default' => 'px-2 py-1 text-base',
    };

@endphp

<button {{ $attributes->merge([
    'class'=>  "bg-buttonStyle-background 
                text-buttonStyle-text 
                border-buttonStyle-border 
                font-body
                rounded-md 
                shadow-content-box 
                hover:bg-buttonStyle-hooverOn
                transition 
                duration-300 
                ease-in-out 
                cursor-pointer 
                border
                $sizeClasses"
            ])
        }}>       
    {{ $slot }}
</button>