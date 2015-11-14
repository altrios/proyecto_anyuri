<?php
header('Content-Type: ' . $model->fileType);
print $model->binaryfile; 
exit(); 
?>