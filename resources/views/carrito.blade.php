<?php 
$total = 0;
?>


<ul>
@if (isset($cart))
  @foreach($cart as $item)
    <li>{{ $item['cantidad'] }}x {{ $item['etiqueta']}} | ${{ $item['importe'] }} = $ <?php echo $item['cantidad'] * $item['importe']; ?></option>
    <?php 
    $total = $total + ($item['cantidad'] * $item['importe'])
    ?>
  @endforeach
  @endif
</ul>

<h4>Total: $ {{$total}} -</h4>

