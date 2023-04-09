@props(['color' => '#000'])
<svg class="mx-auto animate-spin" fill="none" height="60" width="60">
    <circle class="stroke-zinc-900/10" cx="30.005" cy="30.005" r="28" stroke-width="2"></circle>
    <path
        d="M16.002 54.253C2.612 46.521-1.975 29.397 5.755 16.005 13.486 2.612 30.608-1.976 43.998 5.756c13.39 7.732 17.977 24.857 10.247 38.249"
        stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="url(#paint0_linear)"></path>
    <defs>
        <linearGradient gradientUnits="userSpaceOnUse" id="paint0_linear" x1="50.322" x2="6.877" y1="19.8"
            y2="42.051">
            <stop stop-color="{{ $color }}"></stop>
            <stop offset="1" stop-color="{{ $color }}" stop-opacity="0"></stop>
        </linearGradient>
    </defs>
</svg>
