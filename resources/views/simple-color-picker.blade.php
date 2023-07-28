@php
    $affixLabelClasses = [
        'whitespace-nowrap group-focus-within:text-primary-500',
        'text-gray-400' => ! $errors->has($getStatePath()),
        'text-danger-400' => $errors->has($getStatePath()),
        'dark:text-danger-400' => $errors->has($getStatePath()) && config('forms.dark_mode'),
    ];
@endphp

<x-dynamic-component
    :component="$getFieldWrapperView()"
    :id="$getId()"
    :label="$getLabel()"
    :label-sr-only="$isLabelHidden()"
    :helper-text="$getHelperText()"
    :hint="$getHint()"
    :hint-action="$getHintAction()"
    :hint-color="$getHintColor()"
    :hint-icon="$getHintIcon()"
    :required="$isRequired()"
    :state-path="$getStatePath()"
>
    <div {{ $attributes->merge($getExtraAttributes())->class(['flex items-center space-x-1 rtl:space-x-reverse group']) }}>
        @if (($prefixAction = $getPrefixAction()) && (! $prefixAction->isHidden()))
            {{ $prefixAction }}
        @endif

        @if ($icon = $getPrefixIcon())
            <x-dynamic-component :component="$icon" class="w-5 h-5" />
        @endif

        @if ($label = $getPrefixLabel())
            <span @class($affixLabelClasses)>
                {{ $label }}
            </span>
        @endif

        <div
            x-data="{
                open: false,
                isAutofocused: @js($isAutofocused()),
                isDisabled: @js($isDisabled()),
                state: $wire.{{ $applyStateBindingModifiers('entangle(\'' . $getStatePath() . '\')') }}
            }"
            x-click="open = true"
            x-on:keydown.esc="isOpen() && $event.stopPropagation()"
            {{ $getExtraAlpineAttributeBag()->class(['relative flex-1']) }}
        >
            <input
                x-ref="input"
                type="text"
                dusk="filament.forms.{{ $getStatePath() }}"
                id="{{ $getId() }}"
                x-model="state"
                x-on:click="open = !open"
                x-on:keydown.enter.stop.prevent="open = !open"
                autocomplete="off"
                {!! $isDisabled() ? 'disabled' : null !!}
                {!! ($placeholder = $getPlaceholder()) ? "placeholder=\"{$placeholder}\"" : null !!}
                @if (! $isConcealed())
                    {!! $isRequired() ? 'required' : null !!}
                @endif
                {{ $getExtraInputAttributeBag()->class([
                    'text-gray-900 block w-full transition duration-75 rounded-lg shadow-sm outline-none focus:border-primary-500 focus:ring-1 focus:ring-inset focus:ring-primary-500 disabled:opacity-70 cursor-pointer',
                    'dark:bg-gray-700 dark:text-white dark:focus:border-primary-500' => config('forms.dark_mode'),
                    'border-gray-300' => ! $errors->has($getStatePath()),
                    'dark:border-gray-600' => (! $errors->has($getStatePath())) && config('forms.dark_mode'),
                    'border-danger-600 ring-danger-600' => $errors->has($getStatePath()),
                    'dark:border-danger-400 dark:ring-danger-400' => $errors->has($getStatePath()) && config('forms.dark_mode'),
                ]) }}
            />

            <span
                x-cloak
                class="absolute inset-y-0 left-0 flex items-center p-2 pointer-events-none w-full"
            >
                <span
                    x-bind:style="{ 'background-color': state }"
                    class="relative overflow-hidden rounded-md w-full h-7"
                ></span>
            </span>

            <div
                x-show="open"
                x-on:click.outside="open = !open"
                class="bg-white dark:bg-gray-700 absolute p-2 border dark:border-gray-600 rounded-md z-10 grid grid-cols-{{ $getColorColumns() }}"
            >
                @foreach ( $getColors() as $color )
                    <div
                        x-on:click="state = '{{ $color }}'"
                        class="h-5 w-5 m-1 rounded-full border-2 border-white shadow-gray-300 hover:shadow-gray-400 dark:hover:shadow-none shadow-md cursor-pointer"
                        style="background-color:{{ $color }}">
                    </div>
                @endforeach
            </div>
        </div>

        @if ($label = $getSuffixLabel())
            <span @class($affixLabelClasses)>
                {{ $label }}
            </span>
        @endif

        @if ($icon = $getSuffixIcon())
            <x-dynamic-component :component="$icon" class="w-5 h-5" />
        @endif

        @if (($suffixAction = $getSuffixAction()) && (! $suffixAction->isHidden()))
            {{ $suffixAction }}
        @endif
    </div>
</x-dynamic-component>
