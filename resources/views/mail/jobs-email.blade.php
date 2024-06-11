<x-mail::message>
# {{$data->name}}

- **Vaga:** {{$data->category}}
- **E-mail:** {{$data->email}}
- **Telefone:** {{$data->phone}}
- **Descrição:** {{$data->description}}

Enviado pelo,<br>
{{ config('app.name') }}
</x-mail::message>
