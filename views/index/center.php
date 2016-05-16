<?php require 'views/header.php'; ?>
 <table class="table table_round">
<?php if(!empty($this->articles)){ foreach($this->articles as $article) {
        echo ' <tr id="tr'.$article['id'].'">
                          <td class="col-sm-3">'.$article['id'].'</td>
                          <td class="col-sm-3">'.$article['name'].'</td>';  ?>
             			   <td>   <img src=".<?=$article['pic'] ?>" style="    width: 200px;   height: 200px;"></td>

					<td> <a	 href="/api/redactIt?redact=0&id=<?=$article['id'] ?>">Просмотр</a></td>
        </tr>

 
   
<?php }}  ?>
 </table>
<?php require 'views/footer.php'; ?>