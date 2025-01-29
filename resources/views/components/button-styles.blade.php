
@props(['size' => 'default'])

@php 

    $sizeClasses = match($size)
    {
        'large' => 'btn-large',
        'default' => 'btn-default',
        'small' => 'btn-small',
        
    };

@endphp

<button {{ $attributes->merge([
    'class'=>  "bg-buttonStyle-background 
                text-buttonStyle-text 
                border-buttonStyle-border 
                shadow-content-box 
                hover:bg-buttonStyle-hooverOn
                cursor-pointer 
                border
                btn 
                $sizeClasses"
            ])
        }}>       
    {{ $slot }}
</button>