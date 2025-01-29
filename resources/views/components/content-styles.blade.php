

<div {{ $attributes->merge([
    'class' => "bg-contentBox-background
                flex
                flex-col
                border-contentBox-border
                text-contentBox-text
                shadow-content-box   
                p-8 rounded-lg  
                border-2 flex
                w-full max-w-[1750px] 
                h-auto
                mx-auto 
                m-4
                transition-all duration-300 ease-in-out" 
    
    ]) }}>
    
    {{ $slot }}
</div>