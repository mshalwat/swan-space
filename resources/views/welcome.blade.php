<x-sections-en.home
    :heroContent="$heroContent ?? []"
    :aboutContent="$aboutContent ?? []"
    :servicesContent="$servicesContent ?? []"
    :contactContent="$contactContent ?? []"
    :stats="$stats ?? []"
    :highlights="$highlights ?? []"
    :services="$services ?? collect()"
    :testimonials="$testimonials ?? collect()"
/>
