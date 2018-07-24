<div class="container">
<div class="col-md-6 col-md-offset-3">
 <br>
 <? foreach($data as $method): ?>
  <div align="center" style="color:rgb(14, 87, 182)"><b><?=$method[0]?></b></div>
  <br>
    <div class="table-responsive">
      <table class="table table-bordered table-striped">
      <thead>
      <tr>
        <th colspan="2">Погода в Запорожье  <?=date("d-m-Y")?></th>
      </tr>
      </thead>
      <tbody>
      <tr>
        <td>Температура воздуха</td>
        <td> <?=$method[1]?>&deg;C</td>
      </tr>
      <tr>
        <td>Атмосферные явления</td>
        <td><?=$method[2]?></td>
      </tr>
      <tr>
        <td>Ветер</td>
        <td><?=$method[3]?> <?=$method[4]?> м/c</td>
      </tr>
      <tr>
        <td>Давление</td>
        <td><?=$method[5]?> мм рт. ст.</td>
      </tr>
      <tr>
        <td>Влажность</td>
        <td><?=$method[6]?>%</td>
      </tr>
        <tr>
        <td>Температура воды</td>
        <td><?=$method[7]?>&deg;C</td>
      </tr>
    </tbody>
    </table>
  <? endforeach; ?>
 </div>
</div>
</div>