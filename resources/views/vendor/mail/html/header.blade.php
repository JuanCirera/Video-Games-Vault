@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="https://raw.githubusercontent.com/JuanCirera/VGV_images/main/VGV_color.png" width="150" class="logo" alt="VGV Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
