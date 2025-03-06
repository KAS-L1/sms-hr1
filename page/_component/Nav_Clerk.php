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

        ['label' => 'Progress & </br>Performance Evaluation', 'url' => route('#'), 'icon' => 'bi bi-person-check'],

    ],
]);
?>

<?=
NavItem([
    'label' => 'Employee Relations',
    'icon' => 'bi bi-person-bounding-box',
    'children' => [
        ['label' => ' Complaint & </br>Comment Feedback', 'url' => route('#'), 'icon' => 'bi bi-flag'],
    ],
]);
?>