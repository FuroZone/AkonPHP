<?php
?>
<script src="/js/modal.js" defer></script>
<div class="modal-bg">
  <dialog class="box">
    <h1><?=$header?></h1>
    <p><?=$message?></p>
    <?= ($closeable ? "<span class=\"close\">Close.</span>" : "") ?>
  </dialog>
</div>