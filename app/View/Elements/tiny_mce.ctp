<?php echo $this->html->script('tinymce/jscripts/tiny_mce/tiny_mce'); ?>
<script type='text/javascript'>
  tinyMCE.init({
    mode: "textareas",
    theme: "advanced",
    theme_advanced_buttons1: "bold,italic,underline,separator,strikethrough,justifyleft,justifycenter,justifyright,justifyfull,bullist,numlist,undo,redo,link,unlink, ",
    theme_advanced_buttons2: "",
    theme_advanced_buttons3: "",
    theme_advanced_toolbar_location: "top",
    theme_advanced_toolbar_align: "left",
    theme_advanced_statusbar_location: "bottom",
    extended_valid_elements: "a[name|href|target|title|onclick],img[class|src|border=0|alt|title|hspace|vspace|width|height|align|onmouseover|onmouseout|name],hr[class|width|size|noshade],font[face|size|color|style],span[class|align|style]",
    content_css: "/css/backend.css"

 })
</script>
