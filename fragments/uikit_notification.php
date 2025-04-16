<?php
/**
 * @var rex_fragment $this
 * @psalm-scope-this rex_fragment
 */

// Hilfe anzeigen, wenn angefordert
if (isset($this->help) && $this->help === true) {
    $help = [];
    $help['info']            = 'Fragment für UIkit Notification: https://getuikit.com/docs/notification';
    $help['message']         = 'Nachrichtentext der Benachrichtigung';
    $help['status']          = 'Status der Benachrichtigung: primary, success, warning, danger';
    $help['position']        = 'Position: top-left, top-center, top-right, bottom-left, bottom-center, bottom-right (Standard: top-center)';
    $help['timeout']         = 'Zeit in Millisekunden bis zum Ausblenden (0 für keine automatische Ausblendung, Standard: 5000)';
    $help['group']           = 'Gruppierung von Benachrichtigungen';
    $help['show_immediately'] = 'Sofort anzeigen ohne Button (true/false)';
    $help['button_text']     = 'Text für den auslösenden Button, wenn nicht sofort angezeigt wird';
    $help['button_class']    = 'CSS-Klassen für den Button (Standard: uk-button uk-button-default)';
    
    dump($help);
    return;
}

// Default-Werte setzen
$message = isset($this->message) ? $this->message : 'Benachrichtigung';
$status = isset($this->status) ? $this->status : '';
$position = isset($this->position) ? $this->position : 'top-center';
$timeout = isset($this->timeout) ? (int)$this->timeout : 5000;
$group = isset($this->group) ? $this->group : null;
$showImmediately = isset($this->show_immediately) && $this->show_immediately === true;
$buttonText = isset($this->button_text) ? $this->button_text : 'Benachrichtigung anzeigen';
$buttonClass = isset($this->button_class) ? $this->button_class : 'uk-button uk-button-default';

// Eindeutige ID für JavaScript
$id = 'uikit-notification-' . uniqid();

// JavaScript-Code zum Anzeigen der Benachrichtigung
$jsOptions = [
    'message' => $message,
    'status' => $status,
    'pos' => $position,
    'timeout' => $timeout
];

if ($group) {
    $jsOptions['group'] = $group;
}

$jsOptionsJson = json_encode($jsOptions);
?>

<?php if ($showImmediately): ?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    UIkit.notification(<?= $jsOptionsJson ?>);
});
</script>
<?php else: ?>
<button class="<?= $buttonClass ?>" id="<?= $id ?>">
    <?= $buttonText ?>
</button>

<script>
document.getElementById('<?= $id ?>').addEventListener('click', function() {
    UIkit.notification(<?= $jsOptionsJson ?>);
});
</script>
<?php endif; ?>