
@props(['size' => 'default'])

@php 

    $sizeClasses = match($size)
    {
        'large' => 'px-4 sm:px-6 lg:px-8 py-3 sm:py-4 lg:py-5 text-lg sm:text-xl font-bold',
        'small' => 'px-2 sm:px-3 py-1 sm:py-2 text-sm sm:text-base font-light',
        'default' => 'px-3 sm:px-4 py-2 sm:py-3 text-base sm:text-lg',
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