@component('mail::message')
{{-- Greeting --}}
@if (! empty($greeting))
# {{ $greeting }}
@else
@if ($level == 'error')
# Whoops!
@else
# Hola!
@endif
@endif

{{-- Intro Lines --}}
Estás recibiendo este mensaje porque solicitaste recuperar tu contraseña.

{{-- Action Button --}}
@isset($actionText)
<?php
    switch ($level) {
        case 'success':
            $color = 'green';
            break;
        case 'error':
            $color = 'red';
            break;
        default:
            $color = 'blue';
    }
?>
@component('mail::button', ['url' => $actionUrl, 'color' => $color])
{{ $actionText }}
@endcomponent
@endisset

Si no solicitaste recuperar tu contraseña, por favor ignorá este mensaje.
{{-- Salutation --}}
Saludos de parte del equipo de URH Miner

{{-- Subcopy --}}
@isset($actionText)
@component('mail::subcopy')
Si tenés problemas para recuperar tu contraseña con el botón "{{ $actionText }}" copiá y pegá esta dirección
en tu navegador: [{{ $actionUrl }}]({{ $actionUrl }})
@endcomponent
@endisset
@endcomponent
