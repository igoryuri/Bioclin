<x-mail::message>
# Certificados Próximos da Data de Expiração

Os seguintes certificados estão próximos da data de expiração:

@foreach ($certificates as $certificate)
- **Título:** {{ $certificate->title }}
- **Dias restantes:** {{ \Carbon\Carbon::now()->diffInDays($certificate->expiration_date) }}
-------------------------------------------------------------------------------------------------
@endforeach

<x-mail::button :url="$url" color="success">
Button Text
</x-mail::button>

Atenciosamente,<br>
{{ config('app.name') }}
</x-mail::message>
