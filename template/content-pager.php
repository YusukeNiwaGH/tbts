<div class="pager">
<?php
  echo paginate_links(array(
    'mid_size' => 1,
    'current' => max(1, get_query_var('paged')),
    'prev_text' => '◀︎',
    'next_text' => '▶︎',
  ));
?>
</div>