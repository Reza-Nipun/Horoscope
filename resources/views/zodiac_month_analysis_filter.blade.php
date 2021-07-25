@php
  
  $avg_scores = [];

@endphp

@foreach ($zodiac_scores as $avg_score)
  @php 
    array_push($avg_scores, $avg_score->avg_score)
  @endphp
@endforeach

@php
  
  $max_avg_score = max($avg_scores)

@endphp

@foreach ($zodiac_scores as $k => $zodiac_score)
  <tr @if($max_avg_score == $zodiac_score->avg_score) style="background-color: #00ff00" @else style="background-color: #ffd500" @endif>
      <td>{{ $k+1 }}</td>
      <td class="text-center">{{ date('F', strtotime($zodiac_score->yr_mon)) }}</td>
      <td class="text-center">{{ $zodiac_score->avg_score }}</td>
  </tr>
@endforeach