 <div id="evencal">
  <div class="calendar">
   <?php echo $notes ?>
   <span>by <a href="#"><strong>Corpu</strong></a></span>
  </div>
  <div class="event_detail">
   <h2 class="s_date">Detail Event <?= "$day $month $year" ;?> </h2>
   <div class="detail_event">
    <?php 
     if(isset($events)){
      $i = 1;
      foreach($events as $e){
       if($i % 2 == 0){
        echo '<div class="info1"><h4>'.$e['time'].'<img src="'.base_url().'assets/css/images/delete.png" class="delete" alt="" title="delete this event" day="'.$day.'" val="'.$e['id'].'" /></h4><p>'.$e['event'].'</p></div>';
       }else{
        echo '<div class="info2"><h4>'.$e['time'].'<img src="'.base_url().'assets/css/images/delete.png" class="delete" alt="" title="delete this event" day="'.$day.'" val="'.$e['id'].'" /></h4><p>'.$e['event'].'</p></div>';
       } 
       $i++;
      }
     }else{
      echo '<div class="message"><h4>No Event</h4><p>There\'s no event in this date</p></div>';
     }
    ?>
    <input type="button" name="add" value="Add Event" val="<?php echo $day ;?>" class="add_event"/>
   </div>
  </div>
 </div>
 