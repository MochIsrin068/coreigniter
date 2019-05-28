<?php
  switch ($value['type']) {
    case 'select':
        $label =  $value['placeholder'];
        $options =  $value['option'];
        $name = $value['name'];
        $selected = $value['value'];
        unset($value['placeholder']);
        unset($value['option']);
        unset($value['name']);
        echo "<p' class='text-mute'>$label</p>";
        echo form_dropdown($name, $options, $selected, $value);
      break;
    case 'textarea':
      $label =  $value['placeholder'];
      unset($value['placeholder']);
      echo "<label class='form-label'>$label</label>";
      echo form_textarea($value);
      break;
    case 'hidden':
      unset($value['placeholder']);
      echo form_hidden($value);
      break;
    default:
        $label =  $value['placeholder'];
        unset($value['placeholder']);
        echo "<label class='form-label'>$label</label>";
        echo form_input($value);
      break;
  }
?>
