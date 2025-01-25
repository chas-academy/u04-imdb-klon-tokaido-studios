

<div {{ $attributes->merge([
    'class' => "bg-contentBox-background
                border-contentBox-border
                text-contentBox-text
                shadow-content-box   
                p-8 rounded-lg  
                border-2 flex 
                w-full h-auto 
                m-4" 
    
    ]) }}>
    
    {{ $slot }}
</div>