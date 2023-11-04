@extends('layouts.superadmin.app')

@section('titulo')
    Audits
@endsection

@section('content')

    <div class="container-template">
        <div class="container-table">
            <div class="container-table-div">
                <table class="table-template">
                    <thead>
                        <tr>
                            <th class="text-left th-template">Usuario</th>
                            <th class="text-left th-template">Evento</th>
                            <th class="text-left th-template">Dato anterior</th>
                            <th class="text-left th-template">Dato nuevo</th>
                            <th class="text-left th-template">Url</th>
                            <th class="text-left th-template">Ip</th>
                            <th class="text-left th-template">Fecha</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($audits as $audit)
                            @if ($audit->user)
                                <tr>
                                    <td class="text-left td-template">
                                        {{ $audit->user->name }}
                                    </td>
                                    <td class="text-left td-template">
                                        {{ $audit->event }}
                                    </td>

                                    <td class="text-left td-template">
                                        @if (!empty($audit->old_values))
                                            <ul>
                                                @foreach ($audit->old_values as $key => $value)
                                                    @if ($key != 'id')
                                                        <li>{{ $key }}: {{ $value }}</li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        @else
                                            Vacio
                                        @endif
                                    </td>
                                    <td class="text-left td-template">
                                        @if (!empty($audit->new_values))
                                            <ul>
                                                @foreach ($audit->new_values as $key => $value)
                                                    @if ($key != 'id')
                                                        <li> {{ $key }}: {{ $value }} </li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        @else
                                            Vacio
                                        @endif
                                    </td>
                                    <td class="text-left td-template">
                                        {{ $audit->url }}
                                    </td>
                                    <td class="text-left td-template">
                                        {{ $audit->ip_address }}
                                    </td>
                                    <td class="text-left td-template">
                                        {{ $audit->created_at->sub(new DateInterval('PT5H'))->format('d/m/Y') }}
                                    </td>



                                </tr>
                            @endif
                        @endforeach

                    </tbody>
                </table>


            </div>

        </div>
    </div>


@endsection
