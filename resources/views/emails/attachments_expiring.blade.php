<x-mail::message>
# Anexos Próximos da Data de Expiração

Os seguintes anexos estão próximos da data de expiração:

@foreach ($anexos as $anexo)
- **Título:** {{ $anexo->name }}
- **Produto:** {{ $anexo->product->name }}
- **Dias restantes:** {{ \Carbon\Carbon::now()->diffInDays($anexo->expiration_date) }}
------------------------------------------------------------------------------------------------
@endforeach


Atenciosamente,<br>
{{ config('app.name') }}
</x-mail::message>
