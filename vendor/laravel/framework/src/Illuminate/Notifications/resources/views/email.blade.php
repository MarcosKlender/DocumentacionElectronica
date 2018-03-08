@component('mail::message')
{{-- Greeting --}}
@if (! empty($greeting))
# {{ $greeting }}
@else
@if ($level == 'error')
# ¡Ups!
@else
# Estimado cliente,
@endif
@endif

{{-- Intro Lines --}}
@foreach ($introLines as $line)
Usted está recibiendo este correo electrónico porque recibimos una solicitud de restablecimiento de contraseña para su cuenta.
@endforeach

{{-- Action Button --}}
@isset($actionText)
<?php
    $actionText = 'Restablecer Contraseña';

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

{{-- Outro Lines --}}
@foreach ($outroLines as $line)
Si usted no solicitó restablecer la contraseña, no se requieren más acciones.
@endforeach

{{-- Salutation --}}
@if (! empty($salutation))
{{ $salutation }}
@else
Saludos cordiales,<br>{{ config('app.name') }}
@endif

{{-- Subcopy --}}
@isset($actionText)
@component('mail::subcopy')
Si existe algún inconveniente con el boton "{{ $actionText }}", copie y pegue la siguiente URL en su navegador web: [{{ $actionUrl }}]({{ $actionUrl }})
@endcomponent
@endisset
@endcomponent
