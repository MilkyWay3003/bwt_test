<div class="container">
<div class="col-md-6 col-md-offset-3">
 <br>
 <div align="center" style="color:rgb(14, 87, 182)"><b><?=$data[0]?></b></div>
 <br>
  <div class="table-responsive">
    <table class="table table-bordered table-striped">
    <thead>
    <tr>
      <th colspan="2">Погода в Запорожье  <?=date(DATE_RFC822)?></th>
    </tr>
    </thead>
    <tbody>
    <tr>
      <td>Температура воздуха</td>
      <td> <?=$data[1]?>&deg;C</td>
    </tr>
    <tr>
      <td>Атмосферные явления</td>
      <td><?=$data[2]?></td>
    </tr>
    <tr>
      <td>Ветер</td>
      <td><?=$data[3]?> <?=$data[4]?> м/c</td>
     </tr>
     <tr>
      <td>Давление</td>
      <td><?=$data[5]?> мм рт. ст.</td>
     </tr>
     <tr>
      <td>Влажность</td>
      <td><?=$data[6]?>%</td>
     </tr>
      <tr>
      <td>Температура воды</td>
      <td><?=$data[7]?>&deg;C</td>
     </tr>
  </tbody>  
  </table>
 </div>
</div>
</div>