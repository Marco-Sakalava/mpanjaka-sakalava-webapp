@props(['url'])
<tr>
    <td class="header">
        <a href="{{ $url }}" style="display: inline-block;">
            {{-- On remplace le nom de l'app par notre logo --}}
            <img src="{{ asset('images/logo-mpanjaka.png') }}" class="logo" alt="Logo Mpanjaka Sakalava" style="height: 75px; width: auto; margin: auto;">
        </a>
    </td>
</tr>
