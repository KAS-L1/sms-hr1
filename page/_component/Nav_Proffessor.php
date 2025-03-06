<?=
NavItem([
    'label' => 'BCP News Update',
    'url' => route('#'),
    'icon' => 'bi bi-newspaper'
]);
?>

<?=
NavItem([
    'label' => 'Goal Target',
    'url' => route('#'),
    'icon' => 'bi bi-bullseye'
]);
?>

<?=
NavItem([
    'label' => 'Notification',
    'url' => route('#'),
    'icon' => 'bi bi-bell'
]);
?>

<?=
NavItem([
    'label' => 'Performance </br>Management',
    'icon' => 'bi bi-bar-chart-line',
    'children' => [
        ['label' => 'Editing Goal Target List', 'url' => route('#'), 'icon' => 'bi bi-pencil-square'],
        ['label' => 'Performance Evaluation', 'url' => route('#'), 'icon' => 'bi bi-person-check'],
        ['label' => 'Progress Tracking', 'url' => route('#'), 'icon' => 'bi bi-graph-up'],
    ],
]);
?>

<?=
NavItem([
    'label' => 'Employee Relations',
    'icon' => 'bi bi-person-bounding-box',
    'children' => [
        ['label' => 'Complaint Report', 'url' => route('#'), 'icon' => 'bi bi-flag'],
        ['label' => 'View Complaint Report', 'url' => route('#'), 'icon' => 'bi bi-eye'],
        ['label' => 'Upload Special Report', 'url' => route('#'), 'icon' => 'bi bi-upload'],
        ['label' => 'Comment Feedback', 'url' => route('#'), 'icon' => 'bi bi-chat-left-text'],
        ['label' => 'View Comment Feedback', 'url' => route('#'), 'icon' => 'bi bi-eye'],
    ],
]);
?>