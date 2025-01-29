

<div {{ $attributes->merge([
    'class' => "bg-contentBox-background
                flex
                flex-col
                border-contentBox-border
                text-contentBox-text
                shadow-content-box   
                p-8 rounded-lg  
                border-2 flex
                max-w-full sm:max-w-[800px] md:max-w-[1200px] lg:max-w-[1400px] xl:max-w-[1750px]
                min-w-[300px]
                h-auto
                mx-auto 
                m-4
                transition-all duration-300 ease-in-out" 
    
    ]) }}>
    
    {{ $slot }}
</div>