@props([
    'inline' => false,
    'contained' => false,
    'target' => NULL,
    'text' => null,
    'logo' => false,
    'logoUrl' => null,
    'color' => '#000'
    ])

@if($inline)
<div>
	<div wire:loading @if($target) wire:target="{{ $target }}" @endif class="z-50 w-full">
	    <style>
	        @keyframes arrow {
	            50% {
	                transform: rotateY(90deg);
	            }

	            100% {
	                transform: rotateY(-180deg);
	            }
	        }

	        div.icon {
	            width: 80px;
	            height: 80px;
	            animation-name: arrow;
	            animation-duration: 1s;
	            animation-timing-function: linear;
	            animation-iteration-count: infinite;
	            animation-direction: alternate;
	        }
	    </style>
	    <div class="flex justify-center w-full">
	        <div class="flex items-center justify-center">
	            <div class="flex flex-col items-center justify-center space-y-5 animate-pulse">
					<div class="bg-white p-2 rounded-full">
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
                    </div>
					@if($logo)
	                <img src="{{ $logoUrl }}" class="dark:hidden" width="160">
					@endif
	            </div>
	        </div>
	    </div>
	</div>
</div>
@else
<div class="h-0">
	<div wire:loading @if($target) wire:target="{{ $target }}" @endif>
		<div class="flex items-center justify-center bg-zinc-900/25
            @if($contained) absolute @else fixed @endif top-0 left-0 w-full h-full z-50" style="z-index: 999999999;">
			<div class="flex flex-col items-center justify-center space-y-4 rounded-full bg-blue-75 dark:bg-zinc-700">
				<div class="bg-white p-2 rounded-full">
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
                </div>
				@if($text)
				<div x-data="{texts: {{ $text }}, count: 0}" x-init="setInterval(() => count < (texts.length - 1) ? count++ : null, 2000)">
					<h5 x-text="texts[count]" class="font-medium animate-pulse opacity-80"></h5>
				</div>
				@endif
			</div>
		</div>
	</div>
</div>
@endif
