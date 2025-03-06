<?=
NavItem([
    'label' => 'BCP News Update',
    'url' => ROUTE('bcpnewsupdate'), // Assuming this is an actual route
    'icon' => 'bi bi-newspaper'
]);
?>

<?=
NavItem([
    'label' => 'Goal Target',
    'url' => ROUTE('goal-target'), // Dummy route for Goal Target
    'icon' => 'bi bi-bullseye'
]);
?>

<?=
NavItem([
    'label' => 'Notification',
    'url' => ROUTE('notifications'), // Dummy route for Notifications
    'icon' => 'bi bi-bell'
]);
?>

<?=
NavItem([
    'label' => 'Performance </br>Management',
    'icon' => 'bi bi-bar-chart-line',
    'children' => [
        ['label' => 'Progress & </br>Performance Evaluation', 'url' => ROUTE('performance-evaluation'), 'icon' => 'bi bi-person-check'], // Dummy route
    ],
]);
?>

<?=
NavItem([
    'label' => 'Employee Relations',
    'icon' => 'bi bi-person-bounding-box',
    'children' => [
        ['label' => 'Complaint & </br>Comment Feedback', 'url' => ROUTE('feedback'), 'icon' => 'bi bi-flag'], // Dummy route
    ],
]);
?>
