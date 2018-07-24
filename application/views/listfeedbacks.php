<div class="container">
<div class="col-md-6 col-md-offset-3">
   <br>
    <div class="table-responsive">
    <table class="table table-bordered table-striped">
    <thead>
    <tr>
      <th colspan="2">Список отзывов</th>
    </tr>
    </thead>
    <tbody>
    <? foreach($feedbacks as $feedback): ?>
      <tr>
        <td><?=$feedback['datecreate']?></td>
        <td>
          <?=$feedback['firstname']?>
          <?=$feedback['lastname']?>
          <br>
          <?=$feedback['messages']?>
        </td>
      </tr>
    <? endforeach; ?>
  </tbody>
  </table>
 </div>
</div>
</div>