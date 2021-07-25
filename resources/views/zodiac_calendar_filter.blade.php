@foreach ($zodiac_scores as $k => $zodiac_score)
  <tr style="background-color: {{ $zodiac_score->zodiac_score->color_code }}">
      <td>{{ $k+1 }}</td>
      <td class="text-center">{{ $zodiac_score->zodiac_date }}</td>
      <td class="text-center">{{ $zodiac_score->day_score }}</td>
  </tr>
@endforeach