<tr>
    <th>{{ $name }}</th>
    @if ($type == 'link')
        <td><a href="{{ $value }}">{{ $value }}</a></td>
    @else
        <td>{{ $value }}</td>
    @endif
</tr>